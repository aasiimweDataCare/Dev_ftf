<?php
function edit_vAgent($regionCode,$districtCode,$subcountyCode,$vAgentId){
 $obj=new xajaxResponse();

 $QueryManager=new QueryManager('');



 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }



 $n=1;
 $inc=1;
 $data="<form action=\"".$PHP_SELF."\" name='vAgent_edit' id='vAgent_edit' method='post'>
 <table width='100%' cellpadding='2' border='0' cellspacing='1'>";

 $data.="<tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>";

 $data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE VILLAGE AGENT RECORD(S)</center></th></tr>";




  $sel=mysql_query("SELECT v.* FROM `tbl_villageagents` v  WHERE  v.`tbl_villageAgentId`='".$vAgentId."' AND v.`display`='Yes'")or die(http(37));
  while($row=mysql_fetch_assoc($sel)){

 $data.="<td>
 <input name='tbl_villageAgentId' type='hidden' id='tbl_villageAgentId' size='25' value='".$row['tbl_villageAgentId']."' />";

     $data.="<table border='0' width='400' cellpadding='1' cellspacing='1'>
                 <tr>
                   <th colspan='2' scope='col'>VILLAGE AGENT DETAILS</th>
                   </tr>";


                 $data.="<tr class='evenrow'>
                   <td><strong>Region:</strong><br /></td>
                   <td><select name='vAgentRegion' id='vAgentRegion' style='width:100px;'
                   onchange=\"xajax_edit_vAgent(this.value,'".$districtCode."','".$subcountyCode."','".$vAgentId."');return false;\" >
                       <option value=''>-select-</option>";
                      if($row['vAgentRegion']<>NULL){
                       $data.=$QueryManager->regionalFilter($row['vAgentRegion']);
                       }else{
                        $data.=$QueryManager->regionalFilter($regionCode);
                       }
                     $data.="</select>      </td>
                    </tr>";

                      $data.="<tr class='evenrow'>
                   <td><strong>District:</strong><br /></td>
                   <td><select name='vAgentDistrict' id='vAgentDistrict' style='width:100px;'
                  onchange=\"xajax_edit_vAgent('".$regionCode."',this.value,'".$subcountyCode."','".$vAgentId."');return false;\" >
                       <option value=''>-select-</option>";
                      $data.=$QueryManager->DistrictFilter($row['vAgentRegion'],$districtCode);
                      $data.="</select></td>
                 </tr>";
                 $data.="<tr class='evenrow'>
                   <td><strong>Subcounty:</strong><br /></td>
                   <td><select name='vAgentSubcounty' id='vAgentSubcounty' style='width:100px;'
                  onchange=\"xajax_edit_vAgent('".$regionCode."','".$districtCode."',this.value,'".$vAgentId."');return false;\" >
                       <option value=''>-select-</option>";

                       $data.=$QueryManager->SubcountyFilter($row['vAgentRegion'],$districtCode,$subcountyCode);

                     $data.="</select></td>
                 </tr>";



                 $data.="<tr class='evenrow'>
                   <td><strong>Village:</strong><br /></td>
                   <td><input type='text' name='vAgentVillage' id='vAgentVillage' value='".$row['vAgentVillage']."' /></td>
                 </tr>";
                 $data.="<tr class='evenrow'>
                   <td><strong>Village Agent's Trader:</strong><br /></td>
                   <td>
                     <select name='vAgentTrader' id='vAgentTrader'>";

                     $data.="<option value=''>-select-</option>";
                     $data.=$QueryManager->filterTrader($row['tbl_tradersId']);
                     $data.="</select></td>
                 </tr>";

                 $data.="<tr class='evenrow'>
                   <td><strong>Village Agent Name:</strong><br /></td>
                   <td>
                     <input type='text' name='vAgentName' id='vAgentName' value='".$row['vAgentName']."'/></td>
                 </tr>";

                 $data.="<tr class='evenrow'>
                   <td><strong>Date of birth/Business Commencement:</strong><br /></td>
                   <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.vAgent.vAgentDob);return false;\" hidefocus=''>
                     <input name='vAgentDob' id='vAgentDob' size='15'  readonly='readonly' value='".$row['vAgentDob']."' type='text'>
                     <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                 </tr>";
                 $data.="<tr class='evenrow'>
                   <td><strong>Date of Recruitment:</strong><br /></td>
                   <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.vAgent.vAgentDateRecruited);return false;\" hidefocus=''>
                     <input name='vAgentDateRecruited' id='vAgentDateRecruited' size='15' readonly='readonly' value='".$row['vAgentDateRecruited']."' type='text'>
                     <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                 </tr>";
                 $data.="<tr class='evenrow'>
                   <td><strong>Village Agent Code:</strong><br /></td>
                   <td><input type='text' name='vAgentCode' disabled='disabled' class='disabled' id='vAgentCode' value='".$row['vAgentCode']."' /></td>
                 </tr>";
                 $data.="<tr class='evenrow'>
                   <td><strong>Telephone:</strong><br /></td>
                   <td><input type='text' name='vAgentTel' id='vAgentTel' value='".$row['vAgentTel']."' maxlength='13' /></td>
                 </tr>";

                 $data.="<tr class='evenrow'>
                  <td><strong>Size of Village Agent Store:</strong><br /></td>
                  <td><input type='text' name='vAgentStoreSize' id='vAgentStoreSize' value='".$row['vAgentStoreSize']."' onkeypress='return numbersonly(event, false)' /></td>
                </tr>";

                 $data.="<tr class='evenrow'>
                   <td><strong>Gender <i>(Consider majority if a Business)</i>:</strong><br /></td>
                   <td><select name='vAgentSex' id='vAgentSex' style='width:100px;'>
                     <option value=''>-select-</option>";
                     $gender=array('Male','Female');
                                         $y = 0;
                                         foreach ($gender as $v) {
                                             $selected=($row['vAgentSex']==$v)?"selected":"";
                                             $data.="<option value=\"".$v."\" ".$selected.">".$v."</option>";
                                             $y++;
                                         }

                       $data.="</select>";
                       $data.="</td>
                 </tr>";

                    $typeOfAgent=$row['typeOfAgent'];
                    $stringBf=substr($typeOfAgent,0,strrpos($typeOfAgent,','));
                    $stringAf= substr(strrchr($typeOfAgent, ','), 1);

                  $checked=(($stringBf) == "Input/output trader")?"CHECKED":"";
                  $checked2=(($stringAf) == "Services Provider")?"CHECKED":"";

                 $data.="<tr class='evenrow'>
                  <td rowspan='2'><strong>Type of Agent:</strong><br/></td>
                  <td colspan='2'><input type='checkbox' ".$checked." name='typeOfAgent[]' id='typeOfAgent' value='Input/output trader'/>
                    Input/output trader</td>
                    </tr>";

                $data.="<tr class='evenrow'>
                  <td colspan='2'><input type='checkbox' ".$checked2."  name='typeOfAgent[]' id='typeOfAgent' value='Services Provider'  />
                    Services Provider</td>
                </tr>";

                 $data.="<tr class='evenrow'>
                   <td><strong>Location:</strong></td>
                   <td><select name='vAgentLocation' id='vAgentLocation' style='width:100px;'>
                     <option value=''>-select-</option>";
                     $location=array('Urban','Rural');
                     //$location=sort($location);
                                         $i = 0;
                                         foreach ($location as $l) {
                                             $selected=($row['vAgentLocation']==$l)?"selected":"";
                                             $data.="<option value=\"".$l."\" ".$selected.">".$l."</option>";
                                             $i++;
                                         }

                       $data.="</select>";
                       $data.="</td>
                 </tr>";

                  $data.="<tr class='evenrow'>
                   <td rowspan='4'><strong>Crops:</strong></td>";
                  $stmnt="SELECT v.`vAgentCropBeans`, v.`vAgentCropCoffee`, v.`vAgentCropMaize`
                             FROM `tbl_villageagents` v
                             WHERE  v.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."'
                             AND v.`display`='Yes'
                             ORDER BY v.`tbl_villageAgentId` ASC ";

                             $q=mysql_query($stmnt);
                                         $numFields=mysql_num_fields($q);
                                             while($r=mysql_fetch_array($q)){
                                     for($i=0; $i<$numFields; $i++){
                                            $cropsArray=array($r['vAgentCropBeans'] , $r['vAgentCropCoffee'] , $r['vAgentCropMaize']);
                                            $data.="<tr class='evenrow'><td colspan='2'><input type='checkbox'";
                                            switch ($i) {
                                                 case 0:
                                                     $cropName='Beans';
                                                     $data.="name='Beans'  id='Beans'";
                                                     if($cropsArray[$i]=='Yes')$data.="checked='checked'";
                                                     $data.="value='Yes'/>";
                                                     break;
                                                 case 1:
                                                     $cropName='Coffee';
                                                     $data.="name='Coffee'  id='Coffee'";
                                                     if($cropsArray[$i]=='Yes')$data.="checked='checked'";
                                                     $data.="value='Yes'/>";
                                                     break;
                                                 case 2:
                                                     $cropName='Maize';
                                                     $data.="name='Maize'  id='Maize'";
                                                     if($cropsArray[$i]=='Yes')$data.="checked='checked'";
                                                     $data.="value='Yes'/>";
                                                     break;
                                             }

                                            $data.="".$cropName."<br/></td>
                                                   </tr>";

                                           }
                                             }




                                         $data.="<tr class='evenrow'>
                                                 <td rowspan='4'>&nbsp;</td>
                                                 <td align='right'><input type='button'  id='button' name='save' id='save' value='Save' onclick=\"xajax_update_vAgent(xajax.getFormValues('vAgent_edit')); return false;\" />
                                                 </td>
                                                </tr>";


               $data.="</table>";




  }

 $data.="</table></form>";

 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
function update_vAgent($formValues){
 $obj=new xajaxResponse();
 $n=1;



 $tbl_villageAgentId=$formValues['tbl_villageAgentId'];

 //$obj->alert($formValues['vAgentTrader']);

 $vAgentTrader=$formValues['vAgentTrader'];
 $vAgentName=$formValues['vAgentName'];
 $vAgentRegion=$formValues['vAgentRegion'];
 $vAgentDistrict=$formValues['vAgentDistrict'];
 $vAgentSubcounty=$formValues['vAgentSubcounty'];

 if($vAgentRegion=='' || $vAgentRegion==NULL || $vAgentDistrict=='' || $vAgentDistrict==NULL || $vAgentSubcounty=='' || $vAgentSubcounty==NULL || $vAgentTrader=='' || $vAgentTrader==NULL ){
      $stDefault="SELECT * FROM `tbl_villageagents` where `tbl_villageAgentId`='".$tbl_villageAgentId."'";

     $query=@Execute($stDefault)or die(http("edit-796"));

      if(!$query){ $obj->alert("CPM MIS could not modify this Village Agent record. \n
                   Please make sure all the data to be supplied is correct.");
      return $obj;
     }

        $rowDefault=@mysql_fetch_array($query);
        $vAgentRegion=$rowDefault['vAgentRegion'];
        $vAgentDistrict=$rowDefault['vAgentDistrict'];
        $vAgentSubcounty=$rowDefault['vAgentSubcounty'];
        $vAgentTrader=$rowDefault['tbl_tradersId'];
      }




 $vAgentVillage=$formValues['vAgentVillage'];
 $vAgentDob=$formValues['vAgentDob'];
 $vAgentDateRecruited=$formValues['vAgentDateRecruited'];
 $vAgentCode=$formValues['vAgentCode'];
 $dirty_typeOfAgent=$formValues['typeOfAgent'][0].",".$formValues['typeOfAgent'][1];
 $typeOfAgent=rtrim($dirty_typeOfAgent, ",");
 $vAgentTel=$formValues['vAgentTel'];
 $vAgentStoreSize=$formValues['vAgentStoreSize'];
 $vAgentSex=$formValues['vAgentSex'];
 $vAgentLocation=$formValues['vAgentLocation'];
 $Beans=$formValues['Beans'];
 $Coffee=$formValues['Coffee'];
 $Maize=$formValues['Maize'];



 $sql="UPDATE `tbl_villageagents` SET `tbl_tradersId`='".$vAgentTrader."',`vAgentName`='".$vAgentName."',`vAgentDob`='".$vAgentDob."',
                 `vAgentTel`='".$vAgentTel."',`vAgentStoreSize`='".$vAgentStoreSize."',
                 `vAgentSex`='".$vAgentSex."',`typeOfAgent`='".$typeOfAgent."',`vAgentLocation`='".$vAgentLocation."',`vAgentDateRecruited`='".$vAgentDateRecruited."',
                 `vAgentRegion`='".$vAgentRegion."',`vAgentDistrict`='".$vAgentDistrict."',
                 `vAgentSubcounty`='".$vAgentSubcounty."',`vAgentVillage`='".$vAgentVillage."',
                 `vAgentCropBeans`='".$Beans."',`vAgentCropCoffee`='".$Coffee."',
                 `vAgentCropMaize`='".$Maize."'
         WHERE `tbl_villageAgentId`='".$tbl_villageAgentId."'";

  /* $obj->alert($sql); */
 $query=@mysql_query($sql)or die(http(__line__));



 $obj->assign('bodyDisplay','innerHTML',congMsg("Village Agent record(s) has been Updated!"));
 $obj->call('xajax_setup_vAgent','','',1,20);
 return $obj;
 }
function edit_extrapolation($formValues){
    $obj=new xajaxResponse();

    $QueryManager=new QueryManager('');



    if($_SESSION['user_id']==''){
        $obj->redirect('index.php');
        return $obj;
    }



    $n=1;
    $inc=1;
    $data="<form action=\"".$PHP_SELF."\" name='extrapolation' id='extrapolation' method='post'>
     <table width='100%' cellpadding='2' border='0' cellspacing='1'>";
        $data.="<tr CLASS='evenrow'><th colspan='10' ><div align='center' >UPDATE PMP EXTRAPOLATION FACTOR</div></th></tr>";

                    if(count($formValues['loopkey'])>0){
                        for($x=0;$x<count($formValues['pk_id']);$x++){

                    $sel=mysql_query("SELECT * FROM `tbl_pmpextrapolation` WHERE `pk_id`='".$formValues['pk_id'][$x]."'")or die(http(340));
                    while($row=mysql_fetch_assoc($sel)){

                        $data.="<tr class='evenrow'>";
                        $data.="<input type='hidden' name='loopkey' id='loopkey' value='1'/>";
                        $data.="<input type='hidden' name='pk_id[]' id='pk_id".$n."' value='".$row['pk_id']."'/>";
                        $data.="<td><strong>Financial Year:</strong><br/></td>";
                        $data.="<td>";
                        $data.="<select name='fyear[]' id ='fyear".$n."' size='1' style='width:177px;'>";
                        for($yr=2013;$yr<=2018;$yr++){

                            $selYear= $row['financialYear'] ;
                            $selected=($selYear==$yr)?"selected":"";
                            $data.="<option value=\"".$yr."\" ".$selected.">".$yr."</option>";
                        }
                        $data.="</select>";
                        $data.="</td>";
                        $data.="</tr>";

                        $data.="<tr class='evenrow'>";
                        $data.="<td><strong>Extrapolation Factor:</strong><br/></td>";
                        $data.="<td>";
                        $data.="<input type='text' name='xfactor[]' id ='xfactor".$n."' value='".$row['extrapolationFactor']."' onkeypress='return numbersonly(event, false)'  style='width:177px;'>";
                        $data.="</td>";
                        $data.="</tr>";


                        $data.="<tr class='evenrow'>";
                        $data.="<td><strong>Entered By:</strong><br/></td>";
                        $data.="<td>";
                        //Pick the current username
                        $stUser="select * from `tbl_user` where `user_id`='".$row['enteredby']."'";
                        $queryU=Execute($stUser) or die(http(__line__));
                        $rowU=FetchRecords($queryU);
                        $entredby=$rowU['name'];

                        $data.="<input type='text' value='".$entredby."'  class='disabled' disabled=disabled name='enteredby[]' id='enteredby".$n."' style='width:177px;'  >";
                        $data.="<input type='hidden' value='".$_SESSION['user_id']."'   name='updatedby[]' id='updatedby".$n."'>";
                        $data.="</td>";
                        $data.="</tr>";

                    $n++;
                    }

                }
            }

    $data.="<tr class='evenrow'>
                 <td rowspan='4'>&nbsp;</td>
                 <td align='right'><input type='button'  id='button' name='save' id='save' value='Save' onclick=\"xajax_update_extrapolation(xajax.getFormValues('extrapolation')); return false;\" />
                 </td>
            </tr>";


            $data.="</table></form>";

    $obj->assign('bodyDisplay','innerHTML',$data);
    return $obj;
}
function update_extrapolation($formValues){
    $obj=new xajaxResponse();
    $QMobj=new QueryManager();
    $n=1;

    if(count($formValues['loopkey'])>0){
        for($x=0;$x<count($formValues['pk_id']);$x++){

            $pk_id = $formValues['pk_id'][$x];
            $extrapolationFactor = $formValues['xfactor'][$x];
            $financialYear = $formValues['fyear'][$x];
            $updatedby = $formValues['updatedby'][$x];

            $sql="UPDATE `tbl_pmpextrapolation`
            SET `extrapolationFactor` = '".$extrapolationFactor."',
            `financialYear` = '".$financialYear."',
            `updatedby` = '".$updatedby."'
            WHERE `pk_id` = '".$pk_id."'";
			
			//$obj->alert($sql);

            if(!empty($sql)){
                $action = "Changed the PMP EXTRAPOLATION FACTOR.";
                $description=mysql_real_escape_string($sql);
                $user=$_SESSION['username'];
                $oldValue=$pk_id;
                $newValue=$extrapolationFactor;
                $table='tbl_pmpextrapolation';
                $id=$pk_id;
                $QMobj::logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
                $query=@mysql_query($sql)or die(http(__line__));
            }



        }
    }

    $obj->assign('bodyDisplay','innerHTML',congMsg("PMP Extrapolation record(s) has been Updated!"));
    $obj->call('xajax_view_extrapolation',1,20);
    return $obj;
}
function edit_indicatorTwentyEight($formValues){
    $obj=new xajaxResponse();

    $QueryManager=new QueryManager('');



    if($_SESSION['user_id']==''){
        $obj->redirect('index.php');
        return $obj;
    }



    $n=1;
    $inc=1;
    $data="<form action=\"".$PHP_SELF."\" name='indicator' id='indicator' method='post'>
     <table width='100%' cellpadding='2' border='0' cellspacing='1'>";
        $data.="<tr CLASS='evenrow'><th colspan='10' ><div align='center' >UPDATE FtF INDICATOR NUMBER 28</div></th></tr>";

                    if(count($formValues['loopkey'])>0){
                        for($x=0;$x<count($formValues['pk_id']);$x++){

                    $sel=mysql_query("SELECT * FROM `tbl_indicatortwentyeight` WHERE `pk_id`='".$formValues['pk_id'][$x]."'")or die(http(28));
                    while($row=mysql_fetch_assoc($sel)){

                        $data.="<tr class='evenrow'>";
                        $data.="<input type='hidden' name='loopkey' id='loopkey' value='1'/>";
                        $data.="<input type='hidden' name='pk_id[]' id='pk_id".$n."' value='".$row['pk_id']."'/>";
                        $data.="<td><strong>Financial Year:</strong><br/></td>";
                        $data.="<td>";
                        $data.="<select name='fyear[]' id ='fyear".$n."' size='1' style='width:177px;'>";
                        for($yr=2013;$yr<=2018;$yr++){

                            $selYear= $row['financialYear'] ;
                            $selected=($selYear==$yr)?"selected":"";
                            $data.="<option value=\"".$yr."\" ".$selected.">".$yr."</option>";
                        }
                        $data.="</select>";
                        $data.="</td>";
                        $data.="</tr>";

                        $data.="<tr class='evenrow'>";
                        $data.="<td><strong>Indicator Value:</strong><br/></td>";
                        $data.="<td>";
                        $data.="<input type='text' name='actualValue[]' id ='actualValue".$n."' value='".$row['actualValue']."' onkeypress='return numbersonly(event, false)'  style='width:177px;'>";
                        $data.="</td>";
                        $data.="</tr>";


                        $data.="<tr class='evenrow'>";
                        $data.="<td><strong>Entered By:</strong><br/></td>";
                        $data.="<td>";
                        //Pick the current username
                        $stUser="select * from `tbl_user` where `user_id`='".$row['enteredby']."'";
                        $queryU=Execute($stUser) or die(http("proportionOfFemales-275"));
                        $rowU=FetchRecords($queryU);
                        $entredby=$rowU['name'];

                        $data.="<input type='text' value='".$entredby."'  class='disabled' disabled=disabled name='enteredby[]' id='enteredby".$n."' style='width:177px;'  >";
                        $data.="<input type='hidden' value='".$_SESSION['user_id']."'   name='updatedby[]' id='updatedby".$n."'>";
                        $data.="</td>";
                        $data.="</tr>";

                    $n++;
                    }

                }
            }

    $data.="<tr class='evenrow'>
                 <td rowspan='4'>&nbsp;</td>
                 <td align='right'><input type='button'  id='button' name='save' id='save' value='Save' onclick=\"xajax_update_indicatorTwentyEight(xajax.getFormValues('indicator')); return false;\" />
                 </td>
            </tr>";


            $data.="</table></form>";

    $obj->assign('bodyDisplay','innerHTML',$data);
    return $obj;
}
function update_indicatorTwentyEight($formValues){
    $obj=new xajaxResponse();
    $QMobj=new QueryManager();
    $n=1;

    if(count($formValues['loopkey'])>0){
        for($x=0;$x<count($formValues['pk_id']);$x++){

            $pk_id = $formValues['pk_id'][$x];
            $actualValue = $formValues['actualValue'][$x];
            $financialYear = $formValues['fyear'][$x];
            $updatedby = $formValues['updatedby'][$x];

            $sql="UPDATE `tbl_indicatortwentyeight`
            SET `actualValue` = '".$actualValue."',
            `financialYear` = '".$financialYear."',
            `updatedby` = '".$updatedby."'
            WHERE `pk_id` = '".$pk_id."'";
			
			//$obj->alert($sql);

            if(!empty($sql)){
                $action = "Changed indicator number 28 value.";
                $description=mysql_real_escape_string($sql);
                $user=$_SESSION['username'];
                $oldValue=$pk_id;
                $newValue=$extrapolationFactor;
                $table='tbl_indicatortwentyeight';
                $id=$pk_id;
                $QMobj::logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
                $query=@mysql_query($sql)or die(http(__line__));
            }


        }
    }

    $obj->assign('bodyDisplay','innerHTML',congMsg("Record(s) has been Updated!"));
    $obj->call('xajax_view_indicatorTwentyEight',1,20);
    return $obj;
}
function edit_exporter($regionCode,$districtCode,$subcountyCode,$exporterId){
$obj=new xajaxResponse();

$QueryManager=new QueryManager('');

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

//$obj->alert($regionCode);

$n=1;
$inc=1;
$data="<form action=\"".$PHP_SELF."\" name='exporter' id='exporter' method='post'>
	<table  width='100%' cellpadding='1' border='0' cellspacing='1'>";
	
	$data.="<tr CLASS='evenrow'>
		<th colspan='10' >
			<center>UPDATE EXPORTER RECORD(S)</center>
		</th>
	</tr>";
	   
	$sel=mysql_query("SELECT e.* FROM `tbl_exporters` e  WHERE  e.`tbl_exportersId`='".$exporterId."'")or die(http(__line__));
	while($row=mysql_fetch_assoc($sel)){
		 
	$data.="<tr>
		<td colspan='10'>
			<input name='tbl_exportersId' type='hidden' id='tbl_exportersId' size='25' value='".$row['tbl_exportersId']."' />
	";

	$data.="<table class='data-grid-form' cellpadding='1' border='0' cellspacing='1' width='100%'>
	<tr>
		<th colspan='2'>UPDATE EXPORTER DETAILS</th>
	</tr>";


	$data.="<tr>
		<td>Region:<br /></td>
		<td>
			<select name='exporterRegion' id='exporterRegion' style='width:100px;'
			onchange=\"xajax_edit_exporter(this.value,'".$districtCode."','".$subcountyCode."','".$exporterId."');return false;\" >
			<option value=''>-select-</option>";
			if($row['exporterRegion']<>NULL){
			$data.=$QueryManager->regionalFilter($row['exporterRegion']);
			}else{
			$data.=$QueryManager->regionalFilter($regionCode);
			}
			$data.="</select>
		</td> 
	</tr>";

	$data.="<tr>
		<td>District<br /></td>
		<td>
			<select name='exporterDistrict' id='exporterDistrict' style='width:100px;'
			onchange=\"xajax_edit_exporter('".$regionCode."',this.value,'".$subcountyCode."','".$exporterId."');return false;\" >
			<option value=''>-select-</option>";
			$data.=$QueryManager->DistrictFilter($row['exporterRegion'],$districtCode);
			$data.="</select>
		</td>
	</tr>";

	$data.="<tr>
		<td>Subcounty<br />
		</td>
		<td>
			<select name='exporterSubcounty' id='exporterSubcounty' style='width:100px;'
			onchange=\"xajax_edit_exporter('".$regionCode."','".$districtCode."',this.value,'".$exporterId."');return false;\" >
			<option value=''>-select-</option>";

			$data.=$QueryManager->SubcountyFilter($row['exporterRegion'],$districtCode,$subcountyCode);

			$data.="</select>
		</td>
	</tr>";


	$data.="<tr>
		<td>Village<br /></td>
		<td><input type='text' name='exporterVillage' id='exporterVillage' value='".$row['exporterVillage']."' /></td>
	</tr>

	<tr>
		<td>Exporter Name:<br /></td>
		<td><input type='text' name='exporterName' id='exporterName' value='".$row['exporterName']."'/></td>
	</tr>";

	$data.="<tr>
		<td>Date of birth/Business Commencement:<br /></td>
		<td>
			<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.exporter.exporterDob);return false;\" hidefocus=''>
				<input name='exporterDob' id='exporterDob' size='15'  readonly='readonly' value='".$row['exporterDob']."' type='text'>
				<img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'>
			</a>
		</td>
	</tr>";

	$data.="<tr>
	<td>Date of Recruitment:<br /></td>
		<td>
			<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.exporter.exporterDateRecruited);return false;\" hidefocus=''>
				<input name='exporterDateRecruited' id='exporterDateRecruited' size='15' readonly='readonly' value='".$row['exporterDateRecruited']."' type='text'>
				<img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'>
			</a>
		</td>
	</tr>";

	$data.="<tr>
		<td>Exporter Code:<br /></td>
		<td><input type='text' name='exporterCode' id='exporterCode' value='".$row['exporterCode']."' /></td>
	</tr>";

	$data.="<tr>
		<td>Telephone:<br /></td>
		<td><input type='text' name='exporterTel' id='exporterTel' value='".$row['exporterTel']."' maxlength='13' /></td>
	</tr>";

	$data.="<tr>
		<td>Gender <i>(Consider majority if a Business)</i>:<br /></td>
		<td>
			<select name='exporterSex' id='exporterSex' style='width:100px;'>
				<option value=''>-select-</option>";
				$gender=array('Male','Female');
				$y = 0; 
				foreach ($gender as $v) {
				$selected=($row['exporterSex']==$v)?"selected":"";
				$data.="<option value=\"".$v."\" ".$selected.">".$v."</option>";
				$y++;
				}

			$data.="</select>";
		$data.="</td>
	</tr>";


	$data.="<tr>
		<td>Location:</td>
		<td>
			<select name='exporterLocation' id='exporterLocation' style='width:100px;'>
				<option value=''>-select-</option>";
				$location=array('Urban','Rural');
				//$location=sort($location);
				$i = 0; 
				foreach ($location as $l) {
				$selected=($row['exporterLocation']==$l)?"selected":"";
				$data.="<option value=\"".$l."\" ".$selected.">".$l."</option>";
				$i++;
				}
			$data.="</select>";
		$data.="</td>
	</tr>";

	$data.="<tr>
		<td rowspan='4'>Crops:</td>";
		$stmnt="SELECT e.`exporterCropBeans`, e.`exporterCropCoffee`, e.`exporterCropMaize`
		FROM `tbl_exporters` e
		WHERE  e.`tbl_exportersId`='".$row['tbl_exportersId']."'
		ORDER BY e.`tbl_exportersId` ASC ";

		$q=mysql_query($stmnt);
		$numFields=mysql_num_fields($q);
		while($r=mysql_fetch_array($q)){
		for($i=0; $i<$numFields; $i++){
		$cropsArray=array($r['exporterCropBeans'] , $r['exporterCropCoffee'] , $r['exporterCropMaize']);
		$data.="<tr>
			<td colspan='2'><input type='checkbox'";
		switch ($i) {
		case 0:
		$cropName='Beans';
		$data.="name='Beans'  id='Beans'";
		if($cropsArray[$i]=='Yes')$data.="checked='checked'";
		$data.="value='Yes'/>";
		break;
		case 1:
		$cropName='Coffee';
		$data.="name='Coffee'  id='Coffee'";
		if($cropsArray[$i]=='Yes')$data.="checked='checked'";
		$data.="value='Yes'/>";
		break;
		case 2:
		$cropName='Maize';
		$data.="name='Maize'  id='Maize'";
		if($cropsArray[$i]=='Yes')$data.="checked='checked'";
		$data.="value='Yes'/>";
		break;
		}

		$data.="".$cropName."<br/>
		</td>
	</tr>";

	}
	}


	}        



	$data.="<tr>
		<td rowspan='4'>
			<input type='button'  id='button' name='save' id='save' value='Save' onclick=\"xajax_update_exporter(xajax.getFormValues('exporter')); return false;\" />
		</td>
	</tr>";


	$data.="</table>
		</td>
	</tr>
	</table>
</form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
function update_exporter($formValues){
$obj=new xajaxResponse();
$n=1;

$tbl_exportersId=$formValues['tbl_exportersId'];
$exporterName=$formValues['exporterName'];
$exporterRegion=$formValues['exporterRegion'];
$exporterDistrict=$formValues['exporterDistrict'];
$exporterSubcounty=$formValues['exporterSubcounty'];
 
if($exporterRegion==''
OR $exporterRegion==NULL
OR $exporterDistrict==''
OR $exporterDistrict==NULL
OR $exporterSubcounty==''
OR $exporterSubcounty==NULL
){
$stDefault="SELECT * FROM `tbl_exporters` where `tbl_exportersId`='".$tbl_exportersId."'";
$query=@Execute($stDefault)or die(http(__line__));

if(!$query){ 
$obj->alert("CPM MIS could not modify this exporter record. \n
		   Please make sure all the data to be supplied is correct.");
return $obj;
}

$rowDefault=@mysql_fetch_assoc($query);

$exporterRegion=$rowDefault['exporterRegion'];
$exporterDistrict=$rowDefault['exporterDistrict'];
$exporterSubcounty=$rowDefault['exporterSubcounty'];
}
 
 
$exporterVillage=$formValues['exporterVillage'];
$exporterDob=$formValues['exporterDob'];
$exporterDateRecruited=$formValues['exporterDateRecruited'];
$exporterCode=$formValues['exporterCode'];
$exporterTel=$formValues['exporterTel'];
$exporterSex=$formValues['exporterSex'];
$exporterLocation=$formValues['exporterLocation'];
$Beans=$formValues['Beans'];
$Coffee=$formValues['Coffee'];
$Maize=$formValues['Maize'];

 
 
$sql="UPDATE `tbl_exporters` SET `exporterName`='".$exporterName."',`exporterDob`='".$exporterDob."',
	 `exporterCode`='".$exporterCode."',`exporterTel`='".$exporterTel."',
	 `exporterSex`='".$exporterSex."',`exporterLocation`='".$exporterLocation."',`exporterDateRecruited`='".$exporterDateRecruited."',
	 `exporterRegion`='".$exporterRegion."',`exporterDistrict`='".$exporterDistrict."',
	 `exporterSubcounty`='".$exporterSubcounty."',`exporterVillage`='".$exporterVillage."',
	 `exporterCropBeans`='".$Beans."',`exporterCropCoffee`='".$Coffee."',
	 `exporterCropMaize`='".$Maize."'
WHERE `tbl_exportersId`='".$tbl_exportersId."'";

/* $obj->alert($sql); */
$query=@mysql_query($sql)or die(http(__line__));

$obj->assign('bodyDisplay','innerHTML',congMsg("Exporter record(s) has been Updated!"));
$obj->call("xajax_setup_exporter",'','',1,20);
return $obj;
}
function edit_trader($regionCode,$districtCode,$subcountyCode,$traderId){
 $obj=new xajaxResponse();
 
 $QueryManager=new QueryManager('');
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 
 //$obj->alert($regionCode);
 
 $n=1;
 $inc=1;
 $data="<form action=\"".$PHP_SELF."\" name='trader' id='trader' method='post'>
 <table width='100%' cellpadding='1' border='0' cellspacing='1'>";
  
 $data.="<tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>";
   
 $data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE TRADER RECORD(S)</center></th></tr>";
   
$sel=mysql_query("SELECT e.* FROM `tbl_traders` e  WHERE  e.`tbl_tradersId`='".$traderId."'")or die(http(__line__));
  while($row=mysql_fetch_assoc($sel)){
     
 $data.="<td><input name='tbl_tradersId' type='hidden' id='tbl_tradersId' size='25' value='".$row['tbl_tradersId']."' />";
     
     $data.="<table border='0' width='400'>
                 <tr>
                   <th colspan='3' scope='col'>TRADER DETAILS</th>
                   </tr>";
                   
                 $data.="<tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Region:</strong><br /></td>
                   <td><select name='traderRegion' id='traderRegion' style='width:218.18px;'
                   onchange=\"xajax_edit_trader(this.value,'".$districtCode."','".$subcountyCode."','".$traderId."');return false;\" >
                       <option value=''>-select-</option>";
					   $regionFilter=($row['traderRegion']<>NULL)?$QueryManager->regionalFilter($row['traderRegion']):$QueryManager->regionalFilter($regionCode);
					   $data.=$regionFilter;
                     $data.="</select></td> 
                    </tr>";
                    
                      $data.="<tr class='white1'>
                  <td colspan='2'><strong>District:</strong><br /></td>
                  <td><select name='traderDistrict' id='traderDistrict' style='width:218.18px;'
                  onchange=\"xajax_edit_trader('".$regionCode."',this.value,'".$subcountyCode."','".$traderId."');return false;\" >
                       <option value=''>-select-</option>";
                      $districtFilter=($row['traderRegion']<>NULL && $row['traderDistrict']<>NULL)?$QueryManager->DistrictFilter($row['traderRegion'],$row['traderDistrict']):$QueryManager->DistrictFilter($regionCode,$districtCode);
					  $data.=$districtFilter;
					  $data.="</select></td>
                 </tr>";
                 $data.="<tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Subcounty:</strong><br /></td>
                  <td><select name='traderSubcounty' id='traderSubcounty' style='width:218.18px;'
                  onchange=\"xajax_edit_trader('".$regionCode."','".$districtCode."',this.value,'".$traderId."');return false;\" >
                       <option value=''>-select-</option>";
                       $subcountyFilter=($row['traderRegion']<>NULL && $row['traderDistrict']<>NULL && $row['traderSubcounty']<>NULL)?$QueryManager->SubcountyFilter($row['traderRegion'],$row['traderDistrict'],$row['traderSubcounty']):$QueryManager->SubcountyFilter($regionCode,$districtCode,$subcountyCode);
					   $data.=$subcountyFilter;
                     $data.="</select></td>
                 </tr>";
                 
                 
                 
                 
                 $data.="<tr class='white1'>
                  <td colspan='2'><strong>Village:</strong><br /></td>
                  <td><input type='text' name='traderVillage' id='traderVillage' value='".$row['traderVillage']."' style='width:218.18px;' /></td>
                 </tr>";
                 
                 $data.="<tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Trader Name:</strong><br /></td>
                  <td>
                     <input type='text' name='traderName' id='traderName' value='".$row['traderName']."' style='width:218.18px;' /></td>
                 </tr>";
                 
                 $data.="<tr class='white1'>
                  <td colspan='2'><strong>Date of birth/Business Commencement:</strong><br /></td>
                  <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.trader.traderDob);return false;\" hidefocus=''>
                     <input name='traderDob' id='traderDob' size='15'  readonly='readonly' value='".$row['traderDob']."' type='text' style='width:180.18px'>
                     <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                 </tr>";
                 $data.="<tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Date of Recruitment:</strong><br /></td>
                  <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.trader.traderDateRecruited);return false;\" hidefocus=''>
                     <input name='traderDateRecruited' id='traderDateRecruited' size='15' readonly='readonly' value='".$row['traderDateRecruited']."' type='text' style='width:180.18px'>
                     <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                 </tr>";
				 
                 $data.="<tr class='white1'>";
                  $data.="<td colspan='2'><strong>Trader Code Series:(eg for codes in <br> the range '1-1' onwards: <br/> select '1-' series)<br /></strong></td>";
                  $data.="<td><input type='text' disabled='disabled' class='disabled' name='traderCode' id='traderCode' value='".$row['traderCode']."' style='width:218.18px;' /></td>
                 </tr>";
				 
				 $data.="<tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Distance in Kilometers(Km)<br>from CPM offices:</strong><br /></td>
                  <td><input type='text' name='traderRadius' id='traderRadius' value='".$row['traderRadius']."' onkeypress='return numbersonly(event, false)' style='width:218.18px;' /></td>
				 </tr>";
				 
				 $data.="<tr class='white1'>
                  <td colspan='2'><strong>Size of Trader Store:</strong><br /></td>
                  <td><input type='text' name='traderStoreSize' id='traderStoreSize' value='".$row['traderStoreSize']."' onkeypress='return numbersonly(event, false)' style='width:218.18px;' /></td>
                </tr>";
				 
				 $data.="<tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Model adopted:</strong><br /></td>
                  <td><select name='traderModel' id='traderModel' style='width:218.18px;'>";
						$data.="<option value=''>-select-</option>";
						$stmnt="SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='38' ORDER BY  l.`codeName` ASC";
						$qTech=@mysql_query($stmnt);
						while($rowModel=@mysql_fetch_array($qTech)){
							$selected=($rowModel['codeName']==$row['traderModel'])?"selected":"";
							$data.="<option value=\"".$rowModel['codeName']."\" ".$selected.">".$rowModel['codeName']."</option>";
						}
						$data.="</select>";
                      $data.="</td>
                </tr>";

				$data.="<tr class='white1'>
                  <td colspan='2'><strong>Telephone:</strong><br /></td>
                  <td><input type='text' name='traderTel' id='traderTel' value='".$row['traderTel']."' maxlength='13' style='width:218.18px;' /></td>
                 </tr>";
                 $data.="<tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Gender <i>(Consider majority if a Business)</i>:</strong><br /></td>
                  <td><select name='traderSex' id='traderSex' style='width:218.18px;'>
                     <option value=''>-select-</option>";
                     $gender=array('Male','Female');
                                         $y = 0; 
                                         foreach ($gender as $v) {
                                             $selected=($row['traderSex']==$v)?"selected":"";
                                             $data.="<option value=\"".$v."\" ".$selected.">".$v."</option>";
                                             $y++;
                                         }
                     
                       $data.="</select>";
                       $data.="</td>
                 </tr>";
                 
                 
                 $data.="<tr class='white1'>
                  <td colspan='2'><strong>Location:</strong></td>
                  <td><select name='traderLocation' id='traderLocation' style='width:218.18px;'>
                     <option value=''>-select-</option>";
                     $location=array('Urban','Rural');
                     //$location=sort($location);
                                         $i = 0; 
                                         foreach ($location as $l) {
                                             $selected=($row['traderLocation']==$l)?"selected":"";
                                             $data.="<option value=\"".$l."\" ".$selected.">".$l."</option>";
                                             $i++;
                                         }
                     
                       $data.="</select>";
                       $data.="</td>
                 </tr>";
                 
                  $data.="<tr class='ftfRpLevelTwo'>
                  <td colspan='2' rowspan='4'><strong>Crops</strong><br /></td>";
                  $stmnt="SELECT e.`traderCropBeans`, e.`traderCropCoffee`, e.`traderCropMaize`
                             FROM `tbl_traders` e
                             WHERE  e.`tbl_tradersId`='".$row['tbl_tradersId']."'
                             ORDER BY e.`tbl_tradersId` ASC ";
                             
                             $q=mysql_query($stmnt);
                                         $numFields=mysql_num_fields($q);
                                             while($r=mysql_fetch_array($q)){
                                     for($i=0; $i<$numFields; $i++){
                                            $cropsArray=array($r['traderCropBeans'] , $r['traderCropCoffee'] , $r['traderCropMaize']);
                                            $data.="<tr class='ftfRpLevelTwo'><td colspan='2'><input type='checkbox'";
                                            switch ($i) {
                                                 case 0:
                                                     $cropName='Beans';
                                                     $data.="name='Beans'  id='Beans'";
                                                     if($cropsArray[$i]=='Yes')$data.="checked='checked'";
                                                     $data.="value='Yes'/>";
                                                     break;
                                                 case 1:
                                                     $cropName='Coffee';
                                                     $data.="name='Coffee'  id='Coffee'";
                                                     if($cropsArray[$i]=='Yes')$data.="checked='checked'";
                                                     $data.="value='Yes'/>";
                                                     break;
                                                 case 2:
                                                     $cropName='Maize';
                                                     $data.="name='Maize'  id='Maize'";
                                                     if($cropsArray[$i]=='Yes')$data.="checked='checked'";
                                                     $data.="value='Yes'/>";
                                                     break;
                                             }
                                             
                                            $data.="<strong>".$cropName."<br/></strong></td>
                                                   </tr>";
												   
																						
                                                        
                                           }
                                         }
                                         
										//Start append extra details
											$data.="
											<tr class='white1'>
												<td colspan='2'><strong>Contact person:</strong></td>
												<td><input type='text' name='cperson' id='cperson' value='".$row['contactPerson']."' style='width:218.18px;'/></td>
											</tr>
											<tr class='ftfRpLevelTwo'>
												<td colspan='2'><strong>Type of Trader:</strong></td>
												<td>
												<select name='tr_type' id='tr_type' style='width:218.18px;'/>
												<option value=''>-select Type of Trader-</option>";
												$tr_type=array('A','B','C','D');
												//$tr_type=sort($tr_type);
											    $i = 0; 
											    foreach ($tr_type as $l) {
												    $selected=($row['traderType']==$l)?"selected":"";
													$data.="<option value=\"".$l."\" ".$selected.">".$l."</option>";
													$i++;
											    }
												$data.="</select>
												</td>
											</tr>
											<tr class='white1'>
												<td colspan='2'><strong>MOU expiry date:</strong></td>
												<td>
													<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.trader.tr_mou_expiry_date);return false;\" hidefocus=''>
													<input name='tr_mou_expiry_date' id='tr_mou_expiry_date' size='15' value='".$row['tradermouExpiryDate']."'  readonly='readonly' type='text' style='width:180.18px'>
													<img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'>
													</a>
												</td>
											</tr>
											<tr class='ftfRpLevelTwo'>
												<td colspan='2'><strong>Value of Input stock (UGX):</strong></td>
												<td><input type='text' name='value_input_stock' value='".$row['valueInputStock']."' id='value_input_stock' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
											</tr>
											<tr class='white1'>
												<td colspan='2'><strong>Has record keeping system?</strong></td>
												<td>
												<select name='tr_record_keeping_system' id='record_keeping_system' style='width:218.18px;'/>
												<option value=''>-select-</option>";
												$traderRecordKeepingSystem=array('Yes','No');
												//$traderRecordKeepingSystem=sort($traderRecordKeepingSystem);
											    $i = 0; 
											    foreach ($traderRecordKeepingSystem as $l) {
												    $selected=($row['traderRecordKeepingSystem']==$l)?"selected":"";
													$data.="<option value=\"".$l."\" ".$selected.">".$l."</option>";
													$i++;
											    }
												$data.="</select>
												</td>
											</tr>
											<tr class='ftfRpLevelTwo'>
												<td colspan='2'><strong>Financial Services - Source of finance?</strong></td>
												<td><input type='text' name='tr_financial_services' value='".$row['traderfinancialServices']."' id='tr_financial_services' style='width:218.18px;'/></td>
											</tr>
											<tr class='white1'>
												<td colspan='2'><strong>Savings component?</strong></td>
												<td><input type='text' name='tr_savings_component' value='".$row['tradersavingsComponent']."' id='tr_savings_component' style='width:218.18px;'/></td>
											</tr>
											<tr class='ftfRpLevelTwo'>
												<td colspan='2'><strong>Number of Farmers:</strong></td>";
												$numFarmers = $QueryManager->getTraderNumFarmers($row['tbl_tradersId']);
												$data.="<td><input class='disabled' readonly=readonly type='text' value='".$numFarmers."' name='tr_num_farmers' id='tr_num_farmers' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
											</tr>
											<tr class='white1'>
												<td colspan='2'><strong>Youth groups:</strong></td>
												<td><input type='text' name='tr_num_youth_groups' value='".$row['tradernumYouthGroups']."' id='tr_num_youth_groups' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
											</tr>
											
											<tr class='ftfRpLevelTwo'>
												<td rowspan='6'><strong>Volumes purchased (Kg)</strong></td>
												<td align='right'><strong>Yr-2013:</strong></td>";
												$stmnt = $QueryManager->getTradeVolPurchasedByYear($row['tbl_tradersId'],$year=2013);
												$query = @Execute($stmnt) or die(http(1131));
												$rowYr1 = @FetchRecords($query);
												$volYr1 = $rowYr1['volPurchased'];
												$data.="<td><input class='disabled' readonly=readonly type='text' value='".$volYr1."' name='tr_vol_purchased_yr1' id='tr_vol_purchased_yr1' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
											</tr>
											<tr class='ftfRpLevelTwo'>
												<td align='right'><strong>Yr-2014:</strong></td>";
												$stmnt = $QueryManager->getTradeVolPurchasedByYear($row['tbl_tradersId'],$year=2014);
												$query = @Execute($stmnt) or die(http(1139));
												$rowYr2 = @FetchRecords($query);
												$volYr2 = $rowYr2['volPurchased'];
												$data.="<td ><input class='disabled' readonly=readonly type='text' value='".$volYr2."' name='tr_vol_purchased_yr2' id='tr_vol_purchased_yr2' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
											</tr>
											<tr class='ftfRpLevelTwo'>
												<td align='right'><strong>Yr-2015:</strong></td>";
												$stmnt = $QueryManager->getTradeVolPurchasedByYear($row['tbl_tradersId'],$year=2015);
												$query = @Execute($stmnt) or die(http(1147));
												$rowYr3 = @FetchRecords($query);
												$volYr3 = $rowYr3['volPurchased'];
												$data.="<td><input class='disabled' readonly=readonly type='text' value='".$volYr3."' name='tr_vol_purchased_yr3' id='tr_vol_purchased_yr3' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
											</tr>
											<tr class='ftfRpLevelTwo'>
												<td align='right'><strong>Yr-2016:</strong></td>";
												$stmnt = $QueryManager->getTradeVolPurchasedByYear($row['tbl_tradersId'],$year=2016);
												$query = @Execute($stmnt) or die(http(1155));
												$rowYr4 = @FetchRecords($query);
												$volYr4 = $rowYr4['volPurchased'];
												$data.="<td><input class='disabled' readonly=readonly type='text' value='".$volYr4."' name='tr_vol_purchased_yr4' id='tr_vol_purchased_yr4' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
											</tr>
											<tr class='ftfRpLevelTwo'>
												<td align='right'><strong>Yr-2017:</strong></td>";
												$stmnt = $QueryManager->getTradeVolPurchasedByYear($row['tbl_tradersId'],$year=2017);
												$query = @Execute($stmnt) or die(http(1162));
												$rowYr5 = @FetchRecords($query);
												$volYr5 = $rowYr5['volPurchased'];
												$data.="<td><input class='disabled' readonly=readonly type='text' value='".$volYr5."' name='tr_vol_purchased_yr5' id='tr_vol_purchased_yr5' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
											</tr>
											<tr class='ftfRpLevelTwo'>
												<td align='right'><strong>Yr-2018:</strong></td>";
												$stmnt = $QueryManager->getTradeVolPurchasedByYear($row['tbl_tradersId'],$year=2018);
												$query = @Execute($stmnt) or die(http(1171));
												$rowYr6 = @FetchRecords($query);
												$volYr6 = $rowYr6['volPurchased'];
												$data.="<td><input class='disabled' readonly=readonly type='text' value='".$volYr6."' name='tr_vol_purchased_yr6' id='tr_vol_purchased_yr6' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
											</tr>
											<tr class='white1'>
												<td rowspan='4'><strong>Key decision makers:</strong></td>
												
												<td align='right'><strong>1</strong></td>
												<td><input type='text' name='key_decision_maker1' value='".$row['keyDecisionMaker1']."' id='key_decision_maker1' style='width:218.18px;'/></td>
											</tr>
											<tr class='white1'>
												<td align='right'><strong>2</strong></td>
												<td><input type='text' name='key_decision_maker2' value='".$row['keyDecisionMaker2']."' id='key_decision_maker2' style='width:218.18px;'/></td>
											</tr>
											<tr class='white1'>
												<td align='right'><strong>3</strong></td>
												<td><input type='text' name='key_decision_maker3' value='".$row['keyDecisionMaker3']."' id='key_decision_maker3' style='width:218.18px;'/></td>
											</tr>
											<tr class='white1'>
												<td align='right'><strong>4</strong></td>
												
												<td><input type='text' name='key_decision_maker4' value='".$row['keyDecisionMaker4']."' id='key_decision_maker4' style='width:218.18px;'/></td>
											</tr>
											<tr class='ftfRpLevelTwo'>
												<td colspan='2'><strong>Loan:</strong></td>";
												$traderLoan = $QueryManager->getTraderLoan($row['tbl_tradersId'],$row['traderName']);
												$data.="<td><input class='disabled' readonly=readonly type='text' value='".$traderLoan."' name='tr_loan' id='tr_loan' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
											</tr>
											";
											//end of Append extra details	
                                           
                                           $n++;
  }
                                         
                                         $data.="<tr>
										 <td colspan='2'></td>
                                                 <td rowspan='4' align='right'>
                                                 
                                                 <input type='button'  id='button' name='save' id='save' value='Save' onclick=\"xajax_update_trader(xajax.getFormValues('trader')); return false;\" />
                                                 </td>
                                                </tr>";
 
                                       
               $data.="</table>";
     
 
  
  
  
  
 $data.="</table></form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
function update_trader($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
     
 $tbl_tradersId=$formValues['tbl_tradersId'];
 $traderName=$formValues['traderName'];
 
 
 $traderRegion=$formValues['traderRegion'];
 $traderDistrict=$formValues['traderDistrict'];
 $traderSubcounty=$formValues['traderSubcounty'];
 
 if($traderRegion==''
        OR $traderRegion==NULL
        OR $traderDistrict==''
        OR $traderDistrict==NULL
        OR $traderSubcounty==''
        OR $traderSubcounty==NULL
        ){
      $stDefault="SELECT * FROM `tbl_traders` where `tbl_tradersId`='".$tbl_tradersId."'";
      $query=@Execute($stDefault)or die(http("edit-796"));
      
      if(!$query){ $obj->alert("CPM MIS could not modify this trader record. \n
                   Please make sure all the data to be supplied is correct.");
      return $obj;
     }
      
        $rowDefault=@mysql_fetch_assoc($query);
      
     $traderRegion=$rowDefault['traderRegion'];
     $traderDistrict=$rowDefault['traderDistrict'];
     $traderSubcounty=$rowDefault['traderSubcounty'];
     }
 
 $traderVillage=$formValues['traderVillage'];
 $traderDob=$formValues['traderDob'];
 $traderDateRecruited=$formValues['traderDateRecruited'];
 $traderCode=$formValues['traderCode'];
 $traderRadius=$formValues['traderRadius'];
 $traderStoreSize=$formValues['traderStoreSize'];
 $traderModel=$formValues['traderModel'];
 $traderTel=$formValues['traderTel'];
 $traderSex=$formValues['traderSex'];
 $traderLocation=$formValues['traderLocation'];
 $Beans=$formValues['Beans'];
 $Coffee=$formValues['Coffee'];
 $Maize=$formValues['Maize'];
 
$contactPerson  = $formValues['cperson'];
$traderType  = $formValues['tr_type'];
$tradermouExpiryDate  = $formValues['tr_mou_expiry_date'];
$valueInputStock  = $formValues['value_input_stock'];
$traderRecordKeepingSystem  = $formValues['tr_record_keeping_system'];
$traderfinancialServices  = $formValues['tr_financial_services'];
$tradersavingsComponent  = $formValues['tr_savings_component']; 
$tradernumFarmers  = $formValues['tr_num_farmers'] == ''? 0 : $formValues['tr_num_farmers']; 
$tradernumYouthGroups  = $formValues['tr_num_youth_groups'] == ''? 0 : $formValues['tr_num_youth_groups']; 
$tradervolPurchasedYr1  = $formValues['tr_vol_purchased_yr1'] == ''? 0 : $formValues['tr_vol_purchased_yr1'];  
$tradervolPurchasedYr2  = $formValues['tr_vol_purchased_yr2'] == ''? 0 : $formValues['tr_vol_purchased_yr2']; 
$tradervolPurchasedYr3  = $formValues['tr_vol_purchased_yr3'] == ''? 0 : $formValues['tr_vol_purchased_yr3']; 
$tradervolPurchasedYr4  = $formValues['tr_vol_purchased_yr4'] == ''? 0 : $formValues['tr_vol_purchased_yr4']; 
$tradervolPurchasedYr5  = $formValues['tr_vol_purchased_yr5'] == ''? 0 : $formValues['tr_vol_purchased_yr5']; 
$tradervolPurchasedYr6  = $formValues['tr_vol_purchased_yr6'] == ''? 0 : $formValues['tr_vol_purchased_yr6'];  
$keyDecisionMaker1  = $formValues['key_decision_maker1'];
$keyDecisionMaker2  = $formValues['key_decision_maker2']; 
$keyDecisionMaker3  = $formValues['key_decision_maker3']; 
$keyDecisionMaker4  = $formValues['key_decision_maker4']; 
$traderLoan  = $formValues['tr_loan'] == ''? 0 : $formValues['tr_loan'];
 
 
 
 $sql="UPDATE `tbl_traders` SET `traderName`='".$traderName."',`traderDob`='".$traderDob."',
                `traderRadius`='".$traderRadius."',`traderStoreSize`='".$traderStoreSize."',
				`traderModel`='".$traderModel."',`traderTel`='".$traderTel."',
                `traderSex`='".$traderSex."',`traderLocation`='".$traderLocation."',`traderDateRecruited`='".$traderDateRecruited."',
                `traderRegion`='".$traderRegion."',`traderDistrict`='".$traderDistrict."',
                `traderSubcounty`='".$traderSubcounty."',`traderVillage`='".$traderVillage."',
                `traderCropBeans`='".$Beans."',`traderCropCoffee`='".$Coffee."',
                `traderCropMaize`='".$Maize."',
				`contactPerson`='".$contactPerson."',
				`traderType`='".$traderType."',
				`tradermouExpiryDate`='".$tradermouExpiryDate."',
				`valueInputStock`='".$valueInputStock."',
				`traderRecordKeepingSystem`='".$traderRecordKeepingSystem."',
				`traderfinancialServices`='".$traderfinancialServices."',
				`tradersavingsComponent`='".$tradersavingsComponent."', 
				`tradernumFarmers`='".$tradernumFarmers."', 
				`tradernumYouthGroups`='".$tradernumYouthGroups."',
				`tradervolPurchasedYr1`='".$tradervolPurchasedYr1."', 
				`tradervolPurchasedYr2`='".$tradervolPurchasedYr2."',
				`tradervolPurchasedYr3`='".$tradervolPurchasedYr3."', 
				`tradervolPurchasedYr4`='".$tradervolPurchasedYr4."',
				`tradervolPurchasedYr5`='".$tradervolPurchasedYr5."', 
				`tradervolPurchasedYr6`='".$tradervolPurchasedYr6."', 
				`keyDecisionMaker1`='".$keyDecisionMaker1."',
				`keyDecisionMaker2`='".$keyDecisionMaker2."', 
				`keyDecisionMaker3`='".$keyDecisionMaker3."', 
				`keyDecisionMaker4`='".$keyDecisionMaker4."', 
				`traderLoan`='".$traderLoan."'
				 
				 
         WHERE `tbl_tradersId`='".$tbl_tradersId."'";
         
  //$obj->alert($sql);
 $query=@mysql_query($sql)or die(http(__line__));
                 
                 
                 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Trader record(s) has been Updated!"));
 $obj->call('xajax_setup_trader','','',1,20);
 return $obj;
 }
?>