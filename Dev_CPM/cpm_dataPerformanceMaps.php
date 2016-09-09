<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connectExtended.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
global $sem_annual;
#*************************************
$xajax->register(XAJAX_FUNCTION,'dashboard');
$xajax->register(XAJAX_FUNCTION,'DataPerformanceMaps');//Semi Annual and Annual Indicator Tracker with Regional disaggregation


require_once('ActivityFilters.php');
#************************xxxxxxxxxxxxxxx************************
#************************xxxxxxxxxxxxxxx***********************

#-======

//Start here
function DataPerformanceMaps($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
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

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'>
<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".filter_DataPerformanceMaps($fnctName="DataPerformanceMaps");
   
			$data.="<tr><th rowspan='3' class='first-cell-header dataRow' >#</th>
			 <th rowspan=3 colspan='6' class='largest-cell-header dataRow'>Indicator</th>
		<th colspan='30' class='small-cell-header dataRow' >
		Data Performance Maps on Activity Indicator Tracking Table for the for the Period 2013 - 2018 <em>, LOA=Life of Activity, T=Target,A=Actual, % Achieved=>((A/T)x100)</em>
		</th>
		
			</tr>
			<tr>
			
     
             	<th  colspan='2' rowspan='2'  class='small-cell-header dataRow'>type of Indicator</th>
			 	<th  colspan='1' rowspan='2' class='small-cell-header dataRow'>unit of measure</th>
			   <th  class='small-cell-header  dataRow' rowspan='2'>Baseline</th>";
			   $data.="<th colspan='1'  rowspan='2'  class='small-cell-header dataRow'>LOA Targets</th>";
				$data.="<th colspan='1' rowspan='2' class='small-cell-header dataRow'>LOA Actuals</th>";
				$data.="<th colspan='1'   rowspan='2'  class='small-cell-header dataRow'><strong>% Achieved</strong> </th>";

			   
			   
				  
					$queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				    $opening_year=$queryHeader['opening_year'];
					$closure_year=$queryHeader['closure_year'];
					$one="background:#F0E68C; color:black;";
					$two="background:#f38fbf; color:black;";
					$three="background:#ccffff; color:black;";
					$four="background:#fde9d9; color:black;";
					$five="background:#ccccff; color:black;";
					$six="background:#98FB98; color:black;";
					
            		$data.="<th width='100' style='".$one."'  class='small-cell-header dataRow' align='right' colspan='3' >
					Apr ".TheFinancialYear($opening_year,$closure_year,0)." - Sep ".TheFinancialYear($opening_year,$closure_year,0)."</th>";
					
					$data.="<th width='100' style='".$two."'  class='small-cell-header dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,0)." - Sep ".TheFinancialYear($opening_year,$closure_year,1)."</th>";
					
					$data.="<th width='100' style='".$three."'  class='small-cell-header dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,1)." - Sep ".TheFinancialYear($opening_year,$closure_year,2)."</th>";
					
					$data.="<th width='100' style='".$four."' class='small-cell-header dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,2)." - Sep ".TheFinancialYear($opening_year,$closure_year,3)."</th>";
					
					$data.="<th width='100' style='".$five."'  class='small-cell-header dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,3)." - Sep ".TheFinancialYear($opening_year,$closure_year,4)."</th>";
					
					$data.="<th width='100' style='".$six."'  class='small-cell-header dataRow' align='right' colspan='4' >
					 Oct ".TheFinancialYear($opening_year,$closure_year,4)."   - Mar ".TheFinancialYear($opening_year,$closure_year,5)."</th>";
					
					
				   				    
				    $data.="</tr>";

$data.="<tr>";

$data.="<th style='".$one."'  width='100' class='small-cell-header dataRow' align='right'>T</th>";
$data.="<th style='".$one."'  width='100' class='small-cell-header dataRow' align='right'>A</th>";
$data.="<th style='".$one."'  colspan='1' class='small-cell-header dataRow'><strong>% Achieved</strong> </th>";



for($n=0;$n<5;$n++){
	switch ($n){
                                    
                                    
									case 0:
                                    $bgcolor="background:#f38fbf; color:black;";
                                    break;
                                    case 1:
                                    $bgcolor="background:#ccffff; color:black;";
                                    break;
                                    case 2:
                                    $bgcolor="background:#fde9d9; color:black;";
                                    break;
                                    case 3:
                                    $bgcolor="background:#ccccff; color:black;";
                                    break;
                                    case 4:
                                    $bgcolor="background:#98FB98; color:black;"; 
									break;
									default:
									break;
                                        
                                    }
	
            		$data.="<th style='".$bgcolor."' width='100' class='small-cell-header dataRow' align='right'>T</th>";
					$data.="<th style='".$bgcolor."' width='100' class='small-cell-header dataRow' align='right'>A</th>";
					$data.="<th style='".$bgcolor."' width='100' class='small-cell-header dataRow' align='right'>Annual</th>";
					$data.="<th style='".$bgcolor."' colspan='1' class='small-cell-header dataRow'><strong>% Achieved</strong> </th>";
					
					}
$data.="</tr>
</thead>
<tbody>";					
$inc=1;

			$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output_id']."%' order by output_code asc")or die(http(__line__));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr style='background-color:#DCDCDC;'>
<td><strong>".$rowoutput['output_code']."</strong></td>
<td colspan='36'><strong>".$rowoutput['output_name']."</strong></td>
</tr>";


$x=$qmobj->ViewIndicatorAnnualTargets($rowoutput['output_id']);
//$obj->alert($x);

	
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http(__line__));
	if(@mysql_num_rows($query)>0)
		while($row=@mysql_fetch_array($query)){
			$div='Mapping'.$row['indicator_id'];
			$baseline=$row['baseline'];
			$base=$baseline>0?$baseline:"-";
			


			$y=$qmobj->ViewIndicatorAnnualTargetsReports($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year']);
			$qResults=Execute($y) or die(http(__line__));
			$rowWP=FetchRecords($qResults);
			$tYr1 = $rowWP['fy1'];
			$tYr2 = $rowWP['fy2'];
			$tYr3 = $rowWP['fy3'];
			$tYr4 = $rowWP['fy4'];
			$tYr5 = $rowWP['fy5'];
			$tYr6 = $rowWP['fy6'];
			
	

			$l="align=right";
		  
		 
 							$data.="<tr>
 									<td align=left>
 									
									
 									<input type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >".$inc."</td>
           							<td align=left ><input type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
									<td colspan='5' >".retrieve_info_withSpecialCharactersNowordLimit($row['indicator_name'])."</td>
									<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
									<td align='left' colspan='1'>".$row['unitofmeasure']."</td>
								
									<td align=right >".number_format($base)."</td>";
									
										
										$ActualYr1=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr1');
										$ActualYr2=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr2');
										$ActualYr3=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr3');
										$ActualYr4=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr4');
										$ActualYr5=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr5');
										$ActualYr6=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr6');
															
										//$obj->alert($ActualYr1."-".$ActualYr2."-".$ActualYr3."-".$ActualYr4."-".$ActualYr5."-".$ActualYr6);
								
									
									
									
									$one="background:#F0E68C;";
									$two="background:#f38fbf;";
									$three="background:#ccffff;";
									$four="background:#fde9d9;";
									$five="background:#ccccff;";
									$six="background:#98FB98;";
									
									$percentageAcyR1=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy1'],$ActualYr1),1,1,$one);
									$percentageAcyR2=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy2'],$ActualYr2),1,1,$two);
									$percentageAcyR3=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy3'],$ActualYr3),1,1,$three);
									$percentageAcyR4=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy4'],$ActualYr4),1,1,$four);
									$percentageAcyR5=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy5'],$ActualYr5),1,1,$five);
									$percentageAcyR6=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy6'],$ActualYr6),1,1,$six); 
									
									
									
					$data.="<td valign='' align='right'><strong>".checkExistance($LOAT,0,'ExistsInteger')."</strong></td>
									<td align='right' >".checkExistance($LOAA,0,'ExistsInteger')."</td>";
									//$obj->alert($LOAT."-".$LOAA);
									$percentageAc=ColorCoding(calc_Percentage($LOAT,$LOAA),1);
									$data.=$percentageAc;
					
							$data.="<td align='right' style='".$one."' >";
								$data.="<input type='hidden' name='workplan_id[]' id='workplan_id' value='".$rowWP['workplan_id']."' >";
								$data.="<input type='hidden' name='region[]'   id='region' value='".$rowWP['region']."' >";
								$data.="<input type='hidden' name='curr_year[]'   id='curr_year ' value='".$rowWP['curr_year']."' >";
							$data.="".checkExistance($rowWP['fy1'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$one."' >".checkExistance($ActualYr1,0,'ExistsInteger')."</td>";
							$data.=$percentageAcyR1;
									
							$data.="<td align='right' style='".$two."' >".checkExistance($rowWP['fy2'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$two."' >".checkExistance($ActualYr2,0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$two."' >-</td>";
							$data.=$percentageAcyR2;
							
							$data.="<td align='right' style='".$three."' >".checkExistance($rowWP['fy3'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$three."' >".checkExistance($ActualYr3,0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$three."' >-</td>";
							$data.=$percentageAcyR3;
									
							$data.="<td align='right' style='".$four."' colspan='1'>".checkExistance($rowWP['fy4'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$four."' >".checkExistance($ActualYr4,0,'ExistsInteger')."</td>";					
							$data.="<td align='right' style='".$four."' >-</td>";
							$data.=$percentageAcyR4;
							
							$data.="<td align='right' style='".$five."' colspan='1' >".checkExistance($rowWP['fy5'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$five."' >".checkExistance($ActualYr5,0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$five."' >-</td>";
							$data.=$percentageAcyR5;
									
							$data.="<td align='right' style='".$six."' colspan='1' >".checkExistance($rowWP['fy6'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$six."' >".checkExistance($ActualYr6,0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$six."' >-</td>";
							$data.=$percentageAcyR6;
									
									
							$data.="</tr>";
							
							$data.="<tr>
							<td colspan='37'>
							<div id='".$div."'>".dashboard($tYr1,$tYr2,$tYr3,$tYr4,$tYr5,$tYr6,$row['indicator_id'],$div)."</div>
							</td>
							</tr>";

$inc++;
}


		  			}
		
		
			$data.="".noRecordsFound($query,10)."";
		 
     
$data.="</tbody>
</table>
</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}

//start of Graph
function dashboard($tYr1,$tYr2,$tYr3,$tYr4,$tYr5,$tYr6,$indicatorId,$div){
	
$obj= new xajaxResponse();
$qmobj= new QueryManager('');
$pmobj= new PerfMapsDataMining('');

$title=$qmobj->RetrieveData($table="tbl_indicator",$condition="indicator_id",$indicatorId,'indicator_name');
$unit=$qmobj->RetrieveData($table="tbl_indicator",$condition="indicator_id",$indicatorId,'unitofmeasure');

//$obj->alert($tYr2);

if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
} 
$inc=1;

$queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
$opening_year=$queryHeader['opening_year'];
$closure_year=$queryHeader['closure_year'];

	


$data.="<table width='100%' border='0' callpadding='1' cellspacing='1'>
<tr>
<td colspan='19' height='550px'>
<table standard-report-grid width='55%' height='550px' style='margin: 1 0 1 0;' border='0' cellspacing='1' cellpadding='1'>
<tr>
	<th colspan='19'><strong>DATA FACT SHEET ON:".$title."</strong></th>
</tr>
<tr>
	<th colspan='2' rowspan='2' class='small-cell-header dataRow'></th>
	<th colspan='2' class='small-cell-header dataRow'>2013</th>
	<th colspan='2' class='small-cell-header dataRow'>2014</th>
	<th colspan='2' class='small-cell-header dataRow'>2015</th>
	<th colspan='2' class='small-cell-header dataRow'>2016</th>
	<th colspan='2' class='small-cell-header dataRow'>2017</th>
	<th colspan='2' class='small-cell-header dataRow'>2018</th>
	<th rowspan='2' class='small-cell-header dataRow'>Target</th>
	<th rowspan='2' class='small-cell-header dataRow'>Actual</th>
	<th rowspan='2' class='small-cell-header dataRow'>% Achievement</th>
</tr>
<tr>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
</tr>";
//$obj->alert($indicatorId);

switch ($indicatorId) {
//The start of indicator:13
	default:
		for($i=1; $i<=12; $i++ ){
		$arrayNewIndicator= array("".$indicatorId.".".$i."",);
			foreach ($arrayNewIndicator as  $newIndicatorId){
				switch ($newIndicatorId) {
				case "".$indicatorId.".1":
					//North-coffee
					$NC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$NC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$NC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$NC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$NC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$NC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".2":
					//North-maize
					$NM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$NM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$NM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$NM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$NM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$NM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".3":
					//North-beans
					$NB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$NB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$NB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$NB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$NB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$NB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
				break;

				case "".$indicatorId.".4":
				//West-coffee
					$WC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$WC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$WC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$WC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$WC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$WC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".5":
				//West-maize
					$WM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$WM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$WM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$WM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$WM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$WM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".6":
				//West-beans
					$WB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$WB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$WB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$WB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$WB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$WB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
				break;

				case "".$indicatorId.".7":
				//East-coffee
					$EC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$EC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$EC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$EC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$EC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$EC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".8":
				//East-maize
					$EM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$EM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$EM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$EM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$EM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$EM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".9":
				//East-beans
					$EB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$EB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$EB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$EB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$EB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$EB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
				break;

				case "".$indicatorId.".10":
				//Central-coffee
					$CC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$CC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$CC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$CC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$CC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$CC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".11":
				//Central-maize
					$CM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$CM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$CM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$CM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$CM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$CM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".12":
				//Central-beans
					$CB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$CB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$CB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$CB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$CB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$CB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
				break;



				default:
				break;
				}
			}

		}
	break;
	//The end of indicator:13	
}

$data.="<tr>";
$data.="<td colspan='' rowspan='3'><strong>North</strong></td>";
$data.="<td><strong>Coffee</strong></td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr1))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr2))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr3))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr4))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr5))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr6))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr6,2)."</td>";

$NC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeNorth($tYr1), targetsCoffeeNorth($tYr2), targetsCoffeeNorth($tYr3), targetsCoffeeNorth($tYr4), targetsCoffeeNorth($tYr5), targetsCoffeeNorth($tYr6), $yr7 = 0);
$NC_LOAA = $qmobj->dataMapsActual($NC_ActualYr1, $NC_ActualYr2, $NC_ActualYr3, $NC_ActualYr4, $NC_ActualYr5, $NC_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($NC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($NC_LOAA, 0, 'ExistsInteger') . "</td>";
$NC_percentageAc = ColorCoding(calc_Percentage($NC_LOAT, $NC_LOAA), 1);
$data .= $NC_percentageAc;

$data.="</tr>";



$data.="<tr>";
$data.="<td colspan=''><strong>Maize</strong></td>";

$data.="<td align='right'>".number_format(targetsMaizeNorth($tYr1))."</td>
<td align='right'>".number_format($NM_ActualYr1,2)."</td>
<td align='right'>".number_format(targetsMaizeNorth($tYr2))."</td>
<td align='right'>".number_format($NM_ActualYr2,2)."</td>
<td align='right'>".number_format(targetsMaizeNorth($tYr3))."</td>
<td align='right'>".number_format($NM_ActualYr3,2)."</td>
<td align='right'>".number_format(targetsMaizeNorth($tYr4))."</td>
<td align='right'>".number_format($NM_ActualYr4,2)."</td>
<td align='right'>".number_format(targetsMaizeNorth($tYr5))."</td>
<td align='right'>".number_format($NM_ActualYr5,2)."</td>
<td align='right'>".number_format(targetsMaizeNorth($tYr6))."</td>
<td align='right'>".number_format($NM_ActualYr6,2)."</td>";

$NM_LOAT = $qmobj->dataMapsTargets(targetsMaizeNorth($tYr1), targetsMaizeNorth($tYr2), targetsMaizeNorth($tYr3), targetsMaizeNorth($tYr4), targetsMaizeNorth($tYr5), targetsMaizeNorth($tYr6), $yr7 = 0);
$NM_LOAA = $qmobj->dataMapsActual($NM_ActualYr1, $NM_ActualYr2, $NM_ActualYr3, $NM_ActualYr4, $NM_ActualYr5, $NM_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($NM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($NM_LOAA, 0, 'ExistsInteger') . "</td>";
$NM_percentageAc = ColorCoding(calc_Percentage($NM_LOAT, $NM_LOAA), 1);
$data .= $NM_percentageAc;	

$data.="</tr>";

$data.="<tr >";
$data.="<td colspan=''><strong>Beans</strong></td>";

$data.="<td align='right'>".number_format(targetsBeansNorth($tYr1))."</td>
<td align='right'>".number_format($NB_ActualYr1,2)."</td>
<td align='right'>".number_format(targetsBeansNorth($tYr2))."</td>
<td align='right'>".number_format($NB_ActualYr2,2)."</td>
<td align='right'>".number_format(targetsBeansNorth($tYr3))."</td>
<td align='right'>".number_format($NB_ActualYr3,2)."</td>
<td align='right'>".number_format(targetsBeansNorth($tYr4))."</td>
<td align='right'>".number_format($NB_ActualYr4,2)."</td>
<td align='right'>".number_format(targetsBeansNorth($tYr5))."</td>
<td align='right'>".number_format($NB_ActualYr5,2)."</td>
<td align='right'>".number_format(targetsBeansNorth($tYr6))."</td>
<td align='right'>".number_format($NB_ActualYr6,2)."</td>";

$NB_LOAT = $qmobj->dataMapsTargets(targetsBeansNorth($tYr1), targetsBeansNorth($tYr2), targetsBeansNorth($tYr3), targetsBeansNorth($tYr4), targetsBeansNorth($tYr5), targetsBeansNorth($tYr6), $yr7 = 0);
$NB_LOAA = $qmobj->dataMapsActual($NB_ActualYr1, $NB_ActualYr2, $NB_ActualYr3, $NB_ActualYr4, $NB_ActualYr5, $NB_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($NB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($NB_LOAA, 0, 'ExistsInteger') . "</td>";
$NB_percentageAc = ColorCoding(calc_Percentage($NB_LOAT, $NB_LOAA), 1);
$data .= $NB_percentageAc;	

$data.="</tr>";

//Start West
$data.="<tr>";
$data.="<td colspan='' rowspan='3'><strong>West</strong></td>";
$data.="<td><strong>Coffee</strong></td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr1))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr2))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr3))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr4))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr5))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr6))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr6,2)."</td>";

$WC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeWest($tYr1), targetsCoffeeWest($tYr2), targetsCoffeeWest($tYr3), targetsCoffeeWest($tYr4), targetsCoffeeWest($tYr5), targetsCoffeeWest($tYr6), $yr7 = 0);
$WC_LOAA = $qmobj->dataMapsActual($WC_ActualYr1, $WC_ActualYr2, $WC_ActualYr3, $WC_ActualYr4, $WC_ActualYr5, $WC_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($WC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($WC_LOAA, 0, 'ExistsInteger') . "</td>";
$WC_percentageAc = ColorCoding(calc_Percentage($WC_LOAT, $WC_LOAA), 1);
$data .= $WC_percentageAc;

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Maize</strong></td>";

$data.="<td align='right'>".number_format(targetsMaizeWest($tYr1))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeWest($tYr2))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeWest($tYr3))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeWest($tYr4))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeWest($tYr5))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeWest($tYr6))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr6,2)."</td>";

$WM_LOAT = $qmobj->dataMapsTargets(targetsMaizeWest($tYr1), targetsMaizeWest($tYr2), targetsMaizeWest($tYr3), targetsMaizeWest($tYr4), targetsMaizeWest($tYr5), targetsMaizeWest($tYr6), $yr7 = 0);
$WM_LOAA = $qmobj->dataMapsActual($WM_ActualYr1, $WM_ActualYr2, $WM_ActualYr3, $WM_ActualYr4, $WM_ActualYr5, $WM_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($WM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($WM_LOAA, 0, 'ExistsInteger') . "</td>";
$WM_percentageAc = ColorCoding(calc_Percentage($WM_LOAT, $WM_LOAA), 1);
$data .= $WM_percentageAc;	

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Beans</strong></td>";

$data.="<td align='right'>".number_format(targetsBeansWest($tYr1))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansWest($tYr2))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansWest($tYr3))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansWest($tYr4))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansWest($tYr5))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansWest($tYr6))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr6,2)."</td>";

$WB_LOAT = $qmobj->dataMapsTargets(targetsBeansWest($tYr1), targetsBeansWest($tYr2), targetsBeansWest($tYr3), targetsBeansWest($tYr4), targetsBeansWest($tYr5), targetsBeansWest($tYr6), $yr7 = 0);
$WB_LOAA = $qmobj->dataMapsActual($WB_ActualYr1, $WB_ActualYr2, $WB_ActualYr3, $WB_ActualYr4, $WB_ActualYr5, $WB_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($WB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($WB_LOAA, 0, 'ExistsInteger') . "</td>";
$WB_percentageAc = ColorCoding(calc_Percentage($WB_LOAT, $WB_LOAA), 1);
$data .= $WB_percentageAc;	

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan='' rowspan='3'><strong>East</strong></td>";
$data.="<td><strong>Coffee</strong></td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr1))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr2))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr3))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr4))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr5))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr6))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr6,2)."</td>";

$EC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeEast($tYr1), targetsCoffeeEast($tYr2), targetsCoffeeEast($tYr3), targetsCoffeeEast($tYr4), targetsCoffeeEast($tYr5), targetsCoffeeEast($tYr6), $yr7 = 0);
$EC_LOAA = $qmobj->dataMapsActual($EC_ActualYr1, $EC_ActualYr2, $EC_ActualYr3, $EC_ActualYr4, $EC_ActualYr5, $EC_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($EC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($EC_LOAA, 0, 'ExistsInteger') . "</td>";
$EC_percentageAc = ColorCoding(calc_Percentage($EC_LOAT, $EC_LOAA), 1);
$data .= $EC_percentageAc;

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Maize</strong></td>";

$data.="<td align='right'>".number_format(targetsMaizeEast($tYr1))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeEast($tYr2))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeEast($tYr3))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeEast($tYr4))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeEast($tYr5))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeEast($tYr6))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr6,2)."</td>";

$EM_LOAT = $qmobj->dataMapsTargets(targetsMaizeEast($tYr1), targetsMaizeEast($tYr2), targetsMaizeEast($tYr3), targetsMaizeEast($tYr4), targetsMaizeEast($tYr5), targetsMaizeEast($tYr6), $yr7 = 0);
$EM_LOAA = $qmobj->dataMapsActual($EM_ActualYr1, $EM_ActualYr2, $EM_ActualYr3, $EM_ActualYr4, $EM_ActualYr5, $EM_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($EM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($EM_LOAA, 0, 'ExistsInteger') . "</td>";
$EM_percentageAc = ColorCoding(calc_Percentage($EM_LOAT, $EM_LOAA), 1);
$data .= $EM_percentageAc;	

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Beans</strong></td>";

$data.="<td align='right'>".number_format(targetsBeansEast($tYr1))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansEast($tYr2))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansEast($tYr3))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansEast($tYr4))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansEast($tYr5))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansEast($tYr6))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr6,2)."</td>";

$EB_LOAT = $qmobj->dataMapsTargets(targetsBeansEast($tYr1), targetsBeansEast($tYr2), targetsBeansEast($tYr3), targetsBeansEast($tYr4), targetsBeansEast($tYr5), targetsBeansEast($tYr6), $yr7 = 0);
$EB_LOAA = $qmobj->dataMapsActual($EB_ActualYr1, $EB_ActualYr2, $EB_ActualYr3, $EB_ActualYr4, $EB_ActualYr5, $EB_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($EB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($EB_LOAA, 0, 'ExistsInteger') . "</td>";
$EB_percentageAc = ColorCoding(calc_Percentage($EB_LOAT, $EB_LOAA), 1);
$data .= $EB_percentageAc;	

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan='' rowspan='3'><strong>Central</strong></td>";
$data.="<td><strong>Coffee</strong></td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr1))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr2))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr3))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr4))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr5))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr6))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr6,2)."</td>";

$CC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeCentral($tYr1), targetsCoffeeCentral($tYr2), targetsCoffeeCentral($tYr3), targetsCoffeeCentral($tYr4), targetsCoffeeCentral($tYr5), targetsCoffeeCentral($tYr6), $yr7 = 0);
$CC_LOAA = $qmobj->dataMapsActual($CC_ActualYr1, $CC_ActualYr2, $CC_ActualYr3, $CC_ActualYr4, $CC_ActualYr5, $CC_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($CC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($CC_LOAA, 0, 'ExistsInteger') . "</td>";
$CC_percentageAc = ColorCoding(calc_Percentage($CC_LOAT, $CC_LOAA), 1);
$data .= $CC_percentageAc;

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Maize</strong></td>";

$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr1))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr2))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr3))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr4))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr5))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr6))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr6,2)."</td>";

$CM_LOAT = $qmobj->dataMapsTargets(targetsMaizeCentral($tYr1), targetsMaizeCentral($tYr2), targetsMaizeCentral($tYr3), targetsMaizeCentral($tYr4), targetsMaizeCentral($tYr5), targetsMaizeCentral($tYr6), $yr7 = 0);
$CM_LOAA = $qmobj->dataMapsActual($CM_ActualYr1, $CM_ActualYr2, $CM_ActualYr3, $CM_ActualYr4, $CM_ActualYr5, $CM_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($CM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($CM_LOAA, 0, 'ExistsInteger') . "</td>";
$CM_percentageAc = ColorCoding(calc_Percentage($CM_LOAT, $CM_LOAA), 1);
$data .= $CM_percentageAc;											
$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Beans</strong></td>";										
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr1))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr2))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr3))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr4))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr5))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr6))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr6,2)."</td>";

$CB_LOAT = $qmobj->dataMapsTargets(targetsBeansCentral($tYr1), targetsBeansCentral($tYr2), targetsBeansCentral($tYr3), targetsBeansCentral($tYr4), targetsBeansCentral($tYr5), targetsBeansCentral($tYr6), $yr7 = 0);
$CB_LOAA = $qmobj->dataMapsActual($CB_ActualYr1, $CB_ActualYr2, $CB_ActualYr3, $CB_ActualYr4, $CB_ActualYr5, $CB_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($CB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($CB_LOAA, 0, 'ExistsInteger') . "</td>";
$CB_percentageAc = ColorCoding(calc_Percentage($CB_LOAT, $CB_LOAA), 1);
$data .= $CB_percentageAc;	

$data.="</tr>";

$data.="</table>
</td>";

/* the data performance Map */
$data.="<td colspan='18'>
<table width='100%' style='margin: 0 1200px 0 0;' border='0' cellspacing='1' cellpadding='1'>
<tr>";

$data_arrayYr1= array('NC_ActualYr1'=>$NC_ActualYr1,'NM_ActualYr1'=>$NM_ActualYr1,'NB_ActualYr1'=>$NB_ActualYr1,'WC_ActualYr1'=>$WC_ActualYr1,'WM_ActualYr1'=>$WM_ActualYr1,'WB_ActualYr1'=>$WB_ActualYr1,'EC_ActualYr1'=>$EC_ActualYr1,'EM_ActualYr1'=>$EM_ActualYr1,'EB_ActualYr1'=>$EB_ActualYr1,'CC_ActualYr1'=>$CC_ActualYr1,'CM_ActualYr1'=>$CM_ActualYr1,'CB_ActualYr1'=>$CB_ActualYr1);
$json_data_arrayYr1 = json_encode($data_arrayYr1);

$data_arrayYr2= array('NC_ActualYr2'=>$NC_ActualYr2,'NM_ActualYr2'=>$NM_ActualYr2,'NB_ActualYr2'=>$NB_ActualYr2,'WC_ActualYr2'=>$WC_ActualYr2,'WM_ActualYr2'=>$WM_ActualYr2,'WB_ActualYr2'=>$WB_ActualYr2,'EC_ActualYr2'=>$EC_ActualYr2,'EM_ActualYr2'=>$EM_ActualYr2,'EB_ActualYr2'=>$EB_ActualYr2,'CC_ActualYr2'=>$CC_ActualYr2,'CM_ActualYr2'=>$CM_ActualYr2,'CB_ActualYr2'=>$CB_ActualYr2);
$json_data_arrayYr2 = json_encode($data_arrayYr2);

$data_arrayYr3= array('NC_ActualYr3'=>$NC_ActualYr3,'NM_ActualYr3'=>$NM_ActualYr3,'NB_ActualYr3'=>$NB_ActualYr3,'WC_ActualYr3'=>$WC_ActualYr3,'WM_ActualYr3'=>$WM_ActualYr3,'WB_ActualYr3'=>$WB_ActualYr3,'EC_ActualYr3'=>$EC_ActualYr3,'EM_ActualYr3'=>$EM_ActualYr3,'EB_ActualYr3'=>$EB_ActualYr3,'CC_ActualYr3'=>$CC_ActualYr3,'CM_ActualYr3'=>$CM_ActualYr3,'CB_ActualYr3'=>$CB_ActualYr3);
$json_data_arrayYr3 = json_encode($data_arrayYr3);

$data_arrayYr4= array('NC_ActualYr4'=>$NC_ActualYr4,'NM_ActualYr4'=>$NM_ActualYr4,'NB_ActualYr4'=>$NB_ActualYr4,'WC_ActualYr4'=>$WC_ActualYr4,'WM_ActualYr4'=>$WM_ActualYr4,'WB_ActualYr4'=>$WB_ActualYr4,'EC_ActualYr4'=>$EC_ActualYr4,'EM_ActualYr4'=>$EM_ActualYr4,'EB_ActualYr4'=>$EB_ActualYr4,'CC_ActualYr4'=>$CC_ActualYr4,'CM_ActualYr4'=>$CM_ActualYr4,'CB_ActualYr4'=>$CB_ActualYr4);
$json_data_arrayYr4 = json_encode($data_arrayYr4);

$data_arrayYr5= array('NC_ActualYr5'=>$NC_ActualYr5,'NM_ActualYr5'=>$NM_ActualYr5,'NB_ActualYr5'=>$NB_ActualYr5,'WC_ActualYr5'=>$WC_ActualYr5,'WM_ActualYr5'=>$WM_ActualYr5,'WB_ActualYr5'=>$WB_ActualYr5,'EC_ActualYr5'=>$EC_ActualYr5,'EM_ActualYr5'=>$EM_ActualYr5,'EB_ActualYr5'=>$EB_ActualYr5,'CC_ActualYr5'=>$CC_ActualYr5,'CM_ActualYr5'=>$CM_ActualYr5,'CB_ActualYr5'=>$CB_ActualYr5);
$json_data_arrayYr5 = json_encode($data_arrayYr5);

$data_arrayYr6= array('NC_ActualYr6'=>$NC_ActualYr6,'NM_ActualYr6'=>$NM_ActualYr6,'NB_ActualYr6'=>$NB_ActualYr6,'WC_ActualYr6'=>$WC_ActualYr6,'WM_ActualYr6'=>$WM_ActualYr6,'WB_ActualYr6'=>$WB_ActualYr6,'EC_ActualYr6'=>$EC_ActualYr6,'EM_ActualYr6'=>$EM_ActualYr6,'EB_ActualYr6'=>$EB_ActualYr6,'CC_ActualYr6'=>$CC_ActualYr6,'CM_ActualYr6'=>$CM_ActualYr6,'CB_ActualYr6'=>$CB_ActualYr6);
$json_data_arrayYr6 = json_encode($data_arrayYr6);


$url="hicharts_dataPerfomanceMaps/graph_dataPerformance.php?indicatorId=".$indicatorId."&&unit=".$unit."&&json_data_arrayYr1=".$json_data_arrayYr1."&&json_data_arrayYr2=".$json_data_arrayYr2."&&json_data_arrayYr3=".$json_data_arrayYr3."&&json_data_arrayYr4=".$json_data_arrayYr4."&&json_data_arrayYr5=".$json_data_arrayYr5."&&json_data_arrayYr6=".$json_data_arrayYr6;
//$obj->alert($url);
$data.="<td colspan='18'>";
$data.="<iframe 
runat='server' 
id='_theFrame'  
src='".$url."' 
width='100%' scrolling='no' height='550px' frameborder='0' 
allowtransparency='true' 
marginwidth='0' 
marginheight='0'
class='dashboard_iframe'/>
</iframe>";
$data.="</td>
</tr>
</table>
</td>";

$data.="</tr>";
$data.="</table>";

$obj->assign($div,'innerHTML',$data);
return $data;
}

//End of Graph



#************************************
$xajax->processRequest();

  ?>


<html>
<head>
    <?php $xajax->printJavascript('xajax_0.5/');

    ?>
    <script language="javascript" type="text/javascript" src="js/check.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    <title><?php heading($_GET['action']); ?></title>
    <script type="text/javascript" src="js/number.js"></script>
    <script type="text/javascript" src="js/addRow.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
    <script type="text/javascript" src="js/loading.js" language="javascript"></script>
    <script type="text/javascript" src="js/check.js" language="javascript"></script>
    <script type="text/javascript" src="js/popup.js" language="javascript"></script>
    <script type="text/javascript" src="js/js.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-2.1.4.js" language="javascript"></script>
    <script type="text/javascript" src="js/sumRows.js" language="javascript"></script>
    <script type="text/javascript" src="js/hoverRows.js" language="javascript"></script>
</head>

<body>
<div align='center' id='dvLoading'><span
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Data Performance Maps Report...</span></div>
<table width="870" border="0" align="center" id="content_" >
	<tr>
		<td colspan="2" valign="top"><?php require_once('connections/header.php'); ?></td>
	</tr>
	
	<tr>
		<td class='sd-menu-container' style="display:none;" width="190" valign="top">
		
			<table width="190" border="0" >
				<tr>
					<td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
				</tr>
			</table>
		</td>
		
		<td width="660" valign="top" style="background-color: #F8F5EC;" >

		 <?php title($_GET['linkvar'],$_GET['action']);   ?>
			<div id="bodyDisplay">
				<script language="JavaScript" type="text/javascript">

					<?php
					if(!isset($FunctionName))$FunctionName='';
								else $FunctionName='';
								if(!isset($Arguments))$Arguments='';
								else $Arguments='';
					$linkvar='';
					$linkvar=$_GET['linkvar'];
					$FunctionName=$_GET['FunctionName'];
					$Arguments=$_GET['Arguments'];

					switch($_GET['linkvar']){
							case"Data Performance Maps":
						?>
						xajax_DataPerformanceMaps('','','','','','','','','',1,20);
						  
						<?php 
						break;


						default: ?>
						
					<?php } ?>

				</script>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>

<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm"
        style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0"
        height="178" scrolling="no" width="199"></iframe>
</body>
</html>

