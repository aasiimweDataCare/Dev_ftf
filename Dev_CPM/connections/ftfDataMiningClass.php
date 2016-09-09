<?php

class ftfDataMining{
 var $IndicatorID;
 var $Query;
 
 	

 
							function ftfDataMining($IndicatorID)
							{
							$this->IndicatorID;
							}
							//MiningIndicator15($IndicatorID=15,$opening_year,$closure_year,$resultValue)
							
							function ftfMiningIndicator($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							 define('hectare', 0.404685642,true);
							switch($IndicatorID){
							case 4.1: 
							$x="select 4.1 as `indicator_id`,
								sum( if( substr(`t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) as notrainedYr1,
								sum( if( substr(`t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) as notrainedYr2,
								sum( if( substr(`t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) as notrainedYr3,
								sum( if( substr(`t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) as notrainedYr4,
								sum( if( substr(`t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) as notrainedYr5,
								sum( if( substr(`t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) as notrainedYr6
								from `tbl_participants` as `p`
								join `tbl_training` as `t` on ( `t`.`tbl_trainingId` = `p`.`trainingId` )
								where `p`.`sex`='Male' and 4.1=4.1";
								
								 $query=@Execute($x) or die(http("umemsDM-0030"));
								$result=FetchRecords($query);
								return $result[$resultValue];
								//return $x;	
							break;
							
				//------------------------Setup ftfDataMining----------------
		
				//------------------------End of Setup ftfDataMining----------------

				
								
								  
//---------------------------END OF UPDATE-----------------------------------
//end of class ftfDataMining();

} 

}

							
							
}

?>