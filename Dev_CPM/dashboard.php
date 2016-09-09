<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');


function dashboardProjects($indicator){
$level=array('ASARECA');
						/* @mysql_query("drop table tbl_dashboard");
						@mysql_query("CREATE table `tbl_dashboard` AS 
						select `i`.`indicator_id` AS `indicator_id`,`i`.`indicator_type` AS `indicator_type`,
						`i`.`indicator_code` AS `indicator_code`,`i`.`level_ofindicator` AS `level_ofindicator`,
						`i`.`indicator_name` AS `indicator_name`,
						sum(`w`.`Target`) AS `Target`,
						sum(`r`.`total`) AS `totalActual`,
						round(((sum(`r`.`total`) / sum(`w`.`Target`)) * 100),0) AS `pperfomance` 
						from (( `tbl_indicator` `i` left join `tbl_loptargets` `w` on((`i`.`indicator_id` = `w`.`indicator_id`))) 
						left join `tbl_indicator_definition` `v` on((`v`.`indicator_id` = `i`.`indicator_id`))) 
						left join tbl_organizationreporting r on(`r`.`indicator_id` = `v`.`projectIndicatorDefinition_id`)
						where (`i`.`level_ofindicator` like _latin1'ASARECA%') group by `i`.`indicator_id` order by `i`.`indicator_id`
						"); */
						
$data="<form name='frm' id='frm' action='".$PHP_SELF."' METHOD='POST'><table width='100%' id='report' border='0'>
  <tr class='evenrow'>
    <td colspan=''>Indicator:</td>
  <td colspan='2'><select name='Indicator' id='Indicator'  style='width:300px;' onChange='reloadDashboard(this.value);' >
  <option value='' >-All-</option>
  
  ";
		  $sql="select * from tbl_indicator where level_ofindicator like '".$level[0]."%'  order by indicator_name asc";
		  
		  
		  
		  #$obj->addAlert($sql);
		  $n=1;
		  $query=@Execute($sql) or die(http('Dash-0014'));
		  while($ROW=@FetchRecords($query)){
		 $selected=($indicator==$ROW['indicator_id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['indicator_id']."\" ".$selected." >".substr($ROW['indicator_name'],0,100)."</option>";}
		  $data.="</select> | <input name='search' type='button' class='formButton2'value='Go' onClick=\"reloadDashboard(getElementById('Indicator').value);\" > |
		  

<a href='print_version2.php?linkvar=Print Dashboard&&Indicator=".$indicator."&&format=print' target='_blank'><input name='new_training' type='button' class='formButton2'value='Print Version'></a>  
</td>
  </tr>
  		<tr>
    <th colspan='3'><center>SPECIFIC PROGRESS (cummulative)</center></th>
  
  </tr>
  <tr>
  <th colspan=''>INDICATOR/THEME<IMG src='images/spacer2.png'></th>

   <th colspan='2'>GRAPHICAL ILLUSTRATIONS</th>
   
  </tr>";
  
  // where indicator_id='7'
  $N=1;
  $level="ASARECA";
  
  						if($indicator==NULL){
						
						$x="SELECT  d.counter,i.subcomponent_id, i.output_id, i.indicator_code, i.indicator_id, i.indicator_name, i.`unitofmeasure` , 
					 i.`display` ,  i.`indicator_type`, i.`baseline`, i.`baseyear`,i.prog_id, i.project_id,
							d.Year1, 
							d.Year2, 
							d.Year3,
							 d.Year4,
							  d.Year5,r.`ConsolidationindicatorDefinition_id`,
								r.Year1Actual,
								r.Year2Actual,
								r.Year3Actual,
								r.Year4Actual,
								r.Year5Actual
							FROM tbl_indicator i left JOIN view_asarecaconsolidatedtargets d ON( i.indicator_id = d.indicator_id )
							left JOIN view_asarecaactuals r ON(i.indicator_id=r.ConsolidationindicatorDefinition_id)
							WHERE i.indicator_id='2984' 
					
							 	GROUP BY i.indicator_id
								ORDER BY i.indicator_code ASC";
						}else
  					
						$x=QueryManager::ViewAsarecaTargetsAndResultsDashboard($indicator);
						
						
						
						$queryx=@Execute($x) or die(http("HM-0062"));
						
  						while($row=@FetchRecords($queryx)){  
  
  $count1=QueryManager::CalcAverageReporting($indicator_id="indicator_id",$indicator_idValue=$row['indicator_id'],$Year1x="Year1",$table="view_programworkplanvalues");
		$count2=QueryManager::CalcAverageReporting($indicator_id="indicator_id",$indicator_idValue=$row['indicator_id'],$Year1x="Year2",$table="view_programworkplanvalues");
		$count3=QueryManager::CalcAverageReporting($indicator_id="indicator_id",$indicator_idValue=$row['indicator_id'],$Year1x="Year3",$table="view_programworkplanvalues");
		$count4=QueryManager::CalcAverageReporting($indicator_id="indicator_id",$indicator_idValue=$row['indicator_id'],$Year1x="Year4",$table="view_programworkplanvalues");
		$count5=QueryManager::CalcAverageReporting($indicator_id="indicator_id",$indicator_idValue=$row['indicator_id'],$Year1x="Year5",$table="view_programworkplanvalues");
								
		  $yr1=QueryManager::ProgramANDProjectMean($totalAcx=$row['Year1'],$unitofMeasure=$row['unitofmeasure'],$count1);
		  $yr2=QueryManager::ProgramANDProjectMean($totalAcx=$row['Year2'],$unitofMeasure=$row['unitofmeasure'],$count2);
		  $yr3=QueryManager::ProgramANDProjectMean($totalAcx=$row['Year3'],$unitofMeasure=$row['unitofmeasure'],$count3);
		  $yr4=QueryManager::ProgramANDProjectMean($totalAcx=$row['Year4'],$unitofMeasure=$row['unitofmeasure'],$count4);
		  $yr5=QueryManager::ProgramANDProjectMean($totalAcx=$row['Year5'],$unitofMeasure=$row['unitofmeasure'],$count5);
									
								//$obj->alert($yr1);									  
									   /**/ 
									   
					   $Year1=($yr1==NULL)?"<td align='right'><center>-</center></td>":"<td align='right'>".number_format($yr1)."</td>";
					   //$obj->alert($Year1);
							   $Year2=($yr2==NULL)?"<td align='right'><center>-</center></td>":"<td align=right>".number_format($yr2)."</td>";
								$Year3=($yr3==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($yr3)."</td>";
									$Year4=($yr4==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($yr4)."</td>";
									   $Year5=($yr5==NULL)?"<td align='right'><center>-</center></td>":"<td align='right' >".number_format($yr5)."</td>"; 
									   $TargetTotal=QueryManager::identifyIndicatorLevel($row['unitofmeasure'],$yr1,$yr2,$yr3,$yr4,$yr5);
									   
									   $Target=($TargetTotal==0)?"<td align=right><center><strong>-</strong></center></td>":
						  		 "<td align=right><strong>".number_format($TargetTotal)."</strong></td>";
									   
									    //============================Display Actuals==========================================
								  
								  
		/* */ $countActual1=QueryManager::CalcAverageReporting($indicator_id="indicator_id",
					$indicator_idValue=$row['indicator_id'],"Year1Actual",$table="view_programresultvalues");
		
			$countActual2=QueryManager::CalcAverageReporting($indicator_id="indicator_id",
					$indicator_idValue=$row['indicator_id'],"Year2Actual",$table="view_programresultvalues");
		
			$countActual3=QueryManager::CalcAverageReporting($indicator_id="indicator_id",
					$indicator_idValue=$row['indicator_id'],"Year3Actual",$table="view_programresultvalues");
		
			$countActual4=QueryManager::CalcAverageReporting($indicator_id="indicator_id",
					$indicator_idValue=$row['indicator_id'],"Year4Actual",$table="view_programresultvalues");
		
			$countActual5=QueryManager::CalcAverageReporting($indicator_id="indicator_id",
					$indicator_idValue=$row['indicator_id'],"Year5Actual",$table="view_programresultvalues");
									
									
								
									
		  $yrActual1=QueryManager::ProgramANDProjectMean($row['Year1Actual'],$row['unitofmeasure'],$countActual1);
		  $yrActual2=QueryManager::ProgramANDProjectMean($row['Year2Actual'],$row['unitofmeasure'],$countActual2);
		  $yrActual3=QueryManager::ProgramANDProjectMean($row['Year3Actual'],$row['unitofmeasure'],$countActual3);
		  $yrActual4=QueryManager::ProgramANDProjectMean($row['Year4Actual'],$row['unitofmeasure'],$countActual4);
		  $yrActual5=QueryManager::ProgramANDProjectMean($row['Year5Actual'],$row['unitofmeasure'],$countActual5);
									
								
										  
						 $Year1Actual=($yrActual1==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($yrActual1)."</td>";
						$Year2Actual=($yrActual2==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($yrActual2)."</td>";
						$Year3Actual=($yrActual3==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($yrActual3)."</td>";
						$Year4Actual=($yrActual4==NULL)?"<td align='right' ><center>-</center></td>":"<td align=right>".number_format($yrActual4)."</td>";
						$Year5Actual=($yrActual5==NULL)?"<td align='right' ><center>-</center></td>":"<td align='right'>".number_format($yrActual5)."</td>";
				 $totalAc=QueryManager::identifyIndicatorLevel($row['unitofmeasure'],$yrActual1,$yrActual2,$yrActual3,$yrActual4,$yrActual5);
		   /**/
								 
								  
			
			$TotalActual=($totalAc==NULL)?"<td align=right><center><strong>-</strong></center></td>":"<td align=right><strong>".number_format($totalAc)."</strong></td>";
				   
				   
				   
				   $percentageAchvmntAGOP=calc_Percentage($TargetTotal,$totalAc);
	 
$percentageAchvmntAGOPDisplay=($percentageAchvmntAGOP!=0)?ColorCoding($percentageAchvmntAGOP,1):"<td ALIGN='RIGHT' class='redhdrs' >0.0%</td>";
  
  
  $color=$N%2==1?"evenrow3":"white1";
  $data.="<tr class='$color'>
   <td align='left' valign='bottom' ><div style='float:left;'></div>
  <strong> ".$row['indicator_name']."</strong>
   <table><tr class='evenrow2'>
    <td>NO</td>
	
	<td>LOP Target</td>
	<td> Cummulative Actual</td>
	<td>% Achieved</td>
	</tr>
	<tr class='".$color."'>
    <td>".$N."</td>
	".$Target.$TotalActual.$percentageAchvmntAGOPDisplay."</tr>
</table>
	
 
   
   
   </td>
   

    <td colspan='2'>
	
	<table>";
	//http://localhost:83/2013/june_2013/asareca_10062013/
	$data.="<tr><td width='800' height='500' ><iframe name='DataCollectionTools".$N."' id='DataCollectionTools".$N."'
	 src='libchart2/demo/MultipleVerticalBarChartTest.php?indicator_id=".$row['indicator_id']."&&IndicatorName=".$row['indicator_name']."&&Target=".$TargetTotal."&&totalActual=".$totalAc."' width='800' height='500'></iframe></td></tr>
";
	
	
	
	
	$data.="</table>";
	
	
$data.="</td>
  </tr>";
  
  }
  $N++;
  
$data.="</table>";
/* 			//$obj->alert($data);
$obj->assign('bodyDisplay','innerHTML',$data); */
echo  $data;
}




function dashboardProgram($program,$indicator){
					$program=($program<>'')?$program:1;
					$indicator=($indicator<>'')?$indicator:3049;
		 $level1=array('ASARECA','Program','Project');				
						
$data="<form name='frm' id='frm' action='".$PHP_SELF."' METHOD='POST'>
<table width='800' id='report' border='0'>
  <tr class='evenrow'>
    <td colspan='5'>Program:</td>
  <td colspan='17'>
  <select name='program' id='program'  style='width:300px;' onChange=\"reloadDashboardProgram(getElementById('program').value,getElementById('Indicator').value);\" >
  <option value='' >-All-</option>";
  $data.=QueryManager::ProgramFilter($program);
  
  $data.="</select> <div style='float:right;'>
		  
		  

<a href='print_version2.php?linkvar=Print Program Dashboard&&Indicator=".$indicator."&&program=".$program."&&format=print' target='_blank'><input name='new_training' type='button' class='formButton2'value='Print Version'></a></div>  
</td>
  </tr>
  
  <tr class='evenrow'>
    <td colspan='5'>Indicator:</td>
  <td colspan='17'><select name='Indicator' id='Indicator' style='width:300px;' onChange=\"reloadDashboardProgram('".$program."',this.value);\" >
  <option value='' >-All-</option>";
		  $sql="select * from tbl_indicator where level_ofindicator like '".$level1[1]."%' and prog_id='".$program."'  order by indicator_name asc";
		  
		  
		  
		  #$obj->addAlert($sql);
		  $n=1;
		  $query=@Execute($sql) or die(http('Dash-0014'));
		  while($ROW=@FetchRecords($query)){
		 $selected=($indicator==$ROW['indicator_id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['indicator_id']."\" ".$selected." >".substr($ROW['indicator_name'],0,100)."</option>";}
		  $data.="</select>
 |<input name='search' type='button' class='formButton2'value='Go' onClick=\"reloadDashboardProgram(getElementById('program').value,getElementById('Indicator').value);\" > </td>
  </tr>";
  
  $data.="<tr>
    <th colspan='22'><center>Program Key Performance Indicator Annual Performance</center></th>
    </tr>";
	$data.="
  <tr class='evenrow2' class='dataRow'>
  <th CLASS='black2' colspan='2' rowspan='2' width='10' class='dataRow'>CODE</th>

  <th CLASS='black2' COLSPAN='2' class='dataRow' rowspan='2'>Program KEY PERFORMANCE INDICATORS<img width='150' height='0'></th>";
  
$queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
            		$data.="<th width='100' class='evenrow2' colspan='3' ><center>".$n."</center></th>";
					
					}
						  $data.="<th ROWSPAN='2'>TOTAL TARGET</th><th ROWSPAN='2'>TOTAL ACTUAL</th><th ROWSPAN='2'>Overall % Progress</th></tr>
						  <tr>";
						  for($x=1;$x<6;$x++){
						  $data.="<th>T$x</th>
						  <th>A$x</th><th>% Achieved</th>";
						  }
						  $data."</tr>";
  
  					//where indicator_id='7'
  					$N=1;
  					//$level="Program";
					if($indicator==NULL &&$program==NULL){
					$query_string="select i.indicator_type,i.indicator_id,i.indicator_code,
									d.display,d.DefName,d.defn_id,i.indicator_name,i.level_ofindicator
									from tbl_indicator i left join `tbl_indicator_definition` d
									on(d.indicator_id=i.indicator_id) 
									where i.indicator_id='3049' and i.indicator_name<> '' and i.level_ofindicator like '".$level1[1]."%'
									and i.prog_id='1'
									group by i.indicator_id  order by i.indicator_name asc";
									}else {$query_string="select i.indicator_type,i.indicator_id,i.indicator_code,
									d.display,d.DefName,d.defn_id,i.indicator_name,i.level_ofindicator
									from tbl_indicator i left join `tbl_indicator_definition` d
									on(d.indicator_id=i.indicator_id) 
									where i.indicator_id='".$indicator."' and i.indicator_name<> '' and i.level_ofindicator like '".$level1[1]."%'
									and i.prog_id='".$program."'
									group by i.indicator_id  order by i.indicator_name asc";
  }
  
  									
									$queryProgram=@Execute($query_string) or die(http("Dashboard-276"));
  									
									while($row=@FetchRecords($queryProgram)){
										 $color=$N%2==1?"evenrow3":"white1";
									$data.="<tr><td>";
//---------------------Program Indicator Grid-----------------------





					
				
				//having d.display 	like 'Yes%'
						//$obj->alert($query_string);  
								$query=Execute($query_string)or die(http("VP-4788"));
										while($row=@FetchRecords($query)){
								$color=($n%2==1)?"evenrow3":"white1";
			 
								$events2="onmouseup=\"this.style.backgroundColor='#999999';\"";
	$data.="<tr class='display_none'>
			<td class='dataRow' valign='top' colspan='4' ><input type='checkbox' name='indicator_idAll[]' id='indicator_idAll'  value='".$row['indicator_id']."' />
			<input type='hidden' name='indicator_type[]' id='indicator_type' value='".$row['indicator_type']."' >
							
						".$inc++."
							<strong>".$row['indicator_code']."</strong> 
								 ".retrieve_info_withSpecialCharacters($row['indicator_name'])." 
							<strong> (".$row['indicator_type'].")</strong>
						</td></tr>"; 
					
					
					
							 $sql=QueryManager::view_indicatorMappingProgramDashboard($program,$indicator);
							//$obj->alert($sql);
						$qdfn=Execute($sql)or die(http("VP-4131"));
							while($rowdfn=@mysql_fetch_array($qdfn)){
			//$color=$n%2==1?"evenrow"
			$div1="Mapping".$rowdfn['DefName'];
			$data.="<tr class='evenrow'>
						<td class='dataRow' valign='top'><input name='defintion_id' type='checkbox' value='".$row['defn_id']."' checked='checked' disabled='disabled'></td>
						<td class='dataRow' valign='top'> ".$rowdfn['indicator_code']."</td>
						<td class='dataRow' valign='top' colspan='2'><strong>(".$rowdfn['Accronym'].")</strong> <a href='#' onclick=\"xajax_view_indicatorMappingProject('".$rowdfn['DefName']."','".$div1."','".$rowdfn['prog_id']."');return false;\">".retrieve_info_withSpecialCharacters($rowdfn['indicator_name'])."</a></td>";
						
						//--------Program Actuals------
								$queryActual=QueryManager::view_indicatorMappingProgramActuals($rowdfn['DefName']);
							//$obj->alert($queryActual);
								$qdfnProgramActual=Execute($queryActual)or die(http("VP-4179")); 
									$rowActual=@FetchRecords($qdfnProgramActual); 
							$data.="<td valign='top' align='right' class='bluebg'>".$rowdfn['Year1']."</td>
							<td valign='top' align='right' class='orangebg'>".$rowActual['Year1Actual']."</td>";
							
							//$percentageAchvmntAGOP=calc_Percentage($TargetTotal,$totalAc);
	 
							//$percentageAchvmntAGOPDisplay=($percentageAchvmntAGOP!=0)?ColorCoding($percentageAchvmntAGOP,1):"<td ALIGN='RIGHT' class='redhdrs' >0.0%</td>";
							$data.=ColorCoding(calc_Percentage($rowdfn['Year1'],$rowActual['Year1Actual']),1);
						
							$data.="<td valign='top' align='right'  class='bluebg'>".$rowdfn['Year2']."</td>
								<td valign='top' align='right' class='orangebg' >".$rowActual['Year2Actual']."</td>
							".ColorCoding(calc_Percentage($rowdfn['Year2'],$rowActual['Year2Actual']),1)."
							<td valign='top' align='right' class='bluebg'>".$rowdfn['Year3']."</td>
							<td valign='top' align='right' class='orangebg'>".$rowActual['Year3Actual']."</td>
							".ColorCoding(calc_Percentage($rowdfn['Year3'],$rowActual['Year3Actual']),1)."
							<td valign='top' align='right' class='bluebg'>".$rowdfn['Year4']."</td>
							<td valign='top' align='right' class='orangebg'>".$rowActual['Year4Actual']."</td>
							".ColorCoding(calc_Percentage($rowdfn['Year4'],$rowActual['Year4Actual']),1)."
							<td valign='top' align='right' class='bluebg'>".$rowdfn['Year5']."</td>
							<td valign='top' align='right' class='orangebg'>".$rowActual['Year5Actual']."</td>
							".ColorCoding(calc_Percentage($rowdfn['Year5'],$rowActual['Year5Actual']),1);
							
							$grandTarget=($rowdfn['Year1']+$rowdfn['Year2']+$rowdfn['Year3']+$rowdfn['Year4']+$rowdfn['Year5']);
							$grandActual=($rowActual['Year1Actual']+$rowActual['Year2Actual']+$rowActual['Year3Actual']+$rowActual['Year4Actual']+$rowActual['Year5Actual']);
							
							$data.="<td valign='top' align='right' class='bluebg'>".$grandTarget."</td>
							<td valign='top' align='right' class='orangebg'>".$grandActual."</td>".
							ColorCoding(calc_Percentage($grandTarget,$grandActual),1);
							
							
							$data.="</tr>";
							
							
							
							$data.="<tr>
	 <td colspan='50' align='center'>
	
	<table>";

	$data.="<tr><td width='800' height='500' ><iframe name='DataCollectionTools".$N."' id='DataCollectionTools".$N."'
	 src='libchart2/demo/MultipleVerticalBarChartTestProgram.php?indicator_id=".$rowdfn['DefName']."&&IndicatorName=".$rowdfn['indicator_name']."&&Year1=".$rowdfn['Year1']."&&Year2=".$rowdfn['Year2']."&&Year3=".$rowdfn['Year3']."&&Year4=".$rowdfn['Year4']."&&Year5=".$rowdfn['Year5']."&&Year1Actual=".$rowActual['Year1Actual']."&&Year2Actual=".$rowActual['Year2Actual']."&&Year3Actual=".$rowActual['Year3Actual']."&&Year4Actual=".$rowActual['Year4Actual']."&&Year5Actual=".$rowActual['Year5Actual']."&&grandTotal=".$grandTarget."&&grandActual=".$grandActual."' width='800' height='500'></iframe></td></tr></table>

	
	
	</td></tr>";
	
	
			 
			 } 
 

//end of programme defn----
$data.="</table></td></tr>";

//--------end of coorporate
  $n++; 
 } 
//$data.=noRecordsFound($query,7);
 




  
  }
  $N++;
  
$data.="</table>";

echo  $data;
}
		
		
		
		
		function dashboardProgramProject($program,$indicator,$project){
				$program=($program<>'')?$program:1;
			$project=($project<>'')?$project:54;
			$indicator=($indicator<>'')?$indicator:6158;
		 $level1=array('ASARECA','Program','Project');				
						
$data="<form name='frm' id='frm' action='".$PHP_SELF."' METHOD='POST'><table width='100%' id='report' border='0'>
  <tr class='evenrow'>
    <td colspan='2'>Program:</td>
  <td colspan='20'><select name='program' id='program'  style='width:300px;' onChange='reloadDashboardProgram(getElementById('program').value,'','');' >
  <option value='' >-All-</option>";
  $data.=QueryManager::ProgramFilter($program);
  
  $data.="</select> <div style='float:right;'>
		   

<a href='print_version2.php?linkvar=Print Project Dashboard&&Indicator=".$indicator."&&program=".$program."&&project=".$project."&&format=print' target='_blank'><input name='new_training' type='button' class='formButton2'value='Print Version'></a></div>  
</td>
  </tr>
  
  
  <tr class='evenrow'>
    <td colspan='2'>Project:</td>
  <td colspan='20'><select name='project' id='project'  style='width:300px;'  onChange=\"reloadDashboardProgramProject(getElementById('program').value,getElementById('Indicator').value,getElementById('project').value);\"  >
  <option value='' >-All-</option>";
  $data.=QueryManager::ProjectFilter($program,$project);
  //onChange=\"reloadDashboardProgramProject(getElementById('program').value,getElementById('Indicator').value,this.value);\"
  $data.="</select>  
</td>
  </tr>
  
  
  
  <tr class='evenrow'>
    <td colspan='2'>Indicator:</td>
  <td colspan='20'><select name='Indicator' id='Indicator' style='width:300px;' onChange=\"reloadDashboardProgramProject('".$program."',getElementById('Indicator').value,'".$project."');\" >
  <option value='' >-All-</option>";
		  $sql="select * from tbl_indicator where level_ofindicator like '".$level1[2]."%' and prog_id='".$program."' and project_id='".$project."'  order by indicator_name asc";
		  
		  //
		  
		  #$obj->addAlert($sql);
		  $n=1;
		  $query=@Execute($sql) or die(http('Dash-0014'));
		  while($ROW=@FetchRecords($query)){
		 $selected=($indicator==$ROW['indicator_id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['indicator_id']."\" ".$selected." >".substr($ROW['indicator_name'],0,100)."</option>";}
		  $data.="</select>
 |<input name='search' type='button' class='formButton2'value='Go' onClick=\"reloadDashboardProgramProject(getElementById('program').value,getElementById('Indicator').value,getElementById('project').value);\" > </td>
  </tr>";
  
  $data.="<tr>
    <th colspan='22'><center>Project Key Performance Indicator Annual Performance</center></th>
    </tr>

	<tr class='evenrow2' class='dataRow'>
  <th CLASS='black2' colspan='2' rowspan='2' width='10' class='dataRow'>CODE</th>

  <th CLASS='black2' COLSPAN='1' class='dataRow' rowspan='2'>Project KEY PERFORMANCE INDICATOR<img width='300' height='0'></th>";
  
$queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
            		$data.="<th width='100' class='evenrow2' colspan='3' ><center>".$n."</center></th>";
					
					}
  $data.="<th ROWSPAN='2'>TOTAL TARGET</th><th ROWSPAN='2'>TOTAL ACTUAL</th><th ROWSPAN='2'>Overall % Progress</th></tr>
  <tr>";
  for($x=1;$x<6;$x++){
  $data.="<th>T$x</th>
  <th>A$x</th><th>% Achieved</th>";
  }
  $data."</tr>";

			//----for project indicator defn to project indicators-------------
			$sql=QueryManager::view_indicatorMappingProjectDashboard($indicator,$level1[2],$program,$project);
 				//$obj->alert($sql);
 			$qdfnProject=Execute($sql)or die(http("VP-4173")); 
			while($rowdfnProject=@FetchRecords($qdfnProject)){

	$data.="<tr class='evenrow'>
				<td class='dataRow' valign='top'>
					<input name='defintion_id' type='checkbox' value='".$row['defn_id']."' checked='checked' disabled='disabled'>
				</td>
				<td class='dataRow' valign='top'> ".$rowdfnProject['indicator_code']."</td>
				<td class='dataRow' valign='top'><strong>(".$rowdfnProject['project_code']." ". $rowdfnProject['title'].")
				</strong> ".retrieve_info_withSpecialCharacters($rowdfnProject['indicator_name'])."</td>";
				//--------Project Actuals------
					//$queryActual=QueryManager::view_indicatorMappingProjectActuals($rowdfnProject['projectIndicatorDefinition_id'],$level1[2],$prog_id);
					//$obj->alert($queryActual);
				//$qdfnProjectActual=Execute($queryActual)or die(http("VP-4179")); 
				//$rowActual=@FetchRecords($qdfnProjectActual); 
				$data.="
				<td valign='top' align='right' class='bluebg'>".$rowdfnProject['Year1']."</td>
				<td valign='top' align='right' class='orangebg'>".$rowdfnProject['ActualYear1']."</td>
				".ColorCoding(calc_Percentage($rowdfnProject['Year1'],$rowdfnProject['ActualYear1']),1)."
				<td valign='top' align='right' class='bluebg'>".$rowdfnProject['Year2']."</td>
				<td valign='top' align='right' class='orangebg'>".$rowdfnProject['ActualYear2']."</td>
				".ColorCoding(calc_Percentage($rowdfnProject['Year2'],$rowdfnProject['ActualYear2']),1)."
				<td valign='top' align='right' class='bluebg'>".$rowdfnProject['Year3']."</td>
				<td valign='top' align='right' class='orangebg'>".$rowdfnProject['ActualYear3']."</td>
				".ColorCoding(calc_Percentage($rowdfnProject['Year3'],$rowdfnProject['ActualYear3']),1)."
				<td valign='top' align='right' class='bluebg'>".$rowdfnProject['Year4']."</td>
				<td valign='top' align='right' class='orangebg'>".$rowdfnProject['ActualYear4']."</td>
				".ColorCoding(calc_Percentage($rowdfnProject['Year4'],$rowdfnProject['ActualYear4']),1)."
				<td valign='top' align='right' class='bluebg'>".$rowdfnProject['Year5']."</td>
				<td valign='top' align='right' class='orangebg'>".$rowdfnProject['ActualYear5']."</td>
				".ColorCoding(calc_Percentage($rowdfnProject['Year5'],$rowdfnProject['ActualYear5']),1);
				
				$grandTarget=($rowdfnProject['Year1']+$rowdfnProject['Year2']+$rowdfnProject['Year3']+$rowdfnProject['Year4']+$rowdfnProject['Year5']);
							$grandActual=($rowdfnProject['ActualYear1']+$rowdfnProject['ActualYear2']+$rowdfnProject['ActualYear3']+$rowdfnProject['ActualYear4']+$rowdfnProject['ActualYear5']);
							
							$data.="<td valign='top' align='right' class='bluebg'>".$grandTarget."</td>
							<td valign='top' align='right' class='orangebg'>".$grandActual."</td>".
							ColorCoding(calc_Percentage($grandTarget,$grandActual),1);
				
				
				$data.="</tr>";
 

				

	$data.="<tr><td width='800' height='500' colspan='22' align='center' valign='top' ><iframe name='DataCollectionTools".$N."' id='DataCollectionTools".$N."'
	 src='libchart2/demo/MultipleVerticalBarChartTestProgram.php?indicator_id=".$rowdfnProject['DefName']."&&IndicatorName=".$rowdfnProject['indicator_name']."&&Year1=".$rowdfnProject['Year1']."&&Year2=".$rowdfnProject['Year2']."&&Year3=".$rowdfnProject['Year3']."&&Year4=".$rowdfnProject['Year4']."&&Year5=".$rowdfnProject['Year5']."&&Year1Actual=".$rowdfnProject['ActualYear1']."&&Year2Actual=".$rowdfnProject['ActualYear2']."&&Year3Actual=".$rowdfnProject['ActualYear3']."&&Year4Actual=".$rowdfnProject['ActualYear4']."&&Year5Actual=".$rowdfnProject['ActualYear5']."&&grandTotal=".$grandTarget."&&grandActual=".$grandActual."' width='800' height='500'></iframe></td></tr></table>

	
	
	</td></tr>";
	
	  $n++;
			 
			 } 
 

//end of programme defn----
$data.="</table></td></tr>";

//--------end of coorporate
 

//$data.=noRecordsFound($query,7);
 

  
$data.="</table>";

echo  $data;
}

function dashboardProgramBackup($program,$indicator){

		 $level1=array('ASARECA','Program','Project');				
						
$data="<form name='frm' id='frm' action='".$PHP_SELF."' METHOD='POST'><table width='800' id='report' border='0'>
  <tr class='evenrow'>
    <td colspan=''>Program:</td>
  <td colspan='2'><select name='program' id='program'  style='width:300px;' onChange='reloadDashboardProgram(getElementById('program').value,'');' >
  <option value='' >-All-</option>";
  $data.=QueryManager::ProgramFilter($program);
  
  $data.="</select> <div style='float:right;'>|
		  
		  <a href='export_to_excel_word.php?linkvar=Export Dashboard&&indicator=".$indicator."&&format=excel'><input name='new_training' type='button' class='formButton2'value='Export to Excel'></a> | 

<a href='print_version2.php?linkvar=Print Dashboard&&indicator=".$indicator."&&format=print' target='_blank'><input name='new_training' type='button' class='formButton2'value='Print Version'></a></div>  
</td>
  </tr>
  
  <tr class='evenrow'>
    <td colspan=''>Indicator:</td>
  <td colspan='2'><select name='Indicator' id='Indicator' style='width:300px;' onChange=\"reloadDashboardProgram('".$program."',this.value);\" >
  <option value='' >-All-</option>";
		  $sql="select * from tbl_indicator where level_ofindicator like '".$level1[1]."%' and prog_id='".$program."'  order by indicator_name asc";
		  
		  
		  
		  #$obj->addAlert($sql);
		  $n=1;
		  $query=@Execute($sql) or die(http('Dash-0014'));
		  while($ROW=@FetchRecords($query)){
		 $selected=($indicator==$ROW['indicator_id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['indicator_id']."\" ".$selected." >".substr($ROW['indicator_name'],0,100)."</option>";}
		  $data.="</select>
 |<input name='search' type='button' class='formButton2'value='Go' onClick=\"reloadDashboardProgram(getElementById('program').value,getElementById('Indicator').value);\" > </td>
  </tr>";
  
  $data.="<tr>
    <th colspan='3'><center>Program Key Performance Indicator Annual Performance</center></th>
    </tr>
	<tr>
	 <td colspan='4'>
	
	<table>";
	//http://localhost:83/2013/june_2013/asareca_10062013/
	$data.="<tr><td width='500' ><iframe name='DataCollectionTools".$N."' id='DataCollectionTools".$N."'
	 src='libchart2/demo/MultipleVerticalBarChartTest.php?indicator_id=".$row['indicator_id']."&&IndicatorName=".$row['indicator_name']."&&Target=".$TargetTotal."&&totalActual=".$totalAc."' width='700' height='270'></iframe></td></tr></table>

	
	
	</td></tr>
	
	<tr>
		 
		   <th colspan='3'>GRAPHICAL ILLUSTRATIONS</th>
			 </tr><tr><td colspan='3'><table>";
  
  					// where indicator_id='7'
  						$N=1;
  					//$level="Program";
  					$query_string="select i.indicator_type,i.indicator_id,i.indicator_code,
									d.display,d.DefName,d.defn_id,i.indicator_name,i.level_ofindicator
									from tbl_indicator i left join `tbl_indicator_definition` d
									on(d.indicator_id=i.indicator_id) 
									where i.indicator_id='".$indicator."' and i.indicator_name<> '' and i.level_ofindicator like '".$level1[1]."%'
									and i.prog_id='".$program."'
									group by i.indicator_id  order by i.indicator_name asc";
  
  
  								$queryProgram=@Execute($query_string) or die(http("Dashboard-276"));
  									while($row=@FetchRecords($queryProgram)){
						
  $color=$N%2==1?"evenrow3":"white1";

   
$data.="<tr><td>";
//---------------------Program Indicator Grid-----------------------



$data.="
  <tr class='evenrow2' class='dataRow'>
  <th CLASS='black2' colspan='2' rowspan='2' width='10' class='dataRow'>CODE</th>

  <th CLASS='black2' COLSPAN='2' class='dataRow' rowspan='2'>Program KEY PERFORMANCE INDICATORS</th>";
  
$queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
            		$data.="<th width='100' class='evenrow2' colspan='3' ><center>".$n."</center></th>";
					
					}
						  $data.="<th ROWSPAN='2'>TOTAL TARGET</th><th ROWSPAN='2'>TOTAL ACTUAL</th><th ROWSPAN='2'>Overall % Progress</th></tr>
						  <tr>";
						  for($x=1;$x<6;$x++){
						  $data.="<th>T$x</th>
						  <th>A$x</th><th>% Achieved</th>";
						  }
						  $data."</tr>";

					
				
				//having d.display 	like 'Yes%'
						//$obj->alert($query_string);  
								$query=Execute($query_string)or die(http("VP-4788"));
										while($row=@FetchRecords($query)){
								$color=($n%2==1)?"evenrow3":"white1";
			 
								$events2="onmouseup=\"this.style.backgroundColor='#999999';\"";
								 $data.="<tr class='display_none'>
										<td class='dataRow' valign='top' colspan='4' ><input type='checkbox' name='indicator_idAll[]' id='indicator_idAll'  value='".$row['indicator_id']."' />
											<input type='hidden' name='indicator_type[]' id='indicator_type' value='".$row['indicator_type']."' >
							
						".$inc++."
							<strong>".$row['indicator_code']."</strong> 
								 ".retrieve_info_withSpecialCharacters($row['indicator_name'])." 
							<strong> (".$row['indicator_type'].")</strong>
						</td></tr>"; 
					
					
					
							 $sql=QueryManager::view_indicatorMappingProgram($indicator);
							//$obj->alert($sql);
						$qdfn=Execute($sql)or die(http("VP-4131"));
							while($rowdfn=@mysql_fetch_array($qdfn)){
			//$color=$n%2==1?"evenrow"
			$div1="Mapping".$rowdfn['DefName'];
			$data.="<tr class='evenrow'>
						<td class='dataRow' valign='top'><input name='defintion_id' type='checkbox' value='".$row['defn_id']."' checked='checked' disabled='disabled'></td>
						<td class='dataRow' valign='top'> ".$rowdfn['indicator_code']."</td>
						<td class='dataRow' valign='top' colspan='2'><strong>(".$rowdfn['Accronym'].")</strong> <a href='#' onclick=\"xajax_view_indicatorMappingProject('".$rowdfn['DefName']."','".$div1."','".$rowdfn['prog_id']."');return false;\">".retrieve_info_withSpecialCharacters($rowdfn['indicator_name'])."</a></td>";
						
						//--------Program Actuals------
								$queryActual=QueryManager::view_indicatorMappingProgramActuals($rowdfn['DefName']);
							//$obj->alert($queryActual);
								$qdfnProgramActual=Execute($queryActual)or die(http("VP-4179")); 
									$rowActual=@FetchRecords($qdfnProgramActual); 
							$data.="<td valign='top' align='right' class='bluebg'>".$rowdfn['Year1']."</td>
							<td valign='top' align='right' class='orangebg'>".$rowActual['Year1Actual']."</td>";
							
							//$percentageAchvmntAGOP=calc_Percentage($TargetTotal,$totalAc);
	 
							//$percentageAchvmntAGOPDisplay=($percentageAchvmntAGOP!=0)?ColorCoding($percentageAchvmntAGOP,1):"<td ALIGN='RIGHT' class='redhdrs' >0.0%</td>";
							$data.=ColorCoding(calc_Percentage($rowdfn['Year1'],$rowActual['Year1Actual']),1);
						
							$data.="<td valign='top' align='right'  class='bluebg'>".$rowdfn['Year2']."</td>
								<td valign='top' align='right' class='orangebg' >".$rowActual['Year2Actual']."</td>
							".ColorCoding(calc_Percentage($rowdfn['Year2'],$rowActual['Year2Actual']),1)."
							<td valign='top' align='right' class='bluebg'>".$rowdfn['Year3']."</td>
							<td valign='top' align='right' class='orangebg'>".$rowActual['Year3Actual']."</td>
							".ColorCoding(calc_Percentage($rowdfn['Year3'],$rowActual['Year3Actual']),1)."
							<td valign='top' align='right' class='bluebg'>".$rowdfn['Year4']."</td>
							<td valign='top' align='right' class='orangebg'>".$rowActual['Year4Actual']."</td>
							".ColorCoding(calc_Percentage($rowdfn['Year4'],$rowActual['Year4Actual']),1)."
							<td valign='top' align='right' class='bluebg'>".$rowdfn['Year5']."</td>
							<td valign='top' align='right' class='orangebg'>".$rowActual['Year5Actual']."</td>
							".ColorCoding(calc_Percentage($rowdfn['Year5'],$rowActual['Year5Actual']),1);
							
							$grandTarget=($rowdfn['Year1']+$rowdfn['Year2']+$rowdfn['Year3']+$rowdfn['Year4']+$rowdfn['Year5']);
							$grandActual=($rowActual['Year1Actual']+$rowActual['Year2Actual']+$rowActual['Year3Actual']+$rowActual['Year4Actual']+$rowActual['Year5Actual']);
							
							$data.="<td valign='top' align='right' class='bluebg'>".$grandTarget."</td>
							<td valign='top' align='right' class='orangebg'>".$grandActual."</td>".
							ColorCoding(calc_Percentage($grandTarget,$grandActual),1);
							
							
							$data.="</tr><tr><td colspan='15'><div id='".$div1."'></div></td></tr>";
			 
			 } 
 

//end of programme defn----


//--------end of coorporate
  $n++; 
 } 
$data.=noRecordsFound($query,7)."</table></td></tr></table>
"; 




  
  }
  $N++;
  
$data.="</table>";
/* 			//$obj->alert($data);
$obj->assign('bodyDisplay','innerHTML',$data); */
echo  $data;
}

#************************************


  ?>
  


<html>
<head>


<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
<link rel="stylesheet" type="text/css" href=".css/style.css" media="screen" />
<link href="css/layout_fixed.css" rel="stylesheet" type="text/css" />
<!--graph css-->
<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/webstarter.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.13.custom.css" />
<link rel="stylesheet" type="text/css" href="css/superfish.css" />

<!--end  of graph css-->

<title><?php heading($_GET['action']); ?></title>
<script type="text/javascript" src="js/check.js" language="javascript"></script>
<script type="text/javascript" src="js/popup.js" language="javascript"></script>


<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery.gvChart-1.1.min.js"></script>-->
<script type="text/javascript" src="js/jquery.vAlign.js"></script>
<script type="text/javascript" src="js/jquery.disableSelection.js"></script>
<script type="text/javascript" src="js/jquery.superfish.js"></script>
<script type="text/javascript" src="js/gcal.js"></script>
<script type="text/javascript" src="js/ws.init.js"></script>
<!--end of graph javascript-->



	 
  <script type="text/javascript">
  

	gvChartInit();

 
      
    </script>
    <script type="text/javascript">
  
				function reloadDashboard(Indicator)
				{
				var linkvar='ASARECA DashBoard';<?php //$_GET['linkvar'];?>
				var action='home';<?php //$_GET['action'];?>
				
				//var cod=form.tabCode.value;
				//var Report=form.Report.value; 
				//var projectId=form.projectId.options[form.projectId.options.selectedIndex].value; 
				//options[form.Indicator.options.selectedIndex]
				//var Indicator=form.Indicator.value; 
				//alert(linkvar+'-x-'+action+'-y-'+Indicator);
				self.location='dashboard.php?linkvar='+linkvar+'&action='+action+'&Indicator='+Indicator;
				}
				
 

 function reloadDashboardProgram(Program,Indicator)
				{
				var linkvar='Program DashBoard';<?php //$_GET['linkvar'];?>
				var action='home';<?php //$_GET['action'];?>
				
				//var cod=form.tabCode.value;
				//var Report=form.Report.value; 
				//var projectId=form.projectId.options[form.projectId.options.selectedIndex].value; 
				//options[form.Indicator.options.selectedIndex]
				//var Indicator=form.Indicator.value; 
				//alert(linkvar+'-x-'+action+'-y-'+Indicator+'-z-'+Program);
				self.location='dashboard.php?linkvar='+linkvar+'&action='+action+'&program='+Program+'&Indicator='+Indicator;
				}
				
				
				function reloadDashboardProgramProject(Program,Indicator,Project)
				{
				var linkvar='Project DashBoard';<?php //$_GET['linkvar'];?>
				var action='home';<?php //$_GET['action'];?>
				
				//var cod=form.tabCode.value;
				//var Report=form.Report.value; 
				//var projectId=form.projectId.options[form.projectId.options.selectedIndex].value; 
				//options[form.Indicator.options.selectedIndex]
				//var Indicator=form.Indicator.value; 
				//alert(linkvar+'-x-'+action+'-y-'+Indicator+'-z-'+Program+'--PP--'+Project);
				self.location='dashboard.php?linkvar='+linkvar+'&action='+action+'&program='+Program+'&Indicator='+Indicator+'&Project='+Project;
				}
 
 
      
    </script> 
    
    
    
    </head>

</head>

<body><table cellspacing='0'      width="100%" border="0" align="center" cellpadding="0" bgcolor="#F0F0F0" bordercolor="#CCCCCC" style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
  <tr>
    <td bgcolor="#F0F0F0">
<table cellspacing='0'      width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFFFFF" bordercolor="#CCCCCC"  style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
  <tr>
    <td bgcolor="#F0F0F0">&nbsp;</td>
    <td><?php //require_once('connections/header.php'); ?>
	
	
	<table cellspacing='0' width="100%" border="0" align="center" bordercolor="" bgcolor="#ffffff">
  <tr>
    <td bgcolor="#FFFFFF"><div id="strip_one">
     <div id="header_wrapper1">

<!--search_n_translate-->
<div id="header1">
<div id="asareca_logo"></div><!--logo-->
<div id="asareca_text1">
Association for Strengthening Agricultural Research in Eastern and Central Africa (ASARECA) <br/>
<div id="asareca_text2">Planning, Monitoring, Evaluation, Reporting and Learning <strong>(PMERL)</strong> System.</div></div><!--asareca_text-->
</div><!--header-->
</div><!--header_wrapper-->

</div>
</div></td>
  </tr>
  
  <tr>
    <td width="" height="18" align="left" valign="top" bgcolor="#0a9c51" style="padding-left:20px;"><table cellspacing='0'      width="100%" border="0" align="left">
      <tr>
        <td><div id='profile' class="white"><a href="#" id="popup_link_6" >
        
        
         <img src="snaps/user.png" alt="User" title="user"  id='' width="50" height="50"/>&#9662;</a></div></div></td><td width="" height="38">
            <div align="left" class="white">Welcome to ASARECA Monitoring, Evaluation and Reporting System</div>
            </div></td>
        <td width="179"><div style="float:right;" class="white"><?php 
$date_fn=date_default_timezone_set("Etc/GMT-3");

//print $date_fn; 
 print substr(date('l'),0,3).", ".date('d')."&nbsp;".substr(date('F'),0,3)."&nbsp;".date('Y');
?></div></td>
        <td width="67"><div id="txt" class='white'><script language="javascript" type="text/javascript" >startTime();</script></div></td>
       <td width="52">
          <div align="right"><?php if($_SESSION['username']!='') echo "<a href='home.php' title='Home'  style='color:#FFFFFF;' >
		  <img src='icons/homeicongreen.png' width='50' height='50' title='Home'></a>";
		  else echo ""; ?></div></td>
        <td width="42"><div align="right"><a href="ASARECAUserguide.chm" style='color:#FFFFFF;' title='Help'><img src="icons/helpicon2.png" width="50" height="50" title='Help' ></a></div></td>
        <td width="49"> <?php if($_SESSION['username']!=''){?>
         <div align="right" class="redhdrs"><!--<a href="logout.php" class="redhdrs">Logout</a>--><a accesskey="0" href="logout.php?" onClick="return confirm('Are you sure you wish to logout?')"><img src="icons/logout1.png" width="50" height="50" title='Logout'></a></div><?php }
		 else
		 echo"";
		 
		 ?>
         </td>
      </tr>
    </table></td>
  </tr>
 <tr>
    <td height="18" align="left" valign="top" bgcolor="#bfe311"  style="padding-left:20px;">
	<?php echo userIdentity($_SESSION['username']);?></td>
  </tr>
</table>
	
	
	</td>
    <td bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
  <tr>
    <td width="12%"  bgcolor="#F0F0F0">&nbsp;</td>
    <td width="76%" align="left" valign="top"><table cellspacing='0'      width="" border="0" bordercolor="">
      <tr>
        <td width="20%"  align="left" valign="top"><table cellspacing='0'      width="100%" border="0">
          <tr>
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;"><?php require_once('connections/left_links.php'); ?></td>
          </tr>
        </table></td>
        <td width="800" align="left" valign="top" style="text-align:justify; top:0px; ">
        
        <table cellspacing='0'      width="100%" border="0">
          <tr>
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;p"><div id="title" style="float:center; vertical-align:top;">
      <?php 
function title1($linkvar,$action){
$data="<table cellspacing='0'  width='100%'><td colspan='4' class='green_field'>".$action." &raquo;  ".$linkvar."</td>
  </tr>
  <tr>
    <td colspan='4'><hr/></td>
  </tr></table>";
echo($data);

}


					//if(isset($_GET['linkvar'])){
					title1($_GET['linkvar'],$_GET['action']); 
				
				switch($_GET['linkvar']){
				case 'ASARECA DashBoard':
					 dashboardProjects($_GET['Indicator']);
				break;
				 case 'Program DashBoard':
				 dashboardProgram($_GET['program'],$_GET['Indicator']);
				break;
				
				case 'Project DashBoard':
		
				 dashboardProgramProject($_GET['program'],$_GET['Indicator'],$_GET['project']);
				 break;
				default:
				  //dashboardProgramProject($_GET['program']='1',$_GET['Indicator']='6158',$_GET['project']='54');
				 //dashboardProgram($_GET['program'],$_GET['Indicator']);
				 }
				 
				 //}
				 ?>
				
				 
	
			

    

                 
                 
                 
    </td></tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
    <td width="12%" bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
  <tr>
    <td height="38" bgcolor="#F0F0F0">&nbsp;</td>
    <td height="38"><?php #require_once('connections/footer.php'); ?>
	
	
	<table cellspacing='0'      width="100%" border="0" align="center" bgcolor="#ffffff"   ><tr><td>
<?php if($_SESSION['username']!=''){echo'<div align="center">
  <div align="center" class="black">Use the Vertical Panel To Navigate Through the System</div>';
  }else echo"";
  
  ?>

  </td>
 
 
   <tr>
    <td colspan="2" align='center'><table cellspacing='0'      ><tr><td><a href="index.php" class="greenlinks">Home </a>|</td><td> <a href="#" class="greenlinks">Terms of use</a></td><td>| <a href="index.php" class="greenlinks">Login</a>     
    </td></tr></table></td>
  </tr>
  <tr>
    <td height="38" valign="middle"  background="images/footer_1.png" style="background-repeat:repeat-x; color:#FFFFFF; padding-left:3px;"><div style='float:left' class="black2"> Version 1.5 (April, 2013). &copy; <?php echo date('Y');?> <a href='www.asreca.org' style="color:#FFFFFF;" target='_blank'>ASARECA.</a> All rights reserved.&nbsp;</div>
         <div style='float:right' ><a href='http://www.dcareug.com' target='_blank' style="color:#FFFFFF;" >Developed by Data Care (U) LTD</a>&nbsp;&nbsp;</div>
</table>
	
	
	</td>
    <td height="38" bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
</table>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>

