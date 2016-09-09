<?php 
//session_start();
require_once('filters_v2.php');
//session_start();


function filter_cumulativeTargetsAgainstActuals(){
$data="<tr class='evenrow'>
    <td scope='col' colspan=2><B>Subcomponent:</b></td><td scope='col' colspan=5><select name='subcomponent' id='subcomponent4' style='width:300px;' >";
	

	
	if($_SESSION['usersubcomponent']<>''){
$query=mysql_query("select * from tbl_subcomponent where id like '".$_SESSION['usersubcomponent']."%' order by subcomponent_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
#$sel=($_SESSION['subcomponent1']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  } }
					  else {
					  $data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die(http(__line__));
	while($row1=mysql_fetch_array($query1)){
	$ccfsub=($_SESSION['ccfsubcomponent']==$row1['subcomponent'])?"SELECTED":"";
	$data.="<option value=\"".$row1['subcomponent']."\" ".$ccfsub.">".$row1['subcomponent_code']." ".substr($row1['subcomponent'],0,40)."</option>";
	}
	}
	
	$data.="</select><div style='float:right;'><a href='export_to_excel_word.php?linkvar=Export Cummulative Targets Against Actuals&&subcomponent=".$_SESSION['ccfsubcomponent']."&&output=".$_SESSION['ccfoutput']."&&activity=".$_SESSION['ccfactivity']."&&subactivity=".$_SESSION['ccfsubactivity']."&&indicator=".$_SESSION['indicator_110']."&&halfyear=".$_SESSION['half_year']."&&year=".$_SESSION['year']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></div></td>
  </tr>
  <tr class='evenrow'>
    <td scope='col' colspan=2><B>Output:</b></td><td scope='col' colspan=5><select name='output' id='output' style='width:300px;' >";
	if($_SESSION['ccfoutput']!='')$data.="<option value=\"".$_SESSION['ccfoutput']."\">".substr($_SESSION['ccfoutput'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_output WHERE subcomp_id like '".$_SESSION['usersubcomponent']."%' order by output_code asc") or die(http(__line__));
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value=\"".$row1['output_name']."\" >".$row1['output_code']." ".substr($row1['output_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
  <tr class='evenrow'>
    <td scope='col' colspan=2><B>Activity:</b></td><td scope='col' colspan=5><select name='activity' id='activity' style='width:300px;' >";
	if($_SESSION['ccfactivity']!='')$data.="<option value=\"".$_SESSION['ccfactivity']."\">".$row1['activity_code']." ".substr($_SESSION['ccfactivity'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_activity WHERE subcomp_id like '".$_SESSION['usersubcomponent']."%' order by activity_code asc") or die(http(__line__));
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value=\"".$row1['activity_name']."\" >".$row1['activity_code']." ".substr($row1['activity_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
<tr class='evenrow'>
    <td scope='col' colspan=2><B>Subactivity:</b></td><td scope='col' colspan=5><select name='subactivity' id='subactivity' style='width:300px;'><option value=''>-All-</option>";
	/* if($_SESSION['ccfsubactivity']!='')$data.="<option value=\"".$_SESSION['ccfsubactivity']."\">".substr($_SESSION['ccfsubactivity'],0,70)."</option>";
	else
	$data.=""; */
	$query1=mysql_query("select * from tbl_subactivity WHERE subcomponent_id like '".$_SESSION['usersubcomponent']."%' order by subactivity_code asc") or die(http(__line__));
	while($row1=mysql_fetch_array($query1)){
	$selsubactivity=($_SESSION['ccfsubactivity']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value=\"".$row1['subactivity_name']."\" ".$selsubactivity." >".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
<tr class='evenrow'>
    <td scope='col' colspan=2><B>Indicator:</b></td><td scope='col' colspan=5><select name='indicator' id='indicator' style='width:300px;' >";
	if($_SESSION['indicator_110']!='')$data.="<option value=\"".$_SESSION['indicator_110']."\">".substr($_SESSION['indicator_110'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select i.indicator_name,i.subcomponent_id  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id) left join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id)  where i.indicator_id!=0 and  i.subcomponent_id like '".$_SESSION['usersubcomponent']."%'  group by tr.indicator_id order by tr.indicator_id asc") or die(http(__line__));
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value=\"".$row1['indicator_name']."\">".substr($row1['indicator_name'],0,70)."</option>";
	}
	
	$data.="</select></td>
  </tr>
  <tr class='evenrow'>
 <td COLSPAN='2'><strong>Semi-Annual:</strong></td><td COLSPAN=''><select name='half_year' id='half_year' style='width:300px;' ><option value=''>-All-</option>";
/* if($_SESSION['half_year']<>'')$data.="<option value=\"".$_SESSION['half_year']."\" >".$_SESSION['half_year']."</option>";
	else 
	$data.="<option value=''>-All-</option>"; */
	$sel=mysql_query("select * from tbl_lookup where classCode='8' order by codeName asc")or die(http(0092));
	while($rowhalf= mysql_fetch_array($sel)){
	$selhalf=($_SESSION['half_year']==$rowhalf['codeName'])?"SELECTED":"";
	$data.="<option value=\"".$rowhalf['codeName']."\" ".$selhalf." >".$rowhalf['codeName']."</option>";
	}

	$data.="</select></td><TD>Year:</TD>
	<td><select name='year' id='year' ><option value=''>-All-</option>";
                $yr = date(Y); $end = $yr; do{
				$selyear=($_SESSION['year']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$selyear." >".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="</select> </TD>
	  
	  <TD><div style='float:right;'>	<input type='button' name='export' value='Go' onClick=\"xajax_view_classifiedccf(getElementById('subcomponent4').value,getElementById('output').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('indicator').value,getElementById('half_year').value,getElementById('year').value);return false;\" /></div></td>
  </tr>
  
  
  
  ";
  
  
  return $data;

}

//------cummulative--------xxxx--------------------
function filter_ProjectcumulativeResults(){
$data="<tr class='evenrow'>
    <td scope='col' colspan=2><B>Subcomponent:</b></td><td scope='col' colspan=5><select name='subcomponent' id='subcomponent4' style='width:300px;' >";
	

	
	if($_SESSION['usersubcomponent']<>''){
$query=mysql_query("select * from tbl_subcomponent where id like '".$_SESSION['usersubcomponent']."%' order by subcomponent_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
#$sel=($_SESSION['subcomponent1']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  } }
					  else {
					  $data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die(http(__line__));
	while($row1=mysql_fetch_array($query1)){
	$ccfsub=($_SESSION['ccfsubcomponent']==$row1['subcomponent'])?"SELECTED":"";
	$data.="<option value=\"".$row1['subcomponent']."\" ".$ccfsub.">".$row1['subcomponent_code']." ".substr($row1['subcomponent'],0,40)."</option>";
	}
	}
	
	$data.="</select><div style='float:right;'><a href='export_to_excel_word.php?linkvar=Export Cummulative Targets Against Actuals&&subcomponent=".$_SESSION['ccfsubcomponent']."&&output=".$_SESSION['ccfoutput']."&&activity=".$_SESSION['ccfactivity']."&&subactivity=".$_SESSION['ccfsubactivity']."&&indicator=".$_SESSION['indicator_110']."&&halfyear=".$_SESSION['half_year']."&&year=".$_SESSION['year']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></div></td>
  </tr>
  <tr class='evenrow'>
    <td scope='col' colspan=2><B>Output:</b></td><td scope='col' colspan=5><select name='output' id='output' style='width:300px;' >";
	if($_SESSION['ccfoutput']!='')$data.="<option value=\"".$_SESSION['ccfoutput']."\">".substr($_SESSION['ccfoutput'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_output WHERE subcomp_id like '".$_SESSION['usersubcomponent']."%' order by output_code asc") or die(http(__line__));
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value=\"".$row1['output_name']."\" >".$row1['output_code']." ".substr($row1['output_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
  <tr class='evenrow'>
    <td scope='col' colspan=2><B>Activity:</b></td><td scope='col' colspan=5><select name='activity' id='activity' style='width:300px;' >";
	if($_SESSION['ccfactivity']!='')$data.="<option value=\"".$_SESSION['ccfactivity']."\">".$row1['activity_code']." ".substr($_SESSION['ccfactivity'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_activity WHERE subcomp_id like '".$_SESSION['usersubcomponent']."%' order by activity_code asc") or die(http(__line__));
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value=\"".$row1['activity_name']."\" >".$row1['activity_code']." ".substr($row1['activity_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
<tr class='evenrow'>
    <td scope='col' colspan=2><B>Subactivity:</b></td><td scope='col' colspan=5><select name='subactivity' id='subactivity' style='width:300px;'><option value=''>-All-</option>";
	/* if($_SESSION['ccfsubactivity']!='')$data.="<option value=\"".$_SESSION['ccfsubactivity']."\">".substr($_SESSION['ccfsubactivity'],0,70)."</option>";
	else
	$data.=""; */
	$query1=mysql_query("select * from tbl_subactivity WHERE subcomponent_id like '".$_SESSION['usersubcomponent']."%' order by subactivity_code asc") or die(http(__line__));
	while($row1=mysql_fetch_array($query1)){
	$selsubactivity=($_SESSION['ccfsubactivity']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value=\"".$row1['subactivity_name']."\" ".$selsubactivity." >".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,70)."</option>";
	}
	
	$data.="</select></td>

  </tr>
<tr class='evenrow'>
    <td scope='col' colspan=2><B>Indicator:</b></td><td scope='col' colspan=5><select name='indicator' id='indicator' style='width:300px;' >";
	if($_SESSION['indicator_110']!='')$data.="<option value=\"".$_SESSION['indicator_110']."\">".substr($_SESSION['indicator_110'],0,70)."</option>";
	else
	$data.="<option value=''>-All-</option>";
	$query1=mysql_query("select i.indicator_name,i.subcomponent_id  from tbl_organizationreporting  tr left join tbl_indicator i on(tr.indicator_id=i.indicator_id) left join tbl_projectlifetargets plt on(tr.indicator_id=plt.indicator_id) left join view_ccfannualtarget at on(tr.indicator_id=at.indicator_id)  where i.indicator_id!=0 and  i.subcomponent_id like '".$_SESSION['usersubcomponent']."%'  group by tr.indicator_id order by tr.indicator_id asc") or die(http(__line__));
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<option value=\"".$row1['indicator_name']."\">".substr($row1['indicator_name'],0,70)."</option>";
	}
	
	$data.="</select></td>
  </tr>
  <tr class='evenrow'>
 <td COLSPAN='2'><strong>From: </strong><input type='text' name='fromDate'  id='fromDate' value=\"".$_SESSION['fromDate']."\"  size='25' readonly/>
							<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.ccf.fromDate); return false;\" hidefocus=''><img src='WeekPicker/calbtn.gif' alt='' name='popcal' width='34' height='22' border='0' align='absmiddle' id='popcal' /></a>
</td><TD colspan='3' >To:
	<input type='text' name='toDate'  id='toDate'  size='43' readonly/>
							<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.ccf.toDate); return false;\" hidefocus=''><img src='WeekPicker/calbtn.gif' alt='' name='popcal' width='34' height='22' border='0' align='absmiddle' id='popcal' /></a></TD>
	  
	  <TD><div style='float:right;'>	<input type='button' name='export' value='Go' onClick=\"xajax_view_cummulativeResults(getElementById('subcomponent4').value,getElementById('output').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('indicator').value,getElementById('fromDate').value,getElementById('toDate').value);return false;\" /></div></td>
  </tr>";
  
  
  return $data;

}





function filter_projectLifeFinancialTargets(){

$data="<tr>
<th scope='col' colspan='2'>Programme</th><th colspan=3>
      <select name='programme' size='1' id='programme100'><option value='%' >-All-</option>";
	  $query=mysql_query("select * from tbl_programme order by prog_id asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
  $sel=($_SESSION['programme100']==$row['program_name'])?"SELECTED":"";
	  $data.="<option value=\"".$row['program_name']."\" '".$sel."'>".$row['program_name']."</option>";
	  }
	  
	  $data.="</select><div style='float:right'>";
	  
	 $new_entry=(($_SESSION['role']<>'Monitoring and Evaluation') or ($_SESSION['role']<>'Finance and Admininistration'))?"":"<input name='New Entry' value='New Entry' type='button' onclick=\"xajax_projectLifeFinancialBudget('')\"/> | "; 
	  
	  $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export Project Life Financial Targets&&programme=".$_SESSION['programme100']."&&subcomponent=".$_SESSION['subcomponent100']."&&output=".$_SESSION['output100']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></div>
    </th>
   
  </tr>";

$data.="<tr> <th scope='col' colspan='2'>SUB-COMPONENT:</th> <th scope='col' colspan=2><select name='subcomponent' size='1' id='subcomponent100'>";
if($_SESSION['usersubcomponent']<>''){
  $query2=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."\"  order by id desc")or die(http(__line__));
	  while($row2=mysql_fetch_array($query2)){
	 #$selsubcomponent=($_SESSION['subcomponent100']==$row2['subcomponent'])?"SELECTED":"";

	  $data.="<option value=\"".$row2['subcomponent']."\" ".$selsubcomponent." >".$row2['subcomponent_code']." ".$row2['subcomponent']."</option>";
	  }

}
else {
$data.="<option value='' />-All-</option>";

	  $query2=mysql_query("select * from tbl_subcomponent  order by id desc")or die(http(__line__));
	  while($row2=mysql_fetch_array($query2)){
	 $selsubcomponent=($_SESSION['subcomponent100']==$row2['subcomponent'])?"SELECTED":"";

	  $data.="<option value=\"".$row2['subcomponent']."\" ".$selsubcomponent." >".$row2['subcomponent_code']." ".$row2['subcomponent']."</option>";
	  }
}
	  
	  $data.="</select></th><th></th></tr>
  <tr>


    <th scope='col' colspan='2'>Output</th><th colspan=2>
      <select name='output' size='1' id='output100' >";
	
	  $data.="<option value='' >-All-</option>";
	 
	  $query=mysql_query("select * from tbl_output where subcomp_id like '".$_SESSION['usersubcomponent']."%' order by output_code asc")or die(http(__line__));
	  while($row3=mysql_fetch_array($query)){
	   $selectedoutput=($_SESSION['output100']==$row3['output_name'])?"SELECTED":"";
	  $data.="<option value=\"".$row3['output_name']."\" ".$selectedoutput." >".$row3['output_code']." ".substr($row3['output_name'],0,100)."</option>";
	  }
	  
	  $data.="</select>
    </th> <th scope='col'><input name='search' type='button' value='Go' onclick=\"xajax_view_projectLifeFinancialBudget(getElementById('programme100').value,getElementById('subcomponent100').value,getElementById('output100').value);return false;\" /></th>
   
  </tr>";

return $data;


}





function filter_ProgramResultsProjectLifeFinancialTargets(){

$data="<tr class=evenrow>

    <td scope='col' colspan='2'>Programme</td><td colspan=3>
      <select name='programme100' size='1' id='programme100' class='combobox'><option value='%' >-All-</option>";
	  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
  $sel=($_SESSION['programme100']=$row['program_name'])?"SELECTED":"";
	  $data.="<option value=\"".$row['program_name']."\" '".$sel."'>".$row['program_name']."</option>";
	  }
	  
	  $data.="</select><div style='float:right'><a href='export_to_excel_word.php?linkvar=Export Project Life Financial Targets&&programme=".$_SESSION['programme100']."&&subcomponent=".$_SESSION['subcomponent100']."&&output=".$_SESSION['output100']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></div>
    </td>
   
  </tr>";
 
$data.="<tr class='evenrow'> <td scope='col' colspan='2'>SUB-COMPONENT:</td> <td scope='col' colspan=2><select name='subcomponent100' class='combobox' size='1' id='subcomponent100'>";
if($_SESSION['usersubcomponent']<>''){
 $query2s=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."\"  order by subcomponent_code desc")or die(http(__line__));
	  while($row2s=mysql_fetch_array($query2s)){
	   #$selected2s=($_SESSION['subcomponent100']==$row2s['subcomponent'])?"SELECTED":"";

	  $data.="<option value=\"".$row2s['subcomponent']."\" ".$selected2s." >".$row2s['subcomponent_code']." ".$row2s['subcomponent']."</option>";
	  }
}else {
$data.="<option value='' />-All-</option>";
	  
	  $query2=mysql_query("select * from tbl_subcomponent  order by subcomponent_code desc")or die(http(__line__));
	  while($row2=mysql_fetch_array($query2)){
	   $selected2=($_SESSION['subcomponent100']==$row2['subcomponent'])?"SELECTED":"";

	  $data.="<option value=\"".$row2['subcomponent']."\" ".$selected2." >".$row2['subcomponent_code']." ".$row2['subcomponent']."</option>";
	  }
	  }

	  
	  $data.="</select></td><td></td></tr>
  <tr class='evenrow'>


    <td scope='col' colspan='2'>Output</td><td colspan=2>
      <select name='output100' size='1' id='output100' class='combobox'>";
	/*   if($_SESSION['output100']!='')
	  $data.="<option value=\"".$_SESSION['output100']."\" >".$_SESSION['output100']."</option>";
	  else */
	  $data.="<option value='%' >-All-</option>";
	 
	  $query=mysql_query("select * from tbl_output where subcomp_id like '".$_SESSION['usersubcomponent']."%' order by output_code asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	   $selected2=($_SESSION['output100']==$row['output_name'])?"SELECTED":"";
	  $data.="<option value=\"".$row['output_name']."\" ".$selected2." >".$row['output_code']." ".$row['output_name']."</option>";
	  }
	  
	  $data.="</select>
    </td> <td scope='col'><input name='search' type='button' value='Go' onclick=\"xajax_view_projectLifeFinancialBudget(getElementById('programme100').value,getElementById('subcomponent100').value,getElementById('output100').value)\" /></td>
   
  </tr>";

return $data;


}











function filter_vcdActuals(){
#'".$_SESSION['usersubcomponent']."\",'".$activity_id."','".$org_code.",'".$orgname."'

$data="<tr class=''>
              <td colspan=3 class='green_field'>Program Monitoring  &raquo; ".ucwords($_SESSION['titlesubcomponent'])." 
  </td>
              <td colspan=2 class='green_field'><div align='right'>
                              
                <input name='new_entry' type='button' value='New Entry' onclick=\"xajax_new_valueChainFinancialActuals('".$_SESSION['usersubcomponent']."\",'','".$_SESSION['managerorg_code']."\",'".$_SESSION['orgName']."\");return false;\" />
                 <a href='export_to_excel_word.php?linkvar=Export Financial Actuals&&subcomponent=".$_SESSION['usersubcomponent']."&&org_code=".$_SESSION['managerorg_code']."&&orgname=".$_SESSION['orgName']."&&subactivity=".$_SESSION['subactivity107']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a> </div></td>
  </tr>
				 <tr>
              <td colspan='6'><hr/></td></tr>
		
		<tr class=evenrow>
              <td>
                <label>Year</label></td>
              <td>Quarter</td>
              <td>Sub-
                
              component</td>
              <td>Sub-Activity</td>
              <td>&nbsp;</td>
		</tr>
";
           
			
            $data.="<tr class=evenrow2>
              <td><select name='period' id='period'><option value='%'>-All-</option>";
                $yr = date(Y); $end = $yr; do{
$data.="<option value='$end'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="</select>
    </label></td>
    <td class=evenrow><label>
      <select name='quarter' id='quarter'><option value='%'>-All-</option>";
	   $query=mysql_query("select * from tbl_quarters order by quarterCode")or die(http(__line__));
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row2['quarterName']."\">".$row2['quarterName']."</option>";
	  }
              $data.="</select></td>
             
              <td><select name='subcomponent' id='subcomponent' >";
			 
$data.="
                <option value='%'>-All-</option>
                "; 

$query=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."' order by id asc")or die(http("411"));
while($row=mysql_fetch_array($query)){
$selected=$_SESSION['titlesubcomponent']==$row['subcomponent']?"SELECTED":"";
$data.="
                <option value=\"".$row['id']."\" '".$selected."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>
                ";
				
					  }  
$data.="</select></td><td><select name='subactivity' id='subactivity' >";		 
$data.="<option value='%'>-All-</option>
                "; 


$query=mysql_query("select * from tbl_subactivity where subcomponent_id='".$_SESSION['usersubcomponent']."' order by subact_id asc")or die(http("Filter-424"));
while($row=mysql_fetch_array($query)){

$data.="<option value=\"".$row['subcativity_name']."%'>".$row['subactivity_code']." ".substr($row['subactivity_name'],0,30)."</option>";
				
					  }  
$data.="</select></td>
              <td><input type='button' name='button' id='button' value='Go' onclick=\"xajax_view_valueChainFinancialActuals_Manager(getElementById('subcomponent').value,getElementById('subactivity').value,getElementById('period').value,getElementById('quarter').value);return false;\" /></td>
            </tr>
            ";

return $data;
}




function filter_vcdActuals_Manager(){
#'".$_SESSION['usersubcomponent']."\",'".$activity_id."','".$org_code.",'".$orgname."'

$data="<tr class=''>
              <td colspan=3 class='green_field'>Program Monitoring  &raquo; ".ucwords($_SESSION['titlesubcomponent'])." 
  </td>
              <td colspan=2 class='green_field'><div align='right'>
                              
                <input name='new_entry' type='button' value='New Entry' onclick=\"xajax_new_valueChainFinancialActuals_Manager('".$_SESSION['usersubcomponent']."\",'','".$_SESSION['managerorg_code']."\",'".$_SESSION['orgName']."\");return false;\" />
                 <a href='export_to_excel_word.php?linkvar=Export Financial Actuals&&subcomponent=".$_SESSION['usersubcomponent']."&&org_code=".$_SESSION['managerorg_code']."&&orgname=".$_SESSION['orgName']."&&subactivity=".$_SESSION['subactivity107']."&&quarter=".$_SESSION['quarterselected']."&&year=".$_SESSION['yearselected']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a> </div></td>
  </tr>
				 <tr>
              <td colspan='6'><hr/></td></tr>
		
		<tr class=evenrow>
              <td>
                <label>Year</label></td>
              <td>Quarter</td>
              <td>Sub-
                
              component</td>
              <td>Sub-Activity</td>
              <td>&nbsp;</td>
		</tr>
";
           
			
            $data.="<tr class=evenrow2>
              <td><select name='period' id='period'><option value='%'>-All-</option>";
                $yr = date(Y); $end = $yr; do{
				$selectedYEAR=($_SESSION['yearselected']==$end)?"SELECTED":"";
$data.="<option value='$end' '".$selectedYEAR."'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="</select>
    </label></td>
    <td class=evenrow><label>
      <select name='quarter' id='quarter'><option value='%'>-All-</option>";
	   $query=mysql_query("select * from tbl_quarters order by quarterCode")or die(http(__line__));
	  while($row2=mysql_fetch_array($query)){
	  $selectedQuarter=($_SESSION['quarterselected']==$row2['quarterName'])?"SELECTED":"";
	  $data.="<option value=\"".$row2['quarterName']."\" '".$selectedQuarter."'>".$row2['quarterName']."</option>";
	  }
              $data.="</select></td>
             
              <td><select name='subcomponent' id='subcomponent' >";
			 
$data.="
                <option value='%'>-All-</option>
                "; 

$query=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."' order by id asc")or die(http("492"));
while($row=mysql_fetch_array($query)){
$selected=$_SESSION['titlesubcomponent']==$row['subcomponent']?"SELECTED":"";
$data.="
                <option value=\"".$row['id']."\" '".$selected."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>
                ";
				
					  }  
$data.="</select></td><td><select name='subactivity' id='subactivity' >";		 
$data.="<option value='%'>-All-</option>
                "; 


$query=mysql_query("select * from tbl_subactivity where subcomponent_id='".$_SESSION['usersubcomponent']."' order by subact_id asc")or die(http("Filters-505"));
while($row=mysql_fetch_array($query)){

$data.="<option value=\"".$row['subcativity_name']."%'>".$row['subactivity_code']."".substr($row['subactivity_name'],0,30)."</option>";
				
					  }  
$data.="</select></td>
              <td><input type='button' name='button' id='button' value='Go' onclick=\"xajax_view_valueChainFinancialActuals_Manager(getElementById('subcomponent').value,getElementById('subactivity').value,getElementById('period').value,getElementById('quarter').value); return false;\" /></td>
            </tr>
            ";

return $data;
}







function filter_users(){

$data="
 <tr class=evenrow>
    <td scope='col' COLSPAN='3'>NAME</td>
    <td scope='col' COLSPAN=''>USENAME</td>
    <td scope='col'>USER GROUP</td>
    <td scope='col'>ROLE</td>
    <td scope='col'><input type='button' name='button' id='button' value='Add User' onclick=\"xajax_new_user();return false;\"  /></td>
    <td scope='col'><a href='export_to_excel_word.php?linkvar=Export User&&name=".$_SESSION['name1']."&&username=".$_SESSION['user1']."&&usergroup=".$_SESSION['usergroup1']."&&role=".$_SESSION['role1']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></td>
  </tr>
  <tr class=evenrow>
    <td COLSPAN=3><select id='name' >";
	if($_SESSION['name1']!='')
	$data.="<option  value=\"".$_SESSION['name1']."\">".$_SESSION['name1']."</option>";
	else
	$data.="<option  value=''>-All-</option>";
$query=mysql_query("select name from tbl_user where name<>'' order by name asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$data.="<option value=\"".$row['name']."\">".substr($row['name'],0,30)."</option>";

}

$data.="
    </select>   </td>
    <td><select name='username' id='username'>";
	if($_SESSION['user1']!='')
	$data.="<option  value=\"".$_SESSION['user1']."\">".$_SESSION['user1']."</option>";
	else
	$data.="<option  value=''>-All-</option>";
	
$query=mysql_query("select username from tbl_user order by username asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$data.="<option value=\"".$row['username']."\">".$row['username']."</option>";

}

$data.="</select>   
</td>
    <td><select name='usergroup' id='usergroup'>";
	if($_SESSION['usergroup1']!='')
	$data.="<option  value=\"".$_SESSION['usergroup1']."\">".$_SESSION['usergroup1']."</option>";
	else
	$data.="<option  value=''>-All-</option>";
$query=mysql_query("select * from tbl_usergroup where group_name<>'' order by group_name asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$data.="<option value=\"".$row['group_name']."\">".$row['group_name']."</option>";

}

$data.="</select>   
</td>
    <td><select name='role' id='role'>";
	if($_SESSION['role1']!='')
	$data.="<option  value=\"".$_SESSION['role1']."\">".$_SESSION['role1']."</option>";
	else
	$data.="<option  value=''>-All-</option>";
$query=mysql_query("select role from tbl_user  where role <> '' group by role order by role asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$data.="<option value=\"".$row['role']."\">".$row['role']."</option>";

}

$data.="</select>   
</td>
    <td><input type='button' name='search' id='search' value='Go' onclick=\" xajax_view_users(getElementById('name').value,getElementById('username').value,getElementById('usergroup').value,getElementById('role').value)\" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr >
    <th colspan='10'><div align='center'>User Details</div></th>
  </tr>
";

return $data;
}


function filter_systemlogs(){

$data="<tr class='evenrow'>
    <td width='144' scope='col'><di>
    <div align='left'><b>Log  ID</b> </div></td>
    <td width='84' scope='col'><div align='left'><b>Username</b></div></th>
    <td width='145' scope='col'><div align='left' colspan='3' ><b>Ip Address</b></div></th>
    <td width='209' colspan='3' scope='col' ><div align='right'><div style='float:left;'><b>Status</b></div> <a href='export_to_excel_word.php?linkvar=Export System Logins&&log_id=".$_SESSION['login_id']."&&username=".$_SESSION['username1']."&&ipaddress=".$_SESSION['ipaddress']."&&status=".$_SESSION['status']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></div></td>
  </tr>
  <tr class=evenrow>
    <td><label>
      <input type='text' name='logid' id='logid' value=\"".$_SESSION['login_id']."\" />
    </label></td>
    <td><label>
      <select name='username' id='username'>
	  <option value=''>-All-</option>";
	  if($_SESSION['username1']!='')
	 $data.="<option value=\"".$_SESSION['username1']."\">".$_SESSION['username1']."</option>";
	 else $data.="<option value=''>-All-</option>";
	  $query=mysql_query("select * from view_login group by username order by username asc")or die(http(__line__));
  while($row=mysql_fetch_array($query)){
  
	  	  $data.="<option value='%".$row['username']."\">".$row['username']."</option>";
		  
		  }
      $data.="</select>
    </label></td>
    <td colspan=''><input type='text' name='ipaddress'  id='ipaddress' value=\"".$_SESSION['ipaddress']."\"/></td><td colspan=2><select name='status' id='status'>";
	if($_SESSION['status']!='')
	 $data.="<option value=\"".$_SESSION['status']."\">".$_SESSION['status']."</option>";
	 else $data.="<option value=''>-All-</option>";
	  $query=mysql_query("select * from view_login group by status order by status asc")or die(http(__line__));
  while($row=mysql_fetch_array($query)){
  
	  	  $data.="<option value=\"".$row['status']."\">".$row['status']."</option>";
		  
		  }
      $data.="</select></td>
    <td><label>
      <input type='button' name='search' value='Go' onclick=\"xajax_view_login(getElementById('logid').value,getElementById('username').value,getElementById('ipaddress').value,getElementById('status').value,1,20);return false;\" />
    </label></td>
  </tr>";
return $data;


}



function filter_activityBasedPlanning(){
$data=" 
		 <tr class='evenrow'>
              <td colspan='4' class='green_field'><div style='float:right;'>";
				
				$new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":"<input name='new_entry' type='button' value='New Entry' onclick=\"xajax_newResultsBasedIndicatorProjectLifePlanning('".$_SESSION['activity']."','');return false;\" /> | ";
				
				$data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export aBi Trust Project Life Targets&&activity=".$_SESSION['indicatorType']."&&programme=".$_SESSION['subcomponent_id']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></div></td></tr>
		
		<tr class='evenrow' >
              <td colspan='2'>Type of Indicator:</td>
              <td colspan='2'><select name='typeofindicator' id='typeofindicator' style='width:300px;'
			  onChange=\"xajax_view_activityBasedPlanning('',this.value,'".$_SESSION['subcomponent_id']."');return false;\"
			   ><option value=''>-All-</option>";
			$data.=QueryManager::IndicatorTypeFilter($_SESSION['indicatorType']);
					  
$data.="</select></td><td></td>
        </tr>
		<tr class='evenrow' >
              <td colspan='2'>Sub-component:
                </td>
              <td colspan=''><select name='subcomponent' id='subcomponent' style='width:300px;'  onChange=\"xajax_view_activityBasedPlanning('','".$_SESSION['indicatorType']."',this.value);return false;\" ><option value=''>-All-</option>";
			$data.=QueryManager::SubcomponentFilter($_SESSION['subcomponent_id']);
					  
$data.="</select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_activityBasedPlanning('',getElementById('typeofindicator').value,getElementById('subcomponent').value)\" /></td>
        </tr>";
           
			
            $data.="
            <tr>
             
              <th colspan='4'><div align='center'><strong> Results Based Project Life Targets</strong></div></th>
            </tr>
            <tr class=evenrow2>
			<th width='50' class='evenrow2' colspan=>Select</th>
			  <th colspan='' class='evenrow2' >Subcomponent</th>
			  <th colspan='' class='evenrow2' >Indicator</th>
			  <th width='' class='evenrow2' align=right><b>Total</b></th>
            </tr>";

return $data;
}

function filter_subactivityBasedPlanning(){


$data="<tr class=''>
              <td colspan='3' class='green_field'>Planning &raquo; Sub-Activity Project Life Targets
                <label></label></td><td width='300' align=right colspan='2'>";
				
				$new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":"<input name='new_entry' type='button' value='New Entry' onclick=\"xajax_new_subactivityBasedIndicatorPlanning('".$activity."','','');return false;\" /> |";
				
				
				
				
				  $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export aBi Trust Project Life Targets&&activity=".$_SESSION['activity']."&&programme=".$_SESSION['programme']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td></tr>
				 <tr>
              <td colspan='5'><hr/></td></tr>";
			  $data.="<tr class=evenrow2>
             <td >Programme:</td><td colspan='4'> 
             <select name='programme' id='programme103' style='width:500px;' >
                <option value=''>-All-</option>";
				$q=mysql_query("select * from tbl_programme order by prog_id asc")or die(http(__line__));
				while($row=mysql_fetch_array($q)){
				$sel=($programme==$row['program_name'])?"SELECTED":"";
				$data.="<option value=\"".$row['program_name']."%'  '".$sel."'>".$row['program_name']."</option>";
				
				}
              $data.="</select>     </td>
            </tr>
		
		<tr class=evenrow>
              <td colspan=''>Sub-component:
                <label></label></td>
              <td colspan='4'><select name='subcomponent' id='subcomponent103' style='width:500px;' >";
			  if($_SESSION['usersubcomponent']<>''){
			  
	$query=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."\" order by subcomponent_code asc")or die(http(627));
while($row=mysql_fetch_array($query)){
#$sel=($_SESSION['subcomponent11']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."%' '".$sel."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
			  }else {
	
$data.="<option value=''>-All-</option>"; 
$querysc=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(__line__));
while($rowsc=mysql_fetch_array($querysc)){
$sel=($_SESSION['subcomponent11']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$rowsc['subcomponent']."\" ".$sel." >".$rowsc['subcomponent_code']." ".$rowsc['subcomponent']."</option>";
				
					  
					  }}
$data.="</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Output:
                <label></label></td>
              <td colspan='4'><select name='output' id='output103' style='width:500px;' >";
	
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_output where subcomp_id like '".$_SESSION['usersubcomponent']."%' order by output_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$sel=($_SESSION['output']==$row['output_name'])?"SELECTED":"";
$data.="<option value=\"".$row['output_name']."%' '".$sel."'>".$row['output_code']." ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Activity:
                <label></label></td>
              <td colspan='4'><select name='activity' id='activity103' style='width:500px;' >";
	
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_activity where subcomp_id like '".$_SESSION['usersubcomponent']."%' order by activity_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$sel=($_SESSION['activity']==$row['activity_name'])?"SELECTED":"";
$data.="<option value=\"".$row['activity_name']."%' '".$sel."'>".$row['activity_code']." ".$row['activity_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Sub-Activity:
                <label></label></td>
              <td colspan='4'><select name='subactivity' id='subactivity103' style='width:500px;' >";
	
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subactivity where subcomponent_id like '".$_SESSION['usersubcomponent']."%'  order by subactivity_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$sel=($_SESSION['subactivity']==$row['subactivity_name'])?"SELECTED":"";
$data.="<option value=\"".$row['subactivity_name']."\" ".$sel." >".$row['subactivity_code']." ".substr($row['subactivity_name'],0,70)."</option>";
				
					  }  
$data.="</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Indicator:
                <label></label></td>
              <td colspan='3'><select name='indicator' id='indicator103' style='width:500px;' >";
	
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator where subcomponent_id like '".$_SESSION['usersubcomponent']."%'  group by indicator_name order by indicator_name asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
#$sel=($_SESSION['']==$row['indicator_name'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_name']."\" >".substr($row['indicator_name'],0,70)."</option>";
//'".$activity."',getElementById('programme103').value,getElementById('subcomponent103').value,getElementById('output103').value,getElementById('activity103').value,getElementById('subactivity103').value,getElementById('indicator103').value

					  }  
$data.="</select></td><td align='right'><input name='search' type='button' value='Go' onClick=\"xajax_subActivityBasedIndicatorPlanning('".$activity."',getElementById('programme103').value,getElementById('subcomponent103').value,getElementById('output103').value,getElementById('activity103').value,getElementById('subactivity103').value,getElementById('indicator103').value);return false;\" /></td>
        </tr>

            <tr class='evenrow'>
             
              <td colspan='5' class='evenrow'><div align='center'><strong> Sub-Activity Based Project Life Targets</strong></div></td>
            </tr>
            <tr class=evenrow2>
			<td width='50' class='evenrow2' colspan=''>Select</td>
			<td colspan='' class='evenrow2' >Code</td>
			<td colspan='' class='evenrow2' >Subactivity</td>
			  <td colspan='' class='evenrow2' >Indicator</td>
			  <td width='' class='evenrow2' align=right><b>Total</b></td>
            </tr>";

return $data;
}


function filter_aBiTrustBasedPlanning(){
$data=" 
		 <tr class=''>
              <td colspan='2' class='green_field'>Planning &raquo; Results Based Project Life Targets
                <label></label></td><td width='300' align=right><input name='new_entry' type='button' value='New Entry' onclick=\"xajax_new_ABTrustBasedIndicatorPlanning('".$activity."','');return false;\" /> <a href='export_to_excel_word.php?linkvar=Export aBi Trust Project Life Targets&&activity=".$_SESSION['activity']."&&programme=".$_SESSION['programme']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td></tr>
				 <tr>
              <td colspan='3'><hr/></td></tr>";
		
		
			
           $data.="<tr class=evenrow>
              <td colspan='3'>Programme: 
           <select name='programme' id='programme' onchange=\"xajax_ABTrustBasedIndicatorPlanning('abi trust',getElementById('programme').value)\" style='width:500px;' >
                <option value=''>-All-</option>";
				$q=mysql_query("select * from tbl_programme order by prog_id asc")or die(http(__line__));
				while($row=mysql_fetch_array($q)){
				$sel=($_SESSION['programme101']==$row['program_name'])?"SELECTED":"";
				$data.="<option value=\"".$row['program_name']."%'  '".$sel."'>".$row['program_name']."</option>";
				
				}
              $data.="</select>     </td>
            </tr>
            <tr class='evenrow'>
             
              <td colspan='3' class='evenrow'><div align='center'><strong> aBi Trust Project Life Targets</strong></div></td>
            </tr>
            <tr class=evenrow2>
			<td width='50' class='evenrow2' colspan=''>Select</td>
			  <td colspan='' class='evenrow2' >Indicator</td>
			  <td width='' class='evenrow2' align=right><b>Total</b></td>
            </tr>";

return $data;
}








function filter_resultsBasedIndicator(){
 $data=" 
		 <tr class=''>
              <td colspan='8' class='green_field'>Planning &raquo; Physical Project Life Targets
                <label></label></td></tr>
				 <tr>
              <td colspan='8'><hr/></td></tr>
		 <tr class=evenrow2>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='6'><select name='planning_type' id='planning_type' onchange=\"xajax_reload_newActivityBasedPlanning(getElementById('planning_type').value)\"><option value=''>-Select-</option>";
			
$queryt=mysql_query("select distinct(indicator_type) from tbl_indicator group by indicator_type order by indicator_type asc")or die(http(__line__));
while($rowt=mysql_fetch_array($queryt)){
if($_SESSION['activity']!='')
$selected=$row['indicator_type']==$rowt['indicator_type']?"SELECTED":"";
//$data.="<option value=\"".$_SESSION['activity']."\">".$_SESSION['activity']."</option>";

$data.="<option value=\"".$rowt['indicator_type']."\" '".$selected."'>".$rowt['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='6'><select name='subcomponent' id='subcomponent' onchange=\"xajax_reload_newProjectLifeTarget_subcomponent(getElementById('subcomponent').value)\">";
			  if($_SESSION['PLTsubcomponent_id']!='')
$data.="<option value=\"".$_SESSION['PLTsubcomponent_id']."\">".$_SESSION['PLTsubcomponent_code']." ".$_SESSION['PLTsubcomponent']."</option>";

else
$data.="<option value=''>-Select-</option>"; 
$querysc=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(__line__));
while($rowsc=mysql_fetch_array($querysc)){
$data.="<option value=\"".$rowsc['id']."\">".$rowsc['subcomponent_code']." ".$rowsc['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
";
          
			
            $data.="<tr class=evenrow2>
              <td colspan='2'>Period</td>
              <td colspan='6'><select name='period' id='period'>
                <option value='4'>4Yrs</option>
              </select>              </td>
            </tr>";

return $data;
}


function filter_narratives(){
$data="<tr>
    <th width='' scope='col' >Year <select name='year'><option value=''>-All-</option>";
           $year=date(Y); $end=$year;
		   do{
		   $data.="<option value=\"".$end."'>".$end."</option>";
		   $end--;}
		   while($end>=2010);
                $data.="</select>  </th><th>REPORTING PERIOD<select name='reportingperiod'><option value=''>-All-</option>";
           $ss=mysql_query("select * from tbl_quarters order by quarterCode asc ")or die(http(__line__));
		   while($r=mysql_fetch_array($ss)){
		   $data.="<option value=\"".$r['quarterName']."%'>".$r['quarterName']."</option>";}
                $data.="</select></th>
    <th width='' scope='col' colspan=2><input type='button' name='button' id='button' value='Export to Excel' />";
	 if($_SESSION['role']=='Managing Director')
		$data.="";
		else if($_SESSION['role']=='Chief Technical Advisor')
		$data.="";
		else{
    $data.="<input type='button' name='button2' id='button2' value='New Entry' onclick=\"xajax_new_narrative()\"/>";
	}
	$data.="</th>
  </tr>
  <tr>
    <th width='' scope='col' >SUB-COMPONENT </th><th>  <select name='select'><option value=''>-All-</option>";
            $query=mysql_query("select * from tbl_subcomponent order by id")or die(http(__line__));
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row2['id']."%'>".$row2['subcomponent_code']." ".$row2['subcomponent']."</option>";
	  }
                $data.="</select></th>
    <th width='' scope='col' colspan=2></th>
  </tr>
   <tr>
    <th width='' scope='col' >INDICATOR</th><th colspan=3> <select name='indicator_id' id='indicator_id'><option value=''>-All-</option>";
            $query=mysql_query("select * from tbl_indicator order by indicator_id")or die(http(__line__));
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row2['indicator_id']."%'>".substr($row2['indicator_name'],0,50)."</option>";
	  }
                $data.="</select></th>
    
  </tr>
";

}



function filter_userGroup(){
$data.=" <table width='600'><tr>
    
  <tr>
    <th scope='col'>&nbsp;</th>
    <th scope='col'><div align='right'>GROUP NAME</div></th>
    <th scope='col'><div align='left' width=100>
      <select name='group_name' id='group_name'>";
       $query=mysql_query("select * from tbl_usergroup where group_name <> '' order by group_name asc")or die(http(__line__));
  while($row=mysql_fetch_array($query)){
  $data.="<option value=\"".$row['group_name']."%'>".substr($row['group_name'],0,30)."</option>";
   }
      $data.="</select>
    </div></th>
    <th scope='col' align=right><div id='' align='right'><input name='' type='button' value='Export to Excel' /> <input name='newentry' type='button' value='New Entry' onclick=\"xajax_new_usergroup()\" /> </div></th>
  </tr></table>";
return $data;
}



function filter_activityBasedIndicator(){
$data.=" <tr>
             
			  <tr><td colspan=''>Indicator Type <select name='planning_type' id='planning_type' onchange=\"xajax_selectActivityBasedReporting(getElementById('planning_type').value)\" >";
			if($_SESSION['activity']!='')
			$data.="<option value=\"".$_SESSION['activity']."\">".$_SESSION['activity']."</option>";
$data.="<option value=''>-Select-</option>"; 
$query=mysql_query("select distinct(indicator_type) from tbl_indicator group by indicator_type order by indicator_type asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$data.="<option value=\"".$row['indicator_type']."\">".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td><td>
			  Year <select name='year' id='year'>
			  <option value='%'>-All-</option>
				  <option value='2011'>2011</option>
				  <option value='2012'>2012</option>
				  <option value='2013'>2013</option>
                  <option value='2010'>2010</option>
				  <option value='2011'>2011</option>
				  <option value='2012'>2012</option>
				  <option value='2013'>2013</option>
              </select>
			  </td></tr>
 

            <tr>
            ";
return $data;

}
//



 function selectfis(){
//$obj=new xajaxResponse();
$data="
  <tr>
    <td><div align='right'>Quarterly Reporting Category:</div></td>
    <td><select name='project_lifeplanning' id='project_lifeplanning' onChange=\"xajax_switchValueChainQuarterlyReporting(getElementById('project_lifeplanning').value,'".$org_code."','".$orgname."');return false;\">";
	  $data.="<option value=''>-Select-</option>";
	   if($_SESSION['usersubcomponent']=='2'){
        $data.="<option value='Line of credit'>Line of credit</option>
		<option value='Memorandum of Understanding (MOU)'>Memorandum of Understanding (MOU)</option>
		<option value='Grants'>Grants</option>
		<option value='New Branches'>New Branches</option>";
		$query=mysql_query("select * from tbl_lookup where classCode=4")or die(http(__line__));
		while($row=mysql_fetch_array($query)){
        $data.="<option value=\"".$row['codeName']."\">".$row['codeName']."</option>";
	        }
		}
		else{
		$query=mysql_query("select * from tbl_lookup where classCode='4'")or die(http(__line__));
		while($row=mysql_fetch_array($query)){
        $data.="<option value=\"".$row['codeName']."\">".$row['codeName']."</option>";
			}
		}
      $data."</select></td>

  </tr>";
return $data;
}
/*
 
 function selectfis(){
//$obj=new xajaxResponse();
$data="
 <tr class='evenrow'>
    <td align='right' colspan=''>Quarterly Reporting Category</td>
    <td colspan=''><select name='project_lifeplanning' id='project_lifeplanning' onChange=\"xajax_switchValueChainQuarterlyReporting(getElementById('project_lifeplanning').value,'".$org_code."','".$orgname."');return false;\">";
	  $data.="<option value=''>-Select-</option>";
	   if($_SESSION['usersubcomponent']=='2'){
        $data.="<option value='Line of credit'>Line of credit</option>
		<option value='Memorandum of Understanding (MOU)'>Memorandum of Understanding (MOU)</option>
		<option value='Grants'>Grants</option>
		<option value='New Branches'>New Branches</option>";
		$query=mysql_query("select * from tbl_lookup where classCode=4")or die(http(__line__));
		while($row=mysql_fetch_array($query)){
        $data.="<option value=\"".$row['codeName']."\">".$row['codeName']."</option>";
	        }
		}
		else{
		$query=mysql_query("select * from tbl_lookup where classCode='4'")or die(http(__line__));
		while($row=mysql_fetch_array($query)){
        $data.="<option value=\"".$row['codeName']."\">".$row['codeName']."</option>";
			}
		}
      $data."</select></td>
  </tr>
 ";
return $data;
}
 
  */
 

function filter_g4ggrid(){

$data="<table width='100%' border='0'>
  <tr>
    <th width='44' scope='col'>Year</th>
    <th width='342' scope='col'><div align='left'>Reporting Period </div></th>
    <th width='105' scope='col'><label>
      <div align='right'>
        <input type='button' name='Submit2' value='Export to Excel' />
      </div>
    </label></th>
    <th width='87' scope='col'><label>
      <input type='button' name='Submit' value='New Entry' onclick=\"xajax_new_genderForGrowth()\" />
    </label></th>
  </tr>
  <tr>
    <td class='evenrow'><label>
      <select name='select'>";
	    $yr = date(Y); $end = $yr; do{
$data.="<option value='$end'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="</select>
    </label></td>
    <td class=evenrow><label>
      <select name='select2'>";
	   $query=mysql_query("select * from tbl_organizationreporting order by reportingPeriod")or die(http(__line__));
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row2['reportingPeriod']."\">".$row2['reportingPeriod']."</option>";
	  }
      $data.="</select>
    </label></td>
    <td class=evenrow align=right><label>
      <input type='button' name='search' value='Go' />
    </label></td>
    <td class=evenrow>&nbsp;</td>
  </tr>
  <tr>
    <th colspan='7'><div align='center'><strong> GENDER FOR GROWTH</strong></div></th>
  </tr>
</table>
";
return $data;
}


function filter_spsgrid(){

$data="

  <tr>
    <th width='' scope='col' colspan='2'>Year</th>
    <th scope='col' colspan='2'><div align='left'  >Reporting Period </div>      <label> </label></th>
    <th width='=' scope='col' colspan='4' ><div align='left'>Indicator</div>      <label></label></th><th width='100'><input type='button' name='Submit2' value='Export to Excel' /></th><th width='74'><input type='button' name='new_entry' value='New Entry' onclick=\"xajax_new_spsQMS()\" /></th>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value='%'>-ALL-</option>
        ";
	    $yr = date(Y); $end = $yr; do{
$selected=$_SESSION['year']==$end?"SELECTED":"";
$data.="<option value=\"".$end."' '".$selected."'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
    <td class=evenrow colspan='2'><select name='quarter' id='quarter'>
      <option value='%'>-ALL-</option>";
      $query=mysql_query("select * from tbl_quarters order by quarterCode asc ")or die(http(__line__));
      while($row=mysql_fetch_array($query)){
	  $selected=$_SESSION['quarter1']==$row['quarterName']?"SELECTED":"";
      $data.="<option value=\"".$row['quarterName']."\" '".$selected."'>".$row['quarterName']."</option>";
      }
    $data.="</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value='%'>-ALL-</option>";
    $query=mysql_query("select * from tbl_indicator where subcomponent_id='3' group by indicator_name order by indicator_id asc ")or die(http("Flters-1183"));
      while($row=mysql_fetch_array($query)){
	   $selected=$_SESSION['indicator']==$row['indicator_name']?"SELECTED":"";
      $data.="<option value=\"".$row['indicator_name']."\"  '".$selected."' >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class=evenrow><label>
      <input type='button' name='search' value='Go' onclick=\"xajax_search_spsQMS(getElementById('year').value,getElementById('quarter').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='10'><div align='center'><strong>TRADE RELATED SPS AND QUALITY MANAGEMENT SYSTEM </strong></div></th>
  </tr>

";
return $data;
}



function filter_fisgrid(){

$data="
  <tr>
    <th width='' scope='col'>Year</th>
    <th width='' scope='col' colspan=7><div align='left'>Reporting Period </div></th>
    <th width='' scope='col'><label>
      <div align='right'>
        <input type='button' name='export' value='Export to Excel' />
      </div>
    </label></th>
    <th width='' scope='col'><label>
      <input type='button' name='Submit' value='New Entry' onclick=\"xajax_new_financialServices()\" />
    </label></th>
  </tr>
  <tr>
    <td class='evenrow'><label>
      <select name='year' id='year'> <option value='%'>-ALL-</option>";
 $yr = date(Y); $end = $yr; do{
$data.="<option value='$end'>".$end."</option>";
$end--;} while ($end>= 2010);
 
 /* $query=mysql_query("select * from tbl_organizationreporting group by year order by reportingPeriod")or die(http(__line__));
	  while($row1=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row1['year']."\">".$row1['year']."</option>";
	  }
 */
    $data.="</select>
    </label></td>
    <td class='evenrow' colspan='7'><label>
      <select name='reportingperiod' id='reportingperiod' onChange=\"xajax_searchFinancialServices(getElementById('year').value,getElementById('reportingperiod').value);return false;><option value='%'>-ALL-</option>";
	  
	  $query=mysql_query("select * from tbl_quarters group by quarterName order by quarterCode")or die(http(__line__));
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row2['quarterName']."\">".$row2['quarterName']."</option>";
	  }
      $data.="</select>
    </label></td>
    <td class=evenrow><label>
    
    </label></td>
    <td class=evenrow>&nbsp;</td>
  </tr>
  <tr>
    <th colspan='10'><div align='center'><strong>FINANCIAL SERVICES </strong></div></th>
  </tr>

";
return $data;
}

function filter_vcdgrid(){

$data=" <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Reporting Period </div>      <label> </label></td>
    <td width='=' scope='col' colspan='7' ><div align='left'>Indicator</div>      <label></label></td><td width='100'><input type='button' name='Submit' value='New Entry' onclick=\"xajax_new_valueChainDevelopment('','','','".$_SESSION['orgName']."\",'".$_SESSION['ReportingPeriod']."\")\" /></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export Results Indicators&&subcomponent=".$subcomponent."&&org_code=".$_SESSION['managerorg_code']."&&orgname=".$orgname."&&year=".$_SESSION['year106']."&&quarter=".$_SESSION['ReportingPeriod']."&&indicator=".$_SESSION['indicator106']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
	    $yr = date(Y); $end = $yr; do{
$sel=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
    <td class=evenrow colspan='5'><select name='quarter' id='quarter'>
      <option value=''>-ALL-</option>";
      $query=mysql_query("select * from tbl_quarters order by quarterCode asc ")or die(http(__line__));
      while($row=mysql_fetch_array($query)){
	  $selected=($_SESSION['ReportingPeriod']==$row['quarterName'])?"SELECTED":"";
      $data.="<option value=\"".$row['quarterName']."\" ".$selected.">".$row['quarterName']."</option>";
      }
    $data.="</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";
   
	$query=mysql_query("select * from view_organizationreporting where subcomponent_id='".$_SESSION['usersubcomponent']."' group by indicator_name order by indicator_id asc ")or die(http("Filters-1287"));
      while($row=mysql_fetch_array($query)){
	   $selected=$_SESSION['indicator106']==$row['indicator_name']?"SELECTED":"";
      $data.="<option value=\"".$row['indicator_name']."\"  ".$selected." >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class=evenrow><label>
      <input type='button' name='search' value='Go' onclick=\"xajax_view_valueChainDevelopment('".$_SESSION['managerorg_code']."\",'".$_SESSION['orgName']."\",getElementById('year').value,getElementById('quarter').value,getElementById('indicator').value,'".$_SESSION['ReportingPeriod']."\");return false;\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='13'><div align='center'><strong>".$_SESSION['titlesubcomponent']." (".$_SESSION['orgName'].")</strong></div></th>
  </tr>

";
return $data;
}





function filter_vcdgrid_Manager(){

$data=" <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Reporting Period </div>      <label> </label></td>
    <td width='=' scope='col' colspan='4' ><div align='left'>Indicator</div>      <label></label></td><td width='100'><input type='button' name='Submit' value='New Entry' onclick=\"xajax_new_valueChainDevelopment_Manager('','','','')\" /></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export Results Indicators&&subcomponent=".$subcomponent."&&org_code=".$org_code."&&orgname=".$orgname."&&year=".$_SESSION['year106']."&&quarter=".$quarter."&&indicator=".$_SESSION['indicator106']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
	    $yr = $_SESSION['ABIActiveyear']; $end = $yr; do{
$sel=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
    <td class=evenrow colspan='2'><select name='quarter' id='quarter'>
      <option value='%'>-ALL-</option>";
      $query=mysql_query("select * from tbl_quarters order by quarterCode asc ")or die(http(__line__));
      while($row=mysql_fetch_array($query)){
	  $selected=($_SESSION['quarterselected']==$row['quarterName'])?"SELECTED":"";
      $data.="<option value=\"".$row['quarterName']."\" ".$selected.">".$row['quarterName']."</option>";
      }
    $data.="</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";
   
	$query=mysql_query("select * from view_organizationreporting where subcomponent_id='".$_SESSION['usersubcomponent']."' group by indicator_name order by indicator_id asc ")or die(http("Filters-1342"));
      while($row=mysql_fetch_array($query)){
	   $selected=$_SESSION['indicator106']==$row['indicator_name']?"SELECTED":"";
      $data.="<option value=\"".$row['indicator_name']."\"  ".$selected." >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class=evenrow><label>
      <input type='button' name='search' value='Go' 
	  onclick=\"xajax_view_valueChainDevelopment_Manager('".$_SESSION['managerorg_code']."\",'".$_SESSION['orgName']."\",getElementById('year').value,getElementById('quarter').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  

";
return $data;
}



function filter_DCEDvcdgrid_Manager(){





$data.="<tr class='evenrow'>
    <td colspan=3 >Target Type:</td>
    <td colspan='10'><select name='type' id='type' style='width:500px;' onchange=\"xajax_(getElementById('type').value);return false;\"><option value=''>-select-</option>";
	
	$queryx=mysql_query("select * from tbl_lookup where classCode='9' order by code asc") or die(http(2289));
	while($row=mysql_fetch_array($queryx)){
	  $$selx=($_SESSION['type']==$row['codeName'])?"SELECTED":"";
 $data.="<option value=\"".$row['codeName']."\" ".$selx." >".$row['codeName']."</option>";
	  }
	  
      $data.="</select></td>
  </tr>";
$data=" <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Reporting Period </div>      <label> </label></td>
    <td width='=' scope='col' colspan='4' ><div align='left'>Indicator</div>      <label></label></td><td width='100'><input type='button' name='Submit' value='New Entry' onclick=\"xajax_new_DCEDvalueChainDevelopment_Manager('','','','','','','');\" /></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export Results Indicators&&subcomponent=".$subcomponent."&&org_code=".$org_code."&&orgname=".$orgname."&&year=".$_SESSION['year106']."&&quarter=".$quarter."&&indicator=".$_SESSION['indicator106']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value='%'>-ALL-</option>
        ";
	    $yr = date(Y); $end = $yr; do{
$sel=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."' '".$sel."'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
    <td class=evenrow colspan='2'><select name='quarter' id='quarter'>
      <option value='%'>-ALL-</option>";
      $query=mysql_query("select * from tbl_quarters order by quarterCode asc ")or die(http(__line__));
      while($row=mysql_fetch_array($query)){
	  $selected=($_SESSION['quarterselected']==$row['quarterName'])?"SELECTED":"";
      $data.="<option value=\"".$row['quarterName']."\" '".$selected."'>".$row['quarterName']."</option>";
      }
    $data.="</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";
   
	$query=mysql_query("select * from view_organizationreporting where subcomponent_id='".$_SESSION['usersubcomponent']."' group by indicator_name order by indicator_id asc ")or die(http("Filters-1412"));
      while($row=mysql_fetch_array($query)){
	   $selected=$_SESSION['indicator106']==$row['indicator_name']?"SELECTED":"";
      $data.="<option value=\"".$row['indicator_name']."\"  '".$selected."' >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class=evenrow><label>
      <input type='button' name='search' value='Go' 
	  onclick=\"xajax_view_DCEDvalueChainDevelopment_Manager('".$_SESSION['managerorg_code']."\",'".$_SESSION['orgName']."\",getElementById('year').value,getElementById('quarter').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='10'><div align='center'><strong>".$_SESSION['titlesubcomponent']." (".$_SESSION['orgName'].")</strong></div></th>
  </tr>

";
return $data;
}



function filter_vcdgrid_actuals(){

$data=" <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Sub-Activity </div>      <label> </label></td>
    <td width='=' scope='col' colspan='4' ><div align='left'>Indicator</div>      <label></label></td><td width='100'></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export Annual Actuals vs Targets&&subcomponent=".$_SESSION['usersubcomponent']."&&subactivity=".$_SESSION['subactivityActual']."&&year=".$_SESSION['year106']."&&indicator=".$_SESSION['indicator106']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='eve nrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
	    $yr = date(Y); $end = $yr; do{
$sel=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel." >".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
    <td class=evenrow colspan='2'><select name='subactivity' id='subactivity'>
      <option value=''>-ALL-</option>";
	$sel=mysql_query("select i.indicator_id,i.indicator_name,i.subcomponent_id,s.subact_id,s.subactivity_code,s.subactivity_name from tbl_indicator i  inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) inner join tbl_subactivity s on(i.subactivity_id=s.subact_id) where subactivity_name <> '' and i.subcomponent_id like '".$_SESSION['usersubcomponent']."%' group by s.subact_id order by subactivity_code")or die(http("Filter-1459"));
	while($row1=mysql_fetch_array($sel)){
	$s=($_SESSION['subactivityActual']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value=\"".$row1['subactivity_name']."\" ".$s." >".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,50)."</option>";
	
	
	}
	
	
    $data.="</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";
   
	$query=mysql_query("select * from view_organizationreporting where subcomponent_id='".$_SESSION['usersubcomponent']."' group by indicator_name order by indicator_id asc ")or die(http("Filters-1470"));
      while($row=mysql_fetch_array($query)){
	   $selected=$_SESSION['indicator106']==$row['indicator_name']?"SELECTED":"";
      $data.="<option value=\"".$row['indicator_name']."\" ".$selected." >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class=evenrow><label>
      <input type='button' name='search' value='Go' onclick=\"xajax_view_valueChainDevelopmentAnnualTargetvsActuals(getElementById('year').value,getElementById('subactivity').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='10'><div align='center'><strong>".$_SESSION['titlesubcomponent']." (".$_SESSION['orgName'].")</strong></div></th>
  </tr>

";
return $data;
}



function filter_DCEDvcdgrid_actuals(){

$data=" <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Intervention </div>      <label> </label></td>
    <td width='=' scope='col' colspan='4' ><div align='left'>Indicator</div>      <label></label></td><td width='100'></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export Annual Actuals vs Targets&&subcomponent=".$_SESSION['usersubcomponent']."&&subactivity=".$_SESSION['subactivityActual']."&&year=".$_SESSION['year106']."&&indicator=".$_SESSION['indicator106']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
	    $yr = date(Y); $end = $yr; do{
$sel=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel." >".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
    <td class=evenrow colspan='2'><select name='intervention' id='intervention' style='width:300px;'>
      <option value=''>-ALL-</option>";
	$sel=mysql_query("select i.indicator_id,i.subcomponent_id,i.indicator_name,intv.intervention,i.intervention_id from tbl_indicator i  inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) inner join tbl_intervention intv on(i.intervention_id=intv.intervention_id) where i.subcomponent_id like '".$_SESSION['usersubcomponent']."%'  && i.indicator_type like 'DCED Based%' && i.expected_output like 'Quantitative%' group by i.intervention_id order by intervention asc ")or die(http(__line__));
	while($row1=mysql_fetch_array($sel)){
	$s=($_SESSION['subactivityActual']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value=\"".$row1['intervention']."\" ".$s.">".substr($row1['intervention'],0,50)."</option>";
	
	
	}
	
	
    $data.="</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'  style='width:300px;' ><option value=''>-ALL-</option>";
   
	$query=mysql_query("select i.indicator_id,i.indicator_name,i.indicator_type,intv.intervention,i.intervention_id,i.subcomponent_id from tbl_indicator i  inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) inner join tbl_intervention intv on(i.intervention_id=intv.intervention_id)   where i.subcomponent_id='".$_SESSION['usersubcomponent']."\" && i.indicator_type like 'DCED Based%' && i.expected_output like 'Quantitative%' group by indicator_name order by indicator_name asc ")or die(http(__line__));
      while($row=mysql_fetch_array($query)){
	   $selected=($_SESSION['indicator106']==$row['indicator_name'])?"SELECTED":"";
      $data.="<option value=\"".$row['indicator_name']."\"  ".$selected." >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class=evenrow><label>
      <input type='button' name='search' value='Go' onclick=\"xajax_view_DCEDvalueChainDevelopmentAnnualTargetvsActuals(getElementById('year').value,getElementById('subactivity').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='10'><div align='center'><strong>DCED ".$_SESSION['titlesubcomponent']." (".$_SESSION['orgName'].")</strong></div></th>
  </tr>

";
return $data;
}


function filter_abitrust(){

$data=" <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Category </div>      <label> </label></td>
    <td width='=' scope='col' colspan='4' ><div align='left'>Indicator</div>      <label></label></td><td width='100'><input type='button' name='Submit' value='New Entry' onclick=\"xajax_new_abiTrustResults('')\" /></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export aBi Trust Results&&year=".$_SESSION['year106']."&&abitrust_category=".$_SESSION['abitrust_category']."&&indicator=".$_SESSION['indicator106']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
	    $yr = date(Y); $end = $yr; do{
$sel=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."' '".$sel."'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
    <td class=evenrow colspan='2'><select name='abi_category' id='abi_category'>
      <option value=''>-ALL-</option>";
      $query1=mysql_query("select * from tbl_indicator where abitrust_category <> ''  group by abitrust_category order by abitrust_category asc")or die(http(__line__));
      while($row1=mysql_fetch_array($query1)){
	 $selected=$_SESSION['abitrust_category']==$row1['abitrust_category']?"SELECTED":"";
      $data.="<option value=\"".$row1['abitrust_category']."\" '".$selected."'>".$row1['abitrust_category']."</option>";
      }
    $data.="</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";
   
	$query=mysql_query("select * from view_organizationreporting where indicator_type like 'aBi Trust%' group by indicator_name order by indicator_id asc ")or die(http(__line__));
      while($row=mysql_fetch_array($query)){
	   $selected=$_SESSION['indicator106']==$row['indicator_name']?"SELECTED":"";
      $data.="<option value=\"".$row['indicator_name']."\"  '".$selected."' >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class=evenrow><label>
      <input type='button' name='search' value='Go' onclick=\"xajax_view_abiTrustResults(getElementById('year').value,getElementById('abi_category').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='10'><div align='center'><strong>aBi Trust Monitoring</strong></div></th>
  </tr>

";
return $data;
}


#-------------------------------filter_abiTrustResults--------------------------------------------------------
function filter_abiTrustResults(){

$data=" <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Category </div>      <label> </label></td>
    <td width='=' scope='col' colspan='4' ><div align='left'>Indicator</div>      <label></label></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export aBi Trust  Annual Results&&year=".$_SESSION['year106']."&&abitrust_category=".$_SESSION['abitrust_category']."&&indicator=".$_SESSION['indicator106']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
	    $yr = date(Y); $end = $yr; do{
$sel=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."' '".$sel."'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
    <td class=evenrow colspan='2'><select name='abi_category' id='abi_category'>
      <option value=''>-ALL-</option>";
      $query1=mysql_query("select * from tbl_indicator where abitrust_category <> ''  group by abitrust_category order by abitrust_category asc")or die(http(__line__));
      while($row1=mysql_fetch_array($query1)){
	 $selected=$_SESSION['abitrust_category']==$row1['abitrust_category']?"SELECTED":"";
      $data.="<option value=\"".$row1['abitrust_category']."\" '".$selected."'>".$row1['abitrust_category']."</option>";
      }
    $data.="</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";
   
	$query=mysql_query("select * from view_organizationreporting where indicator_type like 'aBi Trust%' group by indicator_name order by indicator_id asc ")or die(http(__line__));
      while($row=mysql_fetch_array($query)){
	   $selected=$_SESSION['indicator106']==$row['indicator_name']?"SELECTED":"";
      $data.="<option value=\"".$row['indicator_name']."\"  '".$selected."' >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class=evenrow><label>
      <input type='button' name='search' value='Go' onclick=\"xajax_view_abiTrustAnnualResults(getElementById('year').value,getElementById('abi_category').value,getElementById('indicator').value)\" />
    </label></td>
  
  </tr>
  <tr>
    <th colspan='9'><div align='center'><strong>aBi Trust Annual Results for ".$_SESSION['year106']."</strong></div></th>
  </tr>

";
return $data;
}




function filter_budgetsummary(){
$data="<tr class='evenrow'>
    <td width='' scope='col' colspan=9>
   <div style='float:left;'>Subcomponent
      <select name='subcomponent' id='subcomponent'><option value=''>-All-</option>";
	  /* if($_SESSION['subcomponent1']!='')$data.="<option value=\"".$_SESSION['subcomponent1']."\">".$_SESSION['subcomponent1']."</option>";
		else $data.=""; */
		  $q=mysql_query("select * from tbl_subcomponent order by id asc")or die(http("Filters-1662"));
		  while($row=mysql_fetch_array($q)){
		
	$selectedsubcomponent=($row['subcomponent']==$_SESSION['subcomponent106'])?"SELECTED":"";
          $data.="<option value=\"".$row['subcomponent']."\" '".$selectedsubcomponent."' >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
		  }
        $data.="</select></div>
    <div style='float:right;'>Year
	
      <select name='year' id='year'><option value=''>-All-</option>";
	$yr = date(Y); $end = $yr; do{
	$selectedyear=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."' '".$selectedyear."'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="</select> |
  
      <INPUT TYPE='BUTTON' name='search' value='Go' onclick=\"xajax_budgetSummary(getElementById('year').value,getElementById('subcomponent').value);\">
      | <a href='export_to_excel_word.php?linkvar=Export Budget Summary&&year=".$_SESSION['year106']."&&subcomponent=".$_SESSION['subcomponent106']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a>
    </div></td>
</tr>
  <tr class='evenrow'>
    <th width='' scope='col' colspan=3>&nbsp;</th>
    <th scope='col' colspan=2>BUDGET SUMMARY </th>
  
    <th width='' scope='col' colspan=4>&nbsp;</th>
  </tr>";
return $data;
}



function filter_lineofcredit(){

$data="<table width='100%' border='0'>

  <tr style='' class=green_field>
    <td width='300' scope='col'><div align='left'>Programme Monitoring &raquo; ".$_SESSION['titlesubcomponent']." &raquo; Line of credit  </div></th>
    <td colspan='2' scope='col'><div align='right'>
      <input type='button' name='Button' value='Export to Excel' />
      
  
      <input type='button' name='newloc' value='New Entry' onclick=\"xajax_new_lineofcredit(".$org_code.")\" />

    </div>
    <div align='right'></div></td>
  </tr>
  <tr >
  <td colspan='3' scope='col'><hr /></td>  </tr>
  
  <tr class='evenrow'>
    <td scope='col'><div align='left'>Financial Institution </div></td>
    <td width='222' scope='col'><div align='left'>Client Name</div></td>
    <td width='124' scope='col'><div align='left'><strong>Loan Value</strong></div></td>
  </tr>
  ";
 
  $data.="<tr class=evenrow>
    <td><div align='left'>
      <label>
      <select name=org_name id='org_name'>
        <option value=''>-All-</option>";
		
		 $query=mysql_query("select * FROM tbl_organization where orgName <> '' ORDER BY orgName asc")or die(http(__line__));
  while($row=mysql_fetch_array($query)){
		
        $data.="<option value=\"".$row[ 'orgName']."%'>".substr($row['orgName'],0,30)."</option>";
		
		}
		
		$data.="
      </select>
      </label>
    </div></td>
    <td><div align='left'>
      <label>
      <select name=cname id='cname'>
        <option value=''>-All-</option>";
		
		$q=mysql_query("select * from tbl_lineofcredit where client_name <>'' order by client_name asc ")or die(http(__line__));
		while($row=mysql_fetch_array($q)){
		
        $data.="<option value=\"".$row['client_name']."%'>".$row['client_name']."</option>";
		
		}
		
     $data.="</select>
      </label>
    </div></td>
    <td><div align='left'>
      <input name='loan_value' id='loan_value' type='text' value='' size='20' />
    </div></td>
  </tr>";
  
  
  $data.="<tr class='evenrow'>
    
    <td><div align='left'><strong>Loan Purpose</strong>
      
    </div></td>
    <td><div align='left'><select name='loan_purpose' id='loan_purpose'>
        <option value=''>-All-</option>
        ";
	
	$query=mysql_query("select * from tbl_lineofcredit where loanPurpose <>'' order by loanPurpose asc")or die(http(__line__));
	while($row=mysql_fetch_array($query)){
	$data.="
        <option value=\"".$row['loanpurpose']."%'>".$row['loanPurpose']."</option>
        ";
	}
	$data.="
      </select></div></td>
    <td><label>
      <div align='right'>
        <input type='button' name='Submit' value='Go' onclick=\"xajax_view_lineofcredit(getElementById('org_name').value,getElementById('cname').value,getElementById('loan_value').value,getElementById('loan_purpose').value)\"/>
      </div>
    </label></td>
  </tr>
  <tr class='evenrow'>
    <td><div align='left'></div></td>
    <td colspan='2'><div align='left'></div></td>
  </tr>
</table>
";
return $data;
}


function filter_branch(){
$data="<table width='100%' border='0'>
 <tr>
   <td colspan=3 class='green_field'>Pprogram Monitoring &raquo; View Branches</td>

  </tr>
   <tr>
   <td colspan=3><hr/></td>

  </tr>
  <tr>
    <th><div align='left'>BRANCH NAME</div></th>
	<th colspan=2><div style='float:left;'>DISTRICT</div><div style='float:right;'>
      <input type='submit' name='export' id='export' value='Export to Excel' />
      <input type='submit' name='add' id='add' value='New Branch' onclick=\"xajax_new_branch()\" />
    </div></th>

  </tr>
   <tr>
    <th><div align='left'>
      <select name='branch' id='branch'>
        <option value='%'>-All-</option>
        ";
	 $query5=mysql_query("select * from tbl_branch order by branch_name asc ")or die(http(__line__));
  while($row5=mysql_fetch_array($query5)){
  
  $data.="
        <option value=\"".$row5['branch_name']."%'>".$row5['branch_name']."</option>
        ";
   }
      $data.="
      </select>
    </div></th>
	<th><div align='left'><select name='location' id='location'><option value='%'>-All-</option>
        ";
	 $query7=mysql_query("select * from tbl_district order by districtName asc ")or die(http(__line__));
  while($row7=mysql_fetch_array($query7)){
  $data.="
        <option value=\"".$row7['districtName']."%'>".$row7['districtName']."</option>
        ";
   }
      $data.="</select></div></th>
	<th>&nbsp;</th>
  </tr>
   <tr>
    <th><div align='left'>ORGANIZATION</div>      </th>
	<th><div align='left'><select name='org_name' id='org_name'><option value='%'>-All-</option>";
	 $query6=mysql_query("select * from tbl_organization where orgName <> '' order by orgName asc ")or die(http(__line__));
  while($row6=mysql_fetch_array($query6)){
  $data.="<option value=\"".$row6['orgName']."%'>".substr($row6['orgName'],0,30)."</option>";
   }
      $data.="
      </select></div></th>
	<th><div style='float:right;'><input type='button' name='button' id='button' value='Go' onclick=\"xajax_search_branch(getElementById('branch').value,getElementById('org_name').value,getElementById('location').value,getElementById('northings').value,getElementById('eastings').value)\" /></div></th>
  </tr>
</table>";

return $data;

}

function filter_grant(){

$data.="<tr>
    <td colspan='3' class=green_field>Programme Monitoring &raquo; Grants</td>
 
    <td colspan='2'><div align='right'>
      <input type='submit' name='export' id='export' value='Export to Excel' />
      <input type='button' name='add' id='add' value='New Grant' onclick=\"xajax_new_grant()\" />
    </div></td>
</tr>
  <tr>
    <td colspan=5><hr/></td>
  </tr>
  <tr>
    <th width='25' scope='col' colspan=2>Organization</th>
    <th width='25' scope='col' colspan=3><select name='organization'>
      ";
	$query=mysql_query("select * from tbl_organization order by orgName asc")or die(http(__line__));
	while($row=mysql_fetch_array($query)){
	$data.="
      <option value=\"".$row['orgname']."\">".substr($row['orgName'],0,30)."</option>
      ";
	
	
	}
	$data.="
    </select></th>
  </tr>
  <tr>
    <th align='left' colspan=2>Subactivity</th>
    <th colspan=3 align='left'>
      <select name='subactivity_code'>
        ";
	$query=mysql_query("select * from tbl_subactivity group by subactivity_code order by subactivity_code asc")or die(http(__line__));
	while($row=mysql_fetch_array($query)){
	$data.="
        <option value=\"".$row['subact_id']."\">".$row['subactivity_code']." ".substr($row['subactivity_name'],0,30)."</option>
        ";
	
	
	}
	$data.="
      </select>
      <a href='javascript:void(0)' onclick='if(self.gfPop)gfPop.fPopCalendar(document.mou.dsigned);return false;' hidefocus=''>
      <input name='search' type='button' value='Go' />
      </a></th>
  </tr>
";
return $data;

}

function filter_mou(){

$data="
<tr><td class='green_field'  colspan=3>Program Monitoring &raquo; ".$_SESSION['titlesubcomponent']." &raquo; New MOU  (".$_SESSION['orgName'].")</td>

    <td colspan='3' align='right'><input type='submit' name='export' id='export' value='Export to Excel' /></td>
	<td><input type='button' name='add' id='add' value='New MOU' onclick=\"xajax_new_mou('".$org_code."')\" /></td>
	</tr>
  <tr>
    <td colspan=7><hr/></td>
  </tr>
  
  <tr class=evenrow>
    <td width='25' scope='col' colspan=3>Organization</td>
    <td width='25' scope='col'>MOU Signed</td>
    <td width='25' scope='col'>Guarantee Limit</td>
   
    <td width='' scope='col' colspan=2 align=left>Max Loan Size</td>
  </tr>
  <tr class=evenrow>
    <td colspan=3><select name='organization' id='organization'><option value='%'>-All-</option>";
	$query=mysql_query("select * from tbl_organization order by orgName asc")or die(http(__line__));
	while($row=mysql_fetch_array($query)){
	
	$data.="<option value=\"".$row['orgName']."%'>".substr($row['orgName'],0,30)."</option>";
	
	
	}
	
	$data.="</select></td>
    <td><select name='loan_agreement' id='loan_agreement'> <option value='%'>-All-</option>";
	$query=mysql_query("select * from tbl_mou group by loan_agreement order by loan_agreement asc")or die(http(__line__));
	while($row=mysql_fetch_array($query)){
	$data.="<option value=\"".$row['loan_agreement']."%'>".$row['loan_agreement']."</option>";
	
	
	}
	$data.="</select></td>
    <td><input name='glimit' id='glimit' type='text' /></td>
    <td><input name='maxloansize' id='maxloansize' type='text' /></td>
	 
    <td>&nbsp;</td>
  </tr>
  <tr class=evenrow>
    <td colspan='4' align=left >From <a href='javascript:void(0)' onClick='if(self.gfPop)gfPop.fPopCalendar(document.mou.dsigned);return false;' hidefocus=''>
                      <input name='dsigned' id='dsigned' type='text'  size='15' value=''  readonly='readonly' />
                      <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='34'></a></td>
    <td colspan='2' align=left >To <a href='javascript:void(0)' onClick='if(self.gfPop)gfPop.fPopCalendar(document.mou.dsigned2);return false;' hidefocus=''>
                      <input name='dsigned2' id='dsigned2' type='text'  size='15' value=''  readonly='readonly' />
                      <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='34'></a></td>
    
    <td align=left><input name='search' type='button' value='Go' onclick=\"xajax_search_mou(getElementById('organization').value,getElementById('loan_agreement').value,getElementById('glimit').value,getElementById('maxloansize').value,getElementById('dsigned').value,getElementById('dsigned2').value)\" /></td>
  </tr>
";
return $data;
}



function filter_expenditure(){
$data="<table width='660' border='0'>
  <tr>
    <th scope='col'><div align='left'>Financial Year</div></th><th scope='col'><div align='left'>Quarter</div></th><th scope='col'><div align='left'>Enterprize</div></th><th></th>
  </tr>
  <tr>
    <th scope='col'><div align='left'>
      <select name='fyr'>
        <option value='%'>-All-</option>";
         $query=mysql_query("select * from tbl_expenditure group by financial_year order by financial_year  asc")or die(http(__line__));
		     while($row=mysql_fetch_array($query)){
			 $data.="<option value=\"".$row['financial_year']."\">".$row['financial_year']."</option>";
			
			 }
      $data.="
        
      </select>
    </div></th><th scope='col'><div align='left'>
      <select name='quarter'>
	  
        <option value='%'>-All-</option>
        ";
         $query=mysql_query("select * from tbl_expenditure group by quarter order by quarter asc")or die(http(__line__));
		     while($row=mysql_fetch_array($query)){
			 $data.="<option value=\"".$row['quarter']."\">".$row['quarter']."</option>";
			 
			 
			 }
      $data.="
      </select>
    </div></th><th scope='col'><div align='left'>
      <select name='enterprize'>
        <option value='%'>-All-</option>";
         $query=mysql_query("select * from tbl_organization group by orgName order by orgName asc")or die(http(__line__));
		     while($row=mysql_fetch_array($query)){
			 $data.="<option value=\"".$row['orgName']."\">".substr($row['orgName'],0,30)."</option>";
			 
			 
			 }
      $data.="</select>
    </div></th><th></th>
  </tr>
  <tr>
    <th scope='col' colspan=''><div align='left'>Subactivity:</th><th colspan=2 align=left>
        <select name='subactivity'>
          <option value='%'>-All-</option>";
          $query=mysql_query("select * from tbl_subactivity group by subactivity_code order by subactivity_code asc")or die(http(__line__));
		     while($row=mysql_fetch_array($query)){
			 $data.="<option value=\"".$row['subact_id']."\">".$row['subactivity_code']." ".$row['subactivity_name']."</option>";
			 
			 
			 }
            $data.="</select></th><th align=right>
    <input name='search' align=right type='button' value='Go' onclick=\"xajax_search_workplan(getElementById('subactivity').value)\" /></div></th>
  </tr>
</table>
";

return $data;
}





function filter_annualBudget(){
$data="
  <tr>
    <td scope='col' class=green_field colspan='6'><div align='left' >Planning &raquo; Annual Financial Budget </div></td>

     <td>";
	 $new_entry=(($_SESSION['role']=='Monitoring and Evaluation') or ($_SESSION['role']=='Finance and Admininistration'))?"<input type='button' name='Submit' value='New Entry' onclick=\"xajax_new_annualBudget('','','')\" />":"";
        
        
    $data.=$new_entry."</td> <td colspan=''>
        <a href='export_to_excel_word.php?linkvar=Export_Annual_Budget&&subcomponent=".$_SESSION['subcomponent1']."&&activity=".$_SESSION['activity']."&&subactivity=".$_SESSION['subactivity']."&&year=".$_SESSION['year']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>

		 <tr class='evenrow2'>
  <tr>
              <td colspan='8' align=left><hr align=left width=''/></td></tr>
		 <tr class='evenrow2'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='6'><select name='subcomponent' id='subcomponent' />"; //onchange=\"xajax_reload_annualBudget(getElementById('subcomponent').value)\"\";
			  if($_SESSION['usersubcomponent']<>''){
$query=mysql_query("select * from tbl_subcomponent where id like '".$_SESSION['usersubcomponent']."%' order by subcomponent_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
#$sel=($_SESSION['subcomponent1']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  } }
					  else {
					  $data.="<option value=''>-All-</option>";
					  $query=mysql_query("select * from tbl_subcomponent  order by subcomponent_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$sel=($_SESSION['subcomponent1']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" ".$sel." >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
					  
					  } 
$data.="</select></td>
        </tr>";
/* <tr class=evenrow style='display:none;'>
              <td colspan='2'>Outputs
                <label></label></td>
              <td colspan='6'><select name='output' id='output' >";
			    if($_SESSION['wpsubcomponent_id']!=''){
					  $query=mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['wpsubcomponent_id']."\" order by output_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
					  $data.="<option value=\"".$row['output_id']."%'>".$row['output_code']." ".$row['output_name']."</option>";
					  }
					  }
					
					  $data.="<option value=''>-All-</option>
              </select></td>
</tr>";style='display:none;' */
            $data.="<tr class=evenrow2 >
              <td colspan='2'>Activity: </td>
              <td colspan='6'><select name='activity' id='activity' ><option value=''>-ALL-</option>";
			  /*   if($_SESSION['wpsubcomponent_id']!=''){
 $query=mysql_query("select * from view_activity where subcomp like '".$_SESSION['wpsubcomponent']."\" order by activity_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
$data.="<option value=\"".$row['activity_name']."%'>".$row['activity_code']." ".$row['activity_name']."</option>";
					  }
					  }
					  else */
					 $query=mysql_query("select * from tbl_activity where subcomp_id like '".$_SESSION['usersubcomponent']."%'  order by activity_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
					  $sel=($_SESSION['activity']==$row['activity_name'])?"SELECTED":"";
$data.="<option value=\"".$row['activity_name']."\" ".$sel.">".$row['activity_code']." ".$row['activity_name']."</option>";
		
					  }
					  
					   
$data.="</select></td>
            </tr>
			<tr class=evenrow2 >
              <td colspan='2'>Sub-Activity: </td>
              <td colspan='6'><select name='subactivity' id='subactivity' ><option value=''>-ALL-</option>";
			 
					 $query=mysql_query("select * from tbl_subactivity where subcomponent_id like '".$_SESSION['usersubcomponent']."%' order by subactivity_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
					    $sel=($_SESSION['subactivity']==$row['subactivity_name'])?"SELECTED":"";
$data.="<option value=\"".$row['subactivity_name']."%' '".$sel."'>".$row['subactivity_code']." ".substr($row['subactivity_name'],0,70)."</option>";
		
					  }
					  
					   
$data.="</select></td>
            </tr>"; 
			
			
            $data.="<tr class=evenrow>
              <td colspan='2'>Financial Year:</td>
              <td colspan='5'><select name='fyear' id='fyear'   ><option value=''>-All-</option>";
				  $yr=date(Y);
				  $end=$yr+2;
				  do{
				  $sel=($_SESSION['year']==$end)?"SELECTED":"";
				  $data.="<option value=\"".$end."\" ".$sel." >".$end."</option>";
				  $end--;}while($end>=2010);
				  
              $data.="</select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_annualBudget(getElementById('subcomponent').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('fyear').value);return false;\"/></td>
            </tr>
";

return $data;
}



function filter_annualTarget(){
$data="<table width='660'>
<tr>
              <td colspan='3' align=left><table width='660' border=0>
  <tr>
    <td scope='col' class=green_field><div align='left' >Planning &raquo; View Physical Annual Targets </div></td>
    <td width='186' scope='col'><label>
      <div align='right'>
        <input type='button' name='Submit2' value='Export to Excel ' />
        <input type='button' name='Submit' value='New Entry' onclick=\"xajax_new_annualTarget('".$activity."','','')\"/>
        </div>
    </label></td>
  </tr>
</table>
</td></tr>
		 <tr class='evenrow2'>
  <tr>
              <td colspan='3' align=left><hr align=left width=''/></td></tr>
			 
		 <tr class='evenrow2'>
              <td colspan=''>Sub-component:
                <label></label></td>
              <td colspan='2'><select name='subcomponent' id='subcomponent' onchange=\"xajax_reload_annualTarget(getElementById('subcomponent').value)\">";
			  if($_SESSION['wpsubcomponent_id']!='')
$data.="<option value=\"".$_SESSION['wpsubcomponent_id']."\">".$_SESSION['wpsubcomponent_code']." ".$_SESSION['wpsubcomponent']."</option>";

else
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$data.="<option value=\"".$row['id']."\">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
<tr class=evenrow>
              <td colspan=''>Outputs
                <label></label></td>
              <td colspan='2'><select name='output' ><option value=''>-All-</option>";
			    if($_SESSION['wpsubcomponent_id']!='')
					  $query=mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['wpsubcomponent_id']."\" order by output_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
					  //$selected=($_SESSION['ou'])
					  $data.="<option value=\"".$row['output_id']."\">".$row['output_code']." ".$row['output_name']."</option>";
					  }
					
					  $data.="
              </select></td>
</tr>
            <tr class=evenrow2>
              <td colspan=''>Activity: </td>
              <td colspan='2'><select name='activity' id='activity'><option value=''>-All-</option>";
			    if($_SESSION['wpsubcomponent_id']!='')
					  $query=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['wpsubcomponent_id']."\" order by activity_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
$data.="<option value=\"".$row['activity_id']."\">".$row['activity_code']." ".$row['activity_name']."</option>";
		
					  }
					   
$data.="</select></td>
            </tr>"; 
			
			
            $data.="<tr class=evenrow>
              <td colspan=''>Financial Year:</td>
              <td colspan=''>
                 <select name='year' id='year'>";
$yr = date(Y); $end = $yr; do{
$data.="<option value='$end'>".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='' type='button' value='Go' onclick=\"xajax_view_annualTarget(getElementById('').value,getElementById('').value,getElementById('activity').value,getElementById('year').value)\" /></td>
            </tr></table>
";

return $data;
}






function filter_DCEDQuantitativeannualTargetReport(){
$data.="
<tr class='evenrow'>
  
    <td width='186' scope='col' colspan='13'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":"<input type='button' name='button' value='New DCED Annual Targets' onclick=\"xajax_new_DCEDQuantitativeannualTarget('','','','');return false;\" /> |";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export DCED Quantitative Annual Target&&subcomponent=".$_SESSION['wpsubcomponent']."&&intervention=".$_SESSION['intervention']."&&resultcahin=".$_SESSION['resultchain']."&&subsector=".$_SESSION['subsector']."&&year=".$_SESSION['fyear']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a>
     
        </div>
    </td>
  </tr>
";
			  
			  
  $data.="<tr   class='evenrow'>
              <td colspan='4'>Sub-component:
                <label></label></td>
              <td colspan='9'><select name='subcomponent' id='subcomponent' )\">";
			  
			  
			  
			  
			  if($_SESSION['usersubcomponent']!=''){
$query1=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."\" order by subcomponent_code asc")or die(http(__line__));
while($row1=mysql_fetch_array($query1)){
#$sel=($_SESSION['wpsubcomponent']==$row1['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row1['subcomponent']."\" ".$sel." >".$row1['subcomponent_code']." ".$row1['subcomponent']."</option>";
				
					  }  
}
else{
$data.="<option value=''>-All-</option>"; 
$query1=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(__line__));
while($row1=mysql_fetch_array($query1)){
$sel=($_SESSION['wpsubcomponent']==$row1['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row1['subcomponent']."\" ".$sel." >".$row1['subcomponent_code']." ".$row1['subcomponent']."</option>";
	}			
					  }  
$data.="</select></td>
        </tr>
		<tr class='evenrow'>
              <td colspan='4'>Result Chain Level:
                <label></label></td>
              <td colspan='9'><select name='rchain' id='rchain' )\">";
			 
			 
$data.="<option value=''>-All-</option>"; 
$queryrc=mysql_query("select * from tbl_resultschain order by name asc")or die(http(__line__));
while($rowrc=mysql_fetch_array($queryrc)){
$selrc=($_SESSION['resultchain']==$rowrc['name'])?"SELECTED":"";
$data.="<option value=\"".$rowrc['name']."\" '".$selrc."'>".$rowrc['name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
		
		
		
<tr class=evenrow>
              <td colspan='4'>Subsector:
                <label></label></td>
              <td colspan='9'><select name='subsector' id='subsector' ><option value=''>-All-</option>";
	
					  $querysc=mysql_query("select * from tbl_subsector  order by subsector asc")or die(http(__line__));
					  while($rowsc=mysql_fetch_array($querysc)){
				$selrc=($_SESSION['subsector']==$rowsc['subsector'])?"SELECTED":"";
					  $data.="<option value=\"".$rowsc['subsector']."\" '".$selrc."'>".$rowsc['subsector']."</option>";
					  }
					 
$data.="</select></td>
</tr>
            <tr class=evenrow>
              <td colspan='4'>Intervention: </td>
              <td colspan='9'><select name='intervention' id='intervention'><option value=''>-All-</option>";
			 
					  $query=mysql_query("select * from tbl_intervention order by intervention asc")or die(http(__line__));
					  while($rowint=mysql_fetch_array($query)){
					 $selectedint=($_SESSION['intervention']==$rowint['intervention'])?"selected":"";
$data.="<option value=\"".$rowint['intervention']."\" '".$selectedint."'>".$rowint['intervention']."</option>";
		
					 }
					   
$data.="</select></td>
            ";
			
			
            $data.="<tr class=evenrow>
              <td colspan='4'>Financial Year:</td>
              <td colspan='8'><select name='year' id='year'><option value=''>-All-</option>";
$yr = date('Y'); $end = $yr; do{
$sel=($_SESSION['fyear']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."' '".$sel."'>".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_DCEDQuantitativeannualTarget(getElementById('subcomponent').value,getElementById('rchain').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('year').value)\" /></td>
            </tr>
";

return $data;
}




function filter_ResultsBasedannualTarget(){
$data="
<tr>
              <td colspan='3' align=left><table width='660' border=0>
  <tr>
    <td scope='col' class=green_field colspan=5><div align='left' >Planning &raquo; View Results Based Annual Targets </div></td>
    <td width='186' scope='col' colspan='5'><label>
      <div align='right'>";
        
		$new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":"<input type='button' name='Submit' value='New Entry' onclick=\"xajax_new_ResultsBasedannualTarget('','');\"/> | ";

		
        
		$data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export_Annual_Result_Based_Workplan&&activity=Results Based&&subcomponent=".$_SESSION['subcomponent']."&&year=".$_SESSION['year']."&&indicator=".$_SESSION['indicator']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a>
        </div>
    </label></td>
  </tr>


		 <tr class='evenrow2'>
  <tr>
              <td colspan='10' align=left><hr align=left width=''/></td></tr>";
			 $data.="

  <tr class='evenrow'>
    <td colspan=3><div align='left'>Annual Planning Category </div></td>
    <td colspan='7'><label>
      <select name='project_lifeplanning' id='project_lifeplanning' onChange=\"xajax_switchPlanningTypeAnnual(getElementById('project_lifeplanning').value);return false;\" style='width:300px;'>
        <option value=''>-Select-</option>";
		$query=mysql_query("select indicator_type from tbl_indicator group by indicator_type order by indicator_type asc")or die(http(__line__));
		while($row=mysql_fetch_array($query)){
		$selcat=($row['indicator_type']=="Results Based")?"selected":"";
        $data.="<option value=\"".$row['indicator_type']."\" ".$selcat.">".$row['indicator_type']."</option>";
        }
      $data."</select>
    </label></td>
   
  </tr>

";

		 $data.="<tr class='evenrow'>
              <td colspan='3'>Sub-component:
                <label></label></td>
              <td colspan='7'><select name='subcomponent' id='subcomponent' style='width:300px;' >";	
			  
  if($_SESSION['usersubcomponent']!=''){
  $query=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."\" order by subcomponent_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
#$sel=($row['subcomponent']==$_SESSION['wpsubcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  }
  
#$data.="<option value=\"".$_SESSION['wpsubcomponent_id']."\">".$_SESSION['wpsubcomponent_code']." ".$_SESSION['wpsubcomponent']."</option>";
else 
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$sel=($row['subcomponent']==$_SESSION['wpsubcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" ".$sel." >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
<tr class=evenrow style='display:none;'>
              <td colspan=''>Outputs
                <label></label></td>
              <td colspan='6'><select name='output' >";
			    if($_SESSION['wpsubcomponent_id']!='')
					  $query=mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['wpsubcomponent_id']."\" order by output_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
					  $data.="<option value=\"".$row['output_id']."\">".$row['output_code']." ".$row['output_name']."</option>";
					  }
					
					  $data.="
              </select></td>
</tr>
           <tr class=evenrow style='display:none;'>
              <td colspan=''>Activity: </td>
              <td colspan='5'><select name='activity' id='activity'>";
			    if($_SESSION['wpsubcomponent_id']!='')
					  $query=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['wpsubcomponent_id']."\" order by activity_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
$data.="<option value=\"".$row['activity_name']."\">".$row['activity_code']." ".$row['activity_name']."</option>";
		
					  }
					   
$data.="</select></td>
            </tr><tr class=evenrow>
              <td colspan='3'>Indicator: </td>
              <td colspan='6'><select name='indicator' id='indicator' style='width:300px;'><option value=''>-All-</option>";
			    //if($_SESSION['wpsubcomponent_id']!='')
					  $query12=mysql_query("select * from view_annualtarget where lower(indicator_type) like 'results based%' group by indicator_name order by indicator_name asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query12)){
 $sel=($row['indicator_name']==$_SESSION['indicator_12'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_name']."\" '".$sel."'>".substr($row['indicator_name'],0,50)."</option>";
		
					  }
					   
$data.="</select></td><td><input name='' type='button' value='Go' onclick=\"xajax_view_ResultsBasedannualTarget('Result Based',getElementById('subcomponent').value,getElementById('indicator').value);\" /></td>
            </tr>"; 
	
return $data;
}



function filter_ResultsBasedannualActuals(){
$data="
<tr>
              <td colspan='3' align=left><table width='660' border=0>
  <tr>
    <td scope='col' class=green_field colspan=10><div align='left' >Planning &raquo; View Results Based Annual Actuals </div></td>
    <td width='186' scope='col' colspan='6'><label>
      <div align='right'>
        
       
		<a href='export_to_excel_word.php?linkvar=Export Project Life Annual Actuals&&activity=Result Based&&subcomponent=".$_SESSION['subcomponentProjectLife']."&&indicator=".$_SESSION['indicator']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a>
        </div>
    </label></td>
  </tr>


		 <tr class='evenrow2'>
  <tr>
              <td colspan='16' align=left><hr align=left width=''/></td></tr>";
			
		 $data.="<tr class='evenrow'>
              <td colspan='3'>Sub-component:
                <label></label></td>
              <td colspan='13'><select name='subcomponent' id='subcomponent' >";

$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$sel=($row['subcomponent']==$_SESSION['wpsubcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" '".$sel."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
<tr class=evenrow>
              <td colspan='3'>Indicator: </td>
              <td colspan='12'><select name='indicator' id='indicator'><option value=''>-All-</option>";
			    //if($_SESSION['wpsubcomponent_id']!='');
					  $query12=mysql_query("select * from view_annualtarget where lower(indicator_type) like 'result based%' group by indicator_name order by indicator_name asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query12)){
 $sel=($row['indicator_name']==$_SESSION['indicator_12'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_name']."\" '".$sel."'>".substr($row['indicator_name'],0,50)."</option>";
		
					  }
					   
$data.="</select></td><td><input name='' type='button' value='Go' onclick=\"xajax_view_ProjectLifeResults(getElementById('subcomponent').value,getElementById('indicator').value);\" /></td>
            </tr>"; 
	
return $data;
}




function filter_DCEDQualitativeannualTarget(){

$data.="<tr class='evenrow'>
    <td colspan=3 >Target Type:</td>
    <td colspan='10'><select name='type' id='type' style='width:500px;' onchange=\"xajax_switchDCEDPlanningType(getElementById('type').value);return false;\"><option value=''>-select-</option>";
	
	$queryx=mysql_query("select * from tbl_lookup where classCode='9' order by code asc") or die(http(2289));
		while($row=mysql_fetch_array($queryx)){
	  $$selx=($_SESSION['type']==$row['codeName'])?"SELECTED":"";
 $data.="<option value=\"".$row['codeName']."\" ".$selx." >".$row['codeName']."</option>";
	  }
	  
      $data.="</select></td>
  </tr>";

$data.="<tr class='evenrow'>
    <td width='' colspan=2>Year</td>
    <td colspan='2'><label><div style='float:left;'>
      <select name='year' id='year'><option value=''>-ALL-</option>";
	  
				$date=date('Y');
                 $yr=$date;$end=$yr;
				  do{
				  $selyear=($_SESSION['fyear']==$end)?"SELECTED":"";
				  $data.="<option value=\"".$end."\" ".$selyear." >".$end."</option>";
				  $end--;
				  }while($end>=2010);
      $data.="</select></div></td>
	  <td>Timeline:</td><td width='20'><select name='timeline' id='timeline' size='1'><option value=''>-ALL-</option>";
			$querytimeline=mysql_query("select * from tbl_quarters order by quarterCode asc")or die(http(1705));
			while($rowtim=mysql_fetch_array($querytimeline)){
				$seltime=($_SESSION['timeline']==$rowtim['quarterName'])?"SELECTED":"";
			$data.="<option value=\"".$rowtim['quarterName']."\" ".$seltime." >".$rowtim['quarterName']."</option>";
			}
			$data.="</select></td>
	  
	  
	  <td colspan='6'><div align='right'>";
	  
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":"<input type='button' name='button' id='button' value='New DCED Target' onclick=\"xajax_new_DCEDQualitativeannualTarget('','','','');return false;\" />
      |";
	  
        
	  
	  
	  
	  $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export Qualitative DCED Targets&&subsector=".$_SESSION['subsector']."&intervention=".$_SESSION['intervention']."&indicator=".$_SESSION['indicator']."&&subcomponent=".$_SESSION['subcomponent']."&&status=".$_SESSION['status']."&&timeline=".$_SESSION['timeline']."&&resultschainlevel=".$_SESSION['resultchain']."&&year=".$_SESSION['fyear']."&&format=excel'><input type='button' name='export' id='button2' value='Export to Excel' /></a>";
    
      
      $data.="</div>
    </label></td>
  </tr>
  <tr class='evenrow'>
  
   <td colspan=2>Subsector:</td>
    <td colspan='2'>
      <select name='subsector' id='subsector'><option value=''>-ALL-</option>";
	 
	  $queryrc=mysql_query('select * from tbl_subsector') or die("abi error-code 2361 because, ".http(__line__));
	  while($rowrc=mysql_fetch_array($queryrc)){
	  $selsub=($_SESSION['subsector']==$rowrc['subsector'])?"SELECTED":"";
	  $data.="<option value=\"".$rowrc['subsector']."\" '".$selsub."'>".substr($rowrc['subsector'],0,100)."</option>";
	  
	  }
       
	  $data.="</select>
    </td>
    <td colspan=2>Result Chain Level</td>
    <td colspan='2'><label>
      <select name='rchain' id='rchain'><option value=''>-ALL-</option>";
	  $queryr=mysql_query("select * from tbl_resultschain order by name asc") or die(http(2289));
	  while($rowr=mysql_fetch_array($queryr)){
	  	  $selrc=($_SESSION['resultchain']==$rowr['name'])?"SELECTED":"";
	  $data.="<option value=\"".$rowr['name']."\" ".$selrc." >".substr($rowr['name'],0,100)."</option>";
	  
	  }
      $data.="</select>
    </label></td><td colspan='2'>Status:</td><td colspan='2'><select name='status' id='status' size='1'><option value=''>-ALL-</option>";
			 $querystatus=mysql_query("select * from tbl_lookup where classCode='6' order by codeName asc")or die(http(1705));
			while($rowstatus=mysql_fetch_array($querystatus)){
			$selstatus=($_SESSION['status']==$rowstatus['codeName'])?"SELECTED":"";
			$data.="<option value=\"".$rowstatus['codeName']."\" ".$selstatus." >".$rowstatus['codeName']."</option>";
			}
			 $data.="</select></td>
  </tr>
<tr class='evenrow'>
    <td colspan=2 >Subcomponent:</td>
    <td colspan='10'><select name='subcomponent' id='subcomponent' style='width:500px;'>";
	if($_SESSION['usersubcomponent']<>''){
	$queryn=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."' order by id asc") or die(http("Filters-2289"));
	  while($rowintervn=mysql_fetch_array($queryn)){
	  $selsub=($_SESSION['subcomponent']==$rowintervn['subcomponent'])?"SELECTED":"";
	  $data.="<option value=\"".$rowintervn['subcomponent']."\" '".$selsub."' >".$rowintervn['subcomponent_code']." ".substr($rowintervn['subcomponent'],0,100)."</option>";
	  }
	  }
	  else {
	
	$data.="<option value=''>-ALL-</option>";
	  $queryns=mysql_query("select * from tbl_subcomponent order by id asc") or die(http(2289));
	  while($rowintervns=mysql_fetch_array($queryns)){
	  $selsubs=($_SESSION['subcomponent']==$rowintervns['subcomponent'])?"SELECTED":"";
	  $data.="<option value=\"".$rowintervns['subcomponent']."\" ".$selsubs." >".$rowintervns['subcomponent_code']." ".substr($rowintervns['subcomponent'],0,100)."</option>";
	  
	  }
	  }
      $data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan=2 >Intervention</td>
    <td colspan='10'><select name='intervention' id='intervention' style='width:500px;'><option value=''>-ALL-</option>";
	  $queryint=mysql_query("select * from tbl_intervention intv join tbl_indicator i on(intv.intervention_id=i.intervention_id) join tbl_dcedannualtarget d on(d.indicator_id=i.indicator_id) group by intv.intervention order by intervention asc") or die(http(2289));
	  while($rowint=mysql_fetch_array($queryint)){
	    $selint=($_SESSION['intervention']==$rowint['intervention'])?"SELECTED":"";
	  $data.="<option value=\"".$rowint['intervention']."\" '".selint."'>".substr($rowint['intervention'],0,100)."</option>";
	  
	  }
      $data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='2'>Indicator:</td>
    <td width='' colspan=9><select name='indicator' id='indicator' style='width:500px;' ><option value=''>-ALL-</option>";
	  $queryind=mysql_query("select * from tbl_indicator i join tbl_dcedannualtarget d on(d.indicator_id=i.indicator_id) where expected_output='Qualitative' order by indicator_name asc") or die(http(2289));
	  while($rowind=mysql_fetch_array($queryind)){
	  $selind=($_SESSION['indicator']==$rowind['indicator_name'])?"SELECTED":"";
	  $data.="<option value=\"".$rowind['indicator_name']."\" '".$selind."'>".substr($rowind['indicator_name'],0,100)."</option>";
	  
	  }
	  
$data.="</select></td>
    <td width='31'><input type='button' name='button3' id='' value='Go' onclick=\"xajax_view_DCEDQualitativeannualTarget(getElementById('year').value,getElementById('timeline').value,getElementById('subsector').value,getElementById('status').value,getElementById('intervention').value,getElementById('indicator').value,getElementById('subcomponent').value,getElementById('rchain').value);return false;\" /></td>
  </tr>";

return $data;
}

function filter_DCEDQualitativeannualTargetReport(){
$data.="<tr class='evenrow'>
    <td width='' colspan=2>Year</td>
    <td colspan='2'><label><div style='float:left;'>
      <select name='year' id='year'><option value=''>-ALL-</option>";
	  
				$date=date('Y');
                 $yr=$date;$end=$yr;
				  do{
				  $selyear=($_SESSION['fyear']==$end)?"SELECTED":"";
				  $data.="<option value=\"".$end."\" ".$selyear." >".$end."</option>";
				  $end--;
				  }while($end>=2010);
      $data.="</select></div></td>
	  <td>Timeline:</td><td width='20'><select name='timeline' id='timeline' size='1'><option value=''>-ALL-</option>";
			$querytimeline=mysql_query("select * from tbl_quarters order by quarterCode asc")or die(http(1705));
			while($rowtim=mysql_fetch_array($querytimeline)){
				$seltime=($_SESSION['timeline']==$rowtim['quarterName'])?"SELECTED":"";
			$data.="<option value=\"".$rowtim['quarterName']."\" ".$seltime." >".$rowtim['quarterName']."</option>";
			}
			$data.="</select></td>
	  
	  
	  <td colspan='6'><div align='right'>";
	  
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":"<input type='button' name='button' id='button' value='New DCED Target' onclick=\"xajax_new_DCEDQualitativeannualTarget('','','','');return false;\" />
      |";
	  
        
	  
	  
	  
	  $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export Qualitative DCED Targets&&subsector=".$_SESSION['subsector']."&intervention=".$_SESSION['intervention']."&indicator=".$_SESSION['indicator']."&&subcomponent=".$_SESSION['subcomponent']."&&status=".$_SESSION['status']."&&timeline=".$_SESSION['timeline']."&&resultschainlevel=".$_SESSION['resultchain']."&&year=".$_SESSION['fyear']."&&format=excel'><input type='button' name='export' id='button2' value='Export to Excel' /></a>";
    
      
      $data.="</div>
    </label></td>
  </tr>
  <tr class='evenrow'>
  
   <td colspan=2>Subsector:</td>
    <td colspan='2'>
      <select name='subsector' id='subsector'><option value=''>-ALL-</option>";
	 
	  $queryrc=mysql_query('select * from tbl_subsector') or die("abi error-code 2361 because, ".http(__line__));
	  while($rowrc=mysql_fetch_array($queryrc)){
	  $selsub=($_SESSION['subsector']==$rowrc['subsector'])?"SELECTED":"";
	  $data.="<option value=\"".$rowrc['subsector']."\" '".$selsub."'>".substr($rowrc['subsector'],0,100)."</option>";
	  
	  }
       
	  $data.="</select>
    </td>
    <td colspan=2>Result Chain Level</td>
    <td colspan='2'><label>
      <select name='rchain' id='rchain'><option value=''>-ALL-</option>";
	  $queryr=mysql_query("select * from tbl_resultschain order by name asc") or die(http(2289));
	  while($rowr=mysql_fetch_array($queryr)){
	  	  $selrc=($_SESSION['resultchain']==$rowr['name'])?"SELECTED":"";
	  $data.="<option value=\"".$rowr['name']."\" ".$selrc." >".substr($rowr['name'],0,100)."</option>";
	  
	  }
      $data.="</select>
    </label></td><td colspan='2'>Status:</td><td colspan='2'><select name='status' id='status' size='1'><option value=''>-ALL-</option>";
			 $querystatus=mysql_query("select * from tbl_lookup where classCode='6' order by codeName asc")or die(http(1705));
			while($rowstatus=mysql_fetch_array($querystatus)){
			$selstatus=($_SESSION['status']==$rowstatus['codeName'])?"SELECTED":"";
			$data.="<option value=\"".$rowstatus['codeName']."\" ".$selstatus." >".$rowstatus['codeName']."</option>";
			}
			 $data.="</select></td>
  </tr>
<tr class='evenrow'>
    <td colspan=2 >Subcomponent:</td>
    <td colspan='10'><select name='subcomponent' id='subcomponent'>";
	if($_SESSION['usersubcomponent']<>''){
	$queryn=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."' order by id asc") or die(http(2289));
	  while($rowintervn=mysql_fetch_array($queryn)){
	  $selsub=($_SESSION['subcomponent']==$rowintervn['subcomponent'])?"SELECTED":"";
	  $data.="<option value=\"".$rowintervn['subcomponent']."\" '".$selsub."' >".$rowintervn['subcomponent_code']." ".substr($rowintervn['subcomponent'],0,100)."</option>";
	  }
	  }
	  else {
	
	
	
	$data.="<option value=''>-ALL-</option>";
	  $queryns=mysql_query("select * from tbl_subcomponent order by id asc") or die(http(2289));
	  while($rowintervns=mysql_fetch_array($queryns)){
	  $selsubs=($_SESSION['subcomponent']==$rowintervns['subcomponent'])?"SELECTED":"";
	  $data.="<option value=\"".$rowintervns['subcomponent']."\" ".$selsubs." >".$rowintervns['subcomponent_code']." ".substr($rowintervns['subcomponent'],0,100)."</option>";
	  
	  }
	  }
      $data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan=2 >Intervention</td>
    <td colspan='10'><select name='intervention' id='intervention'><option value=''>-ALL-</option>";
	  $queryint=mysql_query("select * from tbl_intervention intv join tbl_indicator i on(intv.intervention_id=i.intervention_id) join tbl_dcedannualtarget d on(d.indicator_id=i.indicator_id) group by intv.intervention order by intervention asc") or die(http(2289));
	  while($rowint=mysql_fetch_array($queryint)){
	    $selint=($_SESSION['intervention']==$rowint['intervention'])?"SELECTED":"";
	  $data.="<option value=\"".$rowint['intervention']."\" '".selint."'>".substr($rowint['intervention'],0,100)."</option>";
	  
	  }
      $data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='2'>Indicator:</td>
    <td width='' colspan=9><select name='indicator' id='indicator'><option value=''>-ALL-</option>";
	  $queryind=mysql_query("select * from tbl_indicator i join tbl_dcedannualtarget d on(d.indicator_id=i.indicator_id) where expected_output='Qualitative' order by indicator_name asc") or die(http(2289));
	  while($rowind=mysql_fetch_array($queryind)){
	  $selind=($_SESSION['indicator']==$rowind['indicator_name'])?"SELECTED":"";
	  $data.="<option value=\"".$rowind['indicator_name']."\" '".$selind."'>".substr($rowind['indicator_name'],0,100)."</option>";
	  
	  }
	  
$data.="</select></td>
    <td width='31'><input type='button' name='button3' id='' value='Go' onclick=\"xajax_view_DCEDQualitativeannualTarget(getElementById('year').value,getElementById('timeline').value,getElementById('subsector').value,getElementById('status').value,getElementById('intervention').value,getElementById('indicator').value,getElementById('subcomponent').value,getElementById('rchain').value);return false;\" /></td>
  </tr>";

return $data;
}


function filter_DCEDQualitativeannualActual(){

$data.="<tr class='evenrow'>
    <td colspan='1' >Result Type:</td>
    <td colspan='12'><select name='type' id='type' style='width:500px;' onchange=\"xajax_switchDCEDPlanningTypeReporting(getElementById('type').value);return false;\"><option value=''>-select-</option>";
	
	$queryx=mysql_query("select * from tbl_lookup where classCode='9' order by code asc") or die(http(2289));
	while($row=mysql_fetch_array($queryx)){
	  $$selx=($_SESSION['type']==$row['codeName'])?"SELECTED":"";
 $data.="<option value=\"".$row['codeName']."\" ".$selx." >".$row['codeName']."</option>";
	  }
	  
      $data.="</select></td>
  </tr>";

$data.="<tr class='evenrow'>
    <td width='' colspan=2>Year</td>
    <td colspan='2'><label><div style='float:left;'>
      <select name='year' id='year'><option value=''>-ALL-</option>";
	  
				$date=date('Y');
                 $yr=$date;$end=$yr;
				  do{
				  $data.="<option value=\"".$end."'>".$end."</option>";
				  $end--;
				  }while($end>=2010);
      $data.="</select></div></td>
	  <td>Timeline:</td><td width='20'><select name='timeline' id='timeline' size='1'><option value=''>-ALL-</option>";
			$querytimeline=mysql_query("select * from tbl_quarters order by quarterCode asc")or die(http(1705));
			while($rowtim=mysql_fetch_array($querytimeline)){
				$seltime=($rowtim['quarterName']==$row['timeline'])?"SELECTED":"";
			$data.="<option value=\"".$rowtim['quarterName']."\" '".$seltime."'>".$rowtim['quarterName']."</option>";
			}
			$data.="</select></td>
	  
	  
	  <td colspan='6'><div align='right'>
       ";
	  
	  
	  
	  $data.="<a href='export_to_excel_word.php?linkvar=Export Qualitative DCED Targets&&subsector=".$_SESSION['subsector']."&intervention=".$_SESSION['intervention']."&indicator=".$_SESSION['indicator']."&&subcomponent=".$_SESSION['subcomponent']."&&status=".$_SESSION['status']."&&timeline=".$_SESSION['timeline']."&&resultschainlevel=".$_SESSION['resultchain']."&&year=".$_SESSION['fyear']."&&format=excel'><input type='button' name='export' id='button2' value='Export to Excel' /></a>";
    
      
      $data.="</div>
    </label></td>
  </tr>
  <tr class='evenrow'>
  
   <td colspan=2>Subsector:</td>
    <td colspan='2'>
      <select name='subsector' id='subsector'><option value=''>-ALL-</option>";
	 
	  $queryrc=mysql_query('select * from tbl_subsector') or die("abi error-code 2361 because, ".http(__line__));
	  while($rowrc=mysql_fetch_array($queryrc)){
	  $data.="<option value=\"".$rowrc['subsector']."\">".substr($rowrc['subsector'],0,100)."</option>";
	  
	  }
       
	  $data.="</select>
    </td>
    <td colspan=2>Result Chain Level</td>
    <td colspan='2'><label>
      <select name='rchain' id='rchain'><option value=''>-ALL-</option>";
	  $queryrc=mysql_query("select * from tbl_resultschain order by name asc") or die(http(2289));
	  while($rowrc=mysql_fetch_array($queryrc)){
	  $data.="<option value=\"".$rowrc['name']."\">".substr($rowrc['name'],0,100)."</option>";
	  
	  }
      $data.="</select>
    </label></td><td colspan='2'>Status:</td><td colspan='2'><select name='status' id='status' size='1'><option value=''>-ALL-</option>";
			 $querystatus=mysql_query("select * from tbl_lookup where classCode='6' order by codeName asc")or die(http(1705));
			while($rowstatus=mysql_fetch_array($querystatus)){
			$selstatus=($rowstatus['codeName']==$row['status'])?"SELECTED":"";
			$data.="<option value=\"".$rowstatus['codeName']."\" '".$selstatus."'>".$rowstatus['codeName']."</option>";
			}
			 $data.="</select></td>
  </tr>
<tr class='evenrow'>
    <td colspan=2 >Subcomponent:</td>
    <td colspan='10'><select name='subcomponent' id='subcomponent' style='width:500px;' ><option value='' >-ALL-</option>";
	  $queryn=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."' order by id asc") or die(http(2289));
	  while($rowintervn=mysql_fetch_array($queryn)){
	  $data.="<option value=\"".$rowintervn['subcomponent']."\">".$rowintervn['subcomponent_code']." ".substr($rowintervn['subcomponent'],0,100)."</option>";
	  
	  }
      $data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan=2 >Intervention:</td>
    <td colspan='10'><select name='intervention' id='intervention' style='width:500px;'><option value=''>-ALL-</option>";
	  $queryn=mysql_query("select * from tbl_intervention intv join tbl_indicator i on(intv.intervention_id=i.intervention_id) join tbl_dcedannualtarget d on(d.indicator_id=i.indicator_id) group by intv.intervention order by intervention asc") or die(http(2289));
	  while($rowintervn=mysql_fetch_array($queryn)){
	  $data.="<option value=\"".$rowintervn['intervention']."\">".substr($rowintervn['intervention'],0,100)."</option>";
	  
	  }
      $data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='2'>Indicator:</td>
    <td width='' colspan=9><select name='indicator' id='indicator' style='width:500px;' ><option value=''>-ALL-</option>";
	  $queryint=mysql_query("select * from tbl_indicator i join tbl_dcedannualtarget d on(d.indicator_id=i.indicator_id) where expected_output='Qualitative' order by indicator_name asc") or die(http(2289));
	  while($rowint=mysql_fetch_array($queryint)){
	  $data.="<option value=\"".$rowint['indicator_name']."\">".substr($rowint['indicator_name'],0,100)."</option>";
	  
	  }
	  
$data.="</select></td>
    <td width='31'><input type='button' name='button3' id='' value='Go' onclick=\"xajax_view_DCEDQualitativeannualActual(getElementById('year').value,getElementById('timeline').value,getElementById('subsector').value,getElementById('status').value,getElementById('intervention').value,getElementById('indicator').value,getElementById('subcomponent').value);return false;\" /></td>
  </tr>";

return $data;
}



function filter_DCEDQualitativeannualActual_Manager(){

$data.="<tr class='evenrow'>
    <td colspan=3 >Target Type:</td>
    <td colspan='10'><select name='type' id='type' style='width:500px;' onchange=\"xajax_switchDCEDPlanningTypeReporting_Manager(getElementById('type').value);return false;\"><option value=''>-select-</option>";
	
	$queryx=mysql_query("select * from tbl_lookup where classCode='9' order by code asc") or die(http(2289));
	while($row=mysql_fetch_array($queryx)){
	  $$selx=($_SESSION['type']==$row['codeName'])?"SELECTED":"";
 $data.="<option value=\"".$row['codeName']."\" ".$selx." >".$row['codeName']."</option>";
	  }
	  
      $data.="</select></td>
  </tr>";

$data.="<tr class='evenrow'>
    <td width='' colspan=2>Year</td>
    <td colspan='2'><label><div style='float:left;'>
      <select name='year' id='year'><option value=''>-ALL-</option>";
	  
				$date=date('Y');
                 $yr=$date;$end=$yr;
				  do{
				  $data.="<option value=\"".$end."'>".$end."</option>";
				  $end--;
				  }while($end>=2010);
      $data.="</select></div></td>
	  <td>Timeline:</td><td width='20'><select name='timeline' id='timeline' size='1'><option value=''>-ALL-</option>";
			$querytimeline=mysql_query("select * from tbl_quarters order by quarterCode asc")or die(http(1705));
			while($rowtim=mysql_fetch_array($querytimeline)){
				$seltime=($rowtim['quarterName']==$row['timeline'])?"SELECTED":"";
			$data.="<option value=\"".$rowtim['quarterName']."\" '".$seltime."'>".$rowtim['quarterName']."</option>";
			}
			$data.="</select></td>
	  
	  
	  <td colspan='6'><div align='right'>
       ";
	  
	  
	  
	  $data.="<a href='export_to_excel_word.php?linkvar='Export Qualitative DCED Targets&&subsector=".$_SESSION['subsector']."&intervention=".$_SESSION['intervention']."&indicator=".$_SESSION['indicator']."&&subcomponent=".$_SESSION['subcomponent']."&&status=".$_SESSION['status']."&&timeline=".$_SESSION['timeline']."&&resultschainlevel=".$_SESSION['resultchain']."&&year=".$_SESSION['fyear']."&&format=excel'><input type='button' name='export' id='button2' value='Export to Excel' /></a>";
    
      
      $data.="</div>
    </label></td>
  </tr>
  <tr class='evenrow'>
  
   <td colspan=2>Subsector:</td>
    <td colspan='2'>
      <select name='subsector' id='subsector'><option value=''>-ALL-</option>";
	 
	  $queryrc=mysql_query('select * from tbl_subsector') or die("abi error-code 2361 because, ".http(__line__));
	  while($rowrc=mysql_fetch_array($queryrc)){
	  $data.="<option value=\"".$rowrc['subsector']."\">".substr($rowrc['subsector'],0,100)."</option>";
	  
	  }
       
	  $data.="</select>
    </td>
    <td colspan=2>Result Chain Level</td>
    <td colspan='2'><label>
      <select name='rchain' id='rchain'><option value=''>-ALL-</option>";
	  $queryrc=mysql_query("select * from tbl_resultschain order by name asc") or die(http(2289));
	  while($rowrc=mysql_fetch_array($queryrc)){
	  $data.="<option value=\"".$rowrc['name']."\">".substr($rowrc['name'],0,100)."</option>";
	  
	  }
      $data.="</select>
    </label></td><td colspan='2'>Status:</td><td colspan='2'><select name='status' id='status' size='1'><option value=''>-ALL-</option>";
			 $querystatus=mysql_query("select * from tbl_lookup where classCode='6' order by codeName asc")or die(http(1705));
			while($rowstatus=mysql_fetch_array($querystatus)){
			$selstatus=($rowstatus['codeName']==$row['status'])?"SELECTED":"";
			$data.="<option value=\"".$rowstatus['codeName']."\" '".$selstatus."'>".$rowstatus['codeName']."</option>";
			}
			 $data.="</select></td>
  </tr>
<tr class='evenrow'>
    <td colspan=2 >Subcomponent:</td>
    <td colspan='10'><select name='subcomponent' id='subcomponent' style='width:500px;'><option value=''>-ALL-</option>";
	  $queryn=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."' order by id asc") or die(http(2289));
	  while($rowintervn=mysql_fetch_array($queryn)){
	  $data.="<option value=\"".$rowintervn['subcomponent']."\">".$rowintervn['subcomponent_code']." ".substr($rowintervn['subcomponent'],0,100)."</option>";
	  
	  }
      $data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan=2 >Intervention:</td>
    <td colspan='10'><select name='intervention' id='intervention'  style='width:500px;' ><option value=''>-ALL-</option>";
	  $queryn=mysql_query("select * from tbl_intervention intv join tbl_indicator i on(intv.intervention_id=i.intervention_id) join tbl_dcedannualtarget d on(d.indicator_id=i.indicator_id) group by intv.intervention order by intervention asc") or die(http(2289));
	  while($rowintervn=mysql_fetch_array($queryn)){
	  $data.="<option value=\"".$rowintervn['intervention']."\">".substr($rowintervn['intervention'],0,100)."</option>";
	  
	  }
      $data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='2'>Indicator:</td>
    <td width='' colspan=9><select name='indicator' id='indicator'  style='width:500px;' ><option value=''>-ALL-</option>";
	  $queryint=mysql_query("select * from tbl_indicator i join tbl_dcedannualtarget d on(d.indicator_id=i.indicator_id) where expected_output='Qualitative' order by indicator_name asc") or die(http(2289));
	  while($rowint=mysql_fetch_array($queryint)){
	  $data.="<option value=\"".$rowint['indicator_name']."\">".substr($rowint['indicator_name'],0,100)."</option>";
	  
	  }
	  
$data.="</select></td>
    <td width='31'><input type='button' name='button3' id='' value='Go' onclick=\"xajax_view_DCEDQualitativeActual_Manager(getElementById('year').value,getElementById('timeline').value,getElementById('subsector').value,getElementById('status').value,getElementById('intervention').value,getElementById('indicator').value,getElementById('subcomponent').value);return false;\" /></td>
  </tr>";

return $data;
}


function filter_ABiTrustNewannualTarget(){
$data="
<tr>
              <td colspan='8' align=left class='green_field'><div style='float:left;' >Planning &raquo; New aBi Trust Annual Targets </div></td>
    <td width='186' scope='col'>
      <div style='float:right;'>
       
        <input type='button' name='Submit' value='Back' onclick=\"xajax_view_ABITrustannualTarget('".$activity."','')\"/>
        </div>
    </td>
  </tr>
";
		 
			
            $data.="<tr class=evenrow>
			<td colspan='2'>Programme:</td><td colspan='5'><select name='programme' id='programme' onchange=\"xajax_new_ABITrustannualTarget('abi trust',getElementById('programme').value)\">
                <option value=''>-All-</option>";
				$q=mysql_query("select * from tbl_programme order by prog_id asc")or die(http(__line__));
				while($row=mysql_fetch_array($q)){
				$sel=($programme==$row['prog_id'])?"SELECTED":"";
				$data.="<option value=\"".$row['prog_id']."\"  '".$sel."'>".$row['program_name']."</option>";
				
				}
              $data.="</select>    </td></tr>
			  <tr class='evenrow'>
              <td colspan='2' class='evenrow'>Financial Year:</td>
              <td colspan='5'><select name='fyear' id='fyear'><option value=''>-Select-</option>";
                  $yr=2013;$end=$yr;
				  do{
				  $data.="<option value=\"".$end."'>".$end."</option>";
				  $end--;
				  }while($end>=2010);
              $data.="</select></td>
            </tr>
";

return $data;
}





function filter_resultschain(){
$data="
  <tr class='evenrow'>
    <td width='' colspan=3><div style='float:left;'> Result Chain Level:
  <select name='results_chain' id='results_chain'><option value=''>-All-</option>";
	$query=mysql_query("select * from tbl_resultschain order by rc_id asc")or die(http(__line__));
	while($row=mysql_fetch_array($query)){
	$selected=($_SESSION['rcname']==$row['name'])?"SELECTED":"";
	$data.="<option value=\"".$row['name']."%' '".$selected."'>".$row['name']."</option>";
	
	}
      $data.="</select> </div> |<input type='button' name='button' id='button' value='Go' onclick=\"xajax_view_resultschain_level(getElementById('results_chain').value);return false;\">  <div style='float:right;'><input type='button' name='button3' id='button3' value='Export to Excel'> |
    <input type='button' onclick=\"xajax_add_resultschain()\" name='button2' id='button2' value='New Entry'></div></td>
  </tr>
";
return $data;
}
function filter_subsector(){
//$subsector=$_SESSION['subsector'];
$data="
  
  
  <tr class='evenrow'>
    <td width='141' colspan=3></td>
   
    <td width='76'><input type='button' name='add_intervention' id='button2' onclick=\"xajax_add_subsector()\" value='New Subsector'></td> <td width='100'><a href='export_to_excel_word.php?linkvar=Export Subsector&&subsector=".$_SESSION['subsector']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr class='evenrow'>
  <td>Subsector:</td>
<td colspan='2'><select name='subsector' id='subsector' >";

	$data.="<option value=''>-All-</option>";
      $query=mysql_query("select * from tbl_subsector  order by subsector_id asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	 /*  $sel=($_SESSION['subsector']==$row['subsector'])?"SELECTED":"";*/
	  $selected=($_SESSION['subsector']==$row['subsector'])?"SELECTED":""; 
	  $data.="<option value=\"".$row['subsector']."\" ".$selected." >".$row['subsector']."</option>";
	  
	  }
	  $data.="</select>  </td><td></td><td>
   <input type='button' name='button' id='button' value='Go' onclick=\"xajax_view_subsector(getElementById('subsector').value)\"></td>  
  </tr>
";
return $data;
}


function filter_intervention(){
//$subsector=$_SESSION['subsector'];
$data="
  
  <table>
  <tr class='evenrow'>
    <td width='' colspan=6><div style='float:left;'>Projects:</div><div style='float:right;'>
   <select name='intervention' id='intervention' class='combobox' >";

	$data.="<option value=''>-All-</option>";
      $query=mysql_query("select * from tbl_intervention  order by intervention_id asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	 /**/  $sel=($_SESSION['subsector']==$row['subsector'])?"SELECTED":"";
	  #$selected=($_SESSION['subsector']==$row['subsector'])?"SELECTED":""; 
	  $data.="<option value=\"".$row['intervention']."\" ".$sel.">".$row['intervention']."</option>";
	  
	  }
	  $data.="</select>  
   <input type='button' name='button' id='button' value='Go' onclick=\"xajax_view_intervention(getElementById('intervention').value)\"> |<input type='button' name='add_intervention' id='button2' onclick=\"xajax_add_intervention()\" value='New Project'>  | <a href='export_to_excel_word.php?linkvar=Export Intervention&&intervention=".$_SESSION['intervention']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></div></td>
  </tr>
";
return $data;
}


#***************************filter_district()***********************
function filter_district(){
$data="
  <tr class=''>
    <th scope='col'  colspan=''>District:
      <select name='district' id='district' onchange=\"xajax_view_district(getElementById('district').value,1,20);\">
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select DISTINCT(districtname) from tbl_district order by 1 ASC")or die(http(__line__));
  while($row=mysql_fetch_array($query)){
  $data.="
          <option value=\"".$row['districtname']."\">".$row['districtname']."</option>
          ";
  }
  $data.="
      </select>    </th>
    
    <th width='84' scope='col'>
      <input type='button' id='search' value='New District' onclick=\"xajax_new_district()\"  />
    </th><th scope='col' colspan=''><a href='export_to_excel_word.php?linkvar=Export District&&district=".$_SESSION['district']."&&format=excel'><input type='button' id='export' name='export' value='Export to Excel' /></a></th>
  </tr>
 
";
return $data;


}

function filter_comments(){
$data="<tr>

    <th width='' scope='col' colspan=2><div align='left'>User:
      <select name='user' id='user' onchange=\"xajax_view_comments(getElementById('user').value);return false;\">";
	  if($_SESSION['username1']!='')$data.="<option value=\"".$_SESSION['username1']."\">".$_SESSION['username1']."</option>";
	  else
	  $data.="<option value=''>-All-</option>";
	  $query1=mysql_query("select u.user_id,c.user_id,u.username from tbl_comment c inner join tbl_user u on(u.user_id=c.user_id) order by u.username asc")or die(http(__line__));
	  while($row1=mysql_fetch_assoc($query1)){
	  $data.="<option value=\"".$row1['username']."\" >".$row1['username']."</option>";
	  
	  }
      $data.="</select>
    </div>
   
  </th>
    <th width='100' scope='col'><a href='export_to_excel_word.php?linkvar=Export User Comments&&user=".$_SESSION['username1']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></th>
    <th width='100' scope='col'>
   
   <a href='new_comment.php' title='New comment'><input type='submit' name='button' id='button' value='New Comment'  /></a> </th>
  </tr>";
return $data;

}


function filter_organization($data=""){
$tot=mysql_fetch_array(mysql_query("SELECT count( * ) AS num_org FROM tbl_organization WHERE orgName != ''"))or die(http(__line__)); 
$data.="<thead>
<tr class='evenrow'>
<td class='evenrow' colspan='11'>
TOTAL OF : ".$tot['num_org']." ORGANIZATIONS |";

if($_SESSION['role']=='Managing Director')
$data.="";
else if($_SESSION['role']=='Chief Technical Advisor')
$data.="";
else

$data.="<select name='subcomponent' class='' id='subcomponent' style='width:150px;'>
<option value=''>-Select Subcomponent-</option>";
$querysubcomponent=mysql_query("select * from tbl_subcomponent where subcomponent <> '' group by subcomponent_code order by subcomponent_code asc")or die(http(__line__));

while($rowsubcomponent=mysql_fetch_array($querysubcomponent)){
$selectedsubcomponent=$_SESSION['subcomponentorg']==$rowsubcomponent['subcomponent']?"SELECTED":"";
$data.="
<option value=\"".$rowsubcomponent['subcomponent']."\" ".$selectedsubcomponent.">".$rowsubcomponent['subcomponent_code']." ".substr($rowsubcomponent['subcomponent'],0,100)."</option>";
}
$data.="</select>

<select name='orgname' class='' id='orgname' style='width:150px;'>
<option value=''>-Select Sub-Sector-</option>";
$data.="<option value=''>-Select Organization-</option>";
$query=mysql_query("select distinct(orgName) from tbl_organization where orgName <> '' group by orgName")or die(http(__line__));

while($row=mysql_fetch_array($query)){
$selected1=$_SESSION['orgname1']==$row['orgName']?"SELECTED":"";
$data.="
<option value=\"".$row['orgName']."\" ".$selected1.">".substr($row['orgName'],0,100)."</option>
";
}
$data.="</select>

<select name='subsector' id='subsector' style='width:150px;'>
<option value=''>-Select Organization Type-</option>";
$querysubsector=mysql_query("select * from tbl_subsector where subsector <> '' group by subsector_id order by subsector_id asc")or die(http(__line__));
while($rowsubsector=mysql_fetch_array($querysubsector)){
$selectedsubsector=$_SESSION['subsectororg']==$rowsubsector['subsector']?"SELECTED":"";
$data.="
<option value=\"".$rowsubsector['subsector']."\" ".$selectedsubsector.">".$rowsubsector['subsector']." </option>
";
}
$data.="</select>

<select name='orgtype' id='orgtype' style='width:150px;'>
<option value=''>-Select Sub sector-</option>";
$query=mysql_query("select distinct(codeName) from tbl_lookup  where classCode='1' order by codeName ASC")or die(http(__line__));

while($row=mysql_fetch_array($query)){

$selected2=$_SESSION['orgtype1']==$row['codeName']?"SELECTED":"";
$data.="<option value=\"".$row['codeName']."\" ".$selected2.">".$row['codeName']."</option>";
}
$data.="
</select>

<select name='district' id='district' style='width:150px;'>
<option value=''>-Select District-</option>";
$query=mysql_query("select distinct(district) from tbl_organization where district <> '' group by district order by district asc")or die(http(__line__));

while($row=mysql_fetch_array($query)){
$selected=$_SESSION['district1']==$row['district']?"SELECTED":"";
$data.="<option value=\"".$row['district']."\" '".$selected."'>".$row['district']."</option>";
}
$data.="</select>

<input name='search' type='button' value='Go' 
onclick=\"xajax_view_organization(
getElementById('subcomponent').value,
getElementById('subsector').value,
getElementById('orgname').value,
getElementById('orgtype').value,
getElementById('district').value
);\" /> | 

<a href='export_to_excel_word.php?linkvar=Export Organization
&&districtName=".$_SESSION['district1']."
&orgName=".$_SESSION['orgname1']."&
&orgtype=".$_SESSION['orgtype1']."
&&subcomponent=".$_SESSION['subcomponentorg']."
&&subsector=".$_SESSION['subsectororg']."
&&format=word'>
<input name='export' type='button' value='Export to Excel' />
</a> | 

<input type='button' name='newentry' value='Add Organization' onclick=\"xajax_new_organization();return false;\">

</td>
</tr>";
return $data;

}

function branch_filter(){

$data="<table width='670' border='0'>
  <tr>
    <td width='127'>ORGANIZATION</td>
    <td width='140'>BRANCH</td>
    <td width='251'>LOCATION</td>
    <td width='110'>&nbsp;</td>
    <td width='20'>&nbsp;</td>
  </tr>
</table>";
return $data;

} 

function filter_programme(){
//$programme=$_SESSION['programme'];
//$funder=$_SESSION['funder'];

$data="
  <tr CLASS='evenrow'>
    
    <td  colspan='3'></td>
    <td width='154' align='right'><input type='button' name='new_programme' value='Add Programme' onclick=\"xajax_add_programme();return false;\" />
      </td>
    <td width='40' align='right'><label><a href='export_to_excel_word.php?linkvar=Export Programme&&programme=".$_SESSION['programme']."&&funder=".$_SESSION['funder']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a>
      
    </label></td>
    
  </tr>
  <tr CLASS='evenrow'>
  <td width='200'>PROGRAMME </td>
    <td colspan='2'><select name='program' id='program'>";
 	if($_SESSION['programme']!=''){
	//$data.="<option value=\"".$_SESSION['programme']."\" 'selelcted'>".$_SESSION['programme']."</option>";
	 $query1=mysql_query("select * from tbl_programme where lower(program_name) like '%".strtolower($_SESSION['programme'])."%' order by program_name asc")or die(http(__line__));
	  while($row1=mysql_fetch_array($query1)){
	  $sel=($_SESSION['programme']==$row1['program_name'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['program_name']."%' '".$sel."'>".$row1['program_name']."</option>";
	  
	   }
	   }
	else 
	
	$data.="<option value='%' >-All-</option>";
	  $query11=mysql_query("select * from tbl_programme where program_name <> '' order by program_name")or die(http(__line__));
	  while($row11=mysql_fetch_array($query11)){
	 // $sel=($_SESSION['programme']==$row1['program_name'])?"SELECTED":"";
	  $data.="<option value=\"".$row11['program_name']."%' '".$sel."'>".$row11['program_name']."</option>";
	  
	  
	  
	  }
     $data.="</select></td>
    <td colspan='2'><select name='funder' id='funder'>";
	if($_SESSION['funder']!=''){
	//$data."<option value=\"".$_SESSION['funder']."\" 'selected'>".$_SESSION['funder']."</option>";
	 $query2=mysql_query("select * from tbl_programme where lower(Funder) like '%".strtolower($_SESSION['funder'])."%' order by Funder")or die(http(__line__));
	  while($row2=mysql_fetch_array($query2)){
	   //$select=($_SESSION['funder']==$row1['Funder'])?"SELECTED":"";
	  $data.="<option value=\"".$row2['Funder']."%' '".$select."'>".substr($row2['Funder'],0,50)."</option>";
	  
	  }}
	else
	$data.="<option value='%' >-All-</option>"; 
	  $query2=mysql_query("select * from tbl_programme where Funder <> '' order by Funder")or die(http(__line__));
	  while($row2=mysql_fetch_array($query2)){
	   //$select=($_SESSION['funder']==$row1['Funder'])?"SELECTED":"";
	  $data.="<option value=\"".$row2['Funder']."%' '".$select."'>".substr($row2['Funder'],0,50)."</option>";
	  
	  }
     $data.="
      </select></td>
    <td><input name='search' type='button' value='Go'  onclick=\"xajax_search_programme(getElementById('program').value,getElementById('funder').value)\"/></td>
    <td>&nbsp;</td>
    
  </tr>
";
return $data;

}

function filter_component(){

$data="<tr CLASS='evenrow'>

	
	
    <td colspan='3'></td>
    <td width='154' align='right'><label>
    <input type='button' name='new_programme' value='Add Component' onclick=\"xajax_add_component();return false;\" />
    </label></td>
    <td width='40' align='right'><label>
	  
    <a href='export_to_excel_word.php?linkvar=Export Component&&component=".$_SESSION['component']."&&programme=".$_SESSION['program_name']."&&funder=".$_SESSION['Funder']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a>
    </label></td>
    
  </tr>
  <tr CLASS='evenrow'>
    <td width='70'>COMPONENT</td>
	<td><label>
      <select name='ccomponent' id='ccomponent' class='combobox'>";
	  if($_SESSION['component']<>''){
	  $query2=mysql_query("select * from tbl_component where lower(component) like '%".strtolower($_SESSION['component'])."%' order by component asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query2)){

	  $data.="<option value=\"".$row['component']."%' >".$row['component']."</option>";
	  
	  }
	  }else
	  	$data.="<option value='%' >-All-</option>";
	 
	  $query2=mysql_query("select * from tbl_component  order by component asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query2)){
	  $data.="<option value=\"".$row['component']."%' '>".$row['component']."</option>";
	  }
     $data.="</select>
</td> <td align='right' COLSPAN='10'><input name='search' type='button' value='Go' title='search' onclick=\"xajax_search_component(getElementById('ccomponent').value,getElementById('programme').value,getElementById('funder').value);return false;\" /></td>
    <td COLSPAN='3'>&nbsp;</td></tr>
<!--<tr>
<td width='70' colspan='2'>PROGRAMME</td>
	<td>
      <select name='programme' id='programme' class='comboobox'>";
	
	$data.="<option value='' >-All-</option>";
	  $query11=mysql_query("select * from tbl_programme where program_name <> '' order by program_name")or die(http(__line__));
	  while($row11=mysql_fetch_array($query11)){

	  $data.="<option value=\"".$row11['program_name']."%'>".$row11['program_name']."</option>";
	  }
     $data.="</select>
    </label></td>
	
    <td><label>
      <select name='funder' id='funder'>";
	 if($_SESSION['Funder']!=''){
	
	 $query2=mysql_query("select * from tbl_programme where lower(Funder) like '%".strtolower($_SESSION['Funder'])."%' order by Funder")or die(http(__line__));
	  while($row2=mysql_fetch_array($query2)){
	 
	  $data.="<option value=\"".$row2['Funder']."%' >".substr($row2['Funder'],0,25)."</option>";
	  
	  }}
	else
	$data.="<option value='%' >-All-</option>"; 
	  $query2=mysql_query("select * from tbl_programme where Funder <> '' order by Funder")or die(http(__line__));
	  while($row2=mysql_fetch_array($query2)){

	  $data.="<option value=\"".$row2['Funder']."%' '".$select."'>".substr($row2['Funder'],0,25)."</option>";
	  
	  } 
     $data.="
      </select>
    </label></td>
    <td align='right'><input name='search' type='button' value='Go' title='search' onclick=\"xajax_search_component(getElementById('ccomponent').value,getElementById('programme').value,getElementById('funder').value);return false;\" /></td>
    <td>&nbsp;</td>
    
  </tr>-->
";
return $data;

}

function filter_subcomponent(){

$data="<tr CLASS='evenrow'>
    <td width='5'>CODE</td>
	<td width='100'>SUBCOMPONENT</td>
	

    <td width='10' align='right'><label>
 <input type='button' name='new_programme' value='Add Sub-Component' onclick=\"xajax_add_subcomponent('');return false;\" />

    </label></td>
    <td width='10' align='left'><label>
       <a href='export_to_excel_word.php?linkvar=Export Sub-Component&&code=".$_SESSION['ssubcomponent_code']."&&subcomponent=".$_SESSION['ssubcomponent']."&&component=".$_SESSION['scomponent']."&&programme=".$_SESSION['sprogramme']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a>
    </label></td>
  </tr>
  <tr CLASS='evenrow'>
    <td><label>
      <select name='code' id='code' >";
	  
	  if($_SESSION['ssubcomponent_code']<>''){
	  $query=mysql_query("select * from tbl_subcomponent where lower(subcomponent_code) like '%".strtolower($_SESSION['ssubcomponent_code'])."%'  order by subcomponent_code")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){

	  $data.="<option value='%".$row['subcomponent_code']."%' >".$row['subcomponent_code']."</option>";
	  }
	  }
	  else
	   $data.="<option value='' >-All-</option>";
	  $query1=mysql_query("select * from tbl_subcomponent where subcomponent_code <> '' order by subcomponent_code")or die(http(__line__));
	  while($row=mysql_fetch_array($query1)){

	  $data.="<option value='%".$row['subcomponent_code']."%' >".$row['subcomponent_code']."</option>";
	  }
     $data.="</select>
    </label></td>
	<td><label>
      <select name='subcomponent' id='subcomponent' style='width:300px;'>";
	  if($_SESSION['ssubcomponent']<>''){
	  $query2=mysql_query("select * from tbl_subcomponent where lower(subcomponent) like '".strtolower($_SESSION['ssubcomponent'])."%' and subcomponent <> '' order by subcomponent")or die(http(__line__));
	  while($row2=mysql_fetch_array($query2)){
	  $data.="<option value=\"".$row2['subcomponent']."%'>".$row2['subcomponent_code']." ".$row2['subcomponent']."</option>";
	  
	  }
	  }else
	  $data.="<option value='%' >-All-</option>";
	 $query2=mysql_query("select * from tbl_subcomponent where subcomponent <> '' order by subcomponent")or die(http(__line__));
	  while($row2=mysql_fetch_array($query2)){
	  $data.="<option value=\"".$row2['subcomponent']."%'>".$row2['subcomponent_code']." ".$row2['subcomponent']."</option>";
	  } 
	  
     $data.="</select>
    </label></td>
	
   
    <td>PROGRAMME:</td>
     <td></td>
    
  </tr>
  <tr CLASS='evenrow'><td>COMPONENT:</td><td><label>
      <select name='component' id='component' style='width:300px;'>";
	  if($_SESSION['scomponent']<>''){
	  $query22=mysql_query("select * from tbl_component where lower(component) like '".strtolower($_SESSION['scomponent'])."' order by component asc")or die(http(__line__));
	  while($row22=mysql_fetch_array($query22)){

	  $data.="<option value=\"".$row22['component']."%' >".$row22['component']."</option>";
	  
	  }
	  }else
	  	$data.="<option value='%' >-All-</option>";
	 
	  $query23=mysql_query("select * from tbl_component  order by component asc")or die(http(__line__));
	  while($row23=mysql_fetch_array($query23)){
	  $data.="<option value=\"".$row23['component']."%' >".$row23['component']."</option>";
	  }
     $data.="</select>
    </label></td><td align=left><SELECT name='programme' id='programme' calss='combobox' >";
	
	$data.="<option value='' >-All-</option>";
	  $query13=mysql_query("select * from tbl_programme where program_name <> '' order by program_name asc")or die(http(__line__));
	  while($row13=mysql_fetch_array($query13)){
	 $sel=($_SESSION['sprogramme']==$row113['program_name'])?"SELECTED":"";
	  $data.="<option value=\"".$row13['program_name']."' ".$sel." >".$row13['program_name']."</option>";
	   }
	   
	$data.="</select> </td><td><input name='search' type='button' value='Go' title='search' onclick=\"xajax_view_subcomponent(getElementById('code').value,getElementById('subcomponent').value,getElementById('component').value,getElementById('programme').value);return false;\" /></td>
	<td></td>
</tr>
";
return $data;

}

function filter_output(){
/* 
  $_SESSION['output_code']=$code;
  $_SESSION['output_name']=$output;
  $_SESSION['subcomponent']=$subcomponent;
  $_SESSION['component']=$component; */

$data="<tr CLASS='evenrow'>
    <td width='5'>CODE</td>
	<td width='100'>OUTPUT</td>
	


    <td width='10' align='right'><label>
      <a href='export_to_excel_word.php?linkvar=Export Output&&code=".$_SESSION['ooutput_code']."&&output_name=".$_SESSION['ooutput_name']."&&subcomponent=".$_SESSION['osubcomponent']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a>
    </label></td>
    <td width='10' align='left'><label>
      <input type='button' name='new_programme' value='Add Output' onclick=\"xajax_add_output('');return false;\" />
    </label></td>
  </tr>
  <tr CLASS='evenrow'>
    <td><label>
      <select name='code' id='code'>";
	  if($_SESSION['ooutput_code']<>'')
	  #$query=mysql_query("select output_code from tbl_output where lower(output_code) like '".strtolower($_SESSION['ooutput_code'])."%' order by output_code")or die(http(__line__));
	  #while($row=mysql_fetch_array($query)){
	  #$selected=($_SESSION['ooutput_code']==$row['output_code'])?"SELECTED":"";
	  $data.="<option value=\"".$_SESSION['ooutput_code']."\" >".$_SESSION['ooutput_code']."</option><option value='%' >-All-</option>";
	 
	
	else 
	  $data.="<option value='%' >-All-</option>";
	   $query=mysql_query("select output_code from tbl_output where output_code <> '' order by output_code")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	   $selected=($_SESSION['ooutput_code']==$row['output_code'])?"SELECTED":"";
	  $data.="<option value=\"".$row['output_code']."\" '".$selected."'>".$row['output_code']."</option>";
	  
	  }
     $data.="</select>
    </label></td>
	<td><label>
      <select name='outputName' id='outputName' class='combobox'>";
	  if($_SESSION['ooutput_name']<>'')
	   //$query=mysql_query("select * from tbl_output where lower(output_name) like '".strtolower($_SESSION['ooutput_name'])."%' order by output_code")or die(http(__line__));
	 // while($row=mysql_fetch_array($query)){
	 // $selected=($_SESSION['ooutput_name']==$row['output_name'])?"SELECTED":"";
	  $data.="<option value=\"".$_SESSION['ooutput_name']."\" >".$_SESSION['ooutput_code']." ".$_SESSION['ooutput_name']."</option><option value='%' >-All-</option>";
	  
	  //}//$data.="</option><option value='%' >-All-</option>";}
	  else 
	  $data.="<option value='' >-All-</option>";
	  $query=mysql_query("select * from tbl_output where output_name <> '' order by output_code")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	   $selected=($_SESSION['ooutput_name']==$row['output_name'])?"SELECTED":"";
	  $data.="<option value=\"".$row['output_name']."\" ".$selected.">".$row['output_code']." ".$row['output_name']."";
	  }
     $data.="</select>
    </label></td>
	
   
    <td>COMPONENT:</td>
     <td></td>
    
  </tr>
  <tr CLASS='evenrow'><td>SUB-COMPONENT:</td><td><label>
      <select name='subcomponent' id='subcomponent' class='combobox'>";
	   if($_SESSION['osubcomponent']!='')
	  $data.="<option value=\"".$_SESSION['osubcomponent']."\">".$_SESSION['osubcomponent']."</option><option value='' >-All-</option>
	  ";
	 
	  else 
	  $data.="<option value='' >-All-</option>";
	  $query=mysql_query("select * from tbl_subcomponent where subcomponent <> '' order by subcomponent_code asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  $selected=($_SESSION['osubcomponent']==$row['subcomponent'])?"SELECTED":"";
	  $data.="<option value=\"".$row['subcomponent']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
	  }
     $data.="</select>
    </label></td><td align=left><SELECT name='component' id='component'>";
	 if($_SESSION['ocomponent']<>'')
	##$query=mysql_query("select * from tbl_component where lower(component) like  '".strtolower($_SESSION['component'])."%' order by component  asc")or die(http(__line__));
	#while($row=mysql_fetch_array($query)){
	$data.="<option value=\"".$_SESSION['ocomponent']."\">".$_SESSION['ocomponent']."</option><option value='' >-All-</option>";
	#}
	#
	#}
	else 
	$data.="<option value='%' >-All-</option>";
	$query=mysql_query("select * from tbl_component where component <> '' order by component  asc")or die(http(__line__));
	while($row=mysql_fetch_array($query)){
	$sel=($_SESSION['oocomponent']==$row['component'])?"SELECTED":"";
	$data.="<option value=\"".$row['component']."\" >".$row['component']."</option>";
	}
	$data.="</select></td><td><input name='search' type='button' value='Go' title='search' onclick=\"xajax_view_output(getElementById('code').value,getElementById('outputName').value,getElementById('subcomponent').value,getElementById('component').value);return false;\" /></td>
</tr>
";
return $data;

}

function filter_activity(){
/*  $_SESSION['activity_code']=$code;
  $_SESSION['activity_name']=$activity;
  $_SESSION['output']=$output;
  $_SESSION['subcomponent']=$subcomponent;
  $_SESSION['component']=$component;
  $_SESSION['program_name']=$programme; */
$data="
<tr CLASS='evenrow'>

    <td width='100'>CODE:      </td>
	<td colspan='2'><div align='left' style='float:left;'>
	  <select name='code' id='code' class='combobox'>";
	  if($_SESSION['activity_code']<>'')
	  $data.="<option value=\"".$_SESSION['activity_code']."%' >".$_SESSION['activity_code']."</option><option value='%' >-All-</option>";
	  else
        $data.="<option value='' >-All-</option>";
	  $query=mysql_query("select activity_code from tbl_activity where activity_code <> '' order by activity_code")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  $data.="
        <option value=\"".$row['activity_code']."\">".$row['activity_code']."</option>
        ";
	  
	  }
     $data.="
      </select></div><div align='right'>
	   
	    <input type='button' name='new_programme' value='Add Activity' onclick=\"xajax_add_activity('');return false;\" /> <a href='export_to_excel_word.php?linkvar=Export Activity&&code=". $_SESSION['activity_code']."&&activity=".$_SESSION['activity_name']."&&output=".$_SESSION['output']."&&subcomponent=".$_SESSION['subcomponent']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a>
      </div></td>
</tr>
<tr CLASS='evenrow'>

    <td>
      ACTIVITY:    </td>
    <td colspan='2'><select name='activity_name' id='activity_name' class='combobox'>";
	if($_SESSION['activity_name']<>'')
	
	  $data.="<option value=\"".$_SESSION['activity_name']."%\" >".$_SESSION['activity_code']." ".$_SESSION['activity_name']."</option><option value='%' >-All-</option>";
	  else
        $data.="<option value='%' >-All-</option>";
	  $query=mysql_query("select * from tbl_activity where activity_name <> '' order by activity_code asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  $data.="
      <option value=\"".$row['activity_name']."%\">".$row['activity_code']." ".$row['activity_name']."</option>
      ";
	  
	  }
     $data.="
    </select></td>
   
</tr>
  <tr CLASS='evenrow'>
    <td><label>OUTPUT:
	    
</label></td>
	<td width='100'><select name='output' id='output' class='combobox'>";
	if($_SESSION['output']<>'')
	  $data.="<option value=\"".$_SESSION['output']."%\" >".$_SESSION['output']."</option><option value='%' >-All-</option>";
	  else
        $data.="<option value='' >-All-</option>";
	$query=mysql_query("select * from tbl_output where output_name <> '' order by output_code  asc")or die(http(__line__));
	while($row=mysql_fetch_array($query)){
	$data.="
      <option value=\"".$row['output_name']."\" >".$row['output_code']." ".substr($row['output_name'],0,70)."</option>
      ";
	}
	
	$data.="
    </select></td>
	
  </tr>
  <tr CLASS='evenrow'>
    <td width='100'>SUBCOMPONENT:</td>
    <td><select name='subcomponent' id='subcomponent' class='combobox'>";
	if($_SESSION['subcomponent']<>'')
	  $data.="<option value=\"".$_SESSION['subcomponent']."%' >".$_SESSION['subcomponent']."</option><option value='%' >-All-</option>";
	  else
        $data.="<option value='' >-All-</option>";
	  $query=mysql_query("select * from tbl_subcomponent where subcomponent <> '' order by subcomponent_code asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  $data.="
        <option value=\"".$row['subcomponent']."%\">".$row['subcomponent_code']." ".substr($row['subcomponent'],0,70)."</option>
        ";
	  }
     $data.="
      </select></td>
    

  </tr>
  <tr CLASS='evenrow'>
    <td>COMPONENT:</td>
    <td><select name='component' id='component' class='combobox'>";
	if($_SESSION['component']<>'')
	$data.="<option value=\"".$_SESSION['component']."%' >".$_SESSION['component']."</option><option value='%' >-All-</option>";
	  else
	 $data.="<option value='' >-All-</option>"; 
	  $query=mysql_query("select * from tbl_component where component <> '' order by component asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  $data.="
      <option value=\"".$row['component']."%\">".$row['component_code']." ".$row['component']."</option>
      ";
	  
	  }
     $data.="
    </select>
      PROGRAMME:
      
    <select name='programme' id='programme' class='combobox'>
        <option value='' >-All-</option>
        ";
		if($_SESSION['program_name']<>'')
	$data.="<option value=\"".$_SESSION['program_name']."%' >".$_SESSION['program_name']."</option><option value='%' >-All-</option>";
	  else
	  $data.="<option value='' >-All-</option>";
	  $query=mysql_query("select * from tbl_programme where program_name <> '' order by program_name")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  $data.="
        <option value=\"".$row['program_name']."\">".$row['program_name']."</option>
        ";
	  
	  }
     $data.="
      </select>
    <input name='search' type='button' value='Go' title='search' onclick=\"xajax_view_activity(getElementById('code').value,getElementById('activity_name').value,getElementById('output').value,getElementById('subcomponent').value,getElementById('component').value,getElementById('programme').value);return false;\" /></td>
   
  </tr>
";
return $data;

}



function filter_subactivity(){
/* $_SESSION['sacode']=$code;
  $_SESSION['sasubactivity']=$subactivity;
  $_SESSION['saactivity']=$activity;
  $_SESSION['saoutput']=$output;
  $_SESSION['sasubcomponent']=$subcomponent;
  $_SESSION['sacomponent']=$component;
  $_SESSION['saprogramme']=$programme; */
$data="<tr CLASS='evenrow'>

    <td width='100'>SUBACTIVITY-CODE:      </td>
	<td colspan='2'><div align='left' style='float:left;'>
	  <select name='code' id='code' class='combobox'>
        
        ";
		if($_SESSION['sacode']!='')
	   $data.="<option value=\"".$_SESSION['sacode']."\" >".$_SESSION['sacode']."</option><option value='%' >-All-</option>";
		
		  else
		    $data.="<option value=''>-All-</option>";
	  
	  $query=mysql_query("select subactivity_code from tbl_subactivity where subactivity_code <> '' order by subactivity_code")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  $sel=($_SESSION['sacode']==$row['subactivity_code'])?"SELECTED":"";
	  $data.="
        <option value=\"%".$row['subactivity_code']."\" ".$sel.">".$row['subactivity_code']."</option>
        ";
	  
	  }
     $data.="
      </select></div><div align='right'>
	  <input type='button' name='new_programme' value='Add Sub-Activity' onclick=\"xajax_add_subactivity('','');return false;\" />
	    <a href='export_to_excel_word.php?linkvar=Export Sub-Activity&&code=".$_SESSION['sacode']."&&subactivity=".$_SESSION['sasubactivity']."&&activity=".$_SESSION['saactivity']."&&output=".$_SESSION['saoutput']."&&subcomponent=".$_SESSION['sasubcomponent']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a>
	    
      </div></td>
</tr>

<tr CLASS='evenrow'>

    <td width='100'>SUB-ACTIVITY:     </td>
	<td colspan='2'><div align='left' style='float:left;'>
	  <select name='subactivity' id='subactivity' class='combobox'>
	  
        
        ";
		if($_SESSION['sasubactivity']!='')
	   $data.="<option value=\"".$_SESSION['sasubactivity']."\" >".$_SESSION['sasubactivity']."</option><option value='%' >-All-</option>";
		
		  else
		    $data.="<option value=''>-All-</option>";
	  
	  $query=mysql_query("select * from tbl_subactivity where subactivity_name <> '' order by subactivity_code asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  $sel=($_SESSION['sasubactivity']==$row['subactivity_name'])?"SELECTED":"";
	  $data.="
        <option value=\"%".$row['subactivity_name']."\" ".$sel.">".$row['subactivity_code']." ".$row['subactivity_name']."</option>
        ";
	  
	  }
     $data.="
      </select></div><div align='right'>
	    
      </div></td>
</tr>

<tr CLASS='evenrow'>

    <td>
      ACTIVITY:    </td>
    <td colspan='2'><select name='activity' id='activity' class='combobox'>
      
      ";
	    if($_SESSION['saactivity']!='')
	   $data.="<option value=\"".$_SESSION['saactivity']."\" >".$_SESSION['saactivity']."</option><option value='%' >-All-</option>";
		
		  else
		    $data.="<option value=''>-All-</option>";
	  
	  $query=mysql_query("select * from tbl_activity where activity_name <> '' order by activity_code")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	 $sel=($_SESSION['saactivity']==$row['activity_name'])?"SELECTED":"";
	  $data.="
      <option value=\"".$row['activity_name']."\" ".$sel.">".$row['activity_code']." ".$row['activity_name']."</option>
      ";
	  
	  }
     $data.="
    </select></td>
   
</tr>
  <tr CLASS='evenrow'>
    <td><label>OUTPUT:
	    
</label></td>
	<td width='100'><select name='output' id='output' class='combobox'>
      
      ";
	   if($_SESSION['saoutput']!='')
	   $data.="<option value=\"".$_SESSION['saoutput']."\" >".$_SESSION['saoutput']."</option><option value='%' >-All-</option>";
		
		  else
		    $data.="<option value=''>-All-</option>";
	$query=mysql_query("select * from tbl_output where output_name <> '' order by output_code  asc")or die(http(__line__));
	while($row=mysql_fetch_array($query)){
	$selected=($_SESSION['saoutput']==$row['output_name'])?"SELECTED":"";
	$data.="
      <option value=\"".$row['output_name']."\" ".$selected.">".$row['output_code']." ".substr($row['output_name'],0,70)."</option>
      ";
	}
	
	$data.="
    </select></td>
	
  </tr>
  <tr CLASS='evenrow'>
    <td width='100'>SUBCOMPONENT:</td>
    <td><select name='subcomponent' id='subcomponent' class='combobox'>
        
        ";
		 if($_SESSION['sasubcomponent']!='')
	   $data.="<option value=\"".$_SESSION['sasubcomponent']."\" >".$_SESSION['sasubcomponent']."</option><option value='%' >-All-</option>";
		
		  else
	  $data.="<option value=''>-All-</option>";
	  $query=mysql_query("select * from tbl_subcomponent where subcomponent <> '' order by subcomponent_code")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  //$SEL=($_SESSION['sasubcomponent']==$row['subcomponent'])?"SELECTED":"";
	  $data.="
        <option value=\"".$row['subcomponent']."\" ".$SEL.">".$row['subcomponent_code']."  ".substr($row['subcomponent'],0,70)."</option>
        ";
	  }
     $data.="
      </select></td>
    

  </tr>
  <tr CLASS='evenrow'>
    <td>COMPONENT:</td>
    <td><select name='component' id='component' class='combobox'>
     
      ";
	  if($_SESSION['sacomponent']!='')
	   $data.="<option value=\"".$_SESSION['sacomponent']."%' >".$_SESSION['sacomponent']."</option><option value=''>-All-</option>";
	  else
	  $data.="<option value=''>-All-</option>";
	  $query=mysql_query("select * from tbl_component where component <> '' order by component")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	   // $SEL=($_SESSION['sacomponent']==$row['component'])?"SELECTED":"";
	  
	  $data.="<option value=\"".$row['component']."\" '".$SEL."'>".$row['component']."</option>";
	  
	  }
     $data.="
     <option value='%' >-All-</option></select>
      PROGRAMME:
      
    <select name='programme' id='programme'>
       
        ";
		if($_SESSION['saprogramme']<>NULL)
		$data.="<option value=\"".$_SESSION['saprogramme']."\">".$_SESSION['saprogramme']."</option><option value=''>-All-</option>";
		else
		$data.="<option value=''>-All-</option>";
	  $query=mysql_query("select * from tbl_programme where program_name <> '' order by program_name")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	   
 
    //$SEL=($_SESSION['saprogramme']==$row['program_name'])?"SELECTED":"";
	  $data.="
        <option value=\"".$row['program_name']."%' '".$SEL."'>".$row['program_name']."</option>
        ";
	  
	  }
	  
	  //
     $data.=" 
      </select>
    <input name='search' type='button' value='Go' title='search' onclick=\"xajax_view_subactivity(getElementById('code').value,getElementById('subactivity').value,getElementById('activity').value,getElementById('output').value,getElementById('subcomponent').value,getElementById('component').value,getElementById('programme').value);return false;\" /></td>
   
  </tr>
";
return $data;

}

function filter_indicator(){
$data="





<tr class='evenrow'><td scope='col' colspan=4>
        <div align='left' >Type of Indicator:</div>
        <div ></div>
        <div style='float:right;'></div></td>
    <td scope='col' colspan='5'> <select name='type_ofindicator' id='type_ofindicator' class='combobox' onChange=\"xajax_view_indicator(this.value,'".$_SESSION['subcomponent']."','".$_SESSION['output']."','".$_SESSION['activity']."','".$_SESSION['subactivity']."','".$_SESSION['target']."','".$_SESSION['indicator11']."','','".$_SESSION['mapping_type']."',1,20);return false;\" >
        <option value=''>-All-</option>
        ";
					
					$data.=QueryManager::IndicatorTypeFilter($_SESSION['indicatorType']);

		$data.="
      </select></td>
	  
	  <td colspan='6' scope='col'><span style='float:right;'>
        <input type='button' name='button' id='button' value='Add Indicator'  onclick=\"xajax_add_indicator('','','')\"/> |
      <a href='export_to_excel_word.php?linkvar=Export Indicator&&indicator_type=".$_SESSION['indicatorType']."&&subcomponent=".$_SESSION['subcomponent']."&&output=".$_SESSION['output']."&&activity=".$_SESSION['activity']."&&subactivity=".$_SESSION['subactivity']."&&target=".$_SESSION['target']."&&indicator=".$_SESSION['indicator11']."&&mappingType=".$_SESSION['mapping_type']."&&format=excel'>
      <input type='button' name='export' value='Export to Excel' />
    </a> | 
	
	<a href='print_version.php?linkvar=Print Indicator&&indicator_type=".$_SESSION['indicatorType']."&&subcomponent=".$_SESSION['subcomponent']."&&output=".$_SESSION['output']."&&activity=".$_SESSION['activity']."&&subactivity=".$_SESSION['subactivity']."&&target=".$_SESSION['target']."&&indicator=".$_SESSION['indicator11']."&&mappingType=".$_SESSION['mapping_type']."&&format=Print' target='_blank'>
      <input type='button' name='export' value='Print Version' />
    </a>
    </span></td>
    
  </tr>
  
  
  
  <tr class='evenrow'><td scope='col' colspan=4>
        <div align='left' >Level of Indicator Mapping:</div>
        <div ></div>
        <div style='float:right;'></div></td>
    <td scope='col' colspan='11'> <select name='mapping_type' id='mapping_type' class='combobox' onChange=\"xajax_view_indicator('".$_SESSION['indicatorType']."','".$_SESSION['subcomponent']."','".$_SESSION['output']."','".$_SESSION['activity']."','".$_SESSION['subactivity']."','".$_SESSION['target']."','".$_SESSION['indicator11']."','',this.value,1,20);return false;\" >
        <option value=''>-All-</option>
        ";
	
		
	$data.=QueryManager::MappingTypeFilter($_SESSION['mapping_type']);

		$data.="
      </select></td>
    
  </tr>

  <tr>
    <td scope='col' colspan='4' class='evenrow'><div align='left'>
     SUB-COMPONENT:
    </div></td>
    <td colspan='9' scope='col' class='evenrow'><div align='left'><span class='evenrow'> 
      <select name='subcomponent' id='subcomponent' class='combobox'  onChange=\"xajax_view_indicator('".$_SESSION['indicatorType']."',this.value,'".$_SESSION['output']."','".$_SESSION['activity']."','".$_SESSION['subactivity']."','".$_SESSION['target']."','".$_SESSION['indicator11']."','".$_SESSION['resultChain']."','".$_SESSION['mapping_type']."',1,20);return false;\">";
	  $data.="<option value=''>-All-</option>";
	$data.=QueryManager::SubcomponentFilter($_SESSION['subcomponent']);
      $data.="</select>
    </span></div></td>
  </tr>";
  if($_SESSION['indicatorType']=='DCED Based'){
  
  $data.="<tr class='evenrow'> 
    <td width='165' scope='col' colspan=4><div align='left' width=165>Result Chain Level: </div><div align='left'></div></td>
    <td colspan='9' scope='col'><div align='left'>
	 <select name='resultChainLevel' id='resultChainLevel' onChange=\"xajax_view_indicator('".$_SESSION['indicatorType']."','".$_SESSION['subcomponent']."','".$_SESSION['output']."','".$_SESSION['activity']."','".$_SESSION['subactivity']."','".$_SESSION['target']."','".$_SESSION['indicator11']."',this.value,'".$_SESSION['mapping_type']."',1,20);return false;\"  class='combobox'>
       <option value=''>-All-</option>";
	$data.=QueryManager::ResultChainFilter($_SESSION['resultChain']);
	  
      $data.="</select></div></td>
  </tr>";
  
  
  }else{
  
  $data.="<tr class='evenrow'>
    <td width='165' scope='col' colspan=4><div align='left' width=165>OUTPUT: </div><div align='left'></div></td>
    <td colspan='8' scope='col'><div align='left'> <select name='output' id='output' class='combobox'>
        ";
	   if($_SESSION['output']!=NULL)
	  $data.="<option value=\"".$_SESSION['output']."\">".$_SESSION['output']."</option>
        <option value=''>-ALL-</option>";
	  else
	  $data.="<option value=''>-All-</option>";
	 $query=mysql_query("select * from tbl_output where output_name <> '' group  by output_code order by output_code asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['output_name']."\">".$row['output_code']." ".substr($row['output_name'],0,30)."</option>
        ";
	  } 
      $data.="</select></div></td>
  </tr>
  <tr class='evenrow'>
    <td class=evenrow scope='col' colspan=4><div align='left' width=165>
     ACTIVITY: 
      </div></td>
    <td colspan='8' scope='col'><div align='left' class=evenrow>
      <select name='activity' id='activity' class='combobox'>
        ";

	  if($_SESSION['activity']!=NULL)
	  $data.="
        <option value=\"".$_SESSION['activity']."\">".$_SESSION['activity']."</option>
        <option value=''>-ALL-</option>
        ";
	  else
	  $data.="
        <option value=''>-All-</option>
        ";
	 $query=mysql_query("select * from tbl_activity where activity_name <> '' group by activity_code order by activity_code asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="
        <option value=\"".$row['activity_name']."\">".$row['activity_code']." ".substr($row['activity_name'],0,30)."</option>
        ";
	  } 
      $data.="
      </select>
    </div></td>
  </tr>
  <tr class='evenrow'>
    <td width='165' scope='col' colspan='4'><div align='left' width=165><span class='evenrow'>SUB-ACTIVITY: </span></div></td>
    <td scope='col' colspan=8><div align='left'><select name='subactivity' id='subactivity' class='combobox'>
        ";
	  if($_SESSION['subactivity']!=NULL)
	  $data.="
        <option value=\"".substr($_SESSION['subactivity'],0,30)."\">".substr($_SESSION['subactivity'],0,30)."</option>
        <option value=''>-ALL-</option>
        ";
	  else
	  $data.="
        <option value=''>-All-</option>
        ";
	 
	 $query=mysql_query("select * from tbl_subactivity where subactivity_name <> '' group by subactivity_code order by subactivity_code asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="
        <option value=\"".$row['subactivity_name']."\">".substr($row['subactivity_code'],0,30)." ".substr($row['subactivity_name'],0,30)."</option>
        ";
	  } 
      $data.="
      </select></div></td>
  </tr>";
  }
  
  
  //-----------------------end of DCED Indicator Filters------------
  $data.="<tr>
    <td width='165' class=evenrow scope='col' colspan=4><div align='left' width=165>
     PHYSICAL TARGET:  
    </div></td>
    <td scope='col' colspan=8 class=evenrow><div align='left'>
      <select name='physical_target' id='physical_target' class='combobox'>";
	   if($_SESSION['target']!=NULL)
	  $data.="<option value=\"".$_SESSION['target']."\">".substr($_SESSION['target'],0,30)."</option><option value=''>-All-</option>";
	  else
	  $data.="<option value=''>-All-</option>";
	  
	 $query=mysql_query("select * from tbl_indicator where physical_target <> '' and indicator_type like '".$_SESSION['indicatorType']."%'  group by physical_target order by physical_target asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['physical_target']."\" >".substr($row['physical_target'],0,30)."</option>";
	  } 
      $data.="</select>
    </div></td>
  </tr>
 <tr class='evenrow'>
    <td width='165' scope='col' colspan='4'>INDICATOR:</td><td colspan='7'>
  
 <select name='indicator_name' id='indicator_name' class='combobox'></option><option value=''>-ALL-</option>";
 		 $query=mysql_query("select * from tbl_indicator where indicator_name <> '' and indicator_type like '".$_SESSION['indicatorType']."%' group by indicator_name order by indicator_name asc")or die(http("View_indicator-4622"));
	  while($row=mysql_fetch_array($query)){
	  $selected=($row['indicator_name']==$_SESSION['indicator11'])?"SELECTED":"";
	  $data.="<option value=\"".substr($row['indicator_name'],0,100)."\" ".$selected.">".substr($row['indicator_name'],0,100)."</option>";
	  } 
      $data.="</select>
    </div></td><td width='31'><input name='search' type='button' value='Go' onclick=\"xajax_view_indicator(getElementById('type_ofindicator').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('physical_target').value,getElementById('indicator_name').value,getElementById('resultChainLevel').value,getElementById('mapping_type').value,1,20); return false;\" align=right /></td>
  </tr>";





return $data;
}
#filter activity_basedindicator

function filterActivityBasedIndicator(){

$data="


<table width='660' border='0'>
 
  <tr>
    <th width='165' scope='col' class=evenrow><div align='left' width=165>PROGRAMME: </div></th>
    <th scope='col' colspan=2 class=evenrow><div align='left'>
      <select name='programme' id='programme'>";

	 $query=mysql_query("select * from tbl_programme where program_name <> '' order by program_name asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['program_name']."\">".$row['program_name']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col'><div align='left' width=165>COMPONENT: </div></th>
    <th scope='col' colspan=2><div align='left'>
      <select name='component' id='component'><option value=''>-All-</option>";
	 $query=mysql_query("select * from tbl_component where component <> '' order by component asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value='%".$row['component']."\">".$row['component']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col' class=evenrow><div align='left' width=165>SUB-COMPONENT: </div></th>
    <th scope='col' colspan=2><div align='left' class=evenrow>
      <select name='subcomponent' id='subcomponent'><option value=''>-All-</option>";
	 $query=mysql_query("select * from tbl_subcomponent where subcomponent <> '' order by subcomponent_code asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value='%".$row['subcomponent_code']."\">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col'colspan=''>Type of Indicator:</th>
   
    <th scope='col' colspan=2><div style='float:left;'><select name='type_ofindicator' id='type_ofindicator' onchange=\"xajax_check_viewIndicatorType(getElementById('type_ofindicator').value);\"><option value=''>-All-</option>";
	
					  $q=mysql_query("select * from tbl_lookup where classCode='2' order by code")or die(http(__line__));
					while($rowL=mysql_fetch_array($q)){
$selected=$_SESSION['code']==$rowL['code']?"SELECTED":"";
$data.="<option value=\"".$rowL['code']."\" '".$selected."'>".$rowL['codeName']."</option>";					
					
					}
					  $data.="			  
                      </select></div><div align='right'><input type='BUTTON' name='export' id='export' value='Export to Excel ' />
      <input type='button' name='button' id='button' value='New Indicator'  onclick=\"xajax_add_indicator()\"/>
    <input type='button' name='button' id='button' value='DCED Mapping'  onclick=\"xajax_view_DCEDindicator()\"/>
	</div></th>
  </tr>
  <tr>
    <th width='165' scope='col' class=evenrow><div align='left' width=165>PHYSICAL TARGET: </div></th>
    <th scope='col' colspan=2 class=evenrow><div align='left'>
      <select name='physical_target' id='physical_target'><option value=''>-All-</option>";
	 $query=mysql_query("select * from tbl_indicator where physical_target <> '' and indicator_type like '".$_SESSION['indicatorType']."%'  group by physical_target order by physical_target asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['physical_target']."\">".$row['physical_target']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
 <tr>
    <th width='165' scope='col'><div align='left' width=165>INDICATOR: </div></th>
    <th width='306' scope='col'><div align='left'>
 <select name='indicator' id='indicator'><option value=''>-All-</option>";
	 $query=mysql_query("select * from tbl_indicator where physical_target <> '' and lower(indicator_type) like '".$_SESSION['indicatorType']."%'  group by indicator_name  order by indicator_name asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['indicator_name']."\">".substr($row['indicator_name'],0,50)."</option>";
	  } 
      $data.="</select>      </select>
    </div></th><th width='31'><input name='search' type='button' value='Go' onclick=\"xajax_searchActivityBasedIndicator(getElementById('programme').value,getElementById('component').value,getElementById('subcomponent').value,getElementById('physical_target').value,getElementById('indicator').value); return false;\" align=right /></th>
   
  </tr>
</table>

";
return $data;
}






#*********************************************************************
function filter_DCEDindicator(){
$data="

<table width='660' border='0'>
 <tr>
    <th width='165' scope='col'colspan=''></th>
   
    <th scope='col' colspan=2><div align='right'><input type='BUTTON' name='export' id='export' value='Export to Excel ' />
      <input type='button' name='button' id='button' value='New Indicator'  onclick=\"xajax_add_indicator()\"/>
    <input type='button' name='button' id='button' value='DCED Mapping'  onclick=\"xajax_view_DCEDindicator()\"/>
	</div></th>
  </tr>
  <tr>
    <th width='165' scope='col'><div align='left' width=165>INTERVENTION: </div></th>
    <th scope='col' colspan=2><div align='left'>
      <select name='physical_target' id='physical_target'><option value=''>-All-</option>";
	 $query=mysql_query("select * from view_indicator where physical_target <> '' order by physical_target asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['physical_target']."\">".$row['physical_target']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col'><div align='left' width=165>RESULTS CHAIN : </div></th>
    <th scope='col' colspan=2><div align='left'>
      <select name='physical_target' id='physical_target'><option value=''>-All-</option>";
	 $query=mysql_query("select * from view_indicator where physical_target <> '' order by physical_target asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['physical_target']."\">".$row['physical_target']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col'><div align='left' width=165>SUB-COMPONENT: </div></th>
    <th scope='col' colspan=2><div align='left'>
      <select name='physical_target' id='physical_target'><option value=''>-All-</option>";
	 $query=mysql_query("select * from view_indicator where physical_target <> '' order by physical_target asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['physical_target']."\">".$row['physical_target']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col'><div align='left' width=165>OUTPUT: </div></th>
    <th scope='col' colspan=2><div align='left'>
      <select name='physical_target' id='physical_target'><option value=''>-All-</option>";
	 $query=mysql_query("select * from view_indicator where physical_target <> '' order by physical_target asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['physical_target']."\">".$row['physical_target']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col'><div align='left' width=165>ACTIVITY: </div></th>
    <th scope='col' colspan=2><div align='left'>
      <select name='physical_target' id='physical_target'><option value=''>-All-</option>";
	 $query=mysql_query("select * from view_indicator where activity_name <> '' order by activity_name asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['activity_name']."\">".$row['activity_name']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col'><div align='left' width=165>PHYSICAL TARGET: </div></th>
    <th scope='col' colspan=2><div align='left'>
      <select name='physical_target' id='physical_target'>
	  <option value=''>-All-</option>";
	 $query=mysql_query("select * from view_indicator where physical_target <> '' group by physical_target order by physical_target asc") or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['physical_target']."\">".$row['physical_target']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
 <tr>
    <th width='165' scope='col'><div align='left' width=165>INDICATOR: </div></th>
    <th width='306' scope='col'><div align='left'>
 <select name='indicator' id='indicator'><option value=''>-All-</option>";
	 $query=mysql_query("select * from view_indicator where indicator_name <> '' group by indicator_name order by indicator_name asc")or die(http(__line__));
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value=\"".$row['indicator_name']."\">".$row['indicator_name']."</option>";
	  } 
      $data.="</select>      </select>
    </div></th><th width='31'><input name='search' type='button' value='Go' onclick=\"xajax_search_DCEDindicator(getElementById('physical_target').value,getElementById('indicator').value)\" align=right /></th>
   
  </tr>
</table>

";

return $data;
}


function filter_ProgramResultsAnnualBudget(){
$data="
  
		 <tr class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='5'><select name='subcomponent' id='subcomponent' /><option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$sel=($_SESSION['subcomponentpr']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" '".$sel."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td><td colspan=''>
        <a href='export_to_excel_word.php?linkvar=Export_Annual_Budget&&subcomponent=".$_SESSION['subcomponentpr']."&&activity=".$_SESSION['activitypr']."&&subactivity=".$_SESSION['subactivitypr']."&&year=".$_SESSION['yearpr']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></td>
        </tr>";

            $data.="<tr class=evenrow >
              <td colspan='2'>Activity: </td>
              <td colspan='6'><select name='activity' id='activity' ><option value=''>-ALL-</option>";
		
					 $query=mysql_query("select * from tbl_activity  order by activity_code asc")or die("Http error-code 3802 because,".http(__line__));
					  while($row=mysql_fetch_array($query)){
					  $sel=($_SESSION['activitypr']==$row['activity_name'])?"SELECTED":"";
$data.="<option value=\"".$row['activity_name']."%' '".$sel."'>".$row['activity_code']." ".$row['activity_name']."</option>";
		
					  }
					  
					   
$data.="</select></td>
            </tr>
			<tr class='evenrow'>
              <td colspan='2'>Sub-Activity: </td>
              <td colspan='6'><select name='subactivity' id='subactivity' ><option value=''>-ALL-</option>";
			 
					 $query=mysql_query("select * from tbl_subactivity  order by subactivity_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
					    $sel2=($_SESSION['subactivitypr']==$row['subactivity_name'])?"SELECTED":"";
$data.="<option value=\"".$row['subactivity_name']."%' '".$sel2."'>".$row['subactivity_code']." ".substr($row['subactivity_name'],0,70)."</option>";
		
					  }
					  
					   
$data.="</select></td>
            </tr>"; 
			
			
            $data.="<tr class=evenrow >
              <td colspan='2'>Year:</td>
              <td colspan='5'><select name='fyear' id='fyear'   ><option value='%'>-All-</option>";
				  $yr=date(Y);
				  $end=$yr;
				  do{
				  $sel=($_SESSION['yearpr']==$end)?"SELECTED":"";
				  $data.="<option value=\"".$end."' '".$sel."'>".$end."</option>";
				  $end--;}while($end>=2011);
				  
              $data.="</select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_annualFinancialWorkplan(getElementById('subcomponent').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('fyear').value);return false;\"/></td>
            </tr>
";

return $data;
}



function filter_annualPhysicalWorkplan(){
$data.="
<tr>
    <td scope='col' colspan=4></td>
    <td width='186' scope='col' colspan=9><label>
      <div style='float:right;'>
	   
       <a href='export_to_excel_word.php?linkvar=Export_Annual_Sub-Activity_Based_Workplan&&indicator_type=".$_SESSION['indicator_type']."&&subcomponent=".$_SESSION['wpsubcomponent']."&&output=".$_SESSION['outputAnnualplanning']."&&activity=".$_SESSION['activityAnnualplanning']."&&subactivity=".$_SESSION['subactivityAnnualplanning']."&&year=".$_SESSION['year']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a>
     
        </div>
    </label></td>
  </tr>
</tr>" ;
			  
		 $data.="<tr class='evenrow'>
              <td colspan='4'>Sub-component:
                <label></label></td>
              <td colspan='8'><select name='subcomponent' id='subcomponent' )\" style='width:300px;'>";
	
	if($_SESSION['usersubcomponent']<>''){
$query=mysql_query("select * from tbl_subcomponent where id like '".$_SESSION['usersubcomponent']."%' order by subcomponent_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
#$sel=($_SESSION['subcomponent1']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  } }
					  else {
					  $data.="<option value=''>-All-</option>";
$query1=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(__line__));
while($row1=mysql_fetch_array($query1)){
$sel=($_SESSION['wpsubcomponent']==$row1['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row1['subcomponent']."\" ".$sel.">".$row1['subcomponent_code']." ".$row1['subcomponent']."</option>";
				
					  }
					  }  
$data.="</select></td>
        </tr>
		
		
		
<tr class=evenrow>
              <td colspan='4'>Outputs
                <label></label></td>
              <td colspan='9'><select name='output' id='output' style='width:300px;'><option value=''>-All-</option>";
			   
					  
					$query=mysql_query("select * from view_output where subcomponent_id like '".$_SESSION['usersubcomponent']."%'  order by output_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
					  $selected=($_SESSION['outputAnnualplanning']==$row['output_name'])?"selected":"";
					  $data.="<option value=\"".$row['output_name']."\" ".$selected." >".$row['output_code']." ".$row['output_name']."</option>";
					  }
					  $data.="
              </select></td>
</tr>
            <tr class=evenrow>
              <td colspan='4'>Activity: </td>
              <td colspan='9'><select name='activity' id='activity' style='width:300px;'><option value=''>-All-</option>";
			    if($_SESSION['wpsubcomponent']!=''){
					  $query=mysql_query("select * from view_activity where lower(subcomponent) like '".$_SESSION['wpsubcomponent']."%' order by activity_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
					  $selected=($_SESSION['activityAnnualplanning']==$row['activity_name'])?"selected":"";
$data.="<option value=\"".$row['activity_name']."\" ".$selected.">".$row['activity_code']." ".$row['activity_name']."</option>";
		
					  }}
					  else
					  $data.="<option value=''>-All-</option>";
					  $query=mysql_query("select * from view_activity where subcomponent_id like '".$_SESSION['usersubcomponent']."%'  order by activity_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
					  $selected=($_SESSION['activityAnnualplanning']==$row['activity_name'])?"selected":"";
$data.="<option value=\"".$row['activity_name']."\" ".$selected." >".$row['activity_code']." ".$row['activity_name']."</option>";
		
					  }
					   
$data.="</select></td>
            </tr>"; 
			$data.="<tr class=evenrow>
              <td colspan='4'>Sub-Activity: </td>
              <td colspan='9'><select name='subactivity' id='subactivity' style='width:300px;'><option value=''>-All-</option>";
			    if($_SESSION['wpsubcomponent']!=''){
					  $query=mysql_query("select * from view_subactivity where lower(subcomponent) like '".$_SESSION['wpsubcomponent']."%' order by subactivity_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
					  $sel=($_SESSION['subactivityAnnualplanning']==$row['subactivity_name'])?"SELECTED":"";
$data.="<option value=\"".$row['subactivity_name']."\" ".$sel.">".$row['subactivity_code']." ".substr($row['subactivity_name'],0,50)."</option>";
		
					  }}
					  else
					  $data.="<option value=''>-All-</option>";
					  $query=mysql_query("select * from view_subactivity where subcomponent_id like '".$_SESSION['usersubcomponent']."%'  order by subactivity_code asc")or die(http(__line__));
					  while($row=mysql_fetch_array($query)){
  $sel=($_SESSION['subactivityAnnualplanning']==$row['subactivity_name'])?"SELECTED":"";
$data.="<option value=\"".$row['subactivity_name']."\" ".$sel." >".$row['subactivity_code']." ".substr($row['subactivity_name'],0,50)."</option>";
				
					  }
					   
$data.="</select></td>
            </tr>";
			
			
            $data.="<tr class=evenrow>
              <td colspan='4'>Financial Year:</td>
              <td colspan='8'><select name='year' id='year' style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($_SESSION['fyear']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel." >".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_annualPhysicalWorkplan('Sub-Activity Based',getElementById('subcomponent').value,getElementById('output').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('year').value)\" /></td>
            </tr>
";

return $data;
}


#------------------------filter_quarterlyFinancials--------------------
function filter_quarterlyFinancials(){

$data="
<tr class='evenrow'>
   <td scope='col' colspan=2>Subcomponent</td>
    <td scope='col' colspan='5' ><select name='subcomponent' id='subcomponent112' size='1'>";
   /* if($_SESSION['Resultsubcomponent112']!='')
   $data.="<option value=\"".$_SESSION['Resultsubcomponent112']."\">".$_SESSION['Resultsubcomponent112']."</option>";
   
   else */
   $data.="<option value=''>-ALL-</option>";
   $query=mysql_query("select * from tbl_subcomponent order by id asc")or die(http("Filters-5021"));
   while($rowq=mysql_fetch_array($query)){
  $selsubcomponent=($_SESSION['Resultsubcomponent']==$rowq['subcomponent'])?"SELECTED":"";
   $data.="<option value=\"".$rowq['subcomponent']."\" '".$selsubcomponent."'>".$rowq['subcomponent_code']." ".$rowq['subcomponent']."</option>";
   
   }
   $data.="</select></td></tr>
   <tr>
    
	 <td scope='col' colspan=2 class='evenrow'>Activity:</td>
    <td scope='col' colspan=5 class='evenrow'><select name='activity' id='activity112' size='1'><option value=''>-ALL-</option>";
	
      $data.="<option value=''>-ALL-</option>";
   $query1=mysql_query("select * from tbl_activity order by activity_id asc")or die(http(__line__));
   while($rowa=mysql_fetch_array($query1)){
    $selActivity=($_SESSION['Resultactivity']==$rowa['activity_name'])?"SELECTED":"";
   $data.="<option value=\"".$rowa['activity_name']."\"  '".$selActivity."'>".$rowa['activity_code']." ".$rowa['activity_name']."</option>";
   
   }
   $data.="</select></td>
    
  </tr>
  <tr>
  <td class='evenrow' colspan=2 >Sub-Activity:</td>
    
	 <td scope='col' colspan=5 class='evenrow'><select name='subactivity' id='subactivity112'><option value=''>-ALL-</option>";
	$sel=mysql_query("select s.subactivity_code,s.subactivity_name from tbl_subactivity s left join  tbl_annualbudget  a on(a.subactivity_id=s.subact_id) left join tbl_financialactuals fa on(s.subact_id=fa.subactivity_id)  group by a.subactivity_id order by s.subact_id asc ")or die("Http Error-code 1096 because ".http(__line__));
	while($row1=mysql_fetch_array($sel)){
	$selsubactivity=($_SESSION['Resultsubactivity']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value=\"".$row1['subactivity_name']."\" '".$selsubactivity."'>".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,50)."</option>";
	
	
	}
	
	
	$data.="</select></td>
  
    
  </tr>


<tr class='evenrow'>
   <td scope='col' colspan=2>Quarter</td>
    <td scope='col' colspan=2 ><select name='quarter' id='quarter'>";
	 if($quarter!='') $data.="<option value=\"".$quarter."' '".$selected."'>".$quarter."</option>";
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
	$data.="<option value=\"".$end."' '".$selYear."'>".$end."</option>";
	$end--;}while($end>= 2010);
	$data.="<option value=''>-ALL-</option></select></td>
	
	<td scope='col' colspan=2><input name='search' type='button' value='Go' onclick=\"xajax_view_QuarterlyFinancials(document.getElementById('subcomponent112').value,document.getElementById('activity112').value,document.getElementById('subactivity112').value,document.getElementById('year').value,document.getElementById('quarter').value)\" /></td>
    
  </tr>
 
  ";
  return $data;
  }


function filter_ResultBasedIndicatorActuals(){

$data=" <tr class='evenrow'><td colspan='4'></td>
    
    
   <td width='' colspan='5' align='right'><div style='float='right;' ><input type='button' name='Submit' value='New Entry' onclick=\"xajax_new_ResultBasedActuals('','','')\" /> | <a href='export_to_excel_word.php?linkvar=Export aBi Trust Results&&year=".$_SESSION['year106']."&&abitrust_category=".$_SESSION['abitrust_category']."&&indicator=".$_SESSION['indicator106']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a></div></td>
  </tr>
  
  <tr class='evenrow'>
  
  <td scope='col' colspan='3'><div align='left'  >Subcomponent </div></td>  <td class=evenrow colspan='2'><select name='subcomponent' id='subcomponent'>
      <option value=''>-ALL-</option>";
      $query1=mysql_query("select * from tbl_subcomponent  order by id asc")or die(http("Fltr-5106"));
      while($row1=mysql_fetch_array($query1)){
	 $selected=$_SESSION['subcomponent112']==$row1['subcomponent']?"SELECTED":"";
      $data.="<option value=\"".$row1['subcomponent']."\" '".$selected."'>".$row1['subcomponent']."</option>";
      }
    $data.="</select></td>
   
    <td width='' scope='col' colspan=''>Year</td><td class='evenrow' colspan='3' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
	    $yr = date(Y); $end = $yr; do{
$sel=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."' '".$sel."'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
  </tr>
  <tr class='evenrow'><td width='=' scope='col' colspan='3' ><div align='left'>Indicator</div></td><td CLASS='evenrow' colspan='3'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";
   
	$query=mysql_query("select * from view_organizationreporting where indicator_type like 'Results Based%' group by indicator_name order by indicator_id asc ")or die(http("Filters-5125"));
      while($row=mysql_fetch_array($query)){
	   $selected=$_SESSION['indicator112']==$row['indicator_name']?"SELECTED":"";
      $data.="<option value=\"".$row['indicator_name']."\"  '".$selected."' >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class='evenrow'  align='right' colspan=3>
      <input type='button' name='search' value='Go' onclick=\"xajax_view_abiTrustResults(getElementById('subcomponent').value,getElementById('year').value,getElementById('abi_category').value,getElementById('indicator').value)\" />
</td>
  
  </tr>
  <tr>
    <th colspan='10'><div align='center'><strong>aBi Trust Monitoring</strong></div></th>
  </tr>

";
return $data;
}

function filter_annualPhysicalMonitoring(){
$data="<tr class='evenrow'>
    <td scope='col' colspan='9' align='center'></td>
    
    <td scope='col' colspan=3 align='right'><a href='export_to_excel_word.php?linkvar=Export Annual Physical Monitoring&&subcomponent=".$_SESSION['Resultsubcomponent']."&&output=".$_SESSION['Resultsoutput']."&&activity=".$_SESSION['Resultactivity']."&&subactivity=".$_SESSION['Resultsubactivity1']."&&year=".$_SESSION['PMyear']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></td>
  </tr>
  
  <tr class='evenrow'>
    <td scope='col' colspan=2>Subcomponent:</td>
    <td scope='col' colspan=5><select name='subcomponent' id='subcomponent' style='width:300px;'>";
	
	if($_SESSION['usersubcomponent']<>''){
$query=mysql_query("select * from tbl_subcomponent where id like '".$_SESSION['usersubcomponent']."%' order by subcomponent_code asc")or die(http(__line__));
while($row=mysql_fetch_array($query)){
#$sel=($_SESSION['subcomponent1']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent']."\" >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  } }
					  else {
					  $data.="<option value=''>-All-</option>";
	$sel2=mysql_query("select * from tbl_subcomponent order by id asc ")or die(http("Fltr-5168"));
	while($row12=mysql_fetch_array($sel2)){
	$s=($_SESSION['Resultsubcomponent']==$row12['subcomponent'])?"SELECTED":"";
	$data.="<option value=\"".$row12['subcomponent']."\" ".$s." >".$row12['subcomponent_code']." ".substr($row12['subcomponent'],0,50)."</option>";
	
	
	}
	}
	
	$data.="</select></td> <td scope='col'></td>
    <td scope='col'></td><td></td>
   
  </tr><tr class='evenrow'>
    <td scope='col' colspan=2>Output:</td>
    <td scope='col' colspan=5><select name='output' id='outputw' style='width:300px;'><option value=''>-ALL-</option>";
	$sew=mysql_query("select * from tbl_output where subcomp_id like '".$_SESSION['usersubcomponent']."%'  order by output_id asc ")or die(http(__line__));
	while($row14=mysql_fetch_array($sew)){
	
	$sw=($_SESSION['Resultsoutput']==$row14['output_name'])?"SELECTED":"";
	$data.="<option value=\"".$row14['output_name']."\" ".$sw.">".$row14['output_code']." ".substr($row14['output_name'],0,50)."</option>";
	
	
	}
	
	
	$data.="</select></td>
    <td scope='col'></td><td></td>
    <td scope='col'></td> 
  </tr><tr class='evenrow'>
    <td scope='col' colspan=2>Activity:</td>
    <td scope='col' colspan=5><select name='activity' id='activity' style='width:300px;' ><option value=''>-ALL-</option>";
	$sel3=mysql_query("select * from tbl_activity where subcomp_id like '".$_SESSION['usersubcomponent']."%' order by activity_id asc ")or die(http(__line__));
	while($row13=mysql_fetch_array($sel3)){
	$s3=($_SESSION['Resultactivity']==$row13['activity_name'])?"SELECTED":"";
	$data.="<option value=\"".$row13['activity_name']."\" ".$s3.">".$row13['activity_code']." ".substr($row13['activity_name'],0,50)."</option>";
	
	
	}
	$data.="</select></td>
    <td scope='col'></td><td></td>

    <td></td>
  </tr><tr class='evenrow'>
    <td scope='col' colspan=2>Sub-Activity:</td>
    <td scope='col' colspan=5><select name='subactivity' id='subactivity' style='width:300px;'><option value=''>-ALL-</option>";
	$sel=mysql_query("select i.indicator_id,i.indicator_name,i.subcomponent_id,s.subact_id,s.subactivity_code,s.subactivity_name from tbl_indicator i  inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) inner join tbl_subactivity s on(i.subactivity_id=s.subact_id) where subactivity_name <> '' and i.subcomponent_id like '".$_SESSION['usersubcomponent']."%' group by s.subact_id order by subactivity_code")or die(http(__line__));
	while($row1=mysql_fetch_array($sel)){
	$s=($_SESSION['Resultsubactivity1']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value=\"".$row1['subactivity_name']."\" ".$s.">".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,50)."</option>";
	
	
	}
	
	
	$data.="</select></td>
    <td scope='col'>Year:</td><td><select name='year' id='year' style='width:120px;'><option value=''>-ALL-</option>";
	$yr=date(Y); $end=$yr;
	do{
	$sel2=($_SESSION['PMyear']==$end)?"SELECTED":"";
	$data.="<option value=\"".$end."\" ".$sel2.">".$end."</option>";
	$end--;}while($end>= 2010);
	$data.="</select></td>
    <td scope='col'><input name='search' type='button' value='Go' onclick=\"xajax_view_annualPhysicalMonitoring(getElementById('subcomponent').value,getElementById('outputw').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('year').value)\" /></td>
    
  </tr>
  ";
  return $data;
  
}



function filter_DCEDannualPhysicalMonitoring(){
$data="<tr class='evenrow'>
    <td scope='col' colspan=9 align='center'><B>Physical Monitoring Results For ".$_SESSION['PMyear']."</b> </td>
    
    <td scope='col' colspan=3 align='right'><a href='export_to_excel_word.php?linkvar=Export Annual Physical Monitoring&&subcomponent=".$_SESSION['Resultsubcomponent']."&&output=".$_SESSION['Resultsoutput']."&&activity=".$_SESSION['Resultactivity']."&&subactivity=".$_SESSION['Resultsubactivity1']."&&year=".$_SESSION['PMyear']."&&format=excel'><input type='button' name='export' value='Export to Excel' /></a></td>
  </tr>
  
  <tr class='evenrow'>
    <td scope='col' colspan=2>Subcomponent:</td>
    <td scope='col' colspan=5><select name='subcomponent' id='subcomponent'><option value=''>-ALL-</option>";
	$sel2=mysql_query("select * from tbl_subcomponent order by id asc ")or die(http("Fltr-5250"));
	while($row12=mysql_fetch_array($sel2)){
	$s=($_SESSION['Resultsubcomponent']==$row12['subcomponent'])?"SELECTED":"";
	$data.="<option value=\"".$row12['subcomponent']."\" '".$s."'>".$row12['subcomponent_code']." ".substr($row12['subcomponent'],0,50)."</option>";
	
	
	}
	
	
	$data.="</select></td> <td scope='col'></td>
    <td scope='col'></td><td></td>
   
  </tr>
  <tr class='evenrow'>
    <td scope='col' colspan=2>Subsector:</td>
    <td scope='col' colspan=5><select name='subsector' id='subsector'><option value=''>-ALL-</option>";
	$sel3=mysql_query("select * from tbl_subsector order by subsector asc ")or die(http(__line__));
	while($row13=mysql_fetch_array($sel3)){
	$s3=($_SESSION['resultschain']==$row13['name'])?"SELECTED":"";
	$data.="<option value=\"".$row13['name']."\" '".$s3."'>".substr($row13['name'],0,50)."</option>";
	
	
	}
	$data.="</select></td>
    <td scope='col'></td><td></td>

    <td></td>
  </tr>
  
  
  <tr class='evenrow'>
    <td scope='col' colspan=2>Intervention:</td>
    <td scope='col' colspan=5><select name='intervention' id='intervention'><option value=''>-ALL-</option>";
	$sew=mysql_query("select * from tbl_intervention  order by intervention asc ")or die(http(__line__));
	while($row14=mysql_fetch_array($sew)){
	
	$sw=($_SESSION['intervention']==$row14['intervention'])?"SELECTED":"";
	$data.="<option value=\"".$row14['intervention']."\" ".$sw.">".substr($row14['intervention'],0,70)."</option>";
	
	
	}
	
	
	$data.="</select></td>
    <td scope='col'></td><td></td>
    <td scope='col'></td> 
  </tr><tr class='evenrow'>
   <td scope='col' colspan=2>Result Chain:</td>
    <td scope='col' colspan=5><select name='rchain' id='rchain'><option value=''>-ALL-</option>";
	$sel3=mysql_query("select * from tbl_resultschain order by name asc ")or die(http(__line__));
	while($row13=mysql_fetch_array($sel3)){
	$s3=($_SESSION['resultschain']==$row13['name'])?"SELECTED":"";
	$data.="<option value=\"".$row13['name']."\" '".$s3."'>".substr($row13['name'],0,50)."</option>";
	
	
	}
	$data.="</select></td>
    <td scope='col'>Year:</td><td><select name='year' id='year'><option value=''>-ALL-</option>";
	$yr=date(Y); $end=$yr;
	do{
	$sel2=($_SESSION['PMyear']==$end)?"SELECTED":"";
	$data.="<option value=\"".$end."' '".$sel2."'>".$end."</option>";
	$end--;}while($end>= 2010);
	$data.="</select></td>
    <td scope='col'><input name='search' type='button' value='Go' onclick=\"xajax_view_annualPhysicalMonitoring(getElementById('subcomponent').value,getElementById('outputw').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('year').value)\" /></td>
    
  </tr>
  ";
  return $data;
  
}


