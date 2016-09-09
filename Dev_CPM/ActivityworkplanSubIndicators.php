<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************
#--------------------Sub IndicatorTargets---------------------------------

$xajax->register(XAJAX_FUNCTION,'ViewAnnualTargets');
$xajax->register(XAJAX_FUNCTION,'edit_annualTarget');
$xajax->register(XAJAX_FUNCTION,'update_annualTargetExtended');


#functions
#****************************
include('ActivitySave.php');
require_once('ActivityFilters.php');
require_once('ActivityEdit.php');
require_once('ActivityDelete.php');
#********************************************



function ViewAnnualTargets($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
$qmobj = new QueryManager('');

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
$_SESSION['fyear']=($year==0)?$_SESSION['CPMactiveyear']:$year;
//$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['CPMactiveyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------
if($_SESSION['semiAnnual']=='Closed'||$_SESSION['fyear']=='Closed'){
$obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
}

$n=1;
$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'>";
	$data.="<table cellspacing='1' id='report' width='100%'>".filter_annualTarget_2($fnctName="ViewAnnualTargets");

		if($_GET['action']=='Reports'){
			$data.="";
		}else {
			$data.="<tr  class='evenrow'>";
				$data.="<td colspan='21'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |";
				$data.="<input type='button' class='formButton2' id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |";
				$data.="<input type='button' class='formButton2' id='button' TITLE='Edit'  onclick=\"xajax_edit_annualTarget(xajax.getFormValues('annualTarget1'),'".$_SESSION['fyear']."','".$_SESSION['zoneID']."','".$_SESSION['semiAnnual']."');return false;\" value='edit' title='Edit' />"; 
				/* $data.="<input type='hidden' class='formButtonRed' TITLE='Delete'  onclick=\"xajax_delete_AnnualTargets(xajax.getFormValues('annualTarget1'),'xajax_delete_AnnualTargets','tbl_workplan');return false;\" value='Delete' /></td>"; */
			$data.="</tr>";
		}
  
  
		
		$data.="<tr>
			<th colspan='2' rowspan='2' class='dataRow' >NO/SELECT</th>
			<th rowspan=2 colspan='7' width='' class='dataRow'>Indicator</th>
			<th colspan='6' class='dataRow'><center>Annual Targets</center></th>
		</tr>
		<tr>
			<th colspan='2' class='dataRow'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
			<th colspan='2' class='dataRow'>unit of measure</th>
			<th class='dataRow'>Baseline</th>
			<th colspan='1' class='dataRow'>Total Targets</th>
		</tr>";
		
		$inc=1;
		$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output_id']."%' order by output_code asc")or die(http(__line__));
		
		/* start of outPut-Rows */
		while($rowoutput=@mysql_fetch_array($logicaloutput)){
		
			$data.="<tr>
				<td><strong>".$rowoutput['output_code']."</strong></td>
				<td colspan='20'><strong>".$rowoutput['output_name']."</strong></td>
			</tr>";
			
			$x=QueryManager::ViewIndicatorAnnualTargets($rowoutput['output_id']);
			$_SESSION['queryExport']=$x;
			$query=@mysql_query($x)or die(http(__line__));
			if(@mysql_num_rows($query)>0)
				
			/* start of MainIndicator-Rows */	
			while($row=@mysql_fetch_array($query)){
				$baseline=$row['baseline'];
				$base=$baseline>0?$baseline:"-";
				$color=$inc%2==1?"evenrow":"white1";
				$events2 = "onMouseover=\"this.style.color='orange',this.style.backgroundColor='#CEEFEF';\" onMouseout=\"this.style.color='black',this.style.backgroundColor='';\"";
				$l="align=right";			
				
				$x=QueryManager::ViewAnnualTargets($_SESSION['fyear'],$_SESSION['semiAnnual'],$row['indicator_id']);
				$yQuery=Execute($x) or die(http(__line__));
				$rowWP=FetchRecords($yQuery);
				
				$s_cpmSubIndicators=$qmobj->cpmSubIndicatorsOnly($row['indicator_id']);
				$q_cpmSubIndicators=@Execute($s_cpmSubIndicators)or die(http(__line__));
				$nR = mysql_num_rows($q_cpmSubIndicators);
				$numRecords=(1+$nR);
				
				$data.="<tbody class='".$color."' ".$events2.">";
				$data.="<tr>
					<td rowspan='".$numRecords."' align=left><INPUT type='checkbox' name='indicator_idAll[]' id='indicator_idAll' value='".$row['indicator_id']."' >".$inc."</td>
					<td rowspan='".$numRecords."' align=left><INPUT type=hidden name='loopkey[]' id='loopkey' value='1' />".$row['indicator_code']."</td>
					<td colspan='7'><strong><font color='#001E55'>".$row['indicator_name']."</font></strong></td>
					<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
					<td align='left' colspan='2'>".$row['unitofmeasure']."</td>
					<td align=right ><strong>".number_format($base)."</strong></td>";
					
					$data.="<td align='right' ><INPUT type='hidden' name='workplan_id[]' id='workplan_id' value='".$rowWP['workplan_id']."'>
						<INPUT type='hidden' name='region[]' id='region' value='".$rowWP['region']."'>
						<INPUT type='hidden' name='curr_year []'   id='curr_year ' value='".$rowWP['curr_year']."'>
						<INPUT type='hidden' name='semi_annual[]'   id='semi_annual' value='".$rowWP['semi_annual']."'>
						<INPUT type='hidden' name='DerivedWorkplanId[]'   id='DerivedWorkplanId' value='".$newId."'><strong>".checkExistance($rowWP['totalAnnualTarget'],0,'ExistsInteger')."</strong>
					</td>";
				$data.="</tr>";
				
				$i=1;
				/* start of SubIndicator-Rows */
				while($rowCpm=@FetchRecords($q_cpmSubIndicators)){
					if($rowCpm['otherMeasures']==''){
						
					}else{
						/* Start display of dissggregations */
						
						$data.="<tr>
							<td align=left>
								<INPUT type='hidden' name='sub_indicator_idAll[]'  id='sub_indicator_idAll' value='".$rowCpm['sub_indicatorId']."' >
								<INPUT type='hidden'  name='loopkeySub[]'  id='loopkeySub'  value='1' />".$i.".
							</td>";
							$data.="<td colspan='6'>".$rowCpm['otherMeasures']."</td>";
							$data.="<td colspan='2' align=left>".checkExistance($row['indicator_type'],'','ExistsString')."</td>";
							$data.="<td colspan='2' align=left>".$row['unitofmeasure']."</td>";
							$data.="<td align=right>".number_format($rowCpm['baseline'])."</td>";
							
							$s_cpmSubTarget=$qmobj->cpmSubIndicatorsByYear($rowCpm['indicator_id'],$rowCpm['sub_indicatorId'],$rowWP['curr_year']);
							$q_cpmSubTarget=@Execute($s_cpmSubTarget)or die(http(__line__));
							$rowT=@FetchRecords($q_cpmSubTarget);
							$subIndTarget=(($rowT['Target']<>'' || $rowT['Target']<>null)?$rowT['Target']:0);
							$data.="<td align=right>".number_format($subIndTarget)."</td>";
							
						$data.="</tr>"; 
						
						/* End display of dissggregations */
						
					}
				$i++;
				}/* end of SubIndicator-Rows */
				
				$data.="</tbody>";
			
			$inc++;
			}/* end of MainIndicator-Rows */
			
			
			
		}/* end of outPut-Rows */
		
		
		
		if($_GET['action']=='Reports'){
			$data.="";
		}else {
			$data.="<tr  class='evenrow'>";
				$data.="<td colspan='21'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |";
				$data.="<input type='button' class='formButton2' id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |";
				$data.="<input type='button' class='formButton2' id='button' TITLE='Edit'  onclick=\"xajax_edit_annualTarget(xajax.getFormValues('annualTarget1'),'".$_SESSION['fyear']."','".$_SESSION['zoneID']."','".$_SESSION['semiAnnual']."');return false;\" value='edit' title='Edit' />"; 
				/* $data.="<input type='hidden' class='formButtonRed' TITLE='Delete'  onclick=\"xajax_delete_AnnualTargets(xajax.getFormValues('annualTarget1'),'xajax_delete_AnnualTargets','tbl_workplan');return false;\" value='Delete' /></td>"; */
			$data.="</tr>";
		}
		
	$data.="</table>";
$data.="</form>";


	
	
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
	<script type="text/javascript" src="js/calc.js"></script>
    <script type="text/javascript" src="js/addRow.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
    <script type="text/javascript" src="js/loading.js" language="javascript"></script>
    <script type="text/javascript" src="js/check.js" language="javascript"></script>
    <script type="text/javascript" src="js/popup.js" language="javascript"></script>
    <script type="text/javascript" src="js/js.js" language="javascript"></script>
	<script type="text/javascript" src="js/limit_text.js" language="javascript"></script>
    <script type="text/javascript" src="js/add_upload.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-2.1.4.js" language="javascript"></script>
    <script type="text/javascript" src="js/sumRows.js" language="javascript"></script>
    <script type="text/javascript" src="js/hoverRows.js" language="javascript"></script>
</head>

<body>
<div align='center' id='dvLoading'><span
        style='font-size:24px; margin-top:50px; font-weight:bold;'>CPM PMT Annual Sub-Indicator Targets Setup...</span></div>
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
					case "Sub-Indicator Workplan": 
					?>
						xajax_ViewAnnualTargets('','','','','','','','','',1,20);
					
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

