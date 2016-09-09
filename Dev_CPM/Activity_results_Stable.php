<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
global $sem_annual;
#*************************************
$xajax->register(XAJAX_FUNCTION,'ViewAnnualTargets'); //---PTT---
$xajax->register(XAJAX_FUNCTION,'SemiAnnualAndAnnualIndicatorTracker');//Semi Annual and Annual Indicator Tracker
$xajax->register(XAJAX_FUNCTION,'ViewAnnualAchievementsReport');// Annual Achievements
$xajax->register(XAJAX_FUNCTION,'ViewSemiAnnualReport');//Annual Achievements

require_once('ActivityFilters.php');
#************************xxxxxxxxxxxxxxx************************
#************************xxxxxxxxxxxxxxx***********************

#-======


 






function ViewAnnualTargets($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
$qmobj= new QueryManager('');
$dmobj= new DataMining('');
if($_SESSION['username']==NULL){
$obj->alert("Your Session Has Expired Please Login again!");
$obj->redirect("index.php");
return $obj;
}



$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//----------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------
if($_SESSION['semiAnnual']=='Closed'||$_SESSION['fyear']=='Closed'){
$obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
}



$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >
".filter_annualTargetActivityReport($fnctName="ViewAnnualTargets");
//

                        
			$data.="<tr><th rowspan='3' class='dataRow' >NO/SELECT</th>
			 <th rowspan=3 colspan='6' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='200' height='0.1'></th>
		
		<th colspan='20' class='dataRow' ><center>Activity Indicator Tracking Table for the for the Period 2013 - 2018 <em>, LOA=Life of Activity, T=Target,A=Actual, % Achieved=>((LOAA/LOAT)x100)</em></center></th>
		
			</tr>
			<tr>
			
     
             	<th  colspan='2' rowspan='2'  class='dataRow'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
			 	<th  colspan='1' rowspan='2' class='dataRow'>unit of measure</th>
			   <th  class='dataRow' rowspan='2'>Baseline</th>";
				  
				   $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  //or die(http("WP-00236"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
                                    switch ($n){
                                    case 2013:
                                    $bgcolor="background:#ffff00; color:black;";
                                    break;
                                    case 2014:
                                    $bgcolor="background:#f38fbf; color:black;";
                                    break;
                                    case 2015:
                                    $bgcolor="background:#ccffff; color:black;";
                                    break;
                                    case 2016:
                                    $bgcolor="background:#fde9d9; color:black;";
                                    break;
                                    case 2017:
                                    $bgcolor="background:#ccccff; color:black;";
                                    break;
                                    case 2018:
                                    $bgcolor="background:#33ffff; color:black;";    
                                        
                                    }
                                    
            		$data.="<th width='100' style='".$bgcolor."' class='dataRow' align='right' colspan='2' >FY ".$n."<img src='images/spacer2.png' width='15' height='0.1'></th>";
					
					}
				   $data.="<th colspan='1'  rowspan='2'  class='dataRow'>LOA Targets</th>";
				   $data.="<th colspan='1' rowspan='2' class='dataRow'>LOA Actuals</th>";
				   $data.="<th colspan='1'   rowspan='2'  class='dataRow'><strong>% Achieved</strong> </th>";
				    
				    $data.="</tr>";

$data.="<tr>";
for($n=0;$n<6;$n++){
    switch ($n){
                                    case 0:
                                    $bgcolor="background:#ffff00; color:black;";
                                    break;
                                    case 1:
                                    $bgcolor="background:#f38fbf; color:black;";
                                    break;
                                    case 2:
                                    $bgcolor="background:#ccffff; color:black;";
                                    break;
                                    case 3:
                                    $bgcolor="background:#fde9d9; color:black;";
                                    break;
                                    case 4:
                                    $bgcolor="background:#ccccff; color:black;";
                                    break;
                                    case 5:
                                    $bgcolor="background:#33ffff; color:black;";    
                                        
                                    }
    
    
            		$data.="<th style='".$bgcolor."' width='100' class='dataRow' align='right'>T</th>";
					$data.="<th style='".$bgcolor."' width='100' class='dataRow' align='right'>A</th>";
					
					}
$data.="</tr>";					
$inc=1;

			$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output_id']."%' order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";


$x=$qmobj->ViewIndicatorAnnualTargets($rowoutput['output_id']);
#$obj->alert($x);
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("WRKPlan-202"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"-";
		  $color=$row['indicator_id']%2==1?"evenrow":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#666666';\"";

	
		  $l="align=right";
		  
		 
 							$data.="<tr class=$color ".$events2.">
 									<td align=left>
 									
									
 									<INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >".$inc."</td>
   
									<td colspan='6' >".$row['indicator_name']."</td>
									<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
									<td align='left' colspan='1'>".$row['unitofmeasure']."</td>
								
									<td align=right >".number_format($base)."</td>";
									
										$y=$qmobj->ViewIndicatorAnnualTargetsReports($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year']);
										$qResults=Execute($y) or die(http("671"));
										$rowWP=FetchRecords($qResults);
										
										
										
										
										//$obj->alert($xActual);
										
										 switch($row['indicator_id']){
										default:
											$ActualYr1=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr1');
											$ActualYr2=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr2');
											$ActualYr3=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr3');
											$ActualYr4=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr4');
											$ActualYr5=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr5');
											$ActualYr6=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr6');
																				
										break;
										}
										
										$one="background:#ffff00;";
										$two="background:#f38fbf;";
										$three="background:#ccffff;";
										$four="background:#fde9d9;";
										$five="background:#ccccff;";
										$six="background:#33ffff;";
										/* if (($row['indicator_id'])==23) {   
										$obj->alert($ActualYr1."-".$ActualYr2."-".$ActualYr3."-".$ActualYr4."-".$ActualYr5."-".$ActualYr6);
										} */
									
									$data.="<td style='".$one."' align='right' ><INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$rowWP['workplan_id']."' >";
									$data.="<INPUT type='hidden' name='region[]'   id='region' value='".$rowWP['region']."' >";
									$data.="<INPUT type='hidden' name='curr_year[]'   id='curr_year ' value='".$rowWP['curr_year']."' >";
									$data.="".checkExistance($rowWP['fy1'],0,'ExistsInteger')."</td>";
									
									$data.="<td style='".$one."' align='right' >".checkExistance($ActualYr1,0,'ExistsInteger')."</td>";
									
									$data.="<td style='".$two."' align='right' >".checkExistance($rowWP['fy2'],0,'ExistsInteger')."</td>";
									
									$data.="<td style='".$two."' align='right' >".checkExistance($ActualYr2,0,'ExistsInteger')."</td>";
									
									$data.="<td style='".$three."' align='right' >".checkExistance($rowWP['fy3'],0,'ExistsInteger')."</td>";
									
									$data.="<td style='".$three."' align='right' >".checkExistance($ActualYr3,0,'ExistsInteger')."</td>";
									
									$data.="<td style='".$four."' align='right' colspan='1' >".checkExistance($rowWP['fy4'],0,'ExistsInteger')."</td>";
									
									$data.="<td style='".$four."' align='right' >".checkExistance($ActualYr4,0,'ExistsInteger')."</td>";
									
									$data.="<td style='".$five."' align='right' colspan='1' >".checkExistance($rowWP['fy5'],0,'ExistsInteger')."</td>";
									
									$data.="<td style='".$five."' align='right' >".checkExistance($ActualYr5,0,'ExistsInteger')."</td>";
									
									$data.="<td style='".$six."' align='right' colspan='1' >".checkExistance($rowWP['fy6'],0,'ExistsInteger')."</td>";
									
									$data.="<td style='".$six."' align='right' >".checkExistance($ActualYr6,0,'ExistsInteger')."</td>";
									
									$LOAT=$qmobj->identifyIndicatorLevel($row['unitofmeasure'],$rowWP['fy1'],$rowWP['fy2'],$rowWP['fy3'],$rowWP['fy4'],$rowWP['fy5'],$rowWP['fy6'],$yr7=0);
									$LOAA=$qmobj->identifyIndicatorLevel($row['unitofmeasure'],$ActualYr1,$ActualYr2,$ActualYr3,$ActualYr4,$ActualYr5,$ActualYr6,$yr7=0);
									$data.="<td valign='' align='right'><strong>".checkExistance($LOAT,0,'ExistsInteger')."</strong></td>";
									$data.="<td align='right' >".checkExistance($LOAA,0,'ExistsInteger')."</td>";
									//$obj->alert($LOAT."-".$LOAA);
									$percentageAc=ColorCoding(calc_Percentage($LOAT,$LOAA),1);
									
									$data.=$percentageAc;
									
									
									$data.="</tr>";
$inc++;
		  }		
		  			}
		
		
			$data.="".noRecordsFound($query,10)."";
		 
     
$data.="</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function SemiAnnualAndAnnualIndicatorTracker($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
$qmobj= new QueryManager('');
$dmobj= new DataMining('');
if($_SESSION['username']==NULL){
$obj->alert("Your Session Has Expired Please Login again!");
$obj->redirect("index.php");
return $obj;
}

$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//----------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------
if($_SESSION['semiAnnual']=='Closed'||$_SESSION['fyear']=='Closed'){
$obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
}



$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report' width='100%' >
".filter_SemiAnnualAndAnnualIndicatorTracker($fnctName="SemiAnnualAndAnnualIndicatorTracker");
//

                        
			$data.="<tr><th rowspan='3' class='dataRow' >NO/SELECT</th>
			 <th rowspan=3 colspan='6' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='200' height='0.1'></th>
		
		<th colspan='30' class='dataRow' ><center>Activity Indicator Tracking Table for the for the Period 2013 - 2018 <em>, LOA=Life of Activity, T=Target,A=Actual, % Achieved=>((A/T)x100)</em></center></th>
		
			</tr>
			<tr>
			
     
             	<th  colspan='2' rowspan='2'  class='dataRow'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
			 	<th  colspan='1' rowspan='2' class='dataRow'>unit of measure</th>
			   <th  class='dataRow' rowspan='2'>Baseline</th>";
			   $data.="<th colspan='1'  rowspan='2'  class='dataRow'>LOA Targets</th>";
				$data.="<th colspan='1' rowspan='2' class='dataRow'>LOA Actuals</th>";
				$data.="<th colspan='1'   rowspan='2'  class='dataRow'><strong>% Achieved</strong> </th>";

			   
			   
				  
					$queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				    $opening_year=$queryHeader['opening_year'];
					$closure_year=$queryHeader['closure_year'];
				  //for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
				  //$obj->alert($opening_year, $closure_year);
				  //$obj->alert(list($opening_year));
            		$data.="<th width='100' class='dataRow' align='right' colspan='3' >
					Apr ".TheFinancialYear($opening_year,$closure_year,0)." - Sep ".TheFinancialYear($opening_year,$closure_year,0)."<img src='images/spacer2.png' width='20' height='0.1'></th>";
					
					$data.="<th width='100' class='dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,0)." - Sep ".TheFinancialYear($opening_year,$closure_year,1)."<img src='images/spacer2.png' width='20' height='0.1'></th>";
					
					$data.="<th width='100' class='dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,1)." - Sep ".TheFinancialYear($opening_year,$closure_year,2)."<img src='images/spacer2.png' width='20' height='0.1'></th>";
					
					$data.="<th width='100' class='dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,2)." - Sep ".TheFinancialYear($opening_year,$closure_year,3)."<img src='images/spacer2.png' width='20' height='0.1'></th>";
					
					$data.="<th width='100' class='dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,3)." - Sep ".TheFinancialYear($opening_year,$closure_year,4)."<img src='images/spacer2.png' width='20' height='0.1'></th>";
					
					$data.="<th width='100' class='dataRow' align='right' colspan='4' >
					 Oct ".TheFinancialYear($opening_year,$closure_year,4)."   - Mar ".TheFinancialYear($opening_year,$closure_year,5)."<img src='images/spacer2.png' width='20' height='0.1'></th>";
					
					//}
				   				    
				    $data.="</tr>";

$data.="<tr>";

$data.="<th width='100' class='dataRow' align='right'>T</th>";
					$data.="<th width='100' class='dataRow' align='right'>A</th>";
					$data.="<th colspan='1' class='dataRow'><strong>% Achieved</strong> </th>";



for($n=0;$n<5;$n++){
            		$data.="<th width='100' class='dataRow' align='right'>T</th>";
					$data.="<th width='100' class='dataRow' align='right'>A</th>";
					$data.="<th width='100' class='dataRow' align='right'>Annual</th>";
					$data.="<th colspan='1' class='dataRow'><strong>% Achieved</strong> </th>";
					
					}
$data.="</tr>";					
$inc=1;

			$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output_id']."%' order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";


$x=$qmobj->ViewIndicatorAnnualTargets($rowoutput['output_id']);
#$obj->alert($x);

	
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("WRKPlan-202"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"-";
		  $color=$row['indicator_id']%2==1?"evenrow":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#666666';\"";

	

		  $l="align=right";
		  
		 
 							$data.="<tr class=$color ".$events2.">
 									<td align=left>
 									
									
 									<INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >".$inc."</td>
           							<td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
									<td colspan='5' >".$row['indicator_name']."</td>
									<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
									<td align='left' colspan='1'>".$row['unitofmeasure']."</td>
								
									<td align=right >".number_format($base)."</td>";
									
										$y=$qmobj->ViewIndicatorAnnualTargetsReports($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year']);
										$qResults=Execute($y) or die(http("671"));
										$rowWP=FetchRecords($qResults);
										
										
										
										
										
					$ActualYr1=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr1');
					$ActualYr2=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr2');
					$ActualYr3=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr3');
					$ActualYr4=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr4');
					$ActualYr5=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr5');
					$ActualYr6=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr6');
										
									//$obj->alert($ActualYr1."-".$ActualYr2."-".$ActualYr3."-".$ActualYr4."-".$ActualYr5."-".$ActualYr6);
								
									$percentageAcyR1=ColorCoding(calc_Percentage($rowWP['fy1'],$ActualYr1),1);
									$percentageAcyR2=ColorCoding(calc_Percentage($rowWP['fy2'],$ActualYr2),1);
									$percentageAcyR3=ColorCoding(calc_Percentage($rowWP['fy3'],$ActualYr3),1);
									$percentageAcyR4=ColorCoding(calc_Percentage($rowWP['fy4'],$ActualYr4),1);
									$percentageAcyR5=ColorCoding(calc_Percentage($rowWP['fy5'],$ActualYr5),1);
									$percentageAcyR6=ColorCoding(calc_Percentage($rowWP['fy6'],$ActualYr6),1);
									
					$data.="<td valign='' align='right'><strong>".checkExistance($LOAT,0,'ExistsInteger')."</strong></td>
									<td align='right' >".checkExistance($LOAA,0,'ExistsInteger')."</td>";
									//$obj->alert($LOAT."-".$LOAA);
									$percentageAc=ColorCoding(calc_Percentage($LOAT,$LOAA),1);
									$data.=$percentageAc;
					
							$data.="<td align='right' ><INPUT type='hidden' name='workplan_id[]'
							   id='workplan_id' value='".$rowWP['workplan_id']."' >
		<INPUT type='hidden' name='region[]'   id='region' value='".$rowWP['region']."' >
		<INPUT type='hidden' name='curr_year[]'   id='curr_year ' value='".$rowWP['curr_year']."' >
									".checkExistance($rowWP['fy1'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr1,0,'ExistsInteger')."</td>";
									//$data.="<td align='right' >-</td>";
									$data.=$percentageAcyR1;
									
									$data.="<td align='right' >".checkExistance($rowWP['fy2'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr2,0,'ExistsInteger')."</td>";
									$data.="<td align='right' >-</td>";
									$data.=$percentageAcyR2;
								$data.="<td align='right' >".checkExistance($rowWP['fy3'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr3,0,'ExistsInteger')."</td>";
									$data.="<td align='right' >-</td>";
									$data.=$percentageAcyR3;
									
							$data.="<td align='right' colspan='1' >
									".checkExistance($rowWP['fy4'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr4,0,'ExistsInteger')."</td>";					
									$data.="<td align='right' >-</td>";
									$data.=$percentageAcyR4;
									
									
									$data.="<td align='right' colspan='1' >
									".checkExistance($rowWP['fy5'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr5,0,'ExistsInteger')."</td>
									";
									$data.="<td align='right' >-</td>";
									$data.=$percentageAcyR5;
									
									
									$data.="<td align='right' colspan='1' >
									".checkExistance($rowWP['fy6'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr6,0,'ExistsInteger')."</td>";
									$data.="<td align='right' >-</td>";
									$data.=$percentageAcyR6;
									
									
									$data.="</tr>";
$inc++;
		  }		
		  			}
		
		
			$data.="".noRecordsFound($query,10)."";
		 
     
$data.="</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

function ViewAnnualAchievementsReport($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
$qmobj= new QueryManager('');
$dmobj= new DataMining('');
if($_SESSION['username']==NULL){
$obj->alert("Your Session Has Expired Please Login again!");
$obj->redirect("index.php");
return $obj;
}



$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//----------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------
if($_SESSION['semiAnnual']=='Closed'||$_SESSION['fyear']=='Closed'){
$obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
}



$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >
".filter_ViewAnnualAchievementsReport($fnctName="ViewAnnualAchievementsReport");
//

                        
			$data.="<tr><th rowspan='3' class='dataRow' >NO/SELECT</th>
			 <th rowspan=3 colspan='6' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='200' height='0.1'></th>
		
		<th colspan='23' class='dataRow' ><center>Activity Indicator Tracking Table for the for the Period 2013 - 2018 <em>,  T=Target,A=Actual, % Achieved=>((A/T)x100)</em></center></th>
		
			</tr>
			<tr>
			
     
             	<th  colspan='2' rowspan='2'  class='dataRow'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
			 	<th  colspan='1' rowspan='2' class='dataRow'>unit of measure</th>
			   <th  class='dataRow' rowspan='2'>Baseline</th>";
				  
				   $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  //or die(http("WP-00236"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
            		$data.="<th width='100' class='dataRow' align='right' colspan='3' >FY ".$n."
					<img src='images/spacer2.png' width='15' height='0.1'></th>";
					
					}
				
				    $data.="</tr>";

$data.="<tr>";
for($n=0;$n<6;$n++){
            		$data.="<th width='100' class='dataRow' align='right'>T</th>";
					$data.="<th width='100' class='dataRow' align='right'>A</th>";
					$data.="<th width='100' class='dataRow' align='right'>% ACHV'T</th>";
					
					}
$data.="</tr>";					
$inc=1;

			$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output_id']."%' order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";


$x=$qmobj->ViewIndicatorAnnualTargets($rowoutput['output_id']);
#$obj->alert($x);

	
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("WRKPlan-202"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"-";
		  $color=$inc%2==1?"evenrow":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#666666';\"";

	

		  $l="align=right";
		  
		 
 							$data.="<tr class=$color ".$events2.">
 									<td align=left>
 									
									
 									<INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >".$inc."</td>
           							<td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
									<td colspan='5' >".$row['indicator_name']."</td>
									<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
									<td align='left' colspan='1'>".$row['unitofmeasure']."</td>
								
									<td align=right >".number_format($base)."</td>";
									
										$y=$qmobj->ViewIndicatorAnnualTargetsReports($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year']);
										$qResults=@Execute($y) or die(http("671"));
										$rowWP=FetchRecords($qResults);
										
										
										
										
										/*$obj->alert($xActual);
										$xActual=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr2');	
										//$Actualquery=@mysql_query($xActual) or die(http("DM-0027"));
										 $result1=@mysql_fetch_array($Actualquery);*/
										$ActualYr1=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr1');
										$ActualYr2=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr2');
										$ActualYr3=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr3');
										$ActualYr4=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr4');
										$ActualYr5=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr5');
										$ActualYr6=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr6');
										
						//$obj->alert($ActualYr1."-".$ActualYr2."-".$ActualYr3."-".$ActualYr4."-".$ActualYr5."-".$ActualYr6);
						//$obj->alert($LOAT."-".$LOAA);
									$percentageAcyR1=ColorCoding(calc_Percentage($rowWP['fy1'],$ActualYr1),1);
									$percentageAcyR2=ColorCoding(calc_Percentage($rowWP['fy2'],$ActualYr2),1);
									$percentageAcyR3=ColorCoding(calc_Percentage($rowWP['fy3'],$ActualYr3),1);
									$percentageAcyR4=ColorCoding(calc_Percentage($rowWP['fy4'],$ActualYr4),1);
									$percentageAcyR5=ColorCoding(calc_Percentage($rowWP['fy5'],$ActualYr5),1);
									$percentageAcyR6=ColorCoding(calc_Percentage($rowWP['fy6'],$ActualYr6),1);
									
									

									
									
								$data.="<td align='right' ><INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$rowWP['workplan_id']."' >
		<INPUT type='hidden' name='region[]'   id='region' value='".$rowWP['region']."' >
		<INPUT type='hidden' name='curr_year[]'   id='curr_year ' value='".$rowWP['curr_year']."' >
									".checkExistance($rowWP['fy1'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr1,0,'ExistsInteger')."</td>";
									$data.=$percentageAcyR1;
									
									$data.="<td align='right' >".checkExistance($rowWP['fy2'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr2,0,'ExistsInteger')."</td>";
									$data.=$percentageAcyR2;
									
								
									
									$data.="<td align='right' >".checkExistance($rowWP['fy3'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr3,0,'ExistsInteger')."</td>";
									$data.=$percentageAcyR3;
									
									
									$data.="<td align='right' colspan='1' >
									".checkExistance($rowWP['fy4'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr4,0,'ExistsInteger')."</td>
									";
									$data.=$percentageAcyR4;
									
									
									$data.="<td align='right' colspan='1' >
									".checkExistance($rowWP['fy5'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr5,0,'ExistsInteger')."</td>
									";
									
									$data.=$percentageAcyR5;
									
									
									$data.="<td align='right' colspan='1' >
									".checkExistance($rowWP['fy6'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr6,0,'ExistsInteger')."</td>";
									$data.=$percentageAcyR6;
																		
									
									$data.="</tr>";
$inc++;
		  }		
		  			}
		
		
			$data.="".noRecordsFound($query,10)."";
		 
     
$data.="</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

function ViewSemiAnnualReport($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
$qmobj= new QueryManager('');
$dmobj= new DataMining('');
if($_SESSION['username']==NULL){
$obj->alert("Your Session Has Expired Please Login again!");
$obj->redirect("index.php");
return $obj;
}



$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//----------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------
if($_SESSION['semiAnnual']=='Closed'||$_SESSION['fyear']=='Closed'){
$obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
}



$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >
".filter_annualTargetActivityReport($fnctName="ViewAnnualTargets");
//

                        
			$data.="<tr><th rowspan='3' class='dataRow' >NO/SELECT</th>
			 <th rowspan=3 colspan='6' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='200' height='0.1'></th>
		
		<th colspan='20' class='dataRow' ><center>Activity Indicator Tracking Table for the for the Period 2013 - 2018 <em>, LOA=Life of Activity, T=Target,A=Actual, % Achieved=>((LOAA/LOAT)x100)</em></center></th>
		
			</tr>
			<tr>
			
     
             	<th  colspan='2' rowspan='2'  class='dataRow'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
			 	<th  colspan='1' rowspan='2' class='dataRow'>unit of measure</th>
			   <th  class='dataRow' rowspan='2'>Baseline</th>";
				  
				   $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  //or die(http("WP-00236"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
            		$data.="<th width='100' class='dataRow' align='right' colspan='2' >FY ".$n."<img src='images/spacer2.png' width='15' height='0.1'></th>";
					
					}
				   $data.="<th colspan='1'  rowspan='2'  class='dataRow'>LOA Targets</th>";
				      $data.="<th colspan='1' rowspan='2' class='dataRow'>LOA Actuals</th>";
				   $data.="<th colspan='1'   rowspan='2'  class='dataRow'><strong>% Achieved</strong> </th>";
				    
				    $data.="</tr>";

$data.="<tr>";
for($n=0;$n<6;$n++){
            		$data.="<th width='100' class='dataRow' align='right'>T</th>";
					$data.="<th width='100' class='dataRow' align='right'>A</th>";
					
					}
$data.="</tr>";					
$inc=1;

			$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output_id']."%' order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";


$x=$qmobj->ViewIndicatorAnnualTargets($rowoutput['output_id']);
#$obj->alert($x);

	
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("WRKPlan-202"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"-";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#666666';\"";

	

		  $l="align=right";
		  
		 
 							$data.="<tr class=$color ".$events2.">
 									<td align=left>
 									
									
 									<INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >".$inc."</td>
           							<td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
									<td colspan='5' >".$row['indicator_name']."</td>
									<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
									<td align='left' colspan='1'>".$row['unitofmeasure']."</td>
								
									<td align=right >".number_format($base)."</td>";
									
										$y=$qmobj->ViewIndicatorAnnualTargetsReports($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year']);
										$qResults=Execute($y) or die(http("671"));
										$rowWP=FetchRecords($qResults);
										
										
										
										
										/*$obj->alert($xActual);
										$xActual=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr2');	
										//$Actualquery=@mysql_query($xActual) or die(http("DM-0027"));
										 $result1=@mysql_fetch_array($Actualquery);*/
										$ActualYr1=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr1');
										$ActualYr2=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr2');
										$ActualYr3=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr3');
										$ActualYr4=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr4');
										$ActualYr5=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr5');
										$ActualYr6=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr6');
										
									//$obj->alert($ActualYr1."-".$ActualYr2."-".$ActualYr3."-".$ActualYr4."-".$ActualYr5."-".$ActualYr6);
								$data.="<td align='right' ><INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$rowWP['workplan_id']."' >
									<INPUT type='hidden' name='region[]'   id='region' value='".$rowWP['region']."' >
									<INPUT type='hidden' name='curr_year[]'   id='curr_year ' value='".$rowWP['curr_year']."' >
									".checkExistance($rowWP['fy1'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr1,0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($rowWP['fy2'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr2,0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($rowWP['fy3'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr1,0,'ExistsInteger')."</td>";
									$data.="<td align='right' colspan='1' >".checkExistance($rowWP['fy4'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr4,0,'ExistsInteger')."</td>";
									$data.="<td align='right' colspan='1' >".checkExistance($rowWP['fy5'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr5,0,'ExistsInteger')."</td>";
									$data.="<td align='right' colspan='1' >".checkExistance($rowWP['fy6'],0,'ExistsInteger')."</td>
									<td align='right' >".checkExistance($ActualYr6,0,'ExistsInteger')."</td>";
									$LOAT=$qmobj->identifyIndicatorLevel($row['unitofmeasure'],$rowWP['fy1'],$rowWP['fy2'],$rowWP['fy3'],$rowWP['fy4'],$rowWP['fy5'],$rowWP['fy6'],$yr7=0);
									$LOAA=$qmobj->identifyIndicatorLevel($row['unitofmeasure'],$ActualYr1,$ActualYr2,$ActualYr3,$ActualYr4,$ActualYr5,$ActualYr6,$yr7=0);
									$data.="<td valign='' align='right'><strong>".checkExistance($LOAT,0,'ExistsInteger')."</strong></td>
									<td align='right' >".checkExistance($LOAA,0,'ExistsInteger')."</td>";
									//$obj->alert($LOAT."-".$LOAA);
									$percentageAc=ColorCoding(calc_Percentage($LOAT,$LOAA),1);
									
									$data.=$percentageAc;
									
									
									$data.="</tr>";
$inc++;
		  }		
		  			}
		
		
			$data.="".noRecordsFound($query,10)."";
		 
     
$data.="</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}











#************************************
$xajax->processRequest();

  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.5/'); 

?>
<script language="javascript" type="text/javascript" src="js/check.js">


-->

</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<title><?php heading($_GET['action']); ?></title>
<script type="text/javascript" src="js/number.js"></script>
<script type="text/javascript" src="js/check.js" language="javascript"></script>
<script type="text/javascript" src="js/popup.js" language="javascript"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>
<script type="text/javascript" src="js/add_upload.js" language="javascript"></script>
</head>

<body><table cellspacing='0'      width="100%" border="0" align="center" cellpadding="0" bgcolor="#F0F0F0" bordercolor="#CCCCCC" style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
  <tr>
    <td bgcolor="#F0F0F0">
<table cellspacing='0'      width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFFFFF" bordercolor="#CCCCCC"  style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
  <tr>
    <td bgcolor="#F0F0F0">&nbsp;</td>
    <td><?php require_once('connections/header.php'); ?></td>
    <td bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
  <tr>
    <td width="12%"  bgcolor="#F0F0F0">&nbsp;</td>
    <td width="76%" align="left" valign="top"><table cellspacing='0'      width="1011" border="0" bordercolor="">
      <tr>
        <td width="20%"  align="left" valign="top"><table cellspacing='0'      width="100%" border="0">
          <tr>
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;p"><?php require_once('connections/left_links.php'); ?></td>
          </tr>
        </table></td>
        <td width="80%" align="left" valign="top" style="text-align:justify; top:0px; ">
        
        <table cellspacing='0'      width="100%" border="0">
          <tr>
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;p"><div id="title">
      <?php title($_GET['linkvar'],$_GET['action']); ?>
    </div>
     
  
    <div id="bodyDisplay" align="left">
            <script language="JavaScript" type="text/javascript">
			<?php  $linkvar=$_GET['linkvar'];
			switch($linkvar){
			case"Performance Tracking Table":
			?>
		  	//xajax_ViewAnnualTargets('','','','','',1,20);
			xajax_ViewAnnualTargets('','','','','','','','','',1,20);
			<?php 
			break;
			case"Semi Annual and Annual Indicator Tracker (All Disaggregations)":
			?>
		  	xajax_SemiAnnualAndAnnualIndicatorTracker('','','','','','','','','',1,20);
			<?php 
			break;
			
			case"Annual Achievements":
			?>
		  	xajax_ViewAnnualAchievementsReport('','','','','','','','','',1,20);
			<?php 
			break;
			
			case"Semi Annual and Annual Indicator Tracker (Main Disaggregations)":
			?>
			xajax_SemiAnnualAndAnnualIndicatorTracker('','','','','','','','','',1,20);
			<?php 
			break;
			
			
			default: ?>
			
<?php } ?>

//xajax_OVCServicesRegister_summary('','');
    </script>
                  </div> </td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
    <td width="12%" bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
  <tr>
    <td height="38" bgcolor="#F0F0F0">&nbsp;</td>
    <td height="38"><?php require_once('connections/footer.php'); ?></td>
    <td height="38" bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
</table>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>

