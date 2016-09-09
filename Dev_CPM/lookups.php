<?php
session_start();
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');
require_once('filters.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);

#registering functions
#************************
$xajax->register(XAJAX_FUNCTION,'view_labourSavingTechLookup');
$xajax->register(XAJAX_FUNCTION,'new_labourSavingTechLookup');
$xajax->register(XAJAX_FUNCTION,'save_labourSavingTechLookup');
$xajax->register(XAJAX_FUNCTION,'edit_labourSavingTechLookup');
$xajax->register(XAJAX_FUNCTION,'update_labourSavingTechLookup');
$xajax->register(XAJAX_FUNCTION,'delete_labourSavingTechLookup');

$xajax->register(XAJAX_FUNCTION,'view_actorsServedLookup');
$xajax->register(XAJAX_FUNCTION,'new_actorsServedLookup');
$xajax->register(XAJAX_FUNCTION,'save_actorsServedLookup');
$xajax->register(XAJAX_FUNCTION,'edit_actorsServedLookup');
$xajax->register(XAJAX_FUNCTION,'update_actorsServedLookup');
$xajax->register(XAJAX_FUNCTION,'delete_actorsServedLookup');

$xajax->register(XAJAX_FUNCTION,'view_cropTreatmentsLookup');
$xajax->register(XAJAX_FUNCTION,'new_cropTreatmentsLookup');
$xajax->register(XAJAX_FUNCTION,'save_cropTreatmentsLookup');
$xajax->register(XAJAX_FUNCTION,'edit_cropTreatmentsLookup');
$xajax->register(XAJAX_FUNCTION,'update_cropTreatmentsLookup');
$xajax->register(XAJAX_FUNCTION,'delete_cropTreatmentsLookup');


$xajax->register(XAJAX_FUNCTION,'view_cropVarieties');
$xajax->register(XAJAX_FUNCTION,'new_cropVarieties');
$xajax->register(XAJAX_FUNCTION,'save_cropVarieties');
$xajax->register(XAJAX_FUNCTION,'edit_cropVarieties');
$xajax->register(XAJAX_FUNCTION,'update_cropVarieties');
$xajax->register(XAJAX_FUNCTION,'delete_cropVarieties');


$xajax->register(XAJAX_FUNCTION,'view_traderModelsLookup');
$xajax->register(XAJAX_FUNCTION,'new_traderModelsLookup');
$xajax->register(XAJAX_FUNCTION,'save_traderModelsLookup');
$xajax->register(XAJAX_FUNCTION,'edit_traderModelsLookup');
$xajax->register(XAJAX_FUNCTION,'update_traderModelsLookup');
$xajax->register(XAJAX_FUNCTION,'delete_traderModelsLookup');


$xajax->register(XAJAX_FUNCTION,'view_enterpriseTechnologiesLookup');
$xajax->register(XAJAX_FUNCTION,'new_enterpriseTechnologiesLookup');
$xajax->register(XAJAX_FUNCTION,'save_enterpriseTechnologiesLookup');
$xajax->register(XAJAX_FUNCTION,'edit_enterpriseTechnologiesLookup');
$xajax->register(XAJAX_FUNCTION,'update_enterpriseTechnologiesLookup');
$xajax->register(XAJAX_FUNCTION,'delete_enterpriseTechnologiesLookup');





#************************************************
require_once('edit.php');
require_once('save.php');
require_once('delete.php');




function view_cropVarieties($Crop,$cropVariety){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$QueryManager=new QueryManager('');
//$object->alert('Hello Apollo');

$inc=1;
$data.="<form  name='cropVarieties' id='cropVarieties' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="<tr class='evenrow'>";
        $data.="<td colspan='' align='right'>
                  <input name='new_cropCode' type='button' class='formButton2'value='New Crop Variety' onclick=\"xajax_new_cropVarieties('".$Crop."','".$cropVariety."');\"> |
                  <a href='export_to_excel_word.php?linkvar=Export Crop Variety&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
                  <input name='export_cropVarieties' type='button' class='formButton2'value='Export to Excel'></a> |";
                  
                  $data.="<a href='print_version.php?linkvar=Print Crop Variety&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
                  <input name='export_cropVarieties' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
$data.="</tr>";
        $data.="<tr class='evenrow3'>
            <td colspan='22'>";
            $data.="<table border='0' width='100%' cellspacing='2' cellpadding='2'>";
            
            //Filter crops
                    $data.="<tr class='evenrow'>
                                <td>Crop Name:</td>
                                <td>
                                <select name='cropCode' id='cropCode' onchange=\"xajax_view_cropVarieties(this.value,'".$cropVariety."');return false;\" style='width:300px;'>
                                        <option value=''>-select-</option>";
                                        $data.=$QueryManager->filterCrop($Crop);
                                  $data.="</select>
                                </td>";
                    $data.="</tr>";
            
            
                //Display Nothing
                if($Crop<>NULL OR $Crop<>'' OR $Crop<>0){
                        $data.="<tr class='evenrow3'>
                            <td colspan='22'>";
                            $data.="<table border='0' width='100%' cellspacing='2' cellpadding='2'>
                                <tr class='evenrow'>";
                                //Find the Region name
                                
                                $st="SELECT c . * FROM `tbl_cropvarieties` c WHERE c.`cropCode`='".$Crop."'";
                                        $q=@mysql_query($st);
                                        $r=mysql_fetch_array($q);
                                if($r<>NULL){
                                  $data.="<th colspan='22'><div align='center'>Crop varieties for  ".$r['cropCode']." </div></th>";
                                } 
                                
                                  $data.="</tr>";
                  //===================data to be displayed=====================

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_cropVarieties(xajax.getFormValues('cropVarieties'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('cropVarieties'),'Delete_cropVarieties');return false;\" align='left'></td>
                        </td>
                    </tr>";
                  
                  $data.="
                  <tr class=''>
                    <th >#</th>
                    <th >VARIETY</th>
                    <th >ACTION</th>
                  </tr>
                  ";
                  $stmnt_cropVarieties="select v . * from `tbl_cropvarieties` v where `cropCode`='".$Crop."'";
                                   $QcropVarieties= @mysql_query($stmnt_cropVarieties);
                           $count=1; 
                            while($rowcropVarieties=mysql_fetch_array($QcropVarieties)){
                                $color=$inc%2==1?"evenrow3":"evenrow";
                 $data.="
                            <tr class='".$color."'>
                            
                            <td>".$count.".<input type='checkbox'  name='pk_cropVarietiesId[]' id='pk_cropVarietiesId".$count."' value='".$rowcropVarieties['pk_cropVarietiesId']."' />
                            <input type='hidden'  name='cropCode[]' id='cropCode".$count."' value='".$rowcropVarieties['cropCode']."' />
                            <input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/>
                            </td>
                            <td >".$rowcropVarieties['cropVariety']."</td>";
                            $data.="<td><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_cropVarieties(xajax.getFormValues('cropVarieties'));return false;\" value='edit' /></td>
                            </tr>
                 ";
                 $count++;
                 $inc++;
                                     }
                                     
                        //===================End of data to be displayed=====================
                        

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_cropVarieties(xajax.getFormValues('cropVarieties'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('cropVarieties'),'Delete_cropVarieties');return false;\" align='left'></td>
                        </td>
                    </tr>";                     
                                     
                
              $data.="</table>";
    $data.="</td>
        </tr>";
        
        }//End of Display Nothing
        else{
            
            
    $data.="<tr class='white1'><td COLSPAN='11' ALIGN='center' >";
            $data.="<table>
                        <tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='center'>
                       <strong>Please Filter out a CROP to Edit or Add a  CROP VARIETY<strong>
                        </td>
                    </tr>
                    </table>";
    $data.="</td></tr>";  
            
        }  
  
$data.="</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function  new_cropVarieties($Crop,$cropVariety){
//cropVarieties    
$obj=new xajaxResponse();

//$object->alert($Crop);
$QueryManager=new QueryManager('');


if($Crop=='') {
    $obj->alert('Please first filter out a crop before you can add a new Variety.');
    return $obj;
}


$data="<form  name='cropVarieties' id='cropVarieties' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400'>";
            
                $data.="<tr>";
                //Find the Region name
                
                $st="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' AND  l.`codeName`='".$Crop."' ORDER BY  l.`code`";
                //$object->alert($st);
                        $q=@mysql_query($st);
                        $r=mysql_fetch_array($q);
                if($r<>NULL){
                  $data.="<th colspan='22'><div align='center'>CPM MIS  Crop Varieties for  ".$r['codeName']."  </div></th>";
                }
                  $data.="</tr>";
                
                
                    $data.="<td><strong>New Crop variety name:</strong><br /></td>";
                    $data.="<input type='hidden' value='".$r['codeName']."' name='cropCode' id='cropCode'/>";
                      $data.="<td><input type='text' name='pk_cropVariety' id='pk_cropVariety'/>
                    </td>
                </tr>
                
                
                
              
                <tr>
                  <td>&nbsp;</td>
                  <td><input value='Save' name='savecropVarieties' onclick=\"xajax_save_cropVarieties(xajax.getFormValues('cropVarieties'));\" type='button'></td>
                </tr>
              </table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
//Save cropVarieties
function save_cropVarieties($formvalues){
$obj=new xajaxResponse();

$cropCode=$formvalues['cropCode'];
$cropVariety=$formvalues['pk_cropVariety'];
$thisYear=date('Y');
$user=$_SESSION['username'];

$stmnt_cropVarieties="INSERT INTO `tbl_cropvarieties`(`year`, `cropCode`, `cropVariety`, `updatedby`)
VALUES ('".$thisYear."','".$cropCode."','".$cropVariety."','".$user."')";
// $obj->alert($stmnt_cropVarieties);                                           
//@mysql_query($stmnt_cropVarieties)    or die("cropVarieties setup Error-code 344 because ".mysql_error());
@mysql_query($stmnt_cropVarieties)  or die(http(263)); 

 $obj->assign('bodyDisplay','innerHTML',congMsg("Crop variety has been added successfully!"));
 $obj->call('xajax_view_cropVarieties','','','');
return $obj;
}
//start of traderModels
function view_traderModelsLookup($classCode,$code,$status,$year){
    
    
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$inc=1;
$data.="<form  name='traderModelsLookup' id='traderModelsLookup' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="<tr class='evenrow'>";
        $data.="<td colspan='' align='right'>
                  <input name='new_traderModelsLookup' type='button' class='formButton2'value='New Trader Model' onclick=\"xajax_new_traderModelsLookup('','','','','','','');\"> |
                  <a href='export_to_excel_word.php?linkvar=Export Trader Model&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
                  <input name='export_traderModelsLookup' type='button' class='formButton2'value='Export to Excel'></a> |";
                  
                  $data.="<a href='print_version.php?linkvar=Print Trader Model&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
                  <input name='export_traderModelsLookup' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
$data.="</tr>";
        $data.="<tr class='evenrow3'>
            <td colspan='22'>";
            $data.="<table border='0' width='100%' cellspacing='2' cellpadding='2'>
                <tr class='evenrow'>
                  <th colspan='22'><div align='center'>Trader Models</div></th>
                  </tr>";
                  //===================data to be displayed=====================

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_traderModelsLookup(xajax.getFormValues('traderModelsLookup'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('traderModelsLookup'),'Delete_traderModelsLookup');return false;\" align='left'></td>
                        </td>
                    </tr>";
                    
                  $data.="<tr class='evenrow'>
                  <th >#</th>
                  <th >Name</th>
                  <th >Description</th>";
                  //$data.="<th >Notes</th>";
                  $data.="<th>Action</th>
                  </tr>";
                  $stmnt_traderModelsLookup="SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='38' AND l.`status` = 'Yes' ORDER BY l.`code` DESC";
                                   $QtraderModelsLookup= @mysql_query($stmnt_traderModelsLookup);
                           $count=1; 
                            while($rowtraderModelsLookup=mysql_fetch_array($QtraderModelsLookup)){
                                $color=$inc%2==1?"evenrow3":"evenrow";
                 $data.="
                            <tr class='".$color."'>
                            
                            <td>".$count.".<input type='checkbox'  name='code[]' id='code".$count."' value='".$rowtraderModelsLookup['code']."' />
                            <input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/>
                            </td>
                            <td >".$rowtraderModelsLookup['codeName']."</td>
                            <td >".$rowtraderModelsLookup['classDescription']."</td>";
                            //$data.="<td >".$rowtraderModelsLookup['notes']."</td>";
                            $data.="<td><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_traderModelsLookup(xajax.getFormValues('traderModelsLookup'));return false;\" value='edit' /></td>
                            </tr>
                 ";
                 $count++;
                 $inc++;
                                     }
                                     
                        //===================End of data to be displayed=====================
                        

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_traderModelsLookup(xajax.getFormValues('traderModelsLookup'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('traderModelsLookup'),'Delete_traderModelsLookup');return false;\" align='left'></td>
                        </td>
                    </tr>";                     
                                     
                
              $data.="</table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function  new_traderModelsLookup($classCode,$code,$status,$year){

$obj=new xajaxResponse();

$QueryManager=new QueryManager('');
    
$data="<form  name='traderModelsLookup' id='traderModelsLookup' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400'>
                <tr>
                  <th colspan='2' scope='col'>NEW Trader Model DETAILS</th>
                </tr>
                    <td><strong>Name of Model:</strong><br /></td>";
                        $st="SELECT  MAX(l.`code`) as codeId FROM `tbl_lookup` l WHERE l.`classCode`='38' AND l.`status` = 'Yes' ORDER BY l.`codeName` DESC";
                        $q=@mysql_query($st);
                        $r=mysql_fetch_array($q);
                        $code=($r['codeId']+1);
                    $data.="<input type='hidden' value=38 name='classCode' id='classCode'/>";
                    $data.="<input type='hidden' value='".$code."' name='code' id='code'/>"; 
                      $data.="<td><input type='text' name='codeName' id='codeName'/>
                    </td>
                </tr>
                
                </tr>
                    <td><strong>Description:</strong><br /></td>
                      <td><textarea name='classDescription' id='classDescription' rows='5' cols='30'/></textarea>
                    </td>
                </tr>
                </tr>
                    <td><strong>Display:</strong><br /></td>
                      <td><select name='status' id='status' />
                      <option value=''>-select-</option>";
                       $var=array('Yes','No');
                                        
                                        foreach ($var as $s) {
                                            $default='Yes';
                                            $selected=($default==$s)?"selected":"";
                                            $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                            $q++;
                                        } 
                      
                      $data.="</select>
                    </td>
                </tr>
                
                
              
                <tr>
                  <td>&nbsp;</td>
                  <td><input value='Save' name='savetraderModels' onclick=\"xajax_save_traderModelsLookup(xajax.getFormValues('traderModelsLookup'));\" type='button'></td>
                </tr>
              </table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
//Save traderModelsLookup
function save_traderModelsLookup($formvalues){
$obj=new xajaxResponse();

$classCode=$formvalues['classCode'];
$classDescription=$formvalues['classDescription'];
$code=$formvalues['code'];
$codeName=$formvalues['codeName'];
$notes=$classDescription;
$status=$formvalues['status'];
$thisYear=date('Y');
$user=$_SESSION['username'];

$stmnt_traderModelsLookup="INSERT INTO `tbl_lookup`(`classCode`, `classDescription`, `code`, `codeName`, `notes`, `status`, `year`, `updatedby`)
VALUES ('".$classCode."','".$classDescription."','".$code."','".$codeName."','".$notes."','".$status."','".$thisYear."','".$user."')";
 //$object->alert($stmnt_traderModelsLookup);                                           
//@mysql_query($stmnt_traderModelsLookup)    or die("traderModelsLookup setup Error-code 344 because ".mysql_error());
@mysql_query($stmnt_traderModelsLookup)  or die(QueryManager::http("traderModelsLookup setup Error-code 344 because ".mysql_error())); 

 $obj->assign('bodyDisplay','innerHTML',congMsg("Trader Model has been added successfully!"));
 $obj->call('xajax_view_traderModelsLookup','','','');
return $obj;
}
//end of traderModels
//start of enterpriseTechnologies
function view_enterpriseTechnologiesLookup($classCode,$code,$status,$year){
    
    
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$inc=1;
$data.="<form  name='enterpriseTechnologiesLookup' id='enterpriseTechnologiesLookup' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="<tr class='evenrow'>";
        $data.="<td colspan='' align='right'>
                  <input name='new_enterpriseTechnologiesLookup' type='button' class='formButton2'value='New EnterpriseTechnology' onclick=\"xajax_new_enterpriseTechnologiesLookup('','','','','','','');\"> |
                  <a href='export_to_excel_word.php?linkvar=Export EnterpriseTechnology&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
                  <input name='export_enterpriseTechnologiesLookup' type='button' class='formButton2'value='Export to Excel'></a> |";
                  
                  $data.="<a href='print_version.php?linkvar=Print EnterpriseTechnology&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
                  <input name='export_enterpriseTechnologiesLookup' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
$data.="</tr>";
        $data.="<tr class='evenrow3'>
            <td colspan='22'>";
            $data.="<table border='0' width='100%' cellspacing='2' cellpadding='2'>
                <tr class='evenrow'>
                  <th colspan='22'><div align='center'>Enterprise Technology</div></th>
                  </tr>";
                  //===================data to be displayed=====================

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_enterpriseTechnologiesLookup(xajax.getFormValues('enterpriseTechnologiesLookup'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('enterpriseTechnologiesLookup'),'Delete_enterpriseTechnologiesLookup');return false;\" align='left'></td>
                        </td>
                    </tr>";
                    
                  $data.="<tr class='evenrow'>
                  <th >#</th>
                  <th >Name</th>
                  <th >Description</th>";
                  //$data.="<th >Notes</th>";
                  $data.="<th>Action</th>
                  </tr>";
                  $stmnt_enterpriseTechnologiesLookup="SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='37' AND l.`status` = 'Yes' ORDER BY l.`code` DESC";
                                   $QenterpriseTechnologiesLookup= @mysql_query($stmnt_enterpriseTechnologiesLookup);
                           $count=1; 
                            while($rowenterpriseTechnologiesLookup=mysql_fetch_array($QenterpriseTechnologiesLookup)){
                                $color=$inc%2==1?"evenrow3":"evenrow";
                 $data.="
                            <tr class='".$color."'>
                            
                            <td>".$count.".<input type='checkbox'  name='code[]' id='code".$count."' value='".$rowenterpriseTechnologiesLookup['code']."' />
                            <input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/>
                            </td>
                            <td >".$rowenterpriseTechnologiesLookup['codeName']."</td>
                            <td >".$rowenterpriseTechnologiesLookup['classDescription']."</td>";
                            //$data.="<td >".$rowenterpriseTechnologiesLookup['notes']."</td>";
                            $data.="<td><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_enterpriseTechnologiesLookup(xajax.getFormValues('enterpriseTechnologiesLookup'));return false;\" value='edit' /></td>
                            </tr>
                 ";
                 $count++;
                 $inc++;
                                     }
                                     
                        //===================End of data to be displayed=====================
                        

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_enterpriseTechnologiesLookup(xajax.getFormValues('enterpriseTechnologiesLookup'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('enterpriseTechnologiesLookup'),'Delete_enterpriseTechnologiesLookup');return false;\" align='left'></td>
                        </td>
                    </tr>";                     
                                     
                
              $data.="</table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function  new_enterpriseTechnologiesLookup($classCode,$code,$status,$year){

$obj=new xajaxResponse();

$QueryManager=new QueryManager('');
    
$data="<form  name='enterpriseTechnologiesLookup' id='enterpriseTechnologiesLookup' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400'>
                <tr>
                  <th colspan='2' scope='col'>NEW Enterprise Technology DETAILS</th>
                </tr>
                    <td><strong>Name of Technology:</strong><br /></td>";
                        $st="SELECT  MAX(l.`code`) as codeId FROM `tbl_lookup` l WHERE l.`classCode`='37' AND l.`status` = 'Yes' ORDER BY l.`codeName` DESC";
                        $q=@mysql_query($st);
                        $r=mysql_fetch_array($q);
                        $code=($r['codeId']+1);
                    $data.="<input type='hidden' value=37 name='classCode' id='classCode'/>";
                    $data.="<input type='hidden' value='".$code."' name='code' id='code'/>"; 
                      $data.="<td><input type='text' name='codeName' id='codeName'/>
                    </td>
                </tr>
                
                </tr>
                    <td><strong>Description:</strong><br /></td>
                      <td><textarea name='classDescription' id='classDescription' rows='5' cols='30'/></textarea>
                    </td>
                </tr>
                </tr>
                    <td><strong>Display:</strong><br /></td>
                      <td><select name='status' id='status' />
                      <option value=''>-select-</option>";
                       $var=array('Yes','No');
                                        
                                        foreach ($var as $s) {
                                            $default='Yes';
                                            $selected=($default==$s)?"selected":"";
                                            $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                            $q++;
                                        } 
                      
                      $data.="</select>
                    </td>
                </tr>
                
                
              
                <tr>
                  <td>&nbsp;</td>
                  <td><input value='Save' name='saveenterpriseTechnologies' onclick=\"xajax_save_enterpriseTechnologiesLookup(xajax.getFormValues('enterpriseTechnologiesLookup'));\" type='button'></td>
                </tr>
              </table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
//Save enterpriseTechnologiesLookup
function save_enterpriseTechnologiesLookup($formvalues){
$obj=new xajaxResponse();

$classCode=$formvalues['classCode'];
$classDescription=$formvalues['classDescription'];
$code=$formvalues['code'];
$codeName=$formvalues['codeName'];
$notes=$classDescription;
$status=$formvalues['status'];
$thisYear=date('Y');
$user=$_SESSION['username'];

$stmnt_enterpriseTechnologiesLookup="INSERT INTO `tbl_lookup`(`classCode`, `classDescription`, `code`, `codeName`, `notes`, `status`, `year`, `updatedby`)
VALUES ('".$classCode."','".$classDescription."','".$code."','".$codeName."','".$notes."','".$status."','".$thisYear."','".$user."')";
 //$object->alert($stmnt_enterpriseTechnologiesLookup);                                           
//@mysql_query($stmnt_enterpriseTechnologiesLookup)    or die("enterpriseTechnologiesLookup setup Error-code 344 because ".mysql_error());
@mysql_query($stmnt_enterpriseTechnologiesLookup)  or die(QueryManager::http("enterpriseTechnologiesLookup setup Error-code 344 because ".mysql_error())); 

 $obj->assign('bodyDisplay','innerHTML',congMsg("EnterpriseTechnology has been added successfully!"));
 $obj->call('xajax_view_enterpriseTechnologiesLookup','','','');
return $obj;
}
//end of enterpriseTechnologies
//--------------------------start labourSavingTechLookup----------------------------------
function view_labourSavingTechLookup($classCode,$code,$status,$year){
    
    
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$inc=1;
$data.="<form  name='labourSavingTechLookup' id='labourSavingTechLookup' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="<tr class='evenrow'>";
        $data.="<td colspan='' align='right'>
                  <input name='new_labourSavingTechLookup' type='button' class='formButton2'value='New Labour Saving Technology' onclick=\"xajax_new_labourSavingTechLookup('','','','','','','');\"> |
                  <a href='export_to_excel_word.php?linkvar=Export Labour Saving Technology&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
                  <input name='export_labourSavingTechLookup' type='button' class='formButton2'value='Export to Excel'></a> |";
                  
                  $data.="<a href='print_version.php?linkvar=Print Labour Saving Technology&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
                  <input name='export_labourSavingTechLookup' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
$data.="</tr>";
        $data.="<tr class='evenrow3'>
            <td colspan='22'>";
            $data.="<table border='0' width='100%' cellspacing='2' cellpadding='2'>
                <tr class='evenrow'>
                  <th colspan='22'><div align='center'>Labour Saving Technologies</div></th>
                  </tr>";
                  //===================data to be displayed=====================

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_labourSavingTechLookup(xajax.getFormValues('labourSavingTechLookup'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('labourSavingTechLookup'),'Delete_labourSavingTechLookup');return false;\" align='left'></td>
                        </td>
                    </tr>";
                    
                  $data.="<tr class='evenrow'>
                  <th >#</th>
                  <th >Name</th>
                  <th >Description</th>";
                  //$data.="<th >Notes</th>";
                  $data.="<th>Action</th>
                  </tr>";
                  $stmnt_labourSavingTechLookup="SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='30' AND l.`status` = 'Yes' ORDER BY l.`code` DESC";
                                   $QlabourSavingTechLookup= @mysql_query($stmnt_labourSavingTechLookup);
                           $count=1; 
                            while($rowlabourSavingTechLookup=mysql_fetch_array($QlabourSavingTechLookup)){
                                $color=$inc%2==1?"evenrow3":"evenrow";
                 $data.="
                            <tr class='".$color."'>
                            
                            <td>".$count.".<input type='checkbox'  name='code[]' id='code".$count."' value='".$rowlabourSavingTechLookup['code']."' />
                            <input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/>
                            </td>
                            <td >".$rowlabourSavingTechLookup['codeName']."</td>
                            <td >".$rowlabourSavingTechLookup['classDescription']."</td>";
                            //$data.="<td >".$rowlabourSavingTechLookup['notes']."</td>";
                            $data.="<td><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_labourSavingTechLookup(xajax.getFormValues('labourSavingTechLookup'));return false;\" value='edit' /></td>
                            </tr>
                 ";
                 $count++;
                 $inc++;
                                     }
                                     
                        //===================End of data to be displayed=====================
                        

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_labourSavingTechLookup(xajax.getFormValues('labourSavingTechLookup'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('labourSavingTechLookup'),'Delete_labourSavingTechLookup');return false;\" align='left'></td>
                        </td>
                    </tr>";                     
                                     
                
              $data.="</table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function  new_labourSavingTechLookup($classCode,$code,$status,$year){

$obj=new xajaxResponse();

$QueryManager=new QueryManager('');
    
$data="<form  name='labourSavingTechLookup' id='labourSavingTechLookup' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400'>
                <tr>
                  <th colspan='2' scope='col'>NEW LABOUR SAVING TECHNOLOGY DETAILS</th>
                </tr>
                    <td><strong>Name of Technology:</strong><br /></td>";
                        $st="SELECT  MAX(l.`code`) as codeId FROM `tbl_lookup` l WHERE l.`classCode`='30' AND l.`status` = 'Yes' ORDER BY l.`codeName` DESC";
                        $q=@mysql_query($st);
                        $r=mysql_fetch_array($q);
                        $code=($r['codeId']+1);
                    $data.="<input type='hidden' value=30 name='classCode' id='classCode'/>";
                    $data.="<input type='hidden' value='".$code."' name='code' id='code'/>"; 
                      $data.="<td><input type='text' name='codeName' id='codeName'/>
                    </td>
                </tr>
                
                </tr>
                    <td><strong>Description:</strong><br /></td>
                      <td><textarea name='classDescription' id='classDescription' rows='5' cols='30'/></textarea>
                    </td>
                </tr>
                </tr>
                    <td><strong>Display:</strong><br /></td>
                      <td><select name='status' id='status' />
                      <option value=''>-select-</option>";
                       $var=array('Yes','No');
                                        
                                        foreach ($var as $s) {
                                            $default='Yes';
                                            $selected=($default==$s)?"selected":"";
                                            $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                            $q++;
                                        } 
                      
                      $data.="</select>
                    </td>
                </tr>
                
                
              
                <tr>
                  <td>&nbsp;</td>
                  <td><input value='Save' name='saveLabourSavingTech' onclick=\"xajax_save_labourSavingTechLookup(xajax.getFormValues('labourSavingTechLookup'));\" type='button'></td>
                </tr>
              </table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
//Save labourSavingTechLookup
function save_labourSavingTechLookup($formvalues){
$obj=new xajaxResponse();

$classCode=$formvalues['classCode'];
$classDescription=$formvalues['classDescription'];
$code=$formvalues['code'];
$codeName=$formvalues['codeName'];
$notes=$classDescription;
$status=$formvalues['status'];
$thisYear=date('Y');
$user=$_SESSION['username'];

$stmnt_labourSavingTechLookup="INSERT INTO `tbl_lookup`(`classCode`, `classDescription`, `code`, `codeName`, `notes`, `status`, `year`, `updatedby`)
VALUES ('".$classCode."','".$classDescription."','".$code."','".$codeName."','".$notes."','".$status."','".$thisYear."','".$user."')";
 //$object->alert($stmnt_labourSavingTechLookup);                                           
//@mysql_query($stmnt_labourSavingTechLookup)    or die("labourSavingTechLookup setup Error-code 344 because ".mysql_error());
@mysql_query($stmnt_labourSavingTechLookup)  or die(http(842)); 

 $obj->assign('bodyDisplay','innerHTML',congMsg("Labour saving Technology has been added successfully!"));
 $obj->call('xajax_view_labourSavingTechLookup','','','');
return $obj;
}
//start bds
function view_actorsServedLookup($classCode,$code,$status,$year){
    
    
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$inc=1;
$data.="<form  name='actorsServedLookup' id='actorsServedLookup' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="<tr class='evenrow'>";
        $data.="<td colspan='' align='right'>
                  <input name='new_actorsServedLookup' type='button' class='formButton2'value='New BDS actors served' onclick=\"xajax_new_actorsServedLookup('','','','','','','');\"> |
                  <a href='export_to_excel_word.php?linkvar=Export BDS actors served&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
                  <input name='export_actorsServedLookup' type='button' class='formButton2'value='Export to Excel'></a> |";
                  
                  $data.="<a href='print_version.php?linkvar=Print BDS actors served&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
                  <input name='export_actorsServedLookup' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
$data.="</tr>";
        $data.="<tr class='evenrow3'>
            <td colspan='22'>";
            $data.="<table border='0' width='100%' cellspacing='2' cellpadding='2'>
                <tr class='evenrow'>
                  <th colspan='22'><div align='center'>BDS actors served</div></th>
                  </tr>";
                  //===================data to be displayed=====================

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_actorsServedLookup(xajax.getFormValues('actorsServedLookup'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('actorsServedLookup'),'Delete_actorsServedLookup');return false;\" align='left'></td>
                        </td>
                    </tr>";
                    
                  $data.="<tr class='evenrow'>
                  <th >#</th>
                  <th >Name</th>
                  <th >Description</th>";
                  //$data.="<th >Notes</th>";
                  $data.="<th>Action</th>
                  </tr>";
                  $stmnt_actorsServedLookup="SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='31' AND l.`status` = 'Yes' ORDER BY l.`code` DESC";
                                   $QactorsServedLookup= @mysql_query($stmnt_actorsServedLookup);
                           $count=1; 
                            while($rowactorsServedLookup=mysql_fetch_array($QactorsServedLookup)){
                                $color=$inc%2==1?"evenrow3":"evenrow";
                 $data.="
                            <tr class='".$color."'>
                            
                            <td>".$count.".<input type='checkbox'  name='code[]' id='code".$count."' value='".$rowactorsServedLookup['code']."' />
                            <input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/>
                            </td>
                            <td >".$rowactorsServedLookup['codeName']."</td>
                            <td >".$rowactorsServedLookup['classDescription']."</td>";
                            //$data.="<td >".$rowactorsServedLookup['notes']."</td>";
                            $data.="<td><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_actorsServedLookup(xajax.getFormValues('actorsServedLookup'));return false;\" value='edit' /></td>
                            </tr>
                 ";
                 $count++;
                 $inc++;
                                     }
                                     
                        //===================End of data to be displayed=====================
                        

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_actorsServedLookup(xajax.getFormValues('actorsServedLookup'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('actorsServedLookup'),'Delete_actorsServedLookup');return false;\" align='left'></td>
                        </td>
                    </tr>";                     
                                     
                
              $data.="</table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function  new_actorsServedLookup($classCode,$code,$status,$year){

$obj=new xajaxResponse();

$QueryManager=new QueryManager('');
    
$data="<form  name='actorsServedLookup' id='actorsServedLookup' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400'>
                <tr>
                  <th colspan='2' scope='col'>NEW BDS actors served DETAILS</th>
                </tr>
                    <td><strong>Name of BDS actors served:</strong><br /></td>";
                        $st="SELECT  MAX(l.`code`) as codeId FROM `tbl_lookup` l WHERE l.`classCode`='31' AND l.`status` = 'Yes' ORDER BY l.`codeName` DESC";
                        $q=@mysql_query($st);
                        $r=mysql_fetch_array($q);
                        $code=($r['codeId']+1);
                    $data.="<input type='hidden' value=31 name='classCode' id='classCode'/>";
                    $data.="<input type='hidden' value='".$code."' name='code' id='code'/>"; 
                      $data.="<td><input type='text' name='codeName' id='codeName'/>
                    </td>
                </tr>
                
                </tr>
                    <td><strong>Description:</strong><br /></td>
                      <td><textarea name='classDescription' id='classDescription' rows='5' cols='30'/></textarea>
                    </td>
                </tr>
                </tr>
                    <td><strong>Display:</strong><br /></td>
                      <td><select name='status' id='status' />
                      <option value=''>-select-</option>";
                       $var=array('Yes','No');
                                        
                                        foreach ($var as $s) {
                                            $default='Yes';
                                            $selected=($default==$s)?"selected":"";
                                            $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                            $q++;
                                        } 
                      
                      $data.="</select>
                    </td>
                </tr>
                
                
              
                <tr>
                  <td>&nbsp;</td>
                  <td><input value='Save' name='saveactorsServedLookup' onclick=\"xajax_save_actorsServedLookup(xajax.getFormValues('actorsServedLookup'));\" type='button'></td>
                </tr>
              </table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
//Save Village Agent
function save_actorsServedLookup($formvalues){
$obj=new xajaxResponse();

$classCode=$formvalues['classCode'];
$classDescription=$formvalues['classDescription'];
$code=$formvalues['code'];
$codeName=$formvalues['codeName'];
$notes=$classDescription;
$status=$formvalues['status'];
$thisYear=date('Y');
$user=$_SESSION['username'];

$stmnt_actorsServedLookup="INSERT INTO `tbl_lookup`(`classCode`, `classDescription`, `code`, `codeName`, `notes`, `status`, `year`, `updatedby`)
VALUES ('".$classCode."','".$classDescription."','".$code."','".$codeName."','".$notes."','".$status."','".$thisYear."','".$user."')";
 //$object->alert($stmnt_actorsServedLookup);                                           
//@mysql_query($stmnt_actorsServedLookup)    or die("actorsServedLookup setup Error-code 344 because ".mysql_error());
@mysql_query($stmnt_actorsServedLookup)  or die(QueryManager::http("actorsServedLookup setup Error-code 344 because ".mysql_error())); 

 $obj->assign('bodyDisplay','innerHTML',congMsg("Labour saving Technology has been added successfully!"));
 $obj->call('xajax_view_actorsServedLookup','','','');
return $obj;
}
//end bds
//----------------------------------------------The crop treatments------------------------------------------------------------------
function view_cropTreatmentsLookup($classCode,$code,$status,$year){
    
    
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$inc=1;
$data.="<form  name='cropTreatmentsLookup' id='cropTreatmentsLookup' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="<tr class='evenrow'>";
        $data.="<td colspan='' align='right'>
                  <input name='new_cropTreatmentsLookup' type='button' class='formButton2'value='New crop treatment' onclick=\"xajax_new_cropTreatmentsLookup('','','','','','','');\"> |
                  <a href='export_to_excel_word.php?linkvar=Export BDS actors served&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
                  <input name='export_cropTreatmentsLookup' type='button' class='formButton2'value='Export to Excel'></a> |";
                  
                  $data.="<a href='print_version.php?linkvar=Print BDS actors served&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
                  <input name='export_cropTreatmentsLookup' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
$data.="</tr>";
        $data.="<tr class='evenrow3'>
            <td colspan='22'>";
            $data.="<table border='0' width='100%' cellspacing='2' cellpadding='2'>
                <tr class='evenrow'>
                  <th colspan='22'><div align='center'>Crop treatments</div></th>
                  </tr>";
                  //===================data to be displayed=====================

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_cropTreatmentsLookup(xajax.getFormValues('cropTreatmentsLookup'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('cropTreatmentsLookup'),'Delete_cropTreatmentsLookup');return false;\" align='left'></td>
                        </td>
                    </tr>";
                    
                  $data.="<tr class='evenrow'>
                  <th >Code</th>
                  <th >Name</th>
                  <th >Description</th>";
                  //$data.="<th >Notes</th>";
                  $data.="<th>Action</th>
                  </tr>";
                  $stmnt_cropTreatmentsLookup="SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='36' AND l.`status` = 'Yes' ORDER BY l.`code` ASC";
                                   $QcropTreatmentsLookup= @mysql_query($stmnt_cropTreatmentsLookup);
                           $count=1; 
                            while($rowcropTreatmentsLookup=mysql_fetch_array($QcropTreatmentsLookup)){
                                $color=$inc%2==1?"evenrow3":"evenrow";
                 $data.="
                            <tr class='".$color."'>
                            
                            <td>".$count.".<input type='checkbox'  name='code[]' id='code".$count."' value='".$rowcropTreatmentsLookup['code']."' />
                            <input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/>
                            </td>
                            <td >".$rowcropTreatmentsLookup['codeName']."</td>
                            <td >".$rowcropTreatmentsLookup['classDescription']."</td>";
                            //$data.="<td >".$rowcropTreatmentsLookup['notes']."</td>";
                            $data.="<td><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_cropTreatmentsLookup(xajax.getFormValues('cropTreatmentsLookup'));return false;\" value='edit' /></td>
                            </tr>
                 ";
                 $count++;
                 $inc++;
                                     }
                                     
                        //===================End of data to be displayed=====================
                        

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_cropTreatmentsLookup(xajax.getFormValues('cropTreatmentsLookup'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('cropTreatmentsLookup'),'Delete_cropTreatmentsLookup');return false;\" align='left'></td>
                        </td>
                    </tr>";                     
                                     
                
              $data.="</table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function  new_cropTreatmentsLookup($classCode,$code,$status,$year){

$obj=new xajaxResponse();

$QueryManager=new QueryManager('');
    
$data="<form  name='cropTreatmentsLookup' id='cropTreatmentsLookup' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400'>
                <tr>
                  <th colspan='2' scope='col'>NEW crop treatment DETAILS</th>
                </tr>
                    <td><strong>Name of crop treatment:</strong><br /></td>";
                        $st="SELECT  MAX(l.`code`) as codeId FROM `tbl_lookup` l WHERE l.`classCode`='36' AND l.`status` = 'Yes' ORDER BY l.`codeName` DESC";
                        $q=@mysql_query($st);
                        $r=mysql_fetch_array($q);
                        $code=($r['codeId']+1);
                    $data.="<input type='hidden' value=36 name='classCode' id='classCode'/>";
                    $data.="<input type='hidden' value='".$code."' name='code' id='code'/>"; 
                      $data.="<td><input type='text' name='codeName' id='codeName'/>
                    </td>
                </tr>
                
                </tr>
                    <td><strong>Description:</strong><br /></td>
                      <td><textarea name='classDescription' id='classDescription' rows='5' cols='30'/></textarea>
                    </td>
                </tr>
                </tr>
                    <td><strong>Display:</strong><br /></td>
                      <td><select name='status' id='status' />
                      <option value=''>-select-</option>";
                       $var=array('Yes','No');
                                        
                                        foreach ($var as $s) {
                                            $default='Yes';
                                            $selected=($default==$s)?"selected":"";
                                            $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                            $q++;
                                        } 
                      
                      $data.="</select>
                    </td>
                </tr>
                
                
              
                <tr>
                  <td>&nbsp;</td>
                  <td><input value='Save' name='savecropTreatmentsLookup' onclick=\"xajax_save_cropTreatmentsLookup(xajax.getFormValues('cropTreatmentsLookup'));\" type='button'></td>
                </tr>
              </table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
//Save Village Agent
function save_cropTreatmentsLookup($formvalues){
$obj=new xajaxResponse();

$classCode=$formvalues['classCode'];
$classDescription=$formvalues['classDescription'];
$code=$formvalues['code'];
$codeName=$formvalues['codeName'];
$notes=$classDescription;
$status=$formvalues['status'];
$thisYear=date('Y');
$user=$_SESSION['username'];

$stmnt_cropTreatmentsLookup="INSERT INTO `tbl_lookup`(`classCode`, `classDescription`, `code`, `codeName`, `notes`, `status`, `year`, `updatedby`)
VALUES ('".$classCode."','".$classDescription."','".$code."','".$codeName."','".$notes."','".$status."','".$thisYear."','".$user."')";
 //$object->alert($stmnt_cropTreatmentsLookup);                                           
//@mysql_query($stmnt_cropTreatmentsLookup)    or die("cropTreatmentsLookup setup Error-code 344 because ".mysql_error());
@mysql_query($stmnt_cropTreatmentsLookup)  or die(http(818)); 

 $obj->assign('bodyDisplay','innerHTML',congMsg("Crop treatment has been added successfully!"));
 $obj->call('xajax_view_cropTreatmentsLookup','','','');
return $obj;
}
//----------------------------------------------------end of the crop treatments---------------------------------------------------------------------------

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
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading CPM System Look-ups...</span></div>
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
						case"Labour Saving Technologies":
						?>
						xajax_view_labourSavingTechLookup('','','','','','','');
						<?php 
						break;
						case"Trader Models":
						?>
						xajax_view_traderModelsLookup('','','','','','','');
						<?php 
						break;
						case"Enterprise Technologies":
						?>
						xajax_view_enterpriseTechnologiesLookup('','','','','','','');			
						<?php 
						break;
						case"BDS actors  served":
						?>
						xajax_view_actorsServedLookup('','','','','','','');


						<?php 
						break;
						case"Crop treatments":
						?>
						xajax_view_cropTreatmentsLookup('','','','','','','');


						<?php 
						break;
						case"Crop varieties":
						?>
						xajax_view_cropVarieties('','','','','','','');
					
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
