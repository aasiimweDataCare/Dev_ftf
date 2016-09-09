<?php
session_start();
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');
require_once('filters.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);

#registering functions
#************************
$xajax->register(XAJAX_FUNCTION,'view_Parishes');
$xajax->register(XAJAX_FUNCTION,'new_Parishes');
$xajax->register(XAJAX_FUNCTION,'save_Parishes');
$xajax->register(XAJAX_FUNCTION,'edit_Parishes');
$xajax->register(XAJAX_FUNCTION,'update_Parishes');
$xajax->register(XAJAX_FUNCTION,'delete_Parishes');

#************************************************
require_once('edit.php');
require_once('save.php');
require_once('delete.php');

function view_Parishes($regionalCode,$districtCode,$subCounty){

$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$QueryManager=new QueryManager('');
$inc=1;
$data.="<form  name='Parishes' id='Parishes' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";

$data.="<tr class='evenrow'>";
        $data.="<td colspan='4' align='right'>
                  <input name='new_Parishes' type='button' class='formButton2'value='New Parish' onclick=\"xajax_new_Parishes('".$regionalCode."','".$districtCode."','".$subCounty."');\"> |
                  <a href='export_to_excel_word.php?linkvar=Export Parishes&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
                  <input name='export_Parishes' type='button' class='formButton2'value='Export to Excel'></a> |";
                  
                  $data.="<a href='print_version.php?linkvar=Print Parishes&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
                  <input name='export_Parishes' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
$data.="</tr>";
$data.="<tr class='evenrow'>
            <td>Region</td>
            <td>
            <select name='Region' id='Region' onchange=\"xajax_view_Parishes(this.value,'".$districtCode."','".$subCounty."');return false;\" style='width:300px;'>
                    <option value=''>-select-</option>";
                    $data.=$QueryManager->regionalFilter($regionalCode);
              $data.="</select>
            </td></tr>
            <tr class='evenrow'><td>District:</td>
            <td>";$data.="
            <select name='District' id='District' onchange=\"xajax_view_Parishes('".$regionalCode."',this.value,'".$subCounty."');return false;\" style='width:300px;'>
            <option value=''>-select-</option>";
            $data.=$QueryManager->DistrictFilter($regionalCode,$districtCode);
            $data.="</select>";
            $data.="</td>";
$data.="</tr>";

$data.="<tr class='evenrow'><td>Subcounty:</td>
                          <td><select name='Subcounty' id='Subcounty' onchange=\"xajax_view_Parishes('".$regionalCode."','".$districtCode."',this.value);return false;\" style='width:300px;'>
                          <option value=''>-select-</option>";
                           $data.=$QueryManager->SubcountyFilter($regionalCode,$districtCode,$subCounty);
                            $data.="</select>";
                          $data.="</td></tr>";


//Display Nothing
if($subCounty<>NULL OR $subCounty<>'' OR $subCounty<>0){
        $data.="<tr class='evenrow3'>
            <td colspan='22'>";
            $data.="<table border='0' width='100%' cellspacing='2' cellpadding='2'>
                <tr class='evenrow'>";
                //Find the District name
                
                $st="select  d.*, s.* from `tbl_district` d join `tbl_subcounty`s 
                    on d.`districtCode`=s.`districtCode`
                    WHERE d.`districtCode`='".$districtCode."' AND s.`subcountyCode`='".$subCounty."' AND d.`Display` = 'Yes'";
                        $q=@mysql_query($st);
                        $r=mysql_fetch_array($q);
                if($r<>NULL){
                  $data.="<th colspan='22'><div align='center'>CPM MIS Parishes for ".$r['subcountyName']." Subcounty, ".$r['districtName']." District</div></th>";
                }else{
                 $data.="<th colspan='22'><div align='center'>CPM MIS Parishes</div></th>";   
                }
                  $data.="</tr>";
                  //===================data to be displayed=====================
                    
                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_Parishes(xajax.getFormValues('Parishes'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('Parishes'),'Delete_Parishes');return false;\" align='left'></td>
                        </td>
                    </tr>";
                    
                  $data.="<tr class='evenrow'>
                  <th >#</th>
                  <th >Parish Name</th>";
                  $data.="<th>Action</th>
                  </tr>";
                  $stmnt_Parishes="SELECT p.* FROM `tbl_parish` p
                                        WHERE p.`districtCode`='".$districtCode."'
                                        AND p.`SubcountyCode`='".$subCounty."'
                                        AND p.`Display` = 'Yes'
                                        ORDER BY p.`ParishName` ASC";
                                        
                                        //$object->alert($stmnt_Parishes);
                                   $QParishes= @mysql_query($stmnt_Parishes);
                           $count=1; 
                            while($rowParishes=mysql_fetch_array($QParishes)){
                                $color=$inc%2==1?"white1":"evenrow";
                 $data.="
                            <tr class='".$color."'>
                            
                            <td>".$count.".<input type='checkbox'  name='ParishCode[]' id='ParishCode".$count."' value='".$rowParishes['ParishCode']."'/>
                            <input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/>
                            <input type='hidden'  name='districtCode[]' id='districtCode".$count."' value='".$rowParishes['districtCode']."' />
                            <input type='hidden'  name='SubcountyCode[]' id='SubcountyCode".$count."' value='".$rowParishes['SubcountyCode']."' /></td>
                            <td >".$rowParishes['ParishName']."</td>";
                            $data.="<td><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_Parishes(xajax.getFormValues('Parishes'));return false;\" value='edit' /></td>
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
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_Parishes(xajax.getFormValues('Parishes'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('Parishes'),'Delete_Parishes');return false;\" align='left'></td>
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
                       <strong>Please Filter out values to EDIT or ADD<strong>
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
function  new_Parishes($regionalCode,$districtCode,$subCounty){

$obj=new xajaxResponse();

$QueryManager=new QueryManager('');
if($districtCode=='' OR $districtCode==NULL OR $districtCode==0) {
    $obj->alert('Please first filter out a Region followed 
by District then Subcounty before you can add a new Parish.');
    return $obj;
}
$data="<form  name='Parishes' id='Parishes' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400'>";
            
                $data.="<tr>";
                //Find the District name
                
                
                $st="select  d.*, s.* from `tbl_district` d join `tbl_subcounty`s 
                    on d.`districtCode`=s.`districtCode`
                    WHERE d.`districtCode`='".$districtCode."' AND s.`subcountyCode`='".$subCounty."' AND d.`Display` = 'Yes'";
                        $q=@mysql_query($st);
                        $r=mysql_fetch_array($q);
                if($r<>NULL){
                  $data.="<th colspan='22'><div align='center'>CPM MIS NEW Parish for ".$r['subcountyName']." Subcounty, ".$r['districtName']." District</div></th>";
                }
                  $data.="</tr>";
                
                
                    $data.="<td><strong>New Parish name:</strong><br /></td>";
                        $st="SELECT MAX(p.`ParishCode`) as lastParishCode
                            FROM `tbl_parish` p
                            WHERE  p.`Display` = 'Yes'";
                            //$object->alert($st);
                        $q=@mysql_query($st);
                        $r=mysql_fetch_array($q);
                        $code=($r['lastParishCode']+1);
                    $data.="<input type='hidden' value='".$districtCode."' name='districtCode' id='classCode'/>";
                    $data.="<input type='hidden' value='".$code."' name='ParishCode' id='ParishCode'/>"; 
                    $data.="<input type='hidden' value='".$subCounty."' name='SubcountyCode' id='SubcountyCode'/>"; 
                      $data.="<td><input type='text' name='ParishName' id='ParishName'/>
                    </td>
                </tr>
                
                
                </tr>
                    <td><strong>Display:</strong><br /></td>
                      <td><select name='Display' id='Display' />
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
                  <td><input value='Save' name='saveParishes' onclick=\"xajax_save_Parishes(xajax.getFormValues('Parishes'));\" type='button'></td>
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
//Save Parishes
function save_Parishes($formvalues){
$obj=new xajaxResponse();
$n=1;
$v=40;
$var="00";
$districtCode=$formvalues['districtCode'];
$SubcountyCode=$formvalues['SubcountyCode'];
$ParishCode=$formvalues['ParishCode'];
$ParishName=$formvalues['ParishName'];
$Display=$formvalues['Display'];
$user=$_SESSION['username'];
if($ParishCode==$n){
$ParishCode=($SubcountyCode.$var.$n);    
}

$stmnt_Parishes="INSERT INTO `tbl_parish`(`districtCode`, `SubcountyCode`,  `ParishCode`, `ParishName`, `Display`, `updatedby`)
VALUES ('".$districtCode."','".$SubcountyCode."','".$ParishCode."','".$ParishName."','".$Display."','".$user."')";

@mysql_query($stmnt_Parishes)  or die(http(284)); 

 $obj->assign('bodyDisplay','innerHTML',congMsg("Parish has been added successfully!"));
 $obj->call('xajax_view_Parishes','','','');
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
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading CPM Parishes Set-up Module...</span></div>
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
						case"Parishes":
						?>
						xajax_view_Parishes('','','','','','','');
					
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

