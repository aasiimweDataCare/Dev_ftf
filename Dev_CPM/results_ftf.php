<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('connections/lib_connectExtended.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
global $sem_annual;
#*************************************
$xajax->register(XAJAX_FUNCTION,'ViewAnnualTargets'); //---PTT---
$xajax->register(XAJAX_FUNCTION,'ftfReport');//Semi Annual and Annual Indicator Tracker
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
		  $color=$row['indicator_id']%2==1?"evenrow":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#666666';\"";

	
		  $l="align=right";
		  
		 
 							$data.="<tr class=$color ".$events2.">
 									<td align=left>
 									
									
 									<INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >".$inc."</td>
   
									<td colspan='6' >".retrieve_info_withSpecialCharactersNowordLimit($row['indicator_name'])."</td>
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
										 switch($row['indicator_id']){
										/*  case 28://Jobs Atributed to FTF
										 $ActualYr1=$dmobj->viewJobsCreated($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],1);
										$ActualYr2=$dmobj->viewJobsCreated($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],2);
										$ActualYr3=$dmobj->viewJobsCreated($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],3);
										$ActualYr4=$dmobj->viewJobsCreated($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],4);
										$ActualYr5=$dmobj->viewJobsCreated($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],5);
										$ActualYr6=$dmobj->viewJobsCreated($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],6);
										 break; */
										 default:
	$ActualYr1=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr1');
	$ActualYr2=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr2');
	$ActualYr3=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr3');
	$ActualYr4=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr4');
	$ActualYr5=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr5');
	$ActualYr6=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr6');
										
										break;
										}
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



function ftfReport($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
	$obj= new xajaxResponse();
	$qmobj= new QueryManager('');
	$dmobj= new DataMining('');
	$ftfRepL1Obj= new FtFRepLevelOneDataMining('');
	$ftfRepL2Obj= new FtFRepLevelTwoDataMining('');
	$ftfRepL3Obj= new FtFRepLevelThreeDataMining('');
	
	
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
	
	
		$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'>";

			$data.="<table cellspacing='1'  id='report' width='100%' >".filter_ftfReport($fnctName="ftfReport");

			//start of report retrieval
            $data .= "<tr>
				<th rowspan='3' class='dataRow' >NO/SELECT</th>
				<th rowspan=3 colspan='6' width='' class='dataRow'>Indicator/Disaggregation</th>
				<th colspan='19' class='dataRow' ><center>FtF Report for the for the Period 2013 - 2018 <em>, T=Target,A=Actual</em></center></th>
            </tr>

			<tr>
				<th class='dataRow' rowspan='2'>Comment</th>
				<th class='dataRow' rowspan='2'>Deviation Narrative</th>
				<th class='dataRow' rowspan='2' colspan='2'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
				<th class='dataRow' rowspan='2'>unit of measure</th>
				<th class='dataRow' rowspan='2'>Baseline Year</th>
				<th class='dataRow' rowspan='2'>Baseline Value</th>";
				$queryHeader = @mysql_fetch_array(@mysql_query("SELECT * FROM tbl_workplan_setup WHERE status LIKE 'Open%' ORDER BY 1 ASC"));
				for ($n = intval($queryHeader['opening_year']); $n < intval($queryHeader['closure_year']); $n++) {
					switch ($n) {
						case 2013:
							$class = "yearOne";
							break;
						case 2014:
							$class = "yearTwo";
							break;
						case 2015:
							$class = "yearThree";
							break;
						case 2016:
							$class = "yearFour";
							break;
						case 2017:
							$class = "yearFive";
							break;
						case 2018:
							$class = "yearSix";
							break;

					}

                $data .= "<th width='100' class='" . $class . "'  align='right' colspan='2' >FY " . $n . "<img src='images/spacer2.png' width='15' height='0.1'></th>";

            }
            $data .= "</tr>";

            $data .= "<tr>";
            for ($n = 0; $n < 6; $n++) {
                switch ($n) {
                    case 0:
                        $class = "yearOne";
                        break;
                    case 1:
                        $class = "yearTwo";
                        break;
                    case 2:
                        $class = "yearThree";
                        break;
                    case 3:
                        $class = "yearFour";
                        break;
                    case 4:
                        $class = "yearFive";
                        break;
                    case 5:
                        $class = "yearSix";
                        break;

                  }


              $data .= "<th class='".$class."' width='100'  align='right'>T</th>";
              $data .= "<th class='".$class."'  width='100'  align='right'>A</th>";

                 }
              $data .= "</tr>";
			  $data.="<tr>
				<td colspan='26' align='center'><strong>Commodity Production and Marketing (CPM)</strong></td>
			  </tr>";
				$inc=1;
				$logicaloutput = @mysql_query("SELECT * FROM tbl_output WHERE output_id LIKE '" . $_SESSION['output_id'] . "%' AND display='Yes' ORDER BY output_code ASC") or die(http("PR-338"));
				while ($rowoutput = @mysql_fetch_array($logicaloutput)) {
					/* $data .= "<tr>";
						$data .= "<td><strong>" . $rowoutput['output_code'] . "</strong></td>";
						$data .= "<td colspan='20'><strong>" . $rowoutput['output_name'] . "</strong></td>";
					$data .= "</tr>"; */


					$x = $qmobj->ViewIndicatorAnnualTargetsFtF($rowoutput['output_id']);
					//$obj->alert($x);
					$_SESSION['queryExport'] = $x;
					$query = @mysql_query($x) or die(http(__line__));
					if (@mysql_num_rows($query) > 0)
						
						while ($row = @mysql_fetch_array($query)) {
							$baseline = $row['baseline'];
							$base = $baseline > 0 ? $baseline : "-";
							//$color = $inc % 2 == 1 ? "evenrow" : "white1";
							$color = "evenrow";
							$events2 = "onmouseover=\"this.style.backgroundColor='#666666';\" onmouseout=\"this.style.backgroundColor='';\"";
							$l = "align=right";

							/*start of main indicators frame*/
							$data .= "<tr class='".$color."' " . $events2 . ">";
								$data .= "<td align=left><INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='" . $row['indicator_id'] . "' >" . $inc . "</td>";
								$data .= "<td colspan='6' ><strong>" . stripslashes($row['indicator_name']) . "</strong></td>";
								$data .= "<td>comment</td>";
								$data .= "<td>narrative</td>";
								$data .= "<td align='left' colspan='2'>" . checkExistance($row['indicator_type'], '', 'ExistsString') . "</td>";
								$data .= "<td align='left' colspan='1'>" . $row['unitofmeasure'] . "</td>";
								$data .= "<td>baseYear</td>";
								$data .= "<td align=right >" . number_format($base) . "</td>";
								
								$y = $qmobj->ViewIndicatorAnnualTargetsReports($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year']);
								$qResults = Execute($y) or die(http(__line__));
								$rowWP = FetchRecords($qResults);
								
								switch ($row['indicator_id']) {
									default:
									$ActualYr1 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
									$ActualYr2 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
									$ActualYr3 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
									$ActualYr4 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
									$ActualYr5 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
									$ActualYr6 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

									break;
								}
								
								$data .= "<td align='right' class='yearOne'><INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='" . $rowWP['workplan_id'] . "' >";
								$data .= "<INPUT type='hidden' name='region[]'   id='region' value='" . $rowWP['region'] . "' >";
								$data .= "<INPUT type='hidden' name='curr_year[]'   id='curr_year ' value='" . $rowWP['curr_year'] . "' >";
								$data .= "" . checkExistance($rowWP['fy1'], 0, 'ExistsInteger') . "</td>";
								$data .= "<td align='right' class='yearOne'>" . checkExistance($ActualYr1, 0, 'ExistsInteger') . "</td>";
								$data .= "<td align='right' class='yearTwo'>" . checkExistance($rowWP['fy2'], 0, 'ExistsInteger') . "</td>";
								$data .= "<td align='right' class='yearTwo'>" . checkExistance($ActualYr2, 0, 'ExistsInteger') . "</td>";
								$data .= "<td align='right' class='yearThree'>" . checkExistance($rowWP['fy3'], 0, 'ExistsInteger') . "</td>";
								$data .= "<td align='right' class='yearThree'>" . checkExistance($ActualYr3, 0, 'ExistsInteger') . "</td>";
								$data .= "<td align='right' class='yearFour'>" . checkExistance($rowWP['fy4'], 0, 'ExistsInteger') . "</td>";
								$data .= "<td align='right' class='yearFour'>" . checkExistance($ActualYr4, 0, 'ExistsInteger') . "</td>";
								$data .= "<td align='right' class='yearFive'>" . checkExistance($rowWP['fy5'], 0, 'ExistsInteger') . "</td>";
								$data .= "<td align='right' class='yearFive'>" . checkExistance($ActualYr5, 0, 'ExistsInteger') . "</td>";
								$data .= "<td align='right' class='yearSix'>" . checkExistance($rowWP['fy6'], 0, 'ExistsInteger') . "</td>";
								$data .= "<td align='right' class='yearSix'>" . checkExistance($ActualYr6, 0, 'ExistsInteger') . "</td>";
								
							$data .= "</tr>";
							/*End of main Indicators frame*/
							
							//$color=bluish/white1
							/* start of disaggregates per indicator */
							
								$i=1;
								$cpmonly=$qmobj->cpmSubIndicatorsOnly($row['indicator_id']);
								$qCpmonly=@Execute($cpmonly)or die(http(__line__)); 
								while($rowCpm=@FetchRecords($qCpmonly)){
									$baseline = $rowCpm['baseline'];
                $base = 			$baseline > 0 ? $baseline : "-";
									
									if($rowCpm['otherMeasures']==''){
									
									}else{ //Start sub-indicator level_one
										
										$data.="<tr class='ftfRpLevelOne' ".$events2.">";
											$data.="<td align='right'>".$inc.".".$i.".</td>";
											$data.="<td colspan='6'>".$rowCpm['otherMeasures']."</td>";
											$data.="<td align='left'>c</td>";
											$data.="<td align='left'>d</td>";
											$data.="<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>";
											$data.="<td align='left'>".$row['unitofmeasure']."</td>";
											$data.="<td align='left'>bYear</td>";
											$data.="<td align='right' align='right'>" . number_format($base,2) . "</td>";
											//$ftfRepL1Obj
											switch ($rowCpm['sub_indicatorId']) {
												default:
												$Actl1Yr1 = $ftfRepL1Obj->l1MiningIndicator($rowCpm['sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr1');
												$Actl1Yr2 = $ftfRepL1Obj->l1MiningIndicator($rowCpm['sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr2');
												$Actl1Yr3 = $ftfRepL1Obj->l1MiningIndicator($rowCpm['sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr3');
												$Actl1Yr4 = $ftfRepL1Obj->l1MiningIndicator($rowCpm['sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr4');
												$Actl1Yr5 = $ftfRepL1Obj->l1MiningIndicator($rowCpm['sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr5');
												$Actl1Yr6 = $ftfRepL1Obj->l1MiningIndicator($rowCpm['sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr6');

												break;
											}
											
											$data.="<td align='right' class='yearOne'></td>";
											$data.="<td align='right' class='yearOne'>" . displayValues($Actl1Yr1,0) . "</td>";
											$data.="<td align='right' class='yearTwo'></td>";
											$data.="<td align='right' class='yearTwo'>" . displayValues($Actl1Yr2,0)  . "</td>";
											$data.="<td align='right' class='yearThree'></td>";
											$data.="<td align='right' class='yearThree'>" . displayValues($Actl1Yr3,0)  . "</td>";
											$data.="<td align='right' class='yearFour'></td>";
											$data.="<td align='right' class='yearFour'>" . displayValues($Actl1Yr4,0)  . "</td>";
											$data.="<td align='right' class='yearFive'></td>";
											$data.="<td align='right' class='yearFive'>" . displayValues($Actl1Yr5,0)  . "</td>";
											$data.="<td align='right' class='yearSix'></td>";
											$data.="<td align='right' class='yearSix'>" . displayValues($Actl1Yr6,0)  . "</td>";
											
										$data.="</tr>";
										//Start sub-indicator level_two
										$j=1;
										$cpmonlylevel_two=$qmobj->cpmSubIndicatorsOnlylevel_two($rowCpm['indicator_id'],$rowCpm['sub_indicatorId']);
										//$obj->alert($cpmonlylevel_two);
										$qCpmonlylevel_two=@Execute($cpmonlylevel_two)or die(http(__line__)); 
										while($rowCpmlevel_two=@FetchRecords($qCpmonlylevel_two)){
											if($rowCpmlevel_two['otherMeasures']==''){

											}else{
												$data.="<tr class='ftfRpLevelTwo' ".$events2.">";
												$data.="<td align='right'>".$inc.".".$i.".".$j.".</td>";
												$data.="<td colspan='6'>".$rowCpmlevel_two['otherMeasures']."</td>";
												$data.="<td align='left'>c</td>";
												$data.="<td align='left'>d</td>";
												$data.="<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>";
												$data.="<td align='left'>".$row['unitofmeasure']."</td>";
												$data.="<td align='left'>".$rowCpmlevel_two['baselineYear']."</td>";
												$data.="<td align='right' align='right'>".number_format($rowCpmlevel_two['baseline'],2)."</td>";
												
												//$ftfRepL2Obj
												switch ($rowCpmlevel_two['level_two_sub_indicatorId']) {
													default:
													$Actl2Yr1 = $ftfRepL2Obj->l2MiningIndicator($rowCpmlevel_two['level_two_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr1');
													$Actl2Yr2 = $ftfRepL2Obj->l2MiningIndicator($rowCpmlevel_two['level_two_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr2');
													$Actl2Yr3 = $ftfRepL2Obj->l2MiningIndicator($rowCpmlevel_two['level_two_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr3');
													$Actl2Yr4 = $ftfRepL2Obj->l2MiningIndicator($rowCpmlevel_two['level_two_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr4');
													$Actl2Yr5 = $ftfRepL2Obj->l2MiningIndicator($rowCpmlevel_two['level_two_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr5');
													$Actl2Yr6 = $ftfRepL2Obj->l2MiningIndicator($rowCpmlevel_two['level_two_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr6');

													break;
												}
												
												$data.="<td align='right' class='yearOne'></td>";
												$data.="<td align='right' class='yearOne'>" . displayValues($Actl2Yr1,0)  . "</td>";
												$data.="<td align='right' class='yearTwo'></td>";
												$data.="<td align='right' class='yearTwo'>" . displayValues($Actl2Yr2,0)  . "</td>";
												$data.="<td align='right' class='yearThree'></td>";
												$data.="<td align='right' class='yearThree'>" . displayValues($Actl2Yr3,0)  . "</td>";
												$data.="<td align='right' class='yearFour'></td>";
												$data.="<td align='right' class='yearFour'>" . displayValues($Actl2Yr4,0)  . "</td>";
												$data.="<td align='right' class='yearFive'></td>";
												$data.="<td align='right' class='yearFive'>" . displayValues($Actl2Yr5,0)  . "</td>";
												$data.="<td align='right' class='yearSix'></td>";
												$data.="<td align='right' class='yearSix'>" . displayValues($Actl2Yr6,0)  . "</td>";
												
												$data.="</tr>";
												
												//Start sub-indicator level_three
												$k=1;
												$cpmonlylevel_three=$qmobj->cpmSubIndicatorsOnlylevel_three($rowCpmlevel_two['sub_indicatorId'],$rowCpmlevel_two['level_two_sub_indicatorId']);
												//$obj->alert($cpmonlylevel_three);
												$qCpmonlylevel_three=@Execute($cpmonlylevel_three)or die(http(__line__)); 
												while($rowCpmlevel_three=@FetchRecords($qCpmonlylevel_three)){
													$colorLevelThree = $k % 2 == 1 ? "bluish" : "white1";
													if($rowCpmlevel_three['otherMeasures']==''){

													}else{
														$data.="<tr class='".$colorLevelThree."' ".$events2.">";
														$data.="<td align='right'>".$inc.".".$i.".".$j.".".$k.".</td>";
														$data.="<td colspan='6'>".$rowCpmlevel_three['otherMeasures']."</td>";
														$data.="<td align='left'>c</td>";
														$data.="<td align='left'>d</td>";
														$data.="<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>";
														$data.="<td align='left'>".$row['unitofmeasure']."</td>";
														$data.="<td align='left'>".$rowCpmlevel_three['baselineYear']."</td>";
														$data.="<td align='right' align='right'>".number_format($rowCpmlevel_three['baseline'],2)."</td>";
														
														//$ftfRepL3Obj
														switch ($rowCpmlevel_three['level_three_sub_indicatorId']) {
															default:
															$Actl3Yr1 = $ftfRepL3Obj->l3MiningIndicator($rowCpmlevel_three['level_three_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr1');
															$Actl3Yr2 = $ftfRepL3Obj->l3MiningIndicator($rowCpmlevel_three['level_three_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr2');
															$Actl3Yr3 = $ftfRepL3Obj->l3MiningIndicator($rowCpmlevel_three['level_three_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr3');
															$Actl3Yr4 = $ftfRepL3Obj->l3MiningIndicator($rowCpmlevel_three['level_three_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr4');
															$Actl3Yr5 = $ftfRepL3Obj->l3MiningIndicator($rowCpmlevel_three['level_three_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr5');
															$Actl3Yr6 = $ftfRepL3Obj->l3MiningIndicator($rowCpmlevel_three['level_three_sub_indicatorId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'actualYr6');

															break;
														}
														
														$data.="<td align='right' class='yearOne'></td>";
														$data.="<td align='right' class='yearOne'>" . displayValues($Actl3Yr1,0)  . "</td>";
														$data.="<td align='right' class='yearTwo'></td>";
														$data.="<td align='right' class='yearTwo'>" . displayValues($Actl3Yr2,0)  . "</td>";
														$data.="<td align='right' class='yearThree'></td>";
														$data.="<td align='right' class='yearThree'>" . displayValues($Actl3Yr3,0)  . "</td>";
														$data.="<td align='right' class='yearFour'></td>";
														$data.="<td align='right' class='yearFour'>" . displayValues($Actl3Yr4,0)  . "</td>";
														$data.="<td align='right' class='yearFive'></td>";
														$data.="<td align='right' class='yearFive'>" . displayValues($Actl3Yr5,0)  . "</td>";
														$data.="<td align='right' class='yearSix'></td>";
														$data.="<td align='right' class='yearSix'>" . displayValues($Actl3Yr6,0)  . "</td>";
														$data.="</tr>";
														$k++;
													}
												}//End sub-indicator level_three
												
												$j++;	
											}
											
										}//End sub-indicator level_two
										
										$i++;
									}//End sub-indicator level_one
								/* end of disaggregates per indicator */
							
						}//End of main indicator Targets
					$inc++;
					}
				}//end of Logical output retrieval 

			//end of report retrieval

			$data.="</table>";
		
		$data.="</form>";
	
	$obj->assign('bodyDisplay','innerHTML',$data);
	$obj->call("hideLoadingDiv");
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
									<td colspan='5' >".retrieve_info_withSpecialCharactersNowordLimit($row['indicator_name'])."</td>
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
		
		<th colspan='20' class='dataRow' ><center>Feed the Future Report  for the Period 2013 - 2018 <em>, LOA=Life of Activity, T=Target,A=Actual, % Achieved=>((LOAA/LOAT)x100)</em></center></th>
		
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
									<td colspan='5' >".retrieve_info_withSpecialCharactersNowordLimit($row['indicator_name'])."</td>
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
    <?php $xajax->printJavascript('xajax_0.5/'); ?>

    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/loading.css" rel="stylesheet" type="text/css" />
    <title><?php heading($_GET['action']); ?></title>
    <script type="text/javascript" src="js/number.js"></script>
    <script type="text/javascript" src="js/addRow.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
    <script type="text/javascript" src="js/loading.js" language="javascript"></script>
    <script type="text/javascript" src="js/check.js" language="javascript"></script>
    <script type="text/javascript" src="js/popup.js" language="javascript"></script>
    <script type="text/javascript" src="js/js.js" language="javascript"></script>
    <script type="text/javascript" src="js/limit_text.js" language="javascript"></script>
    <script type="text/javascript" src="js/add_upload.js" language="javascript"></script>
</head>

<body>
<div align='center' height='900' id='dvLoading'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Report...</span></div>
<table cellspacing='0' width="100%" border="0" align="center" cellpadding="0" bgcolor="#F0F0F0" bordercolor="#CCCCCC" style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
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
			case"Annual Achievements":
			?>
		  	xajax_ViewAnnualAchievementsReport('','','','','','','','','',1,20);
			<?php 
			break;
			
			case"FtF Report":
			?>
			xajax_ftfReport('','','','','','','','','',1,20);
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

