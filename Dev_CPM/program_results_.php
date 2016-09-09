<?php
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************

#----------------------------------------------

#---------------Physical Targets-------------------------------
$xajax->register(XAJAX_FUNCTION,'view_QuarterlyPhysicalSubcomponentResults');
$xajax->register(XAJAX_FUNCTION,'view_QuarterlyPhysicalActivityResults');
$xajax->register(XAJAX_FUNCTION,'view_QuarterlyPhysicalOutputResults');
$xajax->register(XAJAX_FUNCTION,'view_annualPhysicalWorkplan');
$xajax->register(XAJAX_FUNCTION,'view_annualPhysicalMonitoring');
$xajax->register(XAJAX_FUNCTION,"view_annualorganizationsReported");
$xajax->register(XAJAX_FUNCTION,'view_targetSummary');
$xajax->register(XAJAX_FUNCTION,'view_projectLifeTargets');
$xajax->register(XAJAX_FUNCTION,'view_quarterlyResults');
$xajax->register(XAJAX_FUNCTION,'view_annualorganizationsReportedQuarterly');

//$xajax->registerExternalFunction('view_quarterlyResults','program_monitoring.php');
#---------------Financial Targets------------------------------
$xajax->register(XAJAX_FUNCTION,'view_annualFinancialWorkplan');
$xajax->register(XAJAX_FUNCTION,'view_annualFinancialMonitoring');
$xajax->register(XAJAX_FUNCTION,'view_projectLifeFinancialBudget');
$xajax->register(XAJAX_FUNCTION,'view_QuarterlyFinancials');
#***********querterly results*************-----------------------
#***********************dced***********************************

$xajax->register(XAJAX_FUNCTION,'view_DCEDannualPhysicalMonitoring');
$xajax->register(XAJAX_FUNCTION,'view_DCEDQualitativeannualTargetReport');
$xajax->register(XAJAX_FUNCTION,'view_DCEDQuantitativeannualTargetReport');
$xajax->register(XAJAX_FUNCTION,'view_DCEDquarterlyResults');

#**************************************************************
$xajax->register(XAJAX_FUNCTION,'view_annualResults');
$xajax->register(XAJAX_FUNCTION,'budgetSummary');
$xajax->register(XAJAX_FUNCTION,'searchBudgetSummary');
$xajax->register(XAJAX_FUNCTION,'valueChainDevelopment_Summary');
$xajax->register(XAJAX_FUNCTION,'financialServices_Summary');
$xajax->register(XAJAX_FUNCTION,'spsQms_Summary');
$xajax->register(XAJAX_FUNCTION,'genderForGrowth_Summary');
//$xajax->register(XAJAX_FUNCTION,'title');
$xajax->register(XAJAX_FUNCTION,'view_ccf');
$xajax->register(XAJAX_FUNCTION,'view_cummulativeResults');
$xajax->register(XAJAX_FUNCTION,'view_classifiedccf');

$xajax->register(XAJAX_FUNCTION,'view_quarterlyResultsccf');
$xajax->register(XAJAX_FUNCTION,'select_year');
#************************************************

require_once('filters.php');
#************************************************


#*************************************************

function select_year(){
$obj= new xajaxResponse();
$data="<table width='400' border='0'>
<tr>
<th scope='col'><div align='right'>SELECT PROJECT YEAR</div></th>
<th scope='col'><div align='left'>
      <select name='project_year' class='evenrow' id='project_year' onChange=\"xajax_view_quarterlyResults(getElementById('project_year').value)\">";
	  $yr ='2013'; $end = $yr;
       $selected=$yr==$end?"SELECTED":"";
                                      do{
                                    $data.="<option value='".$end."' '".$selected."'>".$end."</option>";
                                 $end--;
								 } 
								 while ($end>= 2010);             
     $data.=" </select>
    </div></th>
    <th scope='col'><div align='left'>
      <input type='button' name='button' id='button' value='Go' />
    </div></th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>";

$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}
/* function view_quarterlyResultsccf(){
$obj=new xajaxResponse();

$select="create or replace view view_quarterlyactuals as select indicator_id,count(total) counted_rows,sum(if((reportingperiod='Jan - Mar 2010'),total,'')) as q1yr1,sum(if((reportingperiod='Apr - Jun 2010'),total,'')) as q2yr1,sum(if((reportingperiod='Jul - Sep 2010'),total,'')) as q3yr1,sum(if((reportingperiod='Oct - Dec 2010'),total,'')) as q4yr1,sum(if((reportingperiod='Jan - Mar 2011'),total,'')) as q1yr2,sum(if((reportingperiod='Apr - Jun 2011'),total,'')) as q2yr2,sum(if((reportingperiod='Jul - Sep 2011'),total,'')) as q3yr2,sum(if((reportingperiod='Oct - Dec 2011'),total,'')) as q4yr2,sum(if((reportingperiod='Jan - Mar 2012'),total,'')) as q1yr3,sum(if((reportingperiod='Apr - Jun 2012'),total,'')) as q2yr3,sum(if((reportingperiod='Jul - Sep 2012'),total,'')) as q3yr3,sum(if((reportingperiod='Oct - Dec 2012'),total,'')) as q4yr3,sum(if((reportingperiod='Jan - Mar 2013'),total,'')) as q1yr4,sum(if((reportingperiod='Apr - Jun 2013'),total,'')) as q2yr4,sum(if((reportingperiod='Jul - Sep 2013'),total,'')) as q3yr4,sum(if((reportingperiod='Oct - Dec 2013'),total,'')) as q4yr4 from tbl_organizationreporting  group by indicator_id asc";

$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
} */


function view_quarterlyResults_bckup($year){
$obj=new xajaxResponse();
//$year=date(Y);
$data="<table width='100%' border='0'>
  
	 <tr>
    <th scope='col' colspan=9><div align='right'>SELECT PROJECT YEAR</div></th>
    <th scope='col' colspan=3><div align='left'>
      <select name='project_year' class='evenrow' id='project_year' onChange=\"xajax_view_quarterlyResults(getElementById('project_year').value)\">";
	  $yr ='2013'; $end = $yr;
       $selected=$yr==$end?"SELECTED":"";
                                      do{
                                    $data.="<option value='".$end."' '".$selected."'>".$end."</option>";
                                 $end--;} while ($end>= 2010);             
     $data.=" </select>
    </div></th>
    <th scope='col'><div align='left'>
      <input type='button' name='button' id='button' value='Go' />
    </div></th>
 

    <th colspan='2'><strong>T=&gt;Target</strong></th>
    <th width='2%'><strong>A=&gt;Actual</strong></th>
	 <th width='' colspan=3></th>
  </tr><tr>
    <td colspan='19' scope='col' width='' class=evenrow2 align='center'>QUARTERY TARGETS AGAINST ACTUALS</td>
  </tr>
  
  <tr class='evenrow2'>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td colspan='3'><strong>Qaurter1 (Jan - Mar)</strong></td>
    <td colspan='3'><strong>Qaurter2 (Apr - Jun)</strong></td>
    <td colspan='3'><strong>Qaurter3 (Jul - Sep)</strong></td>
    <td colspan='3'><strong>Qaurter4 (Oct - Dec)</strong></td>
 
    
    <td width='2%' ><strong>TOTAL PROJECT LIFE TARGET</strong></td>
    <td width='2%' ><strong>TOTAL ACTUAL</strong></td>
    <td colspan=3 ><strong>(%) QUARTERY PERFORMANCE</strong></td>
  </tr>
  <tr class='evenrow2'>
    <td align='right'><b>NO</td>
	<td  align='left' width='300'><b>Indicator</td>
    <td  align='right' width='2%'><b>T</td>
    <td  align='right' width='3%'><b>A</td>
	<td  align='right' width='3%'><b>%</td>
    <td  align='right' width='2%'><b>T</td>
    <td  align='right' width='2%'><b>A</td>
	<td  align='right' width='3%'><b>%</td>
    <td  align='right' width='2%'><b>T</td>
    <td  align='right' width='2%'><b>A</td>
	<td  align='right' width='3%'><b>%</td>
    <td  align='right' width='2%'><b>T</td>
    <td  align='right' width='2%'><b>A</td>
	<td  align='right' width='3%'><b>%</td>
 <td  align='right' width='2%'><b>T</td>
    <td  align='right' width='2%'><b>A</td>
	<td  align='right' width='3%' colspan=3><b>%</td>
  </tr>";
   //sum(sum(if((a.reportingperiod='Jan - Mar ".$year."'),a.total,''))+sum(if((a.reportingperiod='Apr - Jun ".$year."'),a.total,''))+sum(if((a.reportingperiod='Jul - Sep ".$year."'),a.total,''))+sum(if((a.reportingperiod='Oct - Dec ".$year."'),a.total,''))) as totalquarterlyactual,
  $n=1; $inc=1;
  /* $select="select a.indicator_id,at.indicator_name,a.year,count(a.total) as counted_rows,sum(if((a.reportingperiod='Jan - Mar ".$year."'),a.total,'')) as q1,sum(if((a.reportingperiod='Apr - Jun ".$year."'),a.total,'')) as q2,sum(if((a.reportingperiod='Jul - Sep ".$year."'),a.total,'')) as q3,sum(if((a.reportingperiod='Oct - Dec ".$year."'),a.total,'')) as q4,sum(if((at.year='".$year."'),at.pquarter1,'')) as q1t,sum(if((at.year='".$year."'),pquarter2,'')) as q2t,sum(if((at.year='".$year."'),pquarter3,'')) as q3t,sum(if((at.year='".$year."'),pquarter4,'')) as q4t,at.projectlifetarget,sum(if((a.year='".$year."'),a.total,'')) as totalquarterlyactual from tbl_organizationreporting a 
 left join view_annualtarget at on(a.indicator_id=at.indicator_id) where a.year='".$year."' group by a.indicator_id,a.year,a.reportingperiod"; */
  
  
  $select="select plt.indicator_id,i.indicator_name,r.year,
at.pquarter1 as targetQ1,
MAX(if(r.reportingPeriod='Jan - Mar',r.total,'')) as actualQ1,

at.pquarter2 as targetQ2,
MAX(if(r.reportingPeriod='Apr - Jun',r.total,''))  as actualQ2,

at.pquarter3 as targetQ3,
MAX(if(r.reportingPeriod='Jul - Sep',r.total,''))  as actualQ3,

at.pquarter4 as targetQ4,
MAX(if(r.reportingPeriod='Oct - Dec',r.total,'')) as actualQ4
,at.ptotal as targetActual,
MAX(r.total) as actualAnnual,

plt.target as projectLifeTarget 
from tbl_indicator i 
left join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
left join tbl_annualtarget at on(i.indicator_id=at.indicator_id)
left join tbl_projectlifetargets plt on(i.indicator_id=plt.indicator_id) 
where r.year='".$year."'
group by i.indicator_id,r.year";
  
  //inner join tbl_indicator i on(a.indicator_id=at.indicator_id) 
  $xx="select * from view_quarterytargets_actuals group by indicator_id order by indicator_name asc";
  //$obj->addAlert($select);
  $query=mysql_query($select)or die("aBi Error code:0100 because, ".mysql_error());
  while($row=mysql_fetch_array($query)){
  $q=$row['q1'];
  $tot=round($row['q1']+$row['q2']+$row['q3']+$row['q4'],0);
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
	<td  align='left' width='200'>$row[indicator_name]</td>
    <td align='right'>$row[q1t]</td>
    <td align='right'>$row[q1]</td>
	 <td align='right'>".round(($row['q1']/round($row['q1t'],1))*100,0)."%</td>
    <td align='right'>$row[q2t]</td>
    <td align='right'>$row[q2]</td>
	<td align='right'>".round(($row['q2']/round($row['q2t'],1))*100,0)."%</td>
    <td align='right'>$row[q3t]</td>
    <td align='right'>$row[q3]</td>
	<td align='right'>".round(($row['q3']/round($row['q3t'],1))*100,0)."%</td>
    <td align='right'>$row[q4t]</td>
    <td align='right'>$row[q4]</td>
	<td align='right'>".round(($row['q4']/round($row['q4t'],1))*100,0)."%</td>
  <td align='right'>$row[projectlifetarget]</td>
  <td align='right'>".$tot."</td>
  <td align='right' colspan=3>".round(($tot/round($row['projectlifetarget'],1))*100,0)."%</td>
  </tr>";
  $inc++;
  //$obj->addAlert($data2);
  } 
   $data.="<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}

//view organizations resported quarterly


function view_annualorganizationsReportedQuarterly($indicator_id,$year,$div,$quarter){
$obj= new xajaxResponse();
/* $date=$_SESSION['ABIActiveyear'];
$year=($year!='')?$year:$date;
$_SESSION['year106']=$year; */
$year=($year!='')?$year:$_SESSION['ABIActiveyear'];
$quarter=($quarter!=='')?$quarter:$_SESSION['quarter'];
//$obj->alert($indicator_id,$year,$div,$quarter);
$data="<table width='600'><tr class='evenrow2'><td>No</td><td>Name</td><td colspan=2>Indicator</td><td>Quarter</td><td>Actual Value</td></tr>";

 $sql="select i.indicator_id,i.indicator_name,i.subcomponent_id,s.subcomponent_code,s.subcomponent,r.org_code,o.orgName,r.reportingPeriod,r.year,
   r.total as TotalAnnualActuals
  
   from tbl_indicator i inner join tbl_organizationreporting r 
   on(i.indicator_id=r.indicator_id) 
   inner join tbl_subcomponent s on(s.id=i.subcomponent_id) 
   left join tbl_organization o on(o.org_code=r.org_code)
	where  r.year like '".$year."%'  and r.reportingPeriod like '".$quarter."%' 
	and  i.indicator_id='".$indicator_id."'
  	order by r.reportingPeriod,i.indicator_name asc"; 
		//$obj->alert($sql);
			$x=1;
		$query=mysql_query($sql)or die(http("3170"));
   while($row=mysql_fetch_array($query)){ 
    $color=$n%2==1?"evenrow":"white";
   $rep=($row['orgName']==NULL)?"<strong>".$row['subcomponent']." Manager </strong>":$row['orgName'];
   
$data.="<tr bgcolor='#f0e5a5'><td>".$x++."</td><td>".$rep."</td><td colspan=2>".$row['indicator_name']."</td><td>".$row['reportingPeriod']."</td><td align='right'>".$row['TotalAnnualActuals']."</td></tr>";

}
$sql2="select i.indicator_id,i.indicator_name,i.subcomponent_id,
	s.subcomponent_code,s.subcomponent,r.org_code,o.orgName,
	r.reportingPeriod,r.year,sum(r.total) as TotalAnnualActuals
	from tbl_indicator i inner join tbl_organizationreporting r 
   on(i.indicator_id=r.indicator_id) 
   inner join tbl_subcomponent s on(s.id=i.subcomponent_id) 
   left join tbl_organization o on(o.org_code=r.org_code)
	where  r.year like '".$year."%'  and r.reportingPeriod like '".$quarter."%' 
	and  i.indicator_id='".$indicator_id."'
	group by r.reportingPeriod,r.year
  	order by r.reportingPeriod,o.orgName,i.indicator_name asc";
  $QX=mysql_query($sql2)or die(http("3189"));
  if(mysql_num_rows($QX)>0){
$tot=mysql_fetch_array(mysql_query($sql2))or die(http(4449));
$data.="<tr class='evenrow2'><td colspan=5>Total </td><td align='right'>".$tot['TotalAnnualActuals']."</td></tr>";
}
else{
$data.="<tr class=''><td colspan=7>".noResultsFound()."</td></tr>";
}
$data.="</table>";

$obj->assign($div,'innerHTML',$data);
return $obj;
}




function view_quarterlyResults($quarter,$year,$subcomponent,$output,$activity,$subactivity){
$obj=new xajaxResponse();
$year=($year!='')?$year:$_SESSION['ABIActiveyear'];
$quarter=($quarter!=='')?$quarter:$_SESSION['quarter'];

$_SESSION['Resultsubcomponent3']=$subcomponent;
$_SESSION['Resultoutput3']=$output;
$_SESSION['Resultactivity3']=$activity;
$_SESSION['Resultsubactivity3']=$subactivity;
$data="<table width='660' border='0'>
   <tr class='evenrow'>
    <td scope='col' colspan='2'><div align='left'>Quarter </div></td>
    <td scope='col' colspan=5><div align='left'>
      <select name='project_quarter' id='project_quarter' style='width:300px;'>";
	 if($quarter!='') $data.="<option value=\"".$quarter."\" ".$selected.">".$quarter."</option>";

	 $data.="<option value='Jan - Mar'>Jan - Mar</option>";
	 $data.="<option value='Apr - Jun'>Apr - Jun</option>";
	 $data.="<option value='Jul - Sep'>Jul - Sep</option>";
	 $data.="<option value='Oct - Dec'>Oct - Dec</option>";
     $data.=" </select>
    </div></td>
	<td scope='col' colspan=''><div align='right'>YEAR</div></td>
    <td scope='col' colspan=''><div align='left'>
      <select name='project_year'  id='project_year' >";
       $data.="<option value=\"".$year."\" ".$selected.">".$year."</option>";
	  $yr ='2013'; $end = $yr;
       $selected=$yr==$end?"SELECTED":"";
       do{
       $data.="<option value=\"".$end."\">".$end."</option>";
                                 $end--;} while ($end>= 2010);             
     $data.=" </select>
    </div></td><td align='right'><a href='export_to_excel_word.php?linkvar=Export Quarterly Results&&quarter=".$quarter."&&year=".$year."&&subactivity=".$_SESSION['Resultsubactivity3']."&&subcomponent=".$_SESSION['Resultsubcomponent3']."&&output=".$_SESSION['Resultoutput3']."&&activity=".$_SESSION['Resultactivity3']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></td>
   
  </tr>";
  
  $data.="
  <tr class='evenrow'>
  <td colspan=2>Sub-Component:</td><td colspan=8><select name='subcomponent' id='subcomponent3' style='width:300px;'>";
	
	if($_SESSION['usersubcomponent']<>''){
$query=mysql_query("select * from tbl_subcomponent where id like '".$_SESSION['usersubcomponent']."%' order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
#$sel=($_SESSION['subcomponent1']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  } }
					  else {
					  $data.="<option value=''>-All-</option>";
	$sel2=mysql_query("select * from tbl_subcomponent order by subcomponent_code")or die("aBi Error-code 285 because ".mysql_error());
	while($row2=mysql_fetch_array($sel2)){
	$s23=($_SESSION['Resultsubcomponent3']==$row2['subcomponent'])?"SELECTED":"";
	$data.="<option value=\"".$row2['subcomponent']."\" ".$s23." >".$row2['subcomponent_code']." ".substr($row2['subcomponent'],0,30)."</option>";
	}
	}
	
    $data.="</select></td></tr>
	<tr class='evenrow'>
    <td colspan='2' scope='col' width=''  align='left'>Output:</td><td colspan='7'>
	<div style='float:left;'><select name='output' id='output' style='width:300px;'>
      <option value=''>-ALL-</option>";
	$sel=mysql_query("select * from tbl_output where subcomp_id like '".$_SESSION['usersubcomponent']."%' group by output_code order by output_code")or die(http("PR-387"));
	while($row1=mysql_fetch_array($sel)){
	$s33=($_SESSION['Resultoutput3']==$row1['output_name'])?"SELECTED":"";
	$data.="<option value=\"".$row1['output_name']."\" ".$s33." >".$row1['output_code']." ".substr($row1['output_name'],0,40)."</option>";
	
	
	}
	
	
    $data.="</select></td> <td scope='col'></td>
  </tr>
 
 <tr class='evenrow'>
  <td colspan=2>Activity:</td><td colspan=7><select name='activity' id='activity' style='width:300px;'>
      <option value=''>-ALL-</option>";
$sel2=mysql_query("select * from tbl_activity where subcomp_id like '".$_SESSION['usersubcomponent']."%' order by activity_code")or die("aBi Error-code 285 because ".mysql_error());
	while($row2=mysql_fetch_array($sel2)){
	$s24=($_SESSION['Resultactivity3']==$row2['activity_name'])?"SELECTED":"";
	$data.="<option value=\"".$row2['activity_name']."\" ".$s24." >".$row2['activity_code']." ".substr($row2['activity_name'],0,30)."</option>";
	}
	
	
    $data.="</select></td><td></td>
	</tr>
	<tr class='evenrow'>
    <td colspan='2' scope='col' width=''  align='left'>Sub-Activity</td><td colspan='7'>
	<div style='float:left;'><select name='subactivity' id='subactivity' style='width:300px;'>
      <option value=''>-ALL-</option>";
	$sel=mysql_query("select indicator_id,indicator_name,subactivity_name,subactivity_code from view_indicator_target_actual where subcomponent_id like '".$_SESSION['usersubcomponent']."%' group by subactivity_code order by subactivity_code")or die(http("PR-00415"));
	while($row1=mysql_fetch_array($sel)){
	$s=($_SESSION['Resultsubactivity3']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value=\"".$row1['subactivity_name']."\" ".$s." >".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,40)."</option>";
	
	
	}
	
	
    $data.="</select></td> <td scope='col'><div align='left'>
      <input type='button' name='search' id='button' value='Go' onclick=\"xajax_view_quarterlyResults(getElementById('project_quarter').value,getElementById('project_year').value,getElementById('subcomponent3').value,getElementById('output').value,getElementById('activity').value,getElementById('subactivity').value);\" />
    </div></td>
  </tr>
 
 
  
<tr>
    <td colspan='10' scope='col' width='' class=evenrow2 align='center'><B>QUARTERLY TARGETS AGAINST ACTUALS</B>
	</td>
  </tr>

  <tr class='evenrow2'>
    <td align='right'><b>NO</td>
		<td  align='left' width='500'><b>Sub-Activity</td>
	<td  align='left' width='500'><b>Indicator</td>
    <td  align='right' width='50'><b>Target <br/>(M)</td>	
	<td  align='right' width='50'><b>Target <br/>(F)</td>
	 <td  align='right' width='50'><b>Target (Other)</td>
    <td  align='right' width='50'><b>Actuals <br/>(M)</td>
	 <td  align='right' width='50'><b>Actuals <br/>(F)</td> 
	    <td  align='right' width='50'><b>Actuals <br/>(Other)</td>

  

	<td  align='right' width='50'><b>% Achieved</td>
  </tr>";
  $n=1; $inc=1; $percent=100;

  if($quarter=='Jan - Mar')$quarterVal="1";
  elseif($quarter=='Apr - Jun')$quarterVal="2";
  elseif($quarter=='Jul - Sep')$quarterVal="3";
  elseif($quarter=='Oct - Dec')$quarterVal="4";
  /*  elseif($quarter=='Closed')$_SESSION['quarter']$quarterVal="1"; */
  else $quarterVal="1";
//===================================
/*
	$view_quarter_backup27022012=@mysql_query("create or replace view  view_indicator_target_actual as select 
	`i`.`indicator_id` AS `indicator_id`,
	`i`.`indicator_name` AS `indicator_name`,i.gender,i.subactivity_id,
	ss.subactivity_name,ss.subactivity_code,a.activity_id,a.activity_code,
	a.activity_name,o.output_id,o.output_code,o.output_name,
	sc.id as subcomponent_id,sc.subcomponent_code,sc.subcomponent,
	`r`.`year` AS `ReportingYear`,
	`r`.`reportingPeriod` AS `reportingPeriod`,`q`.`quarterCode` AS `quarterCode`,
	q.quarterName,`at`.`pquarter1` AS `targetQ1`,`at`.`pquarter2` AS `targetQ2`,`at`.`pquarter3` AS `targetQ3`,`at`.`pquarter4` AS `targetQ4`
,sum(r.total) as totalActual

	from `tbl_indicator` `i` inner join tbl_subactivity s on(s.subact_id=i.subactivity_id) 
	inner join tbl_activity a on(i.activity_id=a.activity_id) 
	inner join tbl_output o on(o.output_id=i.output_id) 
	inner join tbl_subcomponent sc on(sc.id=i.subcomponent_id) 
	inner join tbl_annualtarget at on (`i`.`indicator_id` = `at`.`indicator_id`)
	 inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
	 left join tbl_subactivity ss on(i.subactivity_id=ss.subact_id) 
	 left join  `tbl_quarters` `q` on(`q`.`quarterName` = `r`.`reportingPeriod`) 
	 where r.year like '".$year."%' and r.`reportingPeriod` like '".$quarter."%'
	
	   group by `i`.`indicator_id`,`r`.`year`,`r`.`reportingPeriod`")or die(http("407"));*/
//@mysql_query("drop view if exists view_indicator_target_actual");
@mysql_query("drop table if exists view_indicator_target_actual ")or die(http("PR-00484"));
$view=@mysql_query("create table if not exists view_indicator_target_actual as select 
	`i`.`indicator_id` AS `indicator_id`,
	`i`.`indicator_name` AS `indicator_name`,i.gender,i.subactivity_id,
	ss.subactivity_name,ss.subactivity_code,a.activity_id,a.activity_code,
	a.activity_name,o.output_id,o.output_code,o.output_name,
	sc.id as subcomponent_id,sc.subcomponent_code,sc.subcomponent,
	`r`.`year` AS `ReportingYear`,
	`r`.`reportingPeriod` AS `reportingPeriod`,`q`.`quarterCode` AS `quarterCode`,
	q.quarterName,`at`.`pquarter1` AS `targetQ1`,`at`.`pquarter2` AS `targetQ2`,`at`.`pquarter3` AS `targetQ3`,`at`.`pquarter4` AS `targetQ4`
,sum(r.total) as totalActual

	from `tbl_indicator` `i` inner join tbl_subactivity s on(s.subact_id=i.subactivity_id) 
	inner join tbl_activity a on(i.activity_id=a.activity_id) 
	inner join tbl_output o on(o.output_id=i.output_id) 
	inner join tbl_subcomponent sc on(sc.id=i.subcomponent_id) 
	inner join tbl_annualtarget at on (`i`.`indicator_id` = `at`.`indicator_id`)
	 inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
	 left join tbl_subactivity ss on(i.subactivity_id=ss.subact_id) 
	 left join  `tbl_quarters` `q` on(`q`.`quarterName` = `r`.`reportingPeriod`) 
	 where r.year like '".$year."%' and r.`reportingPeriod` like '".$quarter."%'
	
	   group by `i`.`indicator_id`,`r`.`year`,`r`.`reportingPeriod`")or die(http("PR-407"));



@mysql_query("drop table if exists view_organizationalActuals ")or die(http("PR-00510"));
$SQL="create table if not exists view_organizationalActuals as select i.indicator_id,i.indicator_name,i.subcomponent_id,
	s.subcomponent_code,s.subcomponent,r.org_code,o.orgName,
	r.reportingPeriod,r.year,
	sum(if(((r.reportingPeriod='".$quarter."') and(i.gender='')),r.total,''))  as TotalOtherActual,
	SUM(if((((r.reportingPeriod='".$quarter."') and((i.gender='Adult Male')or(i.gender='Male Youth')))),r.total,''))  as TotalMaleActual,
	SUM(if((((r.reportingPeriod='".$quarter."') and( (i.gender='Adult Female')or(i.gender='Female Youth') ))),r.total,''))  as TotalFemaleActual
	
	from tbl_indicator i LEFT join tbl_organizationreporting r 
   on(i.indicator_id=r.indicator_id) 
   inner join tbl_subcomponent s on(s.id=i.subcomponent_id) 
   left join tbl_organization o on(o.org_code=r.org_code)
	where  r.year like '".$year."%'  and r.reportingPeriod like '".$quarter."%' 

	group by i.indicator_id,r.reportingPeriod,r.year
  	order by r.reportingPeriod,o.orgName,i.indicator_name asc";

@mysql_query($SQL)or die(http("PR-527"));
//$obj->alert($SQL);
/*  
//=================================select query backup 27022012==============================



	  $select1="select 	indicator_id,indicator_name,subcomponent_id,subcomponent,
	  subcomponent_code,output_name,output_code,activity_code,activity_name,
	  subactivity_name,subactivity_code,ReportingYear,
		max(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ".$quarterVal."`,'')) as targetQtrMale,
	if((((reportingPeriod='".$quarter."') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')  as TotalMaleActual,
	
round(IFNULL(if((((reportingPeriod='".$quarter."') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''),0)/IFNULL(max(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageMaleAchieved,
	max(if((gender='Adult Female') or (gender='Female Youth'),`targetQ".$quarterVal."`,'')) as targetQtrFemale,
	
	if((((reportingPeriod='".$quarter."') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')  as TotalFemaleActual,
round(IFNULL(if((((reportingPeriod='".$quarter."') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''),0)/IFNULL(max(if((gender='Adult Female') or (gender='Female Youth'),`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageFemaleAchieved,

	max(if((gender=''),`targetQ".$quarterVal."`,'')) as targetQtrOther,
	if(((reportingPeriod='".$quarter."') and(gender='')),totalActual,'')  as TotalOtherActual,
	
	round(IFNULL(if(((reportingPeriod='".$quarter."') and(gender='')),totalActual,''),0)/IFNULL(max(if((gender=''),`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageOtherAchieved
	from view_indicator_target_actual 
	where ReportingYear = '".$year."'
	and reportingPeriod like '".$quarter."%' 
	and subcomponent like '".$_SESSION['Resultsubcomponent3']."%' 
	and output_name like '".$_SESSION['Resultoutput3']."%' 
	and activity_name like '".$_SESSION['Resultactivity3']."%' 
	and subactivity_name like '".$_SESSION['Resultsubactivity3']."%' 
	and subcomponent_id like '".$_SESSION['usersubcomponent']."%' 
	group by indicator_id,ReportingYear,reportingPeriod 
	order by subactivity_code,indicator_name asc"; */
	  $select1="select 	t.indicator_id,t.indicator_name,t.subcomponent_id,t.subcomponent,
	  t.subcomponent_code,t.output_name,t.output_code,t.activity_code,t.activity_name,
	  t.subactivity_name,t.subactivity_code,va.year,
		max(if((t.gender='Adult Male') or (t.gender='Male Youth')  ,`targetQ".$quarterVal."`,'')) as targetQtrMale,
	va.TotalMaleActual,
	
round(IFNULL(va.TotalMaleActual,0)/IFNULL(max(if((t.gender='Adult Male') or (t.gender='Male Youth')  ,`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageMaleAchieved,
	max(if((t.gender='Adult Female') or (t.gender='Female Youth'),`targetQ".$quarterVal."`,'')) as targetQtrFemale,
	
	va.TotalFemaleActual,
round(IFNULL(va.TotalFemaleActual,0)/IFNULL(max(if((t.gender='Adult Female') or (t.gender='Female Youth'),`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageFemaleAchieved,

	max(if((t.gender=''),`targetQ".$quarterVal."`,'')) as targetQtrOther,
	va.TotalOtherActual,
	
	round(IFNULL(va.TotalFemaleActual,0)/IFNULL(max(if((t.gender=''),`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageOtherAchieved
	from view_indicator_target_actual t left join view_organizationalactuals va on(va.indicator_id=t.indicator_id)
	where va.year = '".$year."'
	and va.reportingPeriod like '".$quarter."%' 
	and t.subcomponent like '".$_SESSION['Resultsubcomponent3']."%' 
	and t.output_name like '".$_SESSION['Resultoutput3']."%' 
	and t.activity_name like '".$_SESSION['Resultactivity3']."%' 
	and t.subactivity_name like '".$_SESSION['Resultsubactivity3']."%' 
	and t.subcomponent_id like '".$_SESSION['usersubcomponent']."%' 
	group by t.indicator_id,va.year,va.reportingPeriod 
	order by t.subactivity_code,t.indicator_name asc"; 
//$obj->alert($select1);

	
/* 
  }else {
 $select1="select indicator_id,indicator_name,subcomponent,subcomponent_code,output_name,output_code,activity_code,activity_name,subactivity_name,subactivity_code,ReportingYear,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')),0),2)*100 AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')) as targetQtrFemale,
	SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')),0),2)*100 AS percentageFemaleAchieved,
	sum(if((gender=''),`targetQ1`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,''))  as TotalOtherActual,
	round(IFNULL(SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ1`,'')),0),2)*100 AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '".$year."' and subcomponent like '".$_SESSION['Resultsubcomponent3']."%' and output_name like '".$_SESSION['Resultoutput3']."%' and activity_name like '".$_SESSION['Resultactivity3']."%' and subactivity_name like '".$_SESSION['Resultsubactivity3']."%'  group by indicator_id,ReportingYear order by subactivity_code asc";
	
  }
   */
  //$obj->addAlert($select1);
  
  $query=mysql_query($select1)or die(http("PR-510"));
  if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
   $div="statusQuarterly".$row['indicator_id'];
  
  $targetQtrMale=($row['targetQtrMale']!=0)?"<td align='right'>".$row['targetQtrMale']."</td>":"<td align='right'>-</td>";
  $TotalMaleActual=($row['TotalMaleActual']!=0)?"<td align='right'>".$row['TotalMaleActual']."</td>":"<td align='right'>-</td>";
  //$percentageMaleAchieved=($row['percentageMaleAchieved']!=0)?"<td align='right'>".$row['percentageMaleAchieved']."%</td>":"<td align='right'>0%</td>";
  
 			 if($row['TotalMaleActual'] <= 0){
				$percentageMaleAchieved = 0;
				}
					if($row['targetQtrMale']> 0){
						$percentageMaleAchieved = round(($row['TotalMaleActual']/$row['targetQtrMale']) * 100,1);
							}
	//$Districtscore = round($percentageDistrict,1);
  
  
  
  $targetQtrFemale=($row['targetQtrFemale']!=0)?"<td align='right'>".$row['targetQtrFemale']."</td>":"<td align='right'>-</td>";
  $TotalFemaleActual=($row['TotalFemaleActual']!=0)?"<td align='right'>".$row['TotalFemaleActual']."</td>":"<td align='right'>-</td>";
  //$percentageFemaleAchieved=($row['percentageFemaleAchieved']!=0)?"<td align='right'>".$row['percentageFemaleAchieved']."%</td>":"<td align='right'>0%</td>";
  
  
  if($row['TotalFemaleActual'] <= 0){
				$percentageFemaleAchieved = 0;
				}
					if($row['targetQtrFemale']> 0){
						$percentageFemaleAchieved = round(($row['TotalFemaleActual']/$row['targetQtrFemale']) * 100,1);
							}
  
  $targetQtrOther=($row['targetQtrOther']!=0)?"<td align='right'>".$row['targetQtrOther']."</td>":"<td align='right'>-</td>";
  $TotalOtherActual=($row['TotalOtherActual']!=0)?"<td align='right'>".$row['TotalOtherActual']."</td>":"<td align='right'>-</td>";
 	//$percentageOtherAchieved=($row['percentageOtherAchieved']!=0)?"<td align='right'>".$row['percentageOtherAchieved']."%</td>":"<td align='right'>0%</td>";
	
	if($row['TotalOtherActual'] <= 0){
				$percentageOtherAchieved = 0;
				}
					if($row['targetQtrOther']> 0){
						$percentageOtherAchieved = round(($row['TotalOtherActual']/$row['targetQtrOther']) * 100,1);
							}
	
  $ttq=$percentageMaleAchieved+$percentageFemaleAchieved+$percentageOtherAchieved;
  //$obj->alert($percentageMaleAchieved."---".$row['percentageMaleAchieved']."---".$row['percentageFemaleAchieved']);
  $totalPercentage=($ttq!='')?"<td align='right' class='black2'>".$ttq."%</td>":"<td align='right' class='black2'>0%</td>";
  	 $color=$n%2==1?"evenrow":"white";
  		$data.="<tr class=$color>
  <td align='right'>".$n++."</td>
	<td  align='left' width='200'>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
	<td  align='left' width='200'><a href='#' 
	onclick=\"xajax_view_annualorganizationsReportedQuarterly('".$row['indicator_id']."','".$_SESSION['PMyear']."','".$div."','".$quarter."');return false;\" >".$row['indicator_name']."</a></td>
    ".$targetQtrMale."
	 ".$targetQtrFemale."
	".$targetQtrOther."
    ".$TotalMaleActual." 
	".$TotalFemaleActual."
	".$TotalOtherActual."
	".$totalPercentage."
  </tr><tr><td colspan=2></td><td colspan=8><div id='$div'></div></td></tr>";
  $inc++;
  //$obj->addAlert($data2);
  } 
  }
  else {
  //create view before running a report
  /* @mysql_query("create or replace view  view_indicator_target_actual as select 
	`i`.`indicator_id` AS `indicator_id`,
	`i`.`indicator_name` AS `indicator_name`,i.gender,i.subactivity_id,
	ss.subactivity_name,ss.subactivity_code,a.activity_id,a.activity_code,
	a.activity_name,o.output_id,o.output_code,o.output_name,
	sc.id as subcomponent_id,sc.subcomponent_code,sc.subcomponent,
	`r`.`year` AS `ReportingYear`,`at`.`pquarter1` AS `targetQ1`,
	`r`.`reportingPeriod` AS `reportingPeriod`,`q`.`quarterCode` AS `quarterCode`,
	q.quarterName,`at`.`pquarter2` AS `targetQ2`,`at`.`pquarter3` AS `targetQ3`,`at`.`pquarter4` AS `targetQ4`,

	from `tbl_indicator` `i` inner join tbl_subactivity s on(s.subact_id=i.subactivity_id) 
	inner join tbl_activity a on(i.activity_id=a.activity_id) 
	inner join tbl_output o on(o.output_id=i.output_id) 
	inner join tbl_subcomponent sc on(sc.id=i.subcomponent_id) 
	inner join tbl_annualtarget at on (`i`.`indicator_id` = `at`.`indicator_id`)
	 inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) 
	 left join tbl_subactivity ss on(i.subactivity_id=ss.subact_id) 
	 left join  `tbl_quarters` `q` on(`q`.`quarterName` = `r`.`reportingPeriod`) 
	 where r.year like '".$year."%'
	  and r.reportingPeriod like '".$quarter."%' 
	   group by `i`.`indicator_id`,`r`.`year`,`r`.`reportingPeriod`")or die(http("407"));
   */
  
  }
   $data.="<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}





function view_DCEDquarterlyResults($quarter,$year,$subcomponent,$output,$activity,$subactivity){
$obj=new xajaxResponse();
$year=($year!='')?$year:date(Y);
$quarter=($quarter!=='')?$quarter:$_SESSION['quarter'];

$_SESSION['Resultsubcomponent3']=$subcomponent;
$_SESSION['Resultoutput3']=$output;
$_SESSION['Resultactivity3']=$activity;
$_SESSION['Resultsubactivity3']=$subactivity;
$data="<table width='660' border='0'>
   <tr class='evenrow'>
    <td scope='col' colspan='2'><div align='left'>Quarter </div></td>
    <td scope='col' colspan=5><div align='left'>
      <select name='project_quarter' id='project_quarter'>";
	 if($quarter!='') $data.="<option value='".$quarter."' '".$selected."'>".$quarter."</option>";

	 $data.="<option value='Jan - Mar'>Jan - Mar</option>";
	 $data.="<option value='Apr - Jun'>Apr - Jun</option>";
	 $data.="<option value='Jul - Sep'>Jul - Sep</option>";
	 $data.="<option value='Oct - Dec'>Oct - Dec</option>";
     $data.=" </select>
    </div></td>
	<td scope='col' colspan=''><div align='right'>YEAR</div></td>
    <td scope='col' colspan=''><div align='left'>
      <select name='project_year'  id='project_year' >";
       $data.="<option value='".$year."' '".$selected."'>".$year."</option>";
	  $yr ='2013'; $end = $yr;
       $selected=$yr==$end?"SELECTED":"";
       do{
       $data.="<option value='".$end."'>".$end."</option>";
                                 $end--;} while ($end>= 2010);             
     $data.=" </select>
    </div></td><td align='right'><a href='export_to_excel_word.php?linkvar=Export DCED Quarterly Results&&quarter=".$quarter."&&year=".$year."&&subactivity=".$_SESSION['Resultsubactivity3']."&&subcomponent=".$_SESSION['Resultsubcomponent3']."&&output=".$_SESSION['Resultoutput3']."&&activity=".$_SESSION['Resultactivity3']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></td>
   
  </tr>";
  
  $data.="
  <tr class='evenrow'>
  <td colspan=2>Sub-Component:</td><td colspan=8><select name='subcomponent' id='subcomponent3'>";
	
	if($_SESSION['usersubcomponent']<>''){
$query=mysql_query("select * from tbl_subcomponent where id like '".$_SESSION['usersubcomponent']."%' order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
#$sel=($_SESSION['subcomponent1']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  } }
					  else {
					  $data.="<option value=''>-All-</option>";
	$sel2=mysql_query("select * from tbl_subcomponent order by subcomponent_code")or die("aBi Error-code 285 because ".mysql_error());
	while($row2=mysql_fetch_array($sel2)){
	$s23=($_SESSION['Resultsubcomponent3']==$row2['subcomponent'])?"SELECTED":"";
	$data.="<option value=\"".$row2['subcomponent']."\" ".$s23." >".$row2['subcomponent_code']." ".substr($row2['subcomponent'],0,30)."</option>";
	}
	}
	
    $data.="</select></td></tr>
	<tr class='evenrow'>
    <td colspan='2' scope='col' width=''  align='left'>SUBSECTOR:</td><td colspan='7'>
	<div style='float:left;'><select name='output' id='output'>
      <option value=''>-ALL-</option>";
	/* $sel=mysql_query("select * from tbl_output where subcomp_id like '".$_SESSION['usersubcomponent']."%' group by output_code order by output_code")or die("aBi Error-code 297 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$s33=($_SESSION['Resultoutput3']==$row1['output_name'])?"SELECTED":"";
	$data.="<option value=\"".$row1['output_name']."\" ".$s33." >".$row1['output_code']." ".substr($row1['output_name'],0,40)."</option>";
	
	
	}
	 */
	
    $data.="</select></td> <td scope='col'></td>
  </tr>
 
 <tr class='evenrow'>
  <td colspan=2>RESULT CHAIN LEVEL:</td><td colspan=7><select name='activity' id='activity'>
      <option value=''>-ALL-</option>";
	/* $sel2=mysql_query("select * from tbl_activity where subcomp_id like '".$_SESSION['usersubcomponent']."%' order by activity_code")or die("aBi Error-code 285 because ".mysql_error());
	while($row2=mysql_fetch_array($sel2)){
	$s24=($_SESSION['Resultactivity3']==$row2['activity_name'])?"SELECTED":"";
	$data.="<option value=\"".$row2['activity_name']."\" ".$s24." >".$row2['activity_code']." ".substr($row2['activity_name'],0,30)."</option>";
	}
	 */
	
    $data.="</select></td><td></td>
	</tr>
	<tr class='evenrow'>
    <td colspan='2' scope='col' width=''  align='left'>INTERVENTION</td><td colspan='7'>
	<div style='float:left;'><select name='subactivity' id='subactivity'>
      <option value=''>-ALL-</option>";
	/* $sel=mysql_query("select indicator_id,indicator_name,subactivity_name,subactivity_code from view_indicator_target_actual where subcomponent_id like '".$_SESSION['usersubcomponent']."%' group by subactivity_code order by subactivity_code")or die("aBi Error-code 297 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$s=($_SESSION['Resultsubactivity3']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value=\"".$row1['subactivity_name']."\" ".$s." >".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,40)."</option>";
	
	
	} */
	
	
    $data.="</select></td> <td scope='col'><div align='left'>
      <input type='button' name='search' id='button' value='Go' onclick=\"xajax_view_DCEDquarterlyResults(getElementById('project_quarter').value,getElementById('project_year').value,getElementById('subcomponent3').value,getElementById('output').value,getElementById('activity').value,getElementById('subactivity').value);\" />
    </div></td>
  </tr>
 
 
  
<tr>
    <td colspan='10' scope='col' width='' class=evenrow2 align='center'><B>QUARTERLY TARGETS AGAINST ACTUALS</B>
	</td>
  </tr>

  <tr class='evenrow2'>
    <td align='right'><b>NO</td>
		<td  align='left' width='500'><b>Intervention</td>
	<td  align='left' width='500'><b>Indicator</td>
    <td  align='right' width='50'><b>Target <br/>(M)</td>	
	<td  align='right' width='50'><b>Target <br/>(F)</td>
	 <td  align='right' width='50'><b>Target (Other)</td>
    <td  align='right' width='50'><b>Actuals <br/>(M)</td>
	 <td  align='right' width='50'><b>Actuals <br/>(F)</td> 
	    <td  align='right' width='50'><b>Actuals <br/>(Other)</td>

  

	<td  align='right' width='50'><b>% Achieved</td>
  </tr>";
  $n=1; $inc=1; $percent=100;

  if($quarter=='Jan - Mar')$quarterVal="1";
  elseif($quarter=='Apr - Jun')$quarterVal="2";
  elseif($quarter=='Jul - Sep')$quarterVal="3";
  elseif($quarter=='Oct - Dec')$quarterVal="4";
  /*  elseif($quarter=='Closed')$_SESSION['quarter']$quarterVal="1"; */
  else $quarterVal="1";

	/* if ($quarterVal!=''){ */
	
	/*  $select1_backup11112011="select indicator_id,indicator_name,subcomponent,subcomponent_code,output_name,output_code,activity_code,activity_name,subactivity_name,subactivity_code,ReportingYear,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ".$quarterVal."`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='".$quarter."') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	
	round(IFNULL(SUM(if((((reportingPeriod='".$quarter."') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ".$quarterVal."`,'')) as targetQtrFemale,
	
	SUM(if((((reportingPeriod='".$quarter."') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
round(IFNULL(SUM(if((((reportingPeriod='".$quarter."') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageFemaleAchieved,

	sum(if((gender=''),`targetQ".$quarterVal."`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='".$quarter."') and(gender='')),totalActual,''))  as TotalOtherActual,
	
	round(IFNULL(SUM(if(((reportingPeriod='".$quarter."') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '".$year."' and reportingPeriod like '".$quarter."%' and subcomponent like '".$_SESSION['Resultsubcomponent3']."%' and output_name like '".$_SESSION['Resultoutput3']."%' and activity_name like '".$_SESSION['Resultactivity3']."%' and subactivity_name like '".$_SESSION['Resultsubactivity3']."%' group by indicator_id,ReportingYear,reportingPeriod order by subactivity_code asc";  */

mysql_query("create or replace view  view_indicator_target_actual as select `i`.`indicator_id` AS `indicator_id`,`i`.`indicator_name` AS `indicator_name`,i.indicator_type,i.gender,i.subactivity_id,ss.subactivity_name,ss.subactivity_code,a.activity_id,a.activity_code,a.activity_name,o.output_id,o.output_code,o.output_name,sc.id as subcomponent_id,sc.subcomponent_code,sc.subcomponent,`r`.`year` AS `ReportingYear`,`at`.`pquarter1` AS `targetQ1`,`r`.`reportingPeriod` AS `reportingPeriod`,`q`.`quarterCode` AS `quarterCode`,q.quarterName,`at`.`pquarter2` AS `targetQ2`,`at`.`pquarter3` AS `targetQ3`,`at`.`pquarter4` AS `targetQ4`,sum(r.total) as totalActual from `tbl_indicator` `i` inner join tbl_subactivity s on(s.subact_id=i.subactivity_id) inner join tbl_activity a on(i.activity_id=a.activity_id) inner join tbl_output o on(o.output_id=i.output_id) inner join tbl_subcomponent sc on(sc.id=i.subcomponent_id) inner join tbl_annualtarget at on (`i`.`indicator_id` = `at`.`indicator_id`) inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) left join tbl_subactivity ss on(i.subactivity_id=ss.subact_id) left join  `db_abi_v1`.`tbl_quarters` `q` on(`q`.`quarterName` = `r`.`reportingPeriod`) where r.year like '".$year."%' and r.reportingPeriod like '".$quarter."%'  group by `i`.`indicator_id`,`r`.`year`,`r`.`reportingPeriod`")or die(http(407));



	  $select1="select indicator_id,indicator_name,subcomponent_id,subcomponent,subcomponent_code,output_name,output_code,activity_code,activity_name,subactivity_name,subactivity_code,ReportingYear,
	max(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ".$quarterVal."`,'')) as targetQtrMale,
	sum(if((((reportingPeriod='".$quarter."') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	
	round(IFNULL(sum(if((((reportingPeriod='".$quarter."') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(max(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageMaleAchieved,
	max(if((gender='Adult Female') or (gender='Female Youth'),`targetQ".$quarterVal."`,'')) as targetQtrFemale,
	
	sum(if((((reportingPeriod='".$quarter."') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
round(IFNULL(sum(if((((reportingPeriod='".$quarter."') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(max(if((gender='Adult Female') or (gender='Female Youth'),`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageFemaleAchieved,

	max(if((gender=''),`targetQ".$quarterVal."`,'')) as targetQtrOther,
	sum(if(((reportingPeriod='".$quarter."') and(gender='')),totalActual,''))  as TotalOtherActual,
	
	round(IFNULL(sum(if(((reportingPeriod='".$quarter."') and(gender='')),totalActual,'')),0)/IFNULL(max(if((gender=''),`targetQ".$quarterVal."`,'')),0),2)*".$percent." AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '".$year."' and reportingPeriod like '".$quarter."%' and subcomponent like '".$_SESSION['Resultsubcomponent3']."%' and output_name like '".$_SESSION['Resultoutput3']."%' and activity_name like '".$_SESSION['Resultactivity3']."%' and subactivity_name like '".$_SESSION['Resultsubactivity3']."%' and subcomponent_id like '".$_SESSION['usersubcomponent']."%' and indicator_type like 'DCED Based%' group by indicator_id,ReportingYear,reportingPeriod order by subactivity_code,indicator_name asc"; 


	
/* 
  }else {

 $select1="select indicator_id,indicator_name,subcomponent,subcomponent_code,output_name,output_code,activity_code,activity_name,subactivity_name,subactivity_code,ReportingYear,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')),0),2)*100 AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')) as targetQtrFemale,
	SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')),0),2)*100 AS percentageFemaleAchieved,
	sum(if((gender=''),`targetQ1`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,''))  as TotalOtherActual,
	round(IFNULL(SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ1`,'')),0),2)*100 AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '".$year."' and subcomponent like '".$_SESSION['Resultsubcomponent3']."%' and output_name like '".$_SESSION['Resultoutput3']."%' and activity_name like '".$_SESSION['Resultactivity3']."%' and subactivity_name like '".$_SESSION['Resultsubactivity3']."%'  group by indicator_id,ReportingYear order by subactivity_code asc";
	
  }
   */
 # $obj->addAlert($select1);
  
  $query=mysql_query($select1)or die("aBi Error code:0328 because, ".mysql_error());
  while($row=mysql_fetch_array($query)){
  $targetQtrMale=($row['targetQtrMale']!=0)?"<td align='right'>".$row['targetQtrMale']."</td>":"<td align='right'>-</td>";
  $TotalMaleActual=($row['TotalMaleActual']!=0)?"<td align='right'>".$row['TotalMaleActual']."</td>":"<td align='right'>-</td>";
  $percentageMaleAchieved=($row['percentageMaleAchieved']!=0)?"<td align='right'>".$row['percentageMaleAchieved']."%</td>":"<td align='right'>0%</td>";
  
  $targetQtrFemale=($row['targetQtrFemale']!=0)?"<td align='right'>".$row['targetQtrFemale']."</td>":"<td align='right'>-</td>";
  $TotalFemaleActual=($row['TotalFemaleActual']!=0)?"<td align='right'>".$row['TotalFemaleActual']."</td>":"<td align='right'>-</td>";
  $percentageFemaleAchieved=($row['percentageFemaleAchieved']!=0)?"<td align='right'>".$row['percentageFemaleAchieved']."%</td>":"<td align='right'>0%</td>";
  $targetQtrOther=($row['targetQtrOther']!=0)?"<td align='right'>".$row['targetQtrOther']."</td>":"<td align='right'>-</td>";
  $TotalOtherActual=($row['TotalOtherActual']!=0)?"<td align='right'>".$row['TotalOtherActual']."</td>":"<td align='right'>-</td>";
  $percentageOtherAchieved=($row['percentageOtherAchieved']!=0)?"<td align='right'>".$row['percentageOtherAchieved']."%</td>":"<td align='right'>0%</td>";
  $ttq=$row['percentageOtherAchieved']+$row['percentageMaleAchieved']+$row['percentageFemaleAchieved'];
  $totalPercentage=($ttq!='')?"<td align='right' class='black2'>".$ttq."%</td>":"<td align='right' class='black2'>0%</td>";
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
	<td  align='left' width='200'>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
	<td  align='left' width='200'>".$row['indicator_name']."</td>
    ".$targetQtrMale."
	 ".$targetQtrFemale."
	".$targetQtrOther."
    ".$TotalMaleActual." 
	".$TotalFemaleActual."
	".$TotalOtherActual."
	".$totalPercentage."
  </tr>";
  $inc++;
  //$obj->addAlert($data2);
  } 
   $data.="<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}
#Annual
/* function view_annualResults($year){
$obj=new xajaxResponse();

$data="<table width='660' border='0'>
   <tr class='evenrow'>

    
	<td scope='col'><div align='right'>SELECT A YEAR</div></td>
    <td scope='col' colspan='7'><div align='left'>
      <select name='project_year'  class='evenrow' id='project_year' onChange=\"xajax_view_annualResults(getElementById('project_year').value)\"><option value=''>-ALL-</option>";
       $data.="<option value='".$year."' '".$selected."'>".$year."</option>";
	  $yr = date(Y); $end = $yr;
       $selected=$yr==$end?"SELECTED":"";
                                      do{
                                    $data.="<option value='".$end."' '".$selected."'>".$end."</option>";
                                 $end--;} while ($end>= 2010);             
     $data.=" </select>
    </div></td>
   <td align='right'><input name='' type='button' value='Export To Excel' /></td>
  </tr></table>";
  
  $data.="<table width='660' border='0'>
 
<tr>
    <td colspan='9' scope='col' width='' class=evenrow2 align='center'>ANNUAL PERFOMANCE AGAINST TARGETS
	<div style='float:right;'>( T=&gt;Target, A=&gt;Actual)</div></td>
  </tr>
  
  <tr class='evenrow2'>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    
    <td colspan='4' align=center><strong>Annual </strong></td>
    <td colspan='3' align=center><strong>Project Life</strong></td>
  </tr>
  <tr class='evenrow2'>
  <td align='right'><b>NO</td>
    <td align='right' width='300'><b>Sub-Activity</td>
	<td  align='left' width='500'><b>Indicator</td>
    
    <td  align='right' width='50'><b>T</td>
    <td  align='right' width='50'><b>A</td>
	<td  align='right' width='50'><b>%</td>
    <td  align='right' width='50'><b>T</td>
    <td  align='right' width='50'><b>A</td>
	<td  align='right' width='50'><b>%</td>
  </tr>";
  $n=1; $inc=1;
  /*if($quarter=='Jan - Mar')$quarterVal="1";
  elseif($quarter=='Apr - Jun')$quarterVal="2";
  elseif($quarter=='Jul - Sep')$quarterVal="3";
  elseif($quarter=='Oct - Dec')$quarterVal="4";
  else $quarterVal="";
indicator_id 	indicator_name 	ReportingYear 	targetQtr 	actualQtr 	targetTotal 	actualTotal 	projectLifeTarget*/ 
/* if ($quarterVal!=''){
$select="select indicator_id,indicator_name,ReportingYear,`targetQ".$quarterVal."` as targetQtr,
	SUM(if(reportingPeriod='".$quarter."',actualTotal,''))  as actualQtr,targetTotal,SUM(actualTotal) as actualTotal,projectLifeTarget
	from view_indicator_target_actual 	where ReportingYear='".$year."' 	and quarterCode<='".$quarterVal."' 	group by indicator_id,ReportingYear";
	} 
else { 
$select="select indicator_id,indicator_name,ReportingYear,`targetQ1` as targetQtr,
	MAX(if(reportingPeriod='".$quarter."',actualTotal,''))  as actualQtr,
	targetTotal,SUM(actualTotal) as actualTotal,projectLifeTarget
	from view_indicator_target_actual
	where ReportingYear='".$year."'
	
	group by indicator_id,ReportingYear";
	#}
  //$obj->addAlert($select);
  $year=($year=='')?date(Y):$year;
  $select="select i.indicator_id,i.subactivity_id,s.subactivity_code,s.subactivity_name,i.indicator_name,r.year,a.ptotal as totaAnnualtarget,plt.target as projectLifeTarget,round(IFNULL(sum(a.ptotal),0)/IFNULL(plt.target,0)*100,0) as PercentageProjectLifeTargetAchieved,sum(if((r.year='".$year."'),r.total,0)) as totalAnnualActual,round(sum(if((r.year='".$year."'),r.total,0))/IFNULL(plt.target,0)*100,0) as PercentageAnnualActualAchieved from tbl_annualtarget a left join  tbl_indicator i on(i.indicator_id=a.indicator_id) left join tbl_projectlifetargets plt on(plt.indicator_id=a.indicator_id) left join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) left join tbl_subactivity s on(i.subactivity_id=s.subact_id) where i.indicator_id <> 0 group by indicator_id order by indicator_id asc";
  #$obj->addAlert($select);
  
  
  $query=mysql_query($select)or die("aBi Error code:0100 because, ".mysql_error());
  while($row=mysql_fetch_array($query)){
 
 $pla="select SUM(actualTotal) as projectLifeActual from view_indicator_target_actual
	WHERE ReportingYear<='".$year."'
	AND indicator_id='".$row['indicator_id']."'
	group by indicator_id,ReportingYear";
  $rst=mysql_query($pla)or die("aBi Error code:0459 because, ".mysql_error());
	if(mysql_num_rows($rst)!=0) $projectLifeActual=mysql_result($rst,'projectLifeActual');
 // $obj->addAlert($pla);
  
  
  $q=$row['q1'];
  $tot=round($row['q1']+$row['q2']+$row['q3']+$row['q4'],0); 
  $pAAA=($row['PercentageAnnualActualAchieved']!=NULL)?"<td align='right'>".$row['PercentageAnnualActualAchieved']."%</td>":"<td align='right'>0%</td>";
  $PPLTA=($row['PercentageProjectLifeTargetAchieved']!=NULL)?"<td align='right'>".$row['PercentageProjectLifeTargetAchieved']."%</td>":"<td align='right'>0%</td>";
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
  <td  align='left' width='300'>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
	<td  align='left' width='200'>$row[indicator_name]</td>
    
    <td align='right'>".$row['totaAnnualtarget']."</td>
    <td align='right'>".$row['totalAnnualActual']."</td>
	".$pAAA."
    <td align='right'>".$row['projectLifeTarget']."</td>
    <td align='right'>".$row['totalAnnualActual']."</td>
	".$PPLTA."
  </tr>";
  $inc++;
  //$obj->addAlert($data2);
  } 
   $data.="
</table>
";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}
 */

/*
function view_annualResults($quarter,$year){
$obj=new xajaxResponse();
//$year=date(Y);
$data="<table width='660' border='0'>
   <tr>
    <th scope='col'><div align='right'>SELECT PROJECT QUARTER </div></th>
    <th scope='col'><div align='left'>
      <select name='project_quarter'  disabled class='evenrow' id='project_quarter'>";
	 if($quarter!='') $data.="<option value='".$quarter."' '".$selected."'>".$quarter."</option>";
	 $data.="<option value=''>-All-</option>";
	 $data.="<option value='Jan - Mar'>Jan - Mar</option>";
	 $data.="<option value='Apr - Jun'>Apr - Jun</option>";
	 $data.="<option value='Jul - Sep'>Jul - Sep</option>";
	 $data.="<option value='Oct - Dec'>Oct - Dec</option>";
     $data.=" </select>
    </div></th>
	<th scope='col'><div align='right'>YEAR</div></th>
    <th scope='col'><div align='left'>
      <select name='project_year'  class='evenrow' id='project_year' onChange=\"xajax_view_annualResults(getElementById('project_quarter').value,getElementById('project_year').value)\">";
       $data.="<option value='".$year."' '".$selected."'>".$year."</option>";
	  $yr ='2013'; $end = $yr;
       $selected=$yr==$end?"SELECTED":"";
                                      do{
    $data.="<option value='".$end."'>".$end."</option>";
    $end--;}
	 while ($end>= 2010);             
     $data.=" </select>
    </div></th>
    <th scope='col'><div align='left'>
      <input type='button' name='button' id='button' value='Go' />
    </div></th>
  </tr></table>";
  
  $data.="<table width='660' border='0'>
 
<tr>
    <td colspan='8' scope='col' width='' class=evenrow2 align='center'>PERFOMANCE AGAINST TARGETS
	<div style='float:right;'>( T=&gt;Target, A=&gt;Actual)</div></td>
  </tr>
  
  <tr class='evenrow2'>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    
    <td colspan='3' align=center><strong>Annual </strong></td>
    <td colspan='3' align=center><strong>Project Life</strong></td>
  </tr>
  <tr class='evenrow2'>
    <td align='right'><b>NO</td>
	<td  align='left' width='500'><b>Indicator</td>
    
    <td  align='right' width='50'><b>T</td>
    <td  align='right' width='50'><b>A</td>
	<td  align='right' width='50'><b>%</td>
    <td  align='right' width='50'><b>T</td>
    <td  align='right' width='50'><b>A</td>
	<td  align='right' width='50'><b>%</td>
  </tr>";
  $n=1; $inc=1;
  if($quarter=='Jan - Mar')$quarterVal="1";
  elseif($quarter=='Apr - Jun')$quarterVal="2";
  elseif($quarter=='Jul - Sep')$quarterVal="3";
  elseif($quarter=='Oct - Dec')$quarterVal="4";
  else $quarterVal="";
/*indicator_id 	indicator_name 	ReportingYear 	targetQtr 	actualQtr 	targetTotal 	actualTotal 	projectLifeTarget*/ 
/*
if ($quarterVal!=''){
$select="select indicator_id,indicator_name,ReportingYear,`targetQ".$quarterVal."` as targetQtr,
	SUM(if(reportingPeriod='".$quarter."',actualTotal,''))  as actualQtr,targetTotal,SUM(actualTotal) as actualTotal,projectLifeTarget
	from view_indicator_target_actual 	where ReportingYear='".$year."' 	and quarterCode<='".$quarterVal."' 	group by indicator_id,ReportingYear";
	} 
else {
$select="select indicator_id,indicator_name,ReportingYear,`targetQ1` as targetQtr,
	MAX(if(reportingPeriod='".$quarter."',actualTotal,''))  as actualQtr,
	targetTotal,SUM(actualTotal) as actualTotal,projectLifeTarget
	from view_indicator_target_actual
	where ReportingYear='".$year."'
	and quarterCode='1'
	group by indicator_id,ReportingYear";
	}
  //$obj->addAlert($select);
  $query=mysql_query($select)or die("aBi Error code:0100 because, ".mysql_error());
  while($row=mysql_fetch_array($query)){
 
 $pla="select SUM(actualTotal) as projectLifeActual from view_indicator_target_actual
	WHERE ReportingYear<='".$year."'
	AND indicator_id='".$row['indicator_id']."'
	group by indicator_id,ReportingYear";
  $rst=mysql_query($pla)or die("aBi Error code:0459 because, ".mysql_error());
	if(mysql_num_rows($rst)!=0) $projectLifeActual=mysql_result($rst,'projectLifeActual');
 // $obj->addAlert($pla);
  
  
  $q=$row['q1'];
  $tot=round($row['q1']+$row['q2']+$row['q3']+$row['q4'],0);
   $color=$n%2==1?"evenrow":"white";reportingPeriod
  $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
	<td  align='left' width='200'>$row[indicator_name]</td>
    
    <td align='right'>$row[targetTotal]</td>
    <td align='right'>$row[actualTotal]</td>
	<td align='right'>".round(($row['actualTotal']/round($row['targetTotal'],1))*100,0)."%</td>
    <td align='right'>$row[projectLifeTarget]</td>
    <td align='right'>$projectLifeActual</td>
	<td align='right'>".round(($projectLifeActual/round($row['projectLifeTarget'],1))*100,0)."%</td>
  </tr>";
  $inc++;
  //$obj->addAlert($data2);
  } 
   $data.="
</table>
";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}
*/
 


#classified.old 

function view_classifiedccf_backup($subcomponent,$output,$activity,$subactivity,$indicator){
$obj=new xajaxResponse();
$_SESSION['indicator_110']='';
$_SESSION['ccfsubcomponent']='';
$_SESSION['ccfoutput']='';
$_SESSION['ccfactivity']='';
$_SESSION['ccfsubactivity']='';


$_SESSION['indicator_110']=$indicator;
$_SESSION['ccfsubcomponent']=$subcomponent;
$_SESSION['ccfoutput']=$output;
$_SESSION['ccfactivity']=$activity;
$_SESSION['ccfsubactivity']=$subactivity;
$data.=" <table width='100%' border='0'>
<tr class='evenrow'>
    <td scope='col' colspan=2><B>Subcomponent:</b></td><td scope='col' colspan=5><select name='subcomponent' id='subcomponent4' >";
	if($_SESSION['ccfsubcomponent']!='')$data.="<option value='".$_SESSION['ccfsubcomponent']."'>".substr($_SESSION['ccfsubcomponent'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die("aBi Error-code 499 because, ".mysql_error());
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value='".$row1['subcomponent']."'>".$row1['subcomponent_code']." ".substr($row1['subcomponent'],0,40)."</option>";
	}
	
	$data.="</select><div style='float:right;'><a href='export_to_excel_word.php?linkvar=Export Cummulative Targets Against Actuals&&subcomponent=".$_SESSION['ccfsubcomponent']."&&output=".$_SESSION['ccfoutput']."&&activity=".$_SESSION['ccfactivity']."&&subactivity=".$_SESSION['ccfsubactivity']."&&indicator=".$_SESSION['indicator_110']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></div></td>
  </tr>
  <tr class='evenrow'>
    <td scope='col' colspan=2><B>Output:</b></td><td scope='col' colspan=5><select name='output' id='output' >";
	if($_SESSION['ccfoutput']!='')$data.="<option value='".$_SESSION['ccfoutput']."'>".substr($_SESSION['ccfoutput'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_output order by output_code asc") or die("aBi Error-code 499 because, ".mysql_error());
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value='".$row1['output_name']."'>".$row1['output_code']." ".substr($row1['output_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
  <tr class='evenrow'>
    <td scope='col' colspan=2><B>Activity:</b></td><td scope='col' colspan=5><select name='activity' id='activity' >";
	if($_SESSION['ccfactivity']!='')$data.="<option value='".$_SESSION['ccfactivity']."'>".$row1['activity_code']." ".substr($_SESSION['ccfactivity'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_activity order by activity_code asc") or die("aBi Error-code 499 because, ".mysql_error());
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value='".$row1['activity_name']."'>".$row1['activity_code']." ".substr($row1['activity_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
<tr class='evenrow'>
    <td scope='col' colspan=2><B>Subactivity:</b></td><td scope='col' colspan=5><select name='subactivity' id='subactivity' >";
	if($_SESSION['ccfsubactivity']!='')$data.="<option value='".$_SESSION['ccfsubactivity']."'>".substr($_SESSION['ccfsubactivity'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_subactivity order by subactivity_code asc") or die("aBi Error-code 499 because, ".mysql_error());
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value='".$row1['subactivity_name']."'>".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
<tr class='evenrow'>
    <td scope='col' colspan=2><B>Indicator:</b></td><td scope='col' colspan=5><select name='indicator' id='indicator' >";
	if($_SESSION['indicator_110']!='')$data.="<option value='".$_SESSION['indicator_110']."'>".substr($_SESSION['indicator_110'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select i.indicator_name  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id) left join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id)  where i.indicator_id!=0  group by tr.indicator_id order by tr.indicator_id asc") or die("aBi Error-code 499 because, ".mysql_error());
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value='".$row1['indicator_name']."'>".substr($row1['indicator_name'],0,70)."</option>";
	}
	
	$data.="</select><div style='float:right;'><input type='button' name='export' value='Go' onClick=\"xajax_view_classifiedccf(getElementById('subcomponent4').value,getElementById('output').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('indicator').value)\" /></div></td>
  </tr>
  <tr>
    <th scope='col'>&nbsp;</th>
    <th colspan='5' scope='col'>CUMMULATIVE TARGETS AGAINST ACTUALS</th>

  </tr>
  <tr class='evenrow2' style=''>
    <td class=black2 align='right'>CODE</td>
	<td class=black2>Sub-Activity</td>
    <td class=black2>Indicator</td>
    <td class=black2>Total Cummulative Targets</td>
    <td class=black2>Total Cummulative Actuals</td>
    <td class=black2>(%)Achieved</td>
  
   
	
  </tr>";
  $n=1; $inc=1;
  #round(avg(IFNULL(sum(t.total),0)/IFNULL(plt.target,0))*100,0)
 $query=mysql_query("select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,at.totalcummulativetarget,sum(tr.total) as totalcummulativeactual,round(IFNULL(sum(tr.total),0)/IFNULL(at.totalcummulativetarget,0)*100,0) as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0) as ccfPercentageProjectLifeAchieved from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id) left join tbl_output o on(o.output_id=i.output_id) left join tbl_activity a on(a.activity_id=i.activity_id) left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id) left join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%'
 group by tr.indicator_id order by s.subactivity_code asc")or die("Unexpected http Error code 0683  because, ".mysql_error());
 

 while($row=mysql_fetch_array($query)){
  $color=$n%2==1?"evenrow":"white";
 $ccfPA=($row['ccfPercentageAchieved']!=0)?"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability()\">".$row['ccfPercentageAchieved']."%</a></td>":"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability()\">0%</a></td>";
 $ccfPPLTA=($row['ccfPercentageProjectLifeAchieved']!=0)?"<td align='right'>".$row['ccfPercentageProjectLifeAchieved']."%</td>":"<td align='right'>0%</td>";
 $projectlifetarget=($row['projectlifetarget']!='')?"<td align='right'>$row[projectlifetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativetarget=($row['totalcummulativetarget']!='')?"<td align='right'>$row[totalcummulativetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativeactual=($row['totalcummulativeactual']!='')?"<td align='right'>$row[totalcummulativeactual]</td>":"<td align='right'>-</td>";
  $data.="<tr class=$color>
    <td align='right'>".$row['subactivity_code']."</td>
    <td> ".$row['subactivity_name']."</td>
    <td>$row[indicator_name]</td>
   ".$totalcummulativetarget."
    ".$totalcummulativeactual."
   ".$ccfPA."
   
  </tr>"; $inc++;
   }
  $data.="</table>";


$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;

}





function view_classifiedccf($subcomponent,$output,$activity,$subactivity,$indicator,$halfyear,$year){
$obj=new xajaxResponse();
if($_SESSION['username']==''){
$obj->addRedirect('index.php');
return $obj;
}
$_SESSION['indicator_110']='';
$_SESSION['ccfsubcomponent']='';
$_SESSION['ccfoutput']='';
$_SESSION['ccfactivity']='';
$_SESSION['ccfsubactivity']='';
$_SESSION['fromyear']='';
$_SESSION['year']='';
$_SESSION['half_year']='';
$_SESSION['ccfquarter']='';
$date=date('Y');
$month=date('M');
$_SESSION['indicator_110']=$indicator;
$_SESSION['ccfsubcomponent']=$subcomponent;
$_SESSION['ccfoutput']=$output;
$_SESSION['ccfactivity']=$activity;
$_SESSION['ccfsubactivity']=$subactivity;

$year=($year<>'')?$year:$date;
$quarter=($quarter<>'')?$quarter:'';

$_SESSION['ccfquarter']=$quarter;
#$obj->addAlert($_SESSION['ccfquarter']);
$_SESSION['year']=$year;
$_SESSION['half_year']=$halfyear;

$data.=" <table width='700' border='0'>
".filter_cumulativeTargetsAgainstActuals()."
  <tr>
    <th scope='col'>&nbsp;</th>
    <th colspan='5' scope='col'>CUMMULATIVE SEMI-ANNUAL  TARGETS AGAINST ACTUALS</th>

  </tr>
  <tr class='evenrow2' style=''>
    <td class=black2 align='right'>CODE</td>
	<td class=black2>Sub-Activity</td>
    <td class=black2>Indicator</td>
    <td class=black2>Total Cummulative Targets</td>
    <td class=black2>Total Cummulative Actuals</td>
    <td class=black2>(%)Achieved</td>
  
   
	
  </tr>";
  $n=1; $inc=1;
  #,i.indicator_name,i.subactivity_id,s.subact_id,s.subactivity_name,s.subactivity_code,
  $sql_view="CREATE OR REPLACE VIEW view_cross_annualtarget AS
SELECT at.p_id, at.year, at.indicator_id,at.baseline, q.quarterCode, q.quarterName,
CASE WHEN q.quarterCode = '1'
THEN at.pquarter1
WHEN q.quarterCode = '2'
THEN at.pquarter2
WHEN q.quarterCode = '3'
THEN at.pquarter3
WHEN q.quarterCode = '4'
THEN at.pquarter4
END AS total_target,
q.semi_annual,at.ptotal
FROM tbl_quarters q
JOIN tbl_annualtarget  at where at.year like '".$_SESSION['year']."%' and semi_annual like '".$_SESSION['half_year']."%' 
ORDER BY at.year,at.indicator_id ASC ";


mysql_query("create  or replace view view_Actualsum as SELECT `indicator_id` , sum(`total` ) as total
FROM `tbl_organizationreporting` GROUP BY indicator_id")or die(http(0942));





#$obj->addAlert($sql_view);
#left join tbl_organizationreporting tr on(at.indicator_id=tr.indicator_id) left join tbl_indicator i on(i.indicator_id=tr.indicator_id)
#left join tbl_subactivity s on(s.subact_id=i.subactivity_id)
#where at.year like '".$_SESSION['year']."%' and semi_annual like '".$_SESSION['half_year']."%'
 mysql_query($sql_view)or die("Unexpected Http Error code 0935  because, ".mysql_error());
 if(($_SESSION['half_year']<>'')){
 
 
 mysql_query("create  or replace view view_Actual_semi_annual as SELECT `indicator_id` , sum(`total` ) as total
FROM `tbl_organizationreporting`  where year='".$_SESSION['year']."%' and half_year like '".$_SESSION['half_year']."%' GROUP BY indicator_id,half_year
")or die(http(0942));

  $sql="select at.indicator_id,sc.subcomponent_code,sc.id,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  at.year,at.quarterName,at.semi_annual,at.total_target,tr.total,

sum(at.total_target) as totalcummulativetarget, tr.total as totalcummulativeactual,
   round(IFNULL(tr.total,0)/IFNULL(sum(at.total_target),0)*100,0) as ccfPercentageAchieved
 
  from view_Actual_semi_annual tr left join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id) inner join tbl_indicator i on(at.indicator_id=i.indicator_id) 
  inner join tbl_subactivity s on(i.subactivity_id=s.subact_id)
   inner join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   
 where 
 sc.id like '".$_SESSION['usersubcomponent']."%' and
 i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%' 

 and at.year like '".$_SESSION['year']."%'
 and at.semi_annual='".$_SESSION['half_year']."'
 group by tr.indicator_id,at.semi_annual
   order by s.subactivity_code,i.indicator_name asc";
 
 

 
/*  /*
  and 
 
 tr.reportingPeriod like  '".$_SESSION['ccfquarter']."%' 
 and tr.year like '".$_SESSION['year']."%'
  and tr.half_year like '".$_SESSION['half_year']."%'
 */
 
}

else{
  $sql="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,sc.id,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  min(at.ptotal) as totalcummulativetarget, tr.total as totalcummulativeactual,
   round(IFNULL(sum(tr.total),0)/IFNULL(min(at.ptotal),0)*100,0) as ccfPercentageAchieved
  from view_Actualsum  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id)
   left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
    left join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id)
 where sc.id like '".$_SESSION['usersubcomponent']."%' and
 i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%'
 group by tr.indicator_id order by s.subactivity_code,i.indicator_name asc";
 
 

}

   
   
 $query1=mysql_query($sql)or die("Unexpected http Error code 0929  because, ".mysql_error());
 #$obj->addAlert($sql);


 while($row=mysql_fetch_array($query1)){
  $color=$n%2==1?"evenrow":"white";
 $ccfPA=($row['ccfPercentageAchieved']!=0)?"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability();\">".$row['ccfPercentageAchieved']."%</a></td>":"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability()\">0%</a></td>";
 #$ccfPPLTA=($row['ccfPercentageProjectLifeAchieved']!=0)?"<td align='right'>".$row['ccfPercentageProjectLifeAchieved']."%</td>":"<td align='right'>0%</td>";
 #$projectlifetarget=($row['projectlifetarget']!='')?"<td align='right'>$row[projectlifetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativetarget=($row['totalcummulativetarget']!='')?"<td align='right'>$row[totalcummulativetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativeactual=($row['totalcummulativeactual']!='')?"<td align='right'>$row[totalcummulativeactual]</td>":"<td align='right'>-</td>";
  $data.="<tr class=$color>
    <td align='right'>".$row['subactivity_code']."</td>
    <td> ".$row['subactivity_name']."</td>
    <td>$row[indicator_name]</td>
   ".$totalcummulativetarget."
    ".$totalcummulativeactual."
   ".$ccfPA."
   
  </tr>"; $inc++;
   }
  $data.="</table>";


$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;

}

//----cummulative Budget----------------------
function view_cummulativeResults($subcomponent,$output,$activity,$subactivity,$indicator,$fromDate,$toDate){
$obj=new xajaxResponse();
if($_SESSION['username']==''){
$obj->addRedirect('index.php');
return $obj;
}
$_SESSION['indicator_110']='';
$_SESSION['ccfsubcomponent']='';
$_SESSION['ccfoutput']='';
$_SESSION['ccfactivity']='';
$_SESSION['ccfsubactivity']='';


$_SESSION['fromDate']='';
$_SESSION['toDate']='';
$date=date('Y');
$month=date('M');
$_SESSION['indicator_110']=$indicator;
$_SESSION['ccfsubcomponent']=$subcomponent;
$_SESSION['ccfoutput']=$output;
$_SESSION['ccfactivity']=$activity;
$_SESSION['ccfsubactivity']=$subactivity;

$year=($year<>'')?$year:$date;
$quarter=($quarter<>'')?$quarter:'';

$_SESSION['ccfquarter']=$quarter;
#$obj->addAlert($_SESSION['ccfquarter']);
$_SESSION['fromDate']=$fromDate;
$_SESSION['toDate']=$toDate;

$data.=" <form name='ccf' id='ccf'><table width='700' border='0'>
".filter_ProjectcumulativeResults()."
  <tr>
    <th scope='col'>&nbsp;</th>
    <th colspan='5' scope='col'>CUMMULATIVE RESULTS</th>

  </tr>
  <tr class='evenrow2' style=''>
    <td class=black2 align='right'>CODE</td>
	<td class=black2>Sub-Activity</td>
    <td class=black2>Indicator</td>
    <td class=black2>Total Cummulative Targets</td>
    <td class=black2>Total Cummulative Actuals</td>
    <td class=black2>(%)Achieved</td>
  
   
	
  </tr>";
  $n=1; $inc=1;
  #,i.indicator_name,i.subactivity_id,s.subact_id,s.subactivity_name,s.subactivity_code,
  $sql_view="CREATE OR REPLACE VIEW view_cross_annualtarget AS
SELECT at.p_id, at.year, at.indicator_id,at.baseline, q.quarterCode, q.quarterName,
CASE WHEN q.quarterCode = '1'
THEN at.pquarter1
WHEN q.quarterCode = '2'
THEN at.pquarter2
WHEN q.quarterCode = '3'
THEN at.pquarter3
WHEN q.quarterCode = '4'
THEN at.pquarter4
END AS total_target,
q.semi_annual,at.ptotal
FROM tbl_quarters q
JOIN tbl_annualtarget  at where at.year like '".$_SESSION['year']."%' and semi_annual like '".$_SESSION['half_year']."%' 
ORDER BY at.year,at.indicator_id ASC ";


@mysql_query("create  or replace view view_Actualsum as SELECT `indicator_id` , sum(`total` ) as total,fromDate,toDate
FROM `tbl_organizationreporting` GROUP BY indicator_id")or die(http(0942));





#$obj->addAlert($sql_view);
#left join tbl_organizationreporting tr on(at.indicator_id=tr.indicator_id) left join tbl_indicator i on(i.indicator_id=tr.indicator_id)
#left join tbl_subactivity s on(s.subact_id=i.subactivity_id)
#where at.year like '".$_SESSION['year']."%' and semi_annual like '".$_SESSION['half_year']."%'
 @mysql_query($sql_view)or die("Unexpected Http Error code 0935  because, ".mysql_error());
 if(($_SESSION['fromDate']<>'')){
 
 
 @mysql_query("create  or replace view view_Actual_semi_annual as SELECT `indicator_id` , sum(`total` ) as total,fromDate,toDate
FROM `tbl_organizationreporting`  where fromDate='".$_SESSION['fromDate']."' and toDate='".$_SESSION['fromDate']."' GROUP BY indicator_id,half_year
")or die(http(0942));

  $sql="select at.indicator_id,sc.subcomponent_code,sc.id,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  at.year,at.quarterName,at.semi_annual,at.total_target,tr.total,

sum(at.total_target) as totalcummulativetarget, tr.total as totalcummulativeactual,tr.fromDate,tr.todate,
   round(IFNULL(tr.total,0)/IFNULL(sum(at.total_target),0)*100,0) as ccfPercentageAchieved
 from view_Actual_semi_annual tr left join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id) inner join tbl_indicator i on(at.indicator_id=i.indicator_id) 
  inner join tbl_subactivity s on(i.subactivity_id=s.subact_id)
   inner join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   
 where  sc.id like '".$_SESSION['usersubcomponent']."%' and
 i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%' 

 and tr.fromDate= '".$_SESSION['fromDate']."%'
 and tr.toDate='".$_SESSION['toDate']."'
 group by tr.indicator_id,at.semi_annual
   order by s.subactivity_code,i.indicator_name asc";
 
 

 
/*  /*
  and 
 
 tr.reportingPeriod like  '".$_SESSION['ccfquarter']."%' 
 and tr.year like '".$_SESSION['year']."%'
  and tr.half_year like '".$_SESSION['half_year']."%'
 */
 
}

else{
  $sql="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,sc.id,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  

min(at.ptotal) as totalcummulativetarget, tr.total as totalcummulativeactual,
   round(IFNULL(sum(tr.total),0)/IFNULL(min(at.ptotal),0)*100,0) as ccfPercentageAchieved
 
  from view_Actualsum  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id)
   left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
    left join view_cross_annualtarget at on(tr.indicator_id=at.indicator_id)
 where sc.id like '".$_SESSION['usersubcomponent']."%' and
 i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%'
 group by tr.indicator_id order by s.subactivity_code,i.indicator_name asc";
 
 

}

   
   
 $query1=@mysql_query($sql)or die("Unexpected http Error code 0929  because, ".mysql_error());
//$obj->alert($sql);

 while($row=@mysql_fetch_array($query1)){
  $color=$n%2==1?"evenrow":"white";
 $ccfPA=($row['ccfPercentageAchieved']!=0)?"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability();\">".$row['ccfPercentageAchieved']."%</a></td>":"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability()\">0%</a></td>";
 #$ccfPPLTA=($row['ccfPercentageProjectLifeAchieved']!=0)?"<td align='right'>".$row['ccfPercentageProjectLifeAchieved']."%</td>":"<td align='right'>0%</td>";
 #$projectlifetarget=($row['projectlifetarget']!='')?"<td align='right'>$row[projectlifetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativetarget=($row['totalcummulativetarget']!='')?"<td align='right'>$row[totalcummulativetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativeactual=($row['totalcummulativeactual']!='')?"<td align='right'>$row[totalcummulativeactual]</td>":"<td align='right'>-</td>";
  $data.="<tr class=$color>
    <td align='right'>".$row['subactivity_code']."</td>
    <td> ".$row['subactivity_name']."</td>
    <td>$row[indicator_name]</td>
   ".$totalcummulativetarget."
    ".$totalcummulativeactual."
   ".$ccfPA."
   
  </tr>"; $inc++;
   }
  $data.="</table></form>";


$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;

}











function view_classifiedccf_backup30102011($subcomponent,$output,$activity,$subactivity,$indicator,$halfyear,$quarter,$year){
$obj=new xajaxResponse();
if($_SESSION['username']==''){
$obj->addRedirect('index.php');
return $obj;
}
$_SESSION['indicator_110']='';
$_SESSION['ccfsubcomponent']='';
$_SESSION['ccfoutput']='';
$_SESSION['ccfactivity']='';
$_SESSION['ccfsubactivity']='';
$_SESSION['fromyear']='';
$_SESSION['year']='';
$_SESSION['half_year']='';
$_SESSION['tomonth']='';
$date=date('Y');
$month=date('M');
$_SESSION['indicator_110']=$indicator;
$_SESSION['ccfsubcomponent']=$subcomponent;
$_SESSION['ccfoutput']=$output;
$_SESSION['ccfactivity']=$activity;
$_SESSION['ccfsubactivity']=$subactivity;

$year=($year<>'')?$year:$date;
$quarter=($quarter<>'')?$quarter:'';

$_SESSION['quarter']=$quarter;
$_SESSION['year']=$year;
$frommonth=($frommonth<>'')?$frommonth:'';
$_SESSION['half_year']=$halfyear;
#$tomonth=($tomonth<>'')?$tomonth:$month;
#$tomonth=($tomonth<>'')?$tomonth:'';
#$_SESSION['tomonth']=$tomonth;
$data.=" <table width='700' border='0'>
".filter_cumulativeTargetsAgainstActuals()."
  <tr>
    <th scope='col'>&nbsp;</th>
    <th colspan='5' scope='col'>CUMMULATIVE TARGETS AGAINST ACTUALS</th>

  </tr>
  <tr class='evenrow2' style=''>
    <td class=black2 align='right'>CODE</td>
	<td class=black2>Sub-Activity</td>
    <td class=black2>Indicator</td>
    <td class=black2>Total Cummulative Targets</td>
    <td class=black2>Total Cummulative Actuals</td>
    <td class=black2>(%)Achieved</td>
  
   
	
  </tr>";
  $n=1; $inc=1;
  
  
  #*------------------query backup 23092011 by Achilley********************
  #round(avg(IFNULL(sum(t.total),0)/IFNULL(plt.target,0))*100,0)
  
 /*  $sql="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.reportingPeriod,tr.year,at.totalcummulativetarget,sum(tr.total) as
   totalcummulativeactual,round(IFNULL(sum(tr.total),0)/IFNULL(at.totalcummulativetarget,0)*100,0)
    as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0)
	 as ccfPercentageProjectLifeAchieved 
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   left join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%' and 
 tr.year between '".$_SESSION['fromyear']."' and '".$_SESSION['toyear']."' and 
 tr.reportingPeriod between '".$_SESSION['frommonth']."' and '".$_SESSION['tomonth']."'
 group by tr.indicator_id order by s.subactivity_code asc";
  */
 
 
 //noted on 31-10-2011 by  Achilleyz
 // for this function to yield right results i have to use=============
 #==if statements in the code to replace the case when stmts in the sql code==============
 $jan='';
 $mar='';
 $apr='';
 $jun='';
 $jul='';
 $oct='';
 $dec='';
 
 $jan='Jan';
 $mar='Mar';
 $apr='Apr';
 $jun='Jun';
 $jul='Sep';
 $oct='Oct';
 $dec='Dec';
 
 /* 

 $sql="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.reportingPeriod,tr.year,tr.half_year,
  
  case  when tr.reportingPeriod between '".$jan."' and '".$mar."' then sum(at.pquarter1)
  						  when tr.reportingPeriod between '".$jan."' and '".$apr."' then sum(at.pquarter1)
						  when  tr.reportingPeriod between '".$jan."' and '".$jun."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$jul."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$sep."' then sum(at.pquarter1+at.pquarter2+at.pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$oct."' then sum(at.pquarter1+at.pquarter2+at.pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$dec."' then sum(at.pquarter1+at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$mar."' and '".$apr."' then sum(at.pquarter1)
						  when tr.reportingPeriod between '".$mar."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$apr."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$jun."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$jun."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$jul."' and '".$sep."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$dec."' then sum(at.pquarter3+at.pquarter4)
  						  when tr.reportingPeriod between '".$sep."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$sep."' and '".$dec."' then sum(at.pquarter3+pquarter4)
						  when tr.reportingPeriod between '".$oct."' and '".$dec."' then sum(at.pquarter4)
						  when tr.reportingPeriod between '' and '' then sum(at.pquarter1+at.pquarter2+at.pquarter3+at.pquarter4)
						  end as
  
  
  totalcummulativetarget,sum(tr.total) as    totalcummulativeactual,
   round(IFNULL(sum(tr.total),0)/IFNULL(case 
   						 when tr.reportingPeriod between '".$jan."' and '".$mar."' then sum(at.pquarter1)
  						  when tr.reportingPeriod between '".$jan."' and '".$apr."' then sum(at.pquarter1)
						  when  tr.reportingPeriod between '".$jan."' and '".$jun."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$jul."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$sep."' then sum(at.pquarter1+at.pquarter2+at.pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$oct."' then sum(at.pquarter1+at.pquarter2+at.pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$dec."' then sum(at.pquarter1+at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$mar."' and '".$apr."' then sum(at.pquarter1)
						  when tr.reportingPeriod between '".$mar."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$apr."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$jun."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$jun."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  
						  when tr.reportingPeriod between '".$jul."' and '".$sep."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$dec."' then sum(at.pquarter3+at.pquarter4)
  						  when tr.reportingPeriod between '".$sep."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$sep."' and '".$dec."' then sum(at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$oct."' and '".$dec."' then sum(at.pquarter4)
						  when tr.reportingPeriod between '' and '' then sum(at.pquarter1+at.pquarter2+at.pquarter3+at.pquarter4) end,0)*100,0)
						  
    as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0)
	 as ccfPercentageProjectLifeAchieved  
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   left join tbl_annualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%' and 
 tr.year between '".$_SESSION['fromyear']."' and '".$_SESSION['toyear']."' and 
 tr.reportingPeriod between '".$_SESSION['frommonth']."' and '".$_SESSION['tomonth']."'
 group by tr.indicator_id order by s.subactivity_code,i.indicator_name asc";

 #$query=mysql_query($sql)or die("Unexpected http Error code 0683  because, ".mysql_error());
 
 $sql="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.reportingPeriod,tr.year,
  
  case  when tr.reportingPeriod between '".$jan."' and '".$mar."' then sum(at.pquarter1)
  						  when tr.reportingPeriod between '".$jan."' and '".$apr."' then sum(at.pquarter1)
						  when  tr.reportingPeriod between '".$jan."' and '".$jun."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$jul."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$sep."' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$oct."' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$dec."' then sum(at.ptotal)


						  when tr.reportingPeriod between '".$mar."' and '".$apr."' then sum(at.pquarter1)
						  when tr.reportingPeriod between '".$mar."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between '".$apr."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between '".$jun."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$jun."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  
						  when tr.reportingPeriod between '".$jul."' and '".$sep."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$dec."' then sum(at.pquarter3+pquarter4)
  						  when tr.reportingPeriod between '".$sep."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$sep."' and '".$dec."' then sum(at.pquarter3++pquarter4)
						  when tr.reportingPeriod between '".$oct."' and '".$dec."' then sum(pquarter4)
						  when tr.reportingPeriod between '' and '' then sum(at.ptotal)
						  end as
  
  
  totalcummulativetarget,sum(tr.total) as
   totalcummulativeactual,round(IFNULL(sum(tr.total),0)/IFNULL(case  when tr.reportingPeriod between '".$jan."' and '".$mar."' then sum(at.pquarter1)
  						  when tr.reportingPeriod between '".$jan."' and '".$apr."' then sum(at.pquarter1)
						  when  tr.reportingPeriod between '".$jan."' and '".$jun."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$jul."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$sep."' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$oct."' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$dec."' then sum(at.ptotal)
						  when tr.reportingPeriod between '".$mar."' and '".$apr."' then sum(at.pquarter1)
						  when tr.reportingPeriod between '".$mar."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between '".$apr."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between '".$jun."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$jun."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  
						  when tr.reportingPeriod between '".$jul."' and '".$sep."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$dec."' then sum(at.pquarter3+pquarter4)
  						  when tr.reportingPeriod between '".$sep."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$sep."' and '".$dec."' then sum(at.pquarter3++pquarter4)
						  when tr.reportingPeriod between '".$oct."' and '".$dec."' then sum(pquarter4)when tr.reportingPeriod between'' and '' then sum(at.ptotal) end,0)*100,0)
						  
    as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0)
	 as ccfPercentageProjectLifeAchieved  
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   left join tbl_annualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%'
 
 group by tr.indicator_id order by s.subactivity_code asc"; 
 
 
 
 $sql2="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,at.totalcummulativetarget,tr.half_year,sum(tr.total) as totalcummulativeactual,round(IFNULL(sum(tr.total),0)/IFNULL(at.totalcummulativetarget,0)*100,0) as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0) as ccfPercentageProjectLifeAchieved from tbl_organizationreporting  tr
  left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) 
  left join tbl_subcomponent sc on(sc.id=i.subcomponent_id) 
  left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id) 
  left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id) 
  left join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%'
 group by tr.indicator_id order by s.subactivity_code asc";
 */
 
 ##,
  
 /* case  when tr.half_year like 'Jan - Jun%' then sum(at.pquarter1+at.pquarter2)
  	when tr.half_year like 'Jul - Dec%' then sum(at.pquarter3+at.pquarter4)
	when tr.half_year like '%' then sum(at.ptotal) end as  totalcummulativetarget*/
 
 
 $sql="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.reportingPeriod,tr.year,
  
  case when tr.half_year='Jan - Jun' then sum(at.pquarter1+at.pquarter2)
  	when tr.half_year='Jul - Dec' then sum(at.pquarter3+at.pquarter4)
	when  tr.half_year='' then sum(at.ptotal) end as  totalcummulativetarget,
	sum(tr.total) as    totalcummulativeactual,
   round(IFNULL(sum(tr.total),0)/IFNULL(sum(at.ptotal),0)*100,0) as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0) as ccfPercentageProjectLifeAchieved  
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   left join tbl_annualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
   and tr.half_year like '".$_SESSION['half_year']."%'
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%' and 
 
 tr.reportingPeriod like  '".$_SESSION['quarter']."%' 
 and tr.year like '".$_SESSION['year']."%'
 group by tr.indicator_id order by s.subactivity_code,i.indicator_name asc";

   $obj->addAlert($sql);
  $query=mysql_query($sql)or die("Unexpected http Error code 1123  because, ".mysql_error());
/*  if(($fromyear||$toyear)<>NULL){
  $obj->addAlert($sql);
  $query=mysql_query($sql)or die("Unexpected http Error code 1121  because, ".mysql_error());
  }else {
   $obj->addAlert($sql2);
 $query=mysql_query($sql2)or die("Unexpected http Error code 1123  because, ".mysql_error());
} */


 while($row=mysql_fetch_array($query)){
  $color=$n%2==1?"evenrow":"white";
 $ccfPA=($row['ccfPercentageAchieved']!=0)?"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability()\">".$row['ccfPercentageAchieved']."%</a></td>":"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability()\">0%</a></td>";
 $ccfPPLTA=($row['ccfPercentageProjectLifeAchieved']!=0)?"<td align='right'>".$row['ccfPercentageProjectLifeAchieved']."%</td>":"<td align='right'>0%</td>";
 $projectlifetarget=($row['projectlifetarget']!='')?"<td align='right'>$row[projectlifetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativetarget=($row['totalcummulativetarget']!='')?"<td align='right'>$row[totalcummulativetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativeactual=($row['totalcummulativeactual']!='')?"<td align='right'>$row[totalcummulativeactual]</td>":"<td align='right'>-</td>";
  $data.="<tr class=$color>
    <td align='right'>".$row['subactivity_code']."</td>
    <td> ".$row['subactivity_name']."</td>
    <td>$row[indicator_name]</td>
   ".$totalcummulativetarget."
    ".$totalcummulativeactual."
   ".$ccfPA."
   
  </tr>"; $inc++;
   }
  $data.="</table>";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;

}



function view_classifiedccf_backup28102011($subcomponent,$output,$activity,$subactivity,$indicator,$fromyear,$toyear,$frommonth,$tomonth){
$obj=new xajaxResponse();
if($_SESSION['username']==''){
$obj->addRedirect('index.php');
return $obj;
}
$_SESSION['indicator_110']='';
$_SESSION['ccfsubcomponent']='';
$_SESSION['ccfoutput']='';
$_SESSION['ccfactivity']='';
$_SESSION['ccfsubactivity']='';
$_SESSION['fromyear']='';
$_SESSION['toyear']='';
$_SESSION['frommonth']='';
$_SESSION['tomonth']='';
$date=date('Y');
$month=date('M');
$_SESSION['indicator_110']=$indicator;
$_SESSION['ccfsubcomponent']=$subcomponent;
$_SESSION['ccfoutput']=$output;
$_SESSION['ccfactivity']=$activity;
$_SESSION['ccfsubactivity']=$subactivity;
#$fromyear=($fromyear<>'')?$fromyear:$date;
#$toyear=($toyear<>'')?$toyear:$date;
$fromyear=($fromyear<>'')?$fromyear:'';
$toyear=($toyear<>'')?$toyear:'';

$_SESSION['fromyear']=$fromyear;
$_SESSION['toyear']=$toyear;
#$frommonth=($frommonth<>'')?$frommonth:$month;
$frommonth=($frommonth<>'')?$frommonth:'';
$_SESSION['frommonth']=$frommonth;
#$tomonth=($tomonth<>'')?$tomonth:$month;
$tomonth=($tomonth<>'')?$tomonth:'';
$_SESSION['tomonth']=$tomonth;
$data.=" <table width='700' border='0'>
".filter_cumulativeTargetsAgainstActuals()."
  <tr>
    <th scope='col'>&nbsp;</th>
    <th colspan='5' scope='col'>CUMMULATIVE TARGETS AGAINST ACTUALS</th>

  </tr>
  <tr class='evenrow2' style=''>
    <td class=black2 align='right'>CODE</td>
	<td class=black2>Sub-Activity</td>
    <td class=black2>Indicator</td>
    <td class=black2>Total Cummulative Targets</td>
    <td class=black2>Total Cummulative Actuals</td>
    <td class=black2>(%)Achieved</td>
  
   
	
  </tr>";
  $n=1; $inc=1;
  
  
  #*------------------query backup 23092011 by Achilley********************
  #round(avg(IFNULL(sum(t.total),0)/IFNULL(plt.target,0))*100,0)
  
 /*  $sql="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.reportingPeriod,tr.year,at.totalcummulativetarget,sum(tr.total) as
   totalcummulativeactual,round(IFNULL(sum(tr.total),0)/IFNULL(at.totalcummulativetarget,0)*100,0)
    as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0)
	 as ccfPercentageProjectLifeAchieved 
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   left join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%' and 
 tr.year between '".$_SESSION['fromyear']."' and '".$_SESSION['toyear']."' and 
 tr.reportingPeriod between '".$_SESSION['frommonth']."' and '".$_SESSION['tomonth']."'
 group by tr.indicator_id order by s.subactivity_code asc";
  */
 
 $jan='';
 $mar='';
 $apr='';
 $jun='';
 $jul='';
 $oct='';
 $dec='';
 
 $jan='Jan';
 $mar='Mar';
 $apr='Apr';
 $jun='Jun';
 $jul='Sep';
 $oct='Oct';
 $dec='Dec';
 
 /* 

 $sql="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.reportingPeriod,tr.year,tr.half_year,
  
  case  when tr.reportingPeriod between '".$jan."' and '".$mar."' then sum(at.pquarter1)
  						  when tr.reportingPeriod between '".$jan."' and '".$apr."' then sum(at.pquarter1)
						  when  tr.reportingPeriod between '".$jan."' and '".$jun."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$jul."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$sep."' then sum(at.pquarter1+at.pquarter2+at.pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$oct."' then sum(at.pquarter1+at.pquarter2+at.pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$dec."' then sum(at.pquarter1+at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$mar."' and '".$apr."' then sum(at.pquarter1)
						  when tr.reportingPeriod between '".$mar."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$apr."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$jun."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$jun."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$jul."' and '".$sep."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$dec."' then sum(at.pquarter3+at.pquarter4)
  						  when tr.reportingPeriod between '".$sep."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$sep."' and '".$dec."' then sum(at.pquarter3+pquarter4)
						  when tr.reportingPeriod between '".$oct."' and '".$dec."' then sum(at.pquarter4)
						  when tr.reportingPeriod between '' and '' then sum(at.pquarter1+at.pquarter2+at.pquarter3+at.pquarter4)
						  end as
  
  
  totalcummulativetarget,sum(tr.total) as    totalcummulativeactual,
   round(IFNULL(sum(tr.total),0)/IFNULL(case 
   						 when tr.reportingPeriod between '".$jan."' and '".$mar."' then sum(at.pquarter1)
  						  when tr.reportingPeriod between '".$jan."' and '".$apr."' then sum(at.pquarter1)
						  when  tr.reportingPeriod between '".$jan."' and '".$jun."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$jul."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$sep."' then sum(at.pquarter1+at.pquarter2+at.pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$oct."' then sum(at.pquarter1+at.pquarter2+at.pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$dec."' then sum(at.pquarter1+at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$mar."' and '".$apr."' then sum(at.pquarter1)
						  when tr.reportingPeriod between '".$mar."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$apr."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$jun."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$jun."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+at.pquarter4)
						  
						  when tr.reportingPeriod between '".$jul."' and '".$sep."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$dec."' then sum(at.pquarter3+at.pquarter4)
  						  when tr.reportingPeriod between '".$sep."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$sep."' and '".$dec."' then sum(at.pquarter3+at.pquarter4)
						  when tr.reportingPeriod between '".$oct."' and '".$dec."' then sum(at.pquarter4)
						  when tr.reportingPeriod between '' and '' then sum(at.pquarter1+at.pquarter2+at.pquarter3+at.pquarter4) end,0)*100,0)
						  
    as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0)
	 as ccfPercentageProjectLifeAchieved  
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   left join tbl_annualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%' and 
 tr.year between '".$_SESSION['fromyear']."' and '".$_SESSION['toyear']."' and 
 tr.reportingPeriod between '".$_SESSION['frommonth']."' and '".$_SESSION['tomonth']."'
 group by tr.indicator_id order by s.subactivity_code,i.indicator_name asc";

 #$query=mysql_query($sql)or die("Unexpected http Error code 0683  because, ".mysql_error());
 
 $sql="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.reportingPeriod,tr.year,
  
  case  when tr.reportingPeriod between '".$jan."' and '".$mar."' then sum(at.pquarter1)
  						  when tr.reportingPeriod between '".$jan."' and '".$apr."' then sum(at.pquarter1)
						  when  tr.reportingPeriod between '".$jan."' and '".$jun."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$jul."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$sep."' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$oct."' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$dec."' then sum(at.ptotal)
						  when tr.reportingPeriod between '".$mar."' and '".$apr."' then sum(at.pquarter1)
						  when tr.reportingPeriod between '".$mar."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between '".$apr."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between '".$jun."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$jun."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  
						  when tr.reportingPeriod between '".$jul."' and '".$sep."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$dec."' then sum(at.pquarter3+pquarter4)
  						  when tr.reportingPeriod between '".$sep."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$sep."' and '".$dec."' then sum(at.pquarter3++pquarter4)
						  when tr.reportingPeriod between '".$oct."' and '".$dec."' then sum(pquarter4)
						  when tr.reportingPeriod between '' and '' then sum(at.ptotal)
						  end as
  
  
  totalcummulativetarget,sum(tr.total) as
   totalcummulativeactual,round(IFNULL(sum(tr.total),0)/IFNULL(case  when tr.reportingPeriod between '".$jan."' and '".$mar."' then sum(at.pquarter1)
  						  when tr.reportingPeriod between '".$jan."' and '".$apr."' then sum(at.pquarter1)
						  when  tr.reportingPeriod between '".$jan."' and '".$jun."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$jul."' then sum(at.pquarter1+at.pquarter2)
						  when  tr.reportingPeriod between '".$jan."' and '".$sep."' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$oct."' then sum(at.pquarter1+at.pquarter2+pquarter3)
						  when  tr.reportingPeriod between '".$jan."' and '".$dec."' then sum(at.ptotal)
						  when tr.reportingPeriod between '".$mar."' and '".$apr."' then sum(at.pquarter1)
						  when tr.reportingPeriod between '".$mar."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$mar."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$mar."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between '".$apr."' and '".$jun."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$apr."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$apr."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  when tr.reportingPeriod between '".$jun."' and '".$jul."' then sum(at.pquarter2)
						  when tr.reportingPeriod between '".$jun."' and '".$sep."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$oct."' then sum(at.pquarter2+at.pquarter3)
						  when tr.reportingPeriod between '".$jun."' and '".$dec."' then sum(at.pquarter2+at.pquarter3+pquarter4)
						  
						  when tr.reportingPeriod between '".$jul."' and '".$sep."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$jul."' and '".$dec."' then sum(at.pquarter3+pquarter4)
  						  when tr.reportingPeriod between '".$sep."' and '".$oct."' then sum(at.pquarter3)
						  when tr.reportingPeriod between '".$sep."' and '".$dec."' then sum(at.pquarter3++pquarter4)
						  when tr.reportingPeriod between '".$oct."' and '".$dec."' then sum(pquarter4)when tr.reportingPeriod between'' and '' then sum(at.ptotal) end,0)*100,0)
						  
    as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0)
	 as ccfPercentageProjectLifeAchieved  
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   left join tbl_annualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%'
 
 group by tr.indicator_id order by s.subactivity_code asc"; 
 
 
 
 $sql2="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,at.totalcummulativetarget,tr.half_year,sum(tr.total) as totalcummulativeactual,round(IFNULL(sum(tr.total),0)/IFNULL(at.totalcummulativetarget,0)*100,0) as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0) as ccfPercentageProjectLifeAchieved from tbl_organizationreporting  tr
  left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) 
  left join tbl_subcomponent sc on(sc.id=i.subcomponent_id) 
  left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id) 
  left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id) 
  left join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%'
 group by tr.indicator_id order by s.subactivity_code asc";
 */
 
 
 
 
 $sql="select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,
  i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,
  tr.reportingPeriod,tr.year,tr.half_year,sum(at.ptotal) as totalcummulativetarget,sum(tr.total) as    totalcummulativeactual,
   round(IFNULL(sum(tr.total),0)/IFNULL(sum(at.ptotal),0)*100,0) as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0) as ccfPercentageProjectLifeAchieved  
  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) 
  left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join tbl_output o on(o.output_id=i.output_id) 
  left join tbl_activity a on(a.activity_id=i.activity_id)
   left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id)
   left join tbl_annualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
    and tr.half_year like '".$_SESSION['half_year']."%'
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%' and 
 tr.year between '".$_SESSION['fromyear']."' and '".$_SESSION['toyear']."' and 
 tr.reportingPeriod between '".$_SESSION['frommonth']."' and '".$_SESSION['tomonth']."'
 group by tr.indicator_id order by s.subactivity_code,i.indicator_name asc";

   #$obj->addAlert($sql);
  $query=mysql_query($sql)or die("Unexpected http Error code 1123  because, ".mysql_error());
/*  if(($fromyear||$toyear)<>NULL){
  $obj->addAlert($sql);
  $query=mysql_query($sql)or die("Unexpected http Error code 1121  because, ".mysql_error());
  }else {
   $obj->addAlert($sql2);
 $query=mysql_query($sql2)or die("Unexpected http Error code 1123  because, ".mysql_error());
} */


 while($row=mysql_fetch_array($query)){
  $color=$n%2==1?"evenrow":"white";
 $ccfPA=($row['ccfPercentageAchieved']!=0)?"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability()\">".$row['ccfPercentageAchieved']."%</a></td>":"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability()\">0%</a></td>";
 $ccfPPLTA=($row['ccfPercentageProjectLifeAchieved']!=0)?"<td align='right'>".$row['ccfPercentageProjectLifeAchieved']."%</td>":"<td align='right'>0%</td>";
 $projectlifetarget=($row['projectlifetarget']!='')?"<td align='right'>$row[projectlifetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativetarget=($row['totalcummulativetarget']!='')?"<td align='right'>$row[totalcummulativetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativeactual=($row['totalcummulativeactual']!='')?"<td align='right'>$row[totalcummulativeactual]</td>":"<td align='right'>-</td>";
  $data.="<tr class=$color>
    <td align='right'>".$row['subactivity_code']."</td>
    <td> ".$row['subactivity_name']."</td>
    <td>$row[indicator_name]</td>
   ".$totalcummulativetarget."
    ".$totalcummulativeactual."
   ".$ccfPA."
   
  </tr>"; $inc++;
   }
  $data.="</table>";


$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;

}


function view_classifiedccf_backup15092011($subcomponent,$output,$activity,$subactivity,$indicator){
$obj=new xajaxResponse();
$_SESSION['indicator_110']='';
$_SESSION['ccfsubcomponent']='';
$_SESSION['ccfoutput']='';
$_SESSION['ccfactivity']='';
$_SESSION['ccfsubactivity']='';


$_SESSION['indicator_110']=$indicator;
$_SESSION['ccfsubcomponent']=$subcomponent;
$_SESSION['ccfoutput']=$output;
$_SESSION['ccfactivity']=$activity;
$_SESSION['ccfsubactivity']=$subactivity;
$data.=" <table width='100%' border='0'>
<tr class='evenrow'>
    <td scope='col' colspan=2><B>Subcomponent:</b></td><td scope='col' colspan=5><select name='subcomponent' id='subcomponent4' >";
	if($_SESSION['ccfsubcomponent']!='')$data.="<option value='".$_SESSION['ccfsubcomponent']."'>".substr($_SESSION['ccfsubcomponent'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die("aBi Error-code 499 because, ".mysql_error());
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value='".$row1['subcomponent']."'>".$row1['subcomponent_code']." ".substr($row1['subcomponent'],0,40)."</option>";
	}
	
	$data.="</select><div style='float:right;'><a href='export_to_excel_word.php?linkvar=Export Cummulative Targets Against Actuals&&subcomponent=".$_SESSION['ccfsubcomponent']."&&output=".$_SESSION['ccfoutput']."&&activity=".$_SESSION['ccfactivity']."&&subactivity=".$_SESSION['ccfsubactivity']."&&indicator=".$_SESSION['indicator_110']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></div></td>
  </tr>
  <tr class='evenrow'>
    <td scope='col' colspan=2><B>Output:</b></td><td scope='col' colspan=5><select name='output' id='output' >";
	if($_SESSION['ccfoutput']!='')$data.="<option value='".$_SESSION['ccfoutput']."'>".substr($_SESSION['ccfoutput'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_output order by output_code asc") or die("aBi Error-code 499 because, ".mysql_error());
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value='".$row1['output_name']."'>".$row1['output_code']." ".substr($row1['output_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
  <tr class='evenrow'>
    <td scope='col' colspan=2><B>Activity:</b></td><td scope='col' colspan=5><select name='activity' id='activity' >";
	if($_SESSION['ccfactivity']!='')$data.="<option value='".$_SESSION['ccfactivity']."'>".$row1['activity_code']." ".substr($_SESSION['ccfactivity'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_activity order by activity_code asc") or die("aBi Error-code 499 because, ".mysql_error());
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value='".$row1['activity_name']."'>".$row1['activity_code']." ".substr($row1['activity_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
<tr class='evenrow'>
    <td scope='col' colspan=2><B>Subactivity:</b></td><td scope='col' colspan=5><select name='subactivity' id='subactivity' >";
	if($_SESSION['ccfsubactivity']!='')$data.="<option value='".$_SESSION['ccfsubactivity']."'>".substr($_SESSION['ccfsubactivity'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_subactivity order by subactivity_code asc") or die("aBi Error-code 499 because, ".mysql_error());
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value='".$row1['subactivity_name']."'>".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
<tr class='evenrow'>
    <td scope='col' colspan=2><B>Indicator:</b></td><td scope='col' colspan=5><select name='indicator' id='indicator' >";
	if($_SESSION['indicator_110']!='')$data.="<option value='".$_SESSION['indicator_110']."'>".substr($_SESSION['indicator_110'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select i.indicator_name  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id) left join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id)  where i.indicator_id!=0  group by tr.indicator_id order by tr.indicator_id asc") or die("aBi Error-code 499 because, ".mysql_error());
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value='".$row1['indicator_name']."'>".substr($row1['indicator_name'],0,70)."</option>";
	}
	
	$data.="</select><div style='float:right;'><input type='button' name='export' value='Go' onClick=\"xajax_view_classifiedccf(getElementById('subcomponent4').value,getElementById('output').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('indicator').value);\" /></div></td>
  </tr>
  <tr>
    <th scope='col'>&nbsp;</th>
    <th colspan='5' scope='col'>CUMMULATIVE TARGETS AGAINST ACTUALS</th>

  </tr>
  <tr class='evenrow2' style=''>
    <td class=black2 align='right'>CODE</td>
	<td class=black2>Sub-Activity</td>
    <td class=black2>Indicator</td>
    <td class=black2>Total Cummulative Targets</td>
    <td class=black2>Total Cummulative Actuals</td>
    <td class=black2>(%)Achieved</td>
  
   
	
  </tr>";
  $n=1; $inc=1;
  #round(avg(IFNULL(sum(t.total),0)/IFNULL(plt.target,0))*100,0)
 $query=mysql_query("select tr.indicator_id,sc.subcomponent_code,sc.subcomponent,o.output_code,o.output_name,a.activity_code,a.activity_name,i.indicator_name,s.subactivity_name,s.subactivity_code,i.subactivity_id,at.totalcummulativetarget,sum(tr.total) as totalcummulativeactual,round(IFNULL(sum(tr.total),0)/IFNULL(at.totalcummulativetarget,0)*100,0) as ccfPercentageAchieved,plt.period,plt.target as projectlifetarget,round(IFNULL(sum(tr.total),0)/IFNULL(plt.target,0)*100,0) as ccfPercentageProjectLifeAchieved from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) left join tbl_subactivity s on(i.subactivity_id=s.subact_id) left join tbl_subcomponent sc on(sc.id=i.subcomponent_id) left join tbl_output o on(o.output_id=i.output_id) left join tbl_activity a on(a.activity_id=i.activity_id) left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id) left join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id) where i.indicator_id!=0 
 and i.indicator_name like '".$_SESSION['indicator_110']."%'
 && sc.subcomponent like '".$_SESSION['ccfsubcomponent']."%'
 && o.output_name like '".$_SESSION['ccfoutput']."%' 
 && a.activity_name like '".$_SESSION['ccfactivity']."%'
 && s.subactivity_name like '".$_SESSION['ccfsubactivity']."%'
 group by tr.indicator_id order by s.subactivity_code asc")or die("Unexpected http Error code 0683  because, ".mysql_error());
 

 while($row=mysql_fetch_array($query)){
  $color=$n%2==1?"evenrow":"white";
 $ccfPA=($row['ccfPercentageAchieved']!=0)?"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability()\">".$row['ccfPercentageAchieved']."%</a></td>":"<td align='right'><a href='#how comes?' onclcick=\"xajax_accountability()\">0%</a></td>";
 $ccfPPLTA=($row['ccfPercentageProjectLifeAchieved']!=0)?"<td align='right'>".$row['ccfPercentageProjectLifeAchieved']."%</td>":"<td align='right'>0%</td>";
 $projectlifetarget=($row['projectlifetarget']!='')?"<td align='right'>$row[projectlifetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativetarget=($row['totalcummulativetarget']!='')?"<td align='right'>$row[totalcummulativetarget]</td>":"<td align='right'>-</td>";
 $totalcummulativeactual=($row['totalcummulativeactual']!='')?"<td align='right'>$row[totalcummulativeactual]</td>":"<td align='right'>-</td>";
  $data.="<tr class=$color>
    <td align='right'>".$row['subactivity_code']."</td>
    <td> ".$row['subactivity_name']."</td>
    <td>$row[indicator_name]</td>
   ".$totalcummulativetarget."
    ".$totalcummulativeactual."
   ".$ccfPA."
   
  </tr>"; $inc++;
   }
  $data.="</table>";


$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;

}


 function view_ccf(){
$obj=new xajaxResponse();
$data.=" <table width='100%' border='0'>
  <tr>
    <th scope='col'>&nbsp;</th>
    <th colspan='4' scope='col'>TARGETS</th>
    <th colspan='3' scope='col'>ACTUALS</th>
    <th colspan='3' scope='col'>Percentage Achieved (%)</th>
  </tr>
  <tr class='evenrow' style=>
    <td class=black2>NO</td>
    <td class=black2>Indicator</td>

    <td class=black2>Commulative Todate</td>
    <td class=black2>Project Life </td>
    <td class=black2>(%)achieved</td>
    <td class=black2>Annual todate</td>
    
    <td class=black2>Quarter</td>
    <td class=black2>Annual todate</td>
	<td class=black2>cummulative todate</td>
    <td class=black2>project Life</td>
	<td class=black2>(%)achieved</td>
	
  </tr>";
  $n=1; $inc=1;
 $query=mysql_query("select tr.indicator_id,i.indicator_name,at.totalcummulativetarget,sum(tr.total) as totalcummulativeactual,plt.period,plt.target as projectlifetarget from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id) left join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id)  group by indicator_id order by indicator_id asc")or die("abi Error code 0045  because, ".mysql_error());
 while($row=mysql_fetch_array($query)){
  $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
    <td>".$n++."</td>
    <td>$row[indicator_name]</td>
    
    <td>$row[totalcummulativetarget]</td>
    <td>$row[projectlifetarget]</td>
    <td><a href='#how comes?' onclcick=\"accountability()\">".round(($row['totalcummulativetarget']/$row['projectlifetarget'])*100,0)."%</a></td>
    <td>$row[totalcummulativeactual]</td>
    <td>$row[totalcummulativeactual]</td>
    <td>$row[totalcummulativeactual]</td>
	<td>$row[totalcummulativeactual]</td>
    <td>$row[projectlifetarget]</td>
    <td>";
	
	$data.round(($row['totalcummulativeactual']/$row['projectlifetarget'])*100,0)."%</td>
  </tr>"; $inc++;
  }
  $data.="<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>";


$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}


function budgetSummary($year,$subcomponent){
$obj=new xajaxResponse();
$year=($year!=='')?$year:date(Y);
$_SESSION['year106']=$year;
$_SESSION['subcomponent106']=$subcomponent;
$data="<table width='660' border='0'>
 ".
  filter_budgetsummary()."
 
   
  <tr>
    <th scope='col'>NO</th>
	<th scope='col'><b align='right'>YEAR</b></th>
    <th scope='col'>CODE</th> 
	
    <th scope='col'>ACTIVITY NAME</th>
    <th scope='col'><div align='right'>JAN-MAR</div></th>
    <th scope='col'><div align='right'>APR-JUN</div></th>
    <th scope='col'> <div align='right'>JUL-SEPT</div></th>
    <th scope='col'> <div align='right'>OCT-DEC</div></th>
    <th scope='col'> <div align='right'>TOTAL</div></th>
  </tr>";
 $xy="select * from view_budgetsummary where subcomponent like '".$_SESSION['subcomponent106']."%' and year like '".$_SESSION['year106']."%' order by subcomponent_id asc ";
  #$obj->addalert($xy);
  $query=mysql_query($xy)or die(mysql_error());
  $n=1; $inc=1;
 while($row=mysql_fetch_array($query)){ 
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
    <td>".$n++."</td>
	 <td align='right'>$row[year]</td>
    <td>$row[activity_code]</td>
    <td>$row[activity_name]</td>
	
    <td align='right'>".number_format($row[sfquarter1])."</td>
    <td align='right'>".number_format($row[sfquarter2])."</td>
	<td align='right'>".number_format($row[sfquarter3])."</td>
    <td align='right'>".number_format($row[sfquarter4])."</td>
    <td align='right' bgcolor='#669900'><b>".number_format($row[sftotal])."</b></td>
  </tr>";
$inc++;  
}

  $q=mysql_fetch_array(mysql_query("select SUM(sfquarter1) as sum_sfquarter1,sum(sfquarter2) as sum_sfquarter2,sum(sfquarter3) as sum_sfquarter3,sum(sfquarter4) as sum_sfquarter4,sum(sftotal) as sum_sftotal from view_budgetsummary where subcomponent like '".$_SESSION['subcomponent106']."%' and year like '".$year."%' group by year order by subcomponent_id asc"))or die("Http Error-code 1080 because,".mysql_error());
  $data.="
  <tr class='evenrow'>
    <td colspan=4><b>OVERALL TOTAL</b></td>

    <td align='right'><b>".number_format($q[sum_sfquarter1])."</b></td>
    <td align='right'><b>".number_format($q[sum_sfquarter2])."</b></td>
	<td align='right'><b>".number_format($q[sum_sfquarter3])."</b></td>
    <td align='right'><b>".number_format($q[sum_sfquarter4])."</b></td>
    <td align='right' bgcolor='#669900'><b>".number_format($q[sum_sftotal])."</b></td>
  </tr>
  
  </table>";  
  
 
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function view_annualFinancialWorkplan($subcomponent,$activity,$subactivity,$year){
$obj= new xajaxResponse();
//$obj->addAlert("it works!");
$_SESSION['subcomponentpr']=$subcomponent;
$_SESSION['activitypr']=$activity;
$_SESSION['subactivitypr']=$subactivity;

$year=($year!=='')?$year:date(Y);
$_SESSION['yearpr']=$year;
$data="<table>
<tr>
              
              ".filter_ProgramResultsAnnualBudget()."
            <tr>
              <td class='evenrow2' colspan=2>&nbsp;</td>
              <td width='25' class='evenrow2'>&nbsp;</td>
              <td width='145' class='evenrow2'>&nbsp;</td>
              
              <td colspan='6' class='evenrow2'>Financial Targets in '000' UGshs.</td>
            </tr>
            <tr><td width='' class='evenrow2'>Code</td>
              
              <td width='200' colspan='2' class='evenrow2'>Subactivity </td>
              <td  class='evenrow2'>Quarter 1 (Jan-Mar)</td>
              <td width='' class='evenrow2'>Quarter 2 (Apr-Jun)</td>
              <td width='' class='evenrow2'>Quarter 3 (Jul-Sep)</td>
              <td width='' bgcolor=#669900 class='evenrow2'>Quarter 4 (Oct-Dec)</td>
			  <td class='evenrow2' bgcolor='#669900' width='100' align=right>Total</td>
              
            </tr>";
$inc=1;$n=1;

//where subcomponent_id='".$_SESSION['wpsubcomponent_id']."'

$x="select * from view_annualbudget where lower(subcomponent) like '".strtolower($_SESSION['subcomponentpr'])."%' and lower(activity_name) like '".strtolower($_SESSION['activitypr'])."%' && lower(subactivity_name) like '".strtolower($_SESSION['subactivitypr'])."%' &&  year like '".$_SESSION['yearpr']."%'  order by subactivity_code asc";

		  $query=mysql_query($x)or die("aBi Error-code 00135 because, ".mysql_error());
		  
		  //$x="select * from view_annualbudget where subcomponent_id='".$subcomponent."' && output_id='".$output."'  and activity_id='".$activity."' and year='".$year."' order by subactivity_code asc";
		  //$query=mysql_query($x)or die("aBi Error-code 00135 because, ".mysql_error());
		 #$obj->addAlert($x);
		  
		  while($row=mysql_fetch_array($query)){
		   $color=$n%2==1?"evenrow":"white";
$data.="<tr class=$color><td>".$row['subactivity_code']."</td>

			<td colspan='2' width='200'> ".$row['subactivity_name']."</td>
			<td align=right>".number_format($row['fquarter1'])."</td>
            <td align=right>".number_format($row['fquarter2'])."</td>
            <td align=right>".number_format($row['fquarter3'])."</td>
            <td align=right>".number_format($row['fquarter4'])."</td>
				<td bgcolor='#669900' width='100' align=right><strong>".number_format($row['ftotal'])."</strong></td>
          </tr>";
$inc++;
		  }
		  //group by subactivity_id order by subactivity_id
		  //where subcomponent_id='".$_SESSION['wpsubcomponent_id']."'
		$tot=mysql_fetch_array(mysql_query("select sum(fquarter1) as sum_fquarter1,sum(fquarter2) as sum_fquarter2,sum(fquarter3) as sum_fquarter3,sum(fquarter4) as sum_fquarter4,sum(ftotal) as ftotal from view_annualbudget where lower(subcomponent) like '".strtolower($_SESSION['subcomponentpr'])."%' and lower(activity_name) like '".strtolower($_SESSION['activitypr'])."%' && lower(subactivity_name) like '".strtolower($_SESSION['subactivitypr'])."%' &&  year like '".$_SESSION['yearpr']."%' group by year "))or die("aBi Error-code 0075 because,".mysql_error());  
		  
	$data.="<tr class=evenrow>
            <td colspan='3' align=left><b>TOTAL:</b></td>
			<td align='right'><b>".number_format($tot['sum_fquarter1'])."</b></td>
			<td align='right'><b>".number_format($tot['sum_fquarter2'])."</b></td>
			<td align='right'><b>".number_format($tot['sum_fquarter3'])."</b></td>
			<td align='right'><b>".number_format($tot['sum_fquarter4'])."</b></td>
			<td align='right'><b>".number_format($tot['ftotal'])."</b></td></tr>
         ";
$data.="</table>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
#-----------------------Physical Targets-------------------------------------
function view_annualPhysicalWorkplan($activity1,$subcomponent,$output,$activity,$subactivity,$year){
$obj= new xajaxResponse();

$activity1="sub-activity based";
$_SESSION['indicator_type']=$activity1;
$_SESSION['wpsubcomponent']=$subcomponent;
$_SESSION['outputAnnualplanning']=$output;
$_SESSION['activityAnnualplanning']=$activity;
$_SESSION['subactivityAnnualplanning']=$subactivity;
$_SESSION['fyear']=($year!='')?$year:date(Y);
$n=1;

$data.="<table width='660' >".filter_annualPhysicalWorkplan()."



            <tr>
              <td class='evenrow2' colspan=''>&nbsp;</td>
              <td width='25' class='evenrow2'>&nbsp;</td>
              <td width='145' class='evenrow2'>&nbsp;</td>
              <td colspan='10' class='evenrow2'>Annual Sub-Activity Based Workplan</td>
             
            </tr>
            <tr><td width='' class='evenrow2'>No.</td>
              <td width='50' class='evenrow2'>Code</td>
              <td colspan='2' class='evenrow2'>Subactivity </td>
			    <td colspan='2' class='evenrow2' width='200'>Indicator </td>
				  <td width='150' class='evenrow2'>Baseline</td>
              <td width='150' class='evenrow2'>Quarter 1 (Jan-Mar)</td>
              <td width='150' class='evenrow2'>Quarter 2 (Apr-Jun)</td>
              <td width='150' class='evenrow2'>Quarter 3 (Jul-Sep)</td>
              <td width='150' bgcolor=#669900 class='evenrow2'>Quarter 4 (Oct-Dec)</td>
			  			<td class='evenrow2' bgcolor='#669900' colspan=2>Total</td>
              
            </tr>";
$inc=1;

$sql="CREATE or replace  VIEW `view_annualtarget` AS select 

`p`.`prog_id` AS `prog_id`,
`p`.`program_name` AS `program_name`
,s.id as subcomponent_id,
`s`.`subcomponent_code` AS `subcomponent_code`,
`s`.`subcomponent` AS `subcomponent`,

`c`.`id` as `component_id`,
`c`.`component`,

`o`.`output_id`,
`o`.`output_code` AS `output_code`,
`o`.`output_name` AS `output_name`,

`a`.`activity_code` AS `activity_code`,
`a`.`activity_id` AS `activity_id`,
`a`.`activity_name` AS `activity_name`,

`sa`.`subact_id` AS `subactivity_id`,
`sa`.`subactivity_name` AS `subactivity_name`,
`sa`.`subactivity_code` AS `subactivity_code`,

`t`.`indicator_id` AS `indicator_id`,
`i`.`indicator_name` AS `indicator_name`,
`i`.`indicator_type` AS `indicator_type`,


`t`.`p_id` AS `p_id`
,`t`.`year` AS `year`,
`t`.`baseline` AS `baseline`,
`t`.`pquarter1` AS `pquarter1`,
`t`.`pquarter2` AS `pquarter2`,
`t`.`pquarter3` AS `pquarter3`,
`t`.`pquarter4` AS `pquarter4`,
`t`.`ptotal` AS `ptotal`,

`plt`.`target` AS `projectlifetarget`
 from `tbl_indicator` `i` 
 left join `tbl_annualtarget` `t`  on(`t`.`indicator_id`=`i`.`indicator_id`)
 
 left join `tbl_projectlifetargets` `plt` on((`plt`.`indicator_id` = `t`.`indicator_id`))
 left join tbl_subactivity sa on(sa.subact_id=i.subactivity_id)
 left join tbl_activity a on(a.activity_id=i.activity_id)
 left join tbl_output o on(o.output_id=i.output_id)
 left join tbl_subcomponent s on(s.id=i.subcomponent_id)
 left join tbl_component c on(c.id=i.component_id)
 left join tbl_programme p on(p.prog_id=i.prog_id)

group by t.indicator_id order by `t`.`indicator_id`";
mysql_query($sql) or die(http(2149));;


$x="select * from view_annualTarget where lower(indicator_type) like '".$_SESSION['indicator_type']."%' and lower(subcomponent) like '".strtolower($_SESSION['wpsubcomponent'])."%' && lower(output_name) like '".strtolower($_SESSION['outputAnnualplanning'])."%' && lower(activity_name) like '".$_SESSION['activityAnnualplanning']."%' and lower(subactivity_name) like '".$_SESSION['subactivityAnnualplanning']."%' && year like '".$_SESSION['fyear']."%' and subcomponent_id like '".$_SESSION['usersubcomponent']."%' order by subactivity_code asc";

//$x="select ta.p_id,ta.subactivity_id,ta.baseline,ta.indicator_id,ta.year,i.output_name,i.activity_name,i.subcomponent,i.subactivity_name,i.subactivity_code,i.indicator_name,i.indicator_type,ta.pquarter1,ta.pquarter2,ta.pquarter3,ta.pquarter4,ta.ptotal from tbl_annualtarget ta inner join view_indicator i on(ta.indicator_id=i.indicator_id)  order by indicator_id,year asc";
#$obj->addAlert($x);
$query=mysql_query($x)or die("aBi error-code 1339 because,".mysql_error());
		  if(mysql_num_rows($query)>0)
		  while($row=mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		  $quarter1=($row['pquarter1']!='')?"<td align=right>$row[pquarter1]</td>":"<td align=right>-</td>";
		   $quarter2=($row['pquarter2']!='')?"<td align=right>$row[pquarter2]</td>":"<td align=right>-</td>";
		     $quarter3=($row['pquarter3']!='')?"<td align=right>$row[pquarter3]</td>":"<td align=right>-</td>";
		   $quarter4=($row['pquarter4']!='')?"<td align=right>$row[pquarter4]</td>":"<td align=right>-</td>";
		   $color=$n%2==1?"evenrow":"white";
		  $l="align=right";
$data.="<tr class=$color>

<td align=right>".$n++."</td>
            <td align=left><INPUT type=hidden name='subact_id[]'  id=subact_id value=$row[subact_id] >$row[subactivity_code]</td>
            <td colspan='2'>$row[subactivity_name]</td>
			<td colspan='2' width='200'>$row[indicator_name]</td>
			<td align=right>$base</td>
            ".$quarter1."
    		".$quarter2."
			".$quarter3."
			".$quarter4."
			<td align=right bgcolor='#669900' colspan=2><strong>$row[ptotal]</strong></td>
			
          </tr>";
$inc++;
		  }
		
		//where subcomponent_id='".$_SESSION['wpsubcomponent_id']."' 
		  //group by subactivity_id order by subactivity_id
		//$tot=mysql_fetch_array(mysql_query("select sum(ptotal) as ptotal from tbl_annualtarget where subcomponent_id='".$_SESSION['wpsubcomponent_id']."' group by subactivity_id order by subactivity_id asc "))or die("aBi Error-code 0075 because,".mysql_error());  
		  
	$data.="</table>";
	

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function view_projectLifeFinancialBudget($programme100,$subcomponent100,$output100){
$obj=new xajaxResponse();
$_SESSION['programme100']='';
$_SESSION['subcomponent100']='';
$_SESSION['output100']=''; 

 $_SESSION['programme100']=$programme100;
$_SESSION['subcomponent100']=$subcomponent100;
$_SESSION['output100']=$output100;
#$obj->addAlert($_SESSION['programme100'].'-----'.$_SESSION['subcomponent100'].'----------'.$_SESSION['output100']);
$data="<table >".filter_ProgramResultsProjectLifeFinancialTargets()."
	<th scope='col'>NO</th>
	
	<th scope='col'>output </th>
    <th scope='col'>Sub-component</th>
	<th scope='col'><b align='right'>Budget IN '000' DKK</b></th>
    <th scope='col'><b align='right'>Budget IN '000' UGX</b></th>

  </tr>";
 
  $x="select p.plp_id,p.prog_id,pp.program_name,p.subcomponent_id,p.output_id,p.rate,p.dkk,p.ugx,s.subcomponent,s.subcomponent_code,o.output_name,o.output_code from tbl_projectlifeplanning p inner join tbl_subcomponent s on(s.id=p.subcomponent_id) left join tbl_output o on(p.output_id = o.output_id) inner join tbl_programme pp on(pp.prog_id=p.prog_id) where lower(program_name) like '".strtolower($_SESSION['programme100'])."%'&& subcomponent like '".strtolower($_SESSION['subcomponent100'])."%' and output_name like '".strtolower($_SESSION['output100'])."%' order by o.output_code asc ";
  $query=mysql_query($x)or die("aBi Error Code 0062, because ".mysql_error());
  #$obj->addAlert($x);
  $n=1; $inc=1; $m=1;
  if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
 
    <td>".$n++."</td>
    <td align=left><input type='hidden' name='output_id[]' value='".$row['output_id']."'/>".$row['output_code']." ".$row['output_name']."</td>
    <td>".$row['subcomponent_code']." ".$row['subcomponent']."</td>
    <td align=right>".number_format($row['dkk'])."</td>
	<td align='right' bgcolor='#669900'><b>".number_format($row['ugx'])."</b></td>

  </tr>";
  $inc++;$m++;
  }
  $q=mysql_fetch_array(mysql_query("select p.plp_id,p.prog_id,pp.program_name,p.subcomponent_id,p.output_id,p.rate,p.dkk,p.ugx,s.subcomponent,s.subcomponent_code,o.output_name,o.output_code,sum(dkk) as totaldkk,sum(ugx) as totalugx from tbl_projectlifeplanning p inner join tbl_subcomponent s on(s.id=p.subcomponent_id) left join tbl_output o on(p.output_id = o.output_id) inner join tbl_programme pp on(pp.prog_id=p.prog_id) where lower(program_name) like '".strtolower($_SESSION['programme100'])."%'&& subcomponent like '".strtolower($_SESSION['subcomponent100'])."%' and output_name like '".strtolower($_SESSION['output100'])."%'  group by prog_id order by o.output_code asc"))or die(mysql_error());
  }
  $data.="<tr>
  <th colspan=3>Total</th>
    
    <td align='right' class=evenrow2 ><b align='right'>".number_format($q['totaldkk'])."</b></td>
    <td align='right' class=evenrow2> <b align='right' >".number_format($q['totalugx'])."</b></td>
</TR>";

$data.="</table>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


 function view_annualFinancialMonitoring($subcomponent,$activity,$subactivity,$year){
$obj= new xajaxResponse();
$_SESSION['Resultsubcomponent111']='';
$_SESSION['Resultactivity111']='';
$_SESSION['Resultsubactivity']='';
$year=($year!=='')?$year:date(Y);
$_SESSION['year']=$year;

$_SESSION['Resultsubactivity']=$subactivity;
$_SESSION['Resultactivity111']=$activity;
$_SESSION['Resultsubcomponent111']=$subcomponent;
$data="<table width='100%' border='0'>
 <tr class='evenrow'>
    <td scope='col' colspan=6 align='center'><B>Financial Monitoring Results For ".$_SESSION['year']."</b> </td>
    
    <td scope='col'><a href='export_to_excel_word.php?linkvar=Export Annual Financial Monitoring&&subcomponent=".$_SESSION['Resultsubcomponent111']."&&activity=".$_SESSION['Resultactivity111']."&&subactivity=".$_SESSION['Resultsubactivity']."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></td>
  </tr>
  <tr class='evenrow'>
    <td scope='col' colspan=2>Subcomponent:</td>
    <td scope='col' colspan=3><select name='subcomponent' id='subcomponent'><option value=''>-ALL-</option>";
	$sel=mysql_query("select sc.subcomponent_code,sc.subcomponent,sc.id,aa.activity_code,aa.activity_name,aa.activity_id,s.subactivity_code,s.subactivity_name from tbl_subactivity s inner join tbl_subcomponent sc on(sc.id=s.subcomponent_id) inner join tbl_activity aa on(s.activity_id=aa.activity_id) left join  tbl_annualbudget  a on(a.subactivity_id=s.subact_id) left join tbl_financialactuals fa on(s.subact_id=fa.subactivity_id)  group by sc.id order by sc.subcomponent_code asc ")or die("aBi Error-code 1175 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$selsubcomponent=($_SESSION['Resultsubcomponent111']==$row1['subcomponent'])?"SELECTED":"";
	$data.="<option value='".$row1['subcomponent']."' '".$selsubcomponent."'>".$row1['subcomponent_code']." ".substr($row1['subcomponent'],0,50)."</option>";
	
	
	}
	
	
	$data.="</select></td><td colspan=2></td></tr>
   <tr class='evenrow'>
    <td scope='col' colspan=2>Activity:</td>
    <td scope='col' colspan=3><select name='activity' id='activity'><option value=''>-ALL-</option>";
	$sel=mysql_query("select aa.activity_code,aa.activity_name,aa.activity_id,s.subactivity_code,s.subactivity_name from tbl_subactivity s inner join tbl_activity aa on(s.activity_id=aa.activity_id) left join  tbl_annualbudget  a on(a.subactivity_id=s.subact_id) left join tbl_financialactuals fa on(s.subact_id=fa.subactivity_id)  group by aa.activity_id order by s.subactivity_code  asc ")or die("aBi Error-code 1188 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$selActivity=($_SESSION['Resultactivity111']==$row1['activity_name'])?"SELECTED":"";
	$data.="<option value='".$row1['activity_name']."' '".$selActivity."'>".$row1['activity_code']." ".substr($row1['activity_name'],0,50)."</option>";
	
	
	}
	
	
	$data.="</select></td><td colspan=2></td></tr>
  <tr class='evenrow'>
    <td scope='col' colspan=2>Sub-Activity:</td>
    <td scope='col' colspan=3><select name='subactivity' id='subactivity'><option value=''>-ALL-</option>";
	$sel=mysql_query("select s.subactivity_code,s.subactivity_name from tbl_subactivity s left join  tbl_annualbudget  a on(a.subactivity_id=s.subact_id) left join tbl_financialactuals fa on(s.subact_id=fa.subactivity_id)  group by a.subactivity_id order by s.subactivity_code asc ")or die("aBi Error-code 1201 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$selSubactivity=($_SESSION['Resultsubactivity']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value='".$row1['subactivity_name']."' '".$selSubactivity."'>".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,50)."</option>";
	
	
	}
	
	
	$data.="</select></td>
    <td scope='col'>Year:<select name='year' id='year'><option value=''>-ALL-</option>";
	$yr=date(Y);
	$end=$yr;
	do{
	$sel2=($_SESSION['year']==$end)?"SELECTED":"";
	$data.="<option value='".$end."' '".$sel2."'>".$end."</option>";
	$end--;}while($end>= 2010);
	$data.="</select></td>
    <td scope='col'><input name='search' type='button' value='Go' onclick=\"xajax_view_annualFinancialMonitoring(getElementById('subcomponent').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('year').value)\" /></th>
    
  </tr>
  <tr class='evenrow2'>
    <td scope='col'></td>
    <td scope='col'></td>
    <td scope='col' colspan=2></td>
    <td scope='col' colspan=3 class='black2'>Financial Monitoring Results in '000s'</td>
 
  </tr>
   <tr>
    <th scope='col'>NO</th>
    <th scope='col'>Code</th>
    <th scope='col' colspan=2>Sub - Activity</th>
    <th scope='col'>Planned Expenditure </th>
    <th scope='col'>Actual Expenditure</th>
    <th scope='col' align='right'>% Achieved</th>
  </tr>
  ";
  $n=1;$inc=1;
  $select="select s.subactivity_code,s.subactivity_name,sc.subcomponent,sc.subcomponent_code,sc.id,aa.activity_name,aa.activity_code,aa.activity_id,a.year,fa.subactivity_id,a.ftotal as totalannualtarget,fa.amount as TotalFinancialActualAmount, round(IFNULL(sum(fa.amount),0)/IFNULL(sum(a.ftotal),0)*100,2) as percentageTargetsvsActuals from tbl_subactivity s left join tbl_subcomponent sc on(sc.id=s.subcomponent_id) left join tbl_activity aa on(aa.activity_id=s.activity_id)left join  tbl_annualbudget  a on(a.subactivity_id=s.subact_id) left join tbl_financialactuals fa on(s.subact_id=fa.subactivity_id) where s.subactivity_name like '".$_SESSION['Resultsubactivity']."%' and a.year like '".$_SESSION['year']."%' 
  and subcomponent like '".$_SESSION['Resultsubcomponent111']."%'
  and activity_name like '".$_SESSION['Resultactivity111']."%' group by a.subactivity_id order by s.subactivity_code asc ";
  
#$obj->addAlert($select);
  $QUERY=mysql_query($select)or die("aBi Error-code 1235 because ".mysql_error());
  while($row=mysql_fetch_array($QUERY)){
   $color=$n%2==1?"evenrow":"white";
  $percentageActualsvstargets=($row['percentageTargetsvsActuals']!="")?"<td align='right'>".$row['percentageTargetsvsActuals']."%</td>":"<td align='right'>0%</td>";
   $TotalFinancialActualAmount=($row['TotalFinancialActualAmount']!='')?"<td align='right'>".number_format($row['TotalFinancialActualAmount'])."</td>":"<td align='right'>-</td>";
  $totalannualtarget=($row['totalannualtarget']=='')?"<td align='right'>-</td>":"<td align='right'>".number_format($row['totalannualtarget'])."</td>";
  
  $data.="<tr class=$color>
    <td align='right'>".$n++."</td>
    <td align='right'>".$row['subactivity_code']."</td>
	<td colspan=2>".$row['subactivity_name']."</td>
    ".$totalannualtarget."
   ".$TotalFinancialActualAmount."".
    $percentageActualsvstargets."
    
  </tr>";
  $inc++;
  }
 
$selectTotal="select  a.year,IFNULL(sum(a.ftotal),0) as TotalSumannualtarget,IFNULL(sum(fa.amount),0) as TotalSumFinancialActualAmount from tbl_subactivity s left join  tbl_subcomponent sc on(sc.id=s.subcomponent_id) left join tbl_activity aa on(aa.activity_id=s.activity_id) left join  tbl_annualbudget  a on(a.subactivity_id=s.subact_id) left join tbl_financialactuals fa on(s.subact_id=fa.subactivity_id) where sc.subcomponent like '".$_SESSION['Resultsubcomponent']."%' and aa.activity_name like '".$_SESSION['Resultactivity']."%' and s.subactivity_name like '".$_SESSION['Resultsubactivity']."%' and a.year like '".$_SESSION['year']."%' group by a.year  asc ";
 #$obj->addAlert($select);
  $QUERYTOTAL=mysql_fetch_array(mysql_query($selectTotal))or die(http(1232));
  
  
  $data.="<tr class='evenrow'>
    <td colspan=4><b>Total</b></td>
   
    <td align='right'><b>".number_format($QUERYTOTAL['TotalSumannualtarget'])."</b></td>
    <td align='right'><b>".number_format($QUERYTOTAL['TotalSumFinancialActualAmount'])."</b></td>
   
    <td>&nbsp;</td>
  </tr>
</table>";



$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}
#--------------------view_QuarterlyFinancials---------------------

function view_QuarterlyFinancials($subcomponent,$activity,$subactivity,$year,$quarter){
$obj= new xajaxResponse();
 $_SESSION['Resultsubcomponent']='';
$_SESSION['Resultactivity']='';
$_SESSION['Resultsubactivity']=''; 
$year=($year!=='')?$year:date(Y);
$_SESSION['qyear']=$year;
$_SESSION['Resultsubcomponent']=$subcomponent;
$_SESSION['Resultactivity']=$activity;
$_SESSION['Resultsubactivity']=$subactivity;
$quarter=($quarter!=='')?$quarter:$_SESSION['quarter'];



#$obj->addAlert($_SESSION['Resultsubcomponent']."-----".$_SESSION['Resultactivity']."----".$_SESSION['Resultsubactivity']);
$data="<table width='750' border='0'>
 <tr class='evenrow'>
    <td scope='col' colspan=6 align='center'><B>Quarterly Financial Results For ".$quarter."   ".$year."</b> </td>
    
    <td scope='col'><a href='export_to_excel_word.php?linkvar=Export Quarterly Financial Monitoring&&subcomponent=".$_SESSION['Resultsubcomponent']."&&activity=".$_SESSION['Resultactivity']."&&subactivity=".$_SESSION['Resultsubactivity']."&&year=".$_SESSION['qyear']."&&quarter=".$quarter."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></td>
  </tr>
  ";
  
$data.="
<tr class='evenrow'>
   <td scope='col' colspan=2>Subcomponent</td>
    <td scope='col' colspan='5' ><select name='subcomponent' id='subcomponent112' size='1'>";
   /* if($_SESSION['Resultsubcomponent112']!='')
   $data.="<option value='".$_SESSION['Resultsubcomponent112']."'>".$_SESSION['Resultsubcomponent112']."</option>";
   
   else */
   $data.="<option value=''>-ALL-</option>";
   $query=mysql_query("select * from tbl_subcomponent order by id asc")or die(mysql_error());
   while($rowq=mysql_fetch_array($query)){
  $selsubcomponent=($_SESSION['Resultsubcomponent']==$rowq['subcomponent'])?"SELECTED":"";
   $data.="<option value='".$rowq['subcomponent']."' '".$selsubcomponent."'>".$rowq['subcomponent_code']." ".$rowq['subcomponent']."</option>";
   
   }
   $data.="</select></td></tr>
   <tr>
    
	 <td scope='col' colspan=2 class='evenrow'>Activity:</td>
    <td scope='col' colspan=5 class='evenrow'><select name='activity' id='activity112' size='1'><option value=''>-ALL-</option>";
	 /*  if($_SESSION['Resultactivity112']!='')
   $data.="<option value='".$_SESSION['Resultactivity112']."'>".$_SESSION['Resultactivity112']."</option>";
   
   else */
      $data.="<option value=''>-ALL-</option>";
   $query1=mysql_query("select * from tbl_activity order by activity_code asc")or die(mysql_error());
   while($rowa=mysql_fetch_array($query1)){
    $selActivity=($_SESSION['Resultactivity']==$rowa['activity_name'])?"SELECTED":"";
   $data.="<option value='".$rowa['activity_name']."'  '".$selActivity."'>".$rowa['activity_code']." ".$rowa['activity_name']."</option>";
   
   }
   $data.="</select></td>
    
  </tr>
  <tr>
  <td class='evenrow' colspan=2 >Sub-Activity:</td>
    
	 <td scope='col' colspan=5 class='evenrow'><select name='subactivity' id='subactivity112'><option value=''>-ALL-</option>";
	$sel=mysql_query("select s.subactivity_code,s.subactivity_name from tbl_subactivity s left join  tbl_annualbudget  a on(a.subactivity_id=s.subact_id) left join tbl_financialactuals fa on(s.subact_id=fa.subactivity_id)  group by a.subactivity_id order by s.subact_id asc ")or die("Http Error-code 1096 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$selsubactivity=($_SESSION['Resultsubactivity']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value='".$row1['subactivity_name']."' '".$selsubactivity."'>".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,50)."</option>";
	
	
	}
	
	
	$data.="</select></td>
  
    
  </tr>


<tr class='evenrow'>
   <td scope='col' colspan=2>Quarter</td>
    <td scope='col' colspan=2 ><select name='quarter' id='quarter'>";
	
	 if($quarter!='') $data.="<option value='".$quarter."' '".$selected."'>".$quarter."</option>";
	 $data.="<option value=''>-All-</option>";
	 $data.="<option value='Jan - Mar'>Jan - Mar</option>";
	 $data.="<option value='Apr - Jun'>Apr - Jun</option>";
	 $data.="<option value='Jul - Sep'>Jul - Sep</option>";
	 $data.="<option value='Oct - Dec'>Oct - Dec</option>";
     $data.=" </select></td>
    
	 <td scope='col' >Year</td>
    <td scope='col' colspan=''><select name='year' id='year'>";
	$yr=date(Y);
	$end=$yr;
	do{
	$selYear=($end==$year)?"SELECTED":date(Y);
	$data.="<option value='".$end."' '".$selYear."'>".$end."</option>";
	$end--;}while($end>= 2010);
	$data.="<option value=''>-ALL-</option></select></td>
	
	<td scope='col' colspan=2><input name='search' type='button' value='Go' onclick=\"xajax_view_QuarterlyFinancials(document.getElementById('subcomponent112').value,document.getElementById('activity112').value,document.getElementById('subactivity112').value,document.getElementById('year').value,document.getElementById('quarter').value)\" /></td>
    
  </tr>
 
  ";
  
  
  
  
  $data.=" <tr class='evenrow2'>
  <td scope='col'></td>
    <td scope='col'></td>
    <td scope='col' colspan='2'></td>
    <td scope='col' colspan=3>Quarterly Financials in '000's</td>
 
  </tr>
  <tr>
    <th scope='col'>NO</th>
    <th scope='col'>Code</th>
    <th scope='col' colspan=2>Sub - Activity</th>
    <th scope='col'>Planned Expenditure </th>
    <th scope='col'>Actual Expenditure</th>
    <th scope='col'>% Achieved</th>
  </tr>
 
  ";
  
  if($quarter=='Jan - Mar')$quarterVal="1";
  elseif($quarter=='Apr - Jun')$quarterVal="2";
  elseif($quarter=='Jul - Sep')$quarterVal="3";
  elseif($quarter=='Oct - Dec')$quarterVal="4";
  /*  elseif($quarter=='Closed')$_SESSION['quarter']$quarterVal="1"; */
  else $quarterVal="1";
  $n=1;$inc=1;
$select="select sc.id,sc.subcomponent,sc.subcomponent_code,aa.activity_name,aa.activity_code,s.subactivity_code,s.subactivity_name,a.year,fa.reportingPeriod,s.subact_id,a.fquarter".$quarterVal." as totalannualtarget,fa.amount as TotalFinancialActualAmount, round(IFNULL(sum(fa.amount),0)/IFNULL(sum(a.ftotal),0)*100,2) as percentageTargetsvsActuals from tbl_subactivity s left join  tbl_subcomponent sc on(sc.id=s.subcomponent_id) left join tbl_activity aa on(aa.activity_id=s.activity_id) left join  tbl_annualbudget  a on(a.subactivity_id=s.subact_id) left join tbl_financialactuals fa on(s.subact_id=fa.subactivity_id) where sc.subcomponent like '".$_SESSION['Resultsubcomponent']."%' and aa.activity_name like '".$_SESSION['Resultactivity']."%' and s.subactivity_name like '".$_SESSION['Resultsubactivity']."%' and a.year like '".$year."%' and fa.reportingPeriod like '".$quarter."%' group by s.subactivity_code order by s.subactivity_code asc";
  #$obj->addAlert($select);
  $QUERY=mysql_query($select)or die(http(1226));
  while($row=mysql_fetch_array($QUERY)){
   $color=$n%2==1?"evenrow":"white";
  $percentageActualsvstargets=($row['percentageTargetsvsActuals']!="")?"<td align='right'>".$row['percentageTargetsvsActuals']."%</td>":"<td align='right'>0%</td>";
  $TotalFinancialActualAmount=($row['TotalFinancialActualAmount']=='')?"<td align='right'>0</td>":"<td align='right'>".number_format($row['TotalFinancialActualAmount'])."</td>";
  $totalannualtarget=($row['totalannualtarget']=='')?"<td align='right'>0</td>":"<td align='right'>".number_format($row['totalannualtarget'])."</td>";
  $data.="<tr class=$color>
    <td align='right'>".$n++."</td>
    <td align='right'>".$row['subactivity_code']."</td>
	<td colspan=2>".$row['subactivity_name']."</td>
    ".$totalannualtarget."
    ".$TotalFinancialActualAmount."".
    $percentageActualsvstargets."
    
  </tr>";
  $inc++;
  }
  #sc.subcomponent like '".$_SESSION['Resultsubcomponent']."%' and aa.activity_name like '".$_SESSION['Resultactivity']."%' and s.subactivity_name like '".$_SESSION['Resultsubactivity']."%' and  fa.year like '".$_SESSION['fyear']."%' and fa.reportingPeriod like '".$quarter."%'
  $selectTotal="select a.year,fa.reportingPeriod,s.subact_id,IFNULL(sum(a.fquarter".$quarterVal."),0) as TotalSumannualtarget,IFNULL(sum(fa.amount),0) as TotalSumFinancialActualAmount  from tbl_subactivity s left join  tbl_subcomponent sc on(sc.id=s.subcomponent_id) left join tbl_activity aa on(aa.activity_id=s.activity_id) left join  tbl_annualbudget  a on(a.subactivity_id=s.subact_id) left join tbl_financialactuals fa on(s.subact_id=fa.subactivity_id) where sc.subcomponent like '".$_SESSION['Resultsubcomponent']."%' and aa.activity_name like '".$_SESSION['Resultactivity']."%' and s.subactivity_name like '".$_SESSION['Resultsubactivity']."%' and a.year like '".$year."%' and fa.reportingPeriod like '".$quarter."%' group by fa.year,fa.reportingPeriod  asc ";
  #,fa.reportingPeriod
  $queryTotal1=mysql_query($selectTotal) or die("No Actual found For ".$quarter." ".$year." Quarter!");
 # $obj->addAlert($selectTotal);
 $QUERYTOTAL=mysql_fetch_array($queryTotal1)or die("No Actual found For ".$quarter." ".$year." Quarter!");
  
  
  $data.="<tr class='evenrow'>
    <td colspan=4><b>Total</b></td>
   
    <td align='right'><b>".number_format($QUERYTOTAL['TotalSumannualtarget'])."</b></td>
    <td align='right'><b>".number_format($QUERYTOTAL['TotalSumFinancialActualAmount'])."</b></td>
   
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>";


$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}



function view_DCEDannualPhysicalMonitoring($subcomponent,$output,$activity,$subactivity,$year){
$obj= new xajaxResponse();
$_SESSION['Resultsubcomponent']=$subcomponent;
$_SESSION['Resultsoutput']=$output;
$_SESSION['Resultactivity']=$activity;
$_SESSION['Resultsubactivity1']=$subactivity;
$_SESSION['PMyear']=($year!=0)?$year:date(Y);
$data.="<table width='600' border='0'>
".filter_DCEDannualPhysicalMonitoring()."
  <tr>
    <th scope='col'>NO</th>
	<th scope='col'>INTERVENTION</th>
    <th scope='col'>Indicator</th>
    <th scope='col' align='right'>Target(M)</th>
	 <th scope='col' align='right'>Target (F)</th>
	<th scope='col' align='right'>Target (Other)</th>
	 <th scope='col' align='right'>Actual (M)</th> 
	 <th scope='col' align='right'>Actual (F)</th>
	     <th scope='col' align='right'>Actual (Other)</th>

	 <th scope='col' align='right'>% Achieved</th>
  </tr>";
  $n=1;$inc=1;

  
  $xx1="select i.indicator_id,sc.id as subcomponent_id,sc.subcomponent_code,sc.subcomponent,i.indicator_name,i.indicator_type,r.year,intv.intervention_id,intv.intervention,i.gender,

sum(if((i.gender='Adult Male') or (i.gender='Male Youth')  ,at.ptotal,'')) as TotalAnnualMaletargets,
sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),r.total,'')) as TotalMaleAnnualActuals,
round(IFNULL(sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),r.total,'')),0)/IFNULL(sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),at.ptotal,'')),0)*100,2) as percentageMaleAnnualActualvsTargets,

sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),at.ptotal,'')) as TotalAnnualFemaleTargets,
sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')) as TotalFemaleAnnualActuals,
round((IFNULL(sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')),0)/IFNULL(sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),at.ptotal,'')),0))*100,2) as percentageFemaleAnnualActualvsTargets ,
sum(if((i.gender=''),at.ptotal,'')) as otherTotalAnnualTargets,
sum(if((i.gender=''),r.total,'')) as otherTotalAnnualActuals,
round((IFNULL(sum(if((i.gender=''),r.total,'')),0)/IFNULL(sum(if((i.gender=''),at.ptotal,'')),0))*100,2) as percentageOtherAnnualActualvsTargets
,sum(at.ptotal) as totalAnnualtarget,
sum(r.total) as TotalAnnualActuals,
round(IFNULL(sum(r.total),0)/IFNULL(sum(at.ptotal),0)*100,2) as percentageActualvsTargets
from tbl_indicator i left join tbl_annualTarget at on(i.indicator_id=at.indicator_id)
 left join tbl_intervention intv on(i.intervention_id=intv.intervention_id)
  left join tbl_subcomponent sc on(sc.id=i.subcomponent_id)
   left join  tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
    where r.year like '".$year."%' and intv.intervention like '".$_SESSION['intervention']."%' 
	 and sc.subcomponent like '".$_SESSION['Resultsubcomponent']."%' 
	  && i.indicator_type like 'DCED Based%'  group by i.indicator_id,r.year order by intv.intervention asc";


#where r.year like '".$year."' and s.subactivity_name like '".$_SESSION['Resultsubactivity1']."' 
$QUERY1=mysql_query($xx1)or die("aBi Error-code 1164 because,".mysql_error());
 #$obj->addAlert($xx1);
  while($row=mysql_fetch_array($QUERY1)){
  $TotalAnnualMaletargets=($row['TotalAnnualMaletargets']!=0)?"<td align='right'>".$row['TotalAnnualMaletargets']."</td>":"<td align='right'>-</td>";
  $TotalMaleAnnualActuals=($row['TotalMaleAnnualActuals']!=0)?"<td align='right'>".$row['TotalMaleAnnualActuals']."</td>":"<td align='right'>-</td>";
  
  $percentageOtherAnnualActualvsTargets=($row['percentageOtherAnnualActualvsTargets']!='')?"<td align='right'>".$row['percentageOtherAnnualActualvsTargets']."%</td>":"<td align='right'>0%</td>";
  
  
  $TotalAnnualFemaleTargets=($row['TotalAnnualFemaleTargets']!=0)?"<td align='right'>".$row['TotalAnnualFemaleTargets']."</td>":"<td align='right'>-</td>";
  $TotalFemaleAnnualActuals=($row['TotalFemaleAnnualActuals']!=0)?"<td align='right'>".$row['TotalFemaleAnnualActuals']."</td>":"<td align='right'>-</td>";
  $percentageFemaleAnnualActualvsTargets=($row['percentageFemaleAnnualActualvsTargets']!='')?"<td align='right'>".$row['percentageFemaleAnnualActualvsTargets']."%</td>":"<td align='right'>0%</td>";
  
  $otherTotalAnnualTargets=($row['otherTotalAnnualTargets']!=0)?"<td align='right'>".$row['otherTotalAnnualTargets']."</td>":"<td align='right'>-</td>";
   $otherTotalAnnualActuals=($row['otherTotalAnnualActuals']!=0)?"<td align='right'>".$row['otherTotalAnnualActuals']."</td>":"<td align='right'>-</td>";
   $percentageMaleAnnualActualvsTargets=($row['percentageMaleAnnualActualvsTargets']!='')?"<td align='right'>".$row['percentageMaleAnnualActualvsTargets']."%</td>":"<td align='right'>0%</td>";
  
  $tt=$row['percentageMaleAnnualActualvsTargets']+$row['percentageFemaleAnnualActualvsTargets']+$row['percentageOtherAnnualActualvsTargets'];
  $percentageTotal=($tt!='')?"<td align='right' class='black2'>".$tt."%</td>":"<td  class='black2' align='right'>0%</td>";
     $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
    <td>".$n++."</td>
    <td>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
    <td>".$row['indicator_name']."</td>
    ".$TotalAnnualMaletargets."
	".$TotalAnnualFemaleTargets."
	".$otherTotalAnnualTargets."
   ".$TotalMaleAnnualActuals."
   ".$TotalFemaleAnnualActuals."
   ".$otherTotalAnnualActuals." ".$percentageTotal." 
  </tr>";
  $inc++;
  }
  $data.="<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
</table>";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;

}



function view_annualPhysicalMonitoring($subcomponent,$output,$activity,$subactivity,$year){
$obj= new xajaxResponse();
$_SESSION['Resultsubcomponent']=$subcomponent;
$_SESSION['Resultsoutput']=$output;
$_SESSION['Resultactivity']=$activity;
$_SESSION['Resultsubactivity1']=$subactivity;
$_SESSION['PMyear']=($year!=0)?$year:$_SESSION['ABIActiveyear'];
$data.="<table width='600' border='0'>
".filter_annualPhysicalMonitoring()."
  <tr>
    <th scope='col'>NO</th>
	<th scope='col'>Sub-Activity</th>
    <th scope='col'>Indicator</th>
    <th scope='col' align='right'>Target(M)</th>
	 <th scope='col' align='right'>Target (F)</th>
	<th scope='col' align='right'>Target (Other)</th>
	 <th scope='col' align='right'>Actual (M)</th> 
	 <th scope='col' align='right'>Actual (F)</th>
	     <th scope='col' align='right'>Actual (Other)</th>

	 <th scope='col' align='right'>% Achieved</th>
  </tr>";
  $n=1;$inc=1;

  
  $xx1_backup="select i.indicator_id,sc.id as subcomponent_id,sc.subcomponent_code,sc.subcomponent,o.output_id,o.output_code,o.output_name,
  a.activity_id,a.activity_code,a.activity_name,i.indicator_name,r.year,s.subact_id,
  s.subactivity_code,s.subactivity_name,i.gender,

max(if((i.gender='Adult Male') or (i.gender='Male Youth')  ,at.ptotal,'')) as TotalAnnualMaletargets,
sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),r.total,'')) as TotalMaleAnnualActuals,
round(IFNULL(sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),r.total,'')),0)/IFNULL(max(if((i.gender='Adult Male') or (i.gender='Male Youth'),at.ptotal,'')),0)*100,2) as percentageMaleAnnualActualvsTargets,

max(if((i.gender='Adult Female') or (i.gender='Female Youth'),at.ptotal,'')) as TotalAnnualFemaleTargets,
sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')) as TotalFemaleAnnualActuals,
round((IFNULL(sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')),0)/IFNULL(max(if((i.gender='Adult Female') or (i.gender='Female Youth'),at.ptotal,'')),0))*100,2) as percentageFemaleAnnualActualvsTargets ,
max(if((i.gender=''),at.ptotal,'')) as otherTotalAnnualTargets,
sum(if((i.gender=''),r.total,'')) as otherTotalAnnualActuals,
round((IFNULL(sum(if((i.gender=''),r.total,'')),0)/IFNULL(max(if((i.gender=''),at.ptotal,'')),0))*100,2) as percentageOtherAnnualActualvsTargets
,max(at.ptotal) as totalAnnualtarget,
sum(r.total) as TotalAnnualActuals,
round(IFNULL(sum(r.total),0)/IFNULL(max(at.ptotal),0)*100,2) as percentageActualvsTargets
from tbl_indicator i inner join tbl_annualTarget at on(i.indicator_id=at.indicator_id)
 left join tbl_subactivity s on(i.subactivity_id=s.subact_id) 
 left join tbl_subcomponent sc on(sc.id=i.subcomponent_id) 
 left join tbl_output o on(o.output_id=i.output_id) 
 left join tbl_activity a on(a.activity_id=i.activity_id)
  left join  tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
   where r.year like '".$year."%' and s.subactivity_name
    like '".$_SESSION['Resultsubactivity1']."%'  and sc.subcomponent 
	like '".$_SESSION['Resultsubcomponent']."%' and o.output_name like '".$_SESSION['Resultsoutput']."%'
	 and a.activity_name like '".$_SESSION['Resultactivity']."%'
	  and sc.id like '".$_SESSION['usersubcomponent']."%'
	   group by i.indicator_id,r.year order by subactivity_code asc";


//====creating view_fro results and actual retrirving=======================
 $x=" create or replace view view_annualresults as select s.subact_id,s.subactivity_name,s.subactivity_code,i.indicator_id,i.subcomponent_id,i.indicator_name,r.year,
   		sum(r.total) as TotalAnnualActuals
  		from tbl_indicator i
		inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
		
    	left join tbl_organization o on(o.org_code=r.org_code)
		left join tbl_subactivity s on(s.subact_id=i.subactivity_id)
		
		where i.subcomponent_id='".$_SESSION['usersubcomponent']."' 
		AND  r.year like '".$_SESSION['PMyear']."%' 
		 group by i.indicator_id,r.year
  		order by r.reportingPeriod,i.indicator_name asc";
		@mysql_query($x)or die(http("3053"));
//=================================================================================
@mysql_query("create or replace view view_annualPhysicalmonitoring as select i.indicator_id,sc.id as subcomponent_id,sc.subcomponent_code,sc.subcomponent,o.output_id,o.output_code,o.output_name,
a.activity_id,a.activity_code,a.activity_name,i.indicator_name,r.year,
s.subact_id,s.subactivity_code,s.subactivity_name,i.gender,
sum(if((i.gender='Adult Male') or (i.gender='Male Youth'),r.total,'')) as TotalMaleAnnualActuals,
sum(if((i.gender='Adult Female') or (i.gender='Female Youth'),r.total,'')) as TotalFemaleAnnualActuals,
sum(if((i.gender=''),r.total,'')) as otherTotalAnnualActuals,
sum(r.total) as TotalAnnualActuals
from tbl_indicator i
 LEFT join tbl_subactivity s on(i.subactivity_id=s.subact_id) 
 LEFT join tbl_subcomponent sc on(sc.id=i.subcomponent_id) 
 LEFT join tbl_output o on(o.output_id=i.output_id) 
 LEFT join tbl_activity a on(a.activity_id=i.activity_id) 
 LEFT join  tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
  where r.year like '%' and s.subactivity_name like '%'
    and sc.subcomponent like '%' 
	and o.output_name like '%' 
	and a.activity_name like '%' 
	and sc.id like '%'  
	group by i.indicator_id,r.year order by subactivity_code,i.indicator_name asc")or die(http("3056"));
//=================================================================================
	@mysql_query("create or replace view view_annualphysicalMonitoringTargets as SELECT i.indicator_id, i.indicator_name, i.gender, at.year, max( if( (
i.gender = 'Adult Male')OR(i.gender = 'Male Youth'), at.ptotal,'')) AS TotalAnnualMaletargets,
 max(if((i.gender='Adult Female')OR(i.gender = 'Female Youth'),at.ptotal,'')) AS TotalAnnualFemaleTargets,
  max(if((i.gender=''), at.ptotal,'')) AS otherTotalAnnualTargets,
  max(at.ptotal) AS totalAnnualtarget
FROM tbl_indicator i
LEFT JOIN tbl_annualTarget at ON ( i.indicator_id = at.indicator_id )
GROUP BY i.indicator_id,at.year ORDER BY i.indicator_name ASC")or die(http("3056"));
//==================================================================================

$xx1="select i.indicator_id,i.subcomponent_id,i.subcomponent_code,i.subcomponent,i.output_id,i.output_code,i.output_name,
i.activity_id,i.activity_code,i.activity_name,i.indicator_name,i.year,
i.subact_id,i.subactivity_code,i.subactivity_name,i.gender,
at.TotalAnnualMaletargets,
i.TotalMaleAnnualActuals,
round(IFNULL(i.TotalMaleAnnualActuals,0)/IFNULL(at.TotalAnnualMaletargets,0)*100,2) as percentageMaleAnnualActualvsTargets,

at.TotalAnnualFemaleTargets,
i.TotalFemaleAnnualActuals,
round((IFNULL(i.TotalFemaleAnnualActuals,0)/IFNULL(at.TotalAnnualFemaleTargets,0))*100,2) as percentageFemaleAnnualActualvsTargets,
at.otherTotalAnnualTargets,
i.otherTotalAnnualActuals,
round(IFNULL(i.otherTotalAnnualActuals,0)/IFNULL(at.otherTotalAnnualTargets,0)*100,2) as percentageOtherAnnualActualvsTargets
,at.totalAnnualtarget,
i.TotalAnnualActuals,
round(IFNULL(i.TotalAnnualActuals,0)/IFNULL(at.totalAnnualtarget,0)*100,2) as percentageActualvsTargets
from view_annualPhysicalmonitoring i left join view_annualphysicalMonitoringTargets at on(i.indicator_id=at.indicator_id)
  where i.year like '".$year."%' and i.subactivity_name like '".$_SESSION['Resultsubactivity1']."%'
    and i.subcomponent like '".$_SESSION['Resultsubcomponent']."%' 
	and i.output_name like '".$_SESSION['Resultsoutput']."%' 
	and i.activity_name like '".$_SESSION['Resultactivity']."%' 
	and i.subcomponent_id like '".$_SESSION['usersubcomponent']."%'  
	group by i.indicator_id,i.year order by i.subactivity_code,i.indicator_name asc";



#where r.year like '".$year."' and s.subactivity_name like '".$_SESSION['Resultsubactivity1']."' 
$QUERY1=mysql_query($xx1)or die("aBi Error-code 1164 because,".mysql_error());
 ///$obj->addAlert($xx1);
  while($row=mysql_fetch_array($QUERY1)){
  $TotalAnnualMaletargets=($row['TotalAnnualMaletargets']<>0)?"<td align='right'>".$row['TotalAnnualMaletargets']."</td>":"<td align='right'>-</td>";
  $TotalMaleAnnualActuals=($row['TotalMaleAnnualActuals']<>0)?"<td align='right'>".$row['TotalMaleAnnualActuals']."</td>":"<td align='right'>-</td>";
  
  $percentageOtherAnnualActualvsTargets=($row['percentageOtherAnnualActualvsTargets']<>'')?"<td align='right'>".$row['percentageOtherAnnualActualvsTargets']."%</td>":"<td align='right'>0%</td>";
  
  
  $TotalAnnualFemaleTargets=($row['TotalAnnualFemaleTargets']<>0)?"<td align='right'>".$row['TotalAnnualFemaleTargets']."</td>":"<td align='right'>-</td>";
  $TotalFemaleAnnualActuals=($row['TotalFemaleAnnualActuals']<>0)?"<td align='right'>".$row['TotalFemaleAnnualActuals']."</td>":"<td align='right'>-</td>";
  $percentageFemaleAnnualActualvsTargets=($row['percentageFemaleAnnualActualvsTargets']!='')?"<td align='right'>".$row['percentageFemaleAnnualActualvsTargets']."%</td>":"<td align='right'>0%</td>";
  
  $otherTotalAnnualTargets=($row['otherTotalAnnualTargets']<>0)?"<td align='right'>".$row['otherTotalAnnualTargets']."</td>":"<td align='right'>-</td>";
   $otherTotalAnnualActuals=($row['otherTotalAnnualActuals']<>0)?"<td align='right'>".$row['otherTotalAnnualActuals']."</td>":"<td align='right'>-</td>";
   $percentageMaleAnnualActualvsTargets=($row['percentageMaleAnnualActualvsTargets']<>'')?"<td align='right'>".$row['percentageMaleAnnualActualvsTargets']."%</td>":"<td align='right'>0%</td>";
  
  $tt=$row['percentageMaleAnnualActualvsTargets']+$row['percentageFemaleAnnualActualvsTargets']+$row['percentageOtherAnnualActualvsTargets'];
  $percentageTotal=($tt!='')?"<td align='right' class='black2'>".$tt."%</td>":"<td  class='black2' align='right'>0%</td>";
     $color=$n%2==1?"evenrow":"white";
	 $div="status".$row['indicator_id'];
  $data.="<tr class=$color>
    <td>".$n++."</td>
    <td>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
    <td><a href='#' onclick=\"xajax_view_annualorganizationsReported('".$row['indicator_id']."','".$_SESSION['PMyear']."','".$div."','".$row['id']."');return false;\" >$row[indicator_name]</a>
    ".$TotalAnnualMaletargets."
	".$TotalAnnualFemaleTargets."
	".$otherTotalAnnualTargets."
   ".$TotalMaleAnnualActuals."
   ".$TotalFemaleAnnualActuals."
   ".$otherTotalAnnualActuals." ".$percentageTotal." 
  </tr><tr><td colspan=3></td><td colspan='6'><div id='$div'></div></td></tr>";
  //onclick=\"xajax_view_annualorganizationsReported('".$row['indicator_id']."','".$_SESSION['PMyear']."','".$div."','".$row['id']."');return false;\"
  $inc++;
  }
  $data.="<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
  </tr>
</table>";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;

}


function view_annualorganizationsReported($indicator_id,$year,$div,$subcomponent){
$obj= new xajaxResponse();
$date=$_SESSION['ABIActiveyear'];
$year=($year!='')?$year:$date;
$_SESSION['year106']=$year;
$data="<table width='600'><tr class='evenrow2'><td>No</td><td>Name</td><td colspan=2>Indicator</td><td>Quarter</td><td>Actual Value</td></tr>";

 $sql="select i.indicator_id,i.indicator_name,i.subcomponent_id,s.subcomponent_code,s.subcomponent,r.org_code,o.orgName,r.reportingPeriod,r.year,
   r.total as TotalAnnualActuals
  
   from tbl_indicator i inner join tbl_organizationreporting r 
   on(i.indicator_id=r.indicator_id) 
   inner join tbl_subcomponent s on(s.id=i.subcomponent_id) 
   left join tbl_organization o on(o.org_code=r.org_code)
	where  r.year like '".$year."%' 
	and  i.indicator_id='".$indicator_id."'
  	order by r.reportingPeriod,i.indicator_name asc"; 
		//$obj->addAlert($sql);
			$x=1;
		$query=mysql_query($sql)or die(http("3170"));
   while($row=mysql_fetch_array($query)){ 
    $color=$n%2==1?"evenrow":"white";
   $rep=($row['orgName']==NULL)?"<strong>".$row['subcomponent']." Manager </strong>":$row['orgName'];
   
$data.="<tr bgcolor='#f0e5a5'><td>".$x++."</td><td>".$rep."</td><td colspan=2>".$row['indicator_name']."</td><td>".$row['reportingPeriod']."</td><td align='right'>".$row['TotalAnnualActuals']."</td></tr>";

}
$sql2="select i.indicator_id,i.indicator_name,r.year,
   sum(r.total) as AnnualActuals
  
   from tbl_indicator i 
   inner join tbl_organizationreporting r 
   on(i.indicator_id=r.indicator_id) 
   left join tbl_organization o on(o.org_code=r.org_code)
where
r.year like '".$year."%' 
and  i.indicator_id='".$indicator_id."' group by i.indicator_id,r.year
  order by r.reportingPeriod,i.indicator_name asc";
  $QX=mysql_query($sql2)or die(http("3189"));
  if(mysql_num_rows($QX)>0){
$tot=mysql_fetch_array(mysql_query($sql2))or die(http(4449));
$data.="<tr class='evenrow2'><td colspan=5>Total </td><td align='right'>".$tot['AnnualActuals']."</td></tr>";
}
else{
$data.="<tr class=''><td colspan=7>".noResultsFound()."</td></tr>";
}
$data.="</table>";

$obj->assign($div,'innerHTML',$data);
return $obj;
}







function view_projectLifeTargets(){
$obj=new xajaxResponse();

$obj->assign('bodyDisplay','innerHTML',noteMsg('Under Construction'));
return $obj;
}



function view_QuarterlyPhysicalSubcomponentResults($subcomponent,$year){

$obj=new xajaxResponse();
$year=($year!=0)?$year:date(Y);
$data="<table width='971' border='0'>
  <tr>
    <th scope='col'>NO</th>
    <th scope='col'>SUBCOMPONENT</th>
    <th scope='col'>TARGET <br/> (M)</th>
    <th scope='col'>ACTUAL  <br/>(M)</th>
    <th scope='col'>% (F)
    <BR/>ACHIEVED</th>
    <th scope='col'>TARGET <br/> (F)</th>
    <th scope='col'>ACTUAL <br/> (F)</th>
    <th scope='col'><p>% (F)<BR/>
      ACHIEVED</th>
    <th scope='col'>TARGET<BR/>
   (OTHER)</th>
    <th scope='col'>ACTUAL<br/>( OTHER)</th>
    <th scope='col'>% (OTHER)<BR/>
    ACHIEVED</th>
    <th scope='col'>OVERAL<BR/> 
	TOTAL %  <br/>ACHIEVED 
    </th>
  </tr>";
  
  $select="select subcomponent_id,subcomponent_code,subcomponent, ReportingYear,gender,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')),0),2)*100 AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')) as targetQtrFemale,
	SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')),0),2)*100 AS percentageFemaleAchieved,
	sum(if((gender=''),`targetQ1`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,''))  as TotalOtherActual,
	round(IFNULL(SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ1`,'')),0),2)*100 AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '".$year."'  group by subcomponent_id,ReportingYear order by subcomponent_code asc";
	$n=1;
	$inc=1;
	
  $query=mysql_query($select)or die(mysql_error());
  while($rowsc=mysql_fetch_array($query)){
  $color=$n%2==1?"evenrow":"white";
 $div="subcomponent".$rowsc['subcomponent_id']."";
 #$obj->addAlert($div);
 $targetQtrMale=($rowsc['targetQtrMale']!='')?"<td align='right'>".$rowsc['targetQtrMale']."</td>":"<td align='right'>-</td>";
 $TotalMaleActual=($rowsc['TotalMaleActual']!='')?"<td align='right'>".$rowsc['TotalMaleActual']."</td>":"<td align='right'>-</td>";
 $percentageMaleAchieved=($rowsc['percentageMaleAchieved']!='')?"<td align='right'>".$rowsc['percentageMaleAchieved']."%</td>":"<td align='right'>0%</td>";
 $targetQtrFemale=($rowsc['targetQtrFemale']!='')?"<td align='right'>".$rowsc['targetQtrFemale']."</td>":"<td align='right'>-</td>";
 $TotalFemaleActual=($rowsc['TotalFemaleActual']!='')?"<td align='right'>".$rowsc['TotalFemaleActual']."</td>":"<td align='right'>-</td>";
 $percentageFemaleAchieved=($rowsc['percentageFemaleAchieved']!='')?"<td align='right'>".$rowsc['percentageFemaleAchieved']."%</td>":"<td align='right'>0%</td>";
 $targetQtrOther=($rowsc['targetQtrOther']!='')?"<td align='right'>".$rowsc['targetQtrOther']."</td>":"<td align='right'>-</td>";
$TotalOtherActual=($rowsc['TotalOtherActual']!='')?"<td align='right'>".$rowsc['TotalOtherActual']."</td>":"<td align='right'>-</td>";
 $percentageOtherAchieved=($rowsc['percentageOtherAchieved']!='')?"<td align='right'>".$rowsc['percentageOtherAchieved']."%</td>":"<td align='right'>0%</td>";
 
 $p=$rowsc['percentageOtherAchieved']+$rowsc['percentageFemaleAchieved']+$rowsc['percentageMaleAchieved'];
 
 $percentageOverallTotal=($p!=0)?"<td align=right>".$p."%<b></td>":"<td align='right'>0%</td>";
  $data.=" <tr class=$color class='black2'>
    <td>".$n++."</td>
    <td><a href='#View Outputs' class='black2' onclick=\"xajax_view_QuarterlyPhysicalOutputResults('".$rowsc['subcomponent_id']."','".$year."','".$div."')\">".$rowsc['subcomponent_code']." ".$rowsc['subcomponent']."</a></td>
    ".$targetQtrMale."
   ".$TotalMaleActual."
  ".$percentageMaleAchieved."
".$targetQtrFemale."
".$TotalFemaleActual."
  ".$percentageFemaleAchieved."
	".$targetQtrOther."
    ".$TotalOtherActual."
    ".$percentageOtherAchieved."
	".$percentageOverallTotal."
  </tr><tr>
    <td colspan=12><div id='".$div."'></div></td>
    
  </tr>";
  $inc++;
  }
  

  
$data.="</table>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

function view_QuarterlyPhysicalOutputResults($subcomponent_id,$year,$div){
$obj=new xajaxResponse();
#$obj->addAlert($subcomponent_id);
$year=($year!=0)?$year:date(Y);
$data="<table width='971' border='0'>
  <tr>
    <th scope='col'>NO</th>
    <th scope='col'>OUTPUT</th>
    <th scope='col'>TARGET <br/> (M)</th>
    <th scope='col'>ACTUAL  <br/>(M)</th>
    <th scope='col'>% (F)
    <BR/>ACHIEVED</th>
    <th scope='col'>TARGET <br/> (F)</th>
    <th scope='col'>ACTUAL <br/> (F)</th>
    <th scope='col'><p>% (F)<BR/>
      ACHIEVED</th>
    <th scope='col'>TARGET<BR/>
   (OTHER)</th>
    <th scope='col'>ACTUAL<br/>( OTHER)</th>
    <th scope='col'>% (OTHER)<BR/>
    ACHIEVED</th>
    <th scope='col'>OVERAL<BR/> 
	TOTAL %  <br/>ACHIEVED 
    </th>
  </tr>";
  
  $select1="select output_id,subcomponent_id,output_code,output_name,ReportingYear,gender,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')),0),2)*100 AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')) as targetQtrFemale,
	SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')),0),2)*100 AS percentageFemaleAchieved,
	sum(if((gender=''),`targetQ1`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,''))  as TotalOtherActual,
	round(IFNULL(SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ1`,'')),0),2)*100 AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '".$year."' and subcomponent_id='".$subcomponent_id."'  group by output_id,ReportingYear order by output_code asc";
	$n=1;
	$inc=1;
  $query1=mysql_query($select1)or die(mysql_error());
  while($rowo=mysql_fetch_array($query1)){
  $color=$n%2==1?"evenrow":"white";
 
 $div1="output".$rowsc['output_id']."";
 $targetQtrMale=($rowo['targetQtrMale']!='')?"<td align='right'>".$rowo['targetQtrMale']."</td>":"<td align='right'>-</td>";
 $TotalMaleActual=($rowo['TotalMaleActual']!='')?"<td align='right'>".$rowo['TotalMaleActual']."</td>":"<td align='right'>-</td>";
 $percentageMaleAchieved=($rowo['percentageMaleAchieved']!='')?"<td align='right'>".$rowo['percentageMaleAchieved']."%</td>":"<td align='right'>0%</td>";
 $targetQtrFemale=($rowo['targetQtrFemale']!='')?"<td align='right'>".$rowo['targetQtrFemale']."</td>":"<td align='right'>-</td>";
 $TotalFemaleActual=($rowo['TotalFemaleActual']!='')?"<td align='right'>".$rowo['TotalFemaleActual']."</td>":"<td align='right'>-</td>";
 $percentageFemaleAchieved=($rowo['percentageFemaleAchieved']!='')?"<td align='right'>".$rowo['percentageFemaleAchieved']."%</td>":"<td align='right'>0%</td>";
 $targetQtrOther=($rowo['targetQtrOther']!='')?"<td align='right'>".$rowo['targetQtrOther']."</td>":"<td align='right'>-</td>";
$TotalOtherActual=($rowo['TotalOtherActual']!='')?"<td align='right'>".$rowo['TotalOtherActual']."</td>":"<td align='right'>-</td>";
 $percentageOtherAchieved=($rowo['percentageOtherAchieved']!='')?"<td align='right'>".$rowo['percentageOtherAchieved']."%</td>":"<td align='right'>0%</td>";
 
 $p=$rowo['percentageOtherAchieved']+$rowo['percentageFemaleAchieved']+$rowo['percentageMaleAchieved'];
 
 $percentageOverallTotal=($p!=0)?"<td align=right>".$p."%<b></td>":"<td align='right'>0%</td>";
  $data.=" <tr class=$color >
    <td>".$n++."</td>
    <td><a href='#' onclick=\"xajax_view_QuarterlyPhysicalActivityResults('".$rowo['output_id']."','".$year."','".$div1."')\">".$rowo['output_code']." ".$rowo['output_name']."</a></td>
    ".$targetQtrMale."
   ".$TotalMaleActual."
  ".$percentageMaleAchieved."
".$targetQtrFemale."
".$TotalFemaleActual."
  ".$percentageFemaleAchieved."
	".$targetQtrOther."
    ".$TotalOtherActual."
    ".$percentageOtherAchieved."
	".$percentageOverallTotal."
  </tr><tr>
    <td colspan=12><div id='$div1'></div></td>
    
  </tr>";
  $inc++;
  }
  

  
$data.="</table>";
$obj->assign($div,'innerHTML',$data);
return $obj;
}


function view_QuarterlyPhysicalActivityResults($output_id,$year,$div1){
$obj=new xajaxResponse();
#$obj->addAlert($subcomponent_id);
$year=($year!=0)?$year:date(Y);
$data="<table width='971' border='0'>
  <tr CLASS='evenrow2'>
    <td scope='col'>NO</td>
    <td scope='col'>ACTIVITY</td>
    <td scope='col'>TARGET <br/> (M)</td>
    <td scope='col'>ACTUAL  <br/>(M)</td>
    <td scope='col'>% (F)
    <BR/>ACHIEVED</td>
    <td scope='col'>TARGET <br/> (F)</td>
    <td scope='col'>ACTUAL <br/> (F)</td>
    <td scope='col'><p>% (F)<BR/>
      ACHIEVED</td>
    <td scope='col'>TARGET<BR/>
   (OTHER)</td>
    <td scope='col'>ACTUAL<br/>( OTHER)</td>
    <td scope='col'>% (OTHER)<BR/>
    ACHIEVED</td>
    <td scope='col'>OVERAL<BR/> 
	TOTAL %  <br/>ACHIEVED 
    </td>
  </tr>";
  
  $select2="select output_id,subcomponent_id,activity_code,activity_name,ReportingYear,gender,
	sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')) as targetQtrMale,
	SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,''))  as TotalMaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and((gender='Adult Male')or(gender='Male Youth')))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Male') or (gender='Male Youth')  ,`targetQ1`,'')),0),2)*100 AS percentageMaleAchieved,
	sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')) as targetQtrFemale,
	SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,''))  as TotalFemaleActual,
	round(IFNULL(SUM(if((((reportingPeriod='Jan - Mar') and( (gender='Adult Female')or(gender='Female Youth') ))),totalActual,'')),0)/IFNULL(sum(if((gender='Adult Female') or (gender='Female Youth'),`targetQ1`,'')),0),2)*100 AS percentageFemaleAchieved,
	sum(if((gender=''),`targetQ1`,'')) as targetQtrOther,
	SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,''))  as TotalOtherActual,
	round(IFNULL(SUM(if(((reportingPeriod='Jan - Mar') and(gender='')),totalActual,'')),0)/IFNULL(sum(if((gender=''),`targetQ1`,'')),0),2)*100 AS percentageOtherAchieved
	from view_indicator_target_actual where ReportingYear = '".$year."' and output_id='".$output_id."'  group by activity_id,ReportingYear order by activity_code asc";
	$n=1;
	$inc=1;
  $query2=mysql_query($select2)or die(mysql_error());
  while($rowa=mysql_fetch_array($query2)){
  $color=$n%2==1?"evenrow":"white";
 
 
 $div2="activity".$rowsc['activity_id']."";
 $targetQtrMale=($rowa['targetQtrMale']!='')?"<td align='right'>".$rowo['targetQtrMale']."</td>":"<td align='right'>-</td>";
 $TotalMaleActual=($rowa['TotalMaleActual']!='')?"<td align='right'>".$rowa['TotalMaleActual']."</td>":"<td align='right'>-</td>";
 $percentageMaleAchieved=($rowa['percentageMaleAchieved']!='')?"<td align='right'>".$rowa['percentageMaleAchieved']."%</td>":"<td align='right'>0%</td>";
 $targetQtrFemale=($rowa['targetQtrFemale']!='')?"<td align='right'>".$rowa['targetQtrFemale']."</td>":"<td align='right'>-</td>";
 $TotalFemaleActual=($rowa['TotalFemaleActual']!='')?"<td align='right'>".$rowa['TotalFemaleActual']."</td>":"<td align='right'>-</td>";
 $percentageFemaleAchieved=($rowa['percentageFemaleAchieved']!='')?"<td align='right'>".$rowa['percentageFemaleAchieved']."%</td>":"<td align='right'>0%</td>";
 $targetQtrOther=($rowa['targetQtrOther']!='')?"<td align='right'>".$rowa['targetQtrOther']."</td>":"<td align='right'>-</td>";
$TotalOtherActual=($rowa['TotalOtherActual']!='')?"<td align='right'>".$rowa['TotalOtherActual']."</td>":"<td align='right'>-</td>";
 $percentageOtherAchieved=($rowa['percentageOtherAchieved']!='')?"<td align='right'>".$rowa['percentageOtherAchieved']."%</td>":"<td align='right'>0%</td>";
 
 $p=$rowa['percentageOtherAchieved']+$rowa['percentageFemaleAchieved']+$rowa['percentageMaleAchieved'];
 
 $percentageOverallTotal=($p!=0)?"<td align=right>".$p."%<b></td>":"<td align='right'>0%</td>";
  $data.=" <tr class=$color >
    <td>".$n++."</td>
    <td><a href='#' onclick=\"xajax_view_QuarterlyResults('".$rowa['activity_id']."','','','','".$div2."')\">".$rowa['activity_code']." ".$rowa['activity_name']."</a></td>
    ".$targetQtrMale."
   ".$TotalMaleActual."
  ".$percentageMaleAchieved."
".$targetQtrFemale."
".$TotalFemaleActual."
  ".$percentageFemaleAchieved."
	".$targetQtrOther."
    ".$TotalOtherActual."
    ".$percentageOtherAchieved."
	".$percentageOverallTotal."
  </tr><tr>
    <td colspan=12><div id='$div2'></div></td>
    
  </tr>";
  $inc++;
  }
  

  
$data.="</table>";
$obj->assign($div1,'innerHTML',$data);
return $obj;
}


function view_DCEDQualitativeannualTargetReport($year,$timeline,$subsector,$status,$intervention,$indicator,$subcomponent,$resultchain){
$obj= new xajaxResponse();
#=====declaring sessions=============
$_SESSION['subsector']='';
$_SESSION['resultchain']='';
$_SESSION['intervention']='';
$_SESSION['indicator']='';
$_SESSION['subcomponent']='';
$_SESSION['status']='';
#=====addassigning  Ssessions===========
$_SESSION['subsector']=$subsector;

$_SESSION['fyear']=($year!='')?$year:$_SESSION['ABIActiveyear'];
$_SESSION['timeline']=$timeline;
$_SESSION['intervention']=$intervention;
$_SESSION['indicator']=$indicator;

$_SESSION['subsector']=$subsector;
$_SESSION['status']=$status;
$_SESSION['resultchain']=$resultchain;
$_SESSION['subcomponent']=$subcomponent;
$n=1;

$data.="<ul id='countrytabs' class='shadetabs'><li><a href='#' onclick=\"xajax_view_DCEDQuantitativeannualTargetReport('','','','','');return false;\" rel='tab1' class=''>Quantitative Annual Workplan</a></li>
											<li><a href='#' onclick=\"onclick=\"xajax_view_DCEDQualitativeannualTargetReport('','','','','','','','');return false;\"\" rel='tab2' class='selected'>Qualitative Annual Workplan</a></li>
											
											
										</ul><form name='annualTarget11' id='annualTarget11' method='post' action='".$PHP_SELF."'><table width='740'>
".filter_DCEDQualitativeannualTargetReport()."

<tr>
           
              
              <td colspan='12' class='evenrow2' align='center'>DCED Annual Targets</td>
            </tr>
			
			<td width='50' class='evenrow2' colspan='' align='left'>Select</td>
			
			<td colspan='3' class='evenrow2'>Intervention</td>
		<td colspan='2' class='evenrow2'>Result</td>
		<td colspan='2' class='evenrow2'>Indicator </td>
				<td width='' class='evenrow2' >Deliverable</td>
				  <td width='' class='evenrow2'>Responsible</td>
				  <td class='evenrow2' >Timeline</td>
			  	<td class='evenrow2' >Status</td>
            </tr>";
$inc=1;


$x="select d.target_id,d.target_id,d.indicator_id,d.status,d.timeline,d.responsible,d.deliverable,d.display,d.year,i.subcomponent_id,i.indicator_type,i.physical_target as result,i.indicator_name,intv.intervention as intervention_name,s.subsector as subsector_name,rc.name as resultschainName from tbl_dcedannualtarget d inner join tbl_indicator i on(d.indicator_id=i.indicator_id) left join tbl_intervention intv on(i.intervention_id=intv.intervention_id) left join tbl_subsector s on(s.subsector_id=intv.subsector) left join tbl_resultschain rc on(rc.rc_id=i.rc_id)where i.indicator_type like 'DCED Based%' && d.year like '".$_SESSION['fyear']."%' && intv.intervention like '".$_SESSION['intervention']."%' and i.indicator_name like '".$_SESSION['indicator']."%'  AND d.timeline like '".$_SESSION['timeline']."%' and d.status like '".$_SESSION['status']."%' and s.subsector like '".$_SESSION['subsector']."%' and rc.name like '".$_SESSION['resultchain']."%' and i.subcomponent_id like '".$_SESSION['usersubcomponent']."%'  and d.display like 'Yes%' order by i.indicator_name,d.year asc";

#$obj->addAlert($x);

		  $query=mysql_query($x)or die("abi Error code 1581 because,".mysql_error());
		 //$obj->addAlert($x);
		  while($row=mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		   $color=$n%2==1?"evenrow":"white";
		  if($row['status']=='Pending')$status="<td align='' bgcolor='' ><strong><font color='orange'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='on-going')$status="<td align='' bgcolor='' ><strong><font color='green'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='Completed')$status="<td align='' bgcolor='' ><strong><font color='blue'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='Cancelled')$status="<td align='' bgcolor='' ><strong><font color='red'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='')$status="<td align='' bgcolor='' ><strong>".$row['status']."</strong></td>";
		  $l="align=right";
		  
							$data.="<tr class=$color>
							<td width='50'><input name='target_id[]' id='target_id' type='checkbox' value='".$row['target_id']."' />".$n++."</td>
							
							<td align=left colspan='3'>".$row['intervention_name']."</td>
							<td align=left colspan=2>".$row['result']."</td>
									  <td colspan='2'>$row[indicator_name]</td>
									  <td align=''>$row[deliverable]</td>
							
									 <td align=''>".$row['responsible']."</td>
										<td align=''>".$row['timeline']."</td>
									<td align='' bgcolor='' ><strong>".$row['status']."</strong></td>
										
									  </tr>";
							$inc++;
		  }
		
		
	$data.="
            <tr></table></form>";
	
 
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




function view_DCEDQuantitativeannualTargetReport($subcomponent,$resultchain,$subsector,$intervention,$year){
$obj= new xajaxResponse();
#declaring sessions=============
$_SESSION['subsector']='';
$_SESSION['resultchain']='';
$_SESSION['intervention']='';
$_SESSION['indicator']='';
#addassigning  Ssessions===========
$_SESSION['subsector']=$subsector;
$_SESSION['resultchain']=$resultchain;
$_SESSION['fyear']=($year!='')?$year:$_SESSION['ABIActiveyear'];
$_SESSION['intervention']=$intervention;
$_SESSION['indicator']=$indicator;
#===========logframe sessions==================
$activity1="DCED Based";
$_SESSION['indicator_type']=$activity1;
$_SESSION['wpsubcomponent']=$subcomponent;
$_SESSION['subcomponent_code']=$subcomponent_code;
$_SESSION['activityAnnualplanning']=$activity;
$_SESSION['subactivityAnnualplanning']=$subactivity;
$_SESSION['fyear']=$fyear;
$n=1;
$n=1;

$data.="<ul id='countrytabs' class='shadetabs'>
											<li><a href='#' onclick=\"onclick=\"xajax_view_DCEDQualitativeannualTargetReport('','','','','','','','');return false;\"\" rel='tab2' class='' >Qualitative Annual Targets</a></li>
											<li><a href='#' onclick=\"xajax_view_DCEDQuantitativeannualTargetReport('','','','','');return false;\" rel='tab1' class='selected'>Quantitative Annual Targets</a></li>
											
										</ul>
<form name='annualTarget1' id='annualTarget1' method='post' action='".$PHP_SELF."' ><table width='740'>
".filter_DCEDQuantitativeannualTargetReport()."

<tr>
              <td class='evenrow2' colspan=2>&nbsp;</td>
              <td width='25' class='evenrow2'>&nbsp;</td>
              <td width='145' class='evenrow2'>&nbsp;</td>
              <td colspan='9' class='evenrow2'>DCED Based Annual Targets</td>
             
            </tr>
            <tr><td width='' class='evenrow2'>SELECT</td><td width='' class='evenrow2'>No.</td>
  
              <td colspan='3' class='evenrow2'>Intervention</td>
			    <td colspan='2' class='evenrow2' width='200'>Indicator </td>
				  <td width='100' class='evenrow2'>Baseline</td>
              <td width='100' class='evenrow2'>Quarter 1 (Jan-Mar)</td>
              <td width='100' class='evenrow2'>Quarter 2 (Apr-Jun)</td>
              <td width='100' class='evenrow2'>Quarter 3 (Jul-Sep)</td>
              <td width='100' bgcolor=#669900 class='evenrow2'>Quarter 4 (Oct-Dec)</td>
			  			<td class='evenrow2' bgcolor='#669900'>Total</td>
              
            </tr>";
$inc=1;




$x="select at.p_id,at.baseline,at.pquarter1,at.pquarter2,at.pquarter3,at.pquarter4,i.indicator_id,i.subcomponent_id,i.indicator_name,i.indicator_type,at.ptotal,i.physical_target as result,intv.intervention_id,intv.intervention from tbl_annualTarget at inner join tbl_indicator i on(i.indicator_id=at.indicator_id) inner join tbl_intervention intv on(i.intervention_id=intv.intervention_id) 
where i.indicator_type like 'DCED Based%'  and i.subcomponent_id like '".$_SESSION['usersubcomponent']."%'
and intv.intervention like '".$_SESSION['intervention']."%'
&& i.indicator_name like '".$_SESSION['indicator']."%' 
 && year like '".$_SESSION['fyear']."%' order by intv.intervention asc";

#$obj->addAlert($x);
$query=mysql_query($x)or die("aBi error-code 1339 because,".mysql_error());
		  if(mysql_num_rows($query)>0)
		  while($row=mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		   $color=$n%2==1?"evenrow":"white";
		  $l="align=right";
$data.="<tr class=$color>
 <td align=left><INPUT type=hidden name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
 <INPUT type='checkbox' name='p_id[]'   id='p_id' value='".$row['p_id']."' ></td>
<td align=right>".$n++."</td>
            
            <td colspan='3'>$row[intervention]</td>
			<td colspan='2' width='200'>$row[indicator_name]</td>
			<td align=right>$base</td>
            <td align=right>$row[pquarter1]</td>
    		<td align=right>$row[pquarter2]</td>
            <td align=right>$row[pquarter3]</td>
            <td align=right>$row[pquarter4]</td>
			<td align=right bgcolor='#669900'><strong>$row[ptotal]</strong></td>
			
          </tr>";
$inc++;
		  }
		
	$data.="<tr>
            <td colspan='13' align=left class='evenrow'>OVERALL TOTAL:</td><td align=right>$tot[ptotal]</td>
          </tr>";
		  $data.="</table></form>";
	
 
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




$xajax->processRequest();

  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.5/'); 

?>
<script language="javascript" type="text/javascript" src="js/check.js">


-->

</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!--	Tabs in Page: start	-->
		<link rel="stylesheet" type="text/css" href="tabs/tabcontent.css" />

		<script type="text/javascript" src="tabs/tabcontent.js">

		/***********************************************
		* Tab Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
		* This notice MUST stay intact for legal use
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		***********************************************/

		</script>
	<!--	Tabs in Page: end	-->

<title><?php heading($_GET['action']); ?></title>
<style type="text/css">
<!--
.style1 {color: #046c10}
-->
</style>

</head>

<body>

<table width="870" border="0" align="center" id="content_" >
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/header.php'); ?>
      </td>
        </tr>
  <tr>
    <td width="190" valign="top"><table width="190" border="0" >
      <tr>
        <td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
      </tr>
    </table></td>
    <td width="660" valign="top"  >
	  <div id="title"><?php title($_GET['linkvar'],$_GET['action']); ?></div>
          <div id="bodyDisplay">
          <script language="javascript" type="text/javascript">
		  <?php $linkvar=$_GET['linkvar'];if($linkvar!='')$_SESSION['linkvar']=$linkvar;
		  $action=$_GET['action'];if($action!='')$_SESSION['action']=$action;
	 if($linkvar=="Annual Results"){
			 ?>
		xajax_view_annualResults("","");
			<?php 
			 }else if($linkvar=="Quartery Results"){
			 ?>
			 //xajax_view_QuarterlyPhysicalSubcomponentResults('','');
		xajax_view_quarterlyResults("","","",'','','');
			<?php 
		
			 } else if($linkvar=="Semi Annual Results"){
			?>
			xajax_view_classifiedccf('','','','','','','','');  
			<?php 
			} 
			 else if($linkvar=="Cummulative Results"){
			?>
			xajax_view_cummulativeResults('','','','','','','','');  
			<?php 
			}
			
			
			else if($linkvar=="Budget Summary"){
			?>
			xajax_budgetSummary('','');
			<?php 
			}
			 else if($linkvar=="Annual Financial Workplan"){
			?>
	xajax_view_annualFinancialWorkplan('','','','');
			<?php 
			}
			else if($linkvar=="Annual Physical Workplan"){?>
			
			xajax_view_annualPhysicalWorkplan('','','','','','');
			<?php
			} else if($linkvar=="Project Life Financial Targets"){
			?>
			xajax_view_projectLifeFinancialBudget('','','','');
			
			<?php 
			}else if($linkvar=="Project Life Physical Targets"){
			?>
			xajax_view_projectLifeTargets();
			<?php 
			} else if($linkvar=="Annual Physical Monitoring"){
			
			?>
			xajax_view_annualPhysicalMonitoring('','','','','');
			
			<?php
			} else if($linkvar=="Annual Financial Monitoring"){
			
			?>
			xajax_view_annualFinancialMonitoring('','','','');
			<?php
			} else if($linkvar=="Targets Summary"){
			?>
			xajax_view_targetSummary('','');
			
			<?php
			}
			else if($linkvar=="Quarterly Financials"){
			?>
			xajax_view_QuarterlyFinancials('','','','','','','');
			<?php
			}
			
			else if($linkvar=='DCED Annual Workplan'){
			?>
			xajax_view_DCEDQualitativeannualTargetReport('','','','','','','','');
			
			<?php
			}
			else if($_GET['linkvar']=='DCED Annual Physical Monitoring'){
			?>
			xajax_view_DCEDannualPhysicalMonitoring('','','','','');
			<?php 
			}
			else if($_GET['linkvar']=='DCED Quartery Results'){
			?>
			xajax_view_DCEDquarterlyResults('','','','','','');
			<?php
			}
			else{
			?>
			xajax_view_annualResults('','');
			<?php
			
			}
			
			?>
			</script>
    </div>
     
            <!--to be included immediately after the -->
										<script type="text/javascript">
											var countries=new ddtabcontent("countrytabs")
											countries.setpersist(true)
											countries.setselectedClassTarget("link") //"link" or "linkparent"
											countries.init()
										</script>
										
										<script type="text/javascript">
											var countries=new ddtabcontent("countrytabs1")
											countries.setpersist(true)
											countries.setselectedClassTarget("link") //"link" or "linkparent"
											countries.init()
										</script>
    
    
    
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>


</div>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>
