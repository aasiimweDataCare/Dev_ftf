<?php
session_start();
require_once('connections/lib_connect.php');
require_once('./xajax_0.2.4/xajax.inc.php');
//require_once('functions.php');
require_once('filters.php');
//require_once('organization.php');
$xajax = new xajax();
$xajax->errorHandlerOn();

#xajax register function
$xajax->registerFunction('view_workplan');
$xajax->registerFunction('new_workplan');
$xajax->registerFunction('save_workplan');
$xajax->registerFunction('filter_workplan_subcomponent');
$xajax->registerFunction('reload_workplan');
#expenditure.
$xajax->registerFunction('new_expenditure');
$xajax->registerFunction('view_expenditure');
$xajax->registerFunction('save_expenditure');
#functions

function view_workplan(){
$obj= new xajaxResponse();
//$obj->addAlert("it works!");


$data="<table>
<tr>
              
              <td colspan='12'>".filter_workplan()."</td>
            </tr>

            <tr>
              <td class='evenrow2' colspan=2>&nbsp;</td>
              <td width='25' class='evenrow2'>&nbsp;</td>
              <td width='145' class='evenrow2'>&nbsp;</td>
              <td colspan='5' class='evenrow2'>Physical targets</td>
              <td colspan='5' class='evenrow2'>Financial Budget in 1000 UGshs.</td>
            </tr>
            <tr><td width='' class='evenrow2'>No.</td>
              <td width='45' class='evenrow2'>Code</td>
              <td colspan='2' class='evenrow2'>Subactivity </td>
              <td width='51' class='evenrow2'>Quarter 1 (Jan-Mar)</td>
              <td width='51' class='evenrow2'>Quarter 2 (Apr-Jun)</td>
              <td width='51' class='evenrow2'>Quarter 3 (Jul-Sep)</td>
              <td width='51' bgcolor=#669900 class='evenrow2'>Quarter 4 (Oct-Dec)</td>
			  			<td class='evenrow2' bgcolor='#669900'>Total</td>
              <td width='60' class='evenrow2'>Quarter 1 (Jan-Mar)</td>
              <td width='60' class='evenrow2'>Quarter 2 (Apr-Jun)</td>
              <td width='60' class='evenrow2'>Quarter 3 (Jul-Sep)</td>
              <td width='60' class='evenrow2'>Quarter 4 (Oct-Dec)</td>
			  			<td class='evenrow2' bgcolor='#669900' >Total</td>
            </tr>";
$inc=1;
		  $query=mysql_query("select * from view_workplan where subcomponent_id='".$_SESSION['wpsubcomponent_id']."' order by subactivity_code asc")or die(mysql_error());
		  
		  while($row=mysql_fetch_array($query)){
		   $color=$n%2==1?"evenrow":"white";
$data.="<tr class=$color><td>".$n++."</td>
            <td><INPUT type=hidden name='subact_id[]'  id=subact_id value=$row[subact_id] >$row[subactivity_code]</td>
            <td colspan='2'>$row[subactivity_name]</td>
            <td align=right><input name='loopKey[]' type='hidden' value='1' id='textfield' size='6'  />
			$row[pquarter1]</td>
    		<td align=right>$row[pquarter2]</td>
            <td align=right>$row[pquarter3]</td>
            <td align=right>$row[pquarter4]</td>
			<td align=right bgcolor='#669900'><strong>$row[ptotal]</strong></td>
			<td align=right>$row[fquarter1]</td>
            <td align=right>$row[fquarter2]</td>
            <td align=right>$row[fquarter3]</td>
            <td align=right>$row[fquarter4]</td>
				<td bgcolor='#669900' align=right><strong>$row[ftotal]</strong></td>
          </tr>";
$inc++;
		  }
		  //group by subactivity_id order by subactivity_id
		$tot=mysql_fetch_array(mysql_query("select sum(ptotal) as ptotal,sum(ftotal) as ftotal from tbl_workplan where subcomponent_id='".$_SESSION['wpsubcomponent_id']."' "))or die("aBi Error-code 0075 because,".mysql_error());  
		  
	$data.="<tr>
            <th colspan='8' align=left>OVERALL TOTAL:</th><th align=right>$tot[ptotal]</th><th colspan=4></th><th align=right>$tot[ftotal]</th>
          </tr>
		  <tr>
            <th></th><th colspan='2'></th><th></th><th></th><th></th><th></th><th></th>
            <th></th><th></th><th></th><th align=right></th><th align=right></th><th align=right></th>
			</tr></table>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function new_workplan(){
$obj=new xajaxResponse();

$data="<form name='workplan' id='workplan' action='".$PHP_SELF."'><table width='664' border='0'>";
         $data.=" 
		 <tr>
              <td colspan='11' class='green_field'>Planning &raquo; Workplan
                <label></label></td></tr>
				 <tr>
              <td colspan='11'><hr/></td></tr>
		 <tr>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='9'><select name='subcomponent' id='subcomponent' onchange=\"xajax_filter_workplan_subcomponent(getElementById('subcomponent').value)\">";
			  if($_SESSION['wpsubcomponent_id']!='')
$data.="<option value='".$_SESSION['wpsubcomponent_id']."'>".$_SESSION['wpsubcomponent_code']." ".$_SESSION['wpsubcomponent']."</option>";

else
$data.="<option value=''>-Select-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['id']."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
<tr>
              <td colspan='2'>Outputs
                <label></label></td>
              <td colspan='9'><select name='output' >";
			    if($_SESSION['wpsubcomponent_id']!='')
					  $query=mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['wpsubcomponent_id']."' order by output_code asc")or die(mysql_error());
					  while($row=mysql_fetch_array($query)){
					  $data.="<option value='".$row['output_id']."'>".$row['output_code']." ".$row['output_name']."</option>";
					  }
					
					  $data.="
              </select></td>
            </tr>
            <tr>
              <td colspan='2'>Activity: </td>
              <td colspan='9'><select name='activity' id='activity'>";
			    if($_SESSION['wpsubcomponent_id']!='')
					  $query=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['wpsubcomponent_id']."' order by activity_code asc")or die(mysql_error());
					  while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['activity_id']."'>".$row['activity_code']." ".$row['activity_name']."</option>";
		
					  }
					   
$data.="</select></td>
            </tr>"; 
			
			
            $data.="<tr>
              <td colspan='2'>Financial Year:</td>
              <td colspan='9'><select name='fyear' id='fyear'>
                  <option value='2010'>2010</option>
				  <option value='2011'>2011</option>
              </select></td>
            </tr>
            <tr>
              <td class='evenrow2' colspan=2>&nbsp;</td>
              <td width='25' class='evenrow2'>&nbsp;</td>
              <td width='145' class='evenrow2'>&nbsp;</td>
              <td colspan='4' class='evenrow2'>Physical targets</td>
              <td colspan='4' class='evenrow2'>Financial Budget in `000` UGshs.</td>
            </tr>
            <tr><td width='' class='evenrow2'>No.</td>
              <td width='45' class='evenrow2'>Code</td>
              <td colspan='2' class='evenrow2'>Subactivity </td>
              <td width='51' class='evenrow2'>Quarter 1</td>
              <td width='51' class='evenrow2'>Quarter 2</td>
              <td width='51' class='evenrow2'>Quarter 3</td>
              <td width='51' class='evenrow2'>Quarter 4</td>
              <td width='60' class='evenrow2'>Quarter 1</td>
              <td width='60' class='evenrow2'>Quarter 2</td>
              <td width='60' class='evenrow2'>Quarter 3</td>
              <td width='60' class='evenrow2'>Quarter 4</td>
            </tr>";
//$n=1;$a=1;$b=2;$c=3;$d=4;$e=5;$f=6;$g=7;$h=8;$i=9;$j=10;
		  $query=mysql_query("select * from tbl_subactivity where subcomponent_id='".$_SESSION['wpsubcomponent_id']."' order by subactivity_code asc")or die(mysql_error());
		  //value='".$a++.$n++."' 
		  while($row=mysql_fetch_array($query)){
$data.="<tr><td>".$n++."</td>
            <td><INPUT type=hidden name='subact_id[]'  id=subact_id value=$row[subact_id] >$row[subactivity_code]</td>
            <td colspan='2'>$row[subactivity_name]</td>
            <td><input name='loopKey[]' type='hidden' value='1' id='textfield' size='6'  />
			<input name='pq1[]' type='text' id='textfield' size='6'  /></td>
            <td><input name='pq2[]' type='text' id='textfield2' size='6'   /></td>
            <td><input name='pq3[]' type='text' id='textfield3' size='6' /></td>
            <td><input name='pq4[]' type='text' id='textfield4' size='6'   /></td>
            <td><input name='fq1[]' type='text' id='textfield5' size='10' /></td>
            <td><input name='fq2[]' type='text' id='textfield6' size='10'   /></td>
            <td><input name='fq3[]' type='text' id='textfield7' size='10'  /></td>
            <td><input name='fq4[]' type='text' id='textfield8' size='10' /></td>
          </tr>";
		 // $a++; $b++; $c++; $d++; $e++; $f++;	 $g++;	 $h++; $i++;
		  }
	$data.="<tr>
            <td></td>
            <td colspan='2'></td><td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
			<td></td>
            <td></td>
            <td align=right></td>
          </tr>
		  <tr>
            <td></td>
            <td colspan='2'></td><td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
			<td></td>
            <td></td>
            <td align=right><input name='save' type='button' id='save' size='' value='Save' title='Save workplan' onclick=\"xajax_save_workplan(xajax.getFormValues('workplan'))\" /></td>
          </tr></table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
#**************************************


function save_workplan($formvalues){
$obj=new xajaxResponse();
$sc=$formvalues['subcomponent'];
$output=$formvalues['output'];
$activity=$formvalues['activity'];

$fyr=$formvalues['fyear'];
$lp=$formvalues['loopKey'];

for($i=0;$i<count($lp);$i++){
$sa_id=$formvalues['subact_id'][$i];
$pq1=$formvalues['pq1'][$i];
$pq2=$formvalues['pq2'][$i];
$pq3=$formvalues['pq3'][$i];
$pq4=$formvalues['pq4'][$i];
$ptotal=($pq1+$pq2+$pq3+$pq4);
$fq1=$formvalues['fq1'][$i];
$fq2=$formvalues['fq2'][$i];
$fq3=$formvalues['fq3'][$i];
$fq4=$formvalues['fq4'][$i];
$ftotal=($fq1+$fq2+$fq3+$fq4);
//$insert=$formvalues['loopKey'][$i];
$insert="INSERT INTO tbl_workplan(subcomponent_id,output_id,activity_id,year,subactivity_id,pquarter1,pquarter2,pquarter3,pquarter4,ptotal,fquarter1,fquarter2,fquarter3,fquarter4,ftotal) values('".$sc."','".$output."','".$activity."','".$fyr."','".$sa_id."','".$pq1."','".$pq2."','".$pq3."','".$pq4."','".$ptotal."','".$fq1."','".$fq2."','".$fq3."','".$fq4."','".$ftotal."')";

//$obj->addAlert($insert);
mysql_query($insert)or die(mysql_error());
mysql_query("delete from tbl_workplan where pquarter1=''&& pquarter2=''&& pquarter3=''&& pquarter4=''&& fquarter1='' && fquarter2='' && fquarter3='' && fquarter4=''")or die(mysql_error());
}

$obj->addAssign('bodyDisplay','innerHTML',"<font color=green>workplan Captured.</font>");
$obj->addScriptCall("xajax_view_workplan");
return $obj;
}



#**************************************
function view_expenditure(){
$obj=new xajaxResponse();
$data="<table width='660' border='0'>
  
  <tr>
    <td colspan='5' class='green_field'>Planning &raquo;View Expenditure</td><td colspan='' align=right><input name='export' type='button' value='Export to Excel' /> <input name='new_expenditure' type='button' value='New Entry' onclick=\"xajax_new_expenditure()\" /></td>
    </tr>
	<tr>
    <td colspan='6'><hr></td>
    </tr>
	".filter_expenditure()."
	</table>

 <table width='660' border='0'>
  
  <tr>
    <th colspan='7'><div align='center'>EXPENDITURE</div></th>
    </tr>
  <tr>
  <th>NO</th>
  <th>FINANCIAL YEAR</th>
  <th>QUARTER</th>
  <th>SUB-ACTIVITY</th>
	<th>ENTERPRIZE</th>
	<th>DATE OF EXPENDITURE</th>
	<th>AMOUNT</th>

  </tr>";
  $query=mysql_query("select e.financial_year,e.quarter,s.subact_id,s.subactivity_name,e.enterprize,o.orgName,e.date_of_expenditure,e.amount from tbl_expenditure e inner join tbl_subactivity s on(e.subactivity=s.subact_id) inner join tbl_organization o on(e.enterprize=o.org_code) order by s.subact_id asc")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
       $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
      <td>".$n++."</td>
	 <td>$row[financial_year]</td>
	 <td>$row[quarter]</td>
	  <td>$row[subactivity_name]</td>
	 <td>$row[orgName]</td>
	 <td>$row[date_of_expenditure]</td>
	 <td>$row[amount]</td>
  </tr>";
  $inc++;
  }
$data.="</table>";

$obj->addAssign('bodyDisplay','innerHTML',$data);
//$obj->addScriptCall("xajax_view_workplan");
return $obj;
}


function new_expenditure(){
$obj=new xajaxResponse();
$data="<table width='400' border='0'>
    <tr><td class='green_field'>Setup &raquo; New Expenditure</td></tr>
    <tr><td><hr/></td></tr>
	 <tr><td><div id='status'></div></td></tr>
      <tr>
        <td>
         
          <form  id='expenditure' name='expenditure' >
            <table width='535' border='0'>
              <tr>
                <td colspan='4' class='black'>
                  <table border='0'>
                    <tr>
                      <td>Financial Year:</td>
                      <td><select name='fyear' id='fyear'><option value=''>-select-</option>
					  
					  <option value='2010-2011'>2010-2011</option>
                      </select>                      </td>
                    </tr>
                    
                    
                    <tr><td>Quarter:</td><td><select name='quarter' id='quarter'><option value=''>-Select-</option>"; $year = date(Y); $qtr = quarter(date(m))." ".$year; 
$data.="<option value='".$qtr."'>".$qtr."</option>";
$data.="</td></tr>
                    
                    <tr>
                      <td>Sub-activity</td>
                      <td><select name='subactivity' id='subactivity'><option value=''>-select-</option>";
					  $query=mysql_query("select * from tbl_subactivity order by subactivity_code asc")or die(mysql_error());
					  while($row=mysql_fetch_array($query)){
					  $data.="<option value='".$row['subactivity_id']."'>".$row['subactivity_code']." ".$row['subactivity_name']."</option>";
					  }
					 $data.="
                        </select></td>
                    </tr>
                    <tr>
                      <td>Enterprize</td>
                      <td><select name='enterprise' id='enterprise'><option value=''>-select-</option>";
                       $query=mysql_query("select * from tbl_organization order by orgName asc")or die(mysql_error());
					  while($row=mysql_fetch_array($query)){
					  $data.="<option value='".$row['org_code']."'>".$row['orgName']."</option>";
					
					  }
					 $data.="</select></td>
                    </tr>
                    <tr>
                      <td>Date of Expenditure</td>
                      <td><a href='javascript:void(0)' onClick='if(self.gfPop)gfPop.fPopCalendar(document.expenditure.doe);return false;' hidefocus=''>
                      <input name='doe' type='text'  size='30' value=''  readonly='readonly' />
                      <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='34'></a></td>
                    </tr>
                    <tr>
                      <td>Amount</td>
                      <td><input name='amount' type='text' id='amount' size='30' value='' /></td>
                    </tr>
                  </table>
                              <label></label></td>
                </tr>
              
              <tr>
                <td width='165'>&nbsp;</td>
                <td width='255'>&nbsp;</td>
                <td width='69'><input name='btn_item' type='button' id='btn_item'   value='Save' onclick=\"xajax_save_expenditure(xajax.getFormValues('expenditure'))\" /></td>
                <td width='28'>&nbsp;</td>
              </tr>
              <tr>
                <td colspan='4'></td>
              </tr>
            </table>
          </form>
        
      
    </table>";


$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function save_expenditure($formvalues){
$obj=new xajaxResponse();
$fy=$formvalues['fyear'];
$quarter=$formvalues['quarter'];
$enterprise=$formvalues['enterprise'];
$sa=$formvalues['subactivity'];
$doe=$formvalues['doe'];
$amount=$formvalues['amount'];

/*   if($formvalues['doe']=="")
$obj->addAssign("status","innerHTML",errorMsg("Missing Date of expenditure!"));
return $obj; 

if($formvalues['amount']=="")
$obj->addAssign("status","innerHTML",errorMsg("Enter amount spent"));
return $obj;
 */
$select="INSERT INTO tbl_expenditure(financial_year,quarter,subactivity,enterprize,date_of_expenditure,amount) values('".$formvalues['fyear']."','".$formvalues['quarter']."','".$formvalues['enterprise']."','".$formvalues['subactivity']."','".$formvalues['doe']."','".$formvalues['amount']."')";
$obj->addAlert($select);

mysql_query($select)or die("aBi Error Code 0370 because, ".mysql_error());

//}
$obj->addAssign('bodyDisplay','innerHTML',"<font color=green>Expenditure Captured!</font>");
$obj->addScriptCall("xajax_view_expenditure");
return $obj;
}





#**************************************
function reload_workplan($subcomponent){
$obj=new xajaxResponse();
$_SESSION['wpsubcomponent_id']='';
 $_SESSION['wpsubcomponent_code']='';
$_SESSION['wpsubcomponent']='';
$_SESSION['wpoutput_id']='';
$_SESSION['wpoutput_name']='';
$_SESSION['wpoutput_code']=''; 

$query=mysql_query("select * from view_output where subcomponent_id='".$subcomponent."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['wpsubcomponent_id']=$row['subcomponent_id'];
$_SESSION['wpsubcomponent_code']=$row['subcomponent_code'];
$_SESSION['wpsubcomponent']=$row['subcomponent'];
$_SESSION['wpoutput_id']=$row['output_id'];
$_SESSION['wpoutput_name']=$row['output_name'];
$_SESSION['wpoutput_code']=$row['output_code']; 
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_view_workplan");
return $obj;
}





function filter_workplan_subcomponent($subcomponent){
$obj=new xajaxResponse();
$_SESSION['wpsubcomponent_id']='';
 $_SESSION['wpsubcomponent_code']='';
$_SESSION['wpsubcomponent']='';
$_SESSION['wpoutput_id']='';
$_SESSION['wpoutput_name']='';
$_SESSION['wpoutput_code']=''; 

$query=mysql_query("select * from view_output where subcomponent_id='".$subcomponent."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['wpsubcomponent_id']=$row['subcomponent_id'];
$_SESSION['wpsubcomponent_code']=$row['subcomponent_code'];
$_SESSION['wpsubcomponent']=$row['subcomponent'];
$_SESSION['wpoutput_id']=$row['output_id'];
$_SESSION['wpoutput_name']=$row['output_name'];
$_SESSION['wpoutput_code']=$row['output_code']; 
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_new_workplan");
return $obj;
}


#**************************************


$xajax->processRequests();
  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.2.4/'); ?>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>aBi Trust:Workplan</title>
</head>

<body>
<table width="820" border="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td><?php require_once('connections/header.php'); ?></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><table width="820" border="0" bgcolor="#FFFFFF">
      <tr>
        <td width="200" valign="top"><table width="200" border="0" bgcolor="#FFFFFF">
          <tr>
            <td valign="top"><?php require_once('connections/left_links.php'); ?></td>
          </tr>
        </table></td>
        <td width="620" valign="top" align="left"><table width="620" border="0">
          <tr>
            <td><div id="bodyDisplay" align="left"><script language="JavaScript" type="text/javascript">
xajax_view_expenditure();
</script>
</div><div id="status"></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr><td><table width="100%" border="0" align="center" bordercolor="#FFFFFF">
  <tr>
    <td><?php require_once('connections/footer.php'); ?></td>
  </tr>
</table>
</td></tr>
</table>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>

</body>

</html>
