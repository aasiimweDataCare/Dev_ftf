<?php
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
global $sem_annual;
#*************************************


#--------------------FORM1-----------------------------
$xajax->register(XAJAX_FUNCTION,'view_training');
$xajax->register(XAJAX_FUNCTION,'form1_view_both_forms');
$xajax->register(XAJAX_FUNCTION,'form1_newForm_training');
$xajax->register(XAJAX_FUNCTION,'new_training');
$xajax->register(XAJAX_FUNCTION,'edit_training');
$xajax->register(XAJAX_FUNCTION,'delete_training');
$xajax->register(XAJAX_FUNCTION,'update_training');
$xajax->register(XAJAX_FUNCTION,'save_training');
$xajax->register(XAJAX_FUNCTION,'save_Newtraining');
$xajax->register(XAJAX_FUNCTION,'calc_training');
$xajax->register(XAJAX_FUNCTION,'trainingDateValidation');
$xajax->register(XAJAX_FUNCTION,'view_trainingDetails');
$xajax->register(XAJAX_FUNCTION,'AttachFile');


//================================FORM8=================
$xajax->register(XAJAX_FUNCTION,'view_form8');
$xajax->register(XAJAX_FUNCTION,'save_form8');
$xajax->register(XAJAX_FUNCTION,'new_form8');
$xajax->register(XAJAX_FUNCTION,'update_form8');
$xajax->register(XAJAX_FUNCTION,'delete_form8');
$xajax->register(XAJAX_FUNCTION,'edit_form8');
$xajax->register(XAJAX_FUNCTION,'calc_form8');
$xajax->register(XAJAX_FUNCTION,'get_values');
#************************************************
#************************************************

require_once('save.php');
require_once('edit.php');
require_once('delete.php');

function view_form8($quarter,$Qyear,$orgname,$intervention,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

//$obj->alert('form 4 action');
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$data="<form action=\"".$PHP_SELF."\" name='form8' id='form8' method='post'>
<table width='100%' cellspacing='1' id='report'>".filter_form8();
$data.="</tr>";
$data.="
  
  <tr class=''>
  <td colspan=8>
  <div id='status'></div>
 </td>
</tr>

<tr CLASS='evenrow'>
<th colspan='16' ><center>Commodity Production and Marketing Activity Demonstration Data collection</center></th>
</tr>";

$data.="<tr>
    <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
        <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
        <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
        <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_form8(xajax.getFormValues('form8'));return false;\" value='edit' /> |
        <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form8'),'Delete_form8');return false;\" align='left'></td>
    </td>
                    </tr>";
 //===================data to be displayed=====================

$data.="
  <tr>
    <th>#</th>
    <th>Host Farmer</th>
    <th>Season</th>
    <th>Crop</th>
    <th>Variety</th>
    <th>Total area (Acres)</th>
    <th colspan='7'>Treatments</th>
    <th>Yield (Kg)</th>
    <th>Report on Demo/response-diseases, pests, plant growth habits etc</th>
    <th>No.of farmers exposed</th>
    <th>Action</th>
  </tr>";

                                        
$query_string="SELECT d . * , bd . *, f.`tbl_farmersId`,f.`farmersName`, v.`pk_cropVarietiesId`,v.`cropVariety` as nameVariety
FROM `tbl_demo_records_book` d
LEFT JOIN `tbl_demo_book_details` bd ON d.`demoId` = bd.`demoId`
LEFT JOIN `tbl_farmers` f ON f.`tbl_farmersId`=d.`nameHostFarmer`
JOIN `tbl_cropvarieties` v ON v.`pk_cropVarietiesId`=d.`cropVariety`
ORDER BY d.`demoId` DESC";
  //$obj->alert($query_string);
$query_=mysql_query($query_string)or die(http(223));
/**************
*paging parameters
*
****/
$max_records = mysql_num_rows($query_);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->addAlert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$x=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(4684));

while($row=mysql_fetch_array($new_query)){
$color=$n%2==1?"evenrow":"white1";

$data.="<tr class='".$color."'>";
$data.="<td rowspan='4'>".$x.".<input type='checkbox'  name='demoId[]' id='demoId".$x."' value='".$row['demoId']."' />
           <input name='loopkey[]' id='loopkey".$x."' type='hidden' value='1'/></td>";
    if($row['farmersName']=='' or $row['farmersName']==null){
      $data.="<td rowspan='4'>".$row['nameHostFarmer']."</td>";  
    }else if($row['farmersName']<>'' or $row['farmersName']<>null){
    $data.="<td rowspan='4'>".$row['farmersName']."</td>";
    }
    $data.="<td rowspan='4'>".$row['demoSeason']."</td>";
    
    
    $data.="<td rowspan='4'>".$row['farmerCrop']."</td>";
    $data.="<td rowspan='4'>".$row['nameVariety']."</td>";
    $totArea=($row['sizePlotA']+$row['sizePlotB']+$row['sizePlotC']+$row['sizePlotD']);
    $data.="<td align='right' rowspan='4'>".number_format($totArea,2)."</td>";
    $data.="<td align='right'>".number_format($row['treatmentOnePlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentTwoPlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentThreePlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFourPlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFivePlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSixPlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSevenPlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['yieldPlotA'],2)."</td>";
    $data.="<td align='right'>".$row['reportonDemoPlotA']."</td>";
    $data.="<td align='right'>".number_format($row['numTotalPlotA'])."</td>";
    $data.="<td rowspan='4'><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_form8(xajax.getFormValues('form8'));return false;\" value='edit' /></td>";
$data.="</tr>";
  $data.="<tr class='".$color."'>";
    $data.="<td align='right'>".number_format($row['treatmentOnePlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentTwoPlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentThreePlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFourPlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFivePlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSixPlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSevenPlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['yieldPlotB'],2)."</td>";
    $data.="<td align='right'>".$row['reportonDemoPlotB']."</td>";
    $data.="<td align='right'>".number_format($row['numTotalPlotB'])."</td>";
  $data.="</tr>";
  $data.="<tr class='".$color."'>";
    $data.="<td align='right'>".number_format($row['treatmentOnePlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentTwoPlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentThreePlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFourPlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFivePlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSixPlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSevenPlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['yieldPlotC'],2)."</td>";
    $data.="<td align='right'>".$row['reportonDemoPlotC']."</td>";
    $data.="<td align='right'>".number_format($row['numTotalPlotC'])."</td>";
  $data.="</tr>";
  $data.="</tr>";
  $data.="<tr class='".$color."'>";
    $data.="<td align='right'>".number_format($row['treatmentOnePlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentTwoPlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentThreePlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFourPlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFivePlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSixPlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSevenPlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['yieldPlotD'],2)."</td>";
    $data.="<td align='right'>".$row['reportonDemoPlotD']."</td>";
    $data.="<td align='right'>".number_format($row['numTotalPlotD'])."</td>";
  $data.="</tr>";
$x++;
$n++;
}

////====================end of displayed data===================
$data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_form8(xajax.getFormValues('form8'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form8'),'Delete_form8');return false;\" align='left'></td>
                        </td>
                    </tr>";
                    

/*
*display pages
*/
$data.="<tr align='right'><td colspan=20>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
        $append_bar=$p==$num_pages?"":"|";
    if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form8('','','','','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
    else $data.="<a href='#' onclick=\"xajax_view_form8('','','','','1','".$records_per_page."')\">1\n</a>...".$append_bar;
    //for($p=2;$p<$num_pages;$p++){
    $p=2;
    while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
        $data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form8('','','','','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
    }
    $p++;
    }
    if($p==$num_pages){
            $data.="...<a href='#' onclick=\"xajax_view_form8('','','','','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
            }
}


$data.=" Records: <select name='num_rec' id='num_rec' onclick=\"xajax_view_form8('','','','','".$cur_page."',this.value)\">";
    $i=1;
    $selected="";
    while($i*10<=$max_records){
        $selected=$i*10==$records_per_page?"SELECTED":"";
        $data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
        $i++;
    }
    
    $sel=$records_per_page>=$max_records?"SELECTED":"";
    $data.="<option value='".$max_records."' ".$sel.">All</option>";
    $data.="</select>";
    $data.="</br></td></tr><table>";
    
    $data.="<table>";
        
   $data.="</tr>
   </table>
   </form>";
        
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;


}
function save_form8($formValues){

$obj = new xajaxResponse();

@mysql_query("SET AUTOCOMMIT=FALSE");
@mysql_query("BEGIN TRANSACTION");
/* first create the refrence point for the three form1 tables
$stmnt_check="SELECT `demoId` FROM `tbl_demo_records_book` ORDER BY `demoId` DESC"; */

$stmnt_check="SELECT MAX(`demoId`) as demoId  FROM `tbl_demo_records_book`";

$Qcheck=@mysql_query($stmnt_check) or die(http(970));

/* $obj->alert($stmnt_check) */

$y=1;
if(@mysql_num_rows($Qcheck)>0){
$Rcheck=mysql_fetch_array($Qcheck);
$lastDemoId=$Rcheck['demoId'];

/* $obj->alert($lastDemoId); */

$nextDemoId=($lastDemoId+$y);

$demoId=$nextDemoId; 
    
}
else
{
/* Setting the first Id if all tables are empty */
$initialDemoId=$y;
$demoId=$initialDemoId;  
}

$demoDistrict=$formValues['demoDistrict'];
$demoSubCounty=$formValues['demoSubCounty'];
$demoParish=$formValues['demoParish'];
$demoVillage=$formValues['demoVillage'];
$demoSeason=$formValues['demoSeason'];
$demoYear=$formValues['demoYear'];
$demoNameTrader=$formValues['demoNameTrader'];
$demoTraderSex=$formValues['demoTraderSex'];
$demoNameVillageAgent=$formValues['demoNameVillageAgent'];
$demoVillageAgentSex=$formValues['demoVillageAgentSex'];



$hostFarmer=$formValues['hostFarmer'];
$numVisit=$formValues['numVisit'];
$hostGender=$formValues['hostGender'];
$farmerAge=$formValues['farmerAge'];
$farmerCrop=$formValues['farmerCrop'];
$cropVariety=$formValues['cropVariety'];


if($hostFarmer<>'' OR $hostFarmer<>0){    
$stmnt_demo="INSERT INTO `tbl_demo_records_book`(`demoId`, `demoDistrict`, `demoSubCounty`, `demoParish`,
                                                    `demoVillage`, `demoSeason`, `demoYear`,
                                                    `demoNameTrader`, `demoTraderSex`, `demoNameVillageAgent`,
                                                    `demoVillageAgentSex`, `nameHostFarmer`, `numofVisits`,
                                                    `farmerGender`, `farmerAge`, `farmerCrop`,`cropVariety`,`reportingPeriod`) VALUES (
                                                        '".$demoId."','".$demoDistrict."', '".$demoSubCounty."', '".$demoParish."',
                                                        '".$demoVillage."', '".$demoSeason."', '".$demoYear."',
                                                        '".$demoNameTrader."', '".$demoTraderSex."', '".$demoNameVillageAgent."',
                                                        '".$demoVillageAgentSex."', '".$hostFarmer."', '".$numVisit."',
                                                        '".$hostGender."', '".$farmerAge."', '".$farmerCrop."', '".$cropVariety."','".$_SESSION['quarter']."')";
$obj->alert($stmnt_demo);
//@mysql_query($stmnt_demo)or die("CPM Error-code 902 because ".mysql_error());
@mysql_query($stmnt_demo) or die(http(1025));
}


/* ===============Values for plot A=============================== */


$sizePlotA=$formValues['sizePlotA'];
if($sizePlotA==''){
$sizePlotA=0;    
}
$treatmentOnePlotA=$formValues['treatmentOnePlotA'];
if($treatmentOnePlotA==''){
$treatmentOnePlotA=0;    
}
$treatmentTwoPlotA=$formValues['treatmentTwoPlotA'];
if($treatmentTwoPlotA==''){
$treatmentTwoPlotA=0;    
}
$treatmentThreePlotA=$formValues['treatmentThreePlotA'];
if($treatmentThreePlotA==''){
$treatmentThreePlotA=0;    
}
$treatmentFourPlotA=$formValues['treatmentFourPlotA'];
if($treatmentFourPlotA==''){
$treatmentFourPlotA=0;    
}
$treatmentFivePlotA=$formValues['treatmentFivePlotA'];
if($treatmentFivePlotA==''){
$treatmentFivePlotA=0;    
}
$treatmentSixPlotA=$formValues['treatmentSixPlotA'];
if($treatmentSixPlotA==''){
$treatmentSixPlotA=0;    
}
$treatmentSevenPlotA=$formValues['treatmentSevenPlotA'];
if($treatmentSevenPlotA==''){
$treatmentSevenPlotA=0;    
}



$plantingDatePlotA=$formValues['plantingDatePlotA'];
if($plantingDatePlotA==''){
$plantingDatePlotA='1930-01-01';    
}


$firstWeedingDatePlotA=$formValues['firstWeedingDatePlotA'];
if($firstWeedingDatePlotA==''){
$firstWeedingDatePlotA='1930-01-01';    
}

$secondWeedingDatePlotA=$formValues['secondWeedingDatePlotA'];
if($secondWeedingDatePlotA==''){
$secondWeedingDatePlotA='1930-01-01';    
}

$firstFertilizerDatePlotA=$formValues['firstFertilizerDatePlotA'];
if($firstFertilizerDatePlotA==''){
$firstFertilizerDatePlotA='1930-01-01';    
}

$secondFertilizerDatePlotA=$formValues['secondFertilizerDatePlotA'];
if($secondFertilizerDatePlotA==''){
$secondFertilizerDatePlotA='1930-01-01';    
}

$pesticideDatePlotA=$formValues['pesticideDatePlotA'];
if($pesticideDatePlotA==''){
$pesticideDatePlotA='1930-01-01';    
}

$harvestDatePlotA=$formValues['harvestDatePlotA'];
if($harvestDatePlotA==''){
$harvestDatePlotA='1930-01-01';    
}


$yieldPlotA=$formValues['yieldPlotA'];
if($yieldPlotA==''){
$yieldPlotA=0;    
}

$reportonDemoPlotA=$formValues['reportonDemoPlotA'];
$numFemalePlotA=$formValues['numFemalePlotA'];
if($numFemalePlotA==''){
$numFemalePlotA=0;    
}

$numMalePlotA=$formValues['numMalePlotA'];
if($numMalePlotA==''){
$numMalePlotA=0;    
}

$numTotalPlotA=$formValues['numTotalPlotA'];
if($numTotalPlotA==''){
$numTotalPlotA=0;    
}

/* ===============Values for plot B=============================== */

$sizePlotB=$formValues['sizePlotB'];
if($sizePlotB==''){
$sizePlotB=0;    
}
$treatmentOnePlotB=$formValues['treatmentOnePlotB'];
if($treatmentOnePlotB==''){
$treatmentOnePlotB=0;    
}
$treatmentTwoPlotB=$formValues['treatmentTwoPlotB'];
if($treatmentTwoPlotB==''){
$treatmentTwoPlotB=0;    
}
$treatmentThreePlotB=$formValues['treatmentThreePlotB'];
if($treatmentThreePlotB==''){
$treatmentThreePlotB=0;    
}
$treatmentFourPlotB=$formValues['treatmentFourPlotB'];
if($treatmentFourPlotB==''){
$treatmentFourPlotB=0;    
}
$treatmentFivePlotB=$formValues['treatmentFivePlotB'];
if($treatmentFivePlotB==''){
$treatmentFivePlotB=0;    
}
$treatmentSixPlotB=$formValues['treatmentSixPlotB'];
if($treatmentSixPlotB==''){
$treatmentSixPlotB=0;    
}
$treatmentSevenPlotB=$formValues['treatmentSevenPlotB'];
if($treatmentSevenPlotB==''){
$treatmentSevenPlotB=0;    
}



$plantingDatePlotB=$formValues['plantingDatePlotB'];
if($plantingDatePlotB==''){
$plantingDatePlotB='1930-01-01';    
}


$firstWeedingDatePlotB=$formValues['firstWeedingDatePlotB'];
if($firstWeedingDatePlotB==''){
$firstWeedingDatePlotB='1930-01-01';    
}

$secondWeedingDatePlotB=$formValues['secondWeedingDatePlotB'];
if($secondWeedingDatePlotB==''){
$secondWeedingDatePlotB='1930-01-01';    
}

$firstFertilizerDatePlotB=$formValues['firstFertilizerDatePlotB'];
if($firstFertilizerDatePlotB==''){
$firstFertilizerDatePlotB='1930-01-01';    
}

$secondFertilizerDatePlotB=$formValues['secondFertilizerDatePlotB'];
if($secondFertilizerDatePlotB==''){
$secondFertilizerDatePlotB='1930-01-01';    
}

$pesticideDatePlotB=$formValues['pesticideDatePlotB'];
if($pesticideDatePlotB==''){
$pesticideDatePlotB='1930-01-01';    
}

$harvestDatePlotB=$formValues['harvestDatePlotB'];
if($harvestDatePlotB==''){
$harvestDatePlotB='1930-01-01';    
}


$yieldPlotB=$formValues['yieldPlotB'];
if($yieldPlotB==''){
$yieldPlotB=0;    
}

$reportonDemoPlotB=$formValues['reportonDemoPlotB'];
$numFemalePlotB=$formValues['numFemalePlotB'];
if($numFemalePlotB==''){
$numFemalePlotB=0;    
}

$numMalePlotB=$formValues['numMalePlotB'];
if($numMalePlotB==''){
$numMalePlotB=0;    
}

$numTotalPlotB=$formValues['numTotalPlotB'];
if($numTotalPlotB==''){
$numTotalPlotB=0;    
}


/* ===============Values for plot C=============================== */

$sizePlotC=$formValues['sizePlotC'];
if($sizePlotC==''){
$sizePlotC=0;    
}
$treatmentOnePlotC=$formValues['treatmentOnePlotC'];
if($treatmentOnePlotC==''){
$treatmentOnePlotC=0;    
}
$treatmentTwoPlotC=$formValues['treatmentTwoPlotC'];
if($treatmentTwoPlotC==''){
$treatmentTwoPlotC=0;    
}
$treatmentThreePlotC=$formValues['treatmentThreePlotC'];
if($treatmentThreePlotC==''){
$treatmentThreePlotC=0;    
}
$treatmentFourPlotC=$formValues['treatmentFourPlotC'];
if($treatmentFourPlotC==''){
$treatmentFourPlotC=0;    
}
$treatmentFivePlotC=$formValues['treatmentFivePlotC'];
if($treatmentFivePlotC==''){
$treatmentFivePlotC=0;    
}
$treatmentSixPlotC=$formValues['treatmentSixPlotC'];
if($treatmentSixPlotC==''){
$treatmentSixPlotC=0;    
}
$treatmentSevenPlotC=$formValues['treatmentSevenPlotC'];
if($treatmentSevenPlotC==''){
$treatmentSevenPlotC=0;    
}



$plantingDatePlotC=$formValues['plantingDatePlotC'];
if($plantingDatePlotC==''){
$plantingDatePlotC='1930-01-01';    
}


$firstWeedingDatePlotC=$formValues['firstWeedingDatePlotC'];
if($firstWeedingDatePlotC==''){
$firstWeedingDatePlotC='1930-01-01';    
}

$secondWeedingDatePlotC=$formValues['secondWeedingDatePlotC'];
if($secondWeedingDatePlotC==''){
$secondWeedingDatePlotC='1930-01-01';    
}

$firstFertilizerDatePlotC=$formValues['firstFertilizerDatePlotC'];
if($firstFertilizerDatePlotC==''){
$firstFertilizerDatePlotC='1930-01-01';    
}

$secondFertilizerDatePlotC=$formValues['secondFertilizerDatePlotC'];
if($secondFertilizerDatePlotC==''){
$secondFertilizerDatePlotC='1930-01-01';    
}

$pesticideDatePlotC=$formValues['pesticideDatePlotC'];
if($pesticideDatePlotC==''){
$pesticideDatePlotC='1930-01-01';    
}

$harvestDatePlotC=$formValues['harvestDatePlotC'];
if($harvestDatePlotC==''){
$harvestDatePlotC='1930-01-01';    
}


$yieldPlotC=$formValues['yieldPlotC'];
if($yieldPlotC==''){
$yieldPlotC=0;    
}

$reportonDemoPlotC=$formValues['reportonDemoPlotC'];
$numFemalePlotC=$formValues['numFemalePlotC'];
if($numFemalePlotC==''){
$numFemalePlotC=0;    
}

$numMalePlotC=$formValues['numMalePlotC'];
if($numMalePlotC==''){
$numMalePlotC=0;    
}

$numTotalPlotC=$formValues['numTotalPlotC'];
if($numTotalPlotC==''){
$numTotalPlotC=0;    
}


/* ===============Values for plot D=============================== */

$sizePlotD=$formValues['sizePlotD'];
if($sizePlotD==''){
$sizePlotD=0;    
}
$treatmentOnePlotD=$formValues['treatmentOnePlotD'];
if($treatmentOnePlotD==''){
$treatmentOnePlotD=0;    
}
$treatmentTwoPlotD=$formValues['treatmentTwoPlotD'];
if($treatmentTwoPlotD==''){
$treatmentTwoPlotD=0;    
}
$treatmentThreePlotD=$formValues['treatmentThreePlotD'];
if($treatmentThreePlotD==''){
$treatmentThreePlotD=0;    
}
$treatmentFourPlotD=$formValues['treatmentFourPlotD'];
if($treatmentFourPlotD==''){
$treatmentFourPlotD=0;    
}
$treatmentFivePlotD=$formValues['treatmentFivePlotD'];
if($treatmentFivePlotD==''){
$treatmentFivePlotD=0;    
}
$treatmentSixPlotD=$formValues['treatmentSixPlotD'];
if($treatmentSixPlotD==''){
$treatmentSixPlotD=0;    
}
$treatmentSevenPlotD=$formValues['treatmentSevenPlotD'];
if($treatmentSevenPlotD==''){
$treatmentSevenPlotD=0;    
}



$plantingDatePlotD=$formValues['plantingDatePlotD'];
if($plantingDatePlotD==''){
$plantingDatePlotD='1930-01-01';    
}


$firstWeedingDatePlotD=$formValues['firstWeedingDatePlotD'];
if($firstWeedingDatePlotD==''){
$firstWeedingDatePlotD='1930-01-01';    
}

$secondWeedingDatePlotD=$formValues['secondWeedingDatePlotD'];
if($secondWeedingDatePlotD==''){
$secondWeedingDatePlotD='1930-01-01';    
}

$firstFertilizerDatePlotD=$formValues['firstFertilizerDatePlotD'];
if($firstFertilizerDatePlotD==''){
$firstFertilizerDatePlotD='1930-01-01';    
}

$secondFertilizerDatePlotD=$formValues['secondFertilizerDatePlotD'];
if($secondFertilizerDatePlotD==''){
$secondFertilizerDatePlotD='1930-01-01';    
}

$pesticideDatePlotD=$formValues['pesticideDatePlotD'];
if($pesticideDatePlotD==''){
$pesticideDatePlotD='1930-01-01';    
}

$harvestDatePlotD=$formValues['harvestDatePlotD'];
if($harvestDatePlotD==''){
$harvestDatePlotD='1930-01-01';    
}


$yieldPlotD=$formValues['yieldPlotD'];
if($yieldPlotD==''){
$yieldPlotD=0;    
}

$reportonDemoPlotD=$formValues['reportonDemoPlotD'];
$numFemalePlotD=$formValues['numFemalePlotD'];
if($numFemalePlotD==''){
$numFemalePlotD=0;    
}

$numMalePlotD=$formValues['numMalePlotD'];
if($numMalePlotD==''){
$numMalePlotD=0;    
}

$numTotalPlotD=$formValues['numTotalPlotD'];
if($numTotalPlotD==''){
$numTotalPlotD=0;    
}

/* ===============End of Values for plot D======================== */



/* validate only up to 18  treatment types */
/*  Plot A */
 if($treatmentOnePlotA >18
    OR $treatmentTwoPlotA >18
    OR $treatmentThreePlotA >18
    OR $treatmentFourPlotA >18
    OR $treatmentFivePlotA >18
    OR $treatmentSixPlotA >18
    OR $treatmentSevenPlotA >18){
    
    $obj->alert('Invalid crop treatment Code in Plot Type A
                Use treatment Codes 1 to 18');
    return $obj;
 }
 
/* Plot B */
 if($treatmentOnePlotB >18
    OR $treatmentTwoPlotB >18
    OR $treatmentThreePlotB >18
    OR $treatmentFourPlotB >18
    OR $treatmentFivePlotB >18
    OR $treatmentSixPlotB >18
    OR $treatmentSevenPlotB >18){
    
    $obj->alert('Invalid crop treatment Code in Plot Type B
                Use treatment Codes 1 to 18');
    return $obj;
 }

/* Plot C */
 if($treatmentOnePlotC >18
    OR $treatmentTwoPlotC >18
    OR $treatmentThreePlotC >18
    OR $treatmentFourPlotC >18
    OR $treatmentFivePlotC >18
    OR $treatmentSixPlotC >18
    OR $treatmentSevenPlotC >18){
    
    $obj->alert('Invalid crop treatment Code in Plot Type C
                Use treatment Codes 1 to 18');
    return $obj;
 }
 
/*  Plot D */
 if($treatmentOnePlotD >18
    OR $treatmentTwoPlotD >18
    OR $treatmentThreePlotD >18
    OR $treatmentFourPlotD >18
    OR $treatmentFivePlotD >18
    OR $treatmentSixPlotD >18
    OR $treatmentSevenPlotD >18){
    
    $obj->alert('Invalid crop treatment Code in Plot Type D
                Use treatment Codes 1 to 18');
    return $obj;
 }
$user=$_SESSION['username'];
if($sizePlotA<>0 OR $sizePlotA<>'' OR $sizePlotB<>0 OR $sizePlotB<>'' OR $sizePlotC<>0 OR $sizePlotC<>'' OR $sizePlotD<>0 OR $sizePlotD<>''){
 
 $stm="INSERT INTO `tbl_demo_book_details`(`demoId`,
 `sizePlotA`, `treatmentOnePlotA`, `treatmentTwoPlotA`,
 `treatmentThreePlotA`, `treatmentFourPlotA`, `treatmentFivePlotA`,
 `treatmentSixPlotA`, `treatmentSevenPlotA`, `plantingDatePlotA`,
 `firstWeedingDatePlotA`, `secondWeedingDatePlotA`, `firstFertilizerDatePlotA`,
 `secondFertilizerDatePlotA`, `pesticideDatePlotA`, `harvestDatePlotA`,
 `yieldPlotA`, `reportonDemoPlotA`, `numFemalePlotA`,
 `numMalePlotA`, `numTotalPlotA`,
 
 `sizePlotB`, `treatmentOnePlotB`, `treatmentTwoPlotB`,
 `treatmentThreePlotB`, `treatmentFourPlotB`, `treatmentFivePlotB`,
 `treatmentSixPlotB`, `treatmentSevenPlotB`, `plantingDatePlotB`,
 `firstWeedingDatePlotB`, `secondWeedingDatePlotB`, `firstFertilizerDatePlotB`,
 `secondFertilizerDatePlotB`, `pesticideDatePlotB`, `harvestDatePlotB`,
 `yieldPlotB`, `reportonDemoPlotB`, `numFemalePlotB`,
 `numMalePlotB`, `numTotalPlotB`,
 
 `sizePlotC`, `treatmentOnePlotC`, `treatmentTwoPlotC`,
 `treatmentThreePlotC`, `treatmentFourPlotC`, `treatmentFivePlotC`,
 `treatmentSixPlotC`, `treatmentSevenPlotC`, `plantingDatePlotC`,
 `firstWeedingDatePlotC`, `secondWeedingDatePlotC`, `firstFertilizerDatePlotC`,
 `secondFertilizerDatePlotC`, `pesticideDatePlotC`, `harvestDatePlotC`,
 `yieldPlotC`, `reportonDemoPlotC`, `numFemalePlotC`,
 `numMalePlotC`, `numTotalPlotC`,
 
 `sizePlotD`, `treatmentOnePlotD`, `treatmentTwoPlotD`,
 `treatmentThreePlotD`, `treatmentFourPlotD`, `treatmentFivePlotD`,
 `treatmentSixPlotD`, `treatmentSevenPlotD`, `plantingDatePlotD`,
 `firstWeedingDatePlotD`, `secondWeedingDatePlotD`, `firstFertilizerDatePlotD`,
 `secondFertilizerDatePlotD`, `pesticideDatePlotD`, `harvestDatePlotD`,
 `yieldPlotD`, `reportonDemoPlotD`, `numFemalePlotD`,
 `numMalePlotD`, `numTotalPlotD`,`reportingPeriod`) VALUES(
 
 '".$demoId."',
 '".$sizePlotA."', '".$treatmentOnePlotA."', '".$treatmentTwoPlotA."',
 '".$treatmentThreePlotA."', '".$treatmentFourPlotA."', '".$treatmentFivePlotA."',
 '".$treatmentSixPlotA."', '".$treatmentSevenPlotA."', '".$plantingDatePlotA."',
 '".$firstWeedingDatePlotA."', '".$secondWeedingDatePlotA."', '".$firstFertilizerDatePlotA."',
 '".$secondFertilizerDatePlotA."', '".$pesticideDatePlotA."', '".$harvestDatePlotA."',
 '".$yieldPlotA."', '".$reportonDemoPlotA."', '".$numFemalePlotA."',
 '".$numMalePlotA."', '".$numTotalPlotA."',
 
 '".$sizePlotB."', '".$treatmentOnePlotB."', '".$treatmentTwoPlotB."',
 '".$treatmentThreePlotB."', '".$treatmentFourPlotB."', '".$treatmentFivePlotB."',
 '".$treatmentSixPlotB."', '".$treatmentSevenPlotB."', '".$plantingDatePlotB."',
 '".$firstWeedingDatePlotB."', '".$secondWeedingDatePlotB."', '".$firstFertilizerDatePlotB."',
 '".$secondFertilizerDatePlotB."', '".$pesticideDatePlotB."', '".$harvestDatePlotB."',
 '".$yieldPlotB."', '".$reportonDemoPlotB."', '".$numFemalePlotB."',
 '".$numMalePlotB."', '".$numTotalPlotB."',
 

 '".$sizePlotC."', '".$treatmentOnePlotC."', '".$treatmentTwoPlotC."',
 '".$treatmentThreePlotC."', '".$treatmentFourPlotC."', '".$treatmentFivePlotC."',
 '".$treatmentSixPlotC."', '".$treatmentSevenPlotC."', '".$plantingDatePlotC."',
 '".$firstWeedingDatePlotC."', '".$secondWeedingDatePlotC."', '".$firstFertilizerDatePlotC."',
 '".$secondFertilizerDatePlotC."', '".$pesticideDatePlotC."', '".$harvestDatePlotC."',
 '".$yieldPlotC."', '".$reportonDemoPlotC."', '".$numFemalePlotC."',
 '".$numMalePlotC."', '".$numTotalPlotC."',
 

 '".$sizePlotD."', '".$treatmentOnePlotD."', '".$treatmentTwoPlotD."',
 '".$treatmentThreePlotD."', '".$treatmentFourPlotD."', '".$treatmentFivePlotD."',
 '".$treatmentSixPlotD."', '".$treatmentSevenPlotD."', '".$plantingDatePlotD."',
 '".$firstWeedingDatePlotD."', '".$secondWeedingDatePlotD."', '".$firstFertilizerDatePlotD."',
 '".$secondFertilizerDatePlotD."', '".$pesticideDatePlotD."', '".$harvestDatePlotD."',
 '".$yieldPlotD."', '".$reportonDemoPlotD."', '".$numFemalePlotD."',
 '".$numMalePlotD."', '".$numTotalPlotD."', '".$_SESSION['quarter']."'
 )";   
    
$obj->alert($stm);
/* @mysql_query($stm) or die(http(1409)); */
    
}


@mysql_query("COMMIT");
@mysql_query("SET AUTOCOMMIT=TRUE");

/* $obj->assign('bodyDisplay','innerHTML',$data);
$obj->call('xajax_view_form8','','',''); */
return $obj; 
}
function new_form8($districtCode,$subCounty,$Parish,$demoVillage,$demoSeason,$trCode,$vaCode,$faCode,$numVisits,$Crop,$cropVariety){
    
$obj=new xajaxResponse();

if($_SESSION['user_id']=='')
{
$obj->redirect('index.php');
return $obj;
}
$QueryManager=new QueryManager('');

//Sessions to be retained
$_SESSION['districtCode']=$districtCode;
$_SESSION['subCounty']=$subCounty;
$_SESSION['Parish']=$Parish;
$_SESSION['demoVillage']=$demoVillage;
$_SESSION['demoSeason']=$demoSeason;
$_SESSION['trCode']=$trCode;
$_SESSION['vaCode']=$vaCode;
$_SESSION['faCode']=$faCode;
$_SESSION['numVisits']=$numVisits;
$_SESSION['Crop']=$Crop;
$_SESSION['cropVariety']=$cropVariety;



$data.="<form action=\"".$PHP_SELF."\" name='form8' id='form8' method='post'>";
//---------------------------Start of main table------------------
$data.="<table width='100%' cellspacing='1' cellpadding='1' id='report'>";
$data.="<tr>

    <th colspan='16'><div align='center'>Commodity Production and Marketing Activity <br/> Demonstration Data collection Form</div></th>

    </tr>";
$data.="<tr class='evenrow3'>";
    $data.="<td colspan='22'>";
        $data.="<table width='100%' cellpadding=1' cellspacing='1'>
        <tr class='evenrow'>
            <td>District :
              <select name='demoDistrict' id='demoDistrict'onchange=\"xajax_new_form8(this.value,
            '".$_SESSION['subCounty']."',
            '".$_SESSION['Parish']."',
            '".$_SESSION['demoVillage']."',
            '".$_SESSION['demoSeason']."',
            '".$_SESSION['trCode']."',
            '".$_SESSION['vaCode']."',
            '".$_SESSION['faCode']."',
            '".$_SESSION['numVisits']."',
            '".$_SESSION['Crop']."',
            '".$_SESSION['cropVariety']."');return false;\"
            style='width:100px;'>";
            $data.="<option value=''>-select-</option>";
            $data.=$QueryManager->DistrictFilterNoRegion($_SESSION['districtCode']);
                $data.="</select>";
                $data.="</td>";

            $data.="<td>Sub-County:
              <select name='demoSubCounty' id='demoSubCounty'  onchange=\"xajax_new_form8('".$_SESSION['districtCode']."',
            this.value,
            '".$_SESSION['Parish']."',
            '".$_SESSION['demoVillage']."',
            '".$_SESSION['demoSeason']."',
            '".$_SESSION['trCode']."',
            '".$_SESSION['vaCode']."',
            '".$_SESSION['faCode']."',
            '".$_SESSION['numVisits']."',
            '".$_SESSION['Crop']."',
            '".$_SESSION['cropVariety']."');return false;\" style='width:100px;'>";
                $data.="<option value=''>-select-</option>";    
                $data.=$QueryManager->SubcountyFilterNoRegion($_SESSION['districtCode'],$_SESSION['subCounty']);
                $data.="</select>";
                $data.="</td>";

            $data.="<td>Parish:
              <select name='demoParish' id='demoParish'  onchange=\"xajax_new_form8('".$_SESSION['districtCode']."',
            '".$_SESSION['subCounty']."',
            this.value,
            '".$_SESSION['demoVillage']."',
            '".$_SESSION['demoSeason']."',
            '".$_SESSION['trCode']."',
            '".$_SESSION['vaCode']."',
            '".$_SESSION['faCode']."',
            '".$_SESSION['numVisits']."',
            '".$_SESSION['Crop']."',
            '".$_SESSION['cropVariety']."');return false;\" style='width:100px;'>";
            $data.="<option value=''>-select-</option>";
            $data.=$QueryManager->ParishFilterNoRegion($_SESSION['districtCode'],$_SESSION['subCounty'],$_SESSION['Parish']);
                $data.="</select>";
                $data.="</td>";
                
            $data.="<td colspan='2'>Village:
            <input type='text' name='demoVillage' id='demoVillage' value='".$_SESSION['demoVillage']."'   onchange=\"xajax_new_form8('".$_SESSION['districtCode']."',
            '".$_SESSION['subCounty']."',
            '".$_SESSION['Parish']."',
            this.value,
            '".$_SESSION['demoSeason']."',
            '".$_SESSION['trCode']."',
            '".$_SESSION['vaCode']."',
            '".$_SESSION['faCode']."',
            '".$_SESSION['numVisits']."',
            '".$_SESSION['Crop']."',
            '".$_SESSION['cropVariety']."');return false;\"  style='width:100px;'>";
            $data.="</td>";
          $data.="</tr>";

        $data.="<tr class='evenrow'>
            <td>Season:
              <select name='demoSeason' id='demoSeason' onchange=\"xajax_new_form8('".$_SESSION['districtCode']."',
            '".$_SESSION['subCounty']."',
            '".$_SESSION['Parish']."',
            '".$_SESSION['demoVillage']."',
            this.value,
            '".$_SESSION['trCode']."',
            '".$_SESSION['vaCode']."',
            '".$_SESSION['faCode']."',
            '".$_SESSION['numVisits']."',
            '".$_SESSION['Crop']."',
            '".$_SESSION['cropVariety']."');return false;\" style='width:100px;'>";
            
                $data.="<option value=''>-select-</option>";

                $arrStatus=array('Season A','Season B');
                                        $k = 0; 
                                        foreach ($arrStatus as $var) {
                                            $selected=($_SESSION['demoSeason']==$var)?"selected":"";
                                            $data.="<option value=\"".$var."\" ".$selected.">".$var."</option>";
                                            $k++;
                                        }
                
                $data.="</select></td>

            <td>Year:
              <select name='demoYear' id='demoYear' style='width:150px;'>";
                
                $end=date('Y');
        do{
        $selyear=($_SESSION['Ryear']==$end)?"SELECTED":"";
        $data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
        $end--;
        }while($end>=2010);
                
        $data.="</select></td>

            <td>&nbsp;</td>
            <td colspan='-2'></td>
        </tr>
        <tr class='evenrow'>

            <td>Name of Trader:
              <select name='demoNameTrader' id='demoNameTrader'    onchange=\"xajax_new_form8('".$_SESSION['districtCode']."',
            '".$_SESSION['subCounty']."',
            '".$_SESSION['Parish']."',
            '".$_SESSION['demoVillage']."',
            '".$_SESSION['demoSeason']."',
            this.value,
            '".$_SESSION['vaCode']."',
            '".$_SESSION['faCode']."',
            '".$_SESSION['numVisits']."',
            '".$_SESSION['Crop']."',
            '".$_SESSION['cropVariety']."');return false;\"  style='width:100px;'>
            <option value=''>
                    -Select-
                </option>";
                $data.=$QueryManager->filterTrader($_SESSION['trCode']);
                
                $data.="</select></td>

            <td>Traders Sex:";
            $stmnt="SELECT t.* FROM `tbl_traders` t WHERE t.`tbl_tradersId`='".$_SESSION['trCode']."' ORDER BY t.`tbl_tradersId` ASC";
            $q=mysql_query($stmnt);
            $r=mysql_fetch_array($q);

            $data.="<input type='hidden' name='demoTraderSex' id='demoTraderSex' value='".$r['traderSex']."'/>
            <input type='text' name='demoTraderSex' id='demoTraderSex' value='".$r['traderSex']."' style='width:150px;' class='disabled' disabled='disabled'></td>

            <td colspan='3'>&nbsp;</td>
          </tr>
        <tr class='evenrow'>
            

            <td>Name of Village Agent:
              <select name='demoNameVillageAgent' id='demoNameVillageAgent'  onchange=\"xajax_new_form8('".$_SESSION['districtCode']."',
            '".$_SESSION['subCounty']."',
            '".$_SESSION['Parish']."',
            '".$_SESSION['demoVillage']."',
            '".$_SESSION['demoSeason']."',
            '".$_SESSION['trCode']."',
            this.value,
            '".$_SESSION['faCode']."',
            '".$_SESSION['numVisits']."',
            '".$_SESSION['Crop']."',
            '".$_SESSION['cropVariety']."');return false;\" style='width:100px;'>
            <option value=''>
                    -Select-
                </option>";
            $data.=$QueryManager->filterVillageAgent($_SESSION['trCode'],$_SESSION['vaCode']);
                $data.="</select></td>

            <td>Sex of Village Agent:";
            $stmnt="SELECT v . * FROM `tbl_villageagents` v WHERE v.tbl_villageAgentId='".$_SESSION['vaCode']."' ORDER BY v.`tbl_villageAgentId` ASC";
            $q=mysql_query($stmnt);
            $r=mysql_fetch_array($q);
  
            $data.="<input type='hidden' name='demoVillageAgentSex' id='demoVillageAgentSex' value='".$r['vAgentSex']."'/>
            <input type='text' name='demoVillageAgentSex' id='demoVillageAgentSex' value='".$r['vAgentSex']."' style='width:150px;' class='disabled' disabled='disabled'></td>

            <td colspan='3'>&nbsp;</td>
          </tr>
    </table>";
    $data.="</td>";
$data.="</tr>";



  //-----------------------------Another table------------------------
$data.="<tr class='evenrow3'>";
    $data.="<td colspan='22'>";
    $data.="<table border='0' cellspacing='1' cellpadding='1' width='100%'>";

    $data.="<tr class='evenrow'>
    <th>#</th>
    <th>Name of Host Farmer</th>
    <th>*Number of Visits</th>
    <th>Gender</th>
    <th>Age</th>
    <th>Crop</th>
    <th>Variety</th>
    </tr>";

      
    $data.="<tr class='evenrow'>
    <td>1.</td>";

    $data.="<td><select name='hostFarmer' id='hostFarmer' onchange=\"xajax_new_form8('".$_SESSION['districtCode']."',
            '".$_SESSION['subCounty']."',
           '".$_SESSION['Parish']."',
           '".$_SESSION['demoVillage']."',
           '".$_SESSION['demoSeason']."',
            '".$_SESSION['trCode']."',
            '".$_SESSION['vaCode']."',
            this.value,
           '".$_SESSION['numVisits']."',
            '".$_SESSION['Crop']."',
            '".$_SESSION['cropVariety']."');return false;\" style='width:100px;'>
    <option value=''>-select-</option>";
    $data.=$QueryManager->farmerFilter($_SESSION['trCode'],$_SESSION['vaCode'],$_SESSION['faCode']);
    $data.="</select>
    </td>";
    
    
    /* $data.="<td><input value='".$_SESSION['faCode']."'  type='text' name='hostFarmer' id='hostFarmer' onchanges=\"xajax_new_form8('".$_SESSION['districtCode']."',
            '".$_SESSION['subCounty']."',
            '".$_SESSION['Parish']."',
            '".$_SESSION['demoVillage']."',
            '".$_SESSION['demoSeason']."',
            '".$_SESSION['trCode']."',
            '".$_SESSION['vaCode']."',
            this.value,
            '".$_SESSION['numVisits']."',
            '".$_SESSION['Crop']."',
            '".$_SESSION['cropVariety']."');return false;\" style='width:300px;'/>
    </td>"; */
    
    
 
    
   $st_farmer="SELECT f.* FROM `tbl_farmers` f WHERE f.`tbl_farmersId`='".$_SESSION['faCode']."' order by f.`farmersName` ASC";
   // $obj->alert($st_farmer);
   $q=mysql_query($st_farmer);
   $r=mysql_fetch_array($q);
    
    $data.="<td><input value='".$S."'  name='numVisit' id=numVisit' type='text' style='width:60px;' onkeypress='return numbersonly(event, false)'/>
    </td>";
    
    $data.="<td>
    <input value='".$r['farmersSex']."' type='text'  class='disabled' readonly='readonly'  name='hostGender' id='hostGender'  style='width:60px;'/>
    </td>";
    
    /* $data.="<td><select name='hostGender' id ='hostGender' size='1'  style='width:70px'>
                <option value=''>-select-</option>";
                 $values=array('Male','Female');
                                        
                                        $q = 0; 
                                        foreach ($values as $s) {
                                            $selected=($addField==$s)?"selected":"";
                                            $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                            $q++;
                                        } 
                $data.="</select>";
                $data.="</td>"; */
    
    $dob=$r['farmersDob'];
    $obj->alert($dob);
    $date1=date_create("".$dob."");
    $dateNow=date('Y-m-d');
    $date2=date_create("".$dateNow."");
    $diff=date_diff($date1,$date2);
    $age = $diff->y;
    
    $data.="<td>
    <input value='".$age."' type='text'  class='disabled' readonly='readonly' name='farmerAge' id='farmerAge' maxlength='2' onkeypress='return numbersonly(event, false)' style='width:60px;'>
    </td>";
    
   
    
    /* $data.="<td>
    <input value='".$_SESSION['farmerAge']."' type='text'   name='farmerAge' id='farmerAge' maxlength='3' onkeypress='return numbersonly(event, false)' style='width:60px;'>
    </td>"; */
    
    $data.="<td >";
    $data.="<select name='farmerCrop' id='farmerCrop'  style='width:60px;'>
    <option value=''>-select-</option>";
         $data.=$QueryManager->filterCrop($_SESSION['Crop']);
    $data.="</select>";
    $data.="</td>
    <td>";
    
    $data.="<select name='cropVariety' id='cropVariety'  style='width:60px;'>
    <option value=''>-select-</option>";
         $data.=$QueryManager->filterCropVarieties($_SESSION['cropVariety']);
    $data.="</select>";
    
    $data.="</td>
    </tr>";




$data.="</table>";
$data.="</td>";
$data.="</tr>";

$data.="<tr class='evenrow'>";
$data.="<td colspan=22>";
$data.="
<table border='0' cellspacing='1' cellpadding='1' width='100%'>
  <tr>

            <th rowspan='2'>Plot Type</th>

            <th rowspan='2'>
                <p>Plot size</p>

                <p>(Acres)</p>            </th>

            <th colspan='7' rowspan='2'>Overall treatment</th>

            <th colspan='5'>Dates (Indicate dates when each was<br>
            carried out, if applicable)</th>
            <th rowspan='2'>Yield (Kg)</th>
            <th rowspan='2'>Report on Demo/response-diseases, pests, plant growth habits etc</th>
            <th colspan='3'>No. farmers exposed</th>
            </tr>
            <tr class='evenrow'>
            <th>Planting</th>

            <th>Weeding</th>

            <th>Fertilizers</th>

            <th>Pesticide</th>

            <th>Harvesting</th>
            
          <th>F</th>
          
          <th>M</th>

            <th colspan='2'>Total</th>
        </tr>
        
          <tr class='white1'>";
          
          //$data.="<td><input type='text' name='varietyPlotA' id='varietyPlotA' /></td>";
          
          
            $data.="<td>A</td>
            <td><input type='text' name='sizePlotA' id='sizePlotA' style='width:50px;' /></td>
            <td><input type='text' name='treatmentOnePlotA' id='treatmentOnePlotA' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentTwoPlotA' id='treatmentTwoPlotA' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentThreePlotA' id='treatmentThreePlotA' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentFourPlotA' id='treatmentFourPlotA' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentFivePlotA' id='treatmentFivePlotA' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentSixPlotA' id='treatmentSixPlotA' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentSevenPlotA' id='treatmentSevenPlotA' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.plantingDatePlotA);return false;\" hidefocus=''>
                    <input  name='plantingDatePlotA' type='text' size='20' value='' id='plantingDatePlotA' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></td>

            <td>
                <p><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstWeedingDatePlotA);return false;\" hidefocus=''>
                  1<sup>st</sup> Weeding<input  name='firstWeedingDatePlotA' type='text' size='20' value='' id='firstWeedingDatePlotA' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a></p>
                <p>                    <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondWeedingDatePlotA);return false;\" hidefocus=''>
                  2<sup>nd</sup> Weeding<input  name='secondWeedingDatePlotA' type='text' size='20' value='' id='secondWeedingDatePlotA' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a> </p></td>

            <td>
                <p><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstFertilizerDatePlotA);return false;\" hidefocus=''>
                  Fertilizer-1<input  name='firstFertilizerDatePlotA' type='text' size='20' value='' id='firstFertilizerDatePlotA' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></p>
                <p>                    <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondFertilizerDatePlotA);return false;\" hidefocus=''>
                  Fertilizer-2<input  name='secondFertilizerDatePlotA' type='text' size='20' value='' id='secondFertilizerDatePlotA' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a> </p></td>

            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.pesticideDatePlotA);return false;\" hidefocus=''>
                    <input  name='pesticideDatePlotA' type='text' size='20' value='' id='pesticideDatePlotA' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a>            </td>

            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.harvestDatePlotA);return false;\" hidefocus=''>
                    <input  name='harvestDatePlotA' type='text' size='20' value='' id='harvestDatePlotA' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a>          </td>
          <td><input type='text' name='yieldPlotA' id='yieldPlotA' onkeypress='return numbersonly(event, false)' style='width:30px;' /></td>
            <td><textarea name='reportonDemoPlotA' id='reportonDemoPlotA' cols='25' rows='5'>
            </textarea></td>
            <td><input type='text' name='numFemalePlotA' id='numFemalePlotA' onKeyUp=\"xajax_calc_form8(getElementById('numFemalePlotA').value,
                                                                                                                            getElementById('numMalePlotA').value,
                                                                                                                            'numTotalPlotA');return false;\" style='width:30px;' /></td>
            <td><input type='text' name='numMalePlotA' id='numMalePlotA' onKeyUp=\"xajax_calc_form8(getElementById('numFemalePlotA').value,
                                                                                                                            getElementById('numMalePlotA').value,
                                                                                                                            'numTotalPlotA');return false;\" style='width:30px;' /></td>

            <td><input class='disabled' readonly='readonly' type='text' name='numTotalPlotA' id='numTotalPlotA' onkeypress='return numbersonly(event, false)' style='width:30px;' /></td>
        </tr>";
        
          $data.="<tr class='white1'>";
            //$data.="<td><input type='text' name='varietyPlotB' id='varietyPlotB' /></td>";
            
            
            $data.="<td>B</td>";
            $data.="<td><input type='text' name='sizePlotB' id='sizePlotB' style='width:50px;' /></td>
            <td><input type='text' name='treatmentOnePlotB' id='treatmentOnePlotB' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentTwoPlotB' id='treatmentTwoPlotB' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentThreePlotB' id='treatmentThreePlotB' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentFourPlotB' id='treatmentFourPlotB' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentFivePlotB' id='treatmentFivePlotB' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentSixPlotB' id='treatmentSixPlotB' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentSevenPlotB' id='treatmentSevenPlotB' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.plantingDatePlotB);return false;\" hidefocus=''>
                    <input  name='plantingDatePlotB' type='text' size='20' value='' id='plantingDatePlotB' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></td>

            <td>
                <p><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstWeedingDatePlotB);return false;\" hidefocus=''>
                  1<sup>st</sup> Weeding<input  name='firstWeedingDatePlotB' type='text' size='20' value='' id='firstWeedingDatePlotB' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a></p>
                <p>                    <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondWeedingDatePlotB);return false;\" hidefocus=''>
                  2<sup>nd</sup> Weeding<input  name='secondWeedingDatePlotB' type='text' size='20' value='' id='secondWeedingDatePlotB' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a> </p></td>

            <td>
                <p><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstFertilizerDatePlotB);return false;\" hidefocus=''>
                  Fertilizer-1<input  name='firstFertilizerDatePlotB' type='text' size='20' value='' id='firstFertilizerDatePlotB' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></p>
                <p>                    <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondFertilizerDatePlotB);return false;\" hidefocus=''>
                  Fertilizer-2<input  name='secondFertilizerDatePlotB' type='text' size='20' value='' id='secondFertilizerDatePlotB' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a> </p></td>

            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.pesticideDatePlotB);return false;\" hidefocus=''>
                    <input  name='pesticideDatePlotB' type='text' size='20' value='' id='pesticideDatePlotB' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a>            </td>

            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.harvestDatePlotB);return false;\" hidefocus=''>
                    <input  name='harvestDatePlotB' type='text' size='20' value='' id='harvestDatePlotB' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a>          </td>
          <td><input type='text' name='yieldPlotB' id='yieldPlotB' onkeypress='return numbersonly(event, false)' style='width:30px;' /></td>
            <td><textarea name='reportonDemoPlotB' id='reportonDemoPlotB' cols='25' rows='5'>
            </textarea></td>
            <td><input type='text' name='numFemalePlotB' id='numFemalePlotB' onKeyUp=\"xajax_calc_form8(getElementById('numFemalePlotB').value,
                                                                                                                            getElementById('numMalePlotB').value,
                                                                                                                            'numTotalPlotB');return false;\" style='width:30px;' /></td>
            <td><input type='text' name='numMalePlotB' id='numMalePlotB' onKeyUp=\"xajax_calc_form8(getElementById('numFemalePlotB').value,
                                                                                                                            getElementById('numMalePlotB').value,
                                                                                                                            'numTotalPlotB');return false;\" style='width:30px;' /></td>

            <td><input class='disabled' readonly='readonly' type='text' name='numTotalPlotB' id='numTotalPlotB' onkeypress='return numbersonly(event, false)' style='width:30px;' /></td>
        
          </tr>";
          
          //Start of the plot C record 
          
          $data.="<tr class='white1'>";
            //$data.="<td><input type='text' name='varietyPlotC' id='varietyPlotC' /></td>";
            
            $data.="<td>C</td>
            <td><input type='text' name='sizePlotC' id='sizePlotC' style='width:50px;'/></td>
            <td><input type='text' name='treatmentOnePlotC' id='treatmentOnePlotC' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentTwoPlotC' id='treatmentTwoPlotC' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentThreePlotC' id='treatmentThreePlotC' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentFourPlotC' id='treatmentFourPlotC' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentFivePlotC' id='treatmentFivePlotC' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentSixPlotC' id='treatmentSixPlotC' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentSevenPlotC' id='treatmentSevenPlotC' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.plantingDatePlotC);return false;\" hidefocus=''>
                    <input  name='plantingDatePlotC' type='text' size='20' value='' id='plantingDatePlotC' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></td>

            <td>
                <p><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstWeedingDatePlotC);return false;\" hidefocus=''>
                  1<sup>st</sup> Weeding<input  name='firstWeedingDatePlotC' type='text' size='20' value='' id='firstWeedingDatePlotC' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a></p>
                <p>                    <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondWeedingDatePlotC);return false;\" hidefocus=''>
                  2<sup>nd</sup> Weeding<input  name='secondWeedingDatePlotC' type='text' size='20' value='' id='secondWeedingDatePlotC' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a> </p></td>

            <td>
                <p><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstFertilizerDatePlotC);return false;\" hidefocus=''>
                  Fertilizer-1<input  name='firstFertilizerDatePlotC' type='text' size='20' value='' id='firstFertilizerDatePlotC' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></p>
                <p>                    <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondFertilizerDatePlotC);return false;\" hidefocus=''>
                  Fertilizer-2<input  name='secondFertilizerDatePlotC' type='text' size='20' value='' id='secondFertilizerDatePlotC' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a> </p></td>

            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.pesticideDatePlotC);return false;\" hidefocus=''>
                    <input  name='pesticideDatePlotC' type='text' size='20' value='' id='pesticideDatePlotC' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a>            </td>

            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.harvestDatePlotC);return false;\" hidefocus=''>
                    <input  name='harvestDatePlotC' type='text' size='20' value='' id='harvestDatePlotC' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a>          </td>
          <td><input type='text' name='yieldPlotC' id='yieldPlotC' onkeypress='return numbersonly(event, false)' style='width:30px;' /></td>
            <td><textarea name='reportonDemoPlotC' id='reportonDemoPlotC' cols='25' rows='5'>
            </textarea></td>
            <td><input type='text' name='numFemalePlotC' id='numFemalePlotC' onKeyUp=\"xajax_calc_form8(getElementById('numFemalePlotC').value,
                                                                                                                            getElementById('numMalePlotC').value,
                                                                                                                            'numTotalPlotC');return false;\" style='width:30px;' /></td>
            <td><input type='text' name='numMalePlotC' id='numMalePlotC'onKeyUp=\"xajax_calc_form8(getElementById('numFemalePlotC').value,
                                                                                                                            getElementById('numMalePlotC').value,
                                                                                                                            'numTotalPlotC');return false;\" style='width:30px;' /></td>

            <td><input class='disabled' readonly='readonly' type='text' name='numTotalPlotC' id='numTotalPlotC' onkeypress='return numbersonly(event, false)' style='width:30px;' /></td>
          </tr>";
          
          
          //Start of the plot D record 
          
          $data.="<tr class='white1'>";
            //$data.="<td><input type='text' name='varietyPlotD' id='varietyPlotD' /></td>";
            $data.="<td>D</td>
            <td><input type='text' name='sizePlotD' id='sizePlotD' style='width:50px;'/></td>
            <td><input type='text' name='treatmentOnePlotD' id='treatmentOnePlotD' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentTwoPlotD' id='treatmentTwoPlotD' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentThreePlotD' id='treatmentThreePlotD' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentFourPlotD' id='treatmentFourPlotD' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentFivePlotD' id='treatmentFivePlotD' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentSixPlotD' id='treatmentSixPlotD' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td><input type='text' name='treatmentSevenPlotD' id='treatmentSevenPlotD' onkeypress='return numbersonly(event, false)' style='width:30px;' maxlength='2'/></td>
            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.plantingDatePlotD);return false;\" hidefocus=''>
                    <input  name='plantingDatePlotD' type='text' size='20' value='' id='plantingDatePlotD' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></td>

            <td>
                <p><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstWeedingDatePlotD);return false;\" hidefocus=''>
                  1<sup>st</sup> Weeding<input  name='firstWeedingDatePlotD' type='text' size='20' value='' id='firstWeedingDatePlotD' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a></p>
                <p>                    <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondWeedingDatePlotD);return false;\" hidefocus=''>
                  2<sup>nd</sup> Weeding<input  name='secondWeedingDatePlotD' type='text' size='20' value='' id='secondWeedingDatePlotD' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a> </p></td>

            <td>
                <p><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstFertilizerDatePlotD);return false;\" hidefocus=''>
                  Fertilizer-1<input  name='firstFertilizerDatePlotD' type='text' size='20' value='' id='firstFertilizerDatePlotD' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></p>
                <p>                    <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondFertilizerDatePlotD);return false;\" hidefocus=''>
                  Fertilizer-2<input  name='secondFertilizerDatePlotD' type='text' size='20' value='' id='secondFertilizerDatePlotD' readonly='readonly' style='width:60px;'>
                  <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a> </p></td>

            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.pesticideDatePlotD);return false;\" hidefocus=''>
                    <input  name='pesticideDatePlotD' type='text' size='20' value='' id='pesticideDatePlotD' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a>            </td>

            <td>
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.harvestDatePlotD);return false;\" hidefocus=''>
                    <input  name='harvestDatePlotD' type='text' size='20' value='' id='harvestDatePlotD' readonly='readonly' style='width:60px;'>
                    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>                </a>          </td>
          <td><input type='text' name='yieldPlotD' id='yieldPlotD' onkeypress='return numbersonly(event, false)' style='width:30px;' /></td>
            <td><textarea name='reportonDemoPlotD' id='reportonDemoPlotD' cols='20' rows='5'>
            </textarea></td>
            <td><input type='text' name='numFemalePlotD' id='numFemalePlotD' onKeyUp=\"xajax_calc_form8(getElementById('numFemalePlotD').value,
                                                                                                                            getElementById('numMalePlotD').value,
                                                                                                                            'numTotalPlotD');return false;\" style='width:30px;' /></td>
            <td><input type='text' name='numMalePlotD' id='numMalePlotD'onKeyUp=\"xajax_calc_form8(getElementById('numFemalePlotD').value,
                                                                                                                            getElementById('numMalePlotD').value,
                                                                                                                            'numTotalPlotD');return false;\" style='width:30px;' /></td>

            <td><input class='disabled' readonly='readonly' type='text' name='numTotalPlotD' id='numTotalPlotD' onkeypress='return numbersonly(event, false)' style='width:30px;' /></td>
          </tr>";
          
          
  $data.="</table>";
$data.="</td>";
$data.="</tr>";
 
  

 //-------------------------Other table3------------------
$data.="<tr class='evenrow3'>";
    $data.="<td colspan='22'>";
    
        $data.="
        <table width='100%' border='0' cellpadding='2' cellspacing='2'>

  <tr class='evenrow'>

            <td colspan='22' align='right'>

                <div align='right'>

                    <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_form8(xajax.getFormValues('form8')); return false;\" />

                </div>

            </td>

            </tr>

            </table>
        ";
    $data.="</td>";
$data.="</tr>"; 
 //----------------------End of other table3---------------
 

$data.="</table>";
//------------------------End of main table------------------------
$data.="</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function calc_form8($female,$male,$total){
$obj=new xajaxResponse();
$totalValue=0;
$totalValue=($female+$male);
$obj->assign($total,'value',$totalValue);
return $obj;
}
function get_values($faCode,$faSex,$faAge){
$obj=new xajaxResponse();




                        $stmnt_ExDetails="SELECT *
                                    FROM `tbl_farmers` f
                                    WHERE f.`tbl_farmersId`='".$faCode."'
                                    ORDER BY f.`tbl_farmersId` ASC";
                                    
                                   // $obj->alert($stmnt_ExDetails);
                $Qtrader= @mysql_query($stmnt_ExDetails);
                $rowEx=mysql_fetch_array($Qtrader);
                //creating a date object
                                    $today=date('Y-m-d');
                                    //$obj->alert($today);
                                    $dateRef=$rowEx['farmersDob'];
                                    //$obj->alert($dateRef);
                                    $date3 = date_create($dateRef);
                                    $date4 = date_create($today);
                                    
                                    $diff34 = date_diff($date4, $date3);
                                    
                                    //accesing years
                                    $years = $diff34->y;



$sex='';
$years=0;
$sex=$rowEx['farmersSex'];
$obj->assign($faSex,'value',$sex);
$obj->assign($faAge,'value',$years);
return $obj;
}

function new_training($districtCode,$subCounty,$parish){
$obj=new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$QueryManager=new QueryManager('');

$_SESSION['districtCode']=$districtCode;
$_SESSION['subCounty']=$subCounty;
$_SESSION['parish']=$parish;


//$obj->alert($districtCode);





$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>";
$data.="
<div align='center' style=\"display:none; \" class='loading-icon'>
<img src='images/loading.gif'/>Loading...
</div>

";
$data.="<table width='100%' id='report'>";
 

$data.="<tr class='evenrow'>
<th colspan='10' ><center>In case of any training conducted, complete the Table</center></th>
        </tr>";
        
        $data.="<tr class='evenrow3'>
          <td colspan='10'>
          <table>";
          
          $data.="<tr class='evenrow'>";
          
          $data.="<td><strong>District:</strong></td>";
          $data.="<td><select name='district' id='distict'
          onchange=\"xajax_new_training(this.value,'".$subcounty."','".$parish."');return false;\" style='width:100px;'>
          <option value=''>-select-</option>";
          $data.=$QueryManager->DistrictFilterNoRegion($districtCode);
                  $data.="</select>";
                  $data.="</td>";
                  
        
          $data.="<td><strong>Subcounty:</strong></td>";
          $data.="<td><select name='subcounty' id='subcounty'
          onchange=\"xajax_new_training('".$districtCode."',this.value,'".$parish."');return false;\" style='width:100px;'>
          <option value=''>-select-</option>";
             $data.=$QueryManager->SubcountyFilterNoRegion($districtCode,$subCounty);
        $data.="</select>";
                  $data.="</td>";
        
          $data.="<td><strong>Parish:</strong></td>
          <td><select name='parish' id='parish' style='width:100px;'><option value='%'>-select-</option>";
         $data.=$QueryManager->ParishFilterNoRegion($districtCode,$subCounty,$Parish);
          $data.="</select></td>";
        
          $data.="<td>
          <div align='left'><strong>Training Village:</strong></div></td>
          <td style='width:100px;'><input type='text' name='trainingVillage' id='trainingVillage' size='50' />
          </td>
          </tr>";
          
          
        
   $data.="<tr class='evenrow'>
          <td><strong>Date of training:</strong></td>
            <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.trainingDate);return false;\" hidefocus=''>
            <input name='trainingDate' type='text'  size='15px' value='' id='trainingDate' onclick=\"xajax_trainingDateValidation(getElementById('trainingDate').value);return false;\" readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>
            </td>";
        
    $data.="<td><strong>Main Value Chain or <br> Technical Area addressed:</strong></td>
          <td><select name='valueChain' id='valueChain' style='width:90px'>";
         $data.=$QueryManager->valueChainFilter($program_id,$project_id);
          $data.="</select>
            </td>";
        
          $data.="<td><strong>Training Focus:<br>(Select ONE most relevant):</strong></div></td>
          <td><select name='trainingFocus' id='trainingFocus' style='width:90px'>
          <option value=''>-select-</option>";
         $data.=$QueryManager->trainingFocusFilter($program_id,$project_id);
          $data.="</select>
            </td>";
        
          $data.="<td><strong>Target Audience (Select the ONE most relevant):</strong></td>
          <td><select name='targetAudience' id='targetAudience' style='width:90px'><option value=''>-select-</option>";
         $data.=$QueryManager->targetAudienceFilter($program_id,$project_id);
          $data.="</select>
          </td></tr>";

$data.="</table>
        </td>
        </tr>";
        
    
    
$data.="<tr class='evenrow3'>
    <td colspan=10>";
    
    $data.="<table width='100%' border='0' cellspacing='1' cellpadding='1'>";
    $data.="<tr class='evenrow'><th colspan=22>PARTICIPANT REGISTRATION FORM</th></tr>";
    
    $data.="<tr>
    <th>No</th>
    <th>Name</th> 
    <th>Age</th>
    <th>Sex</th>
    <th>New/Old</th>
    <th>Village</th>
    <th>Type of Individual</th>
    <th>Telephone</th>
        <th>Action</th>
        </tr>";
        
        
    
        $data.="<tbody id='theBody'>";
    $data.="<tr class='evenrow'>
    <td>1.</td>
    <td> <input name='loopkeys[]' type='hidden' id='loopkeys' size='50' value='1' />
    <input name='pat_name[]' type='text' id='pat_name1' size='53' /></td>
     <td><input name='pat_age[]' type='text' id='pat_age1' onkeypress=\"return numbersonly(event, false)\" style='width:60px'; /></td>
    <td><select name='pat_sex[]' id ='pat_sex1' size='1' style='width:60px;'>
    <option value=''>-select-</option>";
    $data.="<option value='Male'>Male</option>";
        $data.="<option value='Female'>Female</option>";
    $data.="</select>
        </td>
        
    <td><select name='pat_status[]' id ='pat_status1' size='1' style='width:60px'>
    <option value=''>-select-</option>";
    $data.="<option value='New'>New</option>";
        $data.="<option value='Old'>Old</option>";
    $data.="</select>
        </td>
        
    <td><input name='pat_village[]'  type='text' id='pat_village1' size='20' /></td>
    <td><select name='typeofparticipants[]' id ='typeofparticipants1' size='1' style='width:60px'>
    <option value=''>-select-</option>";
    $queryx=mysql_query("select * from tbl_lookup where classCode='25' order by codeName asc ") or die(http("PR-2294"));
    while($rowx=mysql_fetch_array($queryx)){
    $data.="<option value=\"".$rowx['code']."\">".$rowx['codeName']."</option>";
    
    }
    $data.="</select>
        </td> 
    <td><input value=\"+256\" name='pat_tel[]'  type='text' id='pat_tel1' maxlength=15 size='20'/></td><td></td>
    </tr>
    </tbody>";

$data.="</table>
<p>
<input  type='button' class='formButton2' name='Add Participant' TITLE='Add Participant' value='Add Participant' onclick=\"javascript:addRow2()\" />
</p>";

$data.="<table style='display:none' >";
$data.="<tbody id=\"template-div\">";

$data.="<tr class='evenrow' id='report'>
    <td>1.</td>
    <td> <input name='loopkeys[]' type='hidden' id='loopkeys' size='50' value='1' />
    <input name='pat_name[]' type='text' id='pat_name1' size='53' /></td>
     <td><input name='pat_age[]' type='text' id='pat_age1' onkeypress=\"return numbersonly(event, false)\" style='width:60px'; /></td>
    <td><select name='pat_sex[]' id ='pat_sex1' size='1' style='width:60px;'>
    <option value=''>-select-</option>";
    $data.="<option value='Male'>Male</option>";
        $data.="<option value='Female'>Female</option>";
    $data.="</select>
        </td>
        
    <td><select name='pat_status[]' id ='pat_status1' size='1' style='width:60px'>
    <option value=''>-select-</option>";
    $data.="<option value='New'>New</option>";
        $data.="<option value='Old'>Old</option>";
    $data.="</select>
        </td>
        
    <td><input name='pat_village[]'  type='text' id='pat_village1' size='20' /></td>
    <td><select name='typeofparticipants[]' id ='typeofparticipants1' size='1' style='width:60px'>
    <option value=''>-select-</option>";
    $queryx=mysql_query("select * from tbl_lookup where classCode='25' order by codeName asc ") or die(http("PR-2294"));
    while($rowx=mysql_fetch_array($queryx)){
    $data.="<option value=\"".$rowx['code']."\">".$rowx['codeName']."</option>";
    
    }
    $data.="</select>
        </td> 
    <td><input value=\"+256\" name='pat_tel[]'  type='text' id='pat_tel1' maxlength=15 size='20'/></td>";
$data.="<td><input  type='button' class='formButton2'name='Remove' TITLE='Remove' value='Remove' onclick=\"removeRow2(this)\" /></td>
  </tr>";

$data.="</tbody>";
$data.="</table>";        
        $data.="</td>
     
    </tr>";

        
        
    

 $data.=" </table>";

$data.="</td></tr>";
    
    
    
    
    
  

$data.="<tr class='evenrow'>
    <td colspan=''>
    <table width='100%'>
    <tr class='evenrow'>
    <th align='center' colspan='15'>TRAINERS</th>
    </tr>";
    
    
    
    $data.="<tr class='evenrow'>
    <th>No</th>
      <th>Name</th>
      <th>Title</th>
      <th>Organization</th>
      <th>Contact</th>
      <th>Action</th>
    </tr>";
     $data.="<tbody id='theBodyTwo'>";
     
      $data.="<tr class='evenrow'>
         <td>1</td>
         <td> <input name='loop[]' type='hidden' id='loop' size='50' value='1' />";
         $data.="<input type='hidden' name='idTraining[]' id='idTraining1'/>";
         $data.="<input type='hidden' name='tbl_trainersId[]' id='tbl_trainersId1' />";
         $data.="<input name='trainers_name[]'  type='text' id='trainers_name1' size='53' /></td>
          <td> <input name='trainers_title[]'   type='text' id='trainers_title1' size='20'  /></td>
         <td><input name='trainers_organisation[]'   type='text' id='trainers_organisation1' size='20' /></td>
         <td><input name='trainers_contact[]' six='20'    type='text' id='trainers_contact1'  /></td><td></td></tr>";
        
     $data.="</tbody>";
 $data.="</table>
 <p>
 <input  type='button' class='formButton2' name='Add Rows' TITLE='Add Trainers' value='Add Trainers' onclick=\"javascript:addRow2('theBodyTwo','template-divTwo')\" />
 </p>";
 
 $data.="<table style='display:none' >";
 $data.="<tbody id=\"template-divTwo\">";
 $data.="<tr class='evenrow'>
         <td>1</td>
         <td> <input name='loop[]' type='hidden' id='loop' size='50' value='1' />";
         $data.="<input type='hidden' name='idTraining[]' id='idTraining1'/>";
         $data.="<input type='hidden' name='tbl_trainersId[]' id='tbl_trainersId1'/>";
         $data.="<input name='trainers_name[]' type='text' id='trainers_name1' size='53' /></td>
          <td> <input name='trainers_title[]' type='text' id='trainers_title1' size='20'  /></td>
         <td><input name='trainers_organisation[]'  type='text' id='trainers_organisation1' size='20' /></td>
         <td><input name='trainers_contact[]' six='20'  type='text' id='trainers_contact1'  /></td>";
 
 $data.="<td><input  type='button' class='formButton2'name='Remove' TITLE='Remove' value='Remove' onclick=\"removeRow2(this,'theBodyTwo')\" /></td>
 </tr>";
 $data.="</tbody>";
 $data.="</table>";
     
     
     $data.="</td>
    </tr>
    
    <tr class='evenrow'>
    <td colspan=10>
    <table width='100%'>
    
    
    ";    
        
    $data.="<tr class='evenrow'>
    <td>PARTICPANTS SUGGESTIONS/RECOMMENDATIONS:</td>
     <td colspan='10'><textarea name='pat_recommendations' id='pat_recommendations'  cols='100' rows='10'></textarea></td>
    </tr>";
        
        $data.="
        </table>
    </td>
</tr>";
  
  $data.="<tr><td><div class='but' align='right'>
        <input  type='button' class='formButton2' name='saveTraining' id='saveTraining' style='width:100px;' value='Save' 
        onclick=\"loadingIcon(xajax.getFormValues('projects'),'save_training');return false;\"/>
        </div></td></tr>
        </table>";
         $data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
             
    $data.="</td>
</tr>";
              
$data.="</table>
</form>";








$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}
function save_training($formValues){

$obj = new xajaxResponse();


@mysql_query("SET AUTOCOMMIT=FALSE");
@mysql_query("BEGIN TRANSACTION");

$stmnt_check="SELECT MAX(`tbl_trainingId`) as tbl_trainingId  FROM `tbl_training`";
$Qcheck=@mysql_query($stmnt_check);

//$obj->alert($stmnt_check);
$y=1;
if(@mysql_num_rows($Qcheck)>0){
$Rcheck=mysql_fetch_array($Qcheck);
$lastTrainingId=$Rcheck['tbl_trainingId'];
$nextTrainingId=($lastTrainingId+$y);
$tbl_trainingId=$nextTrainingId;  
    
}
else
{
//Setting the first Id if all tables are empty
$initialTrainingId=$y;
$tbl_trainingId=$initialTrainingId;  
}

//$obj->alert($tbl_trainingId);


$district=$formValues['district'];
$subcounty=$formValues['subcounty'];
$parish=$formValues['parish'];
$trainingVillage=$formValues['trainingVillage'];
$trainingDate=$formValues['trainingDate'];
$mainValueChain=$formValues['valueChain'];
$trainingFocus=$formValues['trainingFocus'];
$targetAudience=$formValues['targetAudience'];
$pat_recommendations=$formValues['pat_recommendations'];
$compiled_by=$formValues['compiled_by'];
$compiler_title=$formValues['compiler_title'];
$reviewed_by=$formValues['reviewed_by'];
//$titleDate=$formValues['titleDate'];
$endDate=$_SESSION['ClosingDate'];
$startDate=$_SESSION['StartDate'];


/*===================================
*=======code assisting in enforcing==
*strictly active period of===========
*reporting Data entry================
====================================*/
$DateSubmission=$trainingDate;
include('connections/reportingPeriodValidate.php');


 
/*============================
 *End of code for Active
*reporting period restriction
*==============================*/

//$obj->alert($endDate);
//$obj->alert($startDate);
 
$dateCompared=$DateSubmission;
//$obj->alert($dateCompared);

$erCount=0;

if($DateSubmission==NULL){

            $obj->alert("You cannot Continue until the date of Training is Selected.");
                        $erCount++;
                        $obj->call("hidemyLoaderDiv");
                        $obj->call("hideLoadingIcon"); 
            return $obj;


}elseif ($dateCompared<$startDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    $erCount++;
   // $obj->call("hideLoadingIcon"); 
    return $obj;
                
}elseif ($dateCompared>$endDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    $erCount++;
    //$obj->call("hideLoadingIcon"); 
    return $obj;

                
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future.");
    $erCount++;
    //$obj->call("hideLoadingIcon"); 
    return $obj;
}



if($district<>'' OR $district<>0){
    
$stmnt_training="INSERT INTO `tbl_training`(`tbl_trainingId`, `district`,
                                            `subcounty`, `parish`,
                                            `trainingVillage`, `trainingDate`,
                                            `mainValueChain`, `trainingFocus`,
                                            `targetAudience`, `pat_recommendations`)
                                            VALUES
                                            ('".$tbl_trainingId."', '".$district."',
                                            '".$subcounty."', '".$parish."',
                                            '".$trainingVillage."', '".$trainingDate."',
                                            '".$mainValueChain."', '".$trainingFocus."',
                                            '".$targetAudience."', '".$pat_recommendations."')";

//$obj->alert($stmnt_training);
@mysql_query($stmnt_training)or die(http(4458));
//@mysql_query($stmnt_participants)or die(mysql_error());
}

for($x=0;$x<count($formValues['loop']);$x++){

//Data for the trainers table
$trainers_name=$formValues['trainers_name'][$x];
$trainers_title=$formValues['trainers_title'][$x];
$trainers_organisation=$formValues['trainers_organisation'][$x];
$trainers_contact=$formValues['trainers_contact'][$x];
     
   
if($trainers_name<>'' OR $trainers_name<>0 ){
$stmnt_trainers="INSERT INTO `tbl_trainers`(`trainingId`,
                                            `trainers_name`, `trainers_title`,
                                            `trainers_organisation`, `trainers_contact`)
                                            VALUES
                                            ('".$tbl_trainingId."',
                                            '".$trainers_name."', '".$trainers_title."',
                                            '".$trainers_organisation."', '".$trainers_contact."')";
//$obj->alert($stmnt_trainers);
@mysql_query($stmnt_trainers)or die(http(4480));
//@mysql_query($stmnt_participants)or die(mysql_error());
}
}
for($k=0;$k<count($formValues['loopkeys']);$k++){
 
 
//Data for the participants table
$name=$formValues['pat_name'][$k];
$age=$formValues['pat_age'][$k];
$sex=$formValues['pat_sex'][$k];
$status=$formValues['pat_status'][$k];
$pVillage=$formValues['pat_village'][$k];
$typeOfIndividual=$formValues['typeofparticipants'][$k];
$telephone=$formValues['pat_tel'][$k];

if($age==''){
 $age=00;   
}
    
if($name<>'' OR $name<>0){    
$stmnt_participants="INSERT INTO `tbl_participants`(`trainingId`,
                                                    `name`, `age`,`sex`,
                                                    `status`, `village`,
                                                    `typeOfIndividual`, `telephone`)
                                                    VALUES
                                                    ('".$tbl_trainingId."',
                                                    '".$name."', '".$age."','".$sex."',
                                                    '".$status."', '".$pVillage."',
                                                    '".$typeOfIndividual."', '".$telephone."')";
//$obj->alert($stmnt_participants);
@mysql_query($stmnt_participants)or die(http(4507));
//@mysql_query($stmnt_participants)or die(mysql_error());
}

}


@mysql_query("COMMIT");
@mysql_query("SET AUTOCOMMIT=TRUE");
$obj->call("hidemyLoaderDiv");
$obj->assign('bodyDisplay','innerHTML',congMsg("Data successfully captured!"));
$obj->call('xajax_view_training','','','','','',1,20);
 
return $obj;    
    
}

function save_Newtraining($formValues){

$obj = new xajaxResponse();

//$obj->alert("reached method");
@mysql_query("SET AUTOCOMMIT=FALSE");
@mysql_query("BEGIN TRANSACTION");

$stmnt_check="SELECT MAX(`tbl_trainingId`) as tbl_trainingId  FROM `tbl_training`";
$Qcheck=@mysql_query($stmnt_check);


$y=1;
if(@mysql_num_rows($Qcheck)>0){
$Rcheck=mysql_fetch_array($Qcheck);
$lastTrainingId=$Rcheck['tbl_trainingId'];
$nextTrainingId=($lastTrainingId+$y);
$tbl_trainingId=$nextTrainingId;  
    
}
else
{

$initialTrainingId=$y;
$tbl_trainingId=$initialTrainingId;  
}




$district=$formValues['district'];
$subcounty=$formValues['subcounty'];
$trader_formone=$formValues['trader_name'];
$village_agent=$formValues['village_agent'];
$parish=$formValues['parish'];
$trainingVillage=$formValues['trainingVillage'];


//pva
for($x=0;$x<count($formValues['pva']);$x++){
$pvaValues=$formValues['pva'][$x];
$pva .=$pvaValues.",";
}


//EACMGS
for($x=0;$x<count($formValues['eacmgs']);$x++){
$eacmgsValues=$formValues['eacmgs'][$x];
$eacmgs .=$eacmgsValues.",";
}


//eacbgs
for($x=0;$x<count($formValues['eacbgs']);$x++){
$eacbgsValues=$formValues['eacbgs'][$x];
$eacbgs .=$eacbgsValues.",";
}


//mpe
for($x=0;$x<count($formValues['mpe']);$x++){
$mpeValues=$formValues['mpe'][$x];
$mpe .=$mpeValues.",";
}


//cpp
for($x=0;$x<count($formValues['cpp']);$x++){
$cppValues=$formValues['cpp'][$x];
$cpp .=$cppValues.",";
}

//ai
for($x=0;$x<count($formValues['ai']);$x++){
$aiValues=$formValues['ai'][$x];
$ai .=$aiValues.",";
}

//lp
for($x=0;$x<count($formValues['lp']);$x++){
$lpValues=$formValues['lp'][$x];
$lp .=$lpValues.",";
}

//ep
for($x=0;$x<count($formValues['ep']);$x++){
$epValues=$formValues['ep'][$x];
$ep .=$epValues.",";
}

//sc
for($x=0;$x<count($formValues['sc']);$x++){
$scValues=$formValues['sc'][$x];
$sc .=$scValues.",";
}


//training_receveid_pva[]
for($x=0;$x<count($formValues['training_receveid_pva']);$x++){
$training_receveid_pvaValues=$formValues['training_receveid_pva'][$x];
$training_receveid_pva .=$training_receveid_pvaValues.",";
}

//training_receveid_eacmgs[]
for($x=0;$x<count($formValues['training_receveid_eacmgs']);$x++){
$training_receveid_eacmgsValues=$formValues['training_receveid_eacmgs'][$x];
$training_receveid_eacmgs .=$training_receveid_eacmgsValues.",";
}

//training_receveid_eacbgs[]
for($x=0;$x<count($formValues['training_receveid_eacbgs']);$x++){
$training_receveid_eacbgsValues=$formValues['training_receveid_eacbgs'][$x];
$training_receveid_eacbgs .=$training_receveid_eacbgsValues.",";
}

//training_receveid_cpp[]
for($x=0;$x<count($formValues['training_receveid_cpp']);$x++){
$training_receveid_cppValues=$formValues['training_receveid_cpp'][$x];
$training_receveid_cpp .=$training_receveid_cppValues.",";
}

//training_receveid_ai[]
for($x=0;$x<count($formValues['training_receveid_ai']);$x++){
$training_receveid_aiValues=$formValues['training_receveid_ai'][$x];
$training_receveid_ai .=$training_receveid_aiValues.",";
}

//training_receveid_lp_mpe_ep_sc[]
for($x=0;$x<count($formValues['training_receveid_lp_mpe_ep_sc']);$x++){
$training_receveid_lp_mpe_ep_scValues=$formValues['training_receveid_lp_mpe_ep_sc'][$x];
$training_receveid_lp_mpe_ep_sc .=$training_receveid_lp_mpe_ep_scValues.",";
}


//$obj->alert($training_receveid_lp_mpe_ep_sc);



$trainingDate=$formValues['trainingDate_formone'];

for($x=0;$x<count($formValues['valueChain']);$x++){
$valuesChain=$formValues['valueChain'][$x];
$valuesChain_crops .=$valuesChain.",";
}


$mainValueChain=$formValues['valueChain'];
//$trainingFocus=$formValues['trainingFocus'];
$targetAudience=$formValues['targetAudience'];
$pat_recommendations=$formValues['pat_recommendations'];
$compiled_by=$formValues['compiled_by'];
$compiler_title=$formValues['compiler_title'];
$reviewed_by=$formValues['reviewed_by'];
//$titleDate=$formValues['titleDate'];
$endDate=$_SESSION['ClosingDate'];
$startDate=$_SESSION['StartDate'];


$DateSubmission=$trainingDate;
include('connections/reportingPeriodValidate.php');


 

 
$dateCompared=$DateSubmission;


$erCount=0;

if($DateSubmission==NULL){

            $obj->alert("You cannot Continue until the date of Training is Selected.");
                        $erCount++;
                        $obj->call("hideLoadingIcon"); 
            return $obj;


}elseif ($dateCompared<$startDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    $erCount++;

    return $obj;
                
}elseif ($dateCompared>$endDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    $erCount++;

    return $obj;

                
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future.");
    $erCount++;

    return $obj;
}



if($district<>'' OR $district<>0){
    
$stmnt_training="INSERT INTO `tbl_training`(
											`tbl_trader_id`,
											`tbl_village_agent_id`,
											`tbl_trainingId`,
											`district`,
											`subcounty`, `parish`,
											`trainingVillage`,
											`trainingDate`,
											`mainValueChain`,
											`trainingFocus`,
											`targetAudience`,
											`pat_recommendations`
											)
                                            VALUES
                                            ('".$trader_formone."',
											'".$village_agent."',
											'".$tbl_trainingId."',
											'".$district."',
                                            '".$subcounty."',
											'".$parish."',
                                            '".$trainingVillage."',
                                            '".$trainingDate."',
                                            '".$mainValueChain."', 
                                            '".$trainingFocus."',
                                            '".$targetAudience."',
                                            '".$pat_recommendations."')";

//$obj->alert($stmnt_training);
@mysql_query($stmnt_training)or die(mysql_error());

}

for($x=0;$x<count($formValues['loop']);$x++){


$trainers_name=$formValues['trainers_name'][$x];
$trainers_title=$formValues['trainers_title'][$x];
$trainers_organisation=$formValues['trainers_organisation'][$x];
$trainers_contact=$formValues['trainers_contact'][$x];
     
   
if($trainers_name<>'' OR $trainers_name<>0 ){
$stmnt_trainers="INSERT INTO `tbl_trainers`(`trainingId`,
                                            `trainers_name`, `trainers_title`,
                                            `trainers_organisation`, `trainers_contact`)
                                            VALUES
                                            ('".$tbl_trainingId."',
                                            '".$trainers_name."', '".$trainers_title."',
                                            '".$trainers_organisation."', '".$trainers_contact."')";
//$obj->alert($stmnt_trainers);
@mysql_query($stmnt_trainers)or die(mysql_error());
}
}
for($k=0;$k<count($formValues['loopkeys']);$k++){
 
 

$name=$formValues['pat_name'][$k];
$age=$formValues['pat_age'][$k];
$sex=$formValues['pat_sex'][$k];
$status=$formValues['pat_status'][$k];
$pVillage=$formValues['pat_village'][$k];
$typeOfIndividual=$formValues['typeofparticipants'][$k];
$telephone=$formValues['pat_tel'][$k];

if($age==''){
 $age=00;   
}
    
if($name<>'' OR $name<>0){    
$stmnt_participants="INSERT INTO `tbl_participants`(`trainingId`,
                                                    `name`,
													`age`,
													`sex`,
                                                    `status`,
													`village`,
                                                    `date_of_training`,
                                                    `pva`,
                                                    `eacmgs`,
                                                    `eacbgs`, 
                                                    `cpp`,
                                                    `ai`,
                                                    `lp_mpe_ep_sc`,
                                                    `typeOfIndividual`,
													`telephone`)
                                                    VALUES
                                                    ('".$tbl_trainingId."',
                                                    '".$name."',
													'".$age."',
													'".$sex."',
                                                    '".$status."',
													'".$pVillage."',
													'".$trainingDate."',
													'".$training_receveid_pva."',
													'".$training_receveid_eacmgs."', 
													'".$training_receveid_eacbgs."',
													'".$training_receveid_mpe."',
													'".$training_receveid_cpp."',
													'".$training_receveid_ai."',
													'".$training_receveid_lp."',
													'".$training_receveid_ep."',
													'".$training_receveid_sc."', 													
                                                    '".$typeOfIndividual."',
													'".$telephone."')";
//$obj->alert($stmnt_participants);
@mysql_query($stmnt_participants)or die(mysql_error());
}

}


@mysql_query("COMMIT");
@mysql_query("SET AUTOCOMMIT=TRUE");
$obj->call("hidemyLoaderDiv");
$obj->call("hideLoadingDiv");  
$obj->assign('bodyDisplay','innerHTML',congMsg("New Form1 Data successfully captured!"));
$obj->call('xajax_view_training','','','','','',1,20);
return $obj;    
    
}

function view_training($technicalArea,$trainingFocus,$location,$fromDate,$toDate,$cur_page=1,$records_per_page=20){
    $obj=new xajaxResponse();
    //$QueryManager=new QueryManager('');

if($_SESSION['user_id']=='')
{
$obj->redirect('index.php');
return $obj;
}


$n=1;
$inc=1;
$_SESSION['technicalArea']=$technicalArea;
$_SESSION['trainingFocus']=$trainingFocus;
$_SESSION['location']=$location;
$_SESSION['fromDate']=$fromDate;
$_SESSION['toDate']=$toDate;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$technicalArea=($_SESSION['technicalArea']<>''?$_SESSION['technicalArea']:$technicalArea);
$trainingFocus=($_SESSION['trainingFocus']<>''?$_SESSION['trainingFocus']:$trainingFocus);
$location=($_SESSION['location']<>''?$_SESSION['location']:$location);
$fromDate=($_SESSION['fromDate']<>''?$_SESSION['fromDate']:$fromDate);
$toDate=($_SESSION['toDate']<>''?$_SESSION['toDate']:$toDate);








$data="<form name='training' id='training'   method='post' action='".$PHP_SELF."' >
<table width='100%' border='0' cellpadding=1 cellspacing=1  id='report'>".filter_training();
$data.="</tr>";
$data.="<table cellpadding=1 cellspacing=1>";

//$data.="<div align='center' height='900' id='dvLoading'><span>Loading Content...</span></div>";


$data.="<tr CLASS='evenrow'><th colspan='25' ><center>Short-term Trainings</center></th></tr>";

$data.="<tr>
    <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
        <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
        <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
        <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_training(xajax.getFormValues('training'));return false;\" value='edit' /> |
        <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('training'),'Delete_training');return false;\" align='left'></td>
    </td>
</tr>"; 

$data.="<tr>
    <th rowspan='3'>#</th>
    <th rowspan='3'>Techinical Area Addressed</th>
    <th rowspan='3'>Training Focus</th>
    <th rowspan='3'>Target Audience</th>
    <th rowspan='3'>Date of Training</th>
    <th rowspan='3'>Location</th>
    <th colspan='9'>Total Number of Participants</th>
    <th colspan='9'>Age Categories</th>
    
    <th rowspan='3'>Action</th>
  </tr>
  <tr>
    <th colspan='3'>TOTAL</th>
    <th colspan='3'>NEW</th>
    <th colspan='3'>OLD</th>
    
    <th colspan='3'>Children</th>
    <th colspan='3'>Youth</th>
    <th colspan='3'>Adults</th>
    
  </tr>
  <tr>
    <th>Male</th>
    <th>Female</th>
    <th>Total</th>
    
    <th>Male</th>
    <th>Female</th>
    <th>Total</th>
    
    <th>Male</th>
    <th>Female</th>
    <th>Total</th>
    
    
    <th>Male</th>
    <th>Female</th>
    <th>Total</th>
    
    <th>Male</th>
    <th>Female</th>
    <th>Total</th>
    
    <th>Male</th>
    <th>Female</th>
    <th>Total</th>
    
  </tr>";

$m=1;


    
    $query_string="SELECT 
                    t.tbl_trainingId,
                    SUBSTR(c.`name`, 3) as `tAddressed`,
                    SUBSTR(f.`focusName`, 3) as `tFocus`,
                    SUBSTR(a.`audienceName`, 3) as `tAudience`,
                    t.trainingDate,
                    t.trainingVillage as village1,
                      
                    sum( if( `p`.`sex`='Male', 1, 0 ) ) as `pMale`,
                    sum( if( `p`.`sex`='Male' and `p`.`status`='New', 1, 0 ) ) as `nMale`,
                    sum( if( `p`.`sex`='Male' and `p`.`status`='Old', 1, 0 ) ) as `oMale`,

                    sum( if( `p`.`sex`='Male' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yMale`,
                    sum( if( `p`.`sex`='Male' and `p`.`status`='Old' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yOMale`,
                    sum( if( `p`.`sex`='Male' and `p`.`status`='New' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yNMale`,

                    sum( if( `p`.`sex`='Male' and `p`.`age`<=18, 1, 0 ) ) as `CMale`,
                    sum( if( `p`.`sex`='Male' and `p`.`status`='New' and `p`.`age`<=18, 1, 0 ) ) as `CNMale`,
                    sum( if( `p`.`sex`='Male' and `p`.`status`='Old' and `p`.`age`<=18, 1, 0 ) ) as `COMale`,

                    sum( if( `p`.`sex`='Male' and `p`.`age` >35, 1, 0 ) ) as `AMale`,
                    sum( if( `p`.`sex`='Male' and `p`.`status`='New' and `p`.`age` >35, 1, 0 ) ) as `ANMale`,
                    sum( if( `p`.`sex`='Male' and `p`.`status`='Old' and `p`.`age` >35, 1, 0 ) ) as `AOMale`,

                    sum( if( `p`.`sex`='Female', 1, 0 ) ) as `pFemale`,
                    sum( if( `p`.`sex`='Female' and `p`.`status`='New', 1, 0 ) ) as `nFemale`,
                    sum( if( `p`.`sex`='Female' and `p`.`status`='Old', 1, 0 ) ) as `oFemale`,

                    sum( if( `p`.`sex`='Female' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yFemale`,
                    sum( if( `p`.`sex`='Female' and `p`.`status`='Old' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yOFemale`,
                    sum( if( `p`.`sex`='Female' and `p`.`status`='New' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yNFemale`,

                    sum( if( `p`.`sex`='Female' and `p`.`age`<=18, 1, 0 ) ) as `CFemale`,
                    sum( if( `p`.`sex`='Female' and `p`.`status`='New' and `p`.`age`<=18, 1, 0 ) ) as `CNFemale`,
                    sum( if( `p`.`sex`='Female' and `p`.`status`='Old' and `p`.`age`<=18, 1, 0 ) ) as `COFemale`,

                    sum( if( `p`.`sex`='Female' and `p`.`age` >35, 1, 0 ) ) as `AFemale`,
                    sum( if( `p`.`sex`='Female' and `p`.`status`='New' and `p`.`age` >35, 1, 0 ) ) as `ANFemale`,
                    sum( if( `p`.`sex`='Female' and `p`.`status`='Old' and `p`.`age` >35, 1, 0 ) ) as `AOFemale`

                     
                    FROM `tbl_targetaudience` a, `tbl_trainingfocus` f, `tbl_mainvaluechain` c,`tbl_training` t
                    JOIN `tbl_participants` p 
                    ON t.`tbl_trainingId`  = p.`trainingId`
                    WHERE a.`tbl_audienceId`=t.`targetAudience`
                    AND f.`tbl_focusId`=t.`trainingFocus`
                    AND p.`display`='Yes'
                    AND c.`tbl_chainId`=t.`mainValueChain` ";

$filterValue = '';
//filter parameters
if(!empty($technicalArea)){ $filterValue.="AND c.`tbl_chainId` LIKE '".$technicalArea."%' ";}
if(!empty($trainingFocus)){ $filterValue.="AND f.`tbl_focusId` LIKE '".$trainingFocus."%' ";}
if(!empty($location)){ $filterValue.="AND t.`trainingVillage` LIKE '".$location."%' ";}
if(!empty($fromDate) && !empty($toDate)){ $filterValue.="AND (t.`trainingDate` BETWEEN '".$fromDate."' AND '".$toDate."') ";}

$query_string.=$filterValue;

$query_string.="GROUP BY t.`tbl_trainingId`
ORDER BY t.`tbl_trainingId` DESC";
    
/* $obj->alert($query_string); */
$query_=mysql_query($query_string)or die(http(__line__));
/**************
*paging parameters
*
****/
$max_records = mysql_num_rows($query_);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->addAlert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$m=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(5107));

while($rowT=mysql_fetch_array($new_query)){
$color=$n%2==1?"evenrow":"evenrow3";
                                    
$data.="<tr class=".$color.">";
$data.="<td>".$m.".<input type='checkbox'  name='tbl_trainingId[]' id='tbl_trainingId".$m."' value='".$rowT['tbl_trainingId']."' />
<input name='loopkey[]' id='loopkey".$m."' type='hidden' value='1'/>
</td>";
$data.="<td align='left'>".$rowT['tAddressed']."</td>";
$data.="<td>".$rowT['tFocus']."</td>";
$data.="<td>".$rowT['tAudience']."</td>";
$data.="<td>".$rowT['trainingDate']."</td>";
$data.="<td>".$rowT['village1']."</td>";

$data.="<td align='right'>".$rowT['pMale']."</td>";
$data.="<td align='right'>".$rowT['pFemale']."</td>";
$data.="<td align='right'>".($rowT['pMale']+$rowT['pFemale'])."</td>";

$data.="<td align='right'>".$rowT['nMale']."</td>";
$data.="<td align='right'>".$rowT['nFemale']."</td>";
$data.="<td align='right'>".($rowT['nMale']+$rowT['nFemale'])."</td>";

$data.="<td align='right'>".$rowT['oMale']."</td>";
$data.="<td align='right'>".$rowT['oFemale']."</td>";
$data.="<td align='right'>".($rowT['oMale']+$rowT['oFemale'])."</td>";

//*********determining the Age groups************************* 
$data.="<td align='right'>".$rowT['CMale']."</td>";
$data.="<td align='right'>".$rowT['CFemale']."</td>";
$data.="<td align='right'>".($rowT['CMale']+$rowT['CFemale'])."</td>";

$data.="<td align='right'>".$rowT['yMale']."</td>";
$data.="<td align='right'>".$rowT['yFemale']."</td>";
$data.="<td align='right'>".($rowT['yMale']+$rowT['yFemale'])."</td>";

$data.="<td align='right'>".$rowT['AMale']."</td>";
$data.="<td align='right'>".$rowT['AFemale']."</td>";
$data.="<td align='right'>".($rowT['AMale']+$rowT['AFemale'])."</td>";
    
    

$data.="<td colspan=''><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_training(xajax.getFormValues('training'));return false;\" value='edit' /></td>";

$data.="</tr>";
$n++;
$m++;


                                }
                                $data.="".noRecordsFound($new_query,10)."";
                                

                                
$data.="<tr>
    <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
        <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
        <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
        <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_training(xajax.getFormValues('training'));return false;\" value='edit' /> |
        <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('training'),'Delete_training');return false;\" align='left'></td>
    </td>
</tr>";



/*
*display pages
*/
$data.="<tr align='right'><td colspan=20>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
        $append_bar=$p==$num_pages?"":"|";
    if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_training('".$_SESSION['technicalArea']."','".$_SESSION['trainingFocus']."','".$_SESSION['location']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
    else $data.="<a href='#' onclick=\"xajax_view_training('".$_SESSION['technicalArea']."','".$_SESSION['trainingFocus']."','".$_SESSION['location']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
    //for($p=2;$p<$num_pages;$p++){
    $p=2;
    while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
        $data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_training('".$_SESSION['technicalArea']."','".$_SESSION['trainingFocus']."','".$_SESSION['location']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
    }
    $p++;
    }
    if($p==$num_pages){
            $data.="...<a href='#' onclick=\"xajax_view_training('".$_SESSION['technicalArea']."','".$_SESSION['trainingFocus']."','".$_SESSION['location']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
            }
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_training('".$_SESSION['technicalArea']."','".$_SESSION['trainingFocus']."','".$_SESSION['location']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$cur_page."',this.value)\">";
    $i=1;
    $selected="";
    while($i*10<=$max_records){
        $selected=$i*10==$records_per_page?"SELECTED":"";
        $data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
        $i++;
    }
    
    $sel=$records_per_page>=$max_records?"SELECTED":"";
    $data.="<option value='".$max_records."' ".$sel.">All</option>";
    $data.="</select>";
    $data.="</br></td></tr><table>";
    
    $data.="<table>";
        
   $data.="</tr>
   </table>
   </form>";
        
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;


}

function form1_view_both_forms(){
$obj = new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$data="<form action=\"".$PHP_SELF."\" name='form2' id='form2' method='post'>
<table  width='920px' height='400px'  border='0' cellspacing='1' cellpadding='1'>

<tr>
<th><center><font size=''>&nbsp;&nbsp;Pick Form One to use for capturing data</font> </center>
   </th>
</tr>

<tr>
    <td>
        <div  class='fond'>
        <div  style='cursor:pointer; font-size:18px; font-weight:bold;'>
            <a onclick=\"loadingIconFormOne('go_to_form1_legacy_form');return false;\">
                <div align='center' class='style_prevu_kit' style='background-color:#8CD6DE; '>
                    <span style='color: #011F63; font-size: 250%;'>Legacy-Form One</span>
                </div>
            </a>        
            <a onclick=\"loadingIconFormOne('go_to_form1_new_form');return false;\">
                <div align='center' class='style_prevu_kit' style='background-color:#97bf0d; '>
                    
                    <span style='color: #011F63; font-size: 250%;'>New-Form One</span>
                </div>
            </a>
        </div>


        
    </td>
</tr>";


$data.="<tr class='green'>
<td><i>Please, click on the form that you wish to access</i></td>
</tr>"; 

$data.="</table>";
    
    

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}


function delete_training($formValues){
$obj=new xajaxResponse();
        //$obj->alert($formvalues[$unique_column]);
        //$obj->alert(count($formvalues[$unique_column]));

if(count($formValues['tbl_trainingId'])>0){
for($x=0;$x<count($formValues['tbl_trainingId']);$x++){
    //$code=$formvalues[$unique_column][$x];
    $sql="DELETE  t.* FROM `tbl_training` t  WHERE  t.`tbl_trainingId`='".$formValues['tbl_trainingId'][$x]."'";
        $sql2="DELETE a.* FROM  `tbl_trainers` a WHERE  a.`trainingId`='".$formValues['tbl_trainingId'][$x]."'";
        $sql3="DELETE f.* FROM  `tbl_participants` f WHERE  f.`trainingId`='".$formValues['tbl_trainingId'][$x]."'";
    //$obj->alert($sql);
if($sql<>''){

@mysql_query($sql)or die(http(5348)." project_training.php");
@mysql_query($sql)or die(http(5349)." project_training.php");
@mysql_query($sql)or die(http(5350)." project_training.php");
//$obj->alert("Record successfully Deleted!");
}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Training Record successfully Deleted!"));
$obj->call('xajax_view_training','','','','','',1,20);
return $obj;
}//-----------------------------------------------------------End of function delete Training Form1-----------------------------------------
function view_trainingDetails($prog_id,$project_id,$year,$semi_annual,$div){
$obj=new xajaxResponse();
$classCode=25;
$data="<table cellspacing='0'><tr><td colspan='11' align='right'><input name='Close' class='formButton2' type='button' value='Close' onclick=\"xajax_close('".$div."');return false;\"></td></tr><tr CLASS='evenrow'>
  <th colspan=2>NO</th>
    <th>Project</th>
  <th>date</th>
  <th>Provided by</th>
    <th>Training Area</th>
    
    <th colspan='5'> number of Participants</th>";

 $n=1;
 
        $sql=QueryManager::ViewTrainingDetails($prog_id,$project_id,$semi_annual,$year);
            $query=@mysql_query($sql)or die(http("PR-2985"));
                 while($row=@mysql_fetch_array($query)){
                    $orgdate="org_date".$n;
//$obj->alert($row['projectName']);
$data.=Backgroundstyle($n).loop_key('training_id',$row['training_id'])."
  <td>".$n."</td> 
  <td align='left'>".checkExistance($row['projectName'],NULL,'ExistsString')."</td>
  <td align='left'>".$row['organizing_date']."</td>
   <td>".$row['trainer']."</td>
    <td>".$row['course']."</td>
   
    <td colspan='5'><table width='300px'><tr><th colspan='2'>Type of Participants</th><th>Male</th><th>Female</th><th>Total</th></tr>";
    $query1=@mysql_query("select * from tbl_lookup l inner  join tbl_training t on(t.typeofparticipants=l.code) where classCode like '".$classCode."'
     and course like '".$row['course']."%' and t.prog_id='".$row['prog_id']."' and  t.`semi_annual`  like '".$row['semi_annual']."%'  and t.`year`  like '".$row['year']."%'
     group by code
     order by codeName asc")or die(http("PR-2895"));
    while($rowx=@mysql_fetch_array($query1)){
    
    
    $data.="<tr><td><input type='checkbox' checked='checked' disabled name='typeofparticpants' id='typeofparticpants' value='".$rowx['codeName']."' ".checkExistance($row['typeofparticipants'],$row['code'],'checked')." ></td><td>".$rowx['codeName']."</td> 
    <td align='right'>".checkExistance($rowx['male'],'','ExistsInteger')."</td>
     <td align='right'>".checkExistance($rowx['female'],'','ExistsInteger')."</td>
     <td align='right'><strong>".checkExistance($rowx['total'],'','ExistsInteger')."</strong></td></tr>";
     
     }
     
     //--------Totals for the Participants------------------------------------------------------------
     
     $query2=@mysql_query("select sum(t.male) as male,sum(t.female) as female, sum(t.total) as total,t.status from tbl_lookup l inner  join tbl_training t on(t.typeofparticipants=l.code) where classCode like '".$classCode."'
     and course like '".$row['course']."%' and t.prog_id='".$row['prog_id']."' and  t.`semi_annual`  like '".$row['semi_annual']."%'  and t.`year`  like '".$row['year']."%'
     group by t.status
     order by codeName asc")or die(http("PR-2895"));
$rowParticipant=@mysql_fetch_array($query2);
     
     
     
     $data.="<tr><td colspan='2'><strong>Total</strong></td> 
    <td align='right'><strong>".checkExistance($rowParticipant['male'],'','ExistsInteger')."</strong></td>
     <td align='right'><strong>".checkExistance($rowParticipant['female'],'','ExistsInteger')."</strong></td>
     <td align='right'><strong>".checkExistance($rowParticipant['total'],'','ExistsInteger')."</strong></td></tr>";
     #--- end of ---Totals for the Participants---------------------------------------------------------
     
     $data.="</table></td>
   

 
  </tr>";
  $n++;
  }
 $data.=noRecordsFound($query,10)."<tr><td colspan='11' align='right'><input name='Close' class='formButton2' type='button' value='Close' onclick=\"xajax_close('".$div."');return false;\"></td></tr></table>";

$obj->assign($div,'innerHTML',$data);
return $obj;
}
function trainingDateValidation($date){
$obj= new xajaxResponse();
//$dateValue='';

$endDate=$_SESSION['ClosingDate'];
$startDate=$_SESSION['StartDate'];
//$obj->alert($startDate);

if($dateValue>=$startDate AND $dateValue<=$endDate){
    
    //$obj->alert($startDate);

$obj->assign($date,"value",$dateValue);
return $obj;
}else{
    
 $obj->alert("Your are trying to enter the date of training in a wrong Quater
             Please try ".$_SESSION['quarter']."");
 $dateValue='';
 $obj->assign($date,"value",$dateValue);
 $obj->call("hideLoadingDiv"); 
 return $obj;       
}


}
function calc_training($male,$female,$total){
$obj= new xajaxResponse();
$totalValue=0;
//$obj->addAlert($total."ppppppppp");
$totalValue=($male+$female);
//$obj->addAlert($total."ppppppppp".$q1."-".$q2."-".$q3."-".$targetValue);
$obj->assign($total,"value",$totalValue);
return $obj;
}
function AttachFile($attachFile,$table_name){
$obj=new xajaxResponse();

                
                        $url="z_uploadFiles.php?id=$attachFile&&table_name=$table_name";
                    //$obj->alert($url);
                        $obj->call("popUpWindow",$url, 400, 400, 500, 400);
                        //$conceptNoteIdValue=$conceptNoteId['id'];
                        //$obj->assign('bodyDisplay','innerHTML',$data);
                        //$obj->call("xajax_home",'','','', 1, 20);
                        return $obj;
        
        }

function form1_newForm_training($trader,$village_agent,$districtCode,$subCounty,$parish){
$obj=new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$QueryManager=new QueryManager('');

$_SESSION['districtCode']=$districtCode;
$_SESSION['subCounty']=$subCounty;
$_SESSION['parish']=$parish;

$_SESSION['trader']=$trader;
$_SESSION['village_agent']=$village_agent;


//$obj->alert($districtCode);





$data="<form action=\"".$_SERVER['PHP_SELF']."\" name='newForm1' id='newForm1' method='post'>";
$data.="
<div align='center' style=\"display:none; \" class='loading-icon'>
<img src='images/loading.gif'/>Loading...
</div>

";
$data.="<table width='100%' id='report'>";
 

$data.="<tr class='evenrow'>
<th colspan='10' ><center>In case of any training conducted, complete the Table</center></th>
        </tr>

<tr>
    <td colspan='10'>
    1.IDENTIFICATION:
    </td>
</tr>

        ";
        
        $data.="<tr class='evenrow3'>
          <td colspan='10'>
          <table>";
          
          $data.="<tr class='evenrow'>";

          $data.="<td><strong>Trader Name:</strong></td>";
          $data.="<td><select name='trader_name' id='trader_name'
          onchange=\"xajax_form1_newForm_training(
          this.value,'".$village_agent."','".$districtCode."','".$subcounty."','".$parish."');return false;\" style='width:100px;'>
          <option value=''>-select-</option>";
          $data.=$QueryManager->TraderFilterFormOne($trader);
                  $data.="</select>";
                  $data.="</td>";


          $data.="<td><strong>Village Agent Name:</strong></td>";
          $data.="<td><select name='village_agent' id='village_agent'
          onchange=\"xajax_form1_newForm_training('".$trader."',this.value,'".$districtCode."','".$subcounty."','".$parish."');return false;\" style='width:100px;'>
          <option value=''>-select-</option>";
          $data.=$QueryManager->VillageFilterFormOne($trader,$village_agent);
                  $data.="</select>";
                  $data.="</td>";



          

          $data.="<td><strong>District:</strong></td>";
          $data.="<td><select name='district' id='distict'
          onchange=\"xajax_form1_newForm_training('".$trader."','".$village_agent."',this.value,'".$subcounty."','".$parish."');return false;\" style='width:100px;'>
          <option value=''>-select-</option>";
          $data.=$QueryManager->DistrictFilterNoRegion($districtCode);
                  $data.="</select>";
                  $data.="</td>";
                  
        
          $data.="<td><strong>Subcounty:</strong></td>";
          $data.="<td><select name='subcounty' id='subcounty'
          onchange=\"xajax_form1_newForm_training('".$trader."','".$village_agent."','".$districtCode."',this.value,'".$parish."');return false;\" style='width:100px;'>
          <option value=''>-select-</option>";
             $data.=$QueryManager->SubcountyFilterNoRegion($districtCode,$subCounty);
        $data.="</select>";
                  $data.="</td>";
        
          $data.="<td><strong>Parish:</strong></td>
          <td><select name='parish' id='parish' style='width:100px;'><option value='%'>-select-</option>";
         $data.=$QueryManager->ParishFilterNoRegion($districtCode,$subCounty,$Parish);
          $data.="</select></td>";
        
          $data.="<td>
          <div align='left'><strong>Training Village:</strong></div></td>
          <td style='width:100px;'><input type='text' name='trainingVillage' id='trainingVillage' size='50' />
          </td>
          </tr>";
          
          
        
         $data.="<tr class='evenrow'>
           <td large-cell-header><strong>Date of training:</strong></td>
             <td class='large-cell-header'>
             <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.newForm1.trainingDate_formone);return false;\" hidefocus=''>
             <input name='trainingDate_formone' type='text'  size='15px' value='' id='trainingDate_formone' onclick=\"xajax_trainingDateValidation(getElementById('trainingDate_formone').value);return false;\" readonly='readonly' />
             <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>
             
             </td>";
        
    $data.="<td><strong>Main Value Chain or <br> Technical Area addressed:</strong></td>
          <td class='large-form-label'>";
         $data.=$QueryManager->valueChainFilterFromOne($program_id);
          $data.="</td>";
        
   //        $data.="<td><strong>Training Focus:<br>(Select ONE most relevant):</strong></div></td>
   //        <td><select name='trainingFocus' id='trainingFocus' style='width:90px'>
   //        <option value=''>-select-</option>";
         // $data.=$QueryManager->trainingFocusFilter($program_id,$project_id);
         //  $data.="</select>
   //          </td>";
        
          $data.="<td><strong>Target Audience (Select the ONE most relevant):</strong></td>
          <td><select name='targetAudience' id='targetAudience' style='width:90px'><option value=''>-select-</option>";
         $data.=$QueryManager->targetAudienceFilterFormOne($program_id);
          $data.="</select>
          </td></tr>";

$data.="</table>
        </td>
        </tr>";
        
        

$data.="
<tr>
    <td colspan='10'>
    2.List of Topics:(Trader/Village Agent should Tick the most relevant trainings conducted):
    </td>
</tr>

    
<tr>
    <td colspan='10'>
        <table width='100%' border='0' cellspacing='1' cellpadding='1'>
            <tr class='evenrow'>
            
                <td valign='top'>
                    <table width='100%' border='0' cellspacing='1' cellpadding='1'>
                    
                    <tr>
                    <th colspan='3'>1.Posters/video Animations(PVA)</li></th>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>1.1</td>
                        <td class='large-cell-header'>Post-Harvest Handling(PHH)</td>
                        <td class='small-cell-header'>
                        <input type='checkbox' name='pva[]' id='pva1' value='Post-Harvest Handling'/>
                        </td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>1.2</td>
                        <td class='large-cell-header'>Conservation Tillage</td>
                        <td class='small-cell-header'>
                        <input type='checkbox' name='pva[]' id='pva2' value='Conservation Tillage'/>
                        </td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>1.3</td>
                        <td class='large-cell-header'>Crop Insurance</td>
                        <td class='small-cell-header'>
                            <input type='checkbox' name='pva[]' id='pva3' value='Crop Insurance'/>
                        </td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>1.4</td>
                        <td class='large-cell-header'>Soil testing</td>
                        <td class='small-cell-header'>
                            <input type='checkbox' name='pva[]' id='pva4' value='Soil testing'/>
                        </td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>1.5</td>
                        <td class='large-cell-header'>Value Chain</td>
                        <td class='small-cell-header'>
                            <input type='checkbox' name='pva[]' id='pva5' value='Value Chain'/>
                        </td>
                    </tr>
                    
                    <tr>
                    <th colspan='3'>2.East African Community Maize Grain Standards(EACMGS)</th>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>2.1</td>
                        <td class='large-cell-header'>Maize is Money:Maximise Production</td>
                        <td class='small-cell-header'>
                            <input type='checkbox' name='eacmgs[]' id='eacmgs1' value='Maize is Money:Maximise Production'/>
                        </td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>2.2</td>
                        <td class='large-cell-header'>Maize is Money:Keep it clean</td>
                        <td class='small-cell-header'>
                            <input type='checkbox' name='eacmgs[]' id='eacmgs2' value='Maize is Money:Keep it clean'/>
                        </td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>2.3</td>
                        <td class='large-cell-header'>Maize is Money:Dry it Properly</td>
                        <td class='small-cell-header'>
                        <input type='checkbox' name='eacmgs[]' id='eacmgs3' value='Maize is Money:Dry it Properly'/>
                        </td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>2.4</td>
                        <td class='large-cell-header'>Maize is Money:Handle with Care</td>
                        <td class='small-cell-header'>
                        <input type='checkbox' name='eacmgs[]' id='eacmgs4' value='Maize is Money:Handle with Care'/>
                        </td>
                    </tr>
                    
                    <tr>
                    <th colspan='3'>3.East African Community Beans Grain Standards(EACBGS)</th>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>3.1</td>
                        <td class='large-cell-header'>Dry Beans it Properly</td>
                        <td class='small-cell-header'>
                            <input type='checkbox' name='eacbgs[]' id='eacbgs1' value='Dry Beans it Properly'/>                    
                        </td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>3.2</td>
                        <td class='large-cell-header'>Handle Beans with Care and Keep them Clean</td>
                        <td class='small-cell-header'>
                            <input type='checkbox' name='eacbgs[]' id='eacbgs2' value='Handle Beans with Care and Keep them Clean'/>
                        </td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>3.3</td>
                        <td class='large-cell-header'>Maximise Production</td>
                        <td class='small-cell-header'>
                            <input type='checkbox' name='eacbgs[]' id='eacbgs3' value='Maximise Production'/>
                        </td>
                    </tr>
                    
                    <tr>
                    <th colspan='3'>4.Market,Price and e-Payments(MPE)</th>
                    </tr>
                    
                    <tr class='white1'>
                    <td class='first-cell-header'>4.1</td>
                    <td class='large-cell-header'>Market Information</td>
                    <td class='small-cell-header'><input type='checkbox' name='mpe[]' id='mpe1' value='Market Information'/></td>
                    </tr>
                    
                    <tr class='white1'>
                    <td class='first-cell-header'>4.2</td>
                    <td class='large-cell-header'>E-payments/Mobile App</td>
                    <td class='small-cell-header'><input type='checkbox' name='mpe[]' id='mpe2' value='E-payments/Mobile App'/></td>
                    </tr>
                    
                    <tr class='white1'>
                    <td class='first-cell-header'>4.3</td>
                    <td class='large-cell-header'>Bulking</td>
                    <td class='small-cell-header'><input type='checkbox' name='mpe[]' id='mpe3' value='Bulking'/></td>
                    </tr>

                    </table>
                
                </td>";
                
                $data.="<td>
                
                    <table width='100%' border='0' cellspacing='1' cellpadding='1'>
                    <tr>
                        <th colspan='3' >5.Coffee Production Poster(CPP)</th>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>5.1</td>
                        <td class='large-cell-header'>Establishment of a coffee farm</td>
                        <td class='small-cell-header'><input type='checkbox' name='cpp[]' id='cpp1' value='Establishment of a coffee farm'/></td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>5.2</td>
                        <td class='large-cell-header'>Harvesting and post-harvest handling of coffee</td>
                        <td class='small-cell-header'><input type='checkbox' name='cpp[]' id='cpp2' value='Harvesting and post-harvest handling of coffee'/></td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>5.3</td>
                        <td class='large-cell-header'>Main diseases of coffee and control</td>
                        <td class='small-cell-header'><input type='checkbox' name='cpp[]' id='cpp3' value='Main diseases of coffee and control'/></td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>5.4</td>
                        <td class='large-cell-header'>Main insect pests of coffee</td>
                        <td class='small-cell-header'><input type='checkbox' name='cpp[]' id='cpp4' value='Main insect pests of coffee'/></td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>5.5</td>
                        <td class='large-cell-header'>Management of a coffee farm</td>
                        <td class='small-cell-header'>
                            <input type='checkbox' name='cpp[]' id='cpp5' value='Management of a coffee farm'/>
                        </td>
                    </tr>
                    
                    <tr class='white1'>
                    <td class='first-cell-header'>5.6</td>
                    <td class='large-cell-header'>Social responsibility posters</td>
                    <td class='small-cell-header'>
                        <input type='checkbox' name='cpp[]' id='cpp6' value='Social responsibility posters'/>
                    </td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>5.7</td>
                        <td class='large-cell-header'>Climate change</td>
                        <td class='small-cell-header'>
                            <input type='checkbox' name='cpp[]' id='cpp7' value='Climate change'/>
                        </td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>5.8</td>
                        <td class='large-cell-header'>Coffee farming as a business posters</td>
                        <td class='small-cell-header'><input type='checkbox' name='cpp[]' id='cpp8' value='Coffee farming as a business posters'/></td>
                    </tr>
                    
                    <tr class='white1'>
                        <th colspan='3'>6.Agro Inputs(AI)</th>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>6.1</td>
                        <td class='large-cell-header'>Safe use/handling of Agro-inputs</td>
                        <td class='small-cell-header'><input type='checkbox' name='ai[]' id='ai1' value='Safe use/handling of Agro-inputs'/></td>
                    </tr>
                    
                    <tr>
                        <th colspan='3'>7.Leaderships:(LP)</th>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>7.1</td>
                        <td class='large-cell-header'>Trader Poster</td>
                        <td class='small-cell-header'><input type='checkbox' name='lp[]' id='lp1' value='Trader Poster'/></td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>7.2</td>
                        <td class='large-cell-header'>Village Agent Poster</td>
                        <td class='small-cell-header'><input type='checkbox' name='lp[]' id='lp2' value='Village Agent Poster'/></td>
                    </tr>
                    
                    <tr>
                        <th colspan='3'>8.Entreprenuership(EP)</th>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>8.1</td>
                        <td class='large-cell-header'>Business Management</td>
                        <td class='small-cell-header'><input type='checkbox' name='ep[]' id='ep1' value='Business Management'/></td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>8.2</td>
                        <td class='large-cell-header'>Book Keeping</td>
                        <td class='small-cell-header'><input type='checkbox' name='ep[]' id='ep2' value='Book Keeping'/></td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>8.3</td>
                        <td class='large-cell-header'>Marketing the business</td>
                        <td class='small-cell-header'><input type='checkbox' name='ep[]' id='ep3' value='Marketing the business'/></td>
                    </tr>
                    
                    <tr>
                        <th colspan='3'>9.Saving Mobilization and credit access(SC)</th>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>9.1</td>
                        <td class='large-cell-header'>Savings mobilised through associations</td>
                        <td class='small-cell-header'><input type='checkbox' name='sc[]' id='sc1' value='Savings mobilised through associations'/></td>
                    </tr>
                    
                    <tr class='white1'>
                        <td class='first-cell-header'>9.2</td>
                        <td class='large-cell-header'>Credit access through banks</td>
                        <td class='small-cell-header'><input type='checkbox' name='sc[]' id='sc2' value='Credit access through banks'/></td>
                    </tr>
                    
                    </table>
                
                </td>
                
            </tr>
        </table>        
    </td>
</tr>
";      
    
    
$data.="<tr class='evenrow3'>
    <td colspan=10>";
    
    $data.="<table width='100%' border='0' cellspacing='1' cellpadding='1'>";
    $data.="<tr class='evenrow'><th colspan=22>PARTICIPANT REGISTRATION FORM</th></tr>";
    
    $data.="<tr>
    <th>No</th>
    <th>Name</th> 
    <th>Age</th>
    <th>Sex</th>
    <th>New/Old</th>
    <th>Village</th>
    <th>Type of Individual</th>
    <th>Telephone</th>
    <th>Date of training</th>
        <th>Training Received</th>
          <th>Action</th>
        </tr>";
        
        
    
        $data.="<tbody id='theBody'>";
    $data.="<tr class='evenrow'>
    <td>1.</td>
    <td> <input name='loopkeys[]' type='hidden' id='loopkeys' size='50' value='1' />
    <input name='pat_name[]' type='text' id='pat_name1' size='53' /></td>
     <td><input name='pat_age[]' type='text' id='pat_age1' onkeypress=\"return numbersonly(event, false)\" style='width:60px'; /></td>
    <td><select name='pat_sex[]' id ='pat_sex1' size='1' style='width:60px;'>
    <option value=''>-select-</option>";
    $data.="<option value='Male'>Male</option>";
        $data.="<option value='Female'>Female</option>";
    $data.="</select>
        </td>
        
    <td><select name='pat_status[]' id ='pat_status1' size='1' style='width:60px'>
    <option value=''>-select-</option>";
    $data.="<option value='New'>New</option>";
        $data.="<option value='Old'>Old</option>";
    $data.="</select>
        </td>
        
    <td><input name='pat_village[]'  type='text' id='pat_village1' size='20' /></td>
    <td><select name='typeofparticipants[]' id ='typeofparticipants1' size='1' style='width:60px'>
    <option value=''>-select-</option>";
    $queryx=mysql_query("select * from tbl_lookup where classCode='25' order by codeName asc ") or die(http("PR-2294"));
    while($rowx=mysql_fetch_array($queryx)){
    $data.="<option value=\"".$rowx['code']."\">".$rowx['codeName']."</option>";
    
    }
    $data.="</select>
        </td> 
        <td><input value=\"+256\" name='pat_tel[]'  type='text' id='pat_tel1' maxlength=15 size='20'/></td>

               <td class='large-cell-header'>            
             <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'training_participant_date').attr('id')));return false;\" 
                hidefocus=''>
                <input 
                name='training_participant_date[]' 
                size='20' value='' 
                id='training_participant_date1'
                type='text' readonly='readonly'/>
                <img name='popcal' src='WeekPicker/calbtn.gif' alt='datePicker' align='absmiddle' border='0' height='22' width='25px'>
                </a>
             </td>

             <td class='largest-cell-header-formone'>
             <input type='checkbox' name='training_receveid_pva[]' id=training_receveid_pva1' value='PVA'>PVA</input>
             <input type='checkbox' name='training_receveid_eacmgs[]' id=training_receveid_eacmgs1' value='EACMGS'>EACMGS</input>
             <input type='checkbox' name='training_receveid_eacbgs[]' id=training_receveid_eacbgs1' value='EACBGS'>EACBGS</input>
             <input type='checkbox' name='training_receveid_cpp[]' id=training_receveid_cpp1' value='CPP'>CPP</input>
             <input type='checkbox' name='training_receveid_ai[]' id=training_receveid_ai1' value='AI'>AI</input>
             <input type='checkbox' name='training_receveid_lp_mpe_ep_sc[]' id=training_receveid_lp_mpe_ep_sc1' value='LP/MPE/EP/SC'>LP/MPE/EP/SC</input>


             </td>

      
    </tbody>";

$data.="</table>
<p>
<input  type='button' class='formButton2' name='Add Participant' TITLE='Add Participant' value='Add Participant' onclick=\"javascript:addRow2()\" />
</p>";

$data.="<table style='display:none' >";
$data.="<tbody id=\"template-div\">";

$data.="<tr class='evenrow' id='report'>
    <td>1.</td>
    <td> <input name='loopkeys[]' type='hidden' id='loopkeys' size='50' value='1' />
    <input name='pat_name[]' type='text' id='pat_name1' size='53' /></td>
     <td><input name='pat_age[]' type='text' id='pat_age1' onkeypress=\"return numbersonly(event, false)\" style='width:60px'; /></td>
    <td><select name='pat_sex[]' id ='pat_sex1' size='1' style='width:60px;'>
    <option value=''>-select-</option>";
    $data.="<option value='Male'>Male</option>";
        $data.="<option value='Female'>Female</option>";
    $data.="</select>
        </td>
        
    <td><select name='pat_status[]' id ='pat_status1' size='1' style='width:60px'>
    <option value=''>-select-</option>";
    $data.="<option value='New'>New</option>";
        $data.="<option value='Old'>Old</option>";
    $data.="</select>
        </td>
        
    <td><input name='pat_village[]'  type='text' id='pat_village1' size='20' /></td>
    <td><select name='typeofparticipants[]' id ='typeofparticipants1' size='1' style='width:60px'>
    <option value=''>-select-</option>";
    $queryx=mysql_query("select * from tbl_lookup where classCode='25' order by codeName asc ") or die(http("PR-2294"));
    while($rowx=mysql_fetch_array($queryx)){
    $data.="<option value=\"".$rowx['code']."\">".$rowx['codeName']."</option>";
    
    }
    $data.="</select>
        </td> 
    <td><input value=\"+256\" name='pat_tel[]'  type='text' id='pat_tel1' maxlength=15 size='20'/></td>";

   $data.=" <td class='large-cell-header'>           
                <a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'training_participant_date').attr('id')));return false;\" 
                hidefocus=''>
                <input 
                name='training_participant_date[]' 
                size='20' value='' 
                id='training_participant_date1'
                type='text' readonly='readonly'/>
                <img name='popcal' src='WeekPicker/calbtn.gif' alt='datePicker' align='absmiddle' border='0' height='22' width='25px'>
                </a>
             </td>
                          <td class='largest-cell-header-formone'>
             <input type='checkbox' name='training_receveid_pva[]' id=training_receveid_pva1' value='PVA'>PVA</input>
             <input type='checkbox' name='training_receveid_eacmgs[]' id=training_receveid_eacmgs1' value='EACMGS'>EACMGS</input>
             <input type='checkbox' name='training_receveid_eacbgs[]' id=training_receveid_eacbgs1' value='EACBGS'>EACBGS</input>
             <input type='checkbox' name='training_receveid_cpp[]' id=training_receveid_cpp1' value='CPP'>CPP</input>
             <input type='checkbox' name='training_receveid_ai[]' id=training_receveid_ai1' value='AI'>AI</input>
             <input type='checkbox' name='training_receveid_lp_mpe_ep_sc[]' id=training_receveid_lp_mpe_ep_sc1' value='LP/MPE/EP/SC'>LP/MPE/EP/SC</input>


             </td>
                ";



$data.="<td><input  type='button' class='formButton2'name='Remove' TITLE='Remove' value='Remove' onclick=\"removeRow2(this)\" /></td>
  </tr>";

$data.="</tbody>";
$data.="</table>";        
        $data.="</td>
     
    </tr>";

        
        
    

 $data.=" </table>";

$data.="</td></tr>";
    
    
    
    
    
  

$data.="<tr class='evenrow'>
    <td colspan=''>
    <table width='100%'>
    <tr class='evenrow'>
    <th align='center' colspan='15'>TRAINERS</th>
    </tr>";
    
    
    
    $data.="<tr class='evenrow'>
    <th>No</th>
      <th>Name</th>
      <th>Title</th>
      <th>Organization</th>
      <th>Contact</th>
      <th>Action</th>
    </tr>";
     $data.="<tbody id='theBodyTwo'>";
     
      $data.="<tr class='evenrow'>
         <td>1</td>
         <td> <input name='loop[]' type='hidden' id='loop' size='50' value='1' />";
         $data.="<input type='hidden' name='idTraining[]' id='idTraining1'/>";
         $data.="<input type='hidden' name='tbl_trainersId[]' id='tbl_trainersId1' />";
         $data.="<input name='trainers_name[]'  type='text' id='trainers_name1' size='53' /></td>
          <td> <input name='trainers_title[]'   type='text' id='trainers_title1' size='20'  /></td>
         <td><input name='trainers_organisation[]'   type='text' id='trainers_organisation1' size='20' /></td>
         <td><input name='trainers_contact[]' six='20'    type='text' id='trainers_contact1'  /></td><td></td></tr>";
        
     $data.="</tbody>";
 $data.="</table>
 <p>
 <input  type='button' class='formButton2' name='Add Rows' TITLE='Add Trainers' value='Add Trainers' onclick=\"javascript:addRow2('theBodyTwo','template-divTwo')\" />
 </p>";
 
 $data.="<table style='display:none' >";
 $data.="<tbody id=\"template-divTwo\">";
 $data.="<tr class='evenrow'>
         <td>1</td>
         <td> <input name='loop[]' type='hidden' id='loop' size='50' value='1' />";
         $data.="<input type='hidden' name='idTraining[]' id='idTraining1'/>";
         $data.="<input type='hidden' name='tbl_trainersId[]' id='tbl_trainersId1'/>";
         $data.="<input name='trainers_name[]' type='text' id='trainers_name1' size='53' /></td>
          <td> <input name='trainers_title[]' type='text' id='trainers_title1' size='20'  /></td>
         <td><input name='trainers_organisation[]'  type='text' id='trainers_organisation1' size='20' /></td>
         <td><input name='trainers_contact[]' six='20'  type='text' id='trainers_contact1'  /></td>";
 
 $data.="<td><input  type='button' class='formButton2'name='Remove' TITLE='Remove' value='Remove' onclick=\"removeRow2(this,'theBodyTwo')\" /></td>
 </tr>";
 $data.="</tbody>";
 $data.="</table>";
     
     
     $data.="</td>
    </tr>
    
    <tr class='evenrow'>
    <td colspan=10>
    <table width='100%'>
    
    
    ";    
        
    $data.="<tr class='evenrow'>
    <td>PARTICPANTS SUGGESTIONS/RECOMMENDATIONS:</td>
     <td colspan='10'><textarea name='pat_recommendations' id='pat_recommendations'  cols='100' rows='10'></textarea></td>
    </tr>";
        
        $data.="
        </table>
    </td>
</tr>";
  
  $data.="<tr><td><div class='but' align='right'>
        <input  type='button' class='formButton2' name='saveTraining' id='saveTraining' style='width:100px;' value='Save' 
        onclick=\"loadingIcon(xajax.getFormValues('newForm1'),'save_Newtraining');return false;\"/>
        </div></td></tr>
        </table>";
         $data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
             
    $data.="</td>
</tr>";
              
$data.="</table>
</form>";








$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hidemyLoaderDiv");
$obj->call("hideLoadingDiv"); 
return $obj;
}
        
        
        

#************************************
$xajax->processRequest();
?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.5/'); ?>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/loading.css" rel="stylesheet" type="text/css"/>
<title><?php heading($_GET['action']); ?></title>
<script type="text/javascript" src="js/jquery-2.1.4.js" language="javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>    
</head>

<body>
<div align='center' id='dvLoading'><span
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Content...</span></div>
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
            <div id="bodyDisplay" align="left">

                <script language="JavaScript" type="text/javascript">
                <?php  $linkvar=$_GET['linkvar'];
                switch($linkvar){
                case"TSO Quantitative Reporting":
                ?>
                xajax_new_TSOquantitativeReporting('','','','','','','');
                <?php 
                break;

                case"View TSO Quantitative Reporting":
                ?>
                xajax_view_TSOquantitativeReporting('','','','','');
                <?php 
                break;
                case"Performance Report":
                ?>
                xajax_view_qualitativeReporting('','','');

                <?php 
                break;
                case"View TSO Qualitative Reporting":
                ?>
                xajax_viewQualiatativeTSOEntered('','','','');
                <?php
                break;


                case"Form1":
                ?>
                xajax_view_training('','','','','',1,20);
                <?php
                break;
                case "Progress Against Targets": 
                ?>

                xajax_view_quantitativeReportLog('','','','','');
                <?php

                break;

                case"Form6":
                ?>

                xajax_view_form6('','','','',1,20);
                <?php

                break;

                case"Learning Site Data Collection Form":
                ?>

                xajax_view_form8('','','','');



                <?php
                break;

                case"Publications/Knowledge Products":
                ?>
                xajax_view_publications('','','','',1,20);

                <?php
                break; 
                default: ?>
                <?php }?>
                </script>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>
<script language="javascript" type="text/javascript" src="js/check.js"></script>
<script type="text/javascript" src="js/number.js"></script>
<script type="text/javascript" src="js/addRow.js" language="javascript"></script>
<script type="text/javascript" src="js/loading.js" language="javascript"></script>
<script type="text/javascript" src="js/check.js" language="javascript"></script>
<script type="text/javascript" src="js/popup.js" language="javascript"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>
<script type="text/javascript" src="js/sumRows.js" language="javascript"></script>
<script type="text/javascript" src="js/hoverRows.js" language="javascript"></script>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm"
style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0"
height="178" scrolling="no" width="199">
</iframe>
</body>
</html>

