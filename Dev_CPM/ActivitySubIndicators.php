<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
//require_once('subindicator/filters.php');
require_once('xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************
#xajax register functionor
$xajax->register(XAJAX_FUNCTION,'delete_data');
$xajax->register(XAJAX_FUNCTION,'indicator_details');
$xajax->register(XAJAX_FUNCTION,'add_indicator');

$xajax->register(XAJAX_FUNCTION,'save_SubIndicator');
$xajax->register(XAJAX_FUNCTION,'save_indicator_gender');
$xajax->register(XAJAX_FUNCTION,'search_indicator');

$xajax->register(XAJAX_FUNCTION,'check_indicatorType');
$xajax->register(XAJAX_FUNCTION,'check_indicatorType_editing');
$xajax->register(XAJAX_FUNCTION,'selectIndicator');
$xajax->register(XAJAX_FUNCTION,'DeleteSubIndicator');
$xajax->register(XAJAX_FUNCTION,'update_SubIndicator');

$xajax->register(XAJAX_FUNCTION,'disaggregate_levelTwo');
$xajax->register(XAJAX_FUNCTION,'save_levelTwoIndicators');



#--------------------------------------------------------
$xajax->register(XAJAX_FUNCTION,'view_indicator');
$xajax->register(XAJAX_FUNCTION,'deleteIndicator');
$xajax->register(XAJAX_FUNCTION,'edit_indicator');
$xajax->register(XAJAX_FUNCTION,'update_indicator');
//-indicator defn----------------------------------------
//----------delete data-------------------------<td colspan='2'><input type='checkbox' name='id[]' id='id' value='".$row['id']."' >".$inc."</td>
//--------------undo view------------------------
function undo_view($div){
$obj=new xajaxResponse();
$obj->assign($div,'style.display',"none");
return $obj;

}


function DeleteSubIndicator($SubIndiacatorId){
$obj =new xajaxResponse();

$sql="select * from tbl_sub_indicator  where sub_indicatorId='".$SubIndiacatorId."'";
//$obj->alert($sql);
$query=@Execute($sql)or die(http(0139));

if($query){
@mysql_query("delete from tbl_sub_indicator WHERE sub_indicatorId='".$SubIndiacatorId."'")or die(http(0047));

$obj->alert('Data deleted!');
}else{


$obj->alert('Ooops!....Data Cannot be deleted!');

}
$obj->call("xajax_view_indicator",'','','','','',1,20); 
return $obj;
}






function close($div){
$obj=new xajaxResponse();
$data="";
$obj->assign($div,'innerHTML',$data);
return $obj;
}

#********************************************
function viewall_indicator($indicator_type,$divindicator,$column_name,$column_value,$level){
$obj=new xajaxResponse();
//$p=13;
//$d="indicator".$p; 
$data=" <table cellspacing='0' width='600'><tr class='white1'><td COLSPAN=2><strong>".$indicator_type."(s)</strong></td><td><input name='close' type='button' value='Close' onclick=\"xajax_close('".$divindicator."')\"></td></tr>";
$select="select * from tbl_indicator where  indicator_type like '".$indicator_type."%' 
and ".$column_name." like '".$column_value."%' 
and level_ofindicator like '".$level."%' 
&& display like 'Yes%'
 order by indicator_code,indicator_id asc";
$query=mysql_query($select)or die(http("VP-381"));
//$obj->alert($select);

if(mysql_num_rows($query)>0)
while($row=mysql_fetch_array($query)){
$div='Indicator_'.$row['indicator_id'];
//$obj->alert($div);
$data.="<tr class=''>
    <td COLSPAN=4><ul><li>".$row['indicator_code']."&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"xajax_viewall_indicatorDefintion('".$div."','".$row['indicator_id']."');return false;\" >".$row['indicator_name']."</a></li></ul></td>
  </tr>
  <tr>
    <td colspan='4'><div id='".$div."'></div></td></tr>
  ";
  //$p++;
  }
  else 
  $data.="<tr><td>".noteMsg("No Records found! ")."</td></tr>";
  $data.="</table>";

$obj->assign($divindicator,'innerHTML',$data);
return $obj;
} 




function filter_subIndicator(){
$qmobj = new QueryManager('');

$data="<tr CLASS='evenrow'><td width='' align='right' colspan=9><div style='float:right;'>";

	 $data.=$qmobj->ControlDisplay('Home',"<input type='button' class='formButton2'name='new_programme' value='New Entry' onclick=\"xajax_add_indicator('','','','','','','','','');return false;\" /> |");
    
       $data.="<a href='export_to_excel_word.php?linkvar=Export Indicator&&levelofindicator=".$_SESSION['indicator_level']."&&program=".$_SESSION['programme']."&&subcomponent=".$_SESSION['subcomponent']."&&project=".$_SESSION['project']."&&indicator_code=".$_SESSION['indicator_code']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
    </div></td>
  </tr>
  
  ";
	
    $data.="<tr class='evenrow3'>
  <td width='' colspan=2 >Program</td>
    <td colspan='7'><select name='program' id='program' onchange=\"xajax_view_indicator('".$_SESSION['indicator_level']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."',1,20);return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	$data.=$qmobj->ProgramFilter($_SESSION['programme']);
	 
	 $data.="</select></td></tr>
	 
	 <tr class='evenrow'>
  <td width='' colspan='2'>Sub-Program</td>
    <td colspan=7><select name='subprogram' id='subprogram' onchange=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."',this.value,'".$_SESSION['project']."','".$_SESSION['indicator_code']."',1,20);return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $data.=$qmobj->SubcomponentFilter($programID=$_SESSION['programme'],$subprogram=$_SESSION['subprogram']);
	 $data.="</select></td>
   
   
    
  </tr>
	 
   ";

	 
         $data.="<tr class='evenrow'><TD colspan='2'>Indicator/Code:</td><td colspan='6'><input name='indicator_code' id='indicator_code' type='text' size='80' value=\"".$_SESSION['indicator_code']."\"   /></TD>
    <td><input name='search' type='button' class='formButton2'value='Go' title='search' onclick=\"xajax_view_indicator(getElementById('indicator_level').value,getElementById('program').value,getElementById('subprogram').value,getElementById('project').value,getElementById('indicator_code').value,1,20);return false;\" class='formButton2' />  </td>
</tr>";
return $data;  

}





#***********************************view_indicator**********filter_indicator()**************************
function view_indicator($indicator_level,$program,$subcomponent,$project,$indicator_code,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
$qmobj = new QueryManager('');
   $inc=1; $n=1;
if($_SESSION['username']==''){
$obj->alert("Your Session has Expired!");
$obj->redirect('index.php');
return $obj;
}
	$_SESSION['indicator_code']='';
 	$_SESSION['subcomponent']='';
  	$_SESSION['indicator_type']='';
 	$_SESSION['programme']='';
	$_SESSION['project']='';
	$_SESSION['indicator_level']='';
	$_SESSION['subprogram']=$subcomponent;
	$_SESSION['programme']=$program==''?$_SESSION['program_id']:$program;
	$_SESSION['project']=$project;
  	$_SESSION['indicator_name']=$indicator_name;
	$_SESSION['indicator_type']=$indicator_type;
	$_SESSION['indicator_level']=$indicator_level;
	$_SESSION['indicator_code']=$indicator_code;
	//$level=array('ASARECA','Program','Project');
//
$data.="<form id='indicator_all5' name='indicator_all5' action='".$PHP_SELF."' method='post' >
<table cellspacing='1' width='1000' id='report' border='0'>".filter_subIndicator();
   
$data.="
  <tr class='evenrow2'>
    <tD colspan='9' scope='cols' align=center><B>SUB-INDICATOR DETAILS</B></tD>
   
  </tr>
  <tr class='evenrow2'>
  <td CLASS=black2 colspan='' width='10'>SELECT</td>
   <td CLASS=black2>CODE</td>
  <td CLASS='black2' align='right'>MAIN INDICATOR<br><img src='images/spacer3.gif' width='250' height='0.1'></td>
  <td CLASS=black2 width='200'>UNIT OF MEASURE</td>
  <td CLASS=black2 width='200'>OTHER MEASURES</td>
    <td CLASS=black2 width='200'>BASE YEAR</td>
	  <td CLASS=black2 width='200'>BASELINE</td>
   <td CLASS=black2 colspan=2>ACTION </td>
  </tr>";
  
  
$query_string=$qmobj->EaappSubIndicators();

//$obj->alert($query_string);
$query=@Execute($query_string)or die(http("VP-2533")); 

$max_records = @mysql_num_rows($query);
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=@mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http("VP-1741")); 
//$obj->alert($query_string);
 /*if(mysql_num_rows($new_query)>0){ */
  while($row=mysql_fetch_array($new_query)){
  $color=($n%2==1)?"evenrow3":"white1";
 $events2="onmouseup=\"this.style.backgroundColor='#999999';\"";
$div="details".$row['indicator_id'];
 $data.="<tr class=$color ".$events2.">
   
   <td class='dataRow' >
   <input type='hidden' name='indicator_id[]' id='indicator_id'  value='".$row['indicator_id']."' />
   <input type='checkbox' name='indicator_idAll[]' id='indicator_idAll'  value='".$row['indicator_id']."' />
      <input type='hidden' name='prog_id[]' id='prog_id' value='".$row['prog_id']."' >
	   <input type='hidden' name='output_id[]' id='output_id' value='".$row['output_id']."' >
	    <input type='hidden' name='project_id[]' id='project_id' value='".$row['project_id']."' >
	    <input type='hidden' name='level_ofindicator[]' id='level_ofindicator' value='".$row['level_ofindicator']."' >
   <input type='hidden' name='indicator_type[]' id='indicator_type' value='".$row['indicator_type']."' >".$inc++."</td>
	<td class='dataRow'>".$row['indicator_code']."</td>  
  	<td class='dataRow'>".$row['indicator_name']."</td>
	<td class='dataRow'>".$row['unitofmeasure']."</td><td CLASS='evenrow'>";
	$data.="<ul>";
	$cpmonly=$qmobj->CpmSubIndicatorsNoneDisagg($row['indicator_id']);
	
				
	$qcpmonly=@Execute($cpmonly)or die(http("VP-286")); 
	//if(@mysql_num_rows($qcpmonly)>0){
		while($rowCpm=@FetchRecords($qcpmonly)){
		if($rowCpm['otherMeasures']==''){
	
	}else{
	$data.="<li><span class='block'><img src='icons/trash.png' onclick=\"xajax_DeleteSubIndicator('".$rowCpm['sub_indicatorId']."')\"></span>
	<span  class='block'><a style='color:#012D65;' href='#' onclick=\"xajax_disaggregate_levelTwo(
  '".$row['indicator_type']."',
  '',
  '".$row['prog_id']."',
  '".$row['subcomponent_id']."',
  '".$row['indicator_id']."',
	'',
	'',
	'".$row['level_ofindicator']."',
	'".$row['project_id']."','".$rowCpm['sub_indicatorId']."','".$rowCpm['otherMeasures']."',
	'".$rowCpm['unitofmeasure']."'
	);return false;\"> ".$rowCpm['otherMeasures']." 
	</a>
	</span>";
	$data.="</li>";
	
	}
	}
	$data.="</ul>";
	$data.=$qmobj->ControlDisplay('Home'," <input type='button' name='new_programme' value='Add Measure' 
	onclick=\"xajax_add_indicator('".$row['indicator_type']."','','".$row['prog_id']."','".$row['subcomponent_id']."','".$row['indicator_id']."',
	'','','".$row['level_ofindicator']."','".$row['project_id']."');return false;\" />",'-'); 
	$data.="</td>";
	$data.="<td>".$row['baselineYear']."</td>";
	$data.="<td>".$row['baseline']."</td>";
  $data.="<td colspan='2' class='dataRow'>";
  $data.=$qmobj->ControlDisplay('Home',"<input name='details' type='button' class='formButton2' value='Modify' class='formButton2'  title='Modify' 
  <input type='button' name='new_programme' value='Add Measure' 
	onclick=\"xajax_edit_indicator('".$row['indicator_type']."','','".$row['prog_id']."','".$row['subcomponent_id']."','".$row['indicator_id']."',
	'','','".$row['level_ofindicator']."','".$row['project_id']."');return false;\" />","N/A"); /**/
  $data.="</td>";
  
  $data.="</tr>";
  $data.="<tr><td colspan='9'><div id='".$div."'></div></td></tr>";
  $n++;  
 }

$data.=noRecordsFound($query,9)."<tr class='evenrow'>
        <td colspan=9> <div style='float:right;'>";

 $num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."','1','".$records_per_page."');return false;\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."','1','".$records_per_page."');return false;\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#'onclick=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."','".$p."','".$records_per_page."');return false;\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."','".$p."','".$records_per_page."');return false;\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onclick=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."','".$cur_page."',this.value);return false;\">";
	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"SELECTED":"";
		$data.="<option value=\"".($i*20)."\" ".$selected.">".($i*20)."</option>";
		$i++;
	}
 
	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value=\"".$max_records."\" ".$sel.">All</option>";
	$data.="</select>"; 
$data.="</div></td></tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
 
#***********************************************************************

function add_indicator($indicator_type,$output_id,$program_id,$subprogram_id,$indicator_id,$goal,$purpose,$level,$project){
	$obj=new xajaxResponse();
	$qmobj=new QueryManager('');
	$_SESSION['indicator_type']=$indicator_type; 
	$_SESSION['output_id']=$output_id; 
	$_SESSION['programme']=$program_id==''?$_SESSION['program_id']:$program_id; 
	$_SESSION['subprogram_id']=$subprogram_id; 
	$_SESSION['purpose']=$purpose; 
	$_SESSION['goal']=$goal; 
	$_SESSION['indicator_level']=$level; 
	$_SESSION['project']=$project; 
	
	//$obj->alert($indicator_id);

		$data.="<form  id='indicator13' onsubmit='return false;'>";

			$data.="<table cellspacing='1' id='report' width='100%' border='0'>";
			 
				$data.="<tr><td colspan='2'><hr/></td></tr>";
				
				$data.="<tr class='evenrow3'>";
					$data.="<td>Type of Indicator</td>";
					$data.="<td>";
						$data.="<select name='type_ofindicator'  id='type_ofindicator' class='combobox2' onchange=\"xajax_add_indicator(this.value,'','','','".$_SESSION['supergoal']."','','','','');return false;\" />";
						$data.="<option value=''>-SELECT-</option>";
						$data.="<OPTION VALUE='N/A'>-N/A-</OPTION>";
						$queryt=@Execute("select * from tbl_lookup where classCode='5' order by codeName asc ")or die(http("VP-2284"));	

						while($rowt=mysql_fetch_array($queryt)){
							$selected2=($rowt['codeName']==$_SESSION['indicator_type'])?"SELECTED":"";
							$data.="<option value=\"".$rowt['codeName']."\" ".$selected2.">".retrieve_info_withSpecialCharacters($rowt['codeName'])."</option>";
						}	
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";
							
				$data.="<tr class='evenrow3'>";
					$data.="<td width='200'>Programme</td>";
					$data.="<td>";
						$data.="<select name='prog_id' id='prog_id'  disabled='disabled' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
						$queryp=mysql_query("select * from tbl_programme  order by prog_id")or die(http("VP-368"));
						while($rowp=mysql_fetch_array($queryp)){
						$selectedp=$rowp['prog_id']==$_SESSION['programme']?"SELECTED":"";
						$data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$row['prog_id']."  ".retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
						}
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";
						  
				$data.="<tr class='evenrow3'>";
					$data.="<td>Sub-Program</td>";
					$data.="<td>";
						$data.="<select name='sub_component' id='sub_component'   class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['programme']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>";
						$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['programme']."'  order by  subcomponent_code asc";
						$queryst=mysql_query($sql)or die(http("ActivitySubIndicators-372"));
						while($rowst=mysql_fetch_array($queryst)){
							$selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
							$data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".retrieve_info_withSpecialCharacters($rowst['subcomponent_code']."  ".$rowst['subcomponent'])."</option>";
						}
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";

				$data.="<tr class='evenrow3'>";
					$data.="<td width='200'>Project:</td>";
					$data.="<td>";
						$data.="<select name='project' id='project' class='combobox2'  ><OPTION VALUE=''>-SELECT-</OPTION>";
						$data.="<OPTION VALUE='N/A'>-N/A-</OPTION>";
						$querypj=mysql_query("select * from tbl_project where subprogram_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by title asc")or die(http("VP-1543"));
						while($rowpj=mysql_fetch_array($querypj)){
						$data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['project_code'])." ".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
						}
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";
							
							
							
				$data.="<tr class='evenrow'>";
					$data.="<td>Indicator:</td>";
					$data.="<td>";
						$data.="<select name='indicator'  id='indicator' class='combobox2' >";
						$data.="<option value='' >-Select-</option>";
						$data.=$qmobj->viewIndicator($_SESSION['indicator_level'],$_SESSION['indicator_type'],$_SESSION['programme'],$_SESSION['project'],$indicator_id);
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";
				
				$data.="<tr class='evenrow3'>";
					$data.="<th colspan=2>";
						$data.="<center>";
							$data.="<strong>Other Measures</strong>";
						$data.="</center>";
					$data.="</th>";
					$data.="<th>";
						$data.="<center>";
							$data.="FtF Disaggregation Level";
						$data.="<center>";
					$data.="</th>";
				$data.="</tr>";
				
				for($y=1;$y<11;$y++){
					
					$data.="<tr class='evenrow'>";
						$data.="<td colspan=''>";
							$data.="<input  name='loopKey[]' type='hidden' id='loopKey' value='1' />";
							$data.="<input  name='indicator_id[]' type='hidden' id='indicator_id' value='".$indicator_id."' />".$y."</td>";
						$data.="<td>";
							$data.="<input  name='otherMeasures[]' type='text' id='otherMeasures' size='60' value='' />";
						$data.="</td>";
						$data.="<td>";
							$data.="<select name='ftfReportLevel[]'  id='ftfReportLevel' class='combobox2' >";
								$data.="<option value='' >-Select-</option>";
								$arrStatus=array('1','2');
                                        $k = 0; 
                                        foreach ($arrStatus as $var) {
											$varToText=($var == '1')?"One":"Two";
                                            $data.="<option value=\"".$var."\">".$varToText."</option>";
                                            $k++;
                                        }
							$data.="</select>";
						$data.="</td>";
					$data.="</tr>";
					
				}
					
				$data.="<tr>";
						$data.="<td colspan='4' ALIGN='right'>";
							$data.="<button  name='save_SubIndicator' type='button' id='save_SubIndicator' value='Save' class='button_width' onclick=\"xajax_save_SubIndicator(xajax.getFormValues('indicator13'));\" />Save</button>";
						$data.="</td>";
					$data.="</tr>";
			$data.="</table>";  
		$data.="</form>";

	$obj->assign('bodyDisplay','innerHTML',$data);
	return $obj;
}

function save_SubIndicator($formvalues){
$obj=new xajaxResponse();


						$prog_id=trim($formvalues['prog_id']);
						$subcomponent=trim($formvalues['sub_component']);
						$typeofindicator=trim($formvalues['type_ofindicator']);
						$project=trim($formvalues['project']);
						$level=trim($formvalues['Level_ofindicator']);
						$indicator_idOnNew=trim($formvalues['indicator']);
						
						

for($y=0;$y<count($formvalues['loopKey']);$y++){
						
	$otherMeasures=trim($formvalues['otherMeasures'][$y]);
	$ftfReportLevelCollected=$formvalues['ftfReportLevel'][$y];
	$ftfReportLevel=($ftfReportLevelCollected == '' or $ftfReportLevelCollected == null)?3:$ftfReportLevelCollected;
	$indicator_idOnUpdate=$formvalues['indicator_id'][$y];
	$indicator_id=($indicator_idOnUpdate == '' or $indicator_idOnUpdate == null)?$indicator_idOnNew:$indicator_idOnUpdate;
			/* $sql="insert into tbl_sub_indicator(indicator_id,otherMeasures,ftfReportLevel)
			 values('".$indicator_id."','".mysql_real_escape_string($otherMeasures)."','".$ftfReportLevel."')
			 ON DUPLICATE KEY UPDATE 
				 indicator_id='".$indicator_id."',
				 otherMeasures='".$otherMeasures."', 
				 ftfReportLevel='".$ftfReportLevel."'"; */
				 
				 $sql="insert into tbl_sub_indicator(indicator_id,otherMeasures,ftfReportLevel)
			 values('".$indicator_id."','".mysql_real_escape_string($otherMeasures)."','".$ftfReportLevel."')";
				 
 		if($otherMeasures<>''){
			@Execute($sql)or die(http("ActivitySubIndicators-488"));
						}
						//@Execute("delete from tbl_sub_indicator where otherMeasures='' and indicator_id='".$indicator_id."' ")or die(http("ActivitySubIndicators-641"));
}

$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_indicator",'','','','','',1,20);
return $obj;
}



function disaggregate_levelTwo($indicator_type,$output_id,$program_id,$subprogram_id,$indicator_id,$goal,$purpose,$level,$project,$sub_indicatorId,$otherMeasures,$unitofmeasure){
	$obj=new xajaxResponse();
	$qmobj=new QueryManager('');
	$_SESSION['indicator_type']=$indicator_type; 
	$_SESSION['output_id']=$output_id; 
	$_SESSION['programme']=$program_id==''?$_SESSION['program_id']:$program_id; 
	$_SESSION['subprogram_id']=$subprogram_id; 
	$_SESSION['purpose']=$purpose; 
	$_SESSION['goal']=$goal; 
	$_SESSION['indicator_level']=$level; 
	$_SESSION['project']=$project; 

		$data.="<form action=\"".$PHP_SELF."\" name='lTwo' id='lTwo' method='post'>";
			$data.="<table cellspacing='1' id='report' width='100%' border='0'>";
			
				$data.="<tr><td colspan='2'><hr/></td></tr>";
				
				$data.="<tr class='evenrow'>";
					$data.="<td>Type of Indicator</td>";
					$data.="<td>";
						$data.="<select name='type_ofindicator'  id='type_ofindicator' class='combobox2' onchange=\"xajax_add_indicator(this.value,'','','','".$_SESSION['supergoal']."','','','','');return false;\" />";
							$data.="<option value=''>-SELECT-</option";
							$data.="<OPTION VALUE='N/A'>-N/A-</OPTION>";
							$queryt=@Execute("select * from tbl_lookup where classCode='5' order by codeName asc ")or die(http("VP-2284"));	
							while($rowt=mysql_fetch_array($queryt)){
								$selected2=($rowt['codeName']==$_SESSION['indicator_type'])?"SELECTED":"";
								$data.="<option value=\"".$rowt['codeName']."\" ".$selected2.">".retrieve_info_withSpecialCharacters($rowt['codeName'])."</option>";
							}	
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";

				$data.="<tr class='evenrow'>";
					$data.="<td width='200'>Programme</td>";
					$data.="<td>";
						$data.="<select name='prog_id' id='prog_id'  disabled='disabled' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" >";
						$data.="<OPTION VALUE=''>-SELECT-</OPTION>";
						$data.="<OPTION VALUE='N/A'>-N/A-</OPTION>";
						$queryp=mysql_query("select * from tbl_programme  order by prog_id")or die(http("VP-504"));
						while($rowp=mysql_fetch_array($queryp)){
						$selectedp=$rowp['prog_id']==$_SESSION['programme']?"SELECTED":"";
						$data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$row['prog_id']."  ".retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
						}
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";

				$data.="<tr class='evenrow'>";
					$data.="<td>Sub-Program</td>";
					$data.="<td>";
						$data.="<select name='sub_component' id='sub_component' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['programme']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\">";
							$data.="<OPTION VALUE=''>-SELECT-</OPTION>";
							$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['programme']."'  order by  subcomponent_code asc";
							$queryst=mysql_query($sql)or die(http("VP-1887"));	
								while($rowst=mysql_fetch_array($queryst)){
									$selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
									$data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".retrieve_info_withSpecialCharacters($rowst['subcomponent_code']."  ".$rowst['subcomponent'])."</option>";
								}	     
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";

				$data.="<tr class='evenrow'>";
					$data.="<td width='200'>Project:</td>";
					$data.="<td>";
						$data.="<select name='project' id='project' class='combobox2'  ><OPTION VALUE=''>-SELECT-</OPTION>";
							$data.="<OPTION VALUE='N/A'>-N/A-</OPTION>";
							$querypj=mysql_query("select * from tbl_project where subprogram_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by title asc")or die(http("VP-1543"));
							while($rowpj=mysql_fetch_array($querypj)){
								$data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['project_code'])." ".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
							}
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";

				$data.="<tr class='evenrow'>";
					$data.="<td>Indicator:</td>";
					$data.="<td>";
						$data.="<select name='indicator'  id='indicator' class='combobox2' >";
							$data.="<option value='' >-Select-</option>";
							$data.=$qmobj->viewIndicator($_SESSION['indicator_level'],$_SESSION['indicator_type'],$_SESSION['programme'],$_SESSION['project'],$indicator_id);
						$data.="</select>"; 
					$data.="</td>";
				$data.="</tr>";
				
				$data.="<tr class='yearFour'>";
					$data.="<td colspan='4'>";
					
						
						$data.="<table id='tbl_mainDisagreggations' border='0' cellspacing='1' cellpadding='1' width='100%'>";
						
						$data.="<tr>";
							$data.="<td colspan='9' bgcolor='#8aa94a'><font size='2' color='white'><strong>&#x272A; ".strtoupper($otherMeasures)."</strong></font></td>";
						$data.="</tr>";
						
						$data.="<tr>";
							$data.="<td bgcolor='#E8E8FF'><strong>No</td>";
							$data.="<td bgcolor='#E8E8FF'><strong>Main Disagreggation</strong></td>";
							$data.="<td bgcolor='#E8E8FF'><strong>Base Year</strong></td>";
							$data.="<td bgcolor='#E8E8FF'><strong>Base Value</strong></td>";
							$data.="<td bgcolor='#E8E8FF' colspan='2'><strong>Level Two Disagreggation</strong></td>";
							$data.="<td bgcolor='#E8E8FF'><strong>Level Two Base Year</strong></td>";
							$data.="<td bgcolor='#E8E8FF'><strong>Level Two Base Value</strong></td>";
							$data.="<td bgcolor='#E8E8FF'><strong>Action</strong></td>";
								$data.="<input type='hidden' name='numberOfMainDisagreggations' id='numberOfMainDisagreggations' />";
						$data.="</tr>";
						$data.="</table>";

						$data.="<p>";
						$data.="<input  type='button' class='formButton2' name='Add Main Disagreggation' TITLE='Add Main Disagreggation' value='Add Main Disagreggation' onclick=\"addMainDisagreggation()\" />";
						$data.="</p>";

						$data.="</td>";
						$data.="</tr>";
						
						$data.="<tr class='yearFour'>";
							$data.="<td colspan='4' align='right'>";
								$data.="<div align='right'>";
									$data.="<input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"loadingIcon(xajax.getFormValues('lTwo'),'save_lTwo');return false;\" />";
								$data.="</div>";
							$data.="</td>";
						$data.="</tr>";
						
					$data.="</form>";
					
					
					
					//None displaying table
					$data.="<table id='template_mainDisagreggations' style='display:none;'>";
								$data.="<tbody class=\"mainDisagreggations\">";
								//$obj->alert("indId->".$indicator_id." SubIndId->".$sub_indicatorId);
									$data.="<tr class='yearFour'>";
										$data.="<td rowspan='3' valign='top'><span class='disagIndex'>1</span>";
											$data.="<input type='hidden' name='childStart[]' id='childStart1' />";
											$data.="<input type='hidden' name='childStop[]' id='childStop1' />";
											$data.="<input type='hidden' name='sub_indicatorId' id='sub_indicatorId' value='".$sub_indicatorId."' />";
											$data.="<input type='hidden' name='indicatorId' id='indicatorId' value='".$indicator_id."' />";
											$data.="<input type='hidden' name='unitofmeasure' id='unitofmeasure' value='".$unitofmeasure."' />";
											
										$data.="</td>";
										$data.="<td rowspan='3' valign='top'>";
											$data.="<input type='hidden' name='loopkey[]' id='loopkey1' value='1'>"; 
											$data.="<input type='text' name='mDisagg[]' id='mDisagg1' style='width:200px;'>"; 
										$data.="</td>";
										
										$data.="<td rowspan='3' valign='top'>";
											$data.="<input type='text' name='mBaseYear[]' id='mBaseYear1' maxlength='4' onkeypress='return numbersonly(event, false)' style='width:150px;'>"; 
										$data.="</td>";
										
										$data.="<td rowspan='3' valign='top'>";
											$data.="<input type='text' name='mBaseValue[]' id='mBaseValue1' onkeypress='return numbersonly(event, false)' style='width:150px;'>"; 
										$data.="</td>";
										
									$data.="</tr>";	

									$data.="<tr class='evenrow member'>";
										$data.="<td valign='top'><span class='memberIndex'>1</span></td>";
										$data.="<td valign='top'><input type='text' name='lTwoDisag[]' id='lTwoDisag1' style='width:200px;'></td>";
										$data.="<td valign='top'><input type='text' name='lTwoBaseYear[]' id='lTwoBaseYear1' maxlength='4' onkeypress='return numbersonly(event, false)' style='width:150px;'></td>";
										$data.="<td valign='top'><input type='text' name='lTwoBaseValue[]' id='lTwoBaseValue1' onkeypress='return numbersonly(event, false)' style='width:150px;'></td>";
										
										$data.="<td><input  type='button' class='formButton2'name='Remove Level Two Disagreggation' TITLE='Remove Level Two Disagreggation' value='Remove Level Two Disagreggation' onclick=\"removeLevelTwoDisagreggation(this)\" /></td>";
									$data.="</tr>";
								
									$data.="<tr class='yearFour'>";
										$data.="<td valign='top' colspan='9'>";
											$data.="<input  type='button' class='formButton2'name='Remove Main Disagreggation' TITLE='Remove Main Disagreggation' value='Remove Main Disagreggation' onclick=\"removeMainDisagreggation(this)\" />";
											$data.="<input  type='button' class='formButton2'name='Add Level Two Disagreggation' TITLE='Add Level Two Disagreggation' value='Add Level Two Disagreggation' onclick=\"addLevelTwoDisagreggation(this,'evenrow member')\" />";
										$data.="</td>";
									$data.="</tr>";	
								$data.="</tbody>";
					$data.="</table>";
					
					$data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
	
	$obj->assign('bodyDisplay','innerHTML',$data);
	return $obj;
}

function save_levelTwoIndicators($formValues){
	$obj=new xajaxResponse();
	
	
	@mysql_query("SET AUTOCOMMIT=FALSE");
	@mysql_query("BEGIN TRANSACTION");

		$stmnt_check="SELECT MAX(`level_two_sub_indicatorId`) as level_two_sub_indicatorId  FROM `tbl_sub_indicator_level_two`";
		$Qcheck=@Execute($stmnt_check)or die(http(699));
		$y=1;
		if(@mysql_num_rows($Qcheck)>0){
			$Rcheck=mysql_fetch_array($Qcheck);
			$lastId=$Rcheck['level_two_sub_indicatorId'];
			$nextId=($lastId+$y);
			$level_two_sub_indicatorId=$nextId;  
		}
		else
		{
			$initialId=$y;
			$level_two_sub_indicatorId=$initialId;  
		}
		$indicatorId = $formValues['indicatorId'];
		$sub_indicatorId = $formValues['sub_indicatorId'];
		$unitofmeasure = $formValues['unitofmeasure'];
		$otherMeasures = $formValues['otherMeasures'];

		//start of mainDisagreggation
		if(!empty($level_two_sub_indicatorId)) {
			for($x=0;$x<$formValues['numberOfMainDisagreggations'];$x++){//start of for loop on MainDisaggregation
				$mDisagg=$formValues['mDisagg'][$x];
				$mBaseYear=$formValues['mBaseYear'][$x];
				$mBaseValue=$formValues['mBaseValue'][$x];
				$stMain="INSERT INTO `tbl_sub_indicator_level_two`
				(`level_two_sub_indicatorId`, `sub_indicatorId`, `indicator_id`,
				`unitofmeasure`, `otherMeasures`, `baselineYear`,
				`baseline`, `updatedby`) 
				VALUES ('".$level_two_sub_indicatorId."','".$sub_indicatorId."','".$indicatorId."',
				'".$unitofmeasure."','".mysql_real_escape_string($mDisagg)."','".$mBaseYear."',
				'".$mBaseValue."','".$_SESSION['username']."')";
				$query=@Execute($stMain)or die(http(732)); 
				//$obj->alert($stMain);
				/* if(!$query){ $obj->alert("MIS failed to Add this indicator disaggregation");
					$obj->call("hidemyLoaderDiv"); 	   
					return $obj;
				} */
				
				$childStart=$formValues['childStart'][$x];
				$childStop=$formValues['childStop'][$x];
				for($y=$childStart;$y<=$childStop;$y++){ //start of lTwo for loop 
					$lTwoDisag=$formValues['lTwoDisag'.$y];
					$lTwoBaseYear=$formValues['lTwoBaseYear'.$y];
					$lTwoBaseValue=$formValues['lTwoBaseValue'.$y];
					if($lTwoDisag<>''OR $lTwoDisag<>0) {
						$stlTwoDisag="INSERT INTO `tbl_sub_indicator_level_three`(`level_two_sub_indicatorId`, `sub_indicatorId`, `unitofmeasure`,
						`otherMeasures`, `baselineYear`, `baseline`,
						`updatedby`) 
						VALUES ('".$level_two_sub_indicatorId."','".$sub_indicatorId."','".$unitofmeasure."',
						'".mysql_real_escape_string($lTwoDisag)."','".$lTwoBaseYear."','".$lTwoBaseValue."',
						'".$_SESSION['username']."')";
						$query=@Execute($stlTwoDisag)or die(http(752));
						//$obj->alert($stlTwoDisag);
						/* if(!$query){ $obj->alert("MIS failed to Add this indicator disaggregation");
							$obj->call("hidemyLoaderDiv"); 	   
							return $obj;
						} */
					}//End of validation lTwo disaggregation
				}//End of lTwo for loop
			}//End of MainDisaggregation for loop
		}//end of mainDisagreggation


	@mysql_query("COMMIT");
	@mysql_query("SET AUTOCOMMIT=TRUE");
	$obj->call("hidemyLoaderDiv"); 
	$obj->assign('bodyDisplay','innerHTML',congMsg("Data successfully captured!"));
	$obj->call('view_indicator','','','','','',1,20);
	return $obj; 
	
}


function edit_indicator($indicator_type,$output_id,$program_id,$subprogram_id,$indicator_id,$goal,$purpose,$level,$project){
	$obj=new xajaxResponse();
	$qmobj=new QueryManager('');
	$_SESSION['indicator_type']=$indicator_type; 
	$_SESSION['output_id']=$output_id; 
	$_SESSION['programme']=$program_id==''?$_SESSION['program_id']:$program_id; 
	$_SESSION['subprogram_id']=$subprogram_id; 
	$_SESSION['purpose']=$purpose; 
	$_SESSION['goal']=$goal; 
	$_SESSION['indicator_level']=$level; 
	$_SESSION['project']=$project; 

		$data.="<form id='indicator13'	ONSUBMIT='return false;'>";
			$data.="<table cellspacing='1' id='report' width='100%' border='0'>";
			
				$data.="<tr><td colspan='2'><hr/></td></tr>";
				
				$data.="<tr class='evenrow3'>";
					$data.="<td>Type of Indicator</td>";
					$data.="<td>";
						$data.="<select name='type_ofindicator'  id='type_ofindicator' class='combobox2' onchange=\"xajax_add_indicator(this.value,'','','','".$_SESSION['supergoal']."','','','','');return false;\" />";
							$data.="<option value=''>-SELECT-</option";
							$data.="<OPTION VALUE='N/A'>-N/A-</OPTION>";
							$queryt=@Execute("select * from tbl_lookup where classCode='5' order by codeName asc ")or die(http("VP-2284"));	
							while($rowt=mysql_fetch_array($queryt)){
								$selected2=($rowt['codeName']==$_SESSION['indicator_type'])?"SELECTED":"";
								$data.="<option value=\"".$rowt['codeName']."\" ".$selected2.">".retrieve_info_withSpecialCharacters($rowt['codeName'])."</option>";
							}	
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";

				$data.="<tr class='evenrow3'>";
					$data.="<td width='200'>Programme</td>";
					$data.="<td>";
						$data.="<select name='prog_id' id='prog_id'  disabled='disabled' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" >";
						$data.="<OPTION VALUE=''>-SELECT-</OPTION>";
						$data.="<OPTION VALUE='N/A'>-N/A-</OPTION>";
						$queryp=mysql_query("select * from tbl_programme  order by prog_id")or die(http("VP-504"));
						while($rowp=mysql_fetch_array($queryp)){
						$selectedp=$rowp['prog_id']==$_SESSION['programme']?"SELECTED":"";
						$data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$row['prog_id']."  ".retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
						}
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";

				$data.="<tr class='evenrow3'>";
					$data.="<td>Sub-Program</td>";
					$data.="<td>";
						$data.="<select name='sub_component' id='sub_component' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['programme']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\">";
							$data.="<OPTION VALUE=''>-SELECT-</OPTION>";
							$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['programme']."'  order by  subcomponent_code asc";
							$queryst=mysql_query($sql)or die(http("VP-1887"));	
								while($rowst=mysql_fetch_array($queryst)){
									$selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
									$data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".retrieve_info_withSpecialCharacters($rowst['subcomponent_code']."  ".$rowst['subcomponent'])."</option>";
								}	     
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";

				$data.="<tr class='evenrow3'>";
					$data.="<td width='200'>Project:</td>";
					$data.="<td>";
						$data.="<select name='project' id='project' class='combobox2'  ><OPTION VALUE=''>-SELECT-</OPTION>";
							$data.="<OPTION VALUE='N/A'>-N/A-</OPTION>";
							$querypj=mysql_query("select * from tbl_project where subprogram_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by title asc")or die(http("VP-1543"));
							while($rowpj=mysql_fetch_array($querypj)){
								$data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['project_code'])." ".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
							}
						$data.="</select>";
					$data.="</td>";
				$data.="</tr>";

				$data.="<tr class='evenrow'>";
					$data.="<td>Indicator:</td>";
					$data.="<td>";
						$data.="<select name='indicator'  id='indicator' class='combobox2' >";
							$data.="<option value='' >-Select-</option>";
							$data.=$qmobj->viewIndicator($_SESSION['indicator_level'],$_SESSION['indicator_type'],$_SESSION['programme'],$_SESSION['project'],$indicator_id);
						$data.="</select>"; 
					$data.="</td>";
				$data.="</tr>";
				
				$data.="<tr class='evenrow3'>";
					$data.="<th colspan=2>";
						$data.="<center>";
							$data.="<strong>Other Measures</strong>";
						$data.="</center>";
					$data.="</th>";
					$data.="<th>";
						$data.="<center>";
							$data.="FtF Disaggregation Level";
						$data.="<center>";
					$data.="</th>";
				$data.="</tr>";

				$y=1;
				$cpm=$qmobj->EaappSubIndicatorsOnly($indicator_id);
				$qcpmonly=@Execute($cpm)or die(http("VP-592")); 
				while($rowCpm=FetchRecords($qcpmonly)){
						$data.="<tr class='evenrow'>";
							$data.="td colspan=''>";
								$data.="<input  name='loopKey[]' type='hidden' id='loopKey' value='1' />";
								$data.="<input  name='indicator_id[]' type='hidden' id='indicator_id' value='".$indicator_id."' />";
								$data.="<input  name='sub_indicator_id[]' type='hidden' id='sub_indicator_id' value='".$rowCpm['sub_indicatorId']."' />".$y."</td>";
							$data.="<td>";
								$data.="<input  name='otherMeasures[]' type='text' id='otherMeasures' size='60' value='".$rowCpm['otherMeasures']."' />";
							$data.="</td>";
							$data.="<td>";
							$data.="<select name='ftfReportLevel[]'  id='ftfReportLevel' class='combobox2' >";
								$data.="<option value='' >-Select-</option>";
								$arrStatus=array('1','2');
                                        $k = 0; 
                                        foreach ($arrStatus as $var) {
                                            $selected=($rowCpm['ftfReportLevel']==$var)?"selected":"";
											$varToText=($var == '1')?"One":"Two";
                                            $data.="<option value=\"".$var."\" ".$selected.">".$varToText."</option>";
                                            $k++;
                                        }
							$data.="</select>";
						$data.="</td>";
						$data.="</tr>";
					$y++;
				}

				$data.="<tr>";
					$data.="<td colspan='4' ALIGN='right'>";
						$data.="<button name='save_indicator' type='button' id='save_indicator' value='Save' class='button_width' onclick=\"xajax_update_SubIndicator(xajax.getFormValues('indicator13'));\" />Save</button>";
					$data.="</td>";
				$data.="</tr>";
				
			$data.="</table>"; 
			
		$data.="</form>";	
		
	$obj->assign('bodyDisplay','innerHTML',$data);
	return $obj;
}


function update_SubIndicator($formvalues){
	$obj=new xajaxResponse();


							$prog_id=trim($formvalues['prog_id']);
							$subcomponent=trim($formvalues['sub_component']);	
							$typeofindicator=trim($formvalues['type_ofindicator']);
							$project=trim($formvalues['project']);
							$level=trim($formvalues['Level_ofindicator']);
							
							

		for($y=0;$y<count($formvalues['loopKey']);$y++){
								
			$otherMeasures=trim($formvalues['otherMeasures'][$y]);
			$indicator_id=$formvalues['indicator_id'][$y];
				$sub_indicator_id=$formvalues['sub_indicator_id'][$y];
					$sql="update tbl_sub_indicator set
								indicator_id='".$indicator_id."',
								unitofmeasure='".mysql_real_escape_string($otherMeasures)."',
								otherMeasures='".mysql_real_escape_string($otherMeasures)."',
								updatedby='".$_SESSION['username']."'
								where sub_indicatorId='".$sub_indicator_id."' ";
				
					@Execute($sql)or die(http("ActivitySubIndicators-464"));
		}			

	$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
	$obj->call("xajax_view_indicator",'','','','','',1,20);
	return $obj;
}





#****************************************************

$xajax->processRequest();

  ?>



<html>
<head>
    <?php $xajax->printJavascript('xajax_0.5/'); ?>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/loading.css" rel="stylesheet" type="text/css" />
<title><?php heading($_GET['action']); ?></title>
<script type="text/javascript" src="js/number.js"></script>
<script type="text/javascript" src="js/disaggregation.js" language="javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
<script type="text/javascript" src="js/loading.js" language="javascript"></script>
<script type="text/javascript" src="js/check.js" language="javascript"></script>
<script type="text/javascript" src="js/popup.js" language="javascript"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>
<script type="text/javascript" src="js/limit_text.js" language="javascript"></script>
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
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;p">
			<?php require_once('connections/left_links.php'); ?></td>
          </tr>
        </table></td>
        <td width="80%" align="left" valign="top" style="text-align:justify; top:0px; ">
        
        <table cellspacing='0'    id='ReportTable'   width="100%" border="0">
          <tr>
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;p">
	
	<div id="title">
      <?php title($_GET['linkvar'],$_GET['action']); ?>
    </div>
	 <div id='bodyDisplay'> <script language='javascript' type='text/javascript'> 
	 
		  <?php
		  switch($_GET['linkvar']){
		  case "View Sub Indicators":
		   ?>
		xajax_view_indicator('','','','','',1,20);
		 
		 <?php
		  break;
		 default:
		 	
		 ?>
		xajax_view_indicator('','','','','',1,20);
		 
		 <?php
		 break;
		 
		 }
		  
			?>
		  </script>
    </div></td>
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
    <td height="38"><?php require_once('./footer.php');
	 ?></td>
    <td height="38" bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
</table>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>

