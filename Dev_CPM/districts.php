<?php
session_start();
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);



#--------------SET UP EXPORTER------
$xajax->register(XAJAX_FUNCTION,'view_myDistricts');
$xajax->register(XAJAX_FUNCTION,'new_myDistricts');
$xajax->register(XAJAX_FUNCTION,'save_myDistricts');
$xajax->register(XAJAX_FUNCTION,'edit_myDistricts');
$xajax->register(XAJAX_FUNCTION,'update_myDistricts');
$xajax->register(XAJAX_FUNCTION,'delete_myDistricts');

#************************************************
require_once('edit.php');
require_once('save.php');
require_once('delete.php'); 
 
function view_myDistricts($regionalCode,$districtCode){
    
    
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$QueryManager=new QueryManager('');
$inc=1;
$data.="<form  name='myDistricts' id='myDistricts' method='post' action='".$PHP_SELF."' onSubmit=\"validateForm(this.form)\">";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";

$data.="<tr class='evenrow'>";
        $data.="<td colspan='4' align='right'>
                  <input name='new_Districts' type='button' class='formButton2'value='New District' onclick=\"xajax_new_myDistricts('".$regionalCode."','".$districtCode."');\"> |
                  <a href='export_to_excel_word.php?linkvar=Export Districts&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
                  <input name='export_Districts' type='button' class='formButton2'value='Export to Excel'></a> |";
                  
                  $data.="<a href='print_version.php?linkvar=Print Districts&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
                  <input name='export_Districts' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
$data.="</tr>";
$data.="<tr class='evenrow'>
            <td>Region</td>
            <td>
            <select name='Region' id='Region' onchange=\"xajax_view_myDistricts(this.value,'".$districtCode."');return false;\" style='width:300px;'>
                    <option value=''>-select-</option>";
                    $data.=$QueryManager->regionalFilter($regionalCode);
              $data.="</select>
            </td>";
$data.="</tr>";


//Display Nothing
if($regionalCode<>NULL OR $regionalCode<>'' OR $regionalCode<>0){
        $data.="<tr class='evenrow3'>
            <td colspan='22'>";
            $data.="<table border='0' width='100%' cellspacing='2' cellpadding='2'>
                <tr class='evenrow'>";
                //Find the Region name
                
                $st="SELECT  z.* FROM `tbl_zone` z WHERE z.`zoneCode`='".$regionalCode."'";
                        $q=@mysql_query($st);
                        $r=mysql_fetch_array($q);
                if($r<>NULL){
                  $data.="<th colspan='22'><div align='center'>CPM MIS  Districts for  ".$r['zoneName']." Region </div></th>";
                }else{
                 $data.="<th colspan='22'><div align='center'>CPM MIS Districts</div></th>";   
                } 
                
                  $data.="</tr>";
                  //===================data to be displayed=====================
                    
                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_myDistricts(xajax.getFormValues('myDistricts'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('myDistricts'),'Delete_Districts');return false;\" align='left'></td>
                        </td>
                    </tr>";
                    
                  $data.="<tr class='evenrow'>
                  <th >#</th>
                  <th >District Name</th>";
                  $data.="<th>Action</th>
                  </tr>";
                  $stmnt_Districts="SELECT  d.* FROM `tbl_district` d WHERE d.`zone`='".$regionalCode."'
                  AND d.`Display` = 'Yes' order by d.`districtName` ASC";
                                        
                                       // $obj->alert($stmnt_Districts);
                                   $QDistricts= @mysql_query($stmnt_Districts);
                           $count=1; 
                            while($rowDistricts=mysql_fetch_array($QDistricts)){
                                $color=$inc%2==1?"white1":"evenrow";
                 $data.="
                            <tr class='".$color."'>
                            
                            <td>".$count.".<input type='checkbox' name='districtCode[]' id='districtCode".$count."' value='".$rowDistricts['districtCode']."'/>
                            <input type='hidden' name='regionalCode[]' id='regionalCode".$count."' value='".$rowDistricts['zone']."'/>
                            <input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/></td>
                            <td >".$rowDistricts['districtName']."</td>";
                            $data.="<td><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_myDistricts(xajax.getFormValues('myDistricts'));return false;\" value='edit' /></td>
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
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_myDistricts(xajax.getFormValues('myDistricts'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('myDistricts'),'Delete_Districts');return false;\" align='left'></td>
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
                       <strong>Please Filter out a REGION to Edit or Add a  DISTRICT<strong>
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
//New District
function  new_myDistricts($regionalCode,$districtCode){

$obj=new xajaxResponse();

$QueryManager=new QueryManager('');
if($regionalCode=='' OR $regionalCode==NULL OR $regionalCode==0) {
    $obj->alert('Please first filter out a Region  before you can add a new District.');
    return $obj;
}



$data="<form  name='myDistricts' id='myDistricts' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400'>";
            
                $data.="<tr>";
                //Find the Region name
                
                $st1="SELECT  z.* FROM `tbl_zone` z WHERE z.`zoneCode`='".$regionalCode."'";
                //$obj->alert($st1);
                        $q=@mysql_query($st1);
                        $r=mysql_fetch_array($q);
                if($r<>NULL){
                  $data.="<th colspan='22'><div align='center'>CPM MIS  Districts for  ".$r['zoneName']." Region </div></th>";
                }
                  $data.="</tr>";
                
                
                    $data.="<td><strong>New District name:</strong><br /></td>";
                        $st="SELECT MAX(d.`districtCode`) as lastDistrictCode
                            FROM `tbl_district` d
                            WHERE  d.`Display` = 'Yes'";
                            //$obj->alert($st);
                        //$query=@Execute($st) or die(http(211));
                        $q=@Execute($st) or die(mysql_error()." on line 203");
                        $r=mysql_fetch_array($q);
                        $code=($r['lastDistrictCode']+1);
                        
                        
                    $data.="<input type='hidden' value='".$code."' name='districtCode' id='districtCode'/>
                    <input type='hidden' value='".$regionalCode."' name='regionalCode' id='regionalCode'/>";
                      $data.="<td><input type='text' name='districtName' id='districtName'/>
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
                  <td>
                      <input value='Save' name='saveDistricts' onclick=\"xajax_save_myDistricts(xajax.getFormValues('myDistricts'));\" type='button'>
                  </td>
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
function save_myDistricts($formValues){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$QueryManager=new QueryManager('');
$inc=1;
$districtName=$formValues['districtName'];
//$obj->alert($districtName);

$n=1;
$var="00";
$districtCode=$formValues['districtCode'];
$regionalCode=$formValues['regionalCode'];
$districtName=$formValues['districtName'];
$Display=$formValues['Display'];
$user=$_SESSION['username'];
if($districtCode==$n){
$districtCode=($districtCode.$var.$n);    
}

$acronym=strtoupper(substr($districtName, 0, 3));

$stmnt_Districts="INSERT INTO `tbl_district`(`districtCode`, `districtName`, `acronym`, `zone`, `entryType`, `Display`, `updatedby`)
VALUES ('".$districtCode."','".$districtName."','".$acronym."','".$regionalCode."','District','".$Display."','".$user."')";
//$obj->alert($stmnt_Districts);
@mysql_query($stmnt_Districts) or die(http(277));
//@mysql_query($stmnt_Districts) or die(mysql_error().' on line 281');


$obj->assign('bodyDisplay','innerHTML',congMsg("District has been added successfully!"));
$obj->call('xajax_view_myDistricts','');
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
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading CPM Districts...</span></div>
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
						case"Districts":
						?>
						xajax_view_myDistricts('','');
					
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

