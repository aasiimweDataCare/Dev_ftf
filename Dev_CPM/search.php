<?php 
/* function search_projectLifeFinancialBudget(){
$obj=new xajaxResponse();
$data="<form name='projectLifeFinancialBudget' id='projectLifeFinancialBudget' method='post' action='".$PHP_SELF."'><table width='600' border='0'>
<tr><td colspan=6 class='green_field'>Planning &raquo; Project Life Financial Budget</td></tr>
<tr><td colspan=6><hr/></td></tr>
 <tr>

    <th scope='col' colspan='3'>Programme</th><th colspan=3>
      <select name='programme' size='1' id='programme'>";
	  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value='".$row['prog_id']."'>".$row['program_name']."</option>";
	  }
	  
	  $data.="</select>
	  <div style='float:right'><input name='Export to excel' type='button' value='Export to Excel' /><input name='New Entry' value='New Entry' type='button' onclick=\"xajax_projectLifeFinancialBudget()\"/></div>
    </th>
   
  </tr>
  <tr> <th scope='col' colspan=3>SUB-COMPONENT</th> <th scope='col' colspan=2><select name='subcomponent' size='1' id='subcomponent'>";
	  $query=mysql_query("select * from tbl_subcomponent order by id asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value='".$row['subcomponent']."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
	  }
	  
	  $data.="</select></th> <th scope='col'>&nbsp;</th></tr>
  <tr>
    <th scope='col'>NO</th>
	<th scope='col'>SELECT</th>
	<th scope='col'>CODE</th>
    <th scope='col'>Sub-component</th>
	<th scope='col'>Budget IN '000' DKK</th>
    <th scope='col'>Budget IN '000' UGX</th>

  </tr>";
  $query=mysql_query("select p.plp_id,p.prog_id,p.subcomponent_id,p.rate,p.dkk,p.ugx,s.subcomponent,s.subcomponent_code from tbl_projectlifeplanning p inner join tbl_subcomponent s on(s.id=p.subcomponent_id) order by s.subcomponent_code asc ")or die("aBi Error Code 0062, because ".mysql_error());
  $n=1; $inc=1; $m=1;
  while($row=mysql_fetch_array($query)){
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td><input type='hidden' name='loopkey[]' id='loopkey' value='1'/>".$n++."</td>
    <td><input name='checkbox[]' type='checkbox' value='".$row['plp_id']."' /></td>
    <td><input type='hidden' name='subcomponent_id[]' value='".$row['id']."'/>$row[subcomponent_code]</td>
    <td>$row[subcomponent]</td>
    <td>$row[dkk]</td>
	<td>$row[ugx]</td>

  </tr>";
  $inc++;$m++;
  }
  $q=mysql_fetch_array(mysql_query("select sum(dkk) as totaldkk,sum(ugx) as totalugx from tbl_projectlifeplanning group by prog_id order by prog_id asc"))or die(mysql_error());
  $data.="<tr>
  <th colspan=4>Total</th>
    
    <th>$q[totaldkk]</th>
    <th>$q[totalugx]</th>

  
  <tr>
  <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>
</table></form>
";



$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

 */


function search_projectLifeFinancialBudget($programme_id,$subcomponent){
$obj=new xajaxResponse();
$_SESSION['pltprogramme_id']=$programme_id;
$_SESSION['pltsubcomponent']=$subcomponent;
$data="<form name='projectLifeFinancialBudget' id='projectLifeFinancialBudget' method='post' action='".$PHP_SELF."'><table width='600' border='0'>
<tr><td colspan=6 class='green_field'>Planning &raquo; Project Life Financial Targets</td></tr>
<tr><td colspan=6><hr/></td></tr>
 <tr>

    <th scope='col' colspan='3'>Programme</th><th colspan=3>
      <select name='programme' size='1' id='programme'><option value='%'>-All-</option>";
	  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	  $selected=($_SESSION['pltprogramme_id']=$row['prog_id'])?"SELECTED":"";
	  $data.="<option value='".$row['program_name']."' '".$selected."'>".$row['program_name']."</option>";
	  }
	  
	  $data.="</select><div style='float:right'><input name='Export to excel' type='button' value='Export to Excel' /><input name='New Entry' value='New Entry' type='button' onclick=\"xajax_projectLifeFinancialBudget('')\"/></div>
    </th>
   
  </tr>
  <tr> <th scope='col' colspan=3>SUB-COMPONENT</th> <th scope='col' colspan=2><select name='subcomponent' size='1' id='subcomponent'><option value='%'>-All-</option>";
	  $query=mysql_query("select * from tbl_subcomponent order by id asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	   $selected2=($_SESSION['pltsubcomponent']=$row['subcomponent'])?"SELECTED":"";
	  $data.="<option value='".$row['subcomponent']."%'  '".$selected2."'  >".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
	  }
	  
	  $data.="</select></th> <th scope='col'><input name='search' type='button' value='Go' onclick=\"xajax_search_projectLifeFinancialBudget(getElementById('programme').value,getElementById('subcomponent').value)\" /></th></tr>
  <tr>
    <th scope='col' align='right'>NO</th>
	<th scope='col'>SELECT</th>
	<th scope='col' align='right'>CODE</th>
    <th scope='col'>Sub-component</th>
	<th scope='col'><b align='right'>Budget IN '000' DKK</b></th>
    <th scope='col'><b align='right'>Budget IN '000' UGX</b></th>

  </tr>";
  $x="select p.plp_id,p.prog_id,pp.program_name,p.subcomponent_id,p.rate,p.dkk,p.ugx,s.subcomponent,s.subcomponent_code from tbl_projectlifeplanning p inner join tbl_subcomponent s on(s.id=p.subcomponent_id) inner join tbl_programme pp on(pp.prog_id=p.prog_id) where lower(pp.program_name) like '".strtolower($programme_id)."' && lower(s.subcomponent) like '".strtolower($subcomponent)."' order by s.subcomponent_code asc ";
  #$obj->addAlert($x);
  $query=mysql_query($x)or die("aBi Error Code 0062, because ".mysql_error());
  $n=1; $inc=1; $m=1;
  if(@mysql_num_rows($query)==0){
  $obj->addAlert("No Results Found!");
  return $obj;
  }
  else
  while($row=mysql_fetch_array($query)){
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td align=right><input type='hidden' name='loopkey[]' id='loopkey' value='1'/>".$n++."</td>
    <td><input name='checkbox[]' type='checkbox' value='".$row['plp_id']."' /></td>
    <td align=right><input type='hidden' name='subcomponent_id[]' value='".$row['id']."'/>$row[subcomponent_code]</td>
    <td>$row[subcomponent]</td>
    <td align=right>$row[dkk]</td>
	<td align='right'>$row[ugx]</td>

  </tr>";
  $inc++;$m++;
  }
 /*  $q=mysql_fetch_array(mysql_query("select sum(dkk) as totaldkk,sum(ugx) as totalugx from tbl_projectlifeplanning group by prog_id order by prog_id asc"))or die(mysql_error());
  $data.="<tr>
  <th colspan=4>Total</th>
    
    <td align='right' class=evenrow2 ><b align='right'>$q[totaldkk]</b></td>
    <td align='right' class=evenrow2> <b align='right' >$q[totalugx]</b></td>
</TR>"; */
  
  $data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <img src='icons/edit_icon.png' TITLE='Edit'  onclick=\"xajax_edit_projectLifeFinancialTarget(xajax.getFormValues('projectLifeFinancialBudget'));return false;\" width='16' height='16' />| <img src='icons/delete_icon.png' TITLE='Delete' width='16' height='16' onclick=\"xajax_delete_projectLifeFinancialTarget(xajax.getFormValues('projectLifeFinancialBudget'));return false;\"  /></td>
    
	 <td></td>
<td></td>

   

  </tr>";
$data.="</table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}





function searchActivityBasedIndicator($programme,$component,$subcomponent,$target,$indicator){
$obj= new xajaxResponse();
$data="<table width=660>
<tr class=''>
    <td colspan='2' scope='cols' class='greenlinks'>Setup &raquo; View Indicator (ACTIVITY BASED)</td>
  </tr>
  <tr class=''>
    <td colspan='2' scope='cols' ><hr/></td>
  </tr>
".filterActivityBasedIndicator()."
  </table>
  ";
$data.="<table width='660' border='0'>

  <tr class='evenrow'>
    <th colspan='9' scope='cols' align=center>INDICATOR DETAILS (ACTIVITY BASED)</td>
   
  </tr>
  <tr class='evenrow'>
  <td CLASS=black2>NO.</td>
  <td CLASS=black2>SELECT</td>
    <td CLASS=black2>PHYSICAL TARGET/ITEM </td>
	  <td CLASS=black2>INDICATOR</td>
  <td CLASS=black2>SUB-COMPONENT</td>
	<td CLASS=black2>RESULTS CHAIN LEVEL</td>
	<td CLASS=black2>ACTIVITY</td>

  </tr>";
 $_SESSION['programme']=$programme;
 $_SESSION['component']=$component;
  $_SESSION['subcomponent']=$subcomponent;
  $_SESSION['target']=$target;
  $_SESSION['indicator']=$indicator;
  $indicator_type="Activity Based";
  $select="select i.indicator_id,i.rc_id,i.physical_target,i.indicator_type,i.indicator_name,s.id as subcomponent_id,s.subcomponent,r.rc_id,r.name AS  resultschain,it.intervention_id,it.intervention from tbl_indicator i left join tbl_subcomponent s on(s.id=i.subcomponent_id) left join tbl_intervention it on(it.intervention_id=i.intervention_id) left join tbl_resultschain r on(r.rc_id=i.rc_id) WHERE lower(indicator_type) like '".strtolower($indicator_type)."%' && indicator_name <> '' && lower(i.indicator_name) like '".strtolower($_SESSION['indicator'])."' && lower(i.physical_target) like '".strtolower($_SESSION['target'])."' && lower(s.subcomponent) like '".strtolower($_SESSION['subcomponent'])."' order by  s.subcomponent asc ";
  //$obj->addAlert($select);
   $query=mysql_query($select)or die(mysql_error());
  $inc=1;

  if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td>".$n++."</td>
  <td><input name='indicator[]' id='indicator' type='checkbox' value='".$row['indicator_id']."' /></td>
    <td>".$row['physical_target']."</td>
    <td><a href='#' onclick=\"xajax_indicator_details('".$row['indicator_id']."');\" >".$row['indicator_name']."</a></td>
			<td>".$row['subcomponent']."</td>
				<td>".$row['resultschain']."</td>
					<td>".$row['intervention']."</td>

  </tr>";
  $inc++; } 
  }
  else{
  $obj->addAlert("No Results Found!");
  } 
 
$data.="</table>";

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

?>