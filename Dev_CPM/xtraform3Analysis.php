<?php
session_start();
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************
							
$xajax->register(XAJAX_FUNCTION,'xtra_form3Analysis');



#************************************


function xtra_form3Analysis($partner,$region,$reportingPeriod,$financialYear,$report,$cur_page=1,$records_per_page=4){
    
    
$obj=new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['partner']=$partner;
$_SESSION['region']=$region;
$_SESSION['reportingPeriod']=$reportingPeriod;
$_SESSION['financialYear']=$financialYear;
$_SESSION['report']=$report;


$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;
$partner=($_SESSION['partner']<>''?$_SESSION['partner']:$partner);
$region=($_SESSION['region']<>''?$_SESSION['region']:$region);
$reportingPeriod=($_SESSION['reportingPeriod']<>''?$_SESSION['reportingPeriod']:$reportingPeriod);
$financialYear=($_SESSION['financialYear']<>''?$_SESSION['financialYear']:$financialYear);
$report=($_SESSION['report']<>''?$_SESSION['report']:$report);

$data.="<form  name='trader' id='trader' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0' cellspacing='1' cellpadding='1'>";

$data.="<tr class='evenrow'>";
$data.="<td>";
$data.="<table width='100%'>";

$data.="<tr>";
$data.="<td width='' colspan=''>";
          $data.="<div align='left'><strong>Partner:</strong></div>";
          $data.="</td>";
          $data.="<td colspan=2>";
          $data.="<select name='partner' id='partner' onchange=\"xajax_xtra_form3Analysis(this.value,'".$_SESSION['region']."','".$_SESSION['reportingPeriod']."','".$_SESSION['financialYear']."','".$_SESSION['report']."',1,4); return false;\" style='width:180px;'>";
            $data.="<option value=''>-select-</option>";
			$data.=$qmobj->PartnerFilter($partner);	
            $data.="</select>";
		  $data.="</td>";
$data.="</tr>";
		  
$data.="<tr>";
$data.="<td width='' colspan=''>";
          $data.="<div align='left'><strong>Region:</strong></div>";
          $data.="</td>";
          $data.="<td colspan=2>";
          $data.="<select name='region' id='region' onchange=\"xajax_xtra_form3Analysis('".$_SESSION['partner']."',this.value,'".$_SESSION['reportingPeriod']."','".$_SESSION['financialYear']."','".$_SESSION['report']."',1,4); return false;\" style='width:180px;'>";
            $data.="<option value=''>-All-</option>";
			$data.=$qmobj->ZoneFilter($region);	
            $data.="</select>";
		  $data.="</td>";
$data.="</tr>";
		  
$data.="<tr>";		  
$data.="<td width='' colspan=''>";
          $data.="<div align='left'><strong>Reporting Period:</strong></div>";
          $data.="</td>";
          $data.="<td colspan=2>";
          $data.="<select name='reportingPeriod' id='reportingPeriod' onchange=\"xajax_xtra_form3Analysis('".$_SESSION['partner']."','".$_SESSION['region']."',this.value,'".$_SESSION['financialYear']."','".$_SESSION['report']."',1,4); return false;\" style='width:180px;'>";
          /* $data.="<option value=''>-select-</option>"; */
		  $data.="<option value=''>-All-</option>";
          $data.=$qmobj->ReportingPeriodFilter($reportingPeriod);
           $data.="</select>";
		  $data.="</td>";
          $data.="</tr>";	
$data.="<tr>";	

$data.="<tr>";
$data.="<td width='' colspan=''>";
          $data.="<div align='left'><strong>Financial Year:</strong></div>";
          $data.="</td>";
          $data.="<td colspan=2>";
          $data.="<select name='financialYear' id='financialYear' value='' onchange=\"xajax_xtra_form3Analysis('".$_SESSION['partner']."','".$_SESSION['region']."','".$_SESSION['reportingPeriod']."',this.value,'".$_SESSION['report']."',1,4); return false;\" style='width:180px;'>";
         /*  $data.="<option value=''>-select-</option>"; */
		  $data.="<option value=''>-All-</option>";
          $data.=$qmobj->FinancialYearDigitsFilter($financialYear);
          $data.="</select>";
		  $data.="</td>";
          $data.="</tr>";	


		  
		  $data.="<td width='' colspan=''>";
          $data.="<div align='left'><strong>Type Of Report:</strong></div>";
          $data.="</td>";
          $data.="<td colspan=2>";
          $data.="<select name='report' id='report' value='' onchange=\"xajax_xtra_form3Analysis('".$_SESSION['partner']."','".$_SESSION['region']."','".$_SESSION['reportingPeriod']."','".$_SESSION['financialYear']."',this.value,1,4); return false;\" style='width:180px;'>";
            $data.="<option value=''>-select-</option>";
			$data.=$qmobj->ReportsFilter($report);	
            $data.="</select>";
		  $data.="</td>";
          
          $data.="<td><input name='search' type='button' class='formButton2' value='Go' onclick=\"xajax_xtra_form3Analysis(getElementById('region').value,getElementById('partner').value,getElementById('report').value,getElementById('reportingPeriod').value,getElementById('financialYear').value);return false;\" />";
                  $data.="</td>";
        $data.="</tr>";
        $data.="</table></td>";
        
        $data.="<td colspan='' align='right'>
                  <a href='export_to_excel_word.php?linkvar=Export XtraFormAnalysis&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
                  <input name='export_XtraFormAnalysis' type='button' class='formButton2'value='Export to Excel'></a> |";
		  $data.="<a href='print_version.php?linkvar=Print XtraFormAnalysis&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
                  <input name='export_XtraFormAnalysis' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
	  $data.="</tr>";
	
				  
				  switch($partner){
					 case 1:
					 
					  $data.="<tr class='evenrow3'>
					  <td colspan='15'>";
						$data.="<table border='0' width='100%' cellspacing='1' cellpadding='1'  style='background-color:#EBEBEB;'>
							<tr class='evenrow'>
							  <th colspan='15'><div align='center'>Form3 Exporters Extra Analysis</div></th>
							  </tr>";
                  
                  //===================data to be displayed=====================
						$data.="<tr>";
						$data.="<th>#</th>";
						$data.="<th>Region</th>";
						$data.="<th>Partner</th>";
						$data.="<th>Type of report</th>";
						$data.="<th>Reporting Period</th>";
						$data.="<th colspan='2'>Fields</th>";
						$data.="<th colspan='8'>Monthly Disaggregation</th>";

					  $data.="</tr>";
						$query_string="select x. * , ex.*,  z.`zoneName` from `tbl_exporters` x, `tbl_form3_exporters` as `ex`, `tbl_zone` z 
						where x.`exporterRegion` = z.`zoneCode` and `x`.`tbl_exportersId` = `ex`.`tbl_exporterId` and `ex`.`tbl_exporterId`<>'' and x.display='Yes' ";
						if($region<>'') { $query_string.=" and x.`exporterRegion` LIKE '%".$region."%'"; }
						$query_string.=" group by x.`tbl_exportersId` order by x.`tbl_exportersId` desc";
							
							$count=1; 
                            $query_=mysql_query($query_string)or die(http(164));
                           
                            $max_records = mysql_num_rows($query_);
                            /* $records_per_page=5; */
                            $num_pages=ceil($max_records/$records_per_page);
                            $offset = ($cur_page-1)*$records_per_page;
                            $count=$offset+1;
                            $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(112));
                            $x=1;
							while($row=mysql_fetch_array($new_query)){
                            $color=$count%2==1?"evenrow":"white1";
                            
							$data.="<tr>";
								$data.="<td colspan='15' bgcolor='#8aa94a'><font size='2' color='white'><strong>".$count.".&#x272A; ".strtoupper($row['exporterName'])."</strong></font></td>";
						    $data.="</tr>";
							
								$form3Exporters="select r.* ,`x`.`tbl_form3_exportersId`,
												`x`.`tbl_exporterId`,
												`x`.`reportingPeriod`,
												`x`.`year`,
												`x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
												`x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
												`x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
												`x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
												`x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
												`x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
												`x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
												`x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
												`x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
												`x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
												`x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
												`x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
												`x`.`exTradersSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
												`x`.`exTradersSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
												`x`.`exTradersSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
												`x`.`exTradersSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
												`x`.`exTradersSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
												`x`.`exTradersSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
												`x`.`exTradersSupplyChainDetails`,
												`x`.`exUnionSupplyChainFifthQuarterMonth` as `exUSCFifthQM`, 
												`x`.`exUnionSupplyChainFirstQuarterMonth` as `exUSCFirstQM`, 
												`x`.`exUnionSupplyChainFourthQuarterMonth` as `exUSCFourthQM`, 
												`x`.`exUnionSupplyChainSecondQuarterMonth` as `exUSCSecondQM`, 
												`x`.`exUnionSupplyChainSixthQuarterMonth` as `exUSCSixthQM`,  
												`x`.`exUnionSupplyChainThirdQuarterMonth` as `exUSCThirdQM`,
												`x`.`exUnionsSupplyChainDetails`,
												`x`.`volMaizePurchasedDetails`,
												`x`.`volMaizeExDetails`,
												`x`.`volCoffeeExDetails`,
												`x`.`volBeansExDetails`,
												`x`.`epayRecievedDetails`,
												`x`.`epayMadeDetails`,
												`x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
												`x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
												`x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
												`x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
												`x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
												`x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
												`x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
												`x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
												`x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
												`x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
												`x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
												`x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
												`x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
												`x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
												`x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
												`x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
												`x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
												`x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
												`x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
												`x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
												`x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
												`x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
												`x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
												`x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
												`x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
												`x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
												`x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
												`x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
												`x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
												`x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
												`x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
												`x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
												`x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
												`x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
												`x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
												`x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
												`x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
												`x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
												`x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
												`x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
												`x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
												`x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
												`x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
												`x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
												`x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
												`x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
												`x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
												`x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
												`x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
												`x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
												`x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
												`x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
												`x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
												`x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
												`x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
												`x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
												`x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`, ex.* ";
								$form3Exporters.="from `tbl_form3_exporters` as `x` ";
								$form3Exporters.="join `tbl_exporters` as `ex`  ";
								$form3Exporters.="on (`ex`.`tbl_exportersId` = `x`.`tbl_exporterId`), ";
								$form3Exporters.="`tbl_reports` as r ";
								$form3Exporters.="where x.`tbl_exporterId` = '".$row['tbl_exportersId']."' ";
								$form3Exporters.="and r.`reportCode` = '2'";
								
								
								if($report<>'') { $form3Exporters.=" and r.`reportCode` LIKE '%".$report."%'"; } 
								if($reportingPeriod<>'') { $form3Exporters.=" and x.`reportingPeriod` LIKE  '%".$reportingPeriod."%' "; }
								if($financialYear<>'') { $form3Exporters.=" and x.`year` LIKE '%".$financialYear."%' "; }
								
								$form3Exporters.="order by x.`tbl_exporterId` asc ";
								
							  $query=Execute($form3Exporters)or die(http("Xtraform3Analysis 200"));
							  $n=1;
								while($rowForm3Analysis=FetchRecords($query)){
									$color=($n%2==1)?"bluish":"white1";
									
									$data.="<tr class='".$color."'>";
												$data.="<td rowspan='14'>".$n.". </td>";
												$data.="<td rowspan='14'>".$row['zoneName']."</td>";
												$data.="<td rowspan='14'>Exporter</td>";
												$data.="<td rowspan='14'>".$rowForm3Analysis['reportName']."</td>";
												$reportingPeriod=$rowForm3Analysis['reportingPeriod'];
												$year=$rowForm3Analysis['year'];
													switch($reportingPeriod){
													case "Oct - Mar":
													$firstString=substr("".$reportingPeriod."", 0, 3).($year-1);
													$lastString=substr("".trim($reportingPeriod)."", -3).($year);
													break;
													
													case "Apr - Sep":
													$firstString=substr("".$reportingPeriod."", 0, 3).($year);
													$lastString=substr("".trim($reportingPeriod)."", -3).($year);
													break;
												
													default:
													break;
												}
												$reportingPeriodString="".$firstString." - ".$lastString."";
												$data.="<td rowspan='14' width='150'>".$reportingPeriodString."</td>";
												$data.="<td colspan='2'>&nbsp;</td>";
												switch($reportingPeriod){
													case "Apr - Sep":
													$monthsArray=array('4','5','6','7','8','9');
													break;
													
													case "Oct - Mar":
													$monthsArray=array('10','11','12','1','2','3');
													break;
													
													default:
													$monthsArray=array('13','14','15','16','17','18');
													break;
												}
												
												foreach ($monthsArray as $key) {
													$month= __month__coverter($key); 
													$result = substr($month, 0, 3);	
													$data.="<td ><strong>".$result."</strong></td>";	
												}
												$data.="<td><strong>TOTAL</strong></td>";
												$data.="<td width='200'><strong>GIVEN DETAILS</strong></td>";
											$data.="</tr>";
											
											
											$data.="<tr class='".$color."'>";
												$data.="<td colspan='2' width='200'><strong>Number of Traders/DC in the supply chain</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCSixthQM'])."</td>";
												$totTSC=number_format($rowForm3Analysis['exTSCFirstQM']+$rowForm3Analysis['exTSCSecondQM']+$rowForm3Analysis['exTSCThirdQM']+$rowForm3Analysis['exTSCFourthQM']+$rowForm3Analysis['exTSCFifthQM']+$rowForm3Analysis['exTSCSixthQM']);
												$data.="<td align='right'>".$totTSC."</td>";
												$data.="<td>".$rowForm3Analysis['exTradersSupplyChainDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td colspan='2' width='200'><strong>Number of CBOs/unions/societies in the supply Chain</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCSixthQM'])."</td>";
												$totUSC=number_format($rowForm3Analysis['exUSCFirstQM']+$rowForm3Analysis['exUSCSecondQM']+$rowForm3Analysis['exUSCThirdQM']+$rowForm3Analysis['exUSCFourthQM']+$rowForm3Analysis['exUSCFifthQM']+$rowForm3Analysis['exUSCSixthQM']);
												$data.="<td align='right'>".$totUSC."</td>";
												$data.="<td>".$rowForm3Analysis['exUnionsSupplyChainDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td rowspan='3' width='200'><strong>Volume of produce purchased (Kgs)</strong></td>";
												$data.="<td><strong>Maize</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPSixthQM'])."</td>";
												$totVolMP=number_format($rowForm3Analysis['volMPFirstQM']+$rowForm3Analysis['volMPSecondQM']+$rowForm3Analysis['volMPThirdQM']+$rowForm3Analysis['volMPFourthQM']+$rowForm3Analysis['volMPFifthQM']+$rowForm3Analysis['volMPSixthQM']);
												$data.="<td align='right'>".$totVolMP."</td>";
												$data.="<td rowspan='3'>".$rowForm3Analysis['volMaizePurchasedDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td><strong>Coffee</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPSixthQM'])."</td>";
												$totvolCP=number_format($rowForm3Analysis['volCPFirstQM']+$rowForm3Analysis['volCPSecondQM']+$rowForm3Analysis['volCPThirdQM']+$rowForm3Analysis['volCPFourthQM']+$rowForm3Analysis['volCPFifthQM']+$rowForm3Analysis['volCPSixthQM']);
												$data.="<td align='right'>".$totvolCP."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td><strong>Beans</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPSixthQM'])."</td>";
												$totvolBP=number_format($rowForm3Analysis['volBPFirstQM']+$rowForm3Analysis['volBPSecondQM']+$rowForm3Analysis['volBPThirdQM']+$rowForm3Analysis['volBPFourthQM']+$rowForm3Analysis['volBPFifthQM']+$rowForm3Analysis['volBPSixthQM']);
												$data.="<td align='right'>".$totvolBP."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td rowspan='2' width='200'><strong>Maize Exports: Volumes and Values</strong></td>";
												$data.="<td><strong>Volume (Kg)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMESixthQM'])."</td>";
												$totvolME=number_format($rowForm3Analysis['volMEFirstQM']+$rowForm3Analysis['volMESecondQM']+$rowForm3Analysis['volMEThirdQM']+$rowForm3Analysis['volMEFourthQM']+$rowForm3Analysis['volMEFifthQM']+$rowForm3Analysis['volMESixthQM']);
												$data.="<td align='right'>".$totvolME."</td>";
												$data.="<td rowspan='2'>".$rowForm3Analysis['volMaizeExDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td><strong>Value (Ugx)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxSixthQM'])."</td>";
												$totvolMEUgx=number_format($rowForm3Analysis['volMEUgxFirstQM']+$rowForm3Analysis['volMEUgxSecondQM']+$rowForm3Analysis['volMEUgxThirdQM']+$rowForm3Analysis['volMEUgxFourthQM']+$rowForm3Analysis['volMEUgxFifthQM']+$rowForm3Analysis['volMEUgxSixthQM']);
												$data.="<td align='right'>".$totvolMEUgx."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td rowspan='2' width='200'><strong>Coffee Exports: Volumes and Values</strong></td>";
												$data.="<td><strong>Volume (Kg)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCESixthQM'])."</td>";
												$totvolCE=number_format($rowForm3Analysis['volCEFirstQM']+$rowForm3Analysis['volCESecondQM']+$rowForm3Analysis['volCEThirdQM']+$rowForm3Analysis['volCEFourthQM']+$rowForm3Analysis['volCEFifthQM']+$rowForm3Analysis['volCESixthQM']);
												$data.="<td align='right'>".$totvolCE."</td>";
												$data.="<td rowspan='2' >".$rowForm3Analysis['volCoffeeExDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td><strong>Value (Ugx)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxSixthQM'])."</td>";
												$totvolCEUgx=number_format($rowForm3Analysis['volCEUgxFirstQM']+$rowForm3Analysis['volCEUgxSecondQM']+$rowForm3Analysis['volCEUgxThirdQM']+$rowForm3Analysis['volCEUgxFourthQM']+$rowForm3Analysis['volCEUgxFifthQM']+$rowForm3Analysis['volCEUgxSixthQM']);
												$data.="<td align='right'>".$totvolCEUgx."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td rowspan='2' width='200'><strong>Beans Exports: Volumes and Values</strong></td>";
												$data.="<td><strong>Volume (Kg)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBESixthQM'])."</td>";
												$totvolBE=number_format($rowForm3Analysis['volBEFirstQM']+$rowForm3Analysis['volBESecondQM']+$rowForm3Analysis['volBEThirdQM']+$rowForm3Analysis['volBEFourthQM']+$rowForm3Analysis['volBEFifthQM']+$rowForm3Analysis['volBESixthQM']);
												$data.="<td align='right'>".$totvolBE."</td>";
												$data.="<td rowspan='2' >".$rowForm3Analysis['volBeansExDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td><strong>Value (Ugx)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxSixthQM'])."</td>";
												$totvolBEUgx=number_format($rowForm3Analysis['volBEUgxFirstQM']+$rowForm3Analysis['volBEUgxSecondQM']+$rowForm3Analysis['volBEUgxThirdQM']+$rowForm3Analysis['volBEUgxFourthQM']+$rowForm3Analysis['volBEUgxFifthQM']+$rowForm3Analysis['volBEUgxSixthQM']);
												$data.="<td align='right'>".$totvolBEUgx."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td colspan='2' width='200'><strong>Number of e-payments received </strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRSixthQM'])."</td>";
												$totepayR=number_format($rowForm3Analysis['epayRFirstQM']+$rowForm3Analysis['epayRSecondQM']+$rowForm3Analysis['epayRThirdQM']+$rowForm3Analysis['epayRFourthQM']+$rowForm3Analysis['epayRFifthQM']+$rowForm3Analysis['epayRSixthQM']);
												$data.="<td align='right'>".$totepayR."</td>";
												$data.="<td>".$rowForm3Analysis['epayRecievedDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td colspan='2' width='200'><strong>Number of e-payments made</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMSixthQM'])."</td>";
												$totepayM=number_format($rowForm3Analysis['epayMFirstQM']+$rowForm3Analysis['epayMSecondQM']+$rowForm3Analysis['epayMThirdQM']+$rowForm3Analysis['epayMFourthQM']+$rowForm3Analysis['epayMFifthQM']+$rowForm3Analysis['epayMSixthQM']);
												$data.="<td align='right'>".$totepayM."</td>";
												$data.="<td>".$rowForm3Analysis['epayMadeDetails']."</td>";
											$data.="</tr>";
									
									$n++;
							  }
							  $data.="".noRecordsFound($query,10)."";
							  
							
                            $count++;
                            $inc++;
                                     }

							$data.="".noRecordsFound($new_query,10)."";
                                     
                //====================end of displayed data===================
					 
					 break;
					 
					 case 2:
					 
					 $data.="<tr class='evenrow3'><td colspan='12'>";
						$data.="<table border='0' width='100%' cellspacing='1' cellpadding='1'  style='background-color:#EBEBEB;'>
							<tr class='evenrow'>
							  <th colspan='24'><div align='center'>form4 traders Extra Analysis</div></th>
							  </tr>";
                  
                  //===================data to be displayed=====================
						$data.="<tr>";
						$data.="<th>#</th>";
						$data.="<th>Trader Code</th>";
					    $data.="<th>Trader Crops</th>";
					    $data.="<th>Distance in Kilometers(Km)<br/>from CPM offices</th>";
					    $data.="<th>Size of store</th>";
					    $data.="<th>Trader Model</th>";
					    $data.="<th>Date of recruitment</th>";
						$data.="<th>Region</th>";
						$data.="<th>District</th>";
						$data.="<th>Subcounty</th>";
						$data.="<th>Village</th>";
						$data.="<th>Partner</th>";
						$data.="<th>Type of report</th>";
						$data.="<th>Reporting Period</th>";
						$data.="<th colspan='2'>Fields</th>";
						$data.="<th colspan='8'>Monthly Disaggregation</th>";

					  $data.="</tr>";
						$query_string="select x.*, ex.*, 
						z.`zoneName`,
						d.districtName,
						s.subcountyName
						from `tbl_traders` as x,
						`tbl_form4_traders` as `ex` ,
						`tbl_zone` as z,
						`tbl_district` d,
						`tbl_subcounty` s						
						where x.`traderRegion` = z.`zoneCode` 
						and `x`.`tbl_tradersId` = `ex`.`tbl_traderId` 
						and `ex`.`tbl_traderId`<>'' 
						and d.`districtCode`  = s.`districtCode`
						and x.`traderDistrict`  = d.`districtCode`
						and x.`traderSubcounty`  = s.`subcountyCode`
						and x.display='Yes'";
						
						if($region<>'') { $query_string.=" and x.`traderRegion` LIKE '%".$region."%'"; }
						$query_string.=" group by x.`tbl_tradersId` order by x.`tbl_tradersId` desc";
                                    
                                    
                                   
							$count=1; 
                            $query_=mysql_query($query_string)or die(http(164));
                            /**************
                            *paging parameters
                            *
                            ****/
                            $max_records = mysql_num_rows($query_);
                            /* $records_per_page=5; */
                            $num_pages=ceil($max_records/$records_per_page);
                            $offset = ($cur_page-1)*$records_per_page;
                            $count=$offset+1;
                            $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(112));
                            $x=1;
                            while($row=mysql_fetch_array($new_query)){
                            $color=$count%2==1?"evenrow":"white1";
                            
							$data.="<tr>";
								$data.="<td colspan='24' bgcolor='#8aa94a'><font size='2' color='white'><strong>".$count.".&#x272A; ".strtoupper($row['traderName'])."</strong></font></td>";
						    $data.="</tr>";
							
							
							
							$form4Traders="select r.* ,`x`.`tbl_form4_tradersId`,
											`x`.`tbl_traderId`,
											`x`.`reportingPeriod`,
											`x`.`year`,
											`x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
											`x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
											`x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
											`x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
											`x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
											`x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
											`x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
											`x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
											`x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
											`x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
											`x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
											`x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
											`x`.`vaSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
											`x`.`vaSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
											`x`.`vaSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
											`x`.`vaSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
											`x`.`vaSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
											`x`.`vaSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
											`x`.`vaSupplyChain`,
											`x`.`vaSupplyChainDetails`,
											`x`.`numCboFifthQuarterMonth` as `exUSCFifthQM`, 
											`x`.`numCboFirstQuarterMonth` as `exUSCFirstQM`, 
											`x`.`numCboFourthQuarterMonth` as `exUSCFourthQM`, 
											`x`.`numCboSecondQuarterMonth` as `exUSCSecondQM`, 
											`x`.`numCboSixthQuarterMonth` as `exUSCSixthQM`,  
											`x`.`numCboThirdQuarterMonth` as `exUSCThirdQM`,
											`x`.`numCbo`,
											`x`.`numCboDetails`,
											`x`.`volMaizePurchasedDetails`,
											`x`.`volMaizeExDetails`,
											`x`.`volCoffeeExDetails`,
											`x`.`volBeansExDetails`,
											`x`.`epayRecievedDetails`,
											`x`.`epayMadeDetails`,
											`x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
											`x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
											`x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
											`x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
											`x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
											`x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
											`x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
											`x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
											`x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
											`x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
											`x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
											`x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
											`x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
											`x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
											`x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
											`x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
											`x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
											`x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
											`x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
											`x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
											`x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
											`x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
											`x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
											`x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
											`x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
											`x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
											`x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
											`x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
											`x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
											`x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
											`x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
											`x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
											`x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
											`x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
											`x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
											`x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
											`x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
											`x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
											`x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
											`x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
											`x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
											`x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
											`x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
											`x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
											`x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
											`x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
											`x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
											`x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
											`x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
											`x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
											`x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
											`x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
											`x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
											`x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
											`x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
											`x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
											`x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM` ";
								$form4Traders.="from `tbl_form4_traders` as `x` ";
								$form4Traders.="join `tbl_traders` as `ex`  ";
								$form4Traders.="on (`ex`.`tbl_tradersId` = `x`.`tbl_traderId`), ";
								$form4Traders.="`tbl_reports` as r ";
								$form4Traders.="where `x`.`tbl_traderId` = '".$row['tbl_tradersId']."' ";
								$form4Traders.="and r.`reportCode` = '2'";
								
								
								if($report<>'') { $form4Traders.=" and r.`reportCode` LIKE '%".$report."%'"; } 
								if($reportingPeriod<>'') { $form4Traders.=" and x.`reportingPeriod` LIKE  '%".$reportingPeriod."%' "; }
								if($financialYear<>'') { $form4Traders.=" and x.`year` LIKE '%".$financialYear."%' "; }
								
								$form4Traders.="order by `x`.`tbl_traderId` asc ";
								
							  $query=Execute($form4Traders)or die(http("Xtraform4Analysis 387"));
							  $n=1;
							  while($rowform4Analysis=FetchRecords($query)){
									$color=($n%2==1)?"bluish":"white1";
									
									$data.="<tr class='".$color."'>";
												$data.="<td rowspan='14'>".$n.". </td>";
												$data.="<td rowspan='14' align='right'>&nbsp;".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['traderCode']))."</td>";
												$b=$row['traderCropBeans'];
												$c=$row['traderCropCoffee'];
												$m=$row['traderCropMaize'];
												$sanB=($b=='Yes')?"Beans,":"";
												$sanC=($c=='Yes')?"Coffee,":"";
												$sanM=($m=='Yes')?"Maize,":"";
												$cropString="".$sanB."".$sanC."".$sanM."";
												$trCrops=substr($cropString, 0, -1);
												$data.="<td rowspan='14' align='right'>&nbsp;".$trCrops."</td>";
												$data.="<td rowspan='14' align='right'>&nbsp;".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['traderRadius']))."</td>";
												$data.="<td rowspan='14' align='right'>&nbsp;".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['traderStoreSize']))."</td>";
												$data.="<td rowspan='14'>&nbsp;".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['traderModel']))."</td>";
												$data.="<td rowspan='14' align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['traderDateRecruited']))."</td>";
												$data.="<td rowspan='14'>".$row['zoneName']."</td>";
												$data.="<td rowspan='14'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['districtName']))."</td>";
												$data.="<td rowspan='14'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['subcountyName']))."</td>";
												$data.="<td rowspan='14'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['traderVillage']))."</td>";
												$data.="<td rowspan='14'>Trader</td>";
												$data.="<td rowspan='14'>".$rowform4Analysis['reportName']."</td>";
												$reportingPeriod=$rowform4Analysis['reportingPeriod'];
												$year=$rowform4Analysis['year'];
													switch($reportingPeriod){
													case "Oct - Mar":
													$firstString=substr("".$reportingPeriod."", 0, 3).($year-1);
													$lastString=substr("".trim($reportingPeriod)."", -3).($year);
													break;
													
													case "Apr - Sep":
													$firstString=substr("".$reportingPeriod."", 0, 3).($year);
													$lastString=substr("".trim($reportingPeriod)."", -3).($year);
													break;
												
													default:
													break;
												}
												$reportingPeriodString="".$firstString." - ".$lastString."";
												$data.="<td rowspan='14' width='150'>".$reportingPeriodString."</td>";
												$data.="<td colspan='2'>&nbsp;</td>";
												
												switch($reportingPeriod){
													case "Apr - Sep":
													$monthsArray=array('4','5','6','7','8','9');
													break;
													
													case "Oct - Mar":
													$monthsArray=array('10','11','12','1','2','3');
													break;
													
													default:
													$monthsArray=array('13','14','15','16','17','18');
													break;
												}
												
												foreach ($monthsArray as $key) {
													$month= __month__coverter($key); 
													$result = substr($month, 0, 3);	
													$data.="<td ><strong>".$result."</strong></td>";	
												}
												
												
												
												$data.="<td><strong>TOTAL</strong></td>";
												$data.="<td width='200'><strong>GIVEN DETAILS</strong></td>";
											$data.="</tr>";
											
											
											$data.="<tr class='".$color."''>";
												$data.="<td colspan='2'>Number of VAs in the supply chain</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCSixthQM'])."</td>";
												$totTSC=number_format($rowform4Analysis['exTSCFirstQM']+$rowform4Analysis['exTSCSecondQM']+$rowform4Analysis['exTSCThirdQM']+$rowform4Analysis['exTSCFourthQM']+$rowform4Analysis['exTSCFifthQM']+$rowform4Analysis['exTSCSixthQM']);
												$data.="<td align='right'>".$totTSC."</td>";
												$data.="<td>".$rowform4Analysis['vaSupplyChainDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td colspan='2'>Number of CBOs/unions/societies in the supply Chain</td>";
												 $data.="<td align='right'>".number_format($rowform4Analysis['exUSCFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exUSCSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exUSCThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exUSCFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exUSCFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exUSCSixthQM'])."</td>";
												$totUSC=number_format($rowform4Analysis['exUSCFirstQM']+$rowform4Analysis['exUSCSecondQM']+$rowform4Analysis['exUSCThirdQM']+$rowform4Analysis['exUSCFourthQM']+$rowform4Analysis['exUSCFifthQM']+$rowform4Analysis['exUSCSixthQM']);
												$data.="<td align='right'>".$totUSC."</td>";
												$data.="<td>".$rowform4Analysis['numCboDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td rowspan='3'>Volume of produce purchased (Kgs)</td>";
												$data.="<td>Maize</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPSixthQM'])."</td>";
												$totVolMP=number_format($rowform4Analysis['volMPFirstQM']+$rowform4Analysis['volMPSecondQM']+$rowform4Analysis['volMPThirdQM']+$rowform4Analysis['volMPFourthQM']+$rowform4Analysis['volMPFifthQM']+$rowform4Analysis['volMPSixthQM']);
												$data.="<td align='right'>".$totVolMP."</td>";
												$data.="<td rowspan='3'>".$rowform4Analysis['volMaizePurchasedDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td>Coffee</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPSixthQM'])."</td>";
												$totvolCP=number_format($rowform4Analysis['volCPFirstQM']+$rowform4Analysis['volCPSecondQM']+$rowform4Analysis['volCPThirdQM']+$rowform4Analysis['volCPFourthQM']+$rowform4Analysis['volCPFifthQM']+$rowform4Analysis['volCPSixthQM']);
												$data.="<td align='right'>".$totvolCP."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td>Beans</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPSixthQM'])."</td>";
												$totvolBP=number_format($rowform4Analysis['volBPFirstQM']+$rowform4Analysis['volBPSecondQM']+$rowform4Analysis['volBPThirdQM']+$rowform4Analysis['volBPFourthQM']+$rowform4Analysis['volBPFifthQM']+$rowform4Analysis['volBPSixthQM']);
												$data.="<td align='right'>".$totvolBP."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td rowspan='2'>Maize Exports: Volumes and Values</td>";
												$data.="<td>Volume (Kg)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMESixthQM'])."</td>";
												$totvolME=number_format($rowform4Analysis['volMEFirstQM']+$rowform4Analysis['volMESecondQM']+$rowform4Analysis['volMEThirdQM']+$rowform4Analysis['volMEFourthQM']+$rowform4Analysis['volMEFifthQM']+$rowform4Analysis['volMESixthQM']);
												$data.="<td align='right'>".$totvolME."</td>";
												$data.="<td rowspan='2'>".$rowform4Analysis['volMaizeExDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td>Value (UGX)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxSixthQM'])."</td>";
												$totvolMEUgx=number_format($rowform4Analysis['volMEUgxFirstQM']+$rowform4Analysis['volMEUgxSecondQM']+$rowform4Analysis['volMEUgxThirdQM']+$rowform4Analysis['volMEUgxFourthQM']+$rowform4Analysis['volMEUgxFifthQM']+$rowform4Analysis['volMEUgxSixthQM']);
												$data.="<td align='right'>".$totvolMEUgx."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td rowspan='2'>Coffee Exports: Volumes and Values</td>";
												$data.="<td>Volume (Kg)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCESixthQM'])."</td>";
												$totvolCE=number_format($rowform4Analysis['volCEFirstQM']+$rowform4Analysis['volCESecondQM']+$rowform4Analysis['volCEThirdQM']+$rowform4Analysis['volCEFourthQM']+$rowform4Analysis['volCEFifthQM']+$rowform4Analysis['volCESixthQM']);
												$data.="<td align='right'>".$totvolCE."</td>";
												$data.="<td rowspan='2' >".$rowform4Analysis['volCoffeeExDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td>Value (UGX)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxSixthQM'])."</td>";
												$totvolCEUgx=number_format($rowform4Analysis['volCEUgxFirstQM']+$rowform4Analysis['volCEUgxSecondQM']+$rowform4Analysis['volCEUgxThirdQM']+$rowform4Analysis['volCEUgxFourthQM']+$rowform4Analysis['volCEUgxFifthQM']+$rowform4Analysis['volCEUgxSixthQM']);
												$data.="<td align='right'>".$totvolCEUgx."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td rowspan='2'>Bean Exports: volumes and values</td>";
												$data.="<td>Volume (Kg)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBESixthQM'])."</td>";
												$totvolBE=number_format($rowform4Analysis['volBEFirstQM']+$rowform4Analysis['volBESecondQM']+$rowform4Analysis['volBEThirdQM']+$rowform4Analysis['volBEFourthQM']+$rowform4Analysis['volBEFifthQM']+$rowform4Analysis['volBESixthQM']);
												$data.="<td align='right'>".$totvolBE."</td>";
												$data.="<td rowspan='2' >".$rowform4Analysis['volBeansExDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td>Value(UGX)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxSixthQM'])."</td>";
												$totvolBEUgx=number_format($rowform4Analysis['volBEUgxFirstQM']+$rowform4Analysis['volBEUgxSecondQM']+$rowform4Analysis['volBEUgxThirdQM']+$rowform4Analysis['volBEUgxFourthQM']+$rowform4Analysis['volBEUgxFifthQM']+$rowform4Analysis['volBEUgxSixthQM']);
												$data.="<td align='right'>".$totvolBEUgx."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td colspan='2'>Number of e-payments received </td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRSixthQM'])."</td>";
												$totepayR=number_format($rowform4Analysis['epayRFirstQM']+$rowform4Analysis['epayRSecondQM']+$rowform4Analysis['epayRThirdQM']+$rowform4Analysis['epayRFourthQM']+$rowform4Analysis['epayRFifthQM']+$rowform4Analysis['epayRSixthQM']);
												$data.="<td align='right'>".$totepayR."</td>";
												$data.="<td>".$rowform4Analysis['epayRecievedDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td colspan='2'>Number of e-payments made</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMSixthQM'])."</td>";
												$totepayM=number_format($rowform4Analysis['epayMFirstQM']+$rowform4Analysis['epayMSecondQM']+$rowform4Analysis['epayMThirdQM']+$rowform4Analysis['epayMFourthQM']+$rowform4Analysis['epayMFifthQM']+$rowform4Analysis['epayMSixthQM']);
												$data.="<td align='right'>".$totepayM."</td>";
												$data.="<td>".$rowform4Analysis['epayMadeDetails']."</td>";
											  $data.="</tr>";
									
									$n++;
							  }

							  $data.="".noRecordsFound($query,10)."";
							  
							
                            $count++;
                            $inc++;
                                     }
                                     $data.="".noRecordsFound($new_query,10)."";
                                     
                //====================end of displayed data===================
					  
					 break;
					 
					 default:
					 
					 break;
					 
					  
				  }
                  
                  
                
                                     
                
/*
*display pages
*/
$data.="<tr align='right'><td colspan=20>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_xtra_form3Analysis('".$_SESSION['partner']."','".$_SESSION['region']."','".$_SESSION['reportingPeriod']."','".$_SESSION['financialYear']."','".$_SESSION['report']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_xtra_form3Analysis('".$_SESSION['partner']."','".$_SESSION['region']."','".$_SESSION['reportingPeriod']."','".$_SESSION['financialYear']."','".$_SESSION['report']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	
	 
	 /* for($p=2;$p<$num_pages;$p++){ */
	 
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_xtra_form3Analysis('".$_SESSION['partner']."','".$_SESSION['region']."','".$_SESSION['reportingPeriod']."','".$_SESSION['financialYear']."','".$_SESSION['report']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_xtra_form3Analysis('".$_SESSION['partner']."','".$_SESSION['region']."','".$_SESSION['reportingPeriod']."','".$_SESSION['financialYear']."','".$_SESSION['report']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_xtra_form3Analysis('".$_SESSION['partner']."','".$_SESSION['region']."','".$_SESSION['reportingPeriod']."','".$_SESSION['financialYear']."','".$_SESSION['report']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*10<=$max_records){
		$selected=$i*10==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
		$i++;
	}
	
	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select>";
	$data.="</br></td></tr><table>";
	
	$data.="<table>";
        
   $data.="</tr>
   </table>
   </form>";
        
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;


}



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
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Extra Forms: 3 and 4 Analysis Report...</span></div>
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

					switch($linkvar){
							case "Extra Form 3 and 4 Analysis":
							?>
							xajax_xtra_form3Analysis('','','','','',1,4);  
						  
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

