<?php 
//edit programme
session_start();



function edit_programme($prog_id){
$obj=new xajaxResponse();
$_SESSION['prog_id']=$prog_id;
$query=mysql_query("select * from tbl_programme where prog_id='".$prog_id."' order by prog_id asc")or die(mysql_error());

while($row=mysql_fetch_array($query)){
      $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='557' border='0'>
        <tr>
          <td colspan='4' class='black'><div align='center' class='green_field'>
            <div align='left'>Setup &raquo; Editing Programme</div>
          </div><div style='float:right;'><input type='button' name='back' title='back' value='Back' onclick=\"xajax_view_programme('','');return false;\"></div></td>
        </tr>";
       $data.="<tr>
          <td colspan='4' class='black'><hr/></td>
        </tr>
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
        <tr>
          <td colspan='3'>
            <table border='0'>
              <tr>
                <td>Program Name:</td>
                <td><INPUT TYPE='hidden' name='prog_id' id='prog_id' value='".$row['prog_id']."'><input name='pname' type='text' id='pname' value='$row[program_name]' size='30' /></td>
              </tr>
              <tr>
                <td>Funder:</td>
                <td><input name='pfunder' type='text'  id='pfunder' value='$row[Funder]' size='30' /></td>
              </tr>
			  <tr>
                <td>Implementing Organization:</td>
                <td><input name='imp_org' type='text'  id='imp_org' value='$row[imp_org]' size='30' /></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='45' rows='5'>$row[details]</textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align=right><input type='button' name='button' id='button' value='Save' onclick=\"xajax_update_programme(xajax.getFormValues('programme'));\"></td>
              </tr>
            </table></form>";

		   }
		   
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;


}

#edit programme

function edit_programmeAll($formvalues){
$obj=new xajaxResponse();
$data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='557' border='0'>
        <tr>
          <td colspan='4' class='black'><div align='center' class='green_field'>
            <div align='left'>Setup &raquo; Editing Programme</div>
         <div style='float:right;'><input type='button' name='back' title='back' value='Back' onclick=\"xajax_view_programme('','');return false;\"></div></td>
        </tr>";
for($m=0;$m<count($formvalues['prog_id']);$m++){
$prog_id=$formvalues['prog_id'][$m];

$x="select * from tbl_programme where prog_id='".$prog_id."' order by prog_id asc";
//$obj->addAlert($x);
$query=mysql_query($x)or die(mysql_error());
 
while($row=mysql_fetch_array($query)){
      
       $data.="<tr>
          <td colspan='4' class='black'><hr/></td>
        </tr>
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
        <tr>
          <td colspan='3'>
            <table border='0'>
              <tr>
                <td>Program Name:</td>
                <td><INPUT TYPE='hidden' name='prog_id[]' id='prog_id' value='".$row['prog_id']."'><input name='pname[]' type='text' id='pname' value='$row[program_name]' size='30' /></td>
              </tr>
              <tr>
                <td>Funder:</td>
                <td><input name='pfunder[]' type='text'  id='pfunder' value='$row[Funder]' size='30' /></td>
              </tr>
			  <tr>
                <td>Implementing Organization:</td>
                <td><input name='imp_org[]' type='text'  id='imp_org' value='$row[imp_org]' size='30' /></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription[]' id='pdescription' cols='45' rows='5'>$row[details]</textarea></td>
              </tr>
             ";
            

		   }
		   }
		  
		   $data.=" <tr>
                <td>&nbsp;</td>
                <td align=right><input type='button' name='button' id='button' value='Save' onclick=\"xajax_update_programme(xajax.getFormValues('programme'));\"></td>
              </tr></table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;


}




function update_programme($formvalues){
$obj=new xajaxResponse();
for($i=0;$i<count($formvalues['prog_id']);$i++){
$prog_id=$formvalues['prog_id'][$i];
$x="select * from tbl_programme where prog_id='".$prog_id."'";
$select=mysql_query($x)or die(mysql_error());
if(mysql_num_rows($select)>0){
//$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall('xajax_updateProgramme2',$formvalues);
}
}

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function updateProgramme2($formvalues){
$obj=new xajaxResponse();

$table='';
for($i=0;$i<count($formvalues['prog_id']);$i++){
$prog_id=$formvalues['prog_id'][$i];
$pname=$formvalues['pname'][$i];
$pfunder=$formvalues['pfunder'][$i];
$imp_org=$formvalues['imp_org'][$i];
$pdesc=$formvalues['pdescription'][$i];
$x1="select * from tbl_programme where prog_id='".$prog_id."'";
$xrow=mysql_fetch_array(mysql_query($x1))or die("aBi Error-code 0148 because ".mysql_error());
$x="update tbl_programme set program_name='".$pname."',Funder='".$pfunder."',imp_org='".$imp_org."',details='".$pdesc."' where prog_id='".$prog_id."'";

$table="tbl_programme";
#$obj->addAlert($x);

@mysql_query($x)or die(http(0154));
#INSERT INTO `tbl_programme_log` (`log_id`, `user_id`, `table_pk_id`, `Query_executed`, `Table_affected`, `Changed_from`, `Changed_to`, `filename`, `timeanddate`) VALUES(1, 'root@localhost', 0, '', '', '', '', '', '0000-00-00 00:00:00');
$sql="insert into tbl_programme_log (`user_id`,`table_pk_id`,`Query_executed`,`Table_affected`,`Changed_from`, `Changed_to`, `filename`) values('".$_SESSION['username']."','".$prog_id."','".str_replace("'","",$x)."','".$table."','".$xrow['program_name']."-".$xrow['Funder']."-".$xrow['details']."','".$pname."-".$pfunder."-".$pdesc."','".$_SERVER['SCRIPT_FILENAME']."')";
#$obj->addAlert($sql);
@mysql_query($sql) or die(http(0159));
}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Programme Details Updated"));
$obj->AddScriptCall("xajax_view_programme");
return $obj;
}

#-------------------
#edit component
#update componment
#updateComponent2
#------------------
function edit_component($formvalues){
$obj=new xajaxResponse();

$data="<form name='component' id='component' action='".$PHP_SELF."' method='post'><table border='0'>
  <tr>
    <td colspan='2' class='greenlinks'><div style='float:left;'>Setup &raquo; Edit Component</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_component('','','')\" type='button' /></div></td>
  </tr>";
  for($m=0;$m<count($formvalues['component_id']);$m++){
$component_id=$formvalues['component_id'][$m];
//$obj->addAlert($component_id);
$x="select * from tbl_component where id='".$component_id."'";
//$obj->addAlert($x);
$q=mysql_query($x)or die(mysql_error());
while($row=mysql_fetch_array($q)){
  $data.="<tr>
    <td colspan='2'><hr/></td>
  </tr>
  <tr>
    <td colspan='2'><div id='status'></div></td>
  </tr>
  <tr>
    <td>Programme:</td>
    <td><input type='hidden' name='component_id[]' id='component_id' value='".$row['id']."'><select name='cprogramme[]' id='cprogramme'>";
					  $query=mysql_query('select * from tbl_programme order by program_name')or die(mysql_error());
					while($rowp=mysql_fetch_array($query)){
					$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					$data.="<option value='".$rowp['prog_id']."' '".$selected."'>".$rowp['program_name']."</option>";
					
					} 
    $data.="</select></td>
  </tr>
  
  <tr>
    <td>Component:</td>
    <td><input name='ccode[]' type='hidden' id='ccode' size='30' value='".$row['component_code']."' /><input name='component[]' type='text' id='component' size='30' value='".$row['component']."' /></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><textarea name='cdescription[]' id='cdescription' cols='45' rows='5'>".$row['description']."</textarea></td>
  </tr>";
  
}
}
$data.="<tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <input type='button' name='button' id='button' value='Save' onclick=\"xajax_update_component(xajax.getFormValues('component'))\">
    </div></td>
  </tr>
</table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function update_component($formvalues){
$obj=new xajaxResponse();
for($i=0;$i<count($formvalues['component_id']);$i++){
$cid=$formvalues['component_id'][$i];
$x="select * from tbl_component where id='$cid'";
//$obj->addAlert($x);
$s=@mysql_query($x)or die(mysql_error());

if(@mysql_num_rows($s)>0){
$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall('xajax_updateComponent2',$formvalues);
}
}

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function updateComponent2($formvalues){
$obj=new xajaxResponse();
 for($i=0;$i<count($formvalues['component_id']);$i++){
$component_id=$formvalues['component_id'][$i];
$cid=$formvalues['component_id'][$i];
$cprog=$formvalues['cprogramme'][$i];
$ccode=$formvalues['ccode'][$i];
$component=$formvalues['component'][$i];
$cdesc=$formvalues['cdescription'][$i]; 
/* if($cprog==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Select Program</li>"));
return $obj;
} */
if($component==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Missing component</li>"));
return $obj;
}else
/* if($ccode==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter component code</li>"));
return $obj;
} 


$x="update tbl_component set component='".$component."',description='".$pdesc."' where id='".$component_id."'";


$obj->addAlert($x);
*/
#audit details

$query="update tbl_component set prog_id='".$cprog."',component_code='".$ccode."',component='".$component."',description='".str_replace("'","",$cdesc)."' where id='".$cid."'";
//$obj->addAlert($query);
@mysql_query($query)or die("aBi Error Code: 0257 because,".mysql_error());


//audit trail
$table="tbl_component";
$x1="select * from tbl_component where id='".$component_id."'";
$xrow=mysql_fetch_array(mysql_query($x1))or die("aBi Error-code 265 because ".mysql_error());
$sql="insert into tbl_programme_log (`user_id`,`table_pk_id`,`Query_executed`,`Table_affected`,`Changed_from`, `Changed_to`, `filename`) values('".$_SESSION['user_id']."','".$prog_id."','".$query."','".$table."','".$xrow['program_name']."','".$pname."','".$PHP_SELF."')";
@mysql_query($sql) or die("aBi Error-code 0159 because ".mysql_error());
 $obj->addAlert($sql);
}
$obj->addAssign('bodyDisplay','innerHML',congMsg("Component Updated!"));
$obj->addScriptCall("xajax_view_component");
return $obj;
}






#---------------------------------------
#edit subcomponent
#update subcomponment
#updateSubcomponent2
#---------------------------------------

function edit_subcomponent($formvalues){
$obj=new xajaxResponse();
$data="<form method=post name='subcomponent' id=subcomponent><table border='0'>
 <tr>
                      <td colspan='2' class='green_field'><div style='float:left;'>Setup &raquo; Sub-component</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_subcomponent('','','','')\" type='button' /></div></td>
                      
                    </tr>";
 for($m=0;$m<count($formvalues['subcomponent_id']);$m++){
 $id=$formvalues['subcomponent_id'][$m];
 $x="select * from tbl_subcomponent where id='".$id."'";
 //$obj->addAlert($x);
$q=mysql_query($x)or die("aBi Error-code 00286 because, ".mysql_error());
while($row=mysql_fetch_array($q)){

					$data.="<tr>
                      <td colspan='2'><hr/></td>
                    </tr>
					<tr>
                      <td colspan='2'><div id='status'></div></td>
                    </tr>
                    <tr>
                      <td>Programme:</td>
                      <td><input type='hidden' name='subcomponent_id[]' id='subcomponent_id' value='".$row['id']."'><select name='programme[]' id='programme'>";
					  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(mysql_error());
					 while($rowp=mysql_fetch_array($query)){
					 $selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value='".$rowp['prog_id']."' '".$selected."'>".$rowp['program_name']."</option>";
				
					   }
					                   $data.="  </select></td>
                    </tr>
                    <tr>
    <td>Component:</td>
    <td><select name='component_id[]' id='component_id'>";
   $query21=mysql_query("select * from tbl_component")or die(mysql_error());
   while($rowcc=mysql_fetch_array($query21)){
  $selected=$rowcc['id']==$row['component_id']?"SELECTED":"";
   $data.="<option value='".$rowcc['id']."' '".$selected."'>".$rowcc['component']."</option>";
   }
    $data.="</select></td>
  </tr>
    <tr>
    <td>Sub-Component Code:</td>
    <td><input name='subcomponent_code[]' type='text' id='subcomponent_code' value='".$row['subcomponent_code']."' size=40>";
  
  $data.="</td>
  </tr>
       
  
                    <tr>
                      <td>Sub-component Name </td>
                      <td><label>
                        <input name='subcomponent_name[]' type='text'  id='subcomponent_name' value='".$row['subcomponent']."' size='40' />
                      </label></td>
                    </tr>
                    <tr>
                      <td height='103'>Description</td>
                      <td><textarea name='scdescript[]' id='scdescript' cols='45' rows='5'>".$row['description']."</textarea></td>
                    </tr>"; 
					}
				  }
				 $data.="<tr>
                      <td height='103'></td>
                      <td><input type='button' name='save_subcomponent' id=save_subcomponent value=Save onclick=\"xajax_update_subcomponent(xajax.getFormValues('subcomponent'))\"></td>
                    </tr>
                  </table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function update_subcomponent($formvalues){
$obj=new xajaxResponse();
 for($m=0;$m<count($formvalues['subcomponent_id']);$m++){
 $scid=$formvalues['subcomponent_id'][$m];
$x="select * from tbl_subcomponent where id='".$scid."'";
//$obj->addAlert($x);
$s=@mysql_query($x)or die(mysql_error());

if(@mysql_num_rows($s)>0){
$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall('xajax_updateSubcomponent2',$formvalues);
}
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function updateSubcomponent2($formvalues){
$obj=new xajaxResponse();
 for($m=0;$m<count($formvalues['subcomponent_id']);$m++){
 $id=$formvalues['subcomponent_id'][$m];

$programme=$formvalues['programme'][$m];
$scname=$formvalues['subcomponent_name'][$m];
$code=$formvalues['subcomponent_code'][$m];
$component_id=$formvalues['component_id'][$m];
$scdesc=$formvalues['scdescript'][$m];
$x="update tbl_subcomponent set prog_id='$programme',component_id='$component_id',subcomponent_code='$code',subcomponent='$scname',description='$scdesc' where id='".$id."'";
//$obj->addAlert($x);

@mysql_query($x)or die(mysql_error());
}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Subcomponent Details Updated"));
$obj->AddScriptCall("xajax_view_subcomponent",'','','','');
return $obj;
}
#----------------------------------------
#edit output
#update_output
#updateOutput2
#----------------------------------------

function edit_output($formvalues){
$obj=new xajaxResponse();
$data="<form name='output' id='output' method=post><table border='0'>
 <tr>
    <td colspan='2' class='greenlinks'><div style='float:left;'>Setup &raquo; New Output</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_output()\" type='button' /></div></td></tr>
  <tr>
  <tr>";
 for($m=0;$m<count($formvalues['output_id']);$m++){
 $output_id=$formvalues['output_id'][$m];

$q=mysql_query("select * from tbl_output where output_id='".$output_id."'")or die(mysql_error());
while($row=mysql_fetch_array($q)){

    $data.="<td colspan='2'><hr/></td></tr>
  <tr>
  <tr>
    <td colspan='2'><div id='status'></td></tr>
	<tr>
    <td>Programme:</td>
    <td><select name='programme[]' id='programme'>";
      
					  $query=mysql_query("select * from tbl_programme order by program_name ASC")or die(mysql_error());
					 while($rowp=mysql_fetch_array($query)){
					  $selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value='".$rowp['prog_id']."' '".$selected."'>".$rowp['program_name']."</option>";

					   }
					      
					   
    $data.="</select>    </td>
  </tr>
  <tr>
    <td>Component:</td>
    <td><select name='ocomponent[]' id='ocomponent'>";
      
					  $query=mysql_query("select * from tbl_component order by component ASC")or die(mysql_error());
					 while($rowc=mysql_fetch_array($query)){
					  $selected=$rowc['id']==$row['component_id']?"SELECTED":"";
					   $data.="<option value='".$rowc['id']."' '".$selected."'>".$rowc['component']."</option>";

					   }
					      
					   
    $data.="</select>    </td>
  </tr>
  <tr>
    <td>Sub-Component</td>
    <td><select name='subcomponent[]' id='subcomponent'>";
      
					  $query = mysql_query('select * from tbl_subcomponent order by subcomponent_code ASC')or die(mysql_error());
					 while($rowsc=mysql_fetch_array($query)){
							  $selected=$rowsc['id']==$row['subcomp_id']?"SELECTED":"";
$data.="<option value='".$rowsc['id']."' '".$selected."'>".$rowsc['subcomponent_code']."  ".$rowsc['subcomponent']."</option>";
					   }
					      
					  
    $data.="</select>    </td>
  </tr>
  <tr>
    <td>Output Code</td>
    <td><input type='hidden' name='output_id[]' id='output_id' size=30 value='".$row['output_id']."' /><input type='text' name='output_code[]' id='output_code' size=30 value='".$row['output_code']."' />";
	
	$data.="</td>
  </tr>
  <tr>
    <td>Output Name </td>
    <td><label>
      <input name='oname[]' type='text' id='oname' size='30' value='".$row['output_name']."'/>
    </label></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name='odesc[]' id='odesc' cols='45' rows='5' >".$row['details']."</textarea></td>
  </tr>";
 }
} $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <p>
        <input type='button' name='output' id='output' value='Save' onclick=\"xajax_update_output(xajax.getFormValues('output'))\">
        </p>
      </div></td>
  </tr>
</table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function update_output($formvalues){
$obj=new xajaxResponse();
 for($m=0;$m<count($formvalues['output_id']);$m++){
 $output_id=$formvalues['output_id'][$m];

$x="select * from tbl_output where output_id='".$output_id."'";
#$obj->addAlert($x);
$select=mysql_query($x)or die(mysql_error());
if(mysql_num_rows($select)>0){
$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall('xajax_updateOutput2',$formvalues);
}
}
/* else{
$obj->addAlert("Editing Aborted by User!"); 
return $obj;

} */
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}





function updateOutput2($formvalues){
$obj=new xajaxResponse();
 for($m=0;$m<count($formvalues['output_id']);$m++){
 $output_id=$formvalues['output_id'][$m];

$prog_id=$formvalues['programme'][$m];
$ocomponent=$formvalues['ocomponent'][$m];
$subcomponent=$formvalues['subcomponent'][$m];
$output_code=$formvalues['output_code'][$m];
$oname=$formvalues['oname'][$m];
$details=$formvalues['odesc'][$m];

if($oname==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter Output Name</li>"));
return $obj;
}
$query="update tbl_output set prog_id='".$prog_id."',component_id='".$ocomponent."',subcomp_id='".$subcomponent."',output_code='".$output_code."',output_name='".$oname."',details='".str_replace("'","",$details)."' where output_id='".$output_id."'";
#$obj->addAlert($query);
@mysql_query($query)or die("aBi error code 120: because,".mysql_error());
}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Output Update Successful!"));
$obj->addScriptCall("xajax_view_output");
return $obj;
}


#edit output

function edit_activity($formvalues){
$obj=new xajaxResponse();
$data="<form name='activity' id='activity'>
<table border='0'>
 <tr>
    <td colspan='2' class='greenlinks'><div style='float:left;' >Setup &raquo; Edit Activity</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_activity()\" type='button' /></div></td></tr>";
for($m=0;$m<count($formvalues['activity_id']);$m++){
 $activity_id=$formvalues['activity_id'][$m];
$q=mysql_query("select * from tbl_activity where activity_id='".$activity_id."'")or die(mysql_error());
while($row=mysql_fetch_array($q)){


  $data.="<tr>
    <td colspan='2'><hr/></td></tr>
  <tr>
  <tr>
    <td colspan='2'><div id='status'></td></tr>
	<tr>
    <td>Programme:</td>
    <td><select name='aprogramme[]' id='aprogramme'>";
 $queryp=mysql_query("select * from tbl_programme order by program_name ASC")or die(mysql_error());
while($rowp=mysql_fetch_array($queryp)){
$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
$data.="<option value='".$rowp['prog_id']."' '".$selected."'>".$rowp['program_name']."</option>";

					   }
					      
					   
    $data.="</select>    </td>
  </tr>
  <tr>
    <td>Component</td>
    <td><select name='acomponent[]' id='acomponent'>";
     
					  $queryC=mysql_query("select * from tbl_component order by component ASC")or die(mysql_error());
					 while($rowC=mysql_fetch_array($queryC)){ 
					 $selected=$rowC['id']==$row['component_id']?"SELECTED":"";
					   $data.="<option value='".$rowC['id']."' '".$selected."' >".$rowC['component']."</option>";

					   }
					      
					   
    $data.="</select>    </td>
  </tr>
  <tr>
    <td>Sub-Component</td>
    <td><select name='asubcomponent[]' id='asubcomponent' >";
	//onchange=\"xajax_dynamicfilter_subcomponent_editing(getElementById('asubcomponent').value)\"
	$data.="<option value=''>-Select-</option>"; 
      
					  $querysc = mysql_query("select * from tbl_subcomponent order by subcomponent_code ASC")or die(mysql_error());
					 while($rowsc=mysql_fetch_array($querysc)){
					$selected2=$_SESSION['esubcomponent_id']==$row['subcomp_id']?"SELECTED":"";
					 $selected=$rowsc['id']==$row['subcomp_id']?"SELECTED":"";
					 if($_SESSION['esubcomponent_id']!=''){
$data.="<option value='".$rowsc['id']."' '".$selected2."'>".$rowsc['subcomponent_code']."  ".$rowsc['subcomponent']."</option>";
}else{
$data.="<option value='".$rowsc['id']."' '".$selected."'>".$rowsc['subcomponent_code']."  ".$rowsc['subcomponent']."</option>";
}
					   }
					      
					  
    $data.="</select> <div id='asubcomponent'></div>   </td>
  </tr>
  
 
 
   <tr>
    <td>Output</td>
    <td><select name='aoutput[]' style='width:300px;'><option value=''>-Select-</option>";
if($_SESSION['esubcomponent_id']!=''){
/* 
 

$data.="<option value='".$_SESSION['output_id']."'>".$_SESSION['output_code']." ".$_SESSION['output_name']."</option>";
else $data."<option value=''>-Select-</option>"; */
	   $queryo=@mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['esubcomponent_id']."' order by output_code  asc")or die(mysql_error());
						  while($rowo=mysql_fetch_array($queryo)){
						  $sel=$rowo['output_id']==$row['output_id']?"SELECTED":"";
					$data.="<option value='".$rowo['output_id']."' '".$sel."'>".$rowo['output_code']."  ".$rowo['output_name']."</option>";	   
					
						 } } else{
						 $data.="<option value=''>-Select-</option>";
						 $queryOO=@mysql_query("select * from tbl_output  order by output_code  asc")or die(mysql_error());
						  while($rowOO=mysql_fetch_array($queryOO)){
						  $sel=$rowOO['output_id']==$row['output_id']?"SELECTED":"";
					$data.="<option value='".$rowOO['output_id']."' '".$sel."'>".$rowOO['output_code']."  ".$rowOO['output_name']."</option>";
						 
						 }} 
$data.="
    </select></td>
  </tr>
  <tr>
    <td>Activity Code</td>
    <td><input name='activity_id[]' id='activity_id' type='hidden'  size='45' value='".$row['activity_id']."' /><input name='aactivity_code[]' id='aactivity_code' type='text'  size='45' value='".$row['activity_code']."' />";
	
    $data.="e.g 1.1.2</td>
  </tr>
  <tr>
    <td>Activity Name </td>
    <td><label>
      <input name='aactivity_name[]' type='text' class='' id='aactivity_name' value='".$row['activity_name']."'  size='45' />
    </label></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name='adescription[]' id='adescription' cols='42' rows='5'>".$row['details']."</textarea></td>
  </tr>";
  }
  }
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <p>
        <input type='button' name='output' id='output' value='Save' onclick=\"xajax_update_activity(xajax.getFormValues('activity'))\">
        </p>
      </div></td>
  </tr>
</table></form>";


$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function update_activity($formvalues){
$obj=new xajaxResponse();
for($m=0;$m<count($formvalues['activity_id']);$m++){
 $activity_id=$formvalues['activity_id'][$m];
$x="select * from tbl_activity where activity_id='".$activity_id."'";
//$obj->addAlert($x);
$select=mysql_query($x)or die(mysql_error());
if(mysql_num_rows($select)>0){
$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall('xajax_updateActivity2',$formvalues);
}
}
/* else{
$obj->addAlert("Editing Aborted by User!"); 
return $obj;

} */
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function updateActivity2($formvalues){
$obj=new xajaxResponse();
for($m=0;$m<count($formvalues['activity_id']);$m++){
 $activity_id=$formvalues['activity_id'][$m];
$prog_id=$formvalues['aprogramme'][$m];
$acomponent=$formvalues['acomponent'][$m];
$asubcomponent=$formvalues['asubcomponent'][$m];
$aoutput_id=$formvalues['aoutput'][$m];
$aactivity_code=$formvalues['aactivity_code'][$m];
$aactivity=$formvalues['aactivity_name'][$m];
$adesc=$formvalues['adescription'][$m];
if($aactivity_code==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter activity Code Please!</li>"));
return $obj;
}
if($aactivity==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Missing activity Name</li>"));
return $obj;
}
$query="UPDATE tbl_activity SET prog_id='".$prog_id."',component_id='".$acomponent."',subcomp_id='".$asubcomponent."',output_id='".$aoutput_id."',activity_code='".$aactivity_code."',activity_name='".$aactivity."',details='".str_replace("'","",$adesc)."' WHERE activity_id='".$activity_id."'";
//$obj->addAlert($query);
mysql_query($query)or die("aBi error code 120: because,".mysql_error());

}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Activity updated!"));
$obj->addScriptCall("xajax_view_activity");
return $obj;
}

#subactivity

function edit_subactivity($formvalues){
$obj=new xajaxResponse();

$data="<form name='subactivity' id='subactivity' method='post'><table border='0'>
 <tr>
    <td colspan='2' class='green_field'><div style='float:left;'>Setup &raquo; New Sub-activity</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_subactivity('','','','','','','')\" type='button' /></div></td></tr>
  <tr>";
 for($m=0;$m<count($formvalues['subactivity_id']);$m++){
 $subactivity_id=$formvalues['subactivity_id'][$m];

$query=mysql_query("select * from tbl_subactivity where subact_id='".$subactivity_id."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){

  $data.="<tr>
    <td colspan='2'><hr/></td></tr>
  <tr>
  <tr>
    <td colspan='2'><div id='status'></td></tr>
	<tr>
    <td>Programme</td>
    <td><select name='saprogramme[]' id='saprogramme'>";
       $query=mysql_query('select * from tbl_programme order by program_name')or die(mysql_error());
					while($rowp=mysql_fetch_array($query)){
					$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					$data.="<option value='".$rowp['prog_id']."' '".$selected."'>".$rowp['program_name']."</option>";
					
					}  
					   
    $data.="</select></td>
  </tr>
 
  <tr>
    <td>Component</td>
    <td><select name='sacomponent[]' id='sacomponent'>";
   $queryc=mysql_query("select * from tbl_component order by id asc")or die(mysql_error());
   while($rowc=mysql_fetch_array($queryc)){
  $selected=($rowc['id']==$row['component_id'])?"SELECTED":"";
   $data.="<option value='".$rowc['id']."' '".$selected."'>".$rowc['component']."</option>";
   }
					      
			//		   
    $data.="</select></td>
  </tr>";
 $data.="<tr>
    <td>Sub-Component</td>
    <td><select name='sasubcomponent[]' id='sasubcomponent' ><option value=''>-select-</option>";
     /*  if($_SESSION['esasubcomponent_id']!=NULL)
	  //onchange=\"xajax_dynamicfilter_subactivity_editing(getElementById('sasubcomponent').value)\"
$data.="<option value='".$_SESSION['esasubcomponent_id']."'>".$_SESSION['esasubcomponent_code']."  ".$_SESSION['esasubcomponent_id']."</option>";					

else $data.="";
  */
$querysc = mysql_query("select * from tbl_subcomponent  order by subcomponent_code ASC")or die(mysql_error());
 while($rowsc=mysql_fetch_array($querysc)){
 			 $selectedsubcomponent=($row['subcomponent_id']==$rowsc['id'])?"SELECTED":"";
$data.="<option value='".$rowsc['id']."' '".$selectedsubcomponent."'>".$rowsc['subcomponent_code']."  ".$rowsc['subcomponent']."</option>";
}

					   
					     
					  
    $data.="</select>    </td>
  </tr>";
 
  $data.="<tr>
    <td>Output: </td>
    <td>
     <select name='saoutput[]' id='saoutput' ><option value=''>-select-</option>";
	 //onchange=\"xajax_dynamicfilter_output_editing('".$_SESSION['esasubcomponent_id']."',getElementById('saoutput').value)\"
/* 	  if($_SESSION['esasubcomponent_id']!=''){

	   $queryo=@mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['esasubcomponent_id']."' order by output_code  asc")or die(mysql_error());
						  while($rowo=mysql_fetch_array($queryo)){
						  $sel=$rowo['output_id']==$row['output_id']?"SELECTED":"";
					$data.="<option value='".$rowo['output_id']."' '".$sel."'>".$rowo['output_code']."  ".$rowo['output_name']."</option>";	   
					
						 } } else{ */
						
						 $queryOO=@mysql_query("select * from tbl_output  order by output_code  asc")or die(mysql_error());
						  while($rowOO=mysql_fetch_array($queryOO)){
						  $seloutput=($row['output_id']==$rowOO['output_id'])?"SELECTED":"";
					$data.="<option value='".$rowOO['output_id']."' '".$seloutput."'>".$rowOO['output_code']."  ".$rowOO['output_name']."</option>";
						 
						 }
	 $data.="</select>
    </td>
  </tr>";
  
  $data.="<tr>
                    <td>Activity</td>
                    <td><select name='saactivity[]'  id='saactivity'>"; 
					if($_SESSION['esasubcomponent_id']&& $_SESSION['esaoutput_id']!=''){
					$querya=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['esasubcomponent_id']."' order by activity_code asc")or die(mysql_error());
						  while($rowa=mysql_fetch_array($querya)){
						  $selected=$rowa['activity_id']==$row['activity_id']?"SELECTED":"";
					$data.="<option value='".$rowa['activity_id']."' '".$selected."' >".$rowa['activity_code']."  ".$rowa['activity_name']."</option>";	   
			
						 }}
						 else{
						 $querya1=mysql_query("select * from tbl_activity order by activity_code asc")or die(mysql_error());
						  while($rowa1=mysql_fetch_array($querya1)){
						  $selected=$rowa1['activity_id']==$row['activity_id']?"SELECTED":"";
					$data.="<option value='".$rowa1['activity_id']."' '".$selected."' >".$rowa1['activity_code']."  ".$rowa1['activity_name']."</option>";	   
						 
						 
						 } }
						$data.="</select></td>
                  </tr>";
				 
                  $data.="<tr>
                    <td>Sub-activity Code</td>
                    <td><input type='hidden' name='subactivity_id[]' class='' id='subactivity_id[]' size='43' value='".$row['subact_id']."' /><input type='text' name='subactivity_code[]' class='' id='subactivity_code' value='".$row['subactivity_code']."' size='43' /> e.g 2.1.1.1</td>
                  </tr>
                  <tr>
                    <td>Sub-activity Name </td>
                    <td><label>
                      <input name='subactivity_name[]' type='text' class='' id='subactivity_name' value='".$row['subactivity_name']."' size='43' />
                    </label></td>
                  </tr>
				  <tr>
                    <td>Responsible</td>
                   <td><select name='responsible[]' ><option value='' />-Select-</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	
	$selResponsible=($row['responsible']==$row13['group_name'])?"SELECTED":"";
	$data.="<option value='".$row13['group_name']."' '".$selResponsible."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
                  </tr>
				  <tr>
                    <td>Implementer </td>
                    <td><label>
                      <textarea name='implementer[]' id='implementer' cols='40' rows='5'>".$row['implementer']."</textarea>
                    </label></td>
                  </tr>
                  
				 
				  <tr>
         <td>Remarks</td>
        <td><textarea name='sadetails[]' id='sadetails' cols='40' rows='5'>".$row['description']."</textarea></td>
  </tr>";
  }}
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <p>
        <input type='button' name='output' id='output' value='Save' onclick=\"xajax_update_subactivity(xajax.getFormValues('subactivity'))\">
        </p>
      </div></td>
  </tr>
				  
</table></form>"; 

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
#****************************************************
function update_subactivity($formvalues){
$obj=new xajaxResponse();
 for($m=0;$m<count($formvalues['subactivity_id']);$m++){
$subactivity_id=$formvalues['subactivity_id'][$m];
$x="select * from tbl_subactivity where subact_id='".$subactivity_id."'";
//$obj->addAlert($x);
$select=mysql_query($x)or die(mysql_error());
if(mysql_num_rows($select)>0){
#$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall('xajax_updateSubactivity2',$formvalues);
}
/* else{
$obj->AddScriptCall('xajax_view_subactivity','','','','','','','');
return $obj;
}
 */}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



function updateSubactivity2($formvalues){
$obj=new xajaxResponse();
for($m=0;$m<count($formvalues['subactivity_id']);$m++){
$subactivity_id=$formvalues['subactivity_id'][$m];
$comp= $_SESSION['component_1'];
$saprog_id=$formvalues['saprogramme'][$m];
$sacomponent=$formvalues['sacomponent'][$m];
$sasubcomponent=$formvalues['sasubcomponent'][$m];
$saoutput=$formvalues['saoutput'][$m];
$saactivity=$formvalues['saactivity'][$m];
//$subactivity_id=$formvalues['subactivity_id'][$m];
$subactivity_code=$formvalues['subactivity_code'][$m];
$saname=$formvalues['subactivity_name'][$m];
$sadesc=$formvalues['sadetails'][$m];
$resp=$formvalues['responsible'][$m];
$impl=$formvalues['implementer'][$m];
if($subactivity_code==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter subactivity Code</li>"));
return $obj;
}
else if($saname==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Missing subactivity Name!</li>"));
return $obj;
}else

$query="update tbl_subactivity set prog_id='".$saprog_id."',component_id='".$sacomponent."',subcomponent_id='".$sasubcomponent."',output_id='".$saoutput."',activity_id='".$saactivity."',subactivity_code='".$subactivity_code."',subactivity_name='".str_replace("'","",$saname)."',responsible='".$resp."',
implementer='".$impl."',description='".str_replace("'","",$sadesc)."' where subact_id='".$subactivity_id."'";
#$obj->addAlert($query);
@mysql_query($query)or die("aBi error code 120: because,".mysql_error());
}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Sub-activity Updated!"));
//$obj->addScriptCall("xajax_view_subactivity");
$obj->AddScriptCall('xajax_view_subactivity','','','','','','','');
return $obj;
}


#03032011$formvalues
function edit_indicatorLogoframeSubactivity($indicator_id,$indicator_type){
$obj=new xajaxResponse();
$_SESSION['indicator_id']=$indicator_id;
//$indicator_id=$formvalues['indicator'];
$_SESSION['indicator_type']=$indicator_type;

$data="<form name='indicator_all' id='indicator_all' method='post' action='".$PHP_SELF."'><table width='400' border='0'>
<tr><td colspan='' class='green_field'>Setup &raquo; Edit Indicator (Logframe Standard) </td><TD align=right><input name='back' type='button' value='Back' onclick=\"xajax_view_indicator('','','','','','','',1,20)\"/><input name='dced' type='button' value='DCED Standard' onclick=\"xajax_add_indicatorDCED()\"/></TD></tr>

<tr><td colspan='2'><div id='status'></div></td></tr>
      <tr>
        <td>
          <form action='".$PHP_SELF."' name='indicator' id='indicator'>
            <table width='535' border='0'>";
			
		//for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
//$indicator_id=$formvalues['indicator_idAll'][$x];
$q=mysql_query("select * from tbl_indicator where indicator_id='".$indicator_id."'")or die(mysql_error());
while($row=mysql_fetch_array($q)){
//$display=$_SESSION['indicator_type']=="Results Based"?"inline":"none";

$disabled=strtolower($row['indicator_type'])=="results based"?"disabled":"";	
			$data.="<tr><td colspan='2'><hr/></td></tr>
              <tr>
                <td colspan='3'>
                  <table border='0'>
                    <tr>
                      <td>Programme</td>
                      <td><select name='prog_id' id='prog_id'>
                        ";
					  $queryp=mysql_query('select * from tbl_programme order by program_name')or die(mysql_error());
					 while($rowp=mysql_fetch_array($queryp)){
					 $selected=$row['prog_id']==$rowp['prog_id']?"SELECTED":"";
					   $data.="<option value='".$rowp['prog_id']."' '".$selected."'>".$rowp['program_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                   <tr>
                      <td>Component</td>
                      <td><select name='component' id='component'>
					  ";
					  $queryc=mysql_query('select * from tbl_component order by component')or die(mysql_error());
					 while($rowc=mysql_fetch_array($queryc)){
					 $selected=$row['component_id']==$rowc['id']?"SELECTED":"";
					   $data.="<option value=\"".$rowc['id']."\" ".$selected." >".$rowc['component']."</option>";
				
					   }
					      
					  $data.="
					  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Type of Indicator</td>
                      <td><select name='type_ofindicator' id='type_ofindicator' onchange=\"xajax_selectIndicator('".$_SESSION['indicator_id']."',getElementById('type_ofindicator').value);return false;\" />
					  "; if($_SESSION['indicator_type']!='')
					   $data.="<option value=\"".$_SESSION['indicator_type']."\" ".$selected2." >".$_SESSION['indicator_type']."</option>";
					   else
					   $data.="<option value=''>-select-</option>";
				$queryi=mysql_query("select * from tbl_indicator group by indicator_type asc ")or die(mysql_error());
					  while($rowi=mysql_fetch_array($queryi)){
					  // $selected=$row['indicator_type']==$rowi['indicator_type']?"SELECTED":"";
					  //$selected2=$_SESSION['indicatorType']==$rowi['indicator_type']?"SELECTED":"";
					   
					$data.="<option value=\"".$rowi['indicator_type']."\" ".$selected." >".$rowi['indicator_type']."</option>";
					 }
						      
					  $data.="			  
                      </select></td>
                    </tr>";
                    $data.="<tr>
    <td>Sub-Component</td>
    <td><select name='sasubcomponent' id='sasubcomponent' >";
      
//onchange=\"xajax_dynamicFilterSubcomponentIndicatorEditing(getElementById('sasubcomponent').value)\"
$querysc = mysql_query("select * from tbl_subcomponent  order by subcomponent_code ASC")or die(mysql_error());
 while($rowsc=mysql_fetch_array($querysc)){
  $selected=$_SESSION['esasubcomponent_id']==$row['subcomponent_id']?"SELECTED":"";
 
 			 $selected2=$rowsc['id']==$row['subcomponent_id']?"SELECTED":"";
			 if($_SESSION['esasubcomponent_id']!=NULL)
	   
$data.="<option value='\"".$_SESSION['esasubcomponent_id']."\" ".$selected." >".$_SESSION['esasubcomponent_code']."  ".$_SESSION['esasubcomponent_id']."</option>";					

else
$data.="<option value=\"".$rowsc['id']."\" ".$selected2.">".$rowsc['subcomponent_code']."  ".$rowsc['subcomponent']."</option>";
}

$data.="</select>    </td>
  </tr>";
 
  $data.="<tr style=''>
    <td>Output </td>
    <td>
     <select name='saoutput' id='saoutput' '".$disabled."'  >";
	 //onchange=\"xajax_dynamicfilter_output_editing('".$_SESSION['esasubcomponent_id']."',getElementById('saoutput').value)\"
	  if($_SESSION['esasubcomponent_id']!=''){

	   $queryo=@mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['esasubcomponent_id']."' order by output_code  asc")or die(mysql_error());
						  while($rowo=mysql_fetch_array($queryo)){
						  $sel=$rowo['output_id']==$row['output_id']?"SELECTED":"";
					$data.="<option value=\"".$rowo['output_id']."\" ".$sel." >".$rowo['output_code']."  ".$rowo['output_name']."</option>";	   
					
						 } } else{
						 $data.="<option value=''>-Select-</option>";
						 $queryOO=@mysql_query("select * from tbl_output  order by output_code  asc")or die(mysql_error());
						  while($rowOO=mysql_fetch_array($queryOO)){
						  $sel=$rowOO['output_id']==$row['output_id']?"SELECTED":"";
					$data.="<option value=\"".$rowOO['output_id']."\" ".$sel.">".$rowOO['output_code']."  ".$rowOO['output_name']."</option>";
						 
						 }} 
	 $data.="</select>
    </td>
  </tr>";
  
  $data.="<tr>
                    <td>Activity</td>
                    <td><select name='saactivity' '".$disabled."'  id='saactivity'>"; 
					if($_SESSION['esasubcomponent_id']&& $_SESSION['esaoutput_id']!=''){
					$querya=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['esasubcomponent_id']."' order by activity_code asc")or die(mysql_error());
						  while($rowa=mysql_fetch_array($querya)){
						  $selected=$rowa['activity_id']==$row['activity_id']?"SELECTED":"";
					$data.="<option value=\"".$rowa['activity_id']."\" ".$selected." >".$rowa['activity_code']."  ".$rowa['activity_name']."</option>";	   
			
						 }}
						 else{
						 $querya1=mysql_query("select * from tbl_activity order by activity_code asc")or die(mysql_error());
						  while($rowa1=mysql_fetch_array($querya1)){
						  $selected=$rowa1['activity_id']==$row['activity_id']?"SELECTED":"";
					$data.="<option value=\"".$rowa1['activity_id']."\" ".$selected." >".$rowa1['activity_code']."  ".$rowa1['activity_name']."</option>";	   
						 
						 
						 } }
						$data.="</select></td>
                  </tr>";
                    $data.="<tr>
                      <td>Sub-activity</td>
                      <td><select name='subactivity' id='subactivity' '".$disabled."' />";//
					  if($_SESSION['esasubcomponent_id']&& $_SESSION['esaoutput_id']!=''){
					$querysa=mysql_query("select * from view_subactivity where subcomponent_id='".$_SESSION['esasubcomponent_id']."'and output_id='".$_SESSION['esaoutput_id']."' order by subactivity_code asc")or die(mysql_error());
						  while($rowsa=mysql_fetch_array($querysa)){
						  $selected=($rowsa['subactivity_id']==$row['subactivity_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowsa['subactivity_id']."\" ".$selected." >".$rowsa['subactivity_code']."  ".$rowsa['subactivity_name']."</option>";	   
			
						 }}
						   else{
						 $querya1=mysql_query("select * from view_subactivity order by activity_code asc")or die(mysql_error());
						  while($rowa1=mysql_fetch_array($querya1)){
						  $selected=($rowa1['subactivity_id']==$row['subactivity_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowa1['subactivity_id']."\" ".$selected." >".$rowa1['subactivity_code']."  ".$rowa1['subactivity_name']."</option>";	   
						 
						 
						 } }     

					  $data.="
                      </select></td>
                    </tr>
                    </tr>
                    
					<td></td>
                      <td colspan='1'  align='left' width='300' ><table width='300' border='0'>
 <tr>
    <th scope='col'>No.</th>
    <th scope='col'>Result </th>
    <th scope='col'>Indicator </th>
	<th scope='col' colspan='' width='150'>Gender Disaggregation</th>
	<th scope='col' colspan='' width='150'>Responsible</th>
	<th scope='col' colspan='' width='150'>Expected Output</th>
  </tr>
  <tr>
    <td>1  <input name='indicator_id[]' id='indicator_id' type='hidden' value='".$row['indicator_id']."' /></td>
    <td><input name='target[]' type='text' id='target' size='20' value='".$row['physical_target']."' /></td>
    <td><input name='indicator[]' type='text' id='indicator1' value='".$row['indicator_name']."' size='30' /></td>";
	$data.="<td><select name='gender[]' ><option value=''>-select-</option>";
	//$query12=mysql_query("select disaggregation from tbl_indicator where disaggregation <> '' group by disaggregation order by disaggregation asc")or die("aBi Error-code, because, ".mysql_error());
	//while($row12=mysql_fetch_array($query12)){
	//$sel=($row['disaggregation']==$row12['disaggregation'])?"SELECTED":"";
	if($row['disaggregation']=='No'){
	$data.="<option value='No' selected='selected'/>No</option><option value='Yes' />Yes</option>";
	}
	else if($row['disaggregation']=='Yes'){
	$data.="<option value='Yes' selected='selected'/>Yes</option><option value='No' />No</option>";
	
	}
	else{
	
	$data.="<option value='No' selected='selected'/>No</option><option value='Yes' />Yes</option>";
	}
	
	$data.="</select>
 <input type='hidden' name='gender_1[]' id='gender_1' value='".$row['gender']."'>
 </td>
 <td><select name='reponsible[]' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".$row13['group_name']."\" ".$sel."/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' >";
	if($row['expected_output']=='Quantitative'){
	$data.="<option value='' />-select-</option><option value='Quantitative' selected />Quantitative</option>
	<option value='Qualitative'/>Qualitative</option>";
	
	}else if($row['expected_output']=='Qualitative')
	{
	$data.="<option value='' />-select-</option>
	<option value='Qualitative' selected='selected'/>Qualitative</option><option value='Quantitative' />Quantitative</option>";
	
	}
	else{
	
	$data.="<option value='' />-select-</option>
	<option value='Qualitative' />Qualitative</option><option value='Quantitative' />Quantitative</option>";
	
	
	
	
	}
	
	
	
	$data.="</select>  </td> </tr>
</table>
</td>
                    
                   
					 <tr>
                      <td>Indicator Definition</td>
                      <td><textarea name='definition[]' id='definition' cols='55' rows='5'>".$row['description']."</textarea></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                    </tr>
					<tr>
                      <td colspan=2><input name='dced_mapping' id='dced_mapping' type='checkbox' checked value='DCED' />DCED Mapping</td>
                     
                    </tr>
					  
					<tr>
                      <td>Intervention</td>
                      <td><select name='intervention[]' id='intervention' /><OPTION VALUE=''>-select-</option>
					  ";  
$queryi=mysql_query("select * from tbl_intervention ")or die(mysql_error());	
					   
					   while($rowi=mysql_fetch_array($queryi)){
					   $selected=$rowi['intervention_id']==$row['intervention_id']?"SELECTED":"";
					   $data.="<option value='".$rowi['intervention_id']."' '".$selected."'>".$rowi['intervention']."</option>";
					   }	
					   
					   //onchange=\"xajax_dynamicfilter_indicator(getElementById('sub_component').value)\"		      
					  $data.="			  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Results Chain Level</td>
                      <td><select name='resultschainlevel[]' id='resultschainlevel' \><oPTION VALUE=''>-select-</option>
					  ";  
					   $queryrc=mysql_query("select * from tbl_resultschain order by rc_id asc ")or die(mysql_error());	
					   
					   while($rowrc=mysql_fetch_array($queryrc)){
					   $selected=$rowrc['rc_id']==$row['rc_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowrc['rc_id']."\" ".$selected." >".$rowrc['name']."</option>";
					   }	
					   
					   //onchange=\"xajax_dynamicfilter_indicator(getElementById('sub_component').value)\"		      
					  $data.="			  
                      </select></td>
                    </tr>";
					 }
					 //}
					
                 $data.=" </table>
          </td>
                <td width='28'>&nbsp;</td>
              </tr>
              <tr>
                <td width='165'>&nbsp;</td>
                <td width='255'>&nbsp;</td>
                <td width='69'><input type='button' name='save_indicator' id='button' value='Save' onclick=\"xajax_update_indicator(xajax.getFormValues('indicator_all'));\" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan='4'></td>
              </tr>
            </table>

        </td>
      </tr>
    </table></form>";
	
	//$obj->addAlert($data);
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
//,$indicator_id,$indicator_type




function edit_indicatorLogoframeSubactivity_2($formvalues){
$obj=new xajaxResponse();

//$indicator_id,$indicator_type
//$_SESSION['indicator_id']=;
//$indicator_id=$formvalues['indicator']
//$_SESSION['indicator_type']=,$indicator_type;

$data="<form name='indicator_all' id='indicator_all' method='post' action='".$PHP_SELF."'><table width='400' border='0'>
<tr><td colspan='' class='green_field'>Setup &raquo; Edit Indicator (Logframe Standard) </td><TD align=right><input name='back' type='button' value='Back' onclick=\"xajax_view_indicator('','','','','','','')\"/><input name='dced' type='button' value='DCED Standard' onclick=\"xajax_add_indicatorDCED()\"/></TD></tr>

<tr><td colspan='2'><div id='status'></div></td></tr>
      <tr>
        <td>
          <form action='".$PHP_SELF."' name='indicator' id='indicator'>
            <table width='535' border='0'>";
			//$obj->addAlert(count($formvalues['indicator_idAll']));
		for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
$indicator_id=$formvalues['indicator_idAll'][$x];
$q=mysql_query("select * from tbl_indicator where indicator_id='".$indicator_id."'")or die(mysql_error());
while($row=mysql_fetch_array($q)){
//$display=$_SESSION['indicator_type']=="Results Based"?"inline":"none";

$disabled=strtolower($row['indicator_type'])=="results based"?"disabled":"";	
			$data.="<tr><td colspan='2'><hr/></td></tr>
              <tr>
                <td colspan='3'>
                  <table border='0'>
                    <tr>
                      <td>Programme</td>
                      <td><select name='prog_id[]' id='prog_id'>
                        ";
					  $queryp=mysql_query('select * from tbl_programme order by program_name')or die(mysql_error());
					 while($rowp=mysql_fetch_array($queryp)){
					 $selected=$row['prog_id']==$rowp['prog_id']?"SELECTED":"";
					   $data.="<option value='".$rowp['prog_id']."' '".$selected."'>".$rowp['program_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                   <tr>
                      <td>Component</td>
                      <td><select name='component[]' id='component'>
					  ";
					  $queryc=mysql_query('select * from tbl_component order by component')or die(mysql_error());
					 while($rowc=mysql_fetch_array($queryc)){
					 $selected=$row['component_id']==$rowc['id']?"SELECTED":"";
					   $data.="<option value='".$rowc['id']."' '".$selected."'>".$rowc['component']."</option>";
				
					   }
					      
					  $data.="
					  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Type of Indicator</td>
                      <td><select name='type_ofindicator[]' id='type_ofindicator' onchange=\"xajax_selectIndicator('".$_SESSION['indicator_id']."',getElementById('type_ofindicator').value);return false;\" />
					  "; 
				$queryi=mysql_query("select * from tbl_indicator group by indicator_type asc ")or die(mysql_error());
					  while($rowi=mysql_fetch_array($queryi)){
					   $selected=$row['indicator_type']==$rowi['indicator_type']?"SELECTED":"";
					  $selected2=$_SESSION['indicatorType']==$rowi['indicator_type']?"SELECTED":"";
					   if($_SESSION['indicatorType']!='')
					   $data.="<option value='".$_SESSION['indicatorType']."' '".$selected2."'>".$_SESSION['indicatorType']."</option>";
					   else
					$data.="<option value='".$rowi['indicator_type']."' '".$selected."'>".$rowi['indicator_type']."</option>";
					 }
						      
					  $data.="			  
                      </select></td>
                    </tr>";
                    $data.="<tr>
    <td>Sub-Component</td>
    <td><select name='sasubcomponent[]' id='sasubcomponent' onchange=\"xajax_dynamicFilterSubcomponentIndicatorEditing(getElementById('sasubcomponent').value)\">";
      

$querysc = mysql_query("select * from tbl_subcomponent  order by subcomponent_code ASC")or die(mysql_error());
 while($rowsc=mysql_fetch_array($querysc)){
  $selected=$_SESSION['esasubcomponent_id']==$row['subcomponent_id']?"SELECTED":"";
 
 			 $selected2=$rowsc['id']==$row['subcomponent_id']?"SELECTED":"";
			 if($_SESSION['esasubcomponent_id']!=NULL)
	   
$data.="<option value='".$_SESSION['esasubcomponent_id']."' '".$selected."'>".$_SESSION['esasubcomponent_code']."  ".$_SESSION['esasubcomponent_id']."</option>";					

else
$data.="<option value='".$rowsc['id']."' '".$selected2."'>".$rowsc['subcomponent_code']."  ".$rowsc['subcomponent']."</option>";
}

$data.="</select>    </td>
  </tr>";
 
  $data.="<tr style=''>
    <td>Output </td>
    <td>
     <select name='saoutput[]' id='saoutput' '".$disabled."'  onchange=\"xajax_dynamicfilter_output_editing('".$_SESSION['esasubcomponent_id']."',getElementById('saoutput').value)\">";
	 
	  if($_SESSION['esasubcomponent_id']!=''){

	   $queryo=@mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['esasubcomponent_id']."' order by output_code  asc")or die(mysql_error());
						  while($rowo=mysql_fetch_array($queryo)){
						  $sel=$rowo['output_id']==$row['output_id']?"SELECTED":"";
					$data.="<option value='".$rowo['output_id']."' '".$sel."'>".$rowo['output_code']."  ".$rowo['output_name']."</option>";	   
					
						 } } else{
						 $data.="<option value=''>-Select-</option>";
						 $queryOO=@mysql_query("select * from tbl_output  order by output_code  asc")or die(mysql_error());
						  while($rowOO=mysql_fetch_array($queryOO)){
						  $sel=$rowOO['output_id']==$row['output_id']?"SELECTED":"";
					$data.="<option value='".$rowOO['output_id']."' '".$sel."'>".$rowOO['output_code']."  ".$rowOO['output_name']."</option>";
						 
						 }} 
	 $data.="</select>
    </td>
  </tr>";
  
  $data.="<tr>
                    <td>Activity</td>
                    <td><select name='saactivity[]' '".$disabled."'  id='saactivity'>"; 
					if($_SESSION['esasubcomponent_id']&& $_SESSION['esaoutput_id']!=''){
					$querya=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['esasubcomponent_id']."' order by activity_code asc")or die(mysql_error());
						  while($rowa=mysql_fetch_array($querya)){
						  $selected=$rowa['activity_id']==$row['activity_id']?"SELECTED":"";
					$data.="<option value='".$rowa['activity_id']."' '".$selected."' >".$rowa['activity_code']."  ".$rowa['activity_name']."</option>";	   
			
						 }}
						 else{
						 $querya1=mysql_query("select * from tbl_activity order by activity_code asc")or die(mysql_error());
						  while($rowa1=mysql_fetch_array($querya1)){
						  $selected=$rowa1['activity_id']==$row['activity_id']?"SELECTED":"";
					$data.="<option value='".$rowa1['activity_id']."' '".$selected."' >".$rowa1['activity_code']."  ".$rowa1['activity_name']."</option>";	   
						 
						 
						 } }
						$data.="</select></td>
                  </tr>";
                    $data.="<tr>
                      <td>Sub-activity</td>
                      <td><select name='subactivity[]' id='subactivity' '".$disabled."' />";//
					  if($_SESSION['esasubcomponent_id']&& $_SESSION['esaoutput_id']!=''){
					$querysa=mysql_query("select * from view_subactivity where subcomponent_id='".$_SESSION['esasubcomponent_id']."'and output_id='".$_SESSION['esaoutput_id']."' order by subactivity_code asc")or die(mysql_error());
						  while($rowsa=mysql_fetch_array($querysa)){
						  $selected=($rowsa['subactivity_id']==$row['subactivity_id'])?"SELECTED":"";
					$data.="<option value='".$rowsa['subactivity_id']."' '".$selected."' >".$rowsa['subactivity_code']."  ".$rowsa['subactivity_name']."</option>";	   
			
						 }}
						   else{
						 $querya1=mysql_query("select * from view_subactivity order by activity_code asc")or die(mysql_error());
						  while($rowa1=mysql_fetch_array($querya1)){
						  $selected=($rowa1['subactivity_id']==$row['subactivity_id'])?"SELECTED":"";
					$data.="<option value='".$rowa1['subactivity_id']."' '".$selected."' >".$rowa1['subactivity_code']."  ".$rowa1['subactivity_name']."</option>";	   
						 
						 
						 } }     
					  $data.="
                      </select></td>
                    </tr>
                    </tr>
                    
					<td></td>
                      <td colspan='1'  align='left' width='300' ><table width='300' border='0'>
 <tr>
    <th scope='col'>No.</th>
    <th scope='col'>Result </th>
    <th scope='col'>Indicator </th>
	<th scope='col' colspan='' width='150'>Gender Disaggregation</th>
	<th scope='col' colspan='' width='150'>Responsible</th>
	<th scope='col' colspan='' width='150'>Expected Output</th>
  </tr>
  <tr>
    <td>1  <input name='indicator_id[]' id='indicator_id' type='hidden' value='".$row['indicator_id']."' /></td>
    <td><input name='target[]' type='text' id='target' size='20' value='".$row['physical_target']."' /></td>
    <td><input name='indicator[]' type='text' id='indicator1' value='".$row['indicator_name']."' size='30' /></td>";
	//$checked=$row['disaggregation']=="Yes"?"CHECKED":"";
	$data.="<td><select name='gender[]' ><option value=''>-select-</option>";
	//$query12=mysql_query("select disaggregation from tbl_indicator where disaggregation <> '' group by disaggregation order by disaggregation asc")or die("aBi Error-code, because, ".mysql_error());
	//while($row12=mysql_fetch_array($query12)){
	//$sel=($row['disaggregation']==$row12['disaggregation'])?"SELECTED":"";
	if($row['disaggregation']=='No')
	$data.="<option value='No' selected='selected'/>No</option><option value='Yes' />Yes</option>";
	else
	$data.="<option value='Yes' selected='selected'/>Yes</option><option value='No' />No</option>";
	
	
	//}
	$data.="</select></td>
	 <td><select name='reponsible[]' ><option value='' />-Select-</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value='".$row13['group_name']."' '".$sel."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
<td><select name='output[]' >";
	if($row['expected_output']=='Quantitative'){
	$data.="<option value='' />-select-</option><option value='Quantitative' selected />Quantitative</option>
	<option value='Qualitative'/>Qualitative</option>";
	
	}else if($row['expected_output']=='Qualitative')
	{
	$data.="<option value='' />-select-</option>
	<option value='Qualitative' selected='selected'/>Qualitative</option><option value='Quantitative' />Quantitative</option>";
	
	}
	else{
	
	$data.="<option value='' />-select-</option>
	<option value='Qualitative' />Qualitative</option><option value='Quantitative' />Quantitative</option>";
	
	
	
	
	}
	
	
	
	$data.="</select>  </td> 
 
</table>
</td>
                    
                   
					 <tr>
                      <td>Indicator Definition</td>
                      <td><textarea name='definition[]' id='definition' cols='55' rows='5'>".$row['description']."</textarea></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                    </tr>
					<tr>
                      <td colspan=2><input name='dced_mapping' id='dced_mapping' type='checkbox' checked value='DCED' />DCED Mapping</td>
                     
                    </tr>
					  <tr>
                      <td>Sub-Sector</td>
                      <td><select name='subsector[]' id='subsector' \"><oPTION VALUE=''>-select-</option>
					  ";  
					  
					  
					  
					   $queryss=mysql_query("select * from tbl_intervention order by intervention_id  asc ")or die(mysql_error());	
					   
					   while($rowss=mysql_fetch_array($queryss)){
					   $selected=$rowss['intervention_id']==$row['intervention_id']?"SELECTED":"";
					   $data.="<option value='".$rowss['intervention_id']."' '".$selected."'>".$rowss['intervention']."</option>";
					   }	
					   
					   //onchange=\"xajax_dynamicfilter_indicator(getElementById('sub_component').value)\"		      
					  $data.="			  
                      </select></td>
                    </tr>
					<tr>
                      <td>Intervention</td>
                      <td><select name='intervention[]' id='intervention' /><OPTION VALUE=''>-select-</option>
					  ";  
$queryi=mysql_query("select * from tbl_intervention order by intervention_id  asc ")or die(mysql_error());	
					   
					   while($rowi=mysql_fetch_array($queryi)){
					   $selected=$rowi['intervention_id']==$row['intervention_id']?"SELECTED":"";
					   $data.="<option value='".$rowi['intervention_id']."' '".$selected."'>".$rowi['intervention']."</option>";
					   }	
					   
					   //onchange=\"xajax_dynamicfilter_indicator(getElementById('sub_component').value)\"		      
					  $data.="			  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Results Chain Level</td>
                      <td><select name='resultschainlevel[]' id='resultschainlevel' \><oPTION VALUE=''>-select-</option>
					  ";  
					   $queryrc=mysql_query("select * from tbl_resultschain order by rc_id asc ")or die(mysql_error());	
					   
					   while($rowrc=mysql_fetch_array($queryrc)){
					   $selected=$rowrc['rc_id']==$row['rc_id']?"SELECTED":"";
					   $data.="<option value='".$rowrc['rc_id']."' '".$selected."'>".$rowrc['name']."</option>";
					   }	
					   
					   //onchange=\"xajax_dynamicfilter_indicator(getElementById('sub_component').value)\"		      
					  $data.="			  
                      </select></td>
                    </tr>";
					 }
					 }
					
                 $data.=" </table>
          </td>
                <td width='28'>&nbsp;</td>
              </tr>
              <tr>
                <td width='165'>&nbsp;</td>
                <td width='255'>&nbsp;</td>
                <td width='69'><input type='button' name='save_indicator' id='button' value='Save' onclick=\"xajax_update_indicator(xajax.getFormValues('indicator_all'));\" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan='4'></td>
              </tr>
            </table>

        </td>
      </tr>
    </table></form>";
	
	//$obj->addAlert($data);
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function edit_indicator($indicator_id,$indicator_type){
$obj=new xajaxResponse();
 $_SESSION['indicator_id']=$indicator_id;
$_SESSION['indicator_type']=$indicator_type; 
//$obj->addAlert($_SESSION['indicator_id']);


$data="<form action='".$PHP_SELF."' name='indicator13' id='indicator13' method='post'><table width='400' border='0'>
<tr><td colspan='' class='green_field'>Setup &raquo; New Indicator ".$_SESSION['indicator_type']." (Logframe Standard) </td><TD align=right><input name='dced' type='button' value='DCED Standard' onclick=\"xajax_add_indicatorDCED()\"/></TD></tr>

<tr><td colspan='2'><div id='status'></div></td></tr>
      <tr>
        <td>
          
            <table width='535' border='0'>
              <tr>
                <td colspan='3'>
                  <table border='0'>";
//for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
//$ind_id=$formvalues['indicator_idAll'][$x];
$sel="select * from view_indicator where indicator_id='".$_SESSION['indicator_id']."'";
//$obj->addAlert($sel);
$query=mysql_query($sel)or die("aBi Error-code 1506 because,".mysql_error());
while($row=mysql_fetch_array($query)){

                    $data.="<tr><td colspan='2'><hr/></td></tr><tr>
                      <td>Programme</td>
                      <td><select name='prog_id' id='prog_id'>
                        ";
					  $queryp=mysql_query('select * from tbl_programme order by program_name')or die(mysql_error());
					 while($rowp=mysql_fetch_array($queryp)){
					 $selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value='".$rowp['prog_id']."' '".$selected."'>".$rowp['program_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                   <tr>
                      <td>Component</td>
                      <td><select name='component' id='component'>

					  ";
					  $querys=mysql_query('select * from tbl_component order by component')or die(mysql_error());
					 while($rows=mysql_fetch_array($querys)){
					 $selected=$rows['component']==$row['component']?"SELECTED":"";
					   $data.="<option value='".$rows['id']."' '".$selected."'>".$rows['component']."</option>";
				
					   }
					      //onchange=\"xajax_check_indicatorType(getElementById('type_ofindicator').value);
					  $data.="
					  
                      </select></td>
                    </tr>
					<tr>
                      <td>Sub-Component</td>
                      <td><select name='sasubcomponent' id='sub_component' >";
$queryst=mysql_query("select * from tbl_subcomponent order by  subcomponent_code asc")or die(mysql_error());	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   $selected=$rowst['id']==$row['subcomponent_id']?"SELECTED":"";
					   $data.="<option value='".$rowst['id']."' '".$selected."'>".$rowst['subcomponent']."</option>";
					   }	     
				
					  $data.="
					  
                      </select></td>
                    </tr>
					 
                    <tr>
					
					
					 <tr>
                      <td>Type of Indicator</td>
                      <td><select name='type_ofindicator' id='type_ofindicator' onchange=\"xajax_selectIndicator('".$_SESSION['indicator_id']."',getElementById('type_ofindicator').value);return false;\" />
					  ";  
					   if($_SESSION['indicator_type']!=NULL)
					   $data.="<option value='".$_SESSION['indicator_type']."'>".$_SESSION['indicator_type']."</option>";
					   else
			
					  $data.="<option value=''>-select-</option>";
					   $queryt=mysql_query("select distinct(indicator_type) from tbl_indicator group by  indicator_type asc ")or die(mysql_error());	
					   
					   while($rowt=mysql_fetch_array($queryt)){
					   //$selected2=$rowt['indicator_type']==$_SESSION['indicator_type']?"SELECTED":"";
					  // $selected=$rowt['indicator_type']==$row['indicator_type']?"SELECTED":"";
					  
					 $data.="<option value='".$rowt['indicator_type']."' '".$selected2."'>".$rowt['indicator_type']."</option>";
					   }	
					   
					   //onchange=\"xajax_dynamicfilter_indicator(getElementById('sub_component').value)\"		      
					  $data.="			  
                      </select></td>
                    </tr >
			
					<tr>
                      <td width='200'>aBi Trust Category</td><td>";
					  if($row['indicator_type']!='aBi Trust'){
					  
                      $data.="<select name='abitrust_category' id='abitrust_category' disabled ='disabled' ><option value=''>-select-</option>
					  ";
					  $qu=@mysql_query("select * from tbl_lookup where classCode='3'")or die(mysql_error());    
					 while($rowab=mysql_fetch_array($qu)){
					 $selected=($row['abitrust_category']==$rowab['codeName'])?"selected":"";
					 $data.="<option value='".$rowab['']."' '".$selected."'>".$rowab['codeName']."</option>"; 
					 }  
					  $data.="</select>";
					
					 } else{
					   $data.="<select name='abitrust_category' id='abitrust_category'  ><option value=''>-select-</option>
					  ";
					  $qu=@mysql_query("select * from tbl_lookup where classCode='3'")or die(mysql_error());    
					 while($rowab=mysql_fetch_array($qu)){
					 $selected=($row['abitrust_category']==$rowab['codeName'])?"selected":"";
					 $data.="<option value='".$rowab['codeName']."' '".$selected."'>".$rowab['codeName']."</option>	";
					 }  
					  $data.="</select>";
					  }
					  
					  
					  $data.="	</td>
                    </tr>
                    
					<td></td>
                      <td colspan='1'  align='left' width='300' ><table width='300' border='0'>
<tr>
    <th scope='col'>No.</th>
    <th scope='col'>Result </th>
    <th scope='col'>Indicator </th>
	<th scope='col' colspan='' width='150'>Gender Disaggregation</th>
	<th scope='col' colspan='' width='150'>Responsible</th>
	<th scope='col' colspan='' width='150'>Expected Output</th>
  </tr>
  <tr>
    <td>1 <input name='indicator_id[]' id='indicator_id' type='hidden' value='".$row['indicator_id']."' /></td>
    <td><input name='target[]' type='text' id='target' size='20' value='".$row['physical_target']."' /></td>
    <td><input name='indicator[]' type='text' id='indicator1' value='".$row['indicator_name']."' size='30' /></td>";
	//$checked=$row['disaggregation']=="Yes"?"checked":"";
	$data.="<td><select name='gender[]' ><option value=''>-select-</option>";
	//$query12=mysql_query("select disaggregation from tbl_indicator where disaggregation <> '' group by disaggregation order by disaggregation asc")or die("aBi Error-code, because, ".mysql_error());
	//while($row12=mysql_fetch_array($query12)){
	//$sel=($row['disaggregation']==$row12['disaggregation'])?"SELECTED":"";
	if($row['disaggregation']=='No'){
	$data.="<option value='No' selected='selected'/>No</option><option value='Yes' />Yes</option>";
	
	}
	else if($row['disaggregation']=='Yes')
	{
	$data.="<option value='Yes' selected='selected'/>Yes</option><option value='No' />No</option>";
	
	
	}
	else
	$data.="<option value='No' selected='selected'/>No</option><option value='Yes' />Yes</option>";
	$data.="</select>
 <input type='hidden' name='gender_1[]' id='gender_1' value='".$row['gender']."'>
 </td>
  <td><select name='reponsible[]' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value='".$row13['group_name']."' '".$sel."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' >";
	if($row['expected_output']=='Quantitative'){
	$data.="<option value='' />-select-</option><option value='Quantitative' selected />Quantitative</option>
	<option value='Qualitative'/>Qualitative</option>";
	
	}else if($row['expected_output']=='Qualitative')
	{
	$data.="<option value='' />-select-</option>
	<option value='Qualitative' selected='selected'/>Qualitative</option><option value='Quantitative' />Quantitative</option>";
	
	}
	else{
	
	$data.="<option value='' />-select-</option>
	<option value='Qualitative' />Qualitative</option><option value='Quantitative' />Quantitative</option>";
	
	
	
	
	}
	
	
	
	$data.="</select>  </td>
</table>
</td>
                    
                   
					 <tr>
                      <td>Indicator Definition</td>
                      <td><textarea name='definition[]' id='definition' cols='55' rows='5'>".$row['description']."</textarea></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                    </tr>
					<tr>
                      <td colspan=2><input name='dced_mapping' id='dced_mapping' type='checkbox' checked='checked' value='DCED' />DCED Mapping</td>
                     
                    </tr>
				
					<tr>
                      <td>Intervention</td>
                      <td><select name='intervention[]' id='intervention' \">
					  ";  
$queryi=mysql_query("select * from tbl_intervention ")or die(mysql_error());	
					   
					   while($rowi=mysql_fetch_array($queryi)){
					   if($rowi['intervention_id']==$row['intervention_id']) $data.="<option value='".$rowi['intervention_id']."' 'selected'>".$rowi['intervention']."</option>";
					   else $data.="<option value='".$rowi['intervention_id']."' >".$rowi['intervention']."</option>";
					   
					   }	
					   
					   //onchange=\"xajax_dynamicfilter_indicator(getElementById('sub_component').value)\"		      
					  $data.="<OPTION VALUE=''>-select-</option>			  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Results Chain Level</td>
                      <td><select name='resultschainlevel[]' id='resultschainlevel' \>
					  ";  
					   $queryrc=mysql_query("select * from tbl_resultschain order by rc_id asc ")or die(mysql_error());	
					   
					   while($rowrc=mysql_fetch_array($queryrc)){
					   $s=($rowrc['rc_id']==$row['rc_id'])?"selected":"";
					   $data.="<option value='".$rowrc['rc_id']."' '".$s."'>".$rowrc['name']."</option>";
					   /* if($rowrc['rc_id']==$row['rc_id'])$data.="<option value='".$rowrc['rc_id']."' 'selected'>".$rowrc['name']."</option>";
					    else $data.="<option value='".$rowrc['rc_id']."' >".$rowrc['name']."</option>"; */
					   }	
					   
					   //onchange=\"xajax_dynamicfilter_indicator(getElementById('sub_component').value)\"		      
					  $data.="<oPTION VALUE=''>-select-</option>			  
                      </select></td>
                    </tr>";
					 }
	
	//}
					
                  $data.="</table>
          </td>
                <td width='28'>&nbsp;</td>
              </tr>
              <tr>
                <td width='165'>&nbsp;</td>
                <td width='255'>&nbsp;</td>
                <td width='69'><input type='button' name='save_indicator' id='button' value='Save' onclick=\"xajax_update_indicator(xajax.getFormValues('indicator13'));\" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan='4'></td>
              </tr>
            </table>

        
        </td>
      </tr>
    </table>  </form>";
	
	//$obj->addAlert($data);
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function selectIndicator($indicator_id,$indicator_type){
$obj=new xajaxResponse();

/* for($m=0;$m<count($formvalues['indicator_id']);$m++){

$indicator_type=$formvalues['indicator_type'][$m];
$indicator_id=$formvalues['indicator_id'][$m]; */
#$obj->addAlert('$indicator_id'); 
$_SESSION['indicator_id']=$indicator_id;
$_SESSION['indicator_type']=$indicator_type;

switch($indicator_type){
case"DCED Based":
$obj->addScriptCall("xajax_edit_indicator",$_SESSION['indicator_id'],$_SESSION['indicator_type']);
	break;

case"Results Based":
$obj->addScriptCall("xajax_edit_indicator",$_SESSION['indicator_id'],$_SESSION['indicator_type']);
	break;
case"Sub-Activity Based":
$obj->addScriptCall("xajax_edit_indicatorLogoframeSubactivity",$_SESSION['indicator_id'],$_SESSION['indicator_type']);
	break;
default:
$obj->addScriptCall("xajax_edit_indicator",$_SESSION['indicator_id'],$_SESSION['indicator_type']);
	}
	
	//}
	//$obj->addAlert($data);
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function update_indicator($formvalues){
$obj=new xajaxResponse();
//$obj->addAlert(count($formvalues['indicator_id']));
for($i=0;$i<count($formvalues['indicator_id']);$i++){
$indicator_id=$formvalues['indicator_id'][$i];
$x="select * from tbl_indicator where indicator_id='".$indicator_id."'";
//$obj->addAlert($x);
$select=mysql_query($x)or die(mysql_error());
if(mysql_num_rows($select)>0){
$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall('xajax_updateIndicator2',$formvalues);
}
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function updateIndicator2($formvalues){
$obj=new xajaxResponse();

$prog_id=trim($formvalues['prog_id']);
$component=trim($formvalues['component']);
$subcomponent=trim($formvalues['sasubcomponent']);
$output_id=trim($formvalues['saoutput']);
$activity=trim($formvalues['saactivity']);
$subactivity=trim($formvalues['subactivity']);
$typeofindicator=trim($formvalues['type_ofindicator']);
$abitrust_category=trim($formvalues['abitrust_category']);

#$obj->addAlert($subcomponent."........".$output_id."--------".$activity."------".$subactivity);


/* 

$prog_id=trim($formvalues['prog_id'][$i]);
$component=trim($formvalues['component'][$i]);
$subcomponent=trim($formvalues['sasubcomponent'][$i]);
$output_id=trim($formvalues['saoutput'][$i]);
$activity=trim($formvalues['saactivity'][$i]);
$subactivity=$formvalues['subactivity'][$i]; */
//$target=trim($formvalues['target']);//if($target!='')$_SESSION['target']=$target;
//$indicator=trim($formvalues['txtRow12']);//if($indicator!='')$_SESSION['indicator']=$indicator;
for($i=0;$i<count($formvalues['indicator_id']);$i++){
$defn=mysql_real_escape_string($formvalues['definition'][$i]);
$subsector=$formvalues['subsector'][$i];
#$subsector=get_Stringorg($subsector1);
#$obj->addAlert($subsector);
$intervention=$formvalues['intervention'][$i];
$rcl=$formvalues['resultschainlevel'][$i];
/* $output_id2=trim($formvalues['saoutput'][$i]);
$activity2=trim($formvalues['saactivity'][$i]);
$subactivity2=trim($formvalues['subactivity'][$i]);
 */
//$loopkey=$formvalues['loopkey'];

$target=mysql_real_escape_string($formvalues['target'][$i]);
$indicator_id=$formvalues['indicator_id'][$i];
#$indicator=mysql_real_escape_string($formvalues['indicator']);
$indicator=$formvalues['indicator'][$i];
$gender=$formvalues['gender'][$i];
$gender_1=$formvalues['gender_1'][$i];
$responsible=trim($formvalues['reponsible'][$i]);
$output=trim($formvalues['output'][$i]);
//$sex=($gender=='')?"No":"Yes";
//$obj->addAlert($sex);
if(($gender=='No')&&($gender_1=='')){
$xx="update tbl_indicator set prog_id = '".$prog_id."',component_id='".$component."',subcomponent_id='".$subcomponent."',output_id='".$output_id."',activity_id='".$activity."',subactivity_id='".$subactivity."',intervention_id='".$intervention."',subsector='".$subsector."',rc_id='".$rcl."',physical_target='".$target."',indicator_name='".$indicator."',remarks='".$defn."',disaggregation='".trim($gender)."',indicator_type='".$typeofindicator."',abitrust_category='".$abitrust_category."',responsible='".$responsible."',expected_output='".$output."' where indicator_id='".$indicator_id."'";
#$obj->addAlert($xx);
@mysql_query($xx)or die("aBi Error Code: 0130 because,".mysql_error());
@mysql_query("delete from tbl_indicator where physical_target='' AND indicator_name =''")or die("aBI Error-code 1830 because,".mysql_error());
}
else if(($gender=='Yes')&&($gender_1=='')){
$z1="insert INTO `tbl_indicator` (`prog_id`, `component_id`, `subcomponent_id`, `output_id`, `activity_id`, `subactivity_id`,`intervention_id`, subsector,`rc_id`, `physical_target`, `indicator_name`, `disaggregation`, `gender`, `indicator_type`, `abitrust_category`,`remarks`,responsible,expected_output) VALUES 
('".$prog_id."','".$component."','".$subcomponent."','".$output_id."','".$activity."','".$subactivity."','".$intervention."','".$subsector."','".$rcl."','".mysql_real_escape_string($target)."','".mysql_real_escape_string($indicator)."(Adult Female)','".$gender."','Adult Female','".trim($typeofindicator)."','".$abitrust_category."','".$defn."','".$responsible."','".$output."'),
('".$prog_id."','".$component."','".$subcomponent."','".$output_id."','".$activity."','".$subactivity."','".$intervention."','".$subsector."','".$rcl."','".mysql_real_escape_string($target)."','".mysql_real_escape_string($indicator)."(Male Youth)','".$gender."','Male Youth','".trim($typeofindicator)."','".$abitrust_category."','".$defn."','".$responsible."','".$output."'),
('".$prog_id."','".$component."','".$subcomponent."','".$output_id."','".$activity."','".$subactivity."','".$intervention."','".$subsector."','".$rcl."','".mysql_real_escape_string($target)."','".mysql_real_escape_string($indicator)."(Female Youth)','".$gender."','Female Youth','".trim($typeofindicator)."','".$abitrust_category."','".$defn."','".$responsible."','".$output."')";
@mysql_query($z1)or die("aBi Error Code 564, because ".mysql_error());
#$obj->addAlert($z1);
$xx1="update tbl_indicator set prog_id = '".$prog_id."',component_id='".$component."',subcomponent_id='".$subcomponent."',output_id='".$output_id."',activity_id='".$activity."',subactivity_id='".$subactivity."',intervention_id='".$intervention."',subsector='".$subsector."',rc_id='".$rcl."',physical_target='".$target."',indicator_name='".$indicator."(Adult Male)',remarks='".$defn."',disaggregation='".trim($gender)."',gender='Adult Male',indicator_type='".$typeofindicator."',abitrust_category='".$abitrust_category."',responsible='".$responsible."',expected_output='".$output."' where indicator_id='".$indicator_id."'";
#$obj->addAlert($xx1);


@mysql_query($xx1)or die("aBi Error Code: 0130 because,".mysql_error());#$obj->addAlert($xx);
//mysql_query("update tbl_indicator set indicator_name='".$ind."',gender='Male' where prog_id='".$prog_id."'&& component_id='".$component."'&& subcomponent_id && physical_target='".$target."' && indicator_name='".$indicator."'")or die("aBi ERROR-CODE 0556 BECAUSE, ".mysql_error());


#$obj->addScriptCall("xajax_save_indicator_gender",$formvalues);
//on duplicate key set
//$obj->addAlert("sucessful!");
$obj->addAssign('bodyDisplay','innerHTML',congMsg("aBi indicator Captured."));
$obj->addScriptCall("xajax_view_indicator",'','','','','','','');
}
else if(($gender=='Yes') and ($gender_1!=''))
{
$xx1="update tbl_indicator set prog_id = '".$prog_id."',component_id='".$component."',subcomponent_id='".$subcomponent."',output_id='".$output_id."',activity_id='".$activity."',subactivity_id='".$subactivity."',intervention_id='".$intervention."',subsector='".$subsector."',rc_id='".$rcl."',physical_target='".$target."',indicator_name='".$indicator."',remarks='".$defn."',disaggregation='".trim($gender)."',indicator_type='".$typeofindicator."',abitrust_category='".$abitrust_category."',responsible='".$responsible."',expected_output='".$output."' where indicator_id='".$indicator_id."'";
#$obj->addAlert($xx1);
//,gender='Adult Male'

@mysql_query($xx1)or die("aBi Error Code: 0130 because,".mysql_error());
#$obj->addAlert($xx);

}
else if(($gender=='No')&&($gender_1!='')){

@mysql_query("update tbl_indicator set gender=''  where indicator_id='".$indicator_id."'")or die("aBi error-code 1930 because ,".mysql_error());
$obj->addAlert("Please First Delete other gender corresponding indicators to ".$indicator." before changing the status of this Indicator");

/* $xx1="update tbl_indicator set prog_id = '".$prog_id."',component_id='".$component."',subcomponent_id='".$subcomponent."',output_id='".$output_id."',activity_id='".$activity."',subactivity_id='".$subactivity."',intervention_id='".$intervention."',subsector='".$subsector."',rc_id='".$rcl."',physical_target='".$target."',indicator_name='".$indicator."',remarks='".$defn."',disaggregation='".trim($gender)."',indicator_type='".$typeofindicator."',abitrust_category='".$abitrust_category."',responsible='".$responsible."',expected_output='".$output."' where indicator_id='".$indicator_id."'";
 */#@mysql_query("delete from tbl_indicator where indicator_name='".."'")or die("aBi error-code 1930 because ,".mysql_error());
$obj->addScriptCall("xajax_view_indicator",'','','','','','','');
return $obj;

}

else 
{
$xx1="update tbl_indicator set prog_id = '".$prog_id."',component_id='".$component."',subcomponent_id='".$subcomponent."',output_id='".$output_id."',activity_id='".$activity."',subactivity_id='".$subactivity."',intervention_id='".$intervention."',subsector='".$subsector."',rc_id='".$rcl."',physical_target='".$target."',indicator_name='".$indicator."',remarks='".$defn."',disaggregation='".trim($gender)."',indicator_type='".$typeofindicator."',abitrust_category='".$abitrust_category."',responsible='".$responsible."',expected_output='".$output."' where indicator_id='".$indicator_id."'";
#$obj->addAlert($xx1);
//,gender='Adult Male'

@mysql_query($xx1)or die("aBi Error Code: 0130 because,".mysql_error());#$obj->addAlert($xx);

} 
}

$obj->addAssign('bodyDisplay','innerHTML',congMsg("Indicator updated!"));
$obj->addScriptCall("xajax_view_indicator",'','','','','','','');
return $obj;
}


/*******************
edit_resultsBasedPlanning
edit_resultsBasedPlanningindicator





***************************************/




function edit_resultsBasedPlanning($subcomponent){ 
$obj=new xajaxResponse();
$_SESSION['activity']=$activity;

$data="<form name='activityBasedPlanning' id='activityBasedPlanning' action='".$PHP_SELF."'><table width='664' border='0'>
<tr class=''>
              <td colspan='8' class='green_field'>Planning &raquo; Physical Project Life Targets
                <label></label></td></tr>
				 <tr>
              <td colspan='8'><hr/></td></tr>";
		
           $data.="<tr class='evenrow'>
              <td class='evenrow' colspan=2>&nbsp;</td>
              <td colspan='5' class='evenrow'>Project Life Physical Targets</td>
            </tr>
            <tr class=evenrow2>
              <td width='143' class='evenrow2'>Code</td>
              <td colspan='2' class='evenrow2'>Sub-Component</td>
			  <td colspan='3' class='evenrow2' >Indicator</td>
			  <td width='176' class='evenrow2'><b>Total</b></td>
            </tr>";
			//$r=$_SESSION['ractivity_id'];
//$n=1;$a=1;$b=2;$c=3;$d=4;$e=5;$f=6;$g=7;$h=8;$i=9;$j=10;
$y="select * from view_projectlifetargets where subcomponent_id='".$_SESSION['PLTsubcomponent_id']."' order by subcomponent_code asc";
		  $query2=mysql_query($y)or die(mysql_error());
		  //$obj->addAlert($y);
		  //value='".$a++.$n++."' 
		  $inc=1;
		  $a=1;
		  while($row=mysql_fetch_array($query2)){
		  //<td></td>
		   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
 
            <td><input name='loopkey[]' type='hidden' value='1' id='loopkey' size='6'  />
			<INPUT type='hidden' name='subcomponent_id'  id=subcomponent_id  value=$row[subcomponent_id] >$row[subcomponent_code]</td>
            <td colspan='2'>$row[subcomponent]</td>
			<td colspan='3'><INPUT type='hidden' size='10' name='indicator_id[]'  id='indicator_id[]' value='".$row['indicator_id']."' >$row[indicator_name]</td>

		    <td><input name='target[]' id='target[]' onKeyPress='return numbersonly(event, false)' value='".$row['target']."'   /></td>
            
          </tr>";
		  $inc++;
		 $a++; 

		  }
	$data.="
		  <tr>
            <td></td>
            <td colspan='3'></td><td></td>
            <td></td>
            
			
            <td align=right><input name='save' type='button' id='save' size='' value='Save' title='Save workplan' onclick=\"xajax_update_resultsBasedPlanning(xajax.getFormValues('activityBasedPlanning'))\" /></td>
          </tr></table>
</form>";

$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("view_activityBasedPlanning",$activity);
return $obj;

}


function update_resultsBasedPlanning($formvalues){
$obj=new xajaxResponse();
$subcomponent=$formvalues['subcomponent_id'];
$x="select * from tbl_projectlifetargets where subcomponent_id='".$subcomponent."'";
//$obj->addAlert($x);
$select=mysql_query($x)or die(mysql_error());
if(mysql_num_rows($select)>0){
$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall("xajax_updateResultsBasedPlanning2",$formvalues);
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function updateResultsBasedPlanning2($formvalues){
$obj=new xajaxResponse();
//$indicator_id=$formvalues['indicator_id'];
//$period=$formvalues['period'];
//$subcomponent=$formvalues['subcomponent_id'];
//$obj->addAlert(count($formvalues['target']));
for($m=0;$m<count($formvalues['target']);$m++){
$indicator=$formvalues['indicator_id'][$m];
$target=$formvalues['target'][$m];
//if($target!='')
$update="update tbl_projectlifetargets set target ='".$target."' where indicator_id='".$indicator."'"; 
//$obj->addAlert($update);
mysql_query($update)or die(mysql_error());
}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Project Life Targets updated!"));
$obj->addScriptCall("xajax_view_activityBasedPlanning");
return $obj;
}






function edit_resultsBasedPlanningIndicator($indicator_id){ 
$obj=new xajaxResponse();
$_SESSION['activity']=$activity;
$q=@mysql_query("select * from view_projectlifetargets where indicator_id='".$indicator_id."' order by indicator_id")or die(mysql_error());
while($row=@mysql_fetch_array($q)){
$data="<form name='activityBasedPlanning' id='activityBasedPlanning' action='".$PHP_SELF."'><table width='664' border='0'>".filter_resultsBasedIndicator()."
        
            <tr class='evenrow'>
              <td class='evenrow' colspan=2>&nbsp;</td>
              <td colspan='5' class='evenrow'>Project Life Physical Targets</td>
            </tr>
            <tr class=evenrow2>
              <td width='143' class='evenrow2'>Code</td>
              <td colspan='2' class='evenrow2'>Sub-Component</td>
			  <td colspan='3' class='evenrow2' >Indicator</td>
			  <td width='176' class='evenrow2'><b>Total</b></td>
            </tr>";
		
  $data.="<tr class=$color>
 
            <td><INPUT type='hidden' name='subcomponent_id'  id=subcomponent_id  value=$row[subcomponent_id] >$row[subcomponent_code]</td>
            <td colspan='2'>$row[subcomponent]</td>
			<td colspan='3'><INPUT type='hidden' size='10' name='indicator_id'  id='indicator_id' value='".$row['indicator_id']."' >$row[indicator_name]</td>

		    <td><input name='target' id='target' onKeyPress='return numbersonly(event, false)'  value='".$row['target']."'  /></td>
            
          </tr>";
		
	$data.="
		  <tr>
            <td></td>
            <td colspan='3'></td><td></td>
            <td></td>
            
			
            <td align=right><input name='save' type='button' id='save' size='' value='Save' title='Save workplan' onclick=\"xajax_update_resultsBasedPlanningIndicator(xajax.getFormValues('activityBasedPlanning'))\" /></td>
          </tr></table>
</form>";
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;

}

function update_resultsBasedPlanningIndicator($formvalues){
$obj=new xajaxResponse();
$indicator_id=$formvalues['indicator_id'];
$x="select * from tbl_projectlifetargets where indicator_id='".$indicator_id."'";
//$obj->addAlert($x);
$select=mysql_query($x)or die(mysql_error());
if(mysql_num_rows($select)>0){
$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall("xajax_updateResultsBasedPlanningIndicator2",$formvalues);
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function updateResultsBasedPlanningIndicator2($formvalues){
$obj=new xajaxResponse();
$indicator_id=$formvalues['indicator_id'];
$period=$formvalues['period'];
//$lp=$formvalues['loopkey'];
//$obj->addAlert($formvalues['subcomponent_id']);
//for($m=0;$m<count($formvalues['subcomponent_id']);$m++){
$subcomponent=$formvalues['subcomponent_id'];
//$indicator=$formvalues['indicator_id'][$m];
$target=$formvalues['target'];
//if($target!='')
$update="update tbl_projectlifetargets set subcomponent_id='".$subcomponent."',Period='".$period."',target ='".$target."' where indicator_id='".$indicator_id."'"; 
//$obj->addAlert($update);
mysql_query($update)or die(mysql_error());
//}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Project Life Targets updated!"));
$obj->addScriptCall("xajax_view_activityBasedPlanning");
return $obj;
}





function edit_resultschain($formvalues){
$obj=new xajaxResponse();

$data="<form name='resultschain1'  method='post' action='".$PHP_SELF."'><table width='660' border='0'>
  <tr>
    <td colspan='2' class='green_field'><div style='float:left;'>Setup &raquo;Editing Results Chain Level </div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_resultschain_level('')\" type='button' /></div></td>
    </tr>";
	
 #$obj->addAlert(count($formvalues['rcl_id']));
 #$obj->addAlert(count($formvalues['loopkey']));
 //loopkey
	 for($m=0;$m<count($formvalues['rcl_id']);$m++){	
 $rc_id=$formvalues['rcl_id'][$m];
 #$obj->addAlert($rc_id);
 $x="select * from  tbl_resultschain where rc_id='".$rc_id."'";
//$obj->addAlert($x);
 #return $obj;
	$query=mysql_query($x)or die(mysql_error());
	while($row=mysql_fetch_array($query)){
	$data.="<tr>
    <td colspan='2'><hr></td>
    </tr>
	<tr>
    <td colspan='2'><div id='status'></div></td>
    </tr>
  <tr>
    <td>Results chain name:</td>
    <td><input name='rcl_id[]' type='hidden' size='43' value='".$row['rc_id']."'>
	<input name='chain_name[]' type='text' size='43' value='".$row['name']."'></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><textarea name='chdesc[]' cols='40' rows='3'>".$row['details']."</textarea></td>
  </tr>";
  }}
 
  $data.="<tr>
    <td></td>
    <td><input name='update' type='button' value='Save' onclick=\"xajax_updateResultsChain(xajax.getFormValues('resultschain1'))\" /></td>
  </tr>
</table></FORM>";

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function update_resultschain($formvalues){
$obj=new xajaxResponse();
for($i=0;$i<count($formvalues['rcl_id']);$i++){
$rc_id=$formvalues['rcl_id'][$i];
$x="select * from tbl_resultschain where rc_id='".$rc_id."'";
$select=mysql_query($x)or die(mysql_error());
if(mysql_num_rows($select)>0){
//$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall('xajax_updateResultsChain',$formvalues);
}
}

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function updateResultsChain($formvalues){
$obj=new xajaxResponse();
#$obj->addAlert(count($formvalues['rcl_id']));
for($i=0;$i<count($formvalues['rcl_id']);$i++){
$rc_id=$formvalues['rcl_id'][$i];
$chname=$formvalues['chain_name'][$i];
$chdesc=$formvalues['chdesc'][$i];

$x="update tbl_resultschain set name='".$chname."',details='".$chdesc."' where rc_id='".$rc_id."'";
#$obj->addAlert($x);

@mysql_query($x)or die(mysql_error());
}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Results Chain Details Updated"));
$obj->AddScriptCall("xajax_view_resultschain_level",'');
return $obj;
}



#edit_subsector

function edit_subsector($formvalues){
$obj=new xajaxResponse();
#$obj->addAlert(count($formvalues['subsector_id']));

$data=" <form name='subsector1' id='subsector1' method='post' action='".$PHP_SELF."'><table width='660' border='0'>
  <tr>
    <td colspan='2' class='green_field'><div style='float:left;'>Setup &raquo; Editing Subsector </div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_subsector('')\" type='button' /></div></td>
    </tr>";
	for($m=0;$m<count($formvalues['subsector_id']);$m++){
 $id=$formvalues['subsector_id'][$m];
 $query1=mysql_query("select * from tbl_subsector where subsector_id='".$id."' and subsector <> '' order by subsector_id asc")or die(mysql_error());
	while($row1=mysql_fetch_array($query1)){
	
	$data.="<tr>
    <td colspan='2'><hr></td>
    </tr>
	<tr>
    <td colspan='2'><div id='status'></div></td>
    </tr>
	 <tr>
    <td><input type='hidden' name='subsector_id[]' id='subsector_id' value='".$row1['subsector_id']."'>".$row1['subsector_id']."Programme:</td>
    <td><select name='programme[]' >";
	$query=mysql_query("select * from tbl_programme order by program_name")or die(mysql_error());
	while($row=mysql_fetch_array($query)){
	$selected=($row1['prog_id']==$row['prog_id'])?"SELECTED":"";
	$data.="<option value='".$row['prog_id']."' '".$selected."'>".$row['program_name']."</option>";}
	$data.="</select></td>
  </tr>
  <tr>
    <td>Component:</td>
    <td><select name='component[]' >";
	$query=mysql_query("select * from tbl_component order by component")or die(mysql_error());
	while($row3=mysql_fetch_array($query)){
		$selected=($row1['component_id']==$row3['id'])?"SELECTED":"";
	$data.="<option value='".$row3['id']."' '".$selected."'>".$row3['component']."</option>";}
	$data.="</select></td>
  </tr>";
 
  /* <tr>
    <td>Sub-Component:</td>
    <td><select name='subcomponent[]' type='text' size='1'><option value=''>-Select-</option>";
	$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(mysql_error());
	
	while($row2=mysql_fetch_array($query)){
	$selected=($row2['id']==$row1['subcomponent_id'])?"SELECTED":"";
$data.="<option value='".$row2['id']."' '".$selected."'>".$row2['subcomponent_code']." ".$row2['subcomponent']."</option>";	}
	
	$data.="</select></td>
  </tr> */
  $data.=" <tr>
    <td>Subsector name:</td>
    <td><input name='subsector[]' type='text' size='40' value='".$row1['subsector']."' /></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><textarea name='idesc[]' cols='32' rows='3'>".$row1['details']."</textarea></td>
  </tr>";
  }
  }
  $data.="<tr>
    <td></td>
    <td></td>
  </tr>
  
  <tr>
    <td></td>
    <td><input name='save_intervention' type='button' value='Save' onclick=\"xajax_update_subsector(xajax.getFormValues('subsector1'))\" /></td>
  </tr>
</table></form>";



$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function update_subsector($formvalues){
$obj=new xajaxResponse();
#$obj->addAlert(count($formvalues['subsector_id']));
for($i=0;$i<count($formvalues['subsector_id']);$i++){
$subsector_id=$formvalues['subsector_id'][$i];
$programme=$formvalues['programme'][$i];
$component=$formvalues['component'][$i];
$subsector=$formvalues['subsector'][$i];
#$subcomponent=$formvalues['subcomponent'][$i];
$idesc=$formvalues['idesc'][$i];
/* if($subsector==""){
$obj->addAssign("status","innerHTML",errorMsg("Enter subsector Name"));
return $obj;
}
else */
$x="update tbl_subsector set prog_id='".$programme."',component_id='".$component."',subsector='".str_replace("'","",$subsector)."',details='".$idesc."' where subsector_id='".$subsector_id."'";
#$obj->addAlert($x);
$query=mysql_query($x)or die("aBi Error Code 0223 because of ".mysql_error());
}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Subsector Updated!."));
$obj->addScriptCall("xajax_view_subsector",'');
return $obj;
}








#edit annualTarget--------------------------------------------

function edit_annualTarget($formvalues){
$obj=new xajaxResponse();

$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table width='664' border='0'>";
         $data.=" 
		 <tr>
              <td colspan='11' class='green_field'>Planning &raquo; Annual Targets
                <label></label></td></tr>";
		

/*	
$query=mysql_query("select * from tbl_annualTarget where indicator_id ='".$indicator_id."'")or die("aBi-Error code 2124: because, ".mysql_error());
while($row=mysql_fetch_array($query)){

 
				 $data.="<tr>
              <td colspan='11'><hr/></td></tr>
			  
		 <tr style='display:none;'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='9'><select name='subcomponent' id='subcomponent' onchange=\"xajax_filter_annualTarget_subcomponent(getElementById('subcomponent').value)\">";
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
<tr style='display:none;'>
              <td colspan='2'>Outputs
                <label></label></td>
              <td colspan='9'><select name='output' id='output'><option value=''>-select-</option>";
			    if($_SESSION['wpsubcomponent_id']!='')
					  $query=mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['wpsubcomponent_id']."' order by output_code asc")or die(mysql_error());
					  while($row=mysql_fetch_array($query)){
					  //$selected=($_SESSION['output_idAnualPlanning']=$row['output_id'])?"SELECTED":"";
					  $data.="<option value='".$row['output_id']."' '".$selected."'>".$row['output_code']." ".$row['output_name']."</option>";
					  }
					
					  $data.="
              </select></td>
            </tr>
            <tr style='display:none;'>
              <td colspan='2'>Activity: </td>
              <td colspan='9'><select name='activity' id='activity' onchange=\"xajax_new_annualTarget(getElementById('subcomponent').value,getElementById('output').value,getElementById('activity').value);\" ><option value=''>-select-</option>";
			    /* if($_SESSION['ractivity_id']!='')$data.="<option value='".$_SESSION['ractivity_id']."'>".$_SESSION['ractivity_code']." ".$_SESSION['ractivity_name']."</option>";
				else   onchange=\"xajax_reload_annualTargetActivity(getElementById('activity').value);return false;\"
				$data."<option value='%'>-All-</option>";
					  $query=mysql_query("select * from view_indicator where subcomponent_id='".$_SESSION['wpsubcomponent_id']."'  group by activity_code order by activity_code asc")or die(mysql_error());
					  while($row=mysql_fetch_array($query)){
					  $sel=($_SESSION['activity_idAnualPlanning']==$row['activity_id'])?"SELECTED":"";
$data.="<option value='".$row['activity_id']."' '".$sel."'>".$row['activity_code']." ".$row['activity_name']."</option>";
		
					  }
					   
$data.="</select></td>
            </tr>"; 
			style='display:none;'
			 */
            $data.="<tr class='evenrow' >
              <td colspan='3'>Financial Year:</td>
              <td colspan='9'><select name='fyear' id='fyear' >
      ";
                $yr = date(Y); $end=$yr;
				do{
				$sel=($_SESSION['fyear']==$end)?"SELECTED":"";
				 $data.="<option value='".$end."' '".$sel."'>".$end."</option>
      ";
				 $end--;
				} while($end>=2010);
               
   $data.="</select></td>
            </tr>";
			
            $data.="<tr>
              <td class='evenrow2' colspan=2>&nbsp;</td>
              <td width='25' class='evenrow2'>&nbsp;</td>
              <td width='145' class='evenrow2'>&nbsp;</td>
              <td colspan='6' class='evenrow2'>Annual Targets</td>
            </tr>
            <tr class=evenrow>
              <td width='45' class='evenrow2'>Code</td>
              <td colspan='2' width=100 class='evenrow2'>Subactivity/Intervention </td>
			  <td width='' class='evenrow2' colspan='' >Indicator</td>
			  <td width='55' class='evenrow2'>Baseline</td>
              <td width='55' class='evenrow2'>Quarter 1</td>
              <td width='51' class='evenrow2'>Quarter 2</td>
              <td width='51' class='evenrow2'>Quarter 3</td>
              <td width='51' class='evenrow2'>Quarter 4</td>
			  <td width='51' class='evenrow2'><b>Total</b></td>
             
            </tr>";
			
			$inc=1;
		  $a=1;
			#$obj->addAlert(count($formvalues['p_id']));
			for($i=0;$i<count($formvalues['p_id']);$i++){
$p_id=$formvalues['p_id'][$i];
#$obj->addAlert($p_id);

//subcomponent_id='".$_SESSION['wpsubcomponent_id']."' && output_id='".$_SESSION['output_idAnualPlanning']."' && && indicator_type like '%sub-activity based%'
//$y="select * from view_annualTarget where indicator_id='".$p_id."' order by indicator_id asc";

$y="select ta.p_id,ta.subactivity_id,intv.intervention,i.intervention,ta.baseline,ta.indicator_id,ta.year,i.output_name,i.activity_name,i.subcomponent,i.subactivity_name,i.subactivity_code,i.indicator_name,i.indicator_type,ta.pquarter1,ta.pquarter2,ta.pquarter3,ta.pquarter4,ta.ptotal from tbl_annualtarget ta inner join view_indicator i on(ta.indicator_id=i.indicator_id) left join tbl_intervention intv on(intv.intervention_id=i.intervention_id) where p_id='".$p_id."' order by indicator_id,year asc";
#$obj->addAlert($y);
		  $query2=mysql_query($y)or die("aBi Erroe Code-2213, because ".mysql_error());
		  //$obj->addAlert($y);

		  
		  while($row=mysql_fetch_array($query2)){
		 $intervention=''; 
	$intervention=($row['indicator_type']=='DCED Based')?$row['intervention']:$row['subactivity_name'];
		   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
            <td><INPUT type=hidden name='subactivity_id[]'  id='subactivity_id' value='".$row['subactivity_id']."' >  ".$row['subactivity_code']."</td>
           <td colspan=2>".$intervention."</td>
			<td colspan=''><INPUT type=hidden name='p_id[]'  id='p_id' value='".$row['p_id']."' >
			<INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >".$row['indicator_name']."</td>
			 <td><input name='base[]' type='text' id='base".$a."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>
			<td><input name='pq1[]' type='text' id='q1".$a."' size='10' value='".$row['pquarter1']."' onKeyPress='return numbersonly(event, false)' /></td>
            <td><input name='pq2[]' type='text' id='q2".$a."' size='10' value='".$row['pquarter2']."' onKeyPress='return numbersonly(event, false)'   /></td>
            <td><input name='pq3[]' type='text' id='q3".$a."' size='10' value='".$row['pquarter3']."' onKeyPress='return numbersonly(event, false)' /></td>
            <td><input name='pq4[]' type='text' id='q4".$a."' size='10' value='".$row['pquarter4']."' onKeyPress='return numbersonly(event, false)'   /></td>
			<td><input name='target[]' readonly='readonly' value='".$row['ptotal']."' onFocus=\"xajax_new_target(getElementById('q1".$a."').value,getElementById('q2".$a."').value,getElementById('q3".$a."').value,getElementById('q4".$a."').value,'target".$a."')\"  type='text' id='target".$a."' size='10' onKeyPress='return numbersonly(event, false)'   /></td>
            
          </tr>";
		  $inc++;
		 $a++; 

		  }

		  }

	$data.="
		  <tr class='evenrow'>
          
            <td colspan='9'></td>
            
            <td align=right><input name='save' type='button' id='save' size='' value='Save' title='Save workplan' onclick=\"xajax_updateAnnulTarget(xajax.getFormValues('annualTarget'))\" /></td>
          </tr></table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

#----------------------edit_annualBudget----------------------------------------------
function edit_annualBudget($formvalues){
$obj=new xajaxResponse();
//$subcomponent,$activity,$year
$data="<form name='annualBudget2' id='annualBudget2' action='".$PHP_SELF."'><table width='664' border='0'>";
         $data.=" 
		 <tr>
              <td colspan='11' class='green_field'>Planning &raquo; Annual Financial Targets
                <label></label></td></tr>
				 <tr>
              <td colspan='11'><hr/></td></tr>";
		/* <tr> 
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='9'><select name='subcomponent' id='subcomponent' onchange=\"xajax_filter_annualBudget_subcomponent(getElementById('subcomponent').value)\">";
			  if($_SESSION['wpsubcomponent_id']!='')
$data.="<option value='".$_SESSION['wpsubcomponent_id']."'>".$_SESSION['wpsubcomponent_code']." ".$_SESSION['wpsubcomponent']."</option>";

else
$data.="<option value=''>-Select-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['id']."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
<tr style='display:none;'>
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
            </tr> */
            /* $data.="<tr>
              <td colspan='2'>Activity: </td>
              <td colspan='9'><select name='activity' id='activity' onchange=\"xajax_reload_annualBudgetActivity(getElementById('activity').value);return false;\">";
			    /* if($_SESSION['ractivity_id']!='')$data.="<option value='".$_SESSION['ractivity_id']."'>".$_SESSION['ractivity_code']." ".$_SESSION['ractivity_name']."</option>";
				else 
				$data."<option value='%'>-Select-</option>";
					  $query=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['wpsubcomponent_id']."'  group by activity_code order by activity_code asc")or die(mysql_error());
					  while($row=mysql_fetch_array($query)){
					  $selected=($_SESSION['ractivity_id']==$row['activity_id'])?"SELECTED":"";
$data.="<option value='".$row['activity_id']."' '".$selected."'>".$row['activity_code']." ".$row['activity_name']."</option>";
		
					  }
					   
$data.="</select></td>
            </tr>"; */ 
		
			
            $data.="<tr>
              <td colspan='2'>Financial Year:</td>
              <td colspan='9'><select name='fyear' id='fyear'>";
                  $yr=date(Y); $end=$yr;
				  do{
				  $data.="<option value='".$end."'>".$end."</option>";
				  $end--;
				  }while($end>=2010);
$data.="</select></td>
            </tr>
            <tr>
              <td class='evenrow2' colspan=2>&nbsp;</td>
              <td width='25' class='evenrow2'>&nbsp;</td>
              
              <td colspan='6' class='evenrow2'>Annual Budget in 1000 UgShs.</td>
             
            </tr>
            <tr>
              <td width='20' class='evenrow2'>Code</td>
              <td colspan='2'  class='evenrow2' width='200'>Subactivity </td>
              <td width='51' class='evenrow2' colspan=2>Quarter 1</td>
              <td width='51' class='evenrow2'>Quarter 2</td>
              <td width='51' class='evenrow2'>Quarter 3</td>
              <td width='51' class='evenrow2'>Quarter 4</td>
			  <td width='51' class='evenrow2'>Total</td>
             
            </tr>"; $a=1;
		  $inc=1; 
			for($i=0;$i<count($formvalues['f_id']);$i++){
			$f_id=$formvalues['f_id'][$i];
			$r=$_SESSION['ractivity_id'];
//$n=1;$a=1;$b=2;$c=3;$d=4;$e=5;$f=6;$g=7;$h=8;$i=9;$j=10;
$y="select * from view_annualbudget where f_id='".$f_id."' order by subactivity_code asc";
		  $query2=mysql_query($y)or die(mysql_error());
		  //$obj->addAlert($y);
		  //value='".
		 
		  while($row=mysql_fetch_array($query2)){
		  
 $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  
            <td><INPUT type=hidden name='subact_id[]'  id=subact_id value=$row[subactivity_id] >$row[subactivity_code]</td>
            <td colspan='2'>$row[subactivity_name]</td>
			 <td colspan='2'><INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
           <input name='f_id[]' type='hidden' value='".$row['f_id']."' id='textfield' size='6'  />
			<input name='pq1[]' type='text' id='pq1".$a."' size='10' onKeyPress='return numbersonly(event, false)' value='".$row['fquarter1']."' /></td>
            <td><input name='pq2[]' type='text' id='pq2".$a."' size='10' onKeyPress='return numbersonly(event, false)' value='".$row['fquarter2']."'  /></td>
            <td><input name='pq3[]' type='text' id='pq3".$a."' size='10'  onKeyPress='return numbersonly(event, false)' value='".$row['fquarter3']."'/></td>
            <td><input name='pq4[]' type='text' id='pq4".$a."' size='10' onKeyPress='return numbersonly(event, false)' value='".$row['fquarter4']."'  /></td>
            <td><input name='total[]' type='text' size='20'  readonly='readonly' onKeyPress='return numbersonly(event, false)'  value='".$row['ftotal']."' onFocus=\"xajax_calc_budget(getElementById('pq1".$a."').value,getElementById('pq2".$a."').value,getElementById('pq3".$a."').value,getElementById('pq4".$a."').value,'total".$a."')\" type='text' id='total".$a."'  /></td>
          </tr>";
		 // $a++; $b++; $c++; $d++; $e++; $f++;	 $g++;	 $h++; 
		 $inc++;
		 $a++;
		  }
		  }
	$data.="<tr>
            <td></td>
            <td colspan='5'></td><td></td>
            <td></td>
            <td></td>
            <td></td>
           
            <td align=right></td>
          </tr>
		  <tr>
            <td></td>
            <td colspan='5'></td><td></td>
            <td></td>
           
   
            <td align=right><input name='save' type='button' id='save' size='' value='Save' title='Save workplan' onclick=\"xajax_updateAnnualBudget(xajax.getFormValues('annualBudget2'))\" /></td>
          </tr></table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}







function updateAnnulTarget($formvalues){
$obj=new xajaxResponse();
 if($_SESSION['role']<>'Monitoring and Evaluation'){
$obj->addAlert("Access Denied!\n Only Monitoring and Evaluation can Delete a Setup Item!");
return $obj;
}
for($i=0;$i<count($formvalues['p_id']);$i++){
$p_id=trim($formvalues['p_id'][$i]);
$indicator_id=trim($formvalues['indicator_id'][$i]);
$baseline=trim($formvalues['base'][$i]);
$pq1=trim($formvalues['pq1'][$i]);
$pq2=trim($formvalues['pq2'][$i]);
$pq3=trim($formvalues['pq3'][$i]);
$pq4=trim($formvalues['pq4'][$i]);
$target=trim($formvalues['target'][$i]);

if($target!='')

$xx="update tbl_annualTarget set baseline='".$baseline."',pquarter1='".$pq1."',pquarter2='".$pq2."',pquarter3='".$pq3."',pquarter4='".$pq4."',ptotal='".$target."' where p_id='".$p_id."'";
//$obj->addAlert($xx);
@mysql_query($xx)or die("aBi Error Code: 0130 because,".mysql_error());
}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Annual Target updated!"));
//$obj->addScriptCall("xajax_view_annualTarget",'','','','','','','');
return $obj;
}


function updateAnnualBudget($formvalues){
$obj=new xajaxResponse();
/*  if($_SESSION['role']<>'Monitoring and Evaluation'){
$obj->addAlert("Access Denied!\n Only Monitoring and Evaluation can Delete a Setup Item!");
return $obj;
} */
for($i=0;$i<count($formvalues['f_id']);$i++){
$f_id=trim($formvalues['f_id'][$i]);
$indicator_id=trim($formvalues['indicator_id'][$i]);
$baseline=trim($formvalues['base'][$i]);
$pq1=trim($formvalues['pq1'][$i]);
$pq2=trim($formvalues['pq2'][$i]);
$pq3=trim($formvalues['pq3'][$i]);
$pq4=trim($formvalues['pq4'][$i]);
$total=trim($formvalues['total'][$i]);

if($total!='')

$xx="update tbl_annualBudget set fquarter1='".$pq1."',fquarter2='".$pq2."',fquarter3='".$pq3."',fquarter4='".$pq4."',ftotal='".$total."' where f_id='".$f_id."'";
//$obj->addAlert($xx);
@mysql_query($xx)or die("aBi Error Code: 0130 because,".mysql_error());
}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Annual Budget updated!"));
$obj->addScriptCall("xajax_view_annualBudget",'','','','');
return $obj;
}

///////-----------------------------------edit r----------------------------------------

function edit_subactivityBasedProjectLifePlanning($formvalues){
$obj=new xajaxResponse();

//$_SESSION['PLTsubcomponent_id']=$subcomponent;
$data="<form name='activityBasedPlanning' id='activityBasedPlanning' action='".$PHP_SELF."'>
<table width='664' border='0'>";
         $data.=" 
		 <tr class=''>
              <td colspan='3' class='green_field'>Planning &raquo; Sub Activity Based Project Project Life Targets
                <label></label></td></tr>
				 <tr>
              <td colspan='3'><hr/></td></tr>";
			  /* $data.="<tr class=evenrow2>
              <td colspan=''>Programme:</td><td colspan=2> <select name='programme' id='programme' >
                <option value='%'>-All-</option>";
				$q=mysql_query("select * from tbl_programme order by prog_id asc")or die("aBi Error-code:197 because, ".mysql_error());
				while($row=mysql_fetch_array($q)){
				$sel=($programme==$row['prog_id'])?"SELECTED":"";
				$data.="<option value='".$row['prog_id']."'  '".$sel."'>".$row['program_name']."</option>";
				
				}
              $data.="</select>     </td>
            </tr>
		 
		<tr class=evenrow>
              <td colspan=''>Sub-component: </td><td colspan=2>
            <select name='subcomponent' id='subcomponent' onchange=\"xajax_new_subactivityBasedIndicatorPlanning('sub-Activity based',getElementById('programme').value,getElementById('subcomponent').value)\">";
			
$data.="<option value=''>-Select-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$selected=$_SESSION['PLTsubcomponent_id']==$row['id']?"SELECTED":"";
$data.="<option value='".$row['id']."' '".$selected."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
            <tr class='evenrow'>
              
              <td colspan='3' class='evenrow' align='center'>Sub-Activity Based Project Life Targets</td>
            </tr>"; */
			
            $data.="<tr class=evenrow2>
			  <td colspan='2' class='evenrow2' >Indicator</td>
			  <td width='100' class='evenrow2'><b>Total Value</b></td>
            </tr>";
				#$obj->addAlert(count($formvalues['plt_id']));
for($i=0;$i<count($formvalues['plt_id']);$i++){

			$plt_id=$formvalues['plt_id'][$i];
			$x="select * FROM view_projectlifetargets where plt_id='".$plt_id."'";
			#$obj->addAlert($x);
			$query=mysql_query($x)or die("aBi Error code 2537 because,".mysql_error());
			while($row=mysql_fetch_array($query)){
/* $y="select * from tbl_indicator where prog_id='".$programme."' and subcomponent_id='".$_SESSION['PLTsubcomponent_id']."' and lower(indicator_type) like '%sub-Activity based%' order by indicator_id asc";
		  $query2=mysql_query($y)or die(mysql_error());
		  //$obj->addAlert($y);
		
		  $inc=1;
		  $a=1;
		  while($row=mysql_fetch_array($query2)){ */
		   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
 
            <td colspan='2'>
          <INPUT type='hidden' size='10' name='plt_id[]'  id='plt_id' value='".$row['plt_id']."' >".$row['indicator_name']."</td>

		    <td><input name='target[]' id='target' value='".$row['target']."' onKeyPress='return numbersonly(event, false)'   /></td>
            
          </tr>";
		  $inc++;
		 $a++; 
	
		  }
		  }
		 
	$data.="
		  <tr>
            <td></td>
            <td colspan='3'></td><td></td>
            <td></td>
            
			
            <td align=right><input name='save' type='button' id='save' size='' value='Save' title='Save workplan' onclick=\"xajax_update_subactivityBasedProjectLifePlanning(xajax.getFormValues('activityBasedPlanning'))\" /></td>
          </tr></table>
</form>";

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;

}


#---------------------------------update_subactivityBasedProjectLifePlanning------------------------------
function update_subactivityBasedProjectLifePlanning($formvalues){
$obj=new xajaxResponse();
for($i=0;$i<count($formvalues['plt_id']);$i++){
$plt_id=$formvalues['plt_id'][$i];
$x="select * from tbl_projectlifetargets where plt_id='".$plt_id."'";
$select=mysql_query($x)or die("aBi Error code 2592 because, ".mysql_error());
if(mysql_num_rows($select)>0){
#$obj->AddConfirmCommands(1,"Do You really Want to Update?");
$obj->AddScriptCall('xajax_updateSubactivityBasedProjectLifePlanning',$formvalues);
}
}

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}




function updateSubactivityBasedProjectLifePlanning($formvalues){
$obj=new xajaxResponse();
/*  if($_SESSION['role']<>'Monitoring and Evaluation'){
$obj->addAlert("Access Denied!\n Only Monitoring and Evaluation can Delete a Setup Item!");
return $obj;
} */
for($i=0;$i<count($formvalues['plt_id']);$i++){
$plt_id=trim($formvalues['plt_id'][$i]);
$indicator_id=trim($formvalues['indicator_id'][$i]);
$target=trim($formvalues['target'][$i]);
#$obj->addAlert($plt_id);
#$obj->addAlert($target);
if($target!='')

$xx="update tbl_projectlifetargets set target='".$target."' where plt_id='".$plt_id."'";
#$obj->addAlert($xx);
@mysql_query($xx)or die("aBi Error Code: 2622 because,".mysql_error());

}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Project Life Target updated!"));
#$obj->addScriptCall("xajax_subActivityBasedIndicatorPlanning",'','','','');
return $obj;
}



function edit_valueChainDevelopment($vcd,$org_code){
$obj= new xajaxResponse();
$subcomponent=$_SESSION['usersubcomponent'];
$sub_name=$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quartersubcomponent'];
$year=($_SESSION['year']!='%'&&$_SESSION['year']!='')?$_SESSION['year']:date('Y');
//$org_code=$_SESSION['managerorg_code'];

//$obj->addAlert($subcomponent);
 /*  for($i=0;$i<count($vcd['id']);$i++){
} */
$data="<form name='valueChainDevelopment' id='valueChainDevelopment' method='post' action='".$PHP_SELF."' >
<table width='100%' border='0'>
 <tr>
    <td colspan='10' class='green_field'>Program Monitoring &raquo; ".$sub_name." ".$_SESSION['year']."</td>
  </tr>
  <tr>
    <td colspan='10'><hr/></td>
  </tr>
  
  
  <tr class='evenrow2'>
    <td scope='col' class='black2' align='right'>No.</tD>
	    <td scope='col' align='left' class='black2'>YEAR</td>
       <td scope='col' align='left' class='black2'>QUARTER</td>
    <td scope='col' align='left' class='black2' colspan='6'>INDICATOR</td>";
   
    $data.="<td scope='col' align='right' class='black2'>TOTAL</td>
  </tr>";
  $n=0; $inc=1;
  for($i=0;$i<count($vcd['id']);$i++){
  $sql="select * from view_organizationreporting where  id='".$vcd['id'][$i]."'  order by indicator_id asc";
#$obj->addAlert($sql);
$query=mysql_query($sql)or die("abi Error code:0100 because,".mysql_error());
   while($row=mysql_fetch_array($query)){ 
   $id=$row['id'];
   $color=$n%2==1?"evenrow":"white";
  
  $data.="<tr class=$color>
				<td>".($n+1)."<input name='id[]' type='hidden'  id='indicator_id".$n."'  value='".$id."' size='5'/></td>
				<td>$row[year]</td>
				<td>$row[reportingPeriod]</td>
				<td width='500' colspan='6'>$row[indicator_name]</td>
             <td align=right><input name='total[]' type='text' id='total".$n."' value='".$row[total]."' size='10' onKeyPress=\"return numbersonly(event, false)\" value=''/></td>
  </tr>";
  $inc++;
  $n++;
  	}
  }
  $data.="<tr class='evenrow2'>
				<td colspan='3'></td>
				<td colspan='6'></td>
				<td align='right'><input type='button' name='Save' id='Save' value='Save' onClick=\"xajax_update_valueChainDevelopment(xajax.getFormValues('valueChainDevelopment'),'".$org_code."')\" /></td>
  </tr>";
$data.="</table></form>";
//$obj->addScriptCall("xajax_view_valueChainDevelopment",$subcomponent);
$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}


function update_valueChainDevelopment($vcd,$org_code){
$obj=new xajaxResponse();
$lp=$vcd['id'];

for($i=0;$i<count($lp);$i++){
$id=$vcd['id'][$i];

$total=$vcd['total'][$i];
if($total!=''){
$query="update tbl_organizationreporting set
		
		total='".$total."' 
		where id='".$id."'";
mysql_query($query)or die("aBi Error code: 00236 because ".mysql_error());
#$obj->addAlert($query);
	}
	else{
	$obj->addAlert("The total value cannot be empty!");}
}
$obj->addAssign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
#$obj->addScriptCall("xajax_view_valueChainDevelopment",$org_code,'','','','');
//$obj->addScriptCall("xajax_view_spsQMS");
return $obj;
}



function edit_lineofcredit($vcd){
$obj=new xajaxResponse();
 // $obj->addAlert($vcd['id']."fffffffffff".$vcd['org_code']);
$data="<form action='".$PHP_SELF."' name='loc' id='loc' method='post'><table width='400' border='0'>
<tr><td class=greenlinks colspan='2'>Programme Monitoring &raquo; Line of Credit $org_code</td></tr>";

for($i=0;$i<count($vcd['id']);$i++){
$loc_id=$vcd['id'][$i];
  //$obj->addAlert($loc_id);
/*loc_id 	org_code 	orgName 	client_name 	dateGranted 	loanValue 	loanPurpose 	loanmaturity 	outsloan 	ducoverage 	days_inarrears 	guarantee_exposure */
  $sel="select * from view_lineofcredit where loc_id = '".$loc_id."%' order by client_name asc";
  $query=mysql_query($sel)or die(mysql_error());
  if(mysql_num_rows($query)>0){
  while($rows=mysql_fetch_array($query)){
/*   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
    <td>".$n++."</td>
	<td><a href='#' onclick=\"xajax_locdetails()\">$row[orgName]</a></td>
    <td>".$rows[client_name]."</td>
    <td>$rows[dateGranted]</td>
    <td>$rows[loanValue]</td>
    <td>$rows[loanPurpose]</td>
    <td>$rows[loanmaturity]</td>
    <td>$rows[outsloan]</td>
    <td>$rows[ducoverage]</td>
    <td>$rows[days_inarrears]</td>
    <td>$rows[guarantee_exposure]</td>
   
  </tr>";*/


 $data.="<tr><td colspan='2'><hr></td></tr><tr><td colspan='2'>
 <div id='status'></div><input name='id[]' type='hidden' id='id' size='35' value='".$rows['loc_id']."'/></td></tr>
		<tr><td width='200'>Financial Institution</td>
                      <td><select name='fis[]' id='fis'>";
					  if($rows['org_code']!='')$data.="<option value='".$rows['org_code']."'>".$rows['orgName']."</option>";
					  $query=mysql_query("select * from tbl_organization order by orgName asc")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					  $data.="<option value='".$row['org_code']."'>".$row['orgName']."</option>";
					  }
					  
					   $data.="
                        </select></td>
                    </tr>
                    <tr>
                      <td>Client  Name:</td>
                      <td><input name='cname[]' type='text' id='cname' size='35' value='".$rows['client_name']."'/></td>
                    </tr>
                    <tr>
                      <td>Date of Disbursement</td>
                      <td><a href='javascript:void(0)' onClick='if(self.gfPop)gfPop.fPopCalendar(document.loc.dategranted);return false;' hidefocus=''>
                      <input name='dategranted[]' type='text'  size='28' value='".$rows['dateGranted']."'  readonly='readonly' />
                      <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='34'></a></td>
                    </tr>
                    <tr>
                      <td>Loan Value</td>
                      <td><input name='loanvalue[]' type='text' id='loanvalue' size='35' value='".$rows['loanValue']."' /></td>
                    </tr>
                    <tr>
                      <td>Loan Purpose</td>
                      <td><input name='loan_purpose[]' type='text' id='loan_purpose' size=35'  value='".$rows['loanPurpose']."'/></td>
                    </tr>
                    <tr>
                      <td>Loan  maturity</td>
                