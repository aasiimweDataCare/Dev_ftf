<?php
//require_once('lib_sunrise.php');
 
class DataFactSheet{
 var $ResultID;
 var $Query;
 
 	

 
							function DataFactSheet($ResultID)
							{
							$this->ResultID;
							}
							
							
						       
							function FactSheetResult($ResultID,$resultValue=""){
							 define('hectare', 0.404685642,true);
							switch($ResultID){
                                                            case 1:
                                                                $x="select 1 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result1`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 1=1
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0029"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 2: 
							$x="select 2 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result2`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 2=2
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0044"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 3: 
							$x="select 3 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result3`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 3=3
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0058"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 4: 
							$x="select 4 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result4`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 4=4
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0078"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
							case 5: 
							$x="select 5 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result5`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 5=5
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0093"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 6: 
							$x="select 6 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result6`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 6=6
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0108"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 7: 
							$x="select 7 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result7`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 7=7
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0125"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 8: 
							$x="select 8 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result8`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 8=8
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0143"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
                                                        
                                                        
                                                        
                                                        
                                                        case 9: 
							$x="select 9 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result9`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 9=9
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0162"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 10: 
							$x="select 10 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result10`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 10=10
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0177"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 11: 
							$x="select 11 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result11`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 11=11
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0194"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 12: 
							$x="select 12 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result12`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 12=12
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=2
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0212"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
							case 13: 
							$x="select 13 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result13`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 13=13
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0227"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 14: 
							$x="select 14 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result14`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 14=14
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0242"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 15: 
							$x="select 15 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result15`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 15=15
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0259"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 16: 
							$x="select 16 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result16`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 16=16
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0277"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                        
                                                        case 17: 
							$x="select 17 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result17`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 17=17
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0227"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 18: 
							$x="select 18 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result18`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 18=18
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0242"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 19: 
							$x="select 19 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result19`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 19=19
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0259"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 20: 
							$x="select 20 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result20`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 20=20
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0277"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 21: 
							$x="select 21 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result21`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 21=21
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0227"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 22: 
							$x="select 22 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result22`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 22=22
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0242"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 23: 
							$x="select 23 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result23`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 23=23
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0259"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 24: 
							$x="select 24 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result24`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 24=24
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=4
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0277"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    // End of half for row1
                                                    
                                                        case 25: 
							$x="select 1 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result25`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 25=25
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0029"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 26: 
							$x="select 26 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result26`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 26=26
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0044"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 27: 
							$x="select 27 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result27`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 27=27
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0058"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 28: 
							$x="select 28 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result28`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 28=28
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0078"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
							case 29: 
							$x="select 29 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result29`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 29=29
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0093"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 30: 
							$x="select 30 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result30`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 30=30
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0108"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 31: 
							$x="select 31 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result31`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 31=31
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0125"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 32: 
							$x="select 32 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result32`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 32=32
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0143"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
                                                        
                                                        
                                                        
                                                        
                                                        case 33: 
							$x="select 33 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result33`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 33=33
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0557"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 34: 
							$x="select 34 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result34`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 34=34
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0572"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 35: 
							$x="select 35 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result35`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 35=35
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0589"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 36: 
							$x="select 36 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result36`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 36=36
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=3
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0607"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
							case 37: 
							$x="select 37 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result37`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 37=37
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0622"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 38: 
							$x="select 38 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result38`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 38=38
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0638"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 39: 
							$x="select 39 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result39`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 39=39
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0654"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 40: 
							$x="select 40 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result40`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 40=40
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0672"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                        
                                                        case 41: 
							$x="select 41 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result41`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 41=41
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0687"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 42: 
							$x="select 42 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result42`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 42=42
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0242"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 43: 
							$x="select 43 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result43`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 43=43
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0259"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 44: 
							$x="select 44 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result44`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 44=44
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0277"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 45: 
							$x="select 45 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result45`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 45=45
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0227"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 46: 
							$x="select 46 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result46`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 46=46
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0242"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 47: 
							$x="select 47 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result47`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 47=47
                                                                and `t`.`traderSex`='Male'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0259"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 48: 
							$x="select 48 as result_id, COUNT(`ft`.`tbl_traderId`) as `row1Result48`  
                                                                from `tbl_traders` as `t` 
                                                                left join `tbl_form4_traders` as `ft` 
                                                                on(`t`.`tbl_tradersId` =`ft`.`tbl_traderId`)
                                                                where 48=48
                                                                and `t`.`traderSex`='Female'
                                                                and `t`.`traderRegion`=1
                                                                and `t`.`traderCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`t`.`traderDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0277"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                        
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
                                                    
                                                        case 97: 
                                                            $x="SELECT 97 as `result_id`, 
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result97`
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 97=97
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                            case 98: 
                                                            $x="select 98 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result98`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 98=98
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0044"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 99: 
                                                            $x="select 99 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result99`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 99=99
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0058"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            case 100: 
                                                            $x="select 100 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result100`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 100=100
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0078"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 101: 
                                                            $x="select 101 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result101`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 101=101
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-00141"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                            case 102: 
                                                            $x="select 102 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result102`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 102=102
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0108"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 103: 
                                                            $x="select 103 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result103`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 103=103
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0125"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            case 104: 
                                                            $x="select 104 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result104`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 104=104
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0143"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 105: 
                                                            $x="select 105 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result105`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 105=105
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-01110"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 106: 
                                                            $x="select 106 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result106`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 106=106
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0177"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 107: 
                                                            $x="select 107 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result107`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 107=107
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-01142"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            case 108: 
                                                            $x="select 108 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result108`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 108=108
                                                            and `d`.`zone`=2
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0212"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 109: 
                                                            $x="select 109 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result109`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 109=109
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0227"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                            case 110: 
                                                            $x="select 110 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result110`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 110=110
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0242"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 111: 
                                                            $x="select 111 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result111`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 111=111
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0259"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            case 112: 
                                                            $x="select 112 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result112`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 112=112
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 113: 
                                                            $x="select 113 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result113`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 113=113
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0227"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 114: 
                                                            $x="select 114 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result114`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 114=114
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0242"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 115: 
                                                            $x="select 115 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result115`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 115=115
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0259"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            case 116: 
                                                            $x="select 116 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result116`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 116=116
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 117: 
                                                            $x="select 117 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result117`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 117=117
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0227"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 118: 
                                                            $x="select 118 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result118`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 118=118
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0242"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 119: 
                                                            $x="select 119 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result119`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 119=119
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0259"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            case 120: 
                                                            $x="select 120 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result120`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 120=120
                                                            and `d`.`zone`=4
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            // End of half for row1
                                                            
                                                            case 121: 
                                                            $x="select 121 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result121`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 121=121
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0029"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                            case 122: 
                                                            $x="select 122 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result122`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 122=122
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0044"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 123: 
                                                            $x="select 123 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result123`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 123=123
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0058"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            case 124: 
                                                            $x="select 124 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result124`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 124=124
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0078"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 125: 
                                                            $x="select 125 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result125`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 125=125
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-00141"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 126: 
                                                            $x="select 126 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result126`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 126=126
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0108"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 127: 
                                                            $x="select 127 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result127`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 127=127
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0125"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            case 128: 
                                                            $x="select 128 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result128`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 128=128
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0143"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            case 129: 
                                                            $x="select 129 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result129`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 129=129
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0557"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 130: 
                                                            $x="select 130 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result130`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 130=130
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-05120"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 131: 
                                                            $x="select 131 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result131`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 131=131
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-05137"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            case 132: 
                                                            $x="select 132 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result132`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 132=132
                                                            and `d`.`zone`=3
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-010135"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 133: 
                                                            $x="select 133 as result_id, coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result133`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 133=133
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-01102"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 134: 
                                                            $x="select 134 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result134`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 134=134
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-01118"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 135: 
                                                            $x="select 135 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result135`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 135=135
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-01134"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                            case 136: 
                                                            $x="select 136 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result136`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 136=136
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropCoffee`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-01152"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 137: 
                                                            $x="select 137 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result137`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 137=137
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-01167"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 138: 
                                                            $x="select 138 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result138`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 138=138
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0242"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 139: 
                                                            $x="select 139 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result139`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 139=139
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0259"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            case 140: 
                                                            $x="select 140 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result140`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 140=140
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropMaize`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 141: 
                                                            $x="select 141 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result141`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 141=141
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0227"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 142: 
                                                            $x="select 142 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result142`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 142=142
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-0242"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            case 143: 
                                                            $x="select 143 as result_id,
                                                            coalesce (sum(`vg`.`numMembersMale`),0) as `row3Result143`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 143=143
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0259"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                            case 144: 
                                                            $x="select 144 as result_id,
                                                            coalesce (sum(`vg`.`numMembersFemale`),0) as `row3Result144`  
                                                            from `tbl_villageagent_groups` as `vg` 
                                                            left join `tbl_district` as `d` on 
                                                            (`d`.`districtCode`=`vg`.`groupDistrict`)
                                                            left join `tbl_villageagents` as `v`
                                                            on (`v`.`tbl_villageAgentId` = `vg`.`tbl_villageAgentId`)
                                                            where 144=144
                                                            and `d`.`zone`=1
                                                            and `v`.`vAgentCropBeans`='Yes'
                                                            and `vg`.`reportingPeriod` like '%".date('Y')."%'
                                                            and (year(curdate())-year(`v`.`vAgentDob`))
                                                            between '18' and '35'";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                            case 145: 
                                                            $x="SELECT 145 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeM`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeM` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeM` <>0), 1,0 ) ) AS `row4Result1`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 145=145
                                                            and `d`.`hsRegion`=2";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 146: 
                                                            $x="SELECT 146 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeF`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeF` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeF` <>0), 1,0 ) ) AS `row4Result2`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 146=146
                                                            and `d`.`hsRegion`=2";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 147: 
                                                            $x="SELECT 147 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeY`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeY` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeY` <>0), 1,0 ) ) AS `row4Result3`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 147=147
                                                            and `d`.`hsRegion`=2";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        //Maize
                                                        case 148: 
                                                            $x="SELECT 148 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeM`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeM` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeM` <>0), 1,0 ) ) AS `row4Result4`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 148=148
                                                            and `d`.`hsRegion`=2";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 149: 
                                                            $x="SELECT 149 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeF`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeF` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeF` <>0), 1,0 ) ) AS `row4Result5`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 149=149
                                                            and `d`.`hsRegion`=2";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 150: 
                                                            $x="SELECT 150 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeY`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeY` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeY` <>0), 1,0 ) ) AS `row4Result6`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 150=150
                                                            and `d`.`hsRegion`=2";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        //Beans
                                                        
                                                        case 151: 
                                                            $x="SELECT 151 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansM`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansM` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansM` <>0), 1,0 ) ) AS `row4Result7`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 151=151
                                                            and `d`.`hsRegion`=2";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 152: 
                                                            $x="SELECT 152 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansF`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansF` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansF` <>0), 1,0 ) ) AS `row4Result8`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 152=152
                                                            and `d`.`hsRegion`=2";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 153: 
                                                            $x="SELECT 153 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansY`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansY` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansY` <>0), 1,0 ) ) AS `row4Result9`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 153=153
                                                            and `d`.`hsRegion`=2";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                         //Maize   
                                                        case 154: 
                                                            $x="SELECT 154 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeM`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeM` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeM` <>0), 1,0 ) ) AS `row4Result10`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 154=154
                                                            and `d`.`hsRegion`=4";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 155: 
                                                            $x="SELECT 155 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeF`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeF` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeF` <>0), 1,0 ) ) AS `row4Result11`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 155=155
                                                            and `d`.`hsRegion`=4";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 156: 
                                                            $x="SELECT 156 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeY`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeY` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeY` <>0), 1,0 ) ) AS `row4Result12`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 156=156
                                                            and `d`.`hsRegion`=4";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        //Maize
                                                        case 157: 
                                                            $x="SELECT 157 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeM`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeM` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeM` <>0), 1,0 ) ) AS `row4Result13`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 157=157
                                                            and `d`.`hsRegion`=4";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 158: 
                                                            $x="SELECT 158 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeF`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeF` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeF` <>0), 1,0 ) ) AS `row4Result14`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 158=158
                                                            and `d`.`hsRegion`=4";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 159: 
                                                            $x="SELECT 159 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeY`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeY` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeY` <>0), 1,0 ) ) AS `row4Result15`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 159=159
                                                            and `d`.`hsRegion`=4";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        //Beans
                                                        
                                                        case 160: 
                                                            $x="SELECT 160 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansM`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansM` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansM` <>0), 1,0 ) ) AS `row4Result16`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 160=160
                                                            and `d`.`hsRegion`=4";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 161: 
                                                            $x="SELECT 161 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansF`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansF` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansF` <>0), 1,0 ) ) AS `row4Result17`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 161=161
                                                            and `d`.`hsRegion`=4";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 162: 
                                                            $x="SELECT 162 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansY`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansY` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansY` <>0), 1,0 ) ) AS `row4Result18`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 162=162
                                                            and `d`.`hsRegion`=4";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 163: 
                                                            $x="SELECT 163 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeM`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeM` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeM` <>0), 1,0 ) ) AS `row4Result19`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 163=163
                                                            and `d`.`hsRegion`=3";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 164: 
                                                            $x="SELECT 164 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeF`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeF` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeF` <>0), 1,0 ) ) AS `row4Result20`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 164=164
                                                            and `d`.`hsRegion`=3";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 165: 
                                                            $x="SELECT 165 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeY`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeY` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeY` <>0), 1,0 ) ) AS `row4Result21`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 165=165
                                                            and `d`.`hsRegion`=3";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        //Maize
                                                        case 166: 
                                                            $x="SELECT 166 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeM`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeM` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeM` <>0), 1,0 ) ) AS `row4Result22`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 166=166
                                                            and `d`.`hsRegion`=3";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 167: 
                                                            $x="SELECT 167 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeF`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeF` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeF` <>0), 1,0 ) ) AS `row4Result23`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 167=167
                                                            and `d`.`hsRegion`=3";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 168: 
                                                            $x="SELECT 168 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeY`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeY` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeY` <>0), 1,0 ) ) AS `row4Result24`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 168=168
                                                            and `d`.`hsRegion`=3";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        //Beans
                                                        
                                                        case 169: 
                                                            $x="SELECT 169 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansM`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansM` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansM` <>0), 1,0 ) ) AS `row4Result25`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 169=169
                                                            and `d`.`hsRegion`=3";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 170: 
                                                            $x="SELECT 170 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansF`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansF` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansF` <>0), 1,0 ) ) AS `row4Result26`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 170=170
                                                            and `d`.`hsRegion`=3";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 171: 
                                                            $x="SELECT 171 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansY`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansY` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansY` <>0), 1,0 ) ) AS `row4Result27`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 171=171
                                                            and `d`.`hsRegion`=3";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 172: 
                                                            $x="SELECT 172 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeM`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeM` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeM` <>0), 1,0 ) ) AS `row4Result28`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 172=172
                                                            and `d`.`hsRegion`=1";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 173: 
                                                            $x="SELECT 173 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeF`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeF` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeF` <>0), 1,0 ) ) AS `row4Result29`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 173=173
                                                            and `d`.`hsRegion`=1";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 174: 
                                                            $x="SELECT 174 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsCoffeeY`<> 0
                                                            || i.`acreageImprovedSeedCoffee` <> 0
                                                            || i.`useFertilizersCoffeeY` <>0
                                                            || i.`acreageFertilizersCoffee` <> 0
                                                            || i.`useChemicalsCoffeeY` <>0), 1,0 ) ) AS `row4Result30`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 174=174
                                                            and `d`.`hsRegion`=1";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        //Maize
                                                        case 175: 
                                                            $x="SELECT 175 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeM`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeM` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeM` <>0), 1,0 ) ) AS `row4Result31`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 175=175
                                                            and `d`.`hsRegion`=1";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 176: 
                                                            $x="SELECT 176 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeF`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeF` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeF` <>0), 1,0 ) ) AS `row4Result32`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 176=176
                                                            and `d`.`hsRegion`=1";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 177: 
                                                            $x="SELECT 177 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsMaizeY`<> 0
                                                            || i.`acreageImprovedSeedMaize` <> 0
                                                            || i.`useFertilizersMaizeY` <>0
                                                            || i.`acreageFertilizersMaize` <> 0
                                                            || i.`useChemicalsMaizeY` <>0), 1,0 ) ) AS `row4Result33`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 177=177
                                                            and `d`.`hsRegion`=1";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        //Beans
                                                        
                                                        case 178: 
                                                            $x="SELECT 178 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansM`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansM` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansM` <>0), 1,0 ) ) AS `row4Result34`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 178=178
                                                            and `d`.`hsRegion`=1";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                            
                                                        case 179: 
                                                            $x="SELECT 179 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansF`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansF` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansF` <>0), 1,0 ) ) AS `row4Result35`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 179=179
                                                            and `d`.`hsRegion`=1";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                            
                                                        case 180: 
                                                            $x="SELECT 180 as result_id,
                                                            sum( if( i.`year` = '".date('Y')."'
                                                            and m.`hsNameMember`<>'' 
                                                            and (i.`improvedSeedMaterialsBeansY`<> 0
                                                            || i.`acreageImprovedSeedBeans` <> 0
                                                            || i.`useFertilizersBeansY` <>0
                                                            || i.`acreageFertilizersBeans` <> 0
                                                            || i.`useChemicalsBeansY` <>0), 1,0 ) ) AS `row4Result36`
                                                            FROM `tbl_household_summary_data` i
                                                            join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`)
                                                            join `tbl_house_hold_details` as `d` on(d.`houseHoldId`=i.`houseHoldId`)
                                                            where 180=180
                                                            and `d`.`hsRegion`=1";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
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
                                                            $query=@Execute($x) or die(http("FS-3193"));
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
                                                            $query=@Execute($x) or die(http("FS-3209"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 183: 
                                                            $x="select 183 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result183` from(
                                                                select
                                                                `m`.`hsAreaCoffeeMember`,
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
                                                            $query=@Execute($x) or die(http("FS-3233"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 184: 
                                                            $x="select 184 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result184` from(
                                                                select
                                                                `m`.`hsAreaCoffeeMember`,
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
                                                            $query=@Execute($x) or die(http("FS-3256"));
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
                                                            $query=@Execute($x) or die(http("FS-3434"));
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
                                                            $query=@Execute($x) or die(http("FS-3450"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 195: 
                                                            $x="select 195 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result195` from(
                                                                select
                                                                `m`.`hsAreaCoffeeMember`,
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
                                                            $query=@Execute($x) or die(http("FS-3474"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 196: 
                                                            $x="select 196 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result196` from(
                                                                select
                                                                `m`.`hsAreaCoffeeMember`,
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
                                                            $query=@Execute($x) or die(http("FS-3497"));
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
                                                                `m`.`hsAreaCoffeeMember`,
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
                                                                `m`.`hsAreaCoffeeMember`,
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
                                                                `m`.`hsAreaCoffeeMember`,
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
                                                                `m`.`hsAreaCoffeeMember`,
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
							   
							   //The row6 values
							   case 229: 
                                                            $x="select 229 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result229`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 229=229
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 230: 
                                                            $x="select 230 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result230`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 230=230
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 231: 
                                                            $x="select 231 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result231`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 231=231
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 232: 
                                                            $x="select 232 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result232`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 232=232
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 233: 
                                                            $x="select 233 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result233`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 233=233
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 234: 
                                                            $x="select 234 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result234`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 234=234
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 235: 
                                                            $x="select 235 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result235`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 235=235
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 236: 
                                                            $x="select 236 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result236`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 236=236
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 237: 
                                                            $x="select 237 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result237`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 237=237
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 238: 
                                                            $x="select 238 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result238`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 238=238
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 239: 
                                                            $x="select 239 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result239`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 239=239
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 240: 
                                                            $x="select 240 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result240`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 240=240
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='North'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   //End of the rows on inputs sold Norhtern Region
							   							   //The row6 values
							   case 241: 
                                                            $x="select 241 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result241`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 241=241
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 242: 
                                                            $x="select 242 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result242`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 242=242
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 243: 
                                                            $x="select 243 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result243`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 243=243
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 244: 
                                                            $x="select 244 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result244`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 244=244
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 245: 
                                                            $x="select 245 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result245`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 245=245
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 246: 
                                                            $x="select 246 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result246`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 246=246
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 247: 
                                                            $x="select 247 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result247`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 247=247
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 248: 
                                                            $x="select 248 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result248`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 248=248
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 249: 
                                                            $x="select 249 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result249`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 249=249
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 250: 
                                                            $x="select 250 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result250`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 250=250
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 251: 
                                                            $x="select 251 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result251`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 251=251
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 252: 
                                                            $x="select 252 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result252`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 252=252
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='West'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   //End of the rows on inputs sold Western Region
							   							   //The row6 values
							   case 253: 
                                                            $x="select 253 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result253`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 253=253
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 254: 
                                                            $x="select 254 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result254`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 254=254
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 255: 
                                                            $x="select 255 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result255`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 255=255
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 256: 
                                                            $x="select 256 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result256`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 256=256
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 257: 
                                                            $x="select 257 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result257`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 257=257
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 258: 
                                                            $x="select 258 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result258`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 258=258
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 259: 
                                                            $x="select 259 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result259`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 259=259
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 260: 
                                                            $x="select 260 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result260`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 260=260
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 261: 
                                                            $x="select 261 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result261`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 261=261
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 262: 
                                                            $x="select 262 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result262`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 262=262
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 263: 
                                                            $x="select 263 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result263`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 263=263
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 264: 
                                                            $x="select 264 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result264`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 264=264
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='East'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   //End of the rows on inputs sold Eastern Region
							   							   //The row6 values
							   case 265: 
                                                            $x="select 265 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result265`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 265=265
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 266: 
                                                            $x="select 266 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result266`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 266=266
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 267: 
                                                            $x="select 267 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result267`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 267=267
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 268: 
                                                            $x="select 268 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldCoffeeMember`), 0 ) )  as `row6Result268`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 268=268
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 269: 
                                                            $x="select 269 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result269`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 269=269
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 270: 
                                                            $x="select 270 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result270`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 270=270
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 271: 
                                                            $x="select 271 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result271`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 271=271
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 272: 
                                                            $x="select 272 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldMaizeMember`), 0 ) )  as `row6Result272`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 272=272
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 273: 
                                                            $x="select 273 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result273`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 273=273
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 274: 
                                                            $x="select 274 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result274`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 274=274
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 275: 
                                                            $x="select 275 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result275`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 275=275
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='M'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 276: 
                                                            $x="select 276 as `result_id`,
								sum( if( `m`.`year` = '".date('Y')."' and `m`.`hsNameMember`<>'',(`m`.`hsVolumeSoldBeansMember`), 0 ) )  as `row6Result276`
								from `tbl_household_members` as `m`,  `tbl_house_hold_details` as `hs`, `tbl_zone` as `z`
								where 276=276
								and `m`.`houseHoldId`=`hs`.`houseHoldId`
								and `hs`.`hsRegion` = `z`.`zoneCode`
								and `m`.`hsSexMember`='F'
								and `m`.`hsAgeMember` between 18 and 35
								and `z`.`zoneName`='Central'";
                                                            $query=@Execute($x) or die(http("FS-4157"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   //End of the rows on inputs sold Central Region
							   
							   case 277: 
                                                            $x="select 277 as `result_id`, sum(`acreageNorth`)as `row7Result277` from(
                                                                select
                                                                ((sum(`sm`.`acreageImprovedSeedCoffee` +
                                                                `sm`.`acreageImprovedSeedBeans` +
                                                                `sm`.`acreageImprovedSeedMaize`))* ".hectare.") as `acreageNorth`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=2
                                                                 and `m`.`year`='".date('Y')."')as `row7Result277`
                                                                 where 277=277";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 278: 
                                                            $x="select 278 as `result_id`, sum(`acreageWest`)as `row7Result278` from(
                                                                select
                                                                ((sum(`sm`.`acreageImprovedSeedCoffee` +
                                                                `sm`.`acreageImprovedSeedBeans` +
                                                                `sm`.`acreageImprovedSeedMaize`))* ".hectare.") as `acreageWest`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=4
                                                                 and `m`.`year`='".date('Y')."')as `row7Result277`
                                                                 where 278=278";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        case 279: 
                                                            $x="select 279 as `result_id`, sum(`acreageEast`)as `row7Result279` from(
                                                                select
                                                                ((sum(`sm`.`acreageImprovedSeedCoffee` +
                                                                `sm`.`acreageImprovedSeedBeans` +
                                                                `sm`.`acreageImprovedSeedMaize`))* ".hectare.") as `acreageEast`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=3
                                                                 and `m`.`year`='".date('Y')."')as `row7Result277`
                                                                 where 279=279";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        case 280: 
                                                            $x="select 280 as `result_id`, sum(`acreageCentral`)as `row7Result280` from(
                                                                select
                                                                ((sum(`sm`.`acreageImprovedSeedCoffee` +
                                                                `sm`.`acreageImprovedSeedBeans` +
                                                                `sm`.`acreageImprovedSeedMaize`))* ".hectare.") as `acreageCentral`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=1
                                                                 and `m`.`year`='".date('Y')."')as `row7Result277`
                                                                 where 280=280";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   case 281: 
                                                            $x="select 281 as `result_id`, sum(`acreageNorth`)as `row7Result281` from(
                                                                select
                                                                ((sum(`sm`.`acreageChemicalsCoffee` +
                                                                `sm`.`acreageChemicalsBeans` +
                                                                `sm`.`acreageChemicalsMaize`))* ".hectare.") as `acreageNorth`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=2
                                                                 and `m`.`year`='".date('Y')."')as `row7Result281`
                                                                 where 281=281";
                                                            $query=@Execute($x) or die(http("FS-0281"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 282: 
                                                            $x="select 282 as `result_id`, sum(`acreageWest`)as `row7Result282` from(
                                                                select
                                                                ((sum(`sm`.`acreageChemicalsCoffee` +
                                                                `sm`.`acreageChemicalsBeans` +
                                                                `sm`.`acreageChemicalsMaize`))* ".hectare.") as `acreageWest`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=4
                                                                 and `m`.`year`='".date('Y')."')as `row7Result282`
                                                                 where 282=282";
                                                            $query=@Execute($x) or die(http("FS-0281"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        case 283: 
                                                            $x="select 283 as `result_id`, sum(`acreageEast`)as `row7Result283` from(
                                                                select
                                                                ((sum(`sm`.`acreageChemicalsCoffee` +
                                                                `sm`.`acreageChemicalsBeans` +
                                                                `sm`.`acreageChemicalsMaize`))* ".hectare.") as `acreageEast`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=3
                                                                 and `m`.`year`='".date('Y')."')as `row7Result283`
                                                                 where 283=283";
                                                            $query=@Execute($x) or die(http("FS-0281"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        case 284: 
                                                            $x="select 284 as `result_id`, sum(`acreageCentral`)as `row7Result284` from(
                                                                select
                                                                ((sum(`sm`.`acreageChemicalsCoffee` +
                                                                `sm`.`acreageChemicalsBeans` +
                                                                `sm`.`acreageChemicalsMaize`))* ".hectare.") as `acreageCentral`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=1
                                                                 and `m`.`year`='".date('Y')."')as `row7Result284`
                                                                 where 284=284";
                                                            $query=@Execute($x) or die(http("FS-0281"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 285: 
                                                            $x="select 285 as `result_id`, sum(`acreageNorth`)as `row7Result285` from(
                                                                select
                                                                ((sum(`sm`.`acreageChemicalsCoffee` +
                                                                `sm`.`acreageChemicalsBeans` +
                                                                `sm`.`acreageChemicalsMaize`))* ".hectare.") as `acreageNorth`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=2
                                                                 and `m`.`year`='".date('Y')."')as `row7Result285`
                                                                 where 285=285";
                                                            $query=@Execute($x) or die(http("FS-0281"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 286: 
                                                            $x="select 286 as `result_id`, sum(`acreageWest`)as `row7Result286` from(
                                                                select
                                                                ((sum(`sm`.`acreageChemicalsCoffee` +
                                                                `sm`.`acreageChemicalsBeans` +
                                                                `sm`.`acreageChemicalsMaize`))* ".hectare.") as `acreageWest`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=4
                                                                 and `m`.`year`='".date('Y')."')as `row7Result286`
                                                                 where 286=286";
                                                            $query=@Execute($x) or die(http("FS-0286"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        case 287: 
                                                            $x="select 287 as `result_id`, sum(`acreageEast`)as `row7Result287` from(
                                                                select
                                                                ((sum(`sm`.`acreageChemicalsCoffee` +
                                                                `sm`.`acreageChemicalsBeans` +
                                                                `sm`.`acreageChemicalsMaize`))* ".hectare.") as `acreageEast`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=3
                                                                 and `m`.`year`='".date('Y')."')as `row7Result287`
                                                                 where 287=287";
                                                            $query=@Execute($x) or die(http("FS-0287"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        case 288: 
                                                            $x="select 288 as `result_id`, sum(`acreageCentral`)as `row7Result288` from(
                                                                select
                                                                ((sum(`sm`.`acreageChemicalsCoffee` +
                                                                `sm`.`acreageChemicalsBeans` +
                                                                `sm`.`acreageChemicalsMaize`))* ".hectare.") as `acreageCentral`
                                                                from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 join `tbl_household_summary_data` as `sm`
                                                                 on(`d`.`houseHoldId`=`sm`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=1
                                                                 and `m`.`year`='".date('Y')."')as `row7Result288`
                                                                 where 288=288";
                                                            $query=@Execute($x) or die(http("FS-0281"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							   
							case 300: 
                                                            $x="select 300 as `result_id`,
							    sum( if(`l`.`labourSavingTech` <> '', 1, 0 ) ) as `row7Result300`
							    from `tbl_laboursavingtech` as `l`
							    where 300=300
							    and `l`.`labourSavingTech` like '%planter%'
							    and `l`.`year`='".date('Y')."'";
                                                            $query=@Execute($x) or die(http("FS-4373"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							case 301: 
                                                            $x="select 301 as `result_id`,
							    sum( if(`l`.`labourSavingTech` <> '', 1, 0 ) ) as `row7Result301`
							    from `tbl_laboursavingtech` as `l`
							    where 301=301
							    and `l`.`labourSavingTech` like '%sheller%'
							    and `l`.`year`='".date('Y')."'";
                                                            $query=@Execute($x) or die(http("FS-4384"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							case 302: 
                                                            $x="select 302 as `result_id`,
							    sum( if(`l`.`labourSavingTech` <> '', 1, 0 ) ) as `row7Result302`
							    from `tbl_laboursavingtech` as `l`
							    where 302=302
							    and `l`.`labourSavingTech` like '%spray%'
							    and `l`.`year`='".date('Y')."'";
                                                            $query=@Execute($x) or die(http("FS-4395"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							case 303: 
                                                            $x="select 303 as `result_id`,
								  sum( if(`g`.`groupName` <> '' and `g`.`groupCode` <> '' and `g`.`groupName` <> 'No Group', 1, 0 ) ) as `row7Result303`
								  FROM `tbl_villageagent_groups` as `g`, `tbl_zone` as `z`,
								  `tbl_district` as `d`, `tbl_subcounty` as `s`
								  where 303=303
								  and `d`.`zone` = `z`.`zoneCode`
								  and `z`.`zoneName`='North'
								  and `d`.`districtCode` = `s`.`districtCode`
								  and `g`.`groupDistrict` = `d`.`districtCode`
								  and `g`.`groupSubcounty` = `s`.`subcountyCode`
								  and `g`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-4373"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							case 304: 
                                                            $x="select 304 as `result_id`,
								 sum( if(`g`.`groupName` <> '' and `g`.`groupCode` <> '' and `g`.`groupName` <> 'No Group', 1, 0 ) ) as `row7Result304`
								 FROM `tbl_villageagent_groups` as `g`, `tbl_zone` as `z`,
								 `tbl_district` as `d`, `tbl_subcounty` as `s`
								 where 304=304
								 and `d`.`zone` = `z`.`zoneCode`
								 and `z`.`zoneName`='West'
								 and `d`.`districtCode` = `s`.`districtCode`
								 and `g`.`groupDistrict` = `d`.`districtCode`
								 and `g`.`groupSubcounty` = `s`.`subcountyCode`
								 and `g`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-4394"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							case 305: 
                                                            $x="select 305 as `result_id`,
								  sum( if(`g`.`groupName` <> '' and `g`.`groupCode` <> '' and `g`.`groupName` <> 'No Group', 1, 0 ) ) as `row7Result305`
								  FROM `tbl_villageagent_groups` as `g`, `tbl_zone` as `z`,
								  `tbl_district` as `d`, `tbl_subcounty` as `s`
								  where 305=305
								  and `d`.`zone` = `z`.`zoneCode`
								  and `z`.`zoneName`='East'
								  and `d`.`districtCode` = `s`.`districtCode`
								  and `g`.`groupDistrict` = `d`.`districtCode`
								  and `g`.`groupSubcounty` = `s`.`subcountyCode`
								  and `g`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-4410"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
							case 306: 
                                                            $x="select 306 as `result_id`,
								 sum( if(`g`.`groupName` <> '' and `g`.`groupCode` <> '' and `g`.`groupName` <> 'No Group', 1, 0 ) ) as `row7Result306`
								 FROM `tbl_villageagent_groups` as `g`, `tbl_zone` as `z`,
								 `tbl_district` as `d`, `tbl_subcounty` as `s`
								 where 306=306
								 and `d`.`zone` = `z`.`zoneCode`
								 and `z`.`zoneName`='Central'
								 and `d`.`districtCode` = `s`.`districtCode`
								 and `g`.`groupDistrict` = `d`.`districtCode`
								 and `g`.`groupSubcounty` = `s`.`subcountyCode`
								 and `g`.`reportingPeriod` like '%".date('Y')."%'";
                                                            $query=@Execute($x) or die(http("FS-4426"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;   
							   
							   
                                                    
                                                        default:
                                                        break;
								
								}
									
							 					
							}
//------------------------Setup DataFactSheet----------------

//------------------------End of Setup DataFactSheet----------------
				
								
								  
//---------------------------END OF UPDATE-----------------------------------
//end of class DataFactSheet();

} 



?>