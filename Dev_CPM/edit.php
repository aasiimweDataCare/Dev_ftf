<?php
require_once('edit_forms.php');
require_once('edit_setups.php'); 
require_once('edit_partnersInventory.php');
require_once('edit_form2.php');

 function edit_OtherTrainingActivities($formvalues,$region){
 //,$district,$organization
 $obj=new xajaxResponse();
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
 $obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
 return $obj;
 }
 
 if(($region==NULL)){
 $obj->alert("Please select Region for which you are editing Data For!");
 return $obj;
 }
 /* if(($dis==NULL)){
 $obj->alert("Please select Region for which you are edititing Data For!");
 return $obj;
 } */
 
 $n=1;
 $inc=1;
 
 $fyear=($fyear==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$fyear;
 #$obj->alert($_SESSION['parishCode']);
 //$n=1;
 $data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
 <table width='100%' id='report'>";
  
   $data.="
   
                         <tr class='evenrow'>
           <td width='30%' colspan='3'>
           <div align='left'><strong>Region</strong></div></td>
           <td colspan='18'><select name='region' id='region' onchange=\"xajax_edit_OtherTrainingActivities(this.value,'','".$organization."','".$fyear."');return false;\" style='width:300px;'><option value=''>-select-</option>";
                         $data.=QueryManager::ZoneFilter($region);
                   $data.="</select></td>
         </tr>
                 
                 
 <tr class='evenrow3'><td colspan='3'>Financial Year:</td>
         <td colspan='18'><select name='year' id='year'   style='width:300px;'><option value=''>-select-</option>";
                                 $data.=QueryManager::FinancialYearFilter($fyear);
                                   $data.="</select></td>
         </tr>
         <tr class='evenrow'><td colspan='3'>Reporting Period</td>
          <td colspan='18'><select name='semiAnnual' id='semiAnnual' style='width:300px;'><option value=''>-select-</option>";
                                 $data.=QueryManager::ReportingPeriodFilter($period=$_SESSION['quarter']);
                                   $data.="</select></td></tr>
         <tr class='display_none'>
   <td>Field Officer</td>
  
  <td> <input type='text' name='fieldofficerxx' id='fieldofficerxx' size='25' value='".$row['FieldOfficerResponsible']."' ></td>
   </tr>
          <tr CLASS='evenrow'>
  
     <th colspan='21' ><center>Other Famer Training and Tree Seedling Distribution conducted in each district</center></th>
         
   </tr>
         
 
         
         
         <tr><th colspan='1' ROWSPAN='2'>No</th>
         
         <th ROWSPAN='2' colspan='1'>DISTRICT</th>
         <th colspan='2'><center>Training in IPM</center></th>
         <th colspan='2'><center>Training in Post Harvest Handling </center></th>
         <th colspan='2'><center>Training in Bulk Marketing</center></th>
         <th colspan='2'><center>Seedling beneficiaries</center>
         <img src='images/spacer2.png' width='100' height='0.1'></th>
         <th colspan='1' rowspan='2'><center>No. of seedlings given out</center></th>
         <th colspan='3'><center>Inputs procured Kg/Litres</center></th>
         <th colspan='4'><center>Kg of produce bulked</center></th>
                 </tr>
         <tr>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Seed</th>
         <th>Fertilizer</th>
         <th>Herbicide</th>
         <th>Maize</th>
         <th>Seed</th>
         <th>Sunflower</th>
         <th>SoyaBean</th>
         </tr>";
         //$obj->alert($formvalues['districtCode']);
         for($x=0;$x<count($formvalues['districtCode']);$x++){
         
                 $sql="select t.`training_id`,t.zone,t.FieldOfficerResponsible,t.`zone`, t.`district`,d.districtName ,
                                         t.`semi_annual`, t.`year`, seedlingsgivenout,t.display,
                                         max(if(t.`trainingtopicorIndicator`='1',t.male,'-')) as MaleTraininginIPM,
                                         max(if(t.`trainingtopicorIndicator`='1',t.female,'-')) as FemaleTraininginIPM,
                                         max(if(t.`trainingtopicorIndicator`='2',t.male,'-')) as MalePostHarvest,
                                         max(if(t.`trainingtopicorIndicator`='2',t.female,'-')) as FemalePostHarvest,
                                         max(if(t.`trainingtopicorIndicator`='3',t.male,'-')) as MaleBulkMrktng,
                                         max(if(t.`trainingtopicorIndicator`='3',t.female,'-')) as FemaleBulkMrktng,
                                         max(if(t.`trainingtopicorIndicator`='4',t.male,'-')) as MaleSeedBen,
                                         max(if(t.`trainingtopicorIndicator`='4',t.female,'-')) as FemaleSeedBen,
                                         max(if(t.`trainingtopicorIndicator`='5',t.seedlingsgivenout,'-')) as seedlingsgivenout,
                                         max(if(t.`trainingtopicorIndicator`='6',t.seed,'-')) as SeedInputProcured,
                                         max(if(t.`trainingtopicorIndicator`='6',t.Fertilizer,'-')) as FertilizerInputProcured,
                                         max(if(t.`trainingtopicorIndicator`='6',t.Herbicide,'-')) as HerbicideInputProcured,
                                         max(if(t.`trainingtopicorIndicator`='7',t.maize,'-')) as maizeproducebulked,
                                         max(if(t.`trainingtopicorIndicator`='7',t.beans,'-')) as beansproducebulked,
                                         max(if(t.`trainingtopicorIndicator`='7',t.sunflower,'-')) as sunflowerproducebulked,
                                         max(if(t.`trainingtopicorIndicator`='7',t.soyabean,'-')) as soyaproducebulked
                                         from  `tbl_othertrainingsandseeddistribution` t left join tbl_lookup tr 
                                         on(tr.code=t.trainingtopicorIndicator)
                                         left join tbl_district d on(d.districtCode=t.district)
                                         where t.display like 'Yes%' 
                                         && tr.classCode='27'
                                         && t.zone='".$region."'
                                         && t.district='".$formvalues['districtCode'][$x]."'
                                         && t.semi_annual='".$formvalues['semiAnnual'][$x]."'
                                         && t.year='".$formvalues['year'][$x]."'
                                         group by t.district
                                         order by t.zone,t.district asc";
 
                         /* where t.status like 'Yes%' 
                         && t.zone='".$region."'
                         && t.district='".$formvalues['districtCode'][$x]."'
                         && t.semi_annual='".$formvalues['semiAnnual'][$x]."'
                         && t.year='".$formvalues['year'][$x]."'
                         && t.typeofparticipants='".$formvalues['participants'][$x]."'
                         group by t.district
                         order by t.zone,t.district asc"; */
 
                         //$obj->alert($sql);
                         $q=@Execute($sql) or die(http("Edit-104"));
         
         
         while($row=@FetchRecords($q)){
         $data.="<tr class='evenrow'>
         
         
         
         
         <td><input name='loopkey[]' size='10'  type='hidden' id='loopkey".$n."' value='".$row['training_id']."'  />".$n."</td>
         
          <!--<td colspan=''><select name='organization[]' id='organization'  style='width:200px;'><option value=''>-select-</option>";
                                 //$data.=QueryManager::OrganizationFilter($region,$formvalues['districtCode'][$x],$formvalues['org_code'][$x]);
                                 
                                 $x1="select * from tbl_organization where zone='".$row['zone']."' and district='".$row['district']."'  order by orgName asc";
                                         //$obj->alert($x1);								
                                         $queryq=@mysql_query($x1)or die(http("QMGR-2719"));
                                         while($ROW=@mysql_fetch_array($queryq)){
                                         $selected1=($row['org_code']==$ROW['org_code'])?"SELECTED":"";
                                         $data.="<option value=\"".$ROW['org_code']."\" ".$selected1." >".substr($ROW['orgName'],0,500)."</option>";			
                                                                 
                                         }
                                 
                                   $data.="</select></td>
                                 
         
         <td colspan=''><select name='trainees[]' id='trainees' style='width:100px;'><option value=''>-All-</option>";
         
 /* 	".funct_dropDown('tbl_trainees', 'Name', $row['typeofparticipants'], 'Name') */
 $data.=QueryManager::TraineesFilter($row['typeofparticipants']);
 
 $data.="</select></td>-->
         <td colspan=''><select name='district[]' id='district' style='width:100px;'><option value=''>-select-</option>";
         
                 $data.=QueryManager::DistrictFilter($region,$row['district']);
         
         $data.="</select></td>
         <td>
         <input name='loopkey1[]' size='10'  type='hidden' id='loopkey' value='1'  />
         <input name='trainingtopic1[]' size='10' type='hidden' id='trainingtopic1".$n."' value='1'  />
         <input name='malehoe[]' size='10'  type='text' id='malehoe".$n."'
         
         onKeyPress='return numbersonly(event, false)'
         
 
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['MaleTraininginIPM']."' /></td>
         <td><input name='femalehoe[]' size='10'  type='text' id='femalehoe".$n."' 
                 onKeyPress='return numbersonly(event, false)'
         
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['FemaleTraininginIPM']."' /></td>
         <td>
                 <input name='loopkey2[]' size='10'  type='hidden' id='loopkey2' value='1'  />
         <input name='trainingtopic2[]' size='10'  type='hidden' id='trainingtopic2".$n."' value='2'  />
         <input name='maleadp[]' size='10'  type='text' id='maleadp".$n."'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"
                 value='".$row['MalePostHarvest']."'  /></td>
         <td><input name='femaleadp[]' size='10'  type='text' id='femaleadp".$n."'
                 onKeyPress='return numbersonly(event, false)'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['FemalePostHarvest']."'  /></td>
           
         <td>
         <input name='loopkey3[]' size='10'  type='hidden' id='loopkey3' value='1'  />
         <input name='trainingtopic3[]' size='10'  type='hidden' id='trainingtopic3".$n."' value='3'  />
         <input name='malemechanized[]' size='10'  type='text' id='malemechanized".$n."' 
                 
                 onKeyPress='return numbersonly(event, false)'
                 
 onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"   value='".$row['MaleBulkMrktng']."'
         
          /></td>
         <td><input name='femalemechanized[]' size='10'  type='text' id='femalemechanized".$n."'
                 onKeyPress='return numbersonly(event, false)'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['FemaleBulkMrktng']."'
           /></td>
         <td>
                 <input name='loopkey4[]' size='10'  type='hidden' id='loopkey4' value='1'  />
                 <input name='trainingtopic4[]' size='10'  type='hidden' id='trainingtopic4".$n."' value='4'  />
         <input name='maleseedling[]' size='10'  type='text' id='maleseedling".$n."' 
                 onKeyPress='return numbersonly(event, false)'
   value='".$row['MaleSeedBen']."'
          /></td>
         <td><input name='femaleseedling[]' size='10'  type='text' id='femaleseedling".$n."'
                 onKeyPress='return numbersonly(event, false)'
    value='".$row['FemaleSeedBen']."' /></td>
         
         
         <td>
                 
                 <input name='loopkey5[]' size='10'  type='hidden' id='loopkey5' value='1'  />
                 <input name='trainingtopic5[]' size='10'  type='hidden' id='trainingtopic5".$n."' value='5'  />
                 <input name='seedlingsgivenout[]' size='10' type='text' id='seedlingsgivenout".$n."'  onKeyPress='return numbersonly(event, false)'
                 value='".$row['seedlingsgivenout']."'
                 
                 
                  /></td>
         <td>
                 <input name='loopkey6[]' size='10'  type='hidden' id='loopkey6' value='1'  />
                 <input name='trainingtopic6[]' size='10'  type='hidden' id='trainingtopic6".$n."' value='6'  />
                 <input name='seed[]' size='10' type='text' id='seed".$n."'  onKeyPress='return numbersonly(event, false)' value='".$row['SeedInputProcured']."' /></td>
                 <td><input name='fertilizer[]' size='10' type='text' id='fertilizer".$n."'  onKeyPress='return numbersonly(event, false)'  value='".$row['FertilizerInputProcured']."' /></td>
                 <td><input name='herbicide[]' size='10' type='text' id='herbicide".$n."'  onKeyPress='return numbersonly(event, false)' value='".$row['HerbicideInputProcured']."' /></td>
                 <td>
                 
                 <input name='loopkey7[]' size='10'  type='hidden' id='loopkey7' value='1'  />
                 <input name='trainingtopic7[]' size='10'  type='hidden' id='trainingtopic7".$n."' value='7'  />
                 <input name='maize[]' size='10' type='text' id='maize".$n."'  onKeyPress='return numbersonly(event, false)' value='".$row['maizeproducebulked']."' /></td>
                 <td><input name='beans[]' size='10' type='text' id='beans".$n."'  onKeyPress='return numbersonly(event, false)' value='".$row['beansproducebulked']."' /></td>
                 <td><input name='sunflower[]' size='10' type='text' id='sunflower".$n."'  onKeyPress='return numbersonly(event, false)' value='".$row['sunflowerproducebulked']."' /></td>
                 <td><input name='soyabean[]' size='10' type='text' id='soyabean".$n."'  onKeyPress='return numbersonly(event, false)' value='".$row['soyaproducebulked']."' /></td>
                 
         </tr>";
         
         
         /**/
         
         $n++;
         
         }
         
                                 }
         
         
 
   $data.=" 
  <tr style='display:none'>
   <td>Attach Minutes</td>
   <td><input name='' size='50' type='file'></td>
   </tr>
   <tr style='display:none'>
   <td>Attach Attendance Sheet/List</td>
   <td><input name='' size='50' type='file'></td>
   </tr>
   ";
  
  
  $data.="<tr class='evenrow'><td></td><td colspan='21' align='right'><div align='right'>
         <button type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_OtherTrainingActivities(xajax.getFormValues('projects')); return false;\" />Save</button>
         </div></td></tr>
 </table>
 
 
 
 </form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_OtherTrainingActivities($formvalues){
 $obj=new xajaxResponse();
 if(($semiAnnual=='Closed')||($_SESSION['Activeyear']=='Closed')){
         $obj->alert("Your Reporting Period Was Closed.Please contact Your M&E Person for Access");
         return $obj;
 }
 /* else {
 
 $obj->alert("Process Halted:Please Check Your Reporting Period to see it is Active and Try again!");
 return $obj;
 }
  
  create or replace view view_othertrainingsandseeddistribution as SELECT `training_id` , `zone` , district, year, semi_annual,
         max( if( `trainingtopicorIndicator` = '1',`male`, 0 )) AS ipmm,
     max( if( `trainingtopicorIndicator` = '1',`female`, 0 )) AS ipmf,
     max( if( `trainingtopicorIndicator` = '2' ,`male`, 0 )) AS TRPOHHM36,
         max( if( `trainingtopicorIndicator` = '2', `female` , 0 )) AS TRPOHHF36,
     max( if( `trainingtopicorIndicator` = '3',`male`, 0 )) AS TRBULKM37,
         max( if( `trainingtopicorIndicator` = '3' ,`female`, 0 )) AS TRBULKF37,
     max( if( `trainingtopicorIndicator` = '4',`male`, 0 )) AS seedbeM39,
         max( if( `trainingtopicorIndicator` = '4' ,`female`, 0 )) AS seedbeF39,
         max( if( `trainingtopicorIndicator` = '5', `seedlingsgivenout`,0)) AS seedlin40,
     max( if( `trainingtopicorIndicator` = '6', `seed`,0)) AS seedproc41,
     max( if( `trainingtopicorIndicator` = '6', `Herbicide`,0)) AS Herbici42,
     max( if( `trainingtopicorIndicator` = '7', `beans`,0)) AS kgbnbul44,
     max( if( `trainingtopicorIndicator` = '7', `maize`,0)) AS kgmaize43,
     max( if( `trainingtopicorIndicator` = '7', `sunflower`,0)) AS kgsunbu45,
     max( if( `trainingtopicorIndicator` = '7', `soyabean`,0)) AS kgsoybu46
     FROM `tbl_othertrainingsandseeddistribution`
         GROUP BY `zone`,district,year,semi_annual asc*/
  $indicator_id=array(78,36,37,39,40,41,42,44,43,45,46);
 $reportingType='Field Supervisors';
 $fyear=$formvalues['year'];
 $zone=$formvalues['region'];
 $semiAnnual=$formvalues['semiAnnual'];
 $fieldofficer=$formvalues['fieldofficer'];
 $organization=$formvalues['organization'];
         $n=1;
         
 
                 //$obj->alert("Note: Only Current Reporting Year Actuals/Achievements Will be Captured/Edited!");
                 //$obj->alert(count($formvalues['total']));
         
                 
                 //$obj->alert(count($formvalues['loopkey1']));
                 
         for($i=0;$i<count($formvalues['loopkey1']);$i++){
                         $trainingtopic1=$formvalues['trainingtopic1'][$i];
                         #$trainees=$formvalues['trainees'][$i];
                         $district=$formvalues['district'][$i];
                         $training_id=$formvalues['training_id'][$i];
                         $malehoe=$formvalues['malehoe'][$i];
                         $femalehoe=$formvalues['femalehoe'][$i];
                         $total=$malehoe+$femalehoe;
                         
                         #$typeofDisaggregation=$formvalues['typeofDisaggregation'][$i];
                         
 //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                          
  if(($total<>NULL)){
 
 
                                         $insert="INSERT INTO tbl_othertrainingsandseeddistribution
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `trainingtopicorIndicator`, `male`, `female`,`total`,`updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	'".$trainingtopic1."','".$malehoe."','".$femalehoe."','".$total."','".$_SESSION['username']."','".$fieldofficer."')
                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `trainingtopicorIndicator`='".$trainingtopic1."', `male`='".$malehoe."', `female`='".$femalehoe."',`total`='".$total."', updatedby='".$_SESSION['username']."'";
                         //$obj->alert($insert);
                         @mysql_query($insert)or die(http("Edit-887"));
                         
                         //------UPDATING indicator Results--------------
                         /* @Execute("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,`typeofparticipants`,
                          `ReportingType`,`indicator_id`, `male`, `female`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic1."',
                         '".$reportingType."','".$indicator_id[0]."','".$malehoe."','".$femalehoe."','".$total."','".$_SESSION['username']."') 
                         on duplicate key zone='".$zone."',district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."',
                          indicator_id='".$indicator_id[0]."',`typeofparticipants`='".$trainingtopic1."', `male`='".$malehoe."', `female`='".$femalehoe."',
                          `total`='".$total."', updatedby='".$_SESSION['username']."'
                         ")or die(http("Edit-388")); */
                                                 
                         $x=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic1,$reportingType,$indicator_id[0],$malehoe,$femalehoe,$other='',$total,$gender='Yes',$error_Code='Edit-417');
                         
                         }
                                 }
                         
                         
                         //$obj->alert(count($formvalues['loopkey2']));
                         for($i=0;$i<count($formvalues['loopkey2']);$i++){
                         $trainingtopic2=$formvalues['trainingtopic2'][$i];
                         #$trainees=$formvalues['trainees'][$i];
                         $district=$formvalues['district'][$i];
                         $maleadp=$formvalues['maleadp'][$i];
                         $femaleadp=$formvalues['femaleadp'][$i];
                         //$total=$formvalues['total'][$i];
                         $total2=$maleadp+$femaleadp;
                                                 
                                                 
                                                 //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                                                 
                                         if(($total2<>NULL)){	
                         
                                                         $insert2="INSERT INTO tbl_othertrainingsandseeddistribution
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `trainingtopicorIndicator`, `male`, `female`,`total`,`updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	'".$trainingtopic2."','".$maleadp."','".$femaleadp."','".$total2."','".$_SESSION['username']."','".$fieldofficer."')
                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `trainingtopicorIndicator`='".$trainingtopic2."', `male`='".$maleadp."', `female`='".$femaleadp."',`total`='".$total2."', updatedby='".$_SESSION['username']."'";
                         //$obj->alert($insert2);
                         
                         @mysql_query($insert2)or die(http("Edit-444"));
                         
                         //--------Updating Indicator Results-----------------------
                         /* @Execute("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,
                         `typeofparticipants`, `ReportingType`,`indicator_id`, `male`, `female`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic2."','".$reportingType."',
                         '36','".$maleadp."','".$femaleadp."','".$total2."','".$_SESSION['username']."') on duplicate key zone='".$zone."',
                         district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."', indicator_id='36',`typeofparticipants`='".$trainingtopic2."',
                          `male`='".$maleadp."', `female`='".$femaleadp."',`total`='".$total2."', updatedby='".$_SESSION['username']."'
                         ")or die(http("Edit-474")); */
                         $x1=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic2,$reportingType,$indicator_id[1],$maleadp,$femaleadp,$other='',$total2,$gender='Yes',$error_Code='Edit-474');
                         
                         
                         }
                         }
                         //$obj->alert(count($formvalues['loopkey3']));
                         //------------Bulk Marketing--------------------
                         for($i=0;$i<count($formvalues['loopkey3']);$i++){
                                 $trainingtopic3=$formvalues['trainingtopic3'][$i];
                                 $district=$formvalues['district'][$i];
                                 #$trainees=$formvalues['trainees'][$i];
                         $malemechanized=$formvalues['malemechanized'][$i];
                         $femalemechanized=$formvalues['femalemechanized'][$i];
                         //$total=$formvalues['total'][$i];
                         $total3=$malemechanized+$femalemechanized;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                         if(($total3<>NULL)){
                         
                         $insert3="INSERT INTO tbl_othertrainingsandseeddistribution
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `trainingtopicorIndicator`, `male`, `female`,`total`,`updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	'".$trainingtopic3."','".$malemechanized."',
                         '".$femalemechanized."','".$total3."','".$_SESSION['username']."','".$fieldofficer."')
                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `trainingtopicorIndicator`='".$trainingtopic3."', `male`='".$malemechanized."', `female`='".$femalemechanized."',`total`='".$total3."', updatedby='".$_SESSION['username']."'";
                                 
                                 //$obj->alert($insert3);
                                 @mysql_query($insert3)or die(http("Edit-938"));
                                 
                                 //----------Updating Indicator Results--------------------
                                 /* @Execute("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,
                         `typeofparticipants`, `ReportingType`,`indicator_id`, `male`, `female`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic3."','".$reportingType."',
                         '37','".$malemechanized."','".$femalemechanized."','".$total3."','".$_SESSION['username']."') on duplicate key zone='".$zone."',
                         district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."', indicator_id='37',`typeofparticipants`='".$trainingtopic3."',
                          `male`='".$malemechanized."', `female`='".$femalemechanized."',`total`='".$total3."', updatedby='".$_SESSION['username']."'
                         ")or die(http("Edit-400")); */
                         $x3=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic3,$reportingType,$indicator_id[2],$malemechanized,$femalemechanized,$other='',$total3,$gender='Yes',$error_Code='Edit-489');
                                 
                         }
                         }
                         
                         //-------------Seedling given out
                         
                         for($i=0;$i<count($formvalues['loopkey4']);$i++){
                                 $trainingtopic4=$formvalues['trainingtopic4'][$i];
                                 $district=$formvalues['district'][$i];
                                 #$trainees=$formvalues['trainees'][$i];
                         $maleseedling=$formvalues['maleseedling'][$i];
                         $femaleseedling=$formvalues['femaleseedling'][$i];
                         #$total=$formvalues['total'][$i];
                         $total4=$maleseedling+$maleseedling;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                         if(($total4<>NULL)){
                         
                         $insertseedling="INSERT INTO tbl_othertrainingsandseeddistribution
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `trainingtopicorIndicator`, `male`, `female`,`total`,`updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."','".$trainingtopic4."','".$maleseedling."',
                         '".$femaleseedling."','".$total4."','".$_SESSION['username']."','".$fieldofficer."')
                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `trainingtopicorIndicator`='".$trainingtopic4."', `male`='".$maleseedling."', `female`='".$femaleseedling."',`total`='".$total4."', updatedby='".$_SESSION['username']."'";
                                 
                                 //$obj->alert($insert3);
                                 @mysql_query($insertseedling)or die(http("Edit-507"));
                                 
                         //----------Updating Indicator Results----------------------------------------------------
                                 /* @Execute("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,
                         `typeofparticipants`, `ReportingType`,`indicator_id`, `male`, `female`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic4."','".$reportingType."',
                         '39','".$maleseedling."','".$femaleseedling."','".$total4."','".$_SESSION['username']."') on duplicate key zone='".$zone."',
                         district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."', indicator_id='39',`typeofparticipants`='".$trainingtopic4."',
                          `male`='".$maleseedling."', `female`='".$femaleseedling."',`total`='".$total4."', updatedby='".$_SESSION['username']."'
                         ")or die(http("Edit-516")); */
                                                 $x4=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[3],
                                                                                         $maleseedling,$femaleseedling,$other='',$total4,$gender='Yes',$error_Code='Edit-524');
                         
                         
                         
                         
                                 
                                 
                                 
                         }
                         }//-------------------ond of seedling
                         
                         
                         
                         
                         //$obj->alert(count($formvalues['loopkey4']));
                         //-------------Seedling beneficiaries--------------------
                                 for($i=0;$i<count($formvalues['loopkey5']);$i++){
                         $district=$formvalues['district'][$i];
                         $trainingtopic5=$formvalues['trainingtopic5'][$i];
                         $seedlingsgivenout=$formvalues['seedlingsgivenout'][$i];
                         
                         if(($seedlingsgivenout<>NULL)){
                         
                         $insert5="INSERT INTO tbl_othertrainingsandseeddistribution
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `trainingtopicorIndicator`, `updatedby`,FieldOfficerResponsible,seedlingsgivenout) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	'".$trainingtopic5."','".$_SESSION['username']."','".$fieldofficer."','".$seedlingsgivenout."')
                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `trainingtopicorIndicator`='".$trainingtopic5."', updatedby='".$_SESSION['username']."',seedlingsgivenout='".$seedlingsgivenout."'
                                 ";
                                                 
                         //$obj->alert($insert5);
                         @mysql_query($insert5)or die(http("Edit-966"));
                         //----------Updating Indicator Information-----------------
                         /* @Execute("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,
                         `typeofparticipants`, `ReportingType`,`indicator_id`,`other`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic5."','".$reportingType."',
                         '40','".$seedlingsgivenout."','".$seedlingsgivenout."','".$_SESSION['username']."') on duplicate key zone='".$zone."',
                         district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."', indicator_id='40',`typeofparticipants`='".$trainingtopic5."',
                          `other`='".$seedlingsgivenout."',`total`='".$seedlingsgivenout."', updatedby='".$_SESSION['username']."'
                         ")or die(http("Edit-539")); */
                         
                                                 $x5=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic5,$reportingType,$indicator_id[4],'',
                                                                                                                                         '',$seedlingsgivenout,$seedlingsgivenout,$gender='No',$error_Code='Edit-566');
                         
                         
                         }
                         }
                         
                         
                         
                         for($i=0;$i<count($formvalues['loopkey6']);$i++){
                         $district=$formvalues['district'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $trainingtopic6=$formvalues['trainingtopic6'][$i];
                         $seed=$formvalues['seed'][$i];
                         $fertilizer=$formvalues['fertilizer'][$i];
                         $herbicide=$formvalues['herbicide'][$i];
                         $total6=$seed+$fertilizer+$herbicide;
                         
                         if(($total6<>NULL)){
                         
                         
                         
                         $insert6="INSERT INTO tbl_othertrainingsandseeddistribution
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `trainingtopicorIndicator`, `seed`, `Fertilizer`,`Herbicide`,totalinputs,`updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	'".$trainingtopic6."','".$seed."','".$fertilizer."',
                         '".$herbicide."','".$total6."','".$_SESSION['username']."','".$fieldofficer."')
                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', 
                                 `semi_annual`='".$semiAnnual."', `year`='".$fyear."', 
                                 `trainingtopicorIndicator`='".$trainingtopic6."',
                                 `seed`='".$seed."',
                                  `Fertilizer`='".$fertilizer."',
                                 `Herbicide`='".$herbicide."',
                                 totalinputs='".$total6."',
                                  updatedby='".$_SESSION['username']."'
                                 ";
                                                 
                         //$obj->alert($insert4);
                         @mysql_query($insert6)or die(http("Edit-985"));
                         
                         //----------Updating Indicator Information-----------------
                         /* @Execute("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,
                         `typeofparticipants`, `ReportingType`,`indicator_id`,`other`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic6."','".$reportingType."',
                         '41','".$seed."','".$seed."','".$_SESSION['username']."') on duplicate key zone='".$zone."',
                         district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."', indicator_id='41',`typeofparticipants`='".$trainingtopic6."',
                          `other`='".$seed."',`total`='".$seed."', updatedby='".$_SESSION['username']."'
                         ")or die(http("Edit-595")); */
                                                 $x6=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic6,$reportingType,$indicator_id[5],'',
                                                                                                                                         '',$seedlingsgivenout,$seedlingsgivenout,$gender='No',$error_Code='Edit-613');
         
                         
                         
                         
                         
                         
                                 /* @Execute("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,
                         `typeofparticipants`, `ReportingType`,`indicator_id`,`other`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic6."','".$reportingType."',
                         '42','".$herbicide."','".$herbicide."','".$_SESSION['username']."') on duplicate key zone='".$zone."',
                         district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."', indicator_id='42',`typeofparticipants`='".$trainingtopic6."',
                          `other`='".$herbicide."',`total`='".$herbicide."', updatedby='".$_SESSION['username']."'
                         ")or die(http("Edit-595")); */
                         
                         
                                         $x7=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic6,$reportingType,$indicator_id[6],'',
                                                                                                                                         '',$herbicide,$herbicide,$gender='No',$error_Code='Edit-629');
                         
                         
                         
                         }
                         }
                         
                         
                         
                         
                         for($i=0;$i<count($formvalues['loopkey7']);$i++){
                         $district=$formvalues['district'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $trainingtopic7=$formvalues['trainingtopic7'][$i];
                         $maize=$formvalues['maize'][$i];
                         $beans=$formvalues['beans'][$i];
                         $sunflower=$formvalues['sunflower'][$i];
                         $soyabean=$formvalues['soyabean'][$i];
                         $total7=$maize+$beans+$sunflower+$soyabean;
                         
                         if(($total7<>NULL)){
                         
                         
                         
                         $insert7="INSERT INTO tbl_othertrainingsandseeddistribution
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `trainingtopicorIndicator`, `maize`, `beans`,`sunflower`,soyabean,totaloutputs,`updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	'".$trainingtopic7."','".$maize."','".$beans."',
                         '".$sunflower."','".$soyabean."','".$total7."','".$_SESSION['username']."','".$fieldofficer."')
                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', 
                                 `semi_annual`='".$semiAnnual."', `year`='".$fyear."', 
                                 `trainingtopicorIndicator`='".$trainingtopic7."',
                                 `maize`='".$maize."',
                                  `beans`='".$beans."',
                                  sunflower='".$sunflower."',
                                 `soyabean`='".$soyabean."',
                                 totalinputs='".$total7."',
                                  updatedby='".$_SESSION['username']."' ";
                                                 
                         //$obj->alert($insert4);
                         @mysql_query($insert7)or die(http("Edit-1024"));
                         
                         //----------Updating Indicator Information------------------------------------------
                         /* @Execute("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,
                         `typeofparticipants`, `ReportingType`,`indicator_id`,`other`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic7."','".$reportingType."',
                         '44','".$beans."','".$beans."','".$_SESSION['username']."') on duplicate key zone='".$zone."',
                         district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."', indicator_id='44',`typeofparticipants`='".$trainingtopic7."',
                          `other`='".$beans."',`total`='".$beans."', updatedby='".$_SESSION['username']."'
                         ")or die(http("Edit-651")); */
                         $x8=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic7,$reportingType,$indicator_id[7],'',
                                                                                                                                         '',$beans,$beans,$gender='No',$error_Code='Edit-679');
                         
                         
                         
                                 /* @Execute("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,
                         `typeofparticipants`, `ReportingType`,`indicator_id`,`other`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic7."','".$reportingType."',
                         '43','".$maize."','".$maize."','".$_SESSION['username']."') on duplicate key zone='".$zone."',
                         district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."', indicator_id='43',`typeofparticipants`='".$trainingtopic7."',
                          `other`='".$maize."',`total`='".$maize."', updatedby='".$_SESSION['username']."'
                         ")or die(http("Edit-659")); */
                         
                         $x9=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic7,$reportingType,$indicator_id[8],'',
                                                                                                                                         '',$maize,$maize,$gender='No',$error_Code='Edit-692');
                         
                         
                         
                         /* @Execute("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,
                         `typeofparticipants`, `ReportingType`,`indicator_id`,`other`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic7."','".$reportingType."',
                         '45','".$sunflower."','".$sunflower."','".$_SESSION['username']."') on duplicate key zone='".$zone."',
                         district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."', indicator_id='45',`typeofparticipants`='".$trainingtopic7."',
                          `other`='".$sunflower."',`total`='".$sunflower."', updatedby='".$_SESSION['username']."'
                         ")or die(http("Edit-667")); */
                         
                         
                         $x10=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic7,$reportingType,$indicator_id[9],'',
                                                                                                                                         '',$sunflower,$sunflower,$gender='No',$error_Code='Edit-707');
                         
                                 /* @Execute("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,
                         `typeofparticipants`, `ReportingType`,`indicator_id`,`other`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic7."','".$reportingType."',
                         '46','".$soyabean."','".$soyabean."','".$_SESSION['username']."') on duplicate key zone='".$zone."',
                         district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."', indicator_id='46',`typeofparticipants`='".$trainingtopic7."',
                          `other`='".$soyabean."',`total`='".$soyabean."', updatedby='".$_SESSION['username']."'
                         ")or die(http("Edit-675")); */
                                         $x11=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic7,$reportingType,$indicator_id[10],'',
                                                                                                                                         '',$soyabean,$soyabean,$gender='No',$error_Code='Edit-717');
                         
                                         
                         
                         
                         }
                         }
                         
                         
                         //$obj->alert($insert."--".$insert2."--".$insert3."--".$insert4."--".$insert5."--");
                         
 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
 //$obj->call("xajax_ViewAnnualTargets",'','','','','','','','','',1,20);
 return $obj;
 }
 function edit_CFTechnicalTrainingActivities($formvalues,$region){
 //,$district,$organization
 $obj=new xajaxResponse();
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
 $obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
 return $obj;
 }
 
 if(($region==NULL)){
 $obj->alert("Please select Region for which you are edititing Data For!");
 return $obj;
 }
 /* if(($dis==NULL)){
 $obj->alert("Please select Region for which you are edititing Data For!");
 return $obj;
 } */
 
 $n=1;
 $inc=1;
 
 $fyear=($fyear==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$fyear;
 #$obj->alert($_SESSION['parishCode']);
 //$n=1;
 $data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
 <table width='100%' id='report'>";
  
   $data.="
   
                         <tr class='evenrow'>
           <td width='30%' colspan='3'>
           <div align='left'><strong>Region</strong></div></td>
           <td colspan='11'><select name='region' id='region' onchange=\"xajax_new_CFTechnicalTrainingActivities(this.value,'','".$organization."','".$fyear."');return false;\" style='width:300px;'><option value=''>-select-</option>";
                         $data.=QueryManager::ZoneFilter($region);
                   $data.="</select></td>
         </tr>
                 
                 
 <tr class='evenrow3'><td colspan='3'>Financial Year:</td>
         <td colspan='11'><select name='year' id='year'   style='width:300px;'><option value=''>-select-</option>";
                                 $data.=QueryManager::FinancialYearFilter($fyear);
                                   $data.="</select></td>
         </tr>
         <tr class='evenrow'><td colspan='3'>Reporting Period</td>
          <td colspan='11'><select name='semiAnnual' id='semiAnnual' style='width:300px;'><option value=''>-select-</option>";
                                 $data.=QueryManager::ReportingPeriodFilter($period=$_SESSION['quarter']);
                                   $data.="</select></td></tr>
         <tr class='display_none'>
   <td>Field Officer</td>
  
  <td> <input type='text' name='fieldofficerxx' id='fieldofficerxx' size='25' value='".$row['FieldOfficerResponsible']."' ></td>
   </tr>
         <tr CLASS='evenrow'>
      <th colspan='14' ><center>TECHNICAL TRAINING ACTIVITIES</center></th>
           </tr>
         
         
         <tr><th colspan='' ROWSPAN='2'>No</th>
                 <th ROWSPAN='2' colspan='1'>Trainees</th>
         <th ROWSPAN='2' colspan='1'>DISTRICT</th>
         
         <th colspan='2'><center>CF HOE</center></th>
         <th colspan='2'><center>CF ADP</center></th>
         <th colspan='2'><center>CF Mechanized</center></th>
         <th colspan='2'><center>CF Herbicide Safety and Use</center>
         <img src='images/spacer2.png' width='100' height='0.1'></th>
         <th colspan='2'><center>Tree Planting</center></th>
         <!--<th ROWSPAN='2' colspan='1'><center>Total</center></th>-->
                 </tr>
         <tr>
         
         
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
                 <th>Male</th>
         <th>Female</th>
 
         </tr>";
         //$obj->alert($formvalues['districtCode']);
         for($x=0;$x<count($formvalues['districtCode']);$x++){
         
                 $sql="select t.`training_id`,t.zone,t.FieldOfficerResponsible,
                         t.`semi_annual`, t.`year`, 
                         max(if(t.`training_topic`='1',t.male,'-')) as MaleHoebasin,
                         max(if(t.`training_topic`='1',t.female,'-')) as FemaleHoebasin,
                         max(if(t.`training_topic`='2',t.male,'-')) as MaleADPRipping,
                         max(if(t.`training_topic`='2',t.female,'-')) as FemaleADPRipping,
                         max(if(t.`training_topic`='3',t.male,'-')) as MaleMechanizedRipping,
                         max(if(t.`training_topic`='3',t.female,'-')) as FemaleMechanizedRipping,
                         max(if(t.`training_topic`='4',t.male,'-')) as MaleHerbicide,
                         max(if(t.`training_topic`='4',t.female,'-')) as FemaleHerbicide,
                         max(if(t.`training_topic`='5',t.male,'-')) as MaleTreePlanting,
                         max(if(t.`training_topic`='5',t.female,'-')) as FemaleTreePlanting,
                         t.`typeofparticipants`,  t.`organizing_date`, 
                         t.`updatedby`, t.`status`, t.`district`, d.districtName
                         from tbl_technicaltraining t left join tbl_trainees tr 
                         on(tr.code=t.typeofparticipants)
                         left join tbl_district d on(d.districtCode=t.district)
                         left join tbl_trainees e on(e.code=t.typeofparticipants)
                         where t.status like 'Yes%' 
                         && t.zone='".$region."'
                         && t.district='".$formvalues['districtCode'][$x]."'
                         && t.semi_annual='".$formvalues['semiAnnual'][$x]."'
                         && t.year='".$formvalues['year'][$x]."'
                         && t.typeofparticipants='".$formvalues['participants'][$x]."'
                         group by t.district
                         order by t.zone,t.district asc";
 
 
 /* $sql=QueryManager::ViewCFTechnicalTrainingActivities($region,$formvalues['district'][$x],$formvalues['organization'][$x],$formvalues['year'][$x],$formvalues['semiAnnual'][$x],$formvalues['participant'][$x]);<input name='district[]' type='hidden' id='district' value='".$row['district']."'>
         <input name='region[]' type='hidden' id='region' value='".$row['zone']."'>
         <input name='participants[]' type='hidden' id='participants' value='".$row['typeofparticipants']."'>
                 <input name='organization[]' type='hidden' id='organization' value='".$row['org_code']."'>
                 <input name='semiAnnual[]' type='hidden' id='semiAnnual' value='".$row['semi_annual']."'>
                 <input name='year[]' type='hidden' id='year' value='".$row['year']."'> */
 
 
 //$obj->alert($sql);
                         $q=@Execute($sql) or die(http("Edit-104"));
         
         
         while($row=@FetchRecords($q)){
         $data.="<tr class='evenrow'>
         
         
         
         
         <td><input name='loopkey[]' size='10'  type='hidden' id='loopkey".$n."' value='".$row['training_id']."'  />".$n."</td>
         
          <!--<td colspan=''><select name='organization[]' id='organization'  style='width:200px;'><option value=''>-select-</option>";
                                 //$data.=QueryManager::OrganizationFilter($region,$formvalues['districtCode'][$x],$formvalues['org_code'][$x]);
                                 
                                 $x1="select * from tbl_organization where zone='".$row['zone']."' and district='".$row['district']."'  order by orgName asc";
                                         //$obj->alert($x1);								
                                         $queryq=@mysql_query($x1)or die(http("QMGR-2719"));
                                         while($ROW=@mysql_fetch_array($queryq)){
                                         $selected1=($row['org_code']==$ROW['org_code'])?"SELECTED":"";
                                         $data.="<option value=\"".$ROW['org_code']."\" ".$selected1." >".substr($ROW['orgName'],0,500)."</option>";			
                                                                 
                                         }
                                 
                                   $data.="</select></td>-->
                                 
         
         <td colspan=''><select name='trainees[]' id='trainees' style='width:100px;'><option value=''>-All-</option>";
         
 /* 	".funct_dropDown('tbl_trainees', 'Name', $row['typeofparticipants'], 'Name') */
 $data.=QueryManager::TraineesFilter($row['typeofparticipants']);
 
 $data.="</select></td>
         <td colspan=''><select name='district[]' id='district' style='width:100px;'><option value=''>-select-</option>";
         
                 $data.=QueryManager::DistrictFilter($region,$row['district']);
         
         $data.="</select></td>
         <td>
         <input name='loopkey1[]' size='10'  type='hidden' id='loopkey' value='1'  />
         <input name='trainingtopic1[]' size='10' type='hidden' id='trainingtopic1".$n."' value='1'  />
         <input name='malehoe[]' size='10'  type='text' id='malehoe".$n."'
         
         onKeyPress='return numbersonly(event, false)'
         
 
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['MaleHoebasin']."'
         
           /></td>
         <td><input name='femalehoe[]' size='10'  type='text' id='femalehoe".$n."' 
                 onKeyPress='return numbersonly(event, false)'
         
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"
         
         value='".$row['FemaleHoebasin']."'
         
          /></td>
         <td>
                 <input name='loopkey2[]' size='10'  type='hidden' id='loopkey2' value='1'  />
         <input name='trainingtopic2[]' size='10'  type='hidden' id='trainingtopic2".$n."' value='2'  />
         <input name='maleadp[]' size='10'  type='text' id='maleadp".$n."'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"
                 value='".$row['MaleADPRipping']."'  /></td>
         <td><input name='femaleadp[]' size='10'  type='text' id='femaleadp".$n."'
                 onKeyPress='return numbersonly(event, false)'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['FemaleADPRipping']."'
           /></td>
         <td>
         <input name='loopkey3[]' size='10'  type='hidden' id='loopkey3' value='1'  />
         <input name='trainingtopic3[]' size='10'  type='hidden' id='trainingtopic3".$n."' value='3'  />
         <input name='malemechanized[]' size='10'  type='text' id='malemechanized".$n."' 
                 
                 onKeyPress='return numbersonly(event, false)'
                 
 onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"   value='".$row['MaleMechanizedRipping']."'
         
          /></td>
         <td><input name='femalemechanized[]' size='10'  type='text' id='femalemechanized".$n."'
                 onKeyPress='return numbersonly(event, false)'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['FemaleMechanizedRipping']."'
           /></td>
         <td>
                 <input name='loopkey4[]' size='10'  type='hidden' id='loopkey4' value='1'  />
                 <input name='trainingtopic4[]' size='10'  type='hidden' id='trainingtopic4".$n."' value='4'  />
         <input name='maleherbicide[]' size='10'  type='text' id='maleherbicide".$n."' 
                 onKeyPress='return numbersonly(event, false)'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['MaleHerbicide']."'
          /></td>
         <td><input name='femaleherbicide[]' size='10'  type='text' id='femaleherbicide".$n."'
                 onKeyPress='return numbersonly(event, false)'
 onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"   value='".$row['FemaleHerbicide']."' /></td>
         <td>
                 
                 <input name='loopkey5[]' size='10'  type='hidden' id='loopkey5' value='1'  />
         <input name='trainingtopic5[]' size='10'  type='hidden' id='trainingtopic5".$n."' value='5'  />
         <input name='maletreeplanting[]' size='10'  type='text' id='maletreeplanting".$n."'
                 onKeyPress='return numbersonly(event, false)'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"    value='".$row['MaleTreePlanting']."'
           /></td>
         <td><input name='femaletreeplanting[]' size='10'  type='text' id='femaletreeplanting".$n."' 
                 onKeyPress='return numbersonly(event, false)'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"     value='".$row['FemaleTreePlanting']."'
          /></td>
                 
         </tr>";
         
         
         
         /**/
         
         $n++;
         
         }
         
                                 }
         
         
 
   $data.=" 
  <tr style='display:none'>
   <td>Attach Minutes</td>
   <td><input name='' size='50' type='file'></td>
   </tr>
   <tr style='display:none'>
   <td>Attach Attendance Sheet/List</td>
   <td><input name='' size='50' type='file'></td>
   </tr>
   ";
  
  
  $data.="<tr class='evenrow'><td></td><td colspan='14' align='right'><div align='right'>
         <button type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_TechnicalTraining(xajax.getFormValues('projects')); return false;\" />Save</button>
         </div></td></tr>
 </table>
 
 
 
 </form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_TechnicalTraining($formvalues){
 $obj=new xajaxResponse();
 if($semiAnnual=='Closed'){
         $obj->alert("Your Reporting Period Was Closed.Please contact Your M&E Person for Access");
         return $obj;
 }
 /* else {
 
 $obj->alert("Process Halted:Please Check Your Reporting Period to see it is Active and Try again!");
 return $obj;
 }
 
 create or replace view view_cftrainingindicators as SELECT `training_id` , `zone` , district, year, semi_annual,
         max( if( `training_topic` = '1' && `typeofparticipants` = '2', `male` , 0 )) AS LFTHOEM1,
     max( if( `training_topic` = '1' && `typeofparticipants` = '2', `female` , 0 )) AS LFTHOEF1,
     max( if( `training_topic` = '1' && `typeofparticipants` = '8', `male` , 0 )) AS POTHOEM52,
         max( if( `training_topic` = '1' && `typeofparticipants` = '8', `female` , 0 )) AS POTHOEF52,
     max( if( `training_topic` = '1' && `typeofparticipants` = '9', `male` , 0 )) AS OFTHOEM55,
         max( if( `training_topic` = '1' && `typeofparticipants` = '9', `female` , 0 )) AS OFTHOEF55,
         max( if( `training_topic` = '2' && `typeofparticipants` = '2', `male` , 0 )) AS LFTADPM30,
         max( if( `training_topic` = '2' && `typeofparticipants` = '2', `female` , 0 )) AS LFTADPF30,
         max( if( `training_topic` = '2' && `typeofparticipants` = '8', `male` , 0 )) AS POTADPM53,
     max( if( `training_topic` = '2' && `typeofparticipants` = '8', `female` , 0 )) AS POTADPF53,
         max( if( `training_topic` = '2' && `typeofparticipants` = '9', `male` , 0 )) AS OFTADMP65,
         max( if( `training_topic` = '2' && `typeofparticipants` = '9', `female` , 0 )) AS OFTADFP65,
         max( if( `training_topic` = '3' && `typeofparticipants` = '2', `male` , 0 )) AS LFTMECM31,
         max( if( `training_topic` = '3' && `typeofparticipants` = '2', `female` , 0 )) AS LFTMEFC31,
         max( if( `training_topic` = '3' && `typeofparticipants` = '8', `male` , 0 )) AS POTMECM54,
     max( if( `training_topic` = '3' && `typeofparticipants` = '8', `female` , 0 )) AS POTMECF54,
         max( if( `training_topic` = '3' && `typeofparticipants` = '9', `male` , 0 )) AS OFTMECM66,
         max( if( `training_topic` = '3' && `typeofparticipants` = '9', `female` , 0 )) AS FTMECF66,
     
     sum( if( `training_topic` = '4', `male` ,0)) AS HERBUSM19,
     sum( if( `training_topic` = '4', `female`,0)) AS HERBUSF19,
     sum( if( `training_topic` = '5', `male` ,0)) AS TREEPLM38,
     sum( if( `training_topic` = '5', `female`,0)) AS TREEPLF38
     FROM `tbl_technicaltraining`
         GROUP BY `zone`,district,year,semi_annual asc
 
 
  */
                 $indicator_id=array(1,52,55,30,53,65,31,54,66,19,87,88,38,89,90,56,57,94); #[15,16,17]
 $fyear=$formvalues['year'];
 $zone=$formvalues['region'];
 //$district=$formvalues['district'];
 $semiAnnual=$formvalues['semiAnnual'];
 $fieldofficer=$formvalues['fieldofficer'];
 $organization=$formvalues['organization'];
         $n=1;
         
 
                 //$obj->alert("Note: Only Current Reporting Year Actuals/Achievements Will be Captured/Edited!");
                 //$obj->alert(count($formvalues['total']));
                 
                 //for($i=0;$i<count($formvalues['loopkey']);$i++){
                 
                 //$obj->alert(count($formvalues['loopkey1']));
                 
         for($i=0;$i<count($formvalues['loopkey1']);$i++){
         
                         $trainingtopic1=$formvalues['trainingtopic1'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $district=$formvalues['district'][$i];
                         $training_id=$formvalues['training_id'][$i];
                         $malehoe=$formvalues['malehoe'][$i];
                         $femalehoe=$formvalues['femalehoe'][$i];
                         $total=$malehoe+$femalehoe;
                         
                         #$typeofDisaggregation=$formvalues['typeofDisaggregation'][$i];
                         
 //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                          
  if(($total<>NULL)){
 
 
                                         $insert="INSERT INTO tbl_technicaltraining
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `training_topic`, `male`, `female`,`typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	'".$trainingtopic1."','".$malehoe."','".$femalehoe."','".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')	ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `training_topic`='".$trainingtopic1."', `male`='".$malehoe."', `female`='".$femalehoe."',`typeofparticipants`='".$trainees."', `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                         //$obj->alert($insert);
                         @mysql_query($insert)or die(http("Edit-1156"));
                         
                         
                         
                         switch($trainees){
                         case 2:
                         
                         $x1=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic1,$reportingType,$indicator_id[0],$malehoe,$femalehoe,'',$total,$gender='Yes',$error_Code="Edit-1169");
                         break;
                         case 8:
                         
                         $x1=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic1,$reportingType,$indicator_id[1],$malehoe,$femalehoe,'',$total,$gender='Yes',$error_Code="Edit-1167");
                         
                         break;
                         case 9:
                         $x1=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic1,$reportingType,$indicator_id[2],$malehoe,$femalehoe,'',$total,$gender='Yes',$error_Code="Edit-1171");
                         break;
                         default:
                                         
                         }
                         
                         
                         
                         
                         
                         }}
                         
                         
                         
                         
                         
                         //$obj->alert(count($formvalues['loopkey2']));
                         for($i=0;$i<count($formvalues['loopkey2']);$i++){
                         $trainingtopic2=$formvalues['trainingtopic2'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $district=$formvalues['district'][$i];
                         $maleadp=$formvalues['maleadp'][$i];
                         $femaleadp=$formvalues['femaleadp'][$i];
                         //$total=$formvalues['total'][$i];
                         $total2=$maleadp+$femaleadp;
                                                 
                                                 
                                                 //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                                                 
                                         if(($total2<>NULL)){	
                         
                                                         $insert2="INSERT INTO tbl_technicaltraining
                                                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `training_topic`, `male`, `female`,`typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                                                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	'".$trainingtopic2."','".$maleadp."','".$femaleadp."','".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')	ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."', `org_code`='".$organization."', `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `training_topic`='".$trainingtopic2."', `male`='".$maleadp."', `female`='".$femaleadp."',`typeofparticipants`='".$trainees."', `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                         //$obj->alert($insert2);
                         
                         @Execute($insert2)or die(http("Edit-604"));
                         
                         
                         
                         
 switch($trainees){
                         case 2:
                         
                         $x2=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic2,$reportingType,$indicator_id[3],$maleadp,$femaleadp,'',$total2,$gender='Yes',$error_Code="Edit-1215");
                         break;
                         case 8:
                         
                         $x2=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic2,$reportingType,$indicator_id[4],$maleadp,$femaleadp,'',$total2,$gender='Yes',$error_Code="Edit-1219");
                         
                         break;
                         case 9:
                         $x2=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic2,$reportingType,$indicator_id[5],$maleadp,$femaleadp,'',$total2,$gender='Yes',$error_Code="Edit-1223");
                         break;
                         default:
                                         
                         }
                         
                         
                         }
                         }
                 //	$obj->alert(count($formvalues['loopkey3']));
                         
                         for($i=0;$i<count($formvalues['loopkey3']);$i++){
                                 $trainingtopic3=$formvalues['trainingtopic3'][$i];
                                 $district=$formvalues['district'][$i];
                                 $trainees=$formvalues['trainees'][$i];
                         $malemechanized=$formvalues['malemechanized'][$i];
                         $femalemechanized=$formvalues['femalemechanized'][$i];
                         //$total=$formvalues['total'][$i];
                         $total3=$malemechanized+$femalemechanized;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                         if(($total3<>NULL)){
                         
                 
                         $insert3="INSERT INTO tbl_technicaltraining
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `training_topic`, `male`, `female`,`typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	'".$trainingtopic3."','".$malemechanized."','".$femalemechanized."','".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')	ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `training_topic`='".$trainingtopic3."', `male`='".$malemechanized."', `female`='".$femalemechanized."',`typeofparticipants`='".$trainees."', `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                                 
                                 //$obj->alert($insert3);
                                 @Execute($insert3)or die(http("Edit-605"));
                                 
                                 //------------Updating indicator  Results---------------------
                                 switch($trainees){
                         case 2:
                         
                         $x3=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic3,$reportingType,$indicator_id[6],$malemechanized,$femalemechanized,'',$total3,$gender='Yes',$error_Code="Edit-1257");
                         break;
                         case 8:
                         
                         $x3=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic3,$reportingType,$indicator_id[7],$malemechanized,$femalemechanized,'',$total3,$gender='Yes',$error_Code="Edit-1261");
                         
                         break;
                         case 9:
                         $x3=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic3,$reportingType,$indicator_id[8],$malemechanized,$femalemechanized,'',$total3,$gender='Yes',$error_Code="Edit-1265");
                         break;
                         default:
                                         
                         }
                                 
                                 
                                 
                         }
                         }
                         
                         //$obj->alert(count($formvalues['loopkey4']));
                         
                                 for($i=0;$i<count($formvalues['loopkey4']);$i++){
                         $district=$formvalues['district'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $trainingtopic4=$formvalues['trainingtopic4'][$i];
                         $maleherbicide=$formvalues['maleherbicide'][$i];
                         $femaleherbicide=$formvalues['femaleherbicide'][$i];
                         //$total=$formvalues['total'][$i];
                         $total4=$maleherbicide+$femaleherbicide;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                         
                         if(($total4<>NULL)){
                         
                         
                         $insert4="INSERT INTO tbl_technicaltraining
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `training_topic`, `male`, `female`,`typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	'".$trainingtopic4."','".$maleherbicide."','".$femaleherbicide."','".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')	ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `training_topic`='".$trainingtopic4."', `male`='".$maleherbicide."', `female`='".$femaleherbicide."',`typeofparticipants`='".$trainees."', `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                         
                         //$obj->alert($insert4);
                         @Execute($insert4)or die(http("Edit-606"));
                         
                         //------------Updating indicator  Results---------------------
                         
                         /* $x4=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[9],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-1257");
                          */	
                          
                          
                          //------------Updating indicator  Results---Herbicides------------------
                                 switch($trainees){
                         case 2:
                         
                         $x4=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[9],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-1308");
                         $x41=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[15],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-1309");
                         break;
                         case 8:
                         
                         $x4=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[10],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-1312");
                         $x42=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[16],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-1314");
                         
                         break;
                         case 9:
                         $x4=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[11],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-1316");
                         $x43=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[17],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-1314");
                         break;
                         default:
                                         
                         }
                         
                         
                         }
                         }
                         
                         //$obj->alert(count($formvalues['loopkey5']));
                         for($i=0;$i<count($formvalues['loopkey5']);$i++){
                         $district=$formvalues['district'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $trainingtopic5=$formvalues['trainingtopic5'][$i];
                         $maletreeplanting=$formvalues['maletreeplanting'][$i];
                         $femaletreeplanting=$formvalues['femaletreeplanting'][$i];
                         $otherparticipants=$formvalues['otherparticipants'][$i];
                         //$total=$formvalues['total'][$i];
                         $total5=$maletreeplanting+$femaletreeplanting;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                         if(($total5<>NULL)){
                         
                 
                         $insert5="INSERT INTO tbl_technicaltraining
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `training_topic`, `male`, `female`,`typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	'".$trainingtopic5."','".$maletreeplanting."','".$femaletreeplanting."','".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')	ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `training_topic`='".$trainingtopic5."', `male`='".$maletreeplanting."', `female`='".$femaletreeplanting."',`typeofparticipants`='".$trainees."', `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                         
                                 //$obj->alert($insert5);
                         @Execute($insert5)or die(http("Edit-607"));
                         
                         //------------Updating indicator  Results---------------------
                         
                         /* $x5=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic5,$reportingType,$indicator_id[10],$maletreeplanting,$femaletreeplanting,'',$total4,$gender='Yes',$error_Code="Edit-1330"); */
                         
                         
                         
                         
                          //------------Updating indicator  Results---Herbicides------------------
                                 switch($trainees){
                         case 2:
                         
                         $x5=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic5,$reportingType,$indicator_id[9],$maletreeplanting,$femaletreeplanting,'',$total5,$gender='Yes',$error_Code="Edit-1358");
                         break;
                         case 8:
                         
                         $x5=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic5,$reportingType,$indicator_id[10],$maletreeplanting,$femaletreeplanting,'',$total5,$gender='Yes',$error_Code="Edit-131362");
                         
                         break;
                         case 9:
                         $x5=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic5,$reportingType,$indicator_id[11],$maletreeplanting,$femaletreeplanting,'',$total5,$gender='Yes',$error_Code="Edit-1366");
                         break;
                         default:
                                         
                         }
                         
                         }
                         }
                         
                         
                         //$obj->alert($insert."--".$insert2."--".$insert3."--".$insert4."--".$insert5."--");
                         
 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
 //$obj->call("xajax_ViewAnnualTargets",'','','','','','','','','',1,20);
 return $obj;
 }
 function edit_AdoptionRates($formvalues,$region,$fyear){
 //,$district,$organization
 $obj=new xajaxResponse();
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
 $obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
 return $obj;
 }
 
 if(($region==NULL)){
 $obj->alert("Please select Region for which you are edititing Data For!");
 return $obj;
 }
 /* if(($dis==NULL)){
 $obj->alert("Please select Region for which you are edititing Data For!");
 return $obj;
 } */
 
 $n=1;
 $inc=1;
 
 $fyear=($fyear==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$fyear;
 #$obj->alert($fyear);
 //$n=1;
 $data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
 <table width='100%' id='report'>";
  
   $data.="
   
                         <tr class='evenrow'>
           <td width='30%' colspan='3'>
           <div align='left'><strong>Region</strong></div></td>
           <td colspan='19'><select name='region' id='region'  style='width:300px;'><option value=''>-select-</option>";
                         $data.=QueryManager::ZoneFilter($region);
                   $data.="</select></td>
         </tr>
                 
                 
 <tr class='evenrow3'><td colspan='3'>Financial Year:</td>
         <td colspan='19'><select name='year' id='year'   style='width:300px;'><option value=''>-select-</option>";
                                 $data.=QueryManager::FinancialYearFilter($fyear);
                                   $data.="</select></td>
         </tr>
         <tr class='evenrow'><td colspan='3'>Reporting Period</td>
          <td colspan='19'><select name='semiAnnual' id='semiAnnual' style='width:300px;'><option value=''>-select-</option>";
                                 $data.=QueryManager::ReportingPeriodFilter($period=$_SESSION['quarter']);
                                   $data.="</select></td></tr>
         <tr class='display_none'>
   <td>Field Officer</td>
  
  <td> <input type='text' name='fieldofficerxx' id='fieldofficerxx' size='25' value='".$row['FieldOfficerResponsible']."' ></td>
   </tr>
          <tr CLASS='evenrow'>
  
     <th colspan='22' ><center>CF/CA Adoption Rates</center></th>
         
   </tr>
         
         
         <tr><th ROWSPAN='3'>No</th>
         <th ROWSPAN='3'>Participants</th>
         <th ROWSPAN='3'>DISTRICT</th>
         <th colspan='6'><center>No. of farmers adopting</center></th>
         <th colspan='6'><center>Area under adoption</center></th>
         <th colspan='2'  ROWSPAN='2' ><center>Area under legumes</center>
         <img src='images/spacer2.png' width='100' height='0.1'></th>
         <th colspan='2' ROWSPAN='2' ><center>Not burning residue</center></th>
         <th colspan='2' ROWSPAN='2' ><center>Herbicide use</center></th>
                 </tr>
                 
                 
                 <tr>
                 <th colspan='2'><center>CF HOE</center></th>
                 <th colspan='2'><center>CF ADP</center></th>
                 <th colspan='2'><center>CF Mechanized</center></th>
                 <th colspan='2'><center>CF HOE</center></th>
                 <th colspan='2'><center>CF ADP</center></th>
                 <th colspan='2'><center>CF Mechanized</center></th>
                 </tr>
         <tr>
         
         
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
         <th>Male</th>
         <th>Female</th>
 
         </tr>";  
 
         //$obj->alert($formvalues['districtCode']);
         for($x=0;$x<count($formvalues['districtCode']);$x++){
         
                         $sql="select t.`adoption_id`,t.zone,t.FieldOfficerResponsible,
                         t.`semi_annual`, t.`year`, 
                         sum(if(t.`adoption_topic`='1',t.male,'-')) as MaleHoebasin,
                         sum(if(t.`adoption_topic`='1',t.female,'-')) as FemaleHoebasin,
                         sum(if(t.`adoption_topic`='2',t.male,'-')) as MaleADPRipping,
                         sum(if(t.`adoption_topic`='2',t.female,'-')) as FemaleADPRipping,
                         sum(if(t.`adoption_topic`='3',t.male,'-')) as MaleMechanizedRipping,
                         sum(if(t.`adoption_topic`='3',t.female,'-')) as FemaleMechanizedRipping,
                         sum(if(t.`adoption_topic`='4',t.male,'-')) as MaleAreaHoebasin,
                         sum(if(t.`adoption_topic`='4',t.female,'-')) as FemaleAreaHoebasin,
                         sum(if(t.`adoption_topic`='5',t.male,'-')) as MaleAreaADPRipping,
                         sum(if(t.`adoption_topic`='5',t.female,'-')) as FemaleAreaADPRipping,
                         sum(if(t.`adoption_topic`='6',t.male,'-')) as MaleAreaMechanizedRipping,
                         sum(if(t.`adoption_topic`='6',t.female,'-')) as FemaleAreaMechanizedRipping,
                         sum(if(t.`adoption_topic`='7',t.male,'-')) as MaleLegumes,
                         sum(if(t.`adoption_topic`='7',t.female,'-')) as FemaleLegumes,
                         sum(if(t.`adoption_topic`='8',t.male,'-')) as MaleResidues,
                         sum(if(t.`adoption_topic`='8',t.female,'-')) as FemaleResidues,
                         sum(if(t.`adoption_topic`='9',t.male,'-')) as MaleHerbicide,
                         sum(if(t.`adoption_topic`='9',t.female,'-')) as FemaleHerbicide,
                         t.`typeofparticipants`,  
                         t.`updatedby`,t.`district`, d.districtName
                         from tbl_adoptionrates t left join tbl_trainees tr 
                         on(tr.code=t.typeofparticipants)
                         left join tbl_district d on(d.districtCode=t.district)
                         where t.display like 'Yes%' 
                         && t.zone like '".$region."%'
                         && t.district='".$formvalues['districtCode'][$x]."'
                          && t.year='".$fyear."'
                         && t.semi_annual='".$_SESSION['quarter']."'
                         && t.typeofparticipants='".$formvalues['participants'][$x]."'
                         group by t.district
                         order by t.zone,t.district asc";
                         
                         #$obj->alert($sql);
                         $q=@Execute($sql) or die(http("Edit-104"));
         
         
         while($row=@FetchRecords($q)){
         $data.="<tr class='evenrow'>
         
         
         
         
         <td><input name='loopkey[]' size='10'  type='hidden' id='loopkey".$n."' value='".$row['training_id']."'  />".$n."</td>
         
          <!--<td colspan=''><select name='organization[]' id='organization'  style='width:200px;'><option value=''>-select-</option>";
                                 //$data.=QueryManager::OrganizationFilter($region,$formvalues['districtCode'][$x],$formvalues['org_code'][$x]);
                                 
                                 $x1="select * from tbl_organization where zone='".$row['zone']."' and district='".$row['district']."'  order by orgName asc";
                                         //$obj->alert($x1);								
                                         $queryq=@mysql_query($x1)or die(http("QMGR-2719"));
                                         while($ROW=@mysql_fetch_array($queryq)){
                                         $selected1=($row['org_code']==$ROW['org_code'])?"SELECTED":"";
                                         $data.="<option value=\"".$ROW['org_code']."\" ".$selected1." >".substr($ROW['orgName'],0,500)."</option>";			
                                                                 
                                         }
                                 
                                   $data.="</select></td>-->
                                 
         
         <td colspan=''><select name='trainees[]' id='trainees' style='width:100px;'><option value=''>-All-</option>";
         
 /* 	".funct_dropDown('tbl_trainees', 'Name', $row['typeofparticipants'], 'Name') */
 $data.=QueryManager::TraineesFilter($row['typeofparticipants']);
 
 $data.="</select></td>
         <td colspan=''><select name='district[]' id='district' style='width:100px;'><option value=''>-select-</option>";
         
                 $data.=QueryManager::DistrictFilter($region,$row['district']);
         
         $data.="</select></td>
         <td>
         <input name='loopkey1[]' size='10'  type='hidden' id='loopkey' value='1'  />
         <input name='trainingtopic1[]' size='10' type='hidden' id='trainingtopic1".$n."' value='1'  />
         <input name='malehoe[]' size='10'  type='text' id='malehoe".$n."' onKeyPress='return numbersonly(event, false)'  value='".$row['MaleHoebasin']."' /></td>
         <td><input name='femalehoe[]' size='10'  type='text' id='femalehoe".$n."' onKeyPress='return numbersonly(event, false)' value='".$row['FemaleHoebasin']."' /></td>
         <td>
                 <input name='loopkey2[]' size='10'  type='hidden' id='loopkey2' value='1'  />
         <input name='trainingtopic2[]' size='10'  type='hidden' id='trainingtopic2".$n."' value='2'  />
         <input name='maleadp[]' size='10'  type='text' id='maleadp".$n."' 	value='".$row['MaleADPRipping']."'  /></td>
         <td><input name='femaleadp[]' size='10'  type='text' id='femaleadp".$n."' onKeyPress='return numbersonly(event, false)' value='".$row['FemaleADPRipping']."'   /></td>
         <td>
         <input name='loopkey3[]' size='10'  type='hidden' id='loopkey3' value='1'  />
         <input name='trainingtopic3[]' size='10'  type='hidden' id='trainingtopic3".$n."' value='3'  />
         <input name='malemechanized[]' size='10'  type='text' id='malemechanized".$n."'	onKeyPress='return numbersonly(event, false)' value='".$row['MaleMechanizedRipping']."' /></td>
         <td><input name='femalemechanized[]' size='10'  type='text' id='femalemechanized".$n."'	onKeyPress='return numbersonly(event, false)' value='".$row['FemaleMechanizedRipping']."' /></td>
         <td>
                 <input name='loopkey4[]' size='10'  type='hidden' id='loopkey4' value='1'  />
                 <input name='trainingtopic4[]' size='10'  type='hidden' id='trainingtopic4".$n."' value='4'  />
         <input name='maleherbicide[]' size='10'  type='text' id='maleherbicide".$n."' 
                 onKeyPress='return numbersonly(event, false)'
           value='".$row['MaleAreaHoebasin']."'
          /></td>
         
         <td><input name='femaleherbicide[]' size='10'  type='text' id='femaleherbicide".$n."'
                 onKeyPress='return numbersonly(event, false)'
   value='".$row['FemaleAreaHoebasin']."' /></td>
         <td>
                 
                 <input name='loopkey5[]' size='10'  type='hidden' id='loopkey5' value='1'  />
         <input name='trainingtopic5[]' size='10'  type='hidden' id='trainingtopic5".$n."' value='5'  />
         <input name='maletreeplanting[]' size='10'  type='text' id='maletreeplanting".$n."'
                 onKeyPress='return numbersonly(event, false)'
           value='".$row['MaleAreaADPRipping']."'
           /></td>
         <td><input name='femaletreeplanting[]' size='10'  type='text' id='femaletreeplanting".$n."' 
                 onKeyPress='return numbersonly(event, false)'    value='".$row['FemaleAreaADPRipping']."'  /></td>
                 <td>
         <input name='loopkey6[]' size='10'  type='hidden' id='loopkey6' value='1'  />
         <input name='trainingtopic6[]' size='10'  type='hidden' id='trainingtopic6".$n."' value='6'  />
         <input name='malearea[]' size='10'  type='text' id='malearea".$n."'	onKeyPress='return numbersonly(event, false)' value='".$row['MaleAreaMechanizedRipping']."' /></td>
         <td><input name='femalearea[]' size='10'  type='text' id='femalearea".$n."'	onKeyPress='return numbersonly(event, false)' value='".$row['FemaleAreaMechanizedRipping']."' /></td>
                 <td>
         <input name='loopkey7[]' size='10'  type='hidden' id='loopkey7' value='1'  />
         <input name='trainingtopic7[]' size='10'  type='hidden' id='trainingtopic7".$n."' value='7'  />
         <input name='malelegumes[]' size='10'  type='text' id='malelegumes".$n."'	onKeyPress='return numbersonly(event, false)' value='".$row['MaleLegumes']."'/></td>
         <td><input name='femalelegumes[]' size='10'  type='text' id='femalelegumes".$n."'	onKeyPress='return numbersonly(event, false)' value='".$row['FemaleLegumes']."' /></td>
                 
                 
                 <td>
         <input name='loopkey8[]' size='10'  type='hidden' id='loopkey8' value='1'  />
         <input name='trainingtopic8[]' size='10'  type='hidden' id='trainingtopic6".$n."' value='8'  />
         <input name='maleresidues[]' size='10'  type='text' id='maleresidues".$n."'	onKeyPress='return numbersonly(event, false)' value='".$row['MaleResidues']."' /></td>
         <td><input name='femaleresidues[]' size='10'  type='text' id='femaleresidues".$n."'	onKeyPress='return numbersonly(event, false)' value='".$row['FemaleResidues']."' /></td>
         <td>
         <input name='loopkey9[]' size='10'  type='hidden' id='loopkey9' value='1'  />
         <input name='trainingtopic9[]' size='10'  type='hidden' id='trainingtopic9".$n."' value='9'  />
         <input name='maleherbs[]' size='10'  type='text' id='maleherbs".$n."'	onKeyPress='return numbersonly(event, false)' value='".$row['MaleHerbicide']."' /></td>
         <td><input name='femaleherbs[]' size='10'  type='text' id='femaleherbs".$n."'	onKeyPress='return numbersonly(event, false)' value='".$row['FemaleHerbicide']."' /></td>
         </tr>";
                 /**/
         
         $n++;
         
         }
         
                                 }
         
         
 
   $data.="<tr style='display:none'>
   <td>Attach Minutes</td>
   <td><input name='' size='50' type='file'></td>
   </tr>
   <tr style='display:none'>
   <td>Attach Attendance Sheet/List</td>
   <td><input name='' size='50' type='file'></td>
   </tr>";
  
  
  $data.="<tr class='evenrow'><td></td><td colspan='22' align='right'><div align='right'>
         <button type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_AdoptionRates(xajax.getFormValues('projects')); return false;\" />Save</button>
         </div></td></tr>
 </table>
 
 
 
 </form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_AdoptionRates($formvalues){
 $obj=new xajaxResponse();
 if($semiAnnual=='Closed'){
         $obj->alert("Your Reporting Period Was Closed.Please contact Your M&E Person for Access");
         return $obj;
 }
 /* else {
 
 $obj->alert("Process Halted:Please Check Your Reporting Period to see it is Active and Try again!");
 return $obj;
 }
 
 
  create or replace view view_AdoptionIndicators as SELECT `adoption_id` , `zone` , district, year, semi_annual,
         max( if( `adoption_topic` = '1' && `typeofparticipants` = '2', `male` , 0 )) AS LFAHOEM70,
     max( if( `adoption_topic` = '1' && `typeofparticipants` = '2', `female` , 0 )) AS LFAHOEF70,
         max( if( `adoption_topic` = '1' && `typeofparticipants` = '8', `male` , 0 )) AS POAHOEM9,
     max( if( `adoption_topic` = '1' && `typeofparticipants` = '8', `female` , 0 )) AS POAHOEF9,
         max( if( `adoption_topic` = '1' && `typeofparticipants` = '9', `male` , 0 )) AS OFAHOEM73,
     max( if( `adoption_topic` = '1' && `typeofparticipants` = '9', `female` , 0 )) AS OFAHOEF73,
     
         max( if( `adoption_topic` = '2' && `typeofparticipants` = '2', `male` , 0 )) AS LFAADPM71,
     max( if( `adoption_topic` = '2' && `typeofparticipants` = '2', `female` , 0 )) AS LFAADPF71,
     
         max( if( `adoption_topic` = '2' && `typeofparticipants` = '8', `male` , 0 )) AS POAADPM32,
     max( if( `adoption_topic` = '2' && `typeofparticipants` = '8', `female` , 0 )) AS POAADPF32,
     
         max( if( `adoption_topic` = '2' && `typeofparticipants` = '9', `male` , 0 )) AS OFAADPM74,
     max( if( `adoption_topic` = '2' && `typeofparticipants` = '9', `female` , 0 )) AS OFAADPF74,
         max( if( `adoption_topic` = '3' && `typeofparticipants` = '2', `male` , 0 )) AS LFAMECM72,
         max( if( `adoption_topic` = '3' && `typeofparticipants` = '2', `female` , 0 )) AS LFAMECF72,
         max( if( `adoption_topic` = '3' && `typeofparticipants` = '8', `male` , 0 )) AS POAMECM33,
     max( if( `adoption_topic` = '3' && `typeofparticipants` = '8', `female` , 0 )) AS POAMEFC33,
         max( if( `adoption_topic` = '3' && `typeofparticipants` = '9', `male` , 0 )) AS OFAMECM75,
     max( if( `adoption_topic` = '3' && `typeofparticipants` = '9', `female` , 0 )) AS OFAMECF75,
         
         max( if( `adoption_topic` = '4' && `typeofparticipants` = '2', `male` , 0 )) AS lfacreshoemale15,
     max( if( `adoption_topic` = '4' && `typeofparticipants` = '2', `female` , 0 )) AS lfacreshoefemale15,
         
         max( if( `adoption_topic` = '4' && `typeofparticipants` = '8', `male` , 0 )) AS poacreshoemale81,
     max( if( `adoption_topic` = '4' && `typeofparticipants` = '8', `female` , 0 )) AS poacreshoefemale81,
         
         max( if( `adoption_topic` = '4' && `typeofparticipants` = '9', `male` , 0 )) AS otherfamersacreshoemale82,
     max( if( `adoption_topic` = '4' && `typeofparticipants` = '9', `female` , 0 )) AS otherfamersacreshoefemale82,
         
         
         
     sum( if( `adoption_topic` = '4',`male` , 0 )) AS CREHOEM16,
     sum( if( `adoption_topic` = '4',`female` , 0 )) AS CREHOEF16,
         sum( if( `adoption_topic` = '5',`male` , 0 )) AS CREADPM34,
     sum( if( `adoption_topic` = '5',`female` , 0 )) AS CREADPF34,
         sum( if( `adoption_topic` = '6',`male` , 0 )) AS CREMECM35,
     sum( if( `adoption_topic` = '6',`female` , 0 )) AS CREMECF35,
         sum( if( `adoption_topic` = '7',`male` , 0 )) AS NOTRESM20,
     sum( if( `adoption_topic` = '7',`female` , 0 )) AS NOTRESF20,
         sum( if( `adoption_topic` = '8',`male` , 0 )) AS NOTRESM30,
     sum( if( `adoption_topic` = '8',`female` , 0 )) AS NOTRESF30,
     sum( if( `adoption_topic` = '9', `male` , 0 )) AS HEBUSEM19,
        sum( if( `adoption_topic` = '9', `female` , 0 )) AS HEBUSEF19
         FROM `tbl_adoptionrates`
         GROUP BY `zone`,district,year,semi_annual asc
  */			
 
 $indicator_id=array(70,9,73,71,32,74,72,33,75,15,81,82,34,83,84,35,85,86,91,92,93,20,79,80,0,0,0);
 $fyear=$formvalues['year'];
 $zone=$formvalues['region'];
 //$district=$formvalues['district'];
 $semiAnnual=$formvalues['semiAnnual'];
 $fieldofficer=$formvalues['fieldofficer'];
 $organization=$formvalues['organization'];
         $n=1;
         
 
                 //$obj->alert("Note: Only Current Reporting Year Actuals/Achievements Will be Captured/Edited!");
                 //$obj->alert(count($formvalues['total']));
         
                 
                 //$obj->alert(count($formvalues['loopkey1']));
                 
         for($i=0;$i<count($formvalues['loopkey1']);$i++){
                         $trainingtopic1=$formvalues['trainingtopic1'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $district=$formvalues['district'][$i];
                         $training_id=$formvalues['training_id'][$i];
                         $malehoe=$formvalues['malehoe'][$i];
                         $femalehoe=$formvalues['femalehoe'][$i];
                         $totalhoe=$malehoe+$femalehoe;
                         
                         #$typeofDisaggregation=$formvalues['typeofDisaggregation'][$i];
                         
                                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                          
  if(($totalhoe<>NULL)){
  
                         $insert="INSERT INTO tbl_adoptionrates
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `adoption_topic`, `male`, `female`,`total`,
                         `typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	
                         '".$trainingtopic1."','".$malehoe."','".$femalehoe."','".$totalhoe."',
                         '".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')
                         ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."',
                         `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `adoption_topic`='".$trainingtopic1."', 
                         `male`='".$malehoe."', `female`='".$femalehoe."',total='".$totalhoe."',`typeofparticipants`='".$trainees."',
                         `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                                 #$obj->alert($insert);
                                         @Execute($insert)or die(http("Edit-603"));
                                         
                         switch($trainees){
                         case 2:
                         
                         $x1=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic1,$reportingType,$indicator_id[0],$malehoe,$femalehoe,'',$totalhoe,$gender='Yes',$error_Code="Edit-1725");
                         break;
                         case 8:
                         
                         $x1=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic1,$reportingType,$indicator_id[1],$malehoe,$femalehoe,'',$totalhoe,$gender='Yes',$error_Code="Edit-1729");
                         
                         break;
                         case 9:
                         $x1=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic1,$reportingType,$indicator_id[2],$malehoe,$femalehoe,'',$totalhoe,$gender='Yes',$error_Code="Edit-1733");
                         break;
                         default:
                                         
                         }
                                         
                                         
                         }
                         
                         }
                         
                         
                         
                         
                         
                         //$obj->alert(count($formvalues['loopkey2']));
                         for($i=0;$i<count($formvalues['loopkey2']);$i++){
                         $trainingtopic2=$formvalues['trainingtopic2'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $district=$formvalues['district'][$i];
                         $maleadp=$formvalues['maleadp'][$i];
                         $femaleadp=$formvalues['femaleadp'][$i];
                         //$total=$formvalues['total'][$i];
                         $total2=$maleadp+$femaleadp;
                                                 
                                                 
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                                                 
                                         if(($total2<>NULL)){	
                         
                                                         $insert2="INSERT INTO tbl_adoptionrates
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `adoption_topic`, `male`, `female`,`total`,
                         `typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	
                         '".$trainingtopic2."','".$maleadp."','".$femaleadp."','".$total2."',
                         '".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')
                         ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."',
                         `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `adoption_topic`='".$trainingtopic2."', 
                         `male`='".$maleadp."', `female`='".$femaleadp."',total='".$total2."',`typeofparticipants`='".$trainees."',
                         `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                         
                         #$obj->alert($insert2);
                                 @Execute($insert2)or die(http("Edit-1510"));
                                 
                                 switch($trainees){
                         case 2:
                         
                         $x2=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic2,$reportingType,$indicator_id[3],$maleadp,$femaleadp,'',$total2,$gender='Yes',$error_Code="Edit-1780");
                         break;
                         case 8:
                         
                         $x2=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic2,$reportingType,$indicator_id[4],$maleadp,$femaleadp,'',$total2,$gender='Yes',$error_Code="Edit-1784");
                         
                         break;
                         case 9:
                         $x2=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic2,$reportingType,$indicator_id[5],$maleadp,$femaleadp,'',$total2,$gender='Yes',$error_Code="Edit-1788");
                         break;
                         default:
                                         
                         }
                                 
                                 
                         }
                         }
                         //$obj->alert(count($formvalues['loopkey3']));
                         
                         for($i=0;$i<count($formvalues['loopkey3']);$i++){
                                 $trainingtopic3=$formvalues['trainingtopic3'][$i];
                                 $district=$formvalues['district'][$i];
                                 $trainees=$formvalues['trainees'][$i];
                         $malemechanized=$formvalues['malemechanized'][$i];
                         $femalemechanized=$formvalues['femalemechanized'][$i];
                         //$total=$formvalues['total'][$i];
                         $total3=$malemechanized+$femalemechanized;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                         if(($total3<>NULL)){
                         
                 
                         $insert3="INSERT INTO tbl_adoptionrates
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `adoption_topic`, `male`, `female`,`total`,
                         `typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	
                         '".$trainingtopic3."','".$malemechanized."','".$femalemechanized."','".$total3."',
                         '".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')
                         ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."',
                         `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `adoption_topic`='".$trainingtopic3."', 
                         `male`='".$malemechanized."', `female`='".$femalemechanized."',total='".$total3."',`typeofparticipants`='".$trainees."',
                         `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                                 #$obj->alert($insert3);
                                 @Execute($insert3)or die(http("Edit-1822"));
                                 
                                 switch($trainees){
                         case 2:
                         
                         $x3=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic3,$reportingType,$indicator_id[6],$malemechanized,$femalemechanized,'',$total3,$gender='Yes',$error_Code="Edit-1827");
                         break;
                         case 8:
                         
                         $x3=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic3,$reportingType,$indicator_id[7],$malemechanized,$femalemechanized,'',$total3,$gender='Yes',$error_Code="Edit-1831");
                         
                         break;
                         case 9:
                         $x3=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic3,$reportingType,$indicator_id[8],$malemechanized,$femalemechanized,'',$total3,$gender='Yes',$error_Code="Edit-1835");
                         break;
                         default:
                                         
                         }
                                 
                                 
                         }
                         }
                         
                         //$obj->alert(count($formvalues['loopkey4']));
                         
                                 for($i=0;$i<count($formvalues['loopkey4']);$i++){
                         $district=$formvalues['district'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $trainingtopic4=$formvalues['trainingtopic4'][$i];
                         $maleherbicide=$formvalues['maleherbicide'][$i];
                         $femaleherbicide=$formvalues['femaleherbicide'][$i];
                         //$total=$formvalues['total'][$i];
                         $total4=$maleherbicide+$femaleherbicide;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                         
                         if(($total4<>NULL)){
                         
                         
                         $insert4="INSERT INTO tbl_adoptionrates
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `adoption_topic`, `male`, `female`,`total`,
                         `typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	
                         '".$trainingtopic4."','".$maleherbicide."','".$femaleherbicide."','".$total4."',
                         '".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')
                         ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."',
                         `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `adoption_topic`='".$trainingtopic4."', 
                         `male`='".$maleherbicide."', `female`='".$femaleherbicide."',total='".$total4."',`typeofparticipants`='".$trainees."',
                         `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                         
                         #$obj->alert($insert4);
                         @Execute($insert4)or die(http("Edit-606"));
                         
                         /* $x4=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[9],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-1874"); */
                         
                         
                         
                         switch($trainees){
                         case 2:
                         
                         $x4=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[9],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-1894");
                         break;
                         case 8:
                         
                         $x4=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[10],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-1898");
                         
                         break;
                         case 9:
                         $x4=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[11],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-1902");
                         break;
                         default:
                                         
                         }
                         
                         }
                         }
                         
                         //$obj->alert(count($formvalues['loopkey5']));
                         for($i=0;$i<count($formvalues['loopkey5']);$i++){
                         $district=$formvalues['district'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $trainingtopic5=$formvalues['trainingtopic5'][$i];
                         $maletreeplanting=$formvalues['maletreeplanting'][$i];
                         $femaletreeplanting=$formvalues['femaletreeplanting'][$i];
                         $otherparticipants=$formvalues['otherparticipants'][$i];
                         //$total=$formvalues['total'][$i];
                         $total5=$maletreeplanting+$femaletreeplanting;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                         if(($total5<>NULL)){
                         
                 
                         $insert5="INSERT INTO tbl_adoptionrates
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `adoption_topic`, `male`, `female`,`total`,
                         `typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	
                         '".$trainingtopic5."','".$maletreeplanting."','".$femaletreeplanting."','".$total5."',
                         '".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')
                         ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."',
                         `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `adoption_topic`='".$trainingtopic5."', 
                         `male`='".$maletreeplanting."', `female`='".$femaletreeplanting."',total='".$total5."',`typeofparticipants`='".$trainees."',
                         `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
 
                         #$obj->alert($insert5);
                         @mysql_query($insert5)or die(http("Edit-607"));
                         
                         /* $x5=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic5,$reportingType,$indicator_id[10],$maletreeplanting,$femaletreeplanting,'',$total5,$gender='Yes',$error_Code="Edit-1907");
                          */
                          
                          
                         switch($trainees){
                         case 2:
                         
                         $x5=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic5,$reportingType,$indicator_id[12],$maletreeplanting,$femaletreeplanting,'',$total5,$gender='Yes',$error_Code="Edit-1948");
                         break;
                         case 8:
                         
                         $x5=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic5,$reportingType,$indicator_id[13],$maletreeplanting,$femaletreeplanting,'',$total5,$gender='Yes',$error_Code="Edit-1952");
                         
                         break;
                         case 9:
                         $x5=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic5,$reportingType,$indicator_id[14],$maletreeplanting,$femaletreeplanting,'',$total5,$gender='Yes',$error_Code="Edit-1956");
                         break;
                         default:
                                         
                         }
                          
                          
                          
                          
                         }
                         }
                         
                         //Area under adoption cf Mechnaized
                         
                         for($i=0;$i<count($formvalues['loopkey6']);$i++)
                         {
                                 $district=$formvalues['district'][$i];
                                 $trainees=$formvalues['trainees'][$i];
                                 $trainingtopic6=$formvalues['trainingtopic6'][$i];
                                 $malearea=$formvalues['malearea'][$i];
                                 $femalearea=$formvalues['femalearea'][$i];
                                 $otherparticipants=$formvalues['otherparticipants'][$i];
                         //$total=$formvalues['total'][$i];
                                 $total6=$malearea+$femalearea;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                                         if(($total6<>NULL)){
                         
                 
                                                 $insert6="INSERT INTO tbl_adoptionrates
                                                 (`org_code`, `zone`,`district`,`semi_annual`, `year`, `adoption_topic`, `male`, `female`,`total`,
                                                 `typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                                                 values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	
                                                 '".$trainingtopic6."','".$malearea."','".$femalearea."','".$total6."',
                                                 '".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')
                                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."',
                                                 `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `adoption_topic`='".$trainingtopic6."', 
                                                 `male`='".$malearea."', `female`='".$femalearea."',total='".$total6."',`typeofparticipants`='".$trainees."',
                                                 `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                         
                                                 #$obj->alert($insert5);
                                                 @mysql_query($insert6)or die(http("Edit-607"));
                         
                                 /* $x6=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic6,$reportingType,$indicator_id[11],$malearea,$femalearea,'',$total6,$gender='Yes',$error_Code="Edit-1941"); */
                                                                                                                                                 //areaadp	    cfadparea  residues
                                                                         
                                  //$indicator_id=array(70,9,73,71,32,74,72,33,75, 15,81,82, 34,83,84, 35,85,86[17], 20,79,80, 30,19);
                         
                         
                         switch($trainees){
                         case 2:
                         
                         $x6=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic6,$reportingType,$indicator_id[15],$malearea,$femalearea,'',$total6,$gender='Yes',$error_Code="Edit-2006");
                         break;
                         case 8:
                         
                         $x6=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic6,$reportingType,$indicator_id[16],$malearea,$femalearea,'',$total6,$gender='Yes',$error_Code="Edit-2010");
                         
                         break;
                         case 9:
                         $x6=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic6,$reportingType,$indicator_id[17],$malearea,$femalearea,'',$total6,$gender='Yes',$error_Code="Edit-2014");
                         break;
                         default:
                                         
                         }
                                 
                                 
                                 
                                                                         }
                         }
                         
                         //Area under legumes
                         
                                 for($i=0;$i<count($formvalues['loopkey7']);$i++)
                         {
                                 $district=$formvalues['district'][$i];
                                 $trainees=$formvalues['trainees'][$i];
                                 $trainingtopic7=$formvalues['trainingtopic7'][$i];
                                 $malelegumes=$formvalues['malelegumes'][$i];
                                 $femalelegumes=$formvalues['femalelegumes'][$i];
                                 $otherparticipants=$formvalues['otherparticipants'][$i];
                         //$total=$formvalues['total'][$i];
                                 $total7=$malelegumes+$femalelegumes;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                                         if(($total7<>NULL)){
                         
                 
                                                 $insert7="INSERT INTO tbl_adoptionrates
                                                 (`org_code`, `zone`,`district`,`semi_annual`, `year`, `adoption_topic`, `male`, `female`,`total`,
                                                 `typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                                                 values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	
                                                 '".$trainingtopic7."','".$malelegumes."','".$femalelegumes."','".$total7."',
                                                 '".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')
                                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."',
                                                 `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `adoption_topic`='".$trainingtopic7."', 
                                                 `male`='".$malelegumes."', `female`='".$femalelegumes."',total='".$total7."',`typeofparticipants`='".$trainees."',
                                                 `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                         
                                                 #$obj->alert($insert5);
                                                 @mysql_query($insert7)or die(http("Edit-1972"));
                         
                         /* $x7=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic7,$reportingType,$indicator_id[12],$malelegumes,$femalelegumes,'',$total7,$gender='Yes',$error_Code="Edit-1941"); */
                         
                         
                                                                                                                                                 //	areaadp	    cfadparea  residues
                                                                         
                                  //$indicator_id=array(70,9,73,71,32,74,72,33,75, 15,81,82, 34,83,84, 35,85,86[17],91,92,93[20], 20,79,80);
                         
                         
                         switch($trainees){
                         case 2:
                         
                         $x7=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic7,$reportingType,$indicator_id[18],$malelegumes,$femalelegumes,'',$total7,$gender='Yes',$error_Code="Edit-2064");
                         break;
                         case 8:
                         
                         $x7=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic7,$reportingType,$indicator_id[19],$malelegumes,$femalelegumes,'',$total7,$gender='Yes',$error_Code="Edit-2068");
                         
                         break;
                         case 9:
                         $x7=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic7,$reportingType,$indicator_id[20],$malelegumes,$femalelegumes,'',$total7,$gender='Yes',$error_Code="Edit-2072");
                         break;
                         default:
                                         
                         }
                         
                         
                         
                         
                         
                         
                         
                                                                         }
                         }
                         
                         
                         
                         
                         
                         //Herbicide use
                         
                                 for($i=0;$i<count($formvalues['loopkey8']);$i++)
                         {
                                 $district=$formvalues['district'][$i];
                                 $trainees=$formvalues['trainees'][$i];
                                 $trainingtopic8=$formvalues['trainingtopic8'][$i];
                                 $maleresidues=$formvalues['maleresidues'][$i];
                                 $femaleresidues=$formvalues['femaleresidues'][$i];
                                 $otherparticipants=$formvalues['otherparticipants'][$i];
                         //$total=$formvalues['total'][$i];
                                 $total8=$maleresidues+$femaleresidues;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                                         if(($total8<>NULL)){
                         
                 
                                                 $insert8="INSERT INTO tbl_adoptionrates
                                                 (`org_code`, `zone`,`district`,`semi_annual`, `year`, `adoption_topic`, `male`, `female`,`total`,
                                                 `typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                                                 values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	
                                                 '".$trainingtopic8."','".$maleresidues."','".$femaleresidues."','".$total8."',
                                                 '".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')
                                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."',
                                                 `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `adoption_topic`='".$trainingtopic8."', 
                                                 `male`='".$maleresidues."', `female`='".$femaleresidues."',total='".$total8."',`typeofparticipants`='".$trainees."',
                                                 `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                         
                                                 #$obj->alert($insert5);
                                                 @mysql_query($insert8)or die(http("Edit-2010"));
                                                 /* $x8=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic8,$reportingType,$indicator_id[13],$maleresidues,$femaleresidues,'',$total8,$gender='Yes',$error_Code="Edit-2011");
                          */
                          
                          
                          
                                                                                                                                                                         //	areaadp	    cfadparea  residues
                                                                         
                                  //$indicator_id=array(70,9,73,71,32,74,72,33,75, 15,81,82, 34,83,84, 35,85,86[17],91,92,93[20],0,0,0[23], 20,79,80[26]);
                         
                         
                         switch($trainees){
                         case 2:
                         
                         $x8=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic8,$reportingType,$indicator_id[21],$maleresidues,$femaleresidues,'',$total8,$gender='Yes',$error_Code="Edit-2133");
                         break;
                         case 8:
                         
                         $x8=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic8,$reportingType,$indicator_id[22],$maleresidues,$femaleresidues,'',$total8,$gender='Yes',$error_Code="Edit-2137");
                         
                         break;
                         case 9:
                         $x8=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic8,$reportingType,$indicator_id[23],$maleresidues,$femaleresidues,'',$total8,$gender='Yes',$error_Code="Edit-2141");
                         break;
                         default:
                                         
                         }
                                                                         }
                         }
                         
                         
                         
                         for($i=0;$i<count($formvalues['loopkey9']);$i++)
                         {
                                 $district=$formvalues['district'][$i];
                                 $trainees=$formvalues['trainees'][$i];
                                 $trainingtopic9=$formvalues['trainingtopic9'][$i];
                                 $maleherbs=$formvalues['maleherbs'][$i];
                                 $femaleherbs=$formvalues['femaleherbs'][$i];
                                 $otherparticipants=$formvalues['otherparticipants'][$i];
                         //$total=$formvalues['total'][$i];
                                 $total9=$maleherbs+$femaleherbs;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                                         if(($total9<>NULL)){
                         
                 
                                                 $insert9="INSERT INTO tbl_adoptionrates
                                                 (`org_code`, `zone`,`district`,`semi_annual`, `year`, `adoption_topic`, `male`, `female`,`total`,
                                                 `typeofparticipants`, `otherParticipants`, `updatedby`,FieldOfficerResponsible) 
                                                 values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	
                                                 '".$trainingtopic9."','".$maleherbs."','".$femaleherbs."','".$total9."',
                                                 '".$trainees."','".$otherparticipants."','".$_SESSION['username']."','".$fieldofficer."')
                                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."',
                                                 `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `adoption_topic`='".$trainingtopic9."', 
                                                 `male`='".$maleherbs."', `female`='".$femaleherbs."',total='".$total9."',`typeofparticipants`='".$trainees."',
                                                 `otherParticipants`='".$otherparticipants."',updatedby='".$_SESSION['username']."'";
                         
                                                 #$obj->alert($insert5);
                                                 @mysql_query($insert9)or die(http("Edit-2044"));
                                                 
                                                 /* $x9=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic9,$reportingType,$indicator_id[14],$maleherbs,$femaleherbs,'',$total9,$gender='Yes',$error_Code="Edit-2046");
                          */
                         
                                  //$indicator_id=array(70,9,73,71,32,74,72,33,75, 15,81,82, 34,83,84, 35,85,86[17],91,92,93[20],20,79,80[23], 0,0,0[26]);
                         
                         /* 
                         switch($trainees){
                         case 2:
                         
                         $x9=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic9,$reportingType,$indicator_id[24],$maleherbs,$femaleherbs,'',$total9,$gender='Yes',$error_Code="Edit-2188");
                         break;
                         case 8:
                         
                         $x9=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic9,$reportingType,$indicator_id[25],$maleherbs,$femaleherbs,'',$total9,$gender='Yes',$error_Code="Edit-2192");
                         
                         break;
                         case 9:
                         $x9=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic9,$reportingType,$indicator_id[26],$maleherbs,$femaleherbs,'',$total9,$gender='Yes',$error_Code="Edit-2196");
                         break;
                         default:
                                         
                         } */
                         
                         
                                                                         }
                         }
 
                         
                         
                         
                         #$obj->alert($insert."--".$insert2."--".$insert3."--".$insert4."--".$insert5."--");
                         
 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
 //$obj->call("xajax_ViewAnnualTargets",'','','','','','','','','',1,20);
 return $obj;
 }
 function edit_FieldDaysandDemonstrations($formvalues,$region){
 //,$district,$organization
 $obj=new xajaxResponse();
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
 $obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
 return $obj;
 }
 
 if(($region==NULL)){
 $obj->alert("Please select Region for which you are edititing Data For!");
 return $obj;
 }
 /* if(($dis==NULL)){
 $obj->alert("Please select Region for which you are edititing Data For!");
 return $obj;
 } */
 
 $n=1;
 $inc=1;
 
 $fyear=($fyear==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$fyear;
 #$obj->alert($_SESSION['parishCode']);
 //$n=1;
 $data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
 <table width='100%' id='report'>";
  
   $data.="
   
                         <tr class='evenrow'>
           <td width='30%' colspan='3'>
           <div align='left'><strong>Region</strong></div></td>
           <td colspan='11'><select name='region' id='region'  style='width:300px;'><option value=''>-select-</option>";
                         $data.=QueryManager::ZoneFilter($region);
                   $data.="</select></td>
         </tr>
                 
                 
 <tr class='evenrow3'><td colspan='3'>Financial Year:</td>
         <td colspan='11'><select name='year' id='year'   style='width:300px;'><option value=''>-select-</option>";
                                 $data.=QueryManager::FinancialYearFilter($fyear);
                                   $data.="</select></td>
         </tr>
         <tr class='evenrow'><td colspan='3'>Reporting Period</td>
          <td colspan='11'><select name='semiAnnual' id='semiAnnual' style='width:300px;'><option value=''>-select-</option>";
                                 $data.=QueryManager::ReportingPeriodFilter($period=$_SESSION['quarter']);
                                   $data.="</select></td></tr>
         <tr class='display_none'>
   <td>Field Officer</td>
  
  <td> <input type='text' name='fieldofficerxx' id='fieldofficerxx' size='25' value='".$row['FieldOfficerResponsible']."' ></td>
   </tr>
          <tr>
         <th colspan='1' ROWSPAN='3'>No</th>
         <th ROWSPAN='3'>DISTRICT</th>
         <th  colspan='9'><center>Field days conducted</center></th>
         <th colspan='3' rowspan='2'><center>demonstrations</center></th>
         
                 </tr>
                 <tr>
                 <th  colspan='3'>District (Major) Field days</th>
                 <th  colspan='3'>DC (Regular) Field days</th>
                 <th  colspan='3'>PO (Specific) Field days</th>
                 </tr>
         
         <tr>
         
         
         <th>Male</th>
         <th>Female</th>
         <th>No. of F/days</th>
         
         <th>Male</th>
         <th>Female</th>
         <th>No. of F/days</th>
         <th>Male</th>
         <th>Female</th>
         <th>No. of F/days</th>
         <th>Male</th>
         <th>Female</th>
         <th>No. of Demos</th>
 
         </tr>";  
         
 
         //$obj->alert($formvalues['districtCode']);
         for($x=0;$x<count($formvalues['districtCode']);$x++){
         
                 
                         $sql="select t.`fieldday_id`,t.zone,t.`semi_annual`, t.`year`,
                         sum(if(t.`fielddayIndicator`='1',t.male,'-')) as MaleDMajor,
                         sum(if(t.`fielddayIndicator`='1',t.female,'-')) as FemaleDMajor,
                         sum(if(t.`fielddayIndicator`='1',t.numberofFieldDays,'-')) as numberofDMFieldDays,
                         sum(if(t.`fielddayIndicator`='2',t.male,'-')) as MaleDRegular,
                         sum(if(t.`fielddayIndicator`='2',t.female,'-')) as FemaleDRegular,
                         sum(if(t.`fielddayIndicator`='2',t.numberofFieldDays,'-')) as numberofDRFieldDays,
                         sum(if(t.`fielddayIndicator`='3',t.male,'-')) as MalePOSpecific,
                         sum(if(t.`fielddayIndicator`='3',t.female,'-')) as FemalePOSpecific,
                         sum(if(t.`fielddayIndicator`='3',t.numberofFieldDays,'-')) as numberofPOFieldDays,
                         sum(if(t.`fielddayIndicator`='4',t.male,'-')) as MaleDemo,
                         sum(if(t.`fielddayIndicator`='4',t.female,'-')) as FemaleDemo,
                         sum(if(t.`fielddayIndicator`='4',t.numberofFieldDays,'-')) as numberofDemonstrationsEstablished,
                         t.`updatedby`,t.`district`, d.districtName
                         from tbl_fielddaysanddemonstrations t
                         left join tbl_district d on(d.districtCode=t.district)
                         where t.display like 'Yes%' 
                         && t.zone like '".$region."%'
                         && t.district='".$formvalues['districtCode'][$x]."'
                         && t.semi_annual='".$formvalues['semiAnnual'][$x]."'
                         && t.year='".$formvalues['year'][$x]."'
                                 group by t.district
                                 order by t.zone,t.district asc";	
 
 
 
 //$obj->alert($sql);
                         $q=@Execute($sql) or die(http("Edit-104"));
         
         
         while($row=@FetchRecords($q)){
         $data.="<tr class='evenrow'>
         
         
         
         
         <td><input name='loopkey[]' size='10'  type='hidden' id='loopkey".$n."' value='".$row['training_id']."'  />".$n."</td>
         
          <!--<td colspan=''><select name='organization[]' id='organization'  style='width:200px;'><option value=''>-select-</option>";
                                 //$data.=QueryManager::OrganizationFilter($region,$formvalues['districtCode'][$x],$formvalues['org_code'][$x]);
                                 
                                 $x1="select * from tbl_organization where zone='".$row['zone']."' and district='".$row['district']."'  order by orgName asc";
                                         //$obj->alert($x1);								
                                         $queryq=@mysql_query($x1)or die(http("QMGR-2719"));
                                         while($ROW=@mysql_fetch_array($queryq)){
                                         $selected1=($row['org_code']==$ROW['org_code'])?"SELECTED":"";
                                         $data.="<option value=\"".$ROW['org_code']."\" ".$selected1." >".substr($ROW['orgName'],0,500)."</option>";			
                                                                 
                                         }
                                 
                                   $data.="</select></td>
                                 
         
         <td colspan=''><select name='trainees[]' id='trainees' style='width:100px;'><option value=''>-All-</option>";
         
 /* 	".funct_dropDown('tbl_trainees', 'Name', $row['typeofparticipants'], 'Name') */
 $data.=QueryManager::TraineesFilter($row['typeofparticipants']);
 
 $data.="</select></td>-->
         <td colspan=''><select name='district[]' id='district' style='width:100px;'><option value=''>-select-</option>";
         
                 $data.=QueryManager::DistrictFilter($region,$row['district']);
         
         $data.="</select></td>
         <td>
         <input name='loopkey1[]' size='10'  type='hidden' id='loopkey' value='1'  />
         <input name='trainingtopic1[]' size='10' type='hidden' id='trainingtopic1".$n."' value='1'  />
         <input name='malehoe[]' size='10'  type='text' id='malehoe".$n."'
         
         onKeyPress='return numbersonly(event, false)'
         
 
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['MaleDMajor']."'
         
           /></td>
         <td><input name='femalehoe[]' size='10'  type='text' id='femalehoe".$n."' 
                 onKeyPress='return numbersonly(event, false)'
         
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"
         
         value='".$row['FemaleDMajor']."'
         
          /></td>
          
                  
          <td><input name='fdaydm[]' size='10'  type='text' id='fdaydm".$n."' 
                 onKeyPress='return numbersonly(event, false)' value='".$row['numberofDMFieldDays']."'  /></td>
          
         <td>
                 <input name='loopkey2[]' size='10'  type='hidden' id='loopkey2' value='1'  />
         <input name='trainingtopic2[]' size='10'  type='hidden' id='trainingtopic2".$n."' value='2'  />
         <input name='maleadp[]' size='10'  type='text' id='maleadp".$n."'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"
                 value='".$row['MaleDRegular']."'  /></td>
         <td><input name='femaleadp[]' size='10'  type='text' id='femaleadp".$n."'
                 onKeyPress='return numbersonly(event, false)'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['FemaleDRegular']."'
           /></td>
            <td><input name='fdaydr[]' size='10'  type='text' id='fdaydr".$n."' 
                 onKeyPress='return numbersonly(event, false)' value='".$row['numberofDRFieldDays']."'  /></td>
         <td>
         <input name='loopkey3[]' size='10'  type='hidden' id='loopkey3' value='1'  />
         <input name='trainingtopic3[]' size='10'  type='hidden' id='trainingtopic3".$n."' value='3'  />
         <input name='malemechanized[]' size='10'  type='text' id='malemechanized".$n."' 
                 
                 onKeyPress='return numbersonly(event, false)'
                 
 onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"   value='".$row['MalePOSpecific']."'
         
          /></td>
          
                 
         <td><input name='femalemechanized[]' size='10'  type='text' id='femalemechanized".$n."'
                 onKeyPress='return numbersonly(event, false)'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['FemalePOSpecific']."'
           /></td>
           <td><input name='fdaypo[]' size='10'  type='text' id='fdaypo".$n."' 
                 onKeyPress='return numbersonly(event, false)' value='".$row['numberofPOFieldDays']."'  /></td>
         <td>
                 <input name='loopkey4[]' size='10'  type='hidden' id='loopkey4' value='1'  />
                 <input name='trainingtopic4[]' size='10'  type='hidden' id='trainingtopic4".$n."' value='4'  />
         <input name='maleherbicide[]' size='10'  type='text' id='maleherbicide".$n."' 
                 onKeyPress='return numbersonly(event, false)'
         onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"  value='".$row['MaleDemo']."'
          /></td>
          
          
          
         <td><input name='femaleherbicide[]' size='10'  type='text' id='femaleherbicide".$n."'
                 onKeyPress='return numbersonly(event, false)'
 onKeyUp=\"xajax_calc_trainingSemiAnnual(
                 getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
                 getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
                 getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
                 getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
                 getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
                 'total".$n."');\"   value='".$row['FemaleDemo']."' /></td>
                 <td><input name='ndemo[]' size='10'  type='text' id='ndemo".$n."' 
                 onKeyPress='return numbersonly(event, false)'  value='".$row['numberofDemonstrationsEstablished']."' /></td>
         
                 
         </tr>";
                 
         $n++;
         
         }
         
                                 }
         
         
 
   $data.=" 
  <tr style='display:none'>
   <td>Attach Minutes</td>
   <td><input name='' size='50' type='file'></td>
   </tr>
   <tr style='display:none'>
   <td>Attach Attendance Sheet/List</td>
   <td><input name='' size='50' type='file'></td>
   </tr>
   ";
  
  
  $data.="<tr class='evenrow'><td></td><td colspan='14' align='right'><div align='right'>
         <button type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_FieldDaysandDemonstrations(xajax.getFormValues('projects')); return false;\" />Save</button>
         </div></td></tr>
 </table>
 
 
 
 </form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_FieldDaysandDemonstrations($formvalues){
 $obj=new xajaxResponse();
 if($semiAnnual=='Closed'){
         $obj->alert("Your Reporting Period Was Closed.Please contact Your M&E Person for Access");
         return $obj;
 }
 
         
 $indicator_id_=array(
                                         
                                         "FarmersAttendingDistrictMajorFieldDays"=>47,"DistrictMajorFieldDaysConducted"=>14,
                                         
                                         "FarmersAttendingDCRegularFieldDays"=>49,"DCRegularFieldDaysConducted"=>48,
                                         
                                         "FarmersAttendingPOSpecificFieldDays"=>51,"POSpecificFieldDaysConducted"=>50,
                                         "FarmersAttendingCFDemonstrations"=>77,"CFDemonstrationsEstablished"=>13);
                                         
                                         $indicator_id=array(47,14,49,48,51,50,77,13);
                                 //$indicator_id=array();
                                 $fyear=$formvalues['year'];
                                 $zone=$formvalues['region'];
                                 //$district=$formvalues['district'];
                                 $semiAnnual=$formvalues['semiAnnual'];
                                 $fieldofficer=$formvalues['fieldofficer'];
                                 $organization=$formvalues['organization'];
                                 $n=1;
         
 
                                 //$obj->alert("Note: Only Current Reporting Year Actuals/Achievements Will be Captured/Edited!");
                                 //$obj->alert(count($formvalues['total']));
                                 //$obj->alert(count($formvalues['loopkey1']));
                 
         for($i=0;$i<count($formvalues['loopkey1']);$i++){
                         $trainingtopic1=$formvalues['trainingtopic1'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $district=$formvalues['district'][$i];
                         //$obj->alert($district);
                         $training_id=$formvalues['training_id'][$i];
                         $malehoe=$formvalues['malehoe'][$i];
                         $femalehoe=$formvalues['femalehoe'][$i];
                         $numberofFieldDays=$formvalues['fdaydm'][$i];
                         $total=$malehoe+$femalehoe;
                         
                         #$typeofDisaggregation=$formvalues['typeofDisaggregation'][$i];
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                          
                                 if(($total<>NULL)){
 
 
                                                 $insert="INSERT INTO tbl_fielddaysanddemonstrations
                                                 (`org_code`, `zone`,`district`,`semi_annual`, `year`, `fielddayIndicator`, `male`,`female`,
                                                 `updatedby`,`FieldOfficerResponsible`,`total`,numberofFieldDays)
                                                 values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',	
                                                 '".$trainingtopic1."','".$malehoe."','".$femalehoe."','".$_SESSION['username']."',
                                                 '".$fieldofficer."','".$total."','".$numberofFieldDays."')	
                                                 ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."',
                                                  `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `fielddayIndicator`='".$trainingtopic1."', 
                                                  `male`='".$malehoe."', `female`='".$femalehoe."',total='".$total."',updatedby='".$_SESSION['username']."',
                                                 numberofFieldDays='".$numberofFieldDays."' ";
                                                 //$obj->alert($insert);
                                         @Execute($insert)or die(http("Edit-2241"));
                                                         //--------------------FarmersAttendingDistrictMajorFieldDays-----------/
                                                         /* $obj->alert("insert into tbl_organizationreporting(`zone`, `district`, `year`,`semi_annual`,`typeofparticipants`,
                          `ReportingType`,`indicator_id`, `male`, `female`, `total`, `updatedby`) 
                         values('".$zone."','".$district."','".$fyear."','".$semiAnnual."','".$trainingtopic."',
                         '".$reportingType."','".$indicator_id_['FarmersAttendingDistrictMajorFieldDays']."','".$male."','".$female."','".$total."','".$_SESSION['username']."') 
                         on duplicate key update zone='".$zone."',district='".$district."',`semi_annual`='".$semiAnnual."', `year`='".$fyear."',
                          indicator_id='".$indicator_id_['FarmersAttendingDistrictMajorFieldDays']."',typeofparticipants='".$trainingtopic."', `male`='".$male."', `female`='".$female."',
                          `total`='".$total."', updatedby='".$_SESSION['username']."'
                         "); */
                                         $x=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic1,$reportingType,
                                         $indicator_id_['FarmersAttendingDistrictMajorFieldDays'],$malehoe,$femalehoe,'',$total,$gender='Yes',$error_Code="Edit-2243");
                                                         //---------------DistrictMajorFieldDaysConducted-----------------------/
                                                 $xd=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic1,$reportingType,
                                                 $indicator_id[1],'','',$numberofFieldDays,$numberofFieldDays,$gender='No',$error_Code="Edit-2630");
                                                 //$obj->alert($xd);
                                                 //$obj->alert(count($x));
                                                 //$obj->alert(count($xd));
                                                 
                         }}
                         
                         
                         
                         
                         
                         //$obj->alert(count($formvalues['loopkey2']));
                         for($i=0;$i<count($formvalues['loopkey2']);$i++){
                         $trainingtopic2=$formvalues['trainingtopic2'][$i];
                         $trainees=$formvalues['trainees'][$i];
                         $district=$formvalues['district'][$i];
                         //$obj->alert($district);
                         $maleadp=$formvalues['maleadp'][$i];
                         $femaleadp=$formvalues['femaleadp'][$i];
                         $numberofFieldDays=$formvalues['fdaydr'][$i];
                         //$total=$formvalues['total'][$i];
                         $total2=$maleadp+$femaleadp;
                                                 
                                                 
                                                 //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                                                 
                                         if(($total2<>NULL)){	
                         
                                                         $insert2="INSERT INTO tbl_fielddaysanddemonstrations
                                                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `fielddayIndicator`, `male`,
                                          `female`,`updatedby`,FieldOfficerResponsible,total,numberofFieldDays)
                                                         values('".$organization."',
                                                         '".$zone."',
                                                         '".$district."',
                                                         '".$semiAnnual."',
                                                         '".$fyear."',
                                                                 '".$trainingtopic2."',
                                                                 '".$maleadp."',
                                                                 '".$femaleadp."',
                                                                 '".$_SESSION['username']."',
                                                                 '".$fieldofficer."',
                                                                 '".$total2."',
                                                                 '".$numberofFieldDays."')
                                                                 ON DUPLICATE KEY UPDATE zone='".$zone."'
                                                                 ,district='".$district."',
                                                                 `org_code`='".$organization."',
                                                                  `semi_annual`='".$semiAnnual."', 
                                                                 `year`='".$fyear."',
                                                                  `fielddayIndicator`='".$trainingtopic2."',
                                                                  `male`='".$maleadp."',
                                                                 `female`='".$femaleadp."',
                                                                 total='".$total2."',
                                                                 updatedby='".$_SESSION['username']."',
                                                                 numberofFieldDays='".$numberofFieldDays."' ";
                         //$obj->alert($insert2);
                         
                         @Execute($insert2)or die(http("Edit-2273"));
                         //--------"DCRegularFieldDaysConducted"=>48,"FarmersAttendingDCRegularFieldDays"=>49,
                         $x2=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic2,$reportingType,
                                 $indicator_id[2],$maleadp,$femaleadp,'',$total2,$gender='Yes',$error_Code="Edit-2275");
                                 //-----------FarmersAttendingDCRegularFieldDays------/
                                 $xd2=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic2,$reportingType,
                                 $indicator_id[3],'','',$numberofFieldDays,$numberofFieldDays,$gender='No',$error_Code="Edit-2668");
                         }
                         }
                         //$obj->alert(count($formvalues['loopkey3']));
                         
                         for($i=0;$i<count($formvalues['loopkey3']);$i++){
                                 $trainingtopic3=$formvalues['trainingtopic3'][$i];
                                 $district=$formvalues['district'][$i];
                                 //$obj->alert($district);
                                 $trainees=$formvalues['trainees'][$i];
                         $malemechanized=$formvalues['malemechanized'][$i];
                         $femalemechanized=$formvalues['femalemechanized'][$i];
                         $numberofFieldDays=$formvalues['fdaypo'][$i];
                         
                         //$total=$formvalues['total'][$i];
                         $total3=$malemechanized+$femalemechanized;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                         if(($total3<>NULL)){
                         
                 
                         $insert3="INSERT INTO tbl_fielddaysanddemonstrations
                         (`org_code`, `zone`,`district`,`semi_annual`, `year`, `fielddayIndicator`, `male`,
                                          `female`,`updatedby`,FieldOfficerResponsible,total,numberofFieldDays) 
                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."','".$fyear."',
                                 '".$trainingtopic3."','".$malemechanized."','".$femalemechanized."','".$_SESSION['username']."',
                                 '".$fieldofficer."','".$total3."','".$numberofFieldDays."')	
                         ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,`org_code`='".$organization."', `semi_annual`='".$semiAnnual."', `year`='".$fyear."', `fielddayIndicator`='".$trainingtopic3."', `male`='".$malemechanized."', `female`='".$femalemechanized."',total='".$total3."',updatedby='".$_SESSION['username']."',numberofFieldDays='".$numberofFieldDays."'";
                                 
                                 //$obj->alert($insert3);
                                 @Execute($insert3)or die(http("Edit-2475"));
                                 
                                                 //------"POSpecificFieldDaysConducted"=>50,"FarmersAttendingPOSpecificFieldDays"=>51,
                                 
                                 $x3=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic3,$reportingType,
                                                                                 $indicator_id[4],$malemechanized,$femalemechanized,'',$total3,$gender='Yes',$error_Code="Edit-2747");
                                 
                                 //---FarmersAttendingPOSpecificFieldDays------------------
                                 
                                                 $xd3=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic3,$reportingType,
                                                 $indicator_id[5],'','',$numberofFieldDays,$numberofFieldDays,$gender='No',$error_Code="Edit-2752");
                         }
                         }
                         
                         //$obj->alert(count($formvalues['loopkey4']));
                         
                                 for($i=0;$i<count($formvalues['loopkey4']);$i++){
                         $district=$formvalues['district'][$i];
                                 //$obj->alert($district);
                         $trainees=$formvalues['trainees'][$i];
                         $trainingtopic4=$formvalues['trainingtopic4'][$i];
                         $maleherbicide=$formvalues['maleherbicide'][$i];
                         $femaleherbicide=$formvalues['femaleherbicide'][$i];
                         $numberofFieldDays=$formvalues['ndemo'][$i];
                         //$total=$formvalues['total'][$i];
                         $total4=$maleherbicide+$femaleherbicide;
                         //(pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& 
                         
                         if(($total4<>NULL)){
                                 
                                 $insert4="INSERT INTO tbl_fielddaysanddemonstrations
                                         (`org_code`, `zone`,`district`,`semi_annual`,
                                          `year`, `fielddayIndicator`, `male`,
                                                         `female`,`updatedby`,FieldOfficerResponsible,
                                                         total,numberofFieldDays) 
                                                         values('".$organization."','".$zone."','".$district."','".$semiAnnual."',
                                                         '".$fyear."',	'".$trainingtopic4."',
                                                         '".$maleherbicide."','".$femaleherbicide."','".$_SESSION['username']."',
                                                         '".$fieldofficer."','".$total4."','".$numberofFieldDays."')
                                                         ON DUPLICATE KEY UPDATE zone='".$zone."',district='".$district."' ,
                                                         `org_code`='".$organization."', `semi_annual`='".$semiAnnual."',
                                                         `year`='".$fyear."', `fielddayIndicator`='".$trainingtopic4."',
                                                          `male`='".$maleherbicide."', `female`='".$femaleherbicide."',
                                                          total='".$total4."',updatedby='".$_SESSION['username']."',
                                                          numberofFieldDays='".$numberofFieldDays."' ";
                         
                         //$obj->alert($insert4);
                         @Execute($insert4)or die(http("Edit-2210"));
                         //---FarmersAttendingCFDemonstrations-------------------"FarmersAttendingCFDemonstrations"=>77,"CFDemonstrationsEstablished"=>13
                         $x4=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[6],$maleherbicide,$femaleherbicide,'',$total4,$gender='Yes',$error_Code="Edit-2724");
                                 
                                 
                                 //---CFDemonstrationsEstablished----------------------------
                         $xd4=QueryManager::saveFieldIndicatorResults($zone,$district,$fyear,$semiAnnual,$trainingtopic4,$reportingType,$indicator_id[7],'','',$numberofFieldDays,$numberofFieldDays,$gender='No',$error_Code="Edit-2728");
                         
                                 
                         }
                         }
                         
                 //$obj->alert($insert."--".$insert2."--".$insert3."--".$insert4."--".$insert5."--");
                         
 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
 //$obj->call("xajax_ViewAnnualTargets",'','','','','','','','','',1,20);
 return $obj;
 }
 function filterQuarters($disaggregation,$quarter){
 //
 
 $NoneAprilSep.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>
                         ";
                                 
                 $NoneAprilSep.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter2' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$a."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' value='".$row['otherOctMar']."'  readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          
                  /></td>
                 "; 
                 //}
                         $NoneAprilSep.="</tr>";
 
 
 
 $NoneOctMar.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>";
                                 
                 $NoneOctMar.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter2' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$a."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' value='".$row['otherOctMar']."'    onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          
                  /></td>
                 "; 
                 //}
                         $NoneOctMar.="</tr>";
                         
                         
                         
                         //--------------------None Default-------------------------
                         
                         $Nonedefault.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>";
                 $Nonedefault.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter2' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$a."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' value='".$row['otherOctMar']."' readonly='readonly' class='evenrow'    onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          
                  /></td>
                 "; 
                 //}
                         $Nonedefault.="</tr>";
                         
                         
                         
 
 //---------------MAle Female-------------------------------------------------------
 $MaleFemaleAprSep.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>";
 
                 $MaleFemaleAprSep.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  value='".$row['maleAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(this.value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10' value='".$row['femaleAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10'   onKeyPress='return numbersonly(event, false)'
                 readonly='readonly' class='evenrow' value='N/A'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter1' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' value='".$row['maleOctMar']."' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$m."' size='10' value='".$row['femaleOctMar']."' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 
                 
                  /></td>
                 "; 
                 //}
                         $MaleFemaleAprSep.="</tr>";
 
 //-Male Female Oct March=--------------------
 
 $MaleFemaleOctMar.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>";
 
                 $MaleFemaleOctMar.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  value='".$row['maleAprSep']."' readonly='readonly' class='evenrow' onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(this.value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10' value='".$row['femaleAprSep']."' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10'   onKeyPress='return numbersonly(event, false)'
                 readonly='readonly' class='evenrow' value='N/A'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter1' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' value='".$row['maleOctMar']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$m."' size='10' value='".$row['femaleOctMar']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 
                 
                  /></td>
                 "; 
                 //}
                         $MaleFemaleOctMar.="</tr>";
 
 
 
         
                                         switch($disaggregation){
                                                 case "None":
                                                         switch($quarter)
                                                                 {
                                                         case "Apr - Sep":
                                                         $data.=$NoneAprilSep;	
                                                         break;
                                                         case "Oct - Mar":
                                                         $data.=$NoneOctMar;
                                                         default:
                                                         $data.=$Nonedefault;
                                                         break;
                                                                 } 
                                                                 case "Male and Female":
                                                                 switch($quarter)
                                                                 {
                                                         case "Apr - Sep":
                                                         $data.=$MaleFemaleAprSep;	
                                                         break;
                                                         case "Oct - Mar":
                                                         $data.=$MaleFemaleOctMar;
                                                         default:
                                                                         $data.=$Nonedefault;
                                                         break;
                                                                 } 
                                                                 default:
                                                                 
                                                                 switch($quarter)
                                                                 {
                                                         case "Apr - Sep":
                                                         $data.=$NoneAprilSep;
                                                         break;
                                                         case "Oct - Mar":
                                                         $data.=$NoneOctMar;	
                                                         
                                                         default:
                                                                         $data.=$Nonedefault;
                                                         break;
                                                                 } 
                                                                 break;
                                         }
                                         
                                         
                                         
                                         return $data;
                                         }
 function edit_AnnualResultsBackup($formvalues,$year){
 $obj=new xajaxResponse();
 
 $n=1;
 $data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='100%' border='0'>
          <tr>
        
         
               <th colspan='4' class='evenrow2' align='center'>Financial Year:</th><th colspan='4' >
                           <select name='fyear' id='fyear' style='width:200px;'  ><option value=''>-All-</option>";
                                 $data.=QueryManager::FinancialYearFilter($year);
               $data.="</select></th><th colspan='4' class='evenrow2' align='center'>Reporting Period:</th><th colspan='4' >
                           <select name='semiAnnual' id='semiAnnual' style='width:200px;'  ><option value=''>-All-</option>";
                                 $data.=QueryManager::ReportingPeriodFilter($_SESSION['quarter']);
               $data.="</select></th><th colspan='9' ></th>
              
             </tr>
                         <tr>
        
         
               <th colspan='4' class='evenrow2' align='center'>Region:</th><th colspan='4' >
                           <select name='zone' id='zone' style='width:200px;'  ><option value=''>-All-</option>";
                                         $data.=QueryManager::ZoneFilter($_SESSION['zoneID']);		
               $data.="</select></th><th colspan='4' class='evenrow2' align='center'>District:</th><th colspan='4' >
                           <select name='district' id='district' style='width:200px;'  ><option value=''>-All-</option>";
                                         $data.=QueryManager::DistrictFilter($_SESSION['zoneID'],$_SESSION['districtID']);
               $data.="</select></th><th colspan='9' ></th>
              
             </tr>
                         
                         
  <tr>
               <th class='dataRow' colspan=2>&nbsp;</th>
            <th width='145' colspan='' class='dataRow' >&nbsp;</th>
               <th width='145' colspan='' class='dataRow' >&nbsp;</th>
               <th colspan='14' class='dataRow' ><center>Annual Actuals/Achievements</center></th>
                                                                                                                         </tr>
             
                         <tr><th rowspan='2' class='dataRow' >SELECT</th>
                          <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='200' height='0.1'></th>
                          <th colspan='4' class='dataRow' ></th>
                 <th colspan='3' class='dataRow' >April - September</th>
                 <th colspan='3' class='dataRow' >Octber - March</th>
                 <th class='dataRow'  rowspan='2'>Total Annual Actual</th>
                         </tr>
                         <tr>
                         <th width='' colspan='' width='' class='dataRow'>Indicator type</th>
               <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
                          <th width='' colspan='2' width='' class='dataRow'>Disaggregation</th>
              
                 
                                   <th width='' class='dataRow'>Male</th>
                                   <th width='' class='dataRow'>Female</th>
                                    <th width='' class='dataRow'>Other</th>
                                    <th width='' class='dataRow'>Male</th>
                                   <th width='' class='dataRow'>Female</th>
                                    <th width='' class='dataRow'>Other</th>
                         
         </tr>";
                 
                     $inc=1;   $a=1;  		$m=1;
 
 //$count=$formvalues['indicator_idAll']==0?$formvalues['loopkey']:$formvalues['indicator_idAll'];
 //$obj->alert(count($formvalues['indicator_idAll']));
 if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
 $obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
 return $obj;
 }
 if(count($formvalues['indicator_idAll'])==0){
 $obj->alert("Please Filter out the Categories and Select Indicators For Capturing/Editing Achievements");
 return $obj;
 }
 else
 for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
 
 
                         //$y=QueryManager::EditAnnualResults($formvalues['indicator_idAll'][$x],$year);
                         $y="select w.id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
                                                 i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.semi_annual,w.year,
                                                 max(if(w.semi_annual='".$_SESSION['quarter']."' and w.year='".$year."',w.male,0)) as maleAprSep,
                                                 max(if(w.semi_annual='".$_SESSION['quarter']."' and w.year='".$year."',w.female,0)) as femaleAprSep,
                                                 max(if(w.semi_annual='".$_SESSION['quarter']."' and w.year='".$year."',w.other,0)) as otherAprSep,
                                                 sum(if(w.semi_annual='".$_SESSION['quarter']."' and w.year='".$year."',w.total,0)) as totalAnnualActual
                                                  from  tbl_indicator i 
                                                  left join tbl_organizationreporting w on(i.indicator_id=w.indicator_id)
                                                   where i.indicator_id='".$formvalues['indicator_idAll'][$x]."'
                                                   group by i.indicator_id
                                                   order by i.indicator_code asc 
                                                   ";
                         
                         
                   $query2=@Execute($y)or die(http("ED-791"));
                 //$obj->alert($y);
                  
                 
                 
                   while($row=@FetchRecords($query2)){
 
                   $color=$inc%2==1?"evenrow3":"white1";
                   
                   
                   
                         
                         
                         
                         
                         
 
 
 
                   
                                         switch($row['typeofDisaggregation']){
                                         case "None":
                                                         if($_SESSION['quarter']=="Apr - Sep")
                                                                 {
                                                 
                                                         $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'>
                                 <INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>
                         ";
                                 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='".$_SESSION['quarter']."' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$a."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter2' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$a."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' value='".$row['otherOctMar']."'  readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          
                  /></td>
                 "; 
 
                         $data.="</tr>";
 }elseif($_SESSION['quarter']=="Oct - Mar"){
 
 
 $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>";
                                 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter2' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$a."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' value='".$row['otherOctMar']."'    onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          
                  /></td>
                 "; 
         
                         $data.="</tr>";
                         
 }
                                                                 break;
                                                                 case "Male and Female":
                                                                 if($_SESSION['quarter']=='Apr - Sep'){
                                                                 
 //---------------MAle Female-------------------------------------------------------
 $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>";
 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  value='".$row['maleAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(this.value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10' value='".$row['femaleAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10'   onKeyPress='return numbersonly(event, false)'
                 readonly='readonly' class='evenrow' value='N/A'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter1' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' value='".$row['maleOctMar']."' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$m."' size='10' value='".$row['femaleOctMar']."' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 
                 
                  /></td>
                 </tr>";
 
                                                         
                                                                 }
                                                                 elseif($_SESSION['quarter']=='Oct - Mar'){
                                                                 
                                                                 //-Male Female Oct March=--------------------=
 
 $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>";
 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  value='".$row['maleAprSep']."' readonly='readonly' class='evenrow' onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(this.value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10' value='".$row['femaleAprSep']."' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10'   onKeyPress='return numbersonly(event, false)'
                 readonly='readonly' class='evenrow' value='N/A'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter1' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' value='".$row['maleOctMar']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$m."' size='10' value='".$row['femaleOctMar']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 
                 
                  /></td>
                 </tr>";
 
         
                                                                 
                                                                 
                                                                 
                                                                 }
                                                          break;
                                                                 default:
                                                                 if($_SESSION['quarter']=="Apr - Sep")
                                                                 {
                                                 
                                                         $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>
                         ";
                                 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter2' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' value='".$row['otherOctMar']."'  readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          
                  /></td>
                 "; 
 
                         $data.="</tr>";
 }elseif($_SESSION['quarter']=="Oct - Mar"){
 
 
 $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>";
                                 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter2' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' value='".$row['otherOctMar']."'    onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 
                          
                  /></td>
                 "; 
         
                         $data.="</tr>";
                         
 } 
         break;
                                         }
                                         
                   
                   
                 
                   $inc++;
                 
                 }
                   
                  $m++; }
         $data.="
                   <tr class='evenrow'>
   
             <td colspan='16' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_AnnualResults(xajax.getFormValues('annualTarget'));\" /></td>
           </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function edit_AnnualResults($formvalues,$year,$zone,$district){
 $obj=new xajaxResponse();
 if($_SESSION['username']==NULL){
 $obj->redirect('index.php');
 return $obj;
 }
 
 
 
 $reportingType=(isset($_GET['linkvar'])=='Progress Against Targets (FS)')?"Field Supervisors":"Managers";
 
 $reportTitle=($_SESSION['quarter']=='Apr - Sep')?"Semi-Annual Achievements for the Period ".$_SESSION['quarter']." ".substr($year,5,9):"Semi-Annual Achievements for the Period ".$_SESSION['quarter']." ".$year;
 
 $zoneAndDistrict=($_GET['linkvar']=='Progress Against Targets (HO)')?"display_none":"evenrow";
 
 if($_GET['linkvar']=='Progress Against Targets (FS)')
 {
 
         if($zone==NULL||$zone==0){
         $obj->alert("Please Select a Region For Capturing/Editing Achievements");
         return $obj;
         }
         
         if($district==NULL||$district==0){
         $obj->alert("Please Select a District For Capturing/Editing Achievements");
         return $obj;
         }
 }
 //else
 $n=1;
 $data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='100%' border='0'>
          <tr>
        
         
               <th colspan='4' class='evenrow2' align='center'>Project Year:</th><th colspan='4' >
                           <select name='fyear' id='fyear' style='width:200px;'  ><option value=''>-All-</option>";
                                 $data.=QueryManager::FinancialYearFilter($year);
               $data.="</select></th><th colspan='2' class='evenrow2' align='center'>RP/Season:</th><th colspan='6' >
                           <select name='semiAnnual' id='semiAnnual' style='width:200px;'  ><option value=''>-All-</option>";
                                 $data.=QueryManager::ReportingPeriodFilter($_SESSION['quarter']);
               $data.="</select></th>
              
             </tr>
                         <tr class='".$zoneAndDistrict."'>
        
         
               <th colspan='4' class='evenrow2' align='center'>Region:</th><th colspan='4' >
                           <select name='zone' id='zone' style='width:200px;'  ><option value=''>-All-</option>";
                                         $data.=QueryManager::ZoneFilter($_SESSION['zoneID']);		
               $data.="</select></th><th colspan='2' class='evenrow2' align='center'>District:</th><th colspan='6' >
                           <select name='district' id='district' style='width:200px;'  ><option value=''>-All-</option>";
                                         $data.=QueryManager::DistrictFilter($_SESSION['zoneID'],$_SESSION['districtID']);
               $data.="</select></th>
              
             </tr>
                         
                         
 
             
                         <tr><th rowspan='2' class='dataRow' >SELECT</th>
                          <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='200' height='0.1'></th>
                         
                 <th colspan='7' class='dataRow' ><center>".$reportTitle."</center></center></th>
                 
                 <th class='dataRow'  rowspan='2'>Total Actual</th>
                         </tr>
                         <tr>
                         <th width='' colspan='' width='' class='dataRow'>Indicator type</th>
               <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
                          <th width='' colspan='2' width='' class='dataRow'>Disaggregation</th>
              
                 
                                   <th width='' class='dataRow'>Male</th>
                                   <th width='' class='dataRow'>Female</th>
                                    <th width='' class='dataRow'>Other</th>
                                  
                         
         </tr>";
                 
                     $inc=1;   $a=1;  		$m=1;
 
 //$count=$formvalues['indicator_idAll']==0?$formvalues['loopkey']:$formvalues['indicator_idAll'];
 //$obj->alert(count($formvalues['indicator_idAll']));
 if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
 $obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
 return $obj;
 }
 if(count($formvalues['indicator_idAll'])==0){
 $obj->alert("Please Select Indicators For Capturing/Editing Achievements");
 return $obj;
 }
 else
 for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
 
 //and i.responsible='".$reportingType."'
                         //$y=QueryManager::EditAnnualResults($formvalues['indicator_idAll'][$x],$year);
                         $y="select w.id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
                                                 i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.semi_annual,w.year,
                                                 max(if(w.semi_annual='".$_SESSION['quarter']."' and w.year='".$year."',w.male,0)) as maleAprSep,
                                                 max(if(w.semi_annual='".$_SESSION['quarter']."' and w.year='".$year."',w.female,0)) as femaleAprSep,
                                                 max(if(w.semi_annual='".$_SESSION['quarter']."' and w.year='".$year."',w.other,0)) as otherAprSep,
                                                 sum(if(w.semi_annual='".$_SESSION['quarter']."' and w.year='".$year."',w.total,0)) as totalAnnualActual
                                                  from  tbl_indicator i 
                                                  left join tbl_organizationreporting w on(i.indicator_id=w.indicator_id)
                                                   where i.indicator_id='".$formvalues['indicator_idAll'][$x]."'
                                                   
                                                   group by i.indicator_id
                                                   order by i.indicator_code asc 
                                                   ";
                         
                         
                   $query2=@Execute($y)or die(http("ED-791"));
                 #$obj->alert($y);
                  
                 
                 
                   while($row=@FetchRecords($query2)){
 
                   $color=$inc%2==1?"evenrow3":"white1";
                   
                   switch($row['typeofDisaggregation']){
                                         case "None":
                                                         
 $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>";
                                 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='".$_SESSION['quarter']."' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 
                 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 
                 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                  /></td>
                 
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                         
                         onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
                  /></td>"; 
         
                         $data.="</tr>";
                         
 
                                                                 break;
                                                                 case "Male and Female":
                                                                 
                                                                 //-Male Female Oct March=--------------------=
 
 $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>";
 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='".$_SESSION['quarter']."' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  value='".$row['maleAprSep']."' onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10' value='".$row['femaleAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10'   onKeyPress='return numbersonly(event, false)'
                 readonly='readonly' class='evenrow' value='N/A'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
                 
                  /></td>
                 
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"  
                 
                  /></td>
                 </tr>";
 
         
                                                                 
                                                                 
                                                                 
                                                                 
                                                          break;
                                                                 default:
                                                                 
                                                         
 $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>";
                                 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 
                 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                 
                 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
                  /></td>
                 
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
                          
                          onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
                  /></td>
                 "; 
         
                         $data.="</tr>";
                         
 
         break;
                                         }
                                         
                   
                   
                 
                   $inc++;
                 
                 }
                   
                  $m++; }
         $data.="
                   <tr class='evenrow'>
   
             <td colspan='16' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_AnnualResults(xajax.getFormValues('annualTarget'));\" /></td>
           </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_AnnualResults($formvalues){
 $obj=new xajaxResponse();
 $fyear=$formvalues['fyear'];
 $zone=$formvalues['zone'];
 $district=$formvalues['district'];
 $semiAnnual=$formvalues['semiAnnual'];
 $reportingType=(isset($_GET['linkvar'])=='Progress Against Targets (FS)')?"Field Supervisors":"Managers";
 
 $reportTitle=($_SESSION['quarter']=='Apr - Sep')?"Semi-Annual Achievements for the Period ".$_SESSION['quarter']." ".substr($fyear,5,9):"Semi-Annual Achievements for the Period ".$_SESSION['quarter']." ".$fyear;
 
 if($semiAnnual=='Closed'||$fyear=='Closed'){
 $obj->alert("Your Reporting Period Was Closed. Please contact Your M&E Person for Access");
 return $obj;
 }
 
 if($semiAnnual<>$_SESSION['quarter']){
 $obj->alert("Only Current Reporting Period Results can be Edited/Captured! Please Select ".$_SESSION['quarter']);
 return $obj;
 }
 
 
 
                 $obj->alert("Note: Only ".$reportTitle." Will be Captured/Edited!");
                 //$obj->alert($formvalues['indicator_id']);
         for($i=0;$i<count($formvalues['indicator_id']);$i++){
                         $indicator=$formvalues['indicator_id'][$i];
                         $baseline=$formvalues['baselinevalue'][$i];
                         $workplan_id=$formvalues['workplan_id'][$i];
                         $male=$formvalues['male'][$i];
                         $female=$formvalues['female'][$i];
                         $other=$formvalues['other'][$i];
                         $male2=$formvalues['male2'][$i];
                         $female2=$formvalues['female2'][$i];
                         $other2=$formvalues['other2'][$i];
                         $total=$formvalues['target'][$i];
                         //$quarter=$formvalues['quarter'][$i];
                         $typeofDisaggregation=$formvalues['typeofDisaggregation'][$i];
                         
                          
  if((pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& ($total<>NULL)){
 //if($workplan_id<>NULL){
 
 
                 switch($typeofDisaggregation)
                 {
                 case"None":
                 //if($semiAnnual=='Apr - Sep'){
                         $insert="INSERT INTO tbl_organizationreporting
                         (indicator_id,
                         semi_annual,
                         year,
                         other,
                         total,
                         updatedby,zone,district,ReportingType) 
                         values(
                         '".$indicator."',
                         '".$_SESSION['quarter']."',
                         '".$fyear."',
                         '".$other."',
                         '".$other."','".$_SESSION['username']."','".$zone."','".$district."','".$reportingType."')
                         ON DUPLICATE KEY UPDATE year='".$fyear."',other='".$other."',
                         total='".$other."',semi_annual='".$_SESSION['quarter']."',
                         indicator_id='".$indicator."',
                         updatedby='".$_SESSION['username']."',zone='".$zone."',district='".$district."',ReportingType='".$reportingType."' ";
                         //$obj->alert($insert);
                         @mysql_query($insert)or die(http("Edit-3364"));
                         
                                 //} 
                                 
                                 /* elseif($semiAnnual=='Oct - Mar'){
                                 $insert2="INSERT INTO tbl_organizationreporting(
                                         indicator_id,
                                         semi_annual,
                                         year,
                                         other,
                                         total,
                                         updatedby,zone,district) 
 values('".$indicator."','Oct - Mar','".$fyear."','".$other2."','".$other2."','".$_SESSION['username']."','".$zone."','".$district."')
 ON DUPLICATE KEY UPDATE year='".$fyear."',other='".$other2."',
 total='".$other2."',indicator_id='".$indicator."',updatedby='".$_SESSION['username']."',zone='".$zone."',district='".$district."' ";
 
                                 @mysql_query($insert2)or die(http("Edit-955"));
  
  }*/
                 
                 break;
                 case "Male and Female":
                                                 
                                                                                 $total1=($male+$female);
                                                                                 $total2=($male2+$female2);
                                                                                 //if($semiAnnual=='Apr - Sep'){
                                                                                         $insert1="INSERT INTO tbl_organizationreporting
                                                                                         (indicator_id,
                                                                                         semi_annual,
                                                                                         year,
                                                                                         male,female,
                                                                                         total,
                                                                                         updatedby,zone,district,ReportingType) 
                                                                                         values(
                                                                                         '".$indicator."',
                                                                                         '".$_SESSION['quarter']."',
                                                                                         '".$fyear."',
                                                                                         '".$male."','".$female."',
                                                                                         '".$total1."','".$_SESSION['username']."','".$zone."','".$district."','".$reportingType."')
                                                                                         ON DUPLICATE KEY UPDATE year='".$fyear."',
                                                                                         male='".$male."',female='".$female."',
                                                                                         total='".$total1."',semi_annual='".$_SESSION['quarter']."',
                                                                                         indicator_id='".$indicator."',
                                                                                         updatedby='".$_SESSION['username']."' ,zone='".$zone."',district='".$district."',ReportingType='".$reportingType."'";
                                                                                                  @mysql_query($insert1)or die(http("Edit-3395"));
                 
                                                                                                 /*} elseif($semiAnnual=='Oct - Mar'){
                                                                                                 $insert2="INSERT INTO tbl_organizationreporting
                                                                                         (indicator_id,
                                                                                         semi_annual,
                                                                                         year,
                                                                                         male,female,
                                                                                         total,
                                                                                         updatedby,zone,district) 
                                                                                         values(
                                                                                         '".$indicator."',
                                                                                         'Oct - Mar',
                                                                                         '".$fyear."',
                                                                                         '".$male2."','".$female2."',
                                                                                         '".$total2."','".$_SESSION['username']."','".$zone."','".$district."')
                                                                                         ON DUPLICATE KEY UPDATE year='".$fyear."',
                                                                                         male='".$male2."',female='".$female2."',
                                                                                         total='".$total2."',semi_annual='Oct - Mar',
                                                                                         indicator_id='".$indicator."',
                                                                                         updatedby='".$_SESSION['username']."',zone='".$zone."',district='".$district."'";		
                                                         
                                 @mysql_query($insert2)or die(http("Edit-1012"));
                                                                         } */
                                                                         
                                                         
                                                                         
                                 
                 
                 break;
                 default:
                 
                                         //if($semiAnnual=='Apr - Sep'){
                         $insert2="INSERT INTO tbl_organizationreporting
                         (indicator_id,
                         semi_annual,
                         year,
                         other,
                         total,
                         updatedby,zone,district,ReportingType) 
                         values(
                         '".$indicator."',
                         '".$_SESSION['quarter']."',
                         '".$fyear."',
                         '".$other."',
                         '".$other."','".$_SESSION['username']."','".$zone."','".$district."','".$reportingType."')
                         ON DUPLICATE KEY UPDATE year='".$fyear."',other='".$other."',
                         total='".$other."',semi_annual='".$_SESSION['quarter']."',
                         indicator_id='".$indicator."',
                         updatedby='".$_SESSION['username']."',zone='".$zone."',district='".$district."',ReportingType='".$reportingType."'";
                                         @mysql_query($insert2)or die(http("Edit-3445"));
                                 
                                                         /* } elseif($semiAnnual=='Oct - Mar'){
                                 $insert2="INSERT INTO tbl_organizationreporting(
                                         indicator_id,
                                         semi_annual,
                                         year,
                                         other,
                                         total,
                                         updatedby,zone,district) 
 values('".$indicator."','Oct - Mar','".$fyear."','".$other2."','".$other2."','".$_SESSION['username']."','".$zone."','".$district."')
 ON DUPLICATE KEY UPDATE year='".$fyear."',other='".$other2."',
 total='".$other2."',indicator_id='".$indicator."',updatedby='".$_SESSION['username']."',zone='".$zone."',district='".$district."'";		
                 
                                 @mysql_query($insert2)or die(http("Edit-1061"));
                                                                         } */
                 
                 //$obj->alert("The Type of Disaggregation of Your Indicators are unknown.Update Aborted!");
                 //return $obj;
                 break;
                 }
 
 
 
 //$obj->alert($updateIndicator);
 //$obj->alert($insert);
 //$obj->alert($insert2);
                                 
                                 
 
 //}
 
 }
         }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
 //$obj->call("xajax_ViewAnnualTargets",'','','','','','','','','',1,20);
 return $obj;
 }
 function edit_annualTargetxxxx($formvalues,$year,$region){
 $obj=new xajaxResponse();
 if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
 $obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
 return $obj;
 }
 
 if($region==NULL){
 $obj->alert("Please Select a Region for Which you are Editing/Entering Data For!");
 return $obj;
 }
 
 $n=1;
 $data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='100%' border='0'>
          <tr>
        
         
               <th colspan='3' class='evenrow2' align='center'>Financial Year:</th><th colspan='3' >
                           <select name='fyear' id='fyear' style='width:200px;'  ><option value=''>-All-</option>";
                                 $data.=QueryManager::FinancialYearFilter($year);
               $data.="</select></th>
                           
                           
                           <th colspan='2' class='evenrow2' align='center'>Region:</th><th colspan='10' >
                           <select name='zone' id='zone' style='width:200px;'   ><option value=''>-All-</option>";
                            //onchange=\"xajax_edit_annualTarget('".$formvalues."','".$year."','".$region."');\"
                                 $data.=QueryManager::ZoneFilter($region);
               $data.="</select></th><th colspan='13' ></th>
              
              
             </tr>
  <tr>
               <th class='dataRow' colspan=2>&nbsp;</th>
            <th width='145' colspan='' class='dataRow' >&nbsp;</th>
               <th width='145' colspan='' class='dataRow' >&nbsp;</th>
               <th colspan='14' class='dataRow' ><center>Annual Targets</center></th>
                                                                                                                         </tr>
             
                         <tr><th rowspan='2' class='dataRow' >SELECT</th>
                          <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator</th>
                          <th colspan='4' class='dataRow' ></th>
                 <th colspan='3' class='dataRow' >April - September</th>
                 <th colspan='3' class='dataRow' >Octber - March</th>
                 <th class='dataRow'  rowspan='2'>Total Annual Target</th>
                         </tr>
                         <tr>
                         <th width='' colspan='' width='' class='dataRow'>Indicator type</th>
               <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
                          <th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
              
                         
                         
                                   <th width='' class='dataRow'>Baseline</th>
                                   <th width='' class='dataRow'>Male</th>
                                   <th width='' class='dataRow'>Female</th>
                                    <th width='' class='dataRow'>Other</th>
                                    <th width='' class='dataRow'>Male</th>
                                   <th width='' class='dataRow'>Female</th>
                                    <th width='' class='dataRow'>Other</th>
                         
         </tr>";
                 
                     $inc=1;   $a=1;  		$m=1;
 
 //$count=$formvalues['indicator_idAll']==0?$formvalues['loopkey']:$formvalues['indicator_idAll'];
 //$obj->alert(count($formvalues['indicator_idAll']));
 if(count($formvalues['indicator_idAll'])==0){
 $obj->alert("Please Filter out the Categories and Select Indicators For Setting/Editing Targets");
 return $obj;
 }
 else
 for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
 
 $y="select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
 i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.semi_annual,w.curr_year,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.male,0)) as maleAprSep,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.female,0)) as femaleAprSep,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.other,0)) as otherAprSep,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.male,0)) as maleOctMar,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.female,0)) as femaleOctMar,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.other,0)) as otherOctMar,
 sum(if(w.curr_year='".$year."',w.Target,0)) as totalAnnualTarget
  from  tbl_indicator i 
  left join tbl_workplan w on(i.indicator_id=w.indicator_id)
   where i.indicator_id='".$formvalues['indicator_idAll'][$x]."'
    and w.region='".$region."'
   group by i.indicator_id
   order by i.indicator_code asc";
   
 /* 
 $y2="select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
 i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.semi_annual,w.curr_year,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.male,0)) as maleAprSep,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.female,0)) as femaleAprSep,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.other,0)) as otherAprSep,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.male,0)) as maleOctMar,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.female,0)) as femaleOctMar,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.other,0)) as otherOctMar,
 sum(if(w.curr_year='".$year."',w.Target,0)) as totalAnnualTarget
  from  tbl_indicator i 
  left join tbl_workplan w on(i.indicator_id=w.indicator_id)
     group by i.indicator_id
   order by i.indicator_id,i.indicator_code asc 
   ";
   $y=count($formvalues['indicator_idAll'])==0?$y2:$y1; */
                   $query2=@mysql_query($y)or die(http("ED-791"));
                 //$obj->alert($y);
                  
                 
                 
                   while($row=@mysql_fetch_array($query2)){
 
                   $color=$inc%2==1?"evenrow3":"white1";
                   switch($row['typeofDisaggregation'])
                                 {
                                 case "None":
   $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>
                         <td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";
 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter1' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' value='".$row['otherOctMar']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          
                  /></td>
                 "; 
                 //}
                         $data.="</tr>";
         
         break;
                 case "Male and Female":
                 
                                 $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>
                         <td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";
 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  value='".$row['maleAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(this.value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10' value='".$row['femaleAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10'   onKeyPress='return numbersonly(event, false)'
                 readonly='readonly' class='evenrow' value='N/A'
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter1' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' value='".$row['maleOctMar']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$m."' size='10' value='".$row['femaleOctMar']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 
                 
                  /></td>
                 "; 
                 //}
                         $data.="</tr>";
         
                 break;
                 default:
                 
                 $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >".$row['typeofDisaggregation']."</td>
                         <td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";
 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(this.value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td>
                 
                 <input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter1' />
                 <input name='male2[]' type='text' id='male2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='female2[]' type='text' id='female2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                  /></td>
                 <td><input name='other2[]' type='text' id='other2".$m."' size='10' value='".$row['otherOctMar']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onKeyup=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
                          
                  /></td>
                 "; 
                 //}
                         $data.="</tr>";
         
                 
                 
                 break;
                 }
                   $inc++;
                 
                 }
                   
                  $m++; }
         $data.="
                   <tr class='evenrow'>
   
             <td colspan='16' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_annualTargetExtendedxxx(xajax.getFormValues('annualTarget'));\" /></td>
           </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function edit_annualTarget($formvalues,$year,$region,$quarter){
 $obj=new xajaxResponse();
 if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
 $obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
 return $obj;
 }
 
 if($region==NULL){
 $obj->alert("Please Select a Region for Which you are Editing/Entering Data For!");
 return $obj;
 }
 if($quarter==NULL){
 $obj->alert("Please Select a Reporting Period/Season for Which you are Editing/Entering Data For!");
 return $obj;
 }
 
 $n=1;
 $data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='100%' border='0'>
          <tr>
        
         
               <th colspan='2' class='evenrow2' align='center'>Financial Year:</th><th colspan='3' >
                           <select name='fyear' id='fyear' style='width:200px;'  ><option value=''>-All-</option>";
                                 $data.=QueryManager::FinancialYearFilter($year);
               $data.="</select></th>
                           <th colspan='2' class='evenrow2' align='center'>RP/Season:</th><th colspan='3' >
                           <select name='quarter' id='quarter' style='width:200px;'  ><option value=''>-All-</option>";
                                 $data.=QueryManager::ReportingPeriodFilter($quarter);
               $data.="</select></th>
                           
                           
                           <th colspan='1' class='evenrow2' align='center'>Region:</th><th colspan='10' >
                           <select name='zone' id='zone' style='width:200px;'   ><option value=''>-All-</option>";
                            //onchange=\"xajax_edit_annualTarget('".$formvalues."','".$year."','".$region."');\"
                                 $data.=QueryManager::ZoneFilter($region);
               $data.="</select></th><th colspan='12' ></th>
              
              
             </tr>
  <tr>
               <th class='dataRow' colspan=2>&nbsp;</th>
            <th width='145' colspan='' class='dataRow' >&nbsp;</th>
               <th width='145' colspan='' class='dataRow' >&nbsp;</th>
               <th colspan='14' class='dataRow' ><center>Annual Targets</center></th>
                                                                                                                         </tr>
            
                         <tr><th rowspan='1' class='dataRow' >NO</th>
                          <th rowspan='1' colspan='4' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='150' height='0.1'></th>
                         <th width='' colspan='' width='' class='dataRow'>Indicator type</th>
               <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
                          <th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
              
                         
                         
                                   <th width='' class='dataRow'>Baseline</th>
                                   <th width='' class='dataRow'>Male</th>
                                   <th width='' class='dataRow'>Female</th>
                                    <th width='' class='dataRow'>Other</th>
                                         <th class='dataRow'  rowspan='1'>Total Annual Target</th>
                         
         </tr>";
                 
                     $inc=1;   $a=1;  		$m=1;
 
 //$count=$formvalues['indicator_idAll']==0?$formvalues['loopkey']:$formvalues['indicator_idAll'];
 //$obj->alert(count($formvalues['indicator_idAll']));
 if(count($formvalues['indicator_idAll'])==0){
 $obj->alert("Please Filter out the Categories and Select Indicators For Setting/Editing Targets");
 return $obj;
 }
 else
 for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
 
 $y="select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
 i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.semi_annual,w.curr_year,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.male,0)) as maleAprSep,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.female,0)) as femaleAprSep,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.other,0)) as otherAprSep,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.male,0)) as maleOctMar,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.female,0)) as femaleOctMar,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.other,0)) as otherOctMar,
 sum(if(w.curr_year='".$year."',w.Target,0)) as totalAnnualTarget
  from  tbl_indicator i 
  left join tbl_workplan w on(i.indicator_id=w.indicator_id)
   where i.indicator_id='".$formvalues['indicator_idAll'][$x]."'
    and w.region='".$region."'
   group by i.indicator_id
   order by i.indicator_code asc";
   
 /* 
 $y2="select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
 i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.semi_annual,w.curr_year,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.male,0)) as maleAprSep,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.female,0)) as femaleAprSep,
 max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.other,0)) as otherAprSep,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.male,0)) as maleOctMar,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.female,0)) as femaleOctMar,
 max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.other,0)) as otherOctMar,
 sum(if(w.curr_year='".$year."',w.Target,0)) as totalAnnualTarget
  from  tbl_indicator i 
  left join tbl_workplan w on(i.indicator_id=w.indicator_id)
     group by i.indicator_id
   order by i.indicator_id,i.indicator_code asc 
   ";
   $y=count($formvalues['indicator_idAll'])==0?$y2:$y1; */
                   $query2=@mysql_query($y)or die(http("ED-791"));
                 #$obj->alert($y);
                  
                 
                 
                   while($row=@mysql_fetch_array($query2)){
 
                   $color=$inc%2==1?"evenrow3":"white1";
                   switch($row['typeofDisaggregation'])
                                 {
                                 case "None":
   $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>
                         <td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";
 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                  /></td>
                 
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"	 
                  /></td>
                 "; 
                 //}
                         $data.="</tr>";
         
         break;
                 case "Male and Female":
                 
                                 $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
                                 ".$row['typeofDisaggregation']."</td>
                         <td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";
 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  value='".$row['maleAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10' value='".$row['femaleAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10'   onKeyPress='return numbersonly(event, false)'
                 readonly='readonly' class='evenrow' value='N/A'
                 
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 
                  /></td>
                 
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                  /></td>
                 "; 
                 //}
                         $data.="</tr>";
         
                 break;
                 default:
                 
                 $data.="<tr class=$color>
  <td width='25' >".$row['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
                         <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
                         <td align='left' colspan='1'>".$row['indicator_type']."</td>
                         <td align='left'>".$row['unitofmeasure']."</td>
                                 <td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >".$row['typeofDisaggregation']."</td>
                         <td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";
 
                 $data.="
                 <td>
                 <input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
                 <input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                  /></td>
                 <td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                  /></td>
                 <td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                  /></td>
                 <td>
                 <input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
                 
                 
                 onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"
                 
                 
                 onBlur=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
                 '','','','target".$m."');return false;\"	 
                  /></td>
                 "; 
                 //}
                         $data.="</tr>";
         
                 
                 
                 break;
                 }
                   $inc++;
                 
                 }
                   
                  $m++; }
         $data.="
                   <tr class='evenrow'>
   
             <td colspan='16' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_annualTargetExtended(xajax.getFormValues('annualTarget'));\" /></td>
           </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_annualTargetExtended($formvalues){
 $obj=new xajaxResponse();
 $fyear=$formvalues['fyear'];
 $zone=$formvalues['zone'];
 $quarter=$formvalues['quarter'];
 
 if($fyear==NULL){
 $obj->alert("Missing Financial Year!");
 return $obj;
 }
 
 /* if($fyear<currFinancialYear($_SESSION['Activeyear'],'YearRange')){
 $obj->alert("You Cannot edit Targets of  Aprevious Financial Year!");
 return $obj;
 } */
 
 if($zone==NULL){
 $obj->alert("Please Select the Region and Try Again!");
 return $obj;
 }
 
                 //$obj->alert("Note: Only Current Reporting Year Targets Will be Added/Edited!");
                 //$obj->alert($formvalues['indicator_id']);
         for($i=0;$i<count($formvalues['indicator_id']);$i++){
                         $indicator=$formvalues['indicator_id'][$i];
                         $baseline=$formvalues['baselinevalue'][$i];
                         $workplan_id=$formvalues['workplan_id'][$i];
                         $male=$formvalues['male'][$i];
                         $female=$formvalues['female'][$i];
                         $other=$formvalues['other'][$i];
                         $male2=$formvalues['male2'][$i];
                         $female2=$formvalues['female2'][$i];
                         $other2=$formvalues['other2'][$i];
                         $total=$formvalues['target'][$i];
                         $typeofDisaggregation=$formvalues['typeofDisaggregation'][$i];
                         
                          
  //if((pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')==$fyear)&& ($total<>NULL)){
 if($total<>NULL){
 
 
                 switch($typeofDisaggregation)
                 {
                 case"None":
                 $updateIndicator="UPDATE tbl_indicator set baseline='".$baseline."',updatedby='".$_SESSION['username']."' WHERE indicator_id='".$indicator."'";
                 
                 
                 
                         $insert="INSERT INTO tbl_workplan
                         (indicator_id,
                         semi_annual,
                         curr_year,
                         other,
                         Target,region,
                         lastUpdatedby) 
                         values(
                         '".$indicator."',
                         '".$quarter."',
                         '".$fyear."',
                         '".$other."',
                         '".$other."','".$zone."','".$_SESSION['username']."')
                         ON DUPLICATE KEY UPDATE curr_year='".$fyear."',other='".$other."',
                         Target='".$other."',semi_annual='".$quarter."',
                         indicator_id='".$indicator."',region='".$zone."',
                         lastUpdatedby='".$_SESSION['username']."'";
                                 
                                 /* $insert2="INSERT INTO tbl_workplan(
                                         indicator_id,
                                         semi_annual,
                                         curr_year,
                                         other,
                                         Target,
                                         lastUpdatedby,region) 
 values('".$indicator."','Oct - Mar','".$fyear."','".$other2."','".$other2."','".$_SESSION['username']."','".$zone."')
 ON DUPLICATE KEY UPDATE curr_year='".$fyear."',other='".$other2."',
 Target='".$other2."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."',region='".$zone."'";
  */
                                 
                 break;
                 case "Male and Female":
                 
                                                                 $updateIndicator="UPDATE tbl_indicator set baseline='".$baseline."',updatedby='".$_SESSION['username']."' WHERE indicator_id='".$indicator."'";
                                                                                 
                                                                                 $total1=($male+$female);
                                                                                 $total2=($male2+$female2);
                                                                                 
                                                                                         $insert="INSERT INTO tbl_workplan
                                                                                         (indicator_id,
                                                                                         semi_annual,
                                                                                         curr_year,
                                                                                         male,female,
                                                                                         Target,
                                                                                         lastUpdatedby,region) 
                                                                                         values(
                                                                                         '".$indicator."',
                                                                                         '".$quarter."',
                                                                                         '".$fyear."',
                                                                                         '".$male."','".$female."',
                                                                                         '".$total1."','".$_SESSION['username']."','".$zone."')
                                                                                         ON DUPLICATE KEY UPDATE curr_year='".$fyear."',
                                                                                         male='".$male."',female='".$female."',
                                                                                         Target='".$total1."',semi_annual='".$quarter."',
                                                                                         indicator_id='".$indicator."',region='".$zone."',
                                                                                         lastUpdatedby='".$_SESSION['username']."'";
                                                                                                 
                                                                                         /* 	$insert2="INSERT INTO tbl_workplan
                                                                                         (indicator_id,
                                                                                         semi_annual,
                                                                                         curr_year,
                                                                                         male,female,
                                                                                         Target,
                                                                                         lastUpdatedby,region) 
                                                                                         values(
                                                                                         '".$indicator."',
                                                                                         'Oct - Mar',
                                                                                         '".$fyear."',
                                                                                         '".$male2."','".$female2."',
                                                                                         '".$total2."','".$_SESSION['username']."','".$zone."')
                                                                                         ON DUPLICATE KEY UPDATE curr_year='".$fyear."',
                                                                                         male='".$male2."',female='".$female2."',
                                                                                         Target='".$total2."',semi_annual='Oct - Mar',
                                                                                         indicator_id='".$indicator."',region='".$zone."',
                                                                                         lastUpdatedby='".$_SESSION['username']."'";	 */	
                                                                                         #@mysql_query($updateIndicator)or die(http("Edit-462"));
                                 
                 
                 break;
                 default:
                 
                 $updateIndicator="UPDATE tbl_indicator set baseline='".$baseline."',updatedby='".$_SESSION['username']."' WHERE indicator_id='".$indicator."'";
                 
                 
                         $insert="INSERT INTO tbl_workplan
                         (indicator_id,
                         semi_annual,
                         curr_year,
                         other,
                         Target,
                         lastUpdatedby,region) 
                         values(
                         '".$indicator."',
                         '".$quarter."',
                         '".$fyear."',
                         '".$other."',
                         '".$other."','".$_SESSION['username']."','".$zone."')
                         ON DUPLICATE KEY UPDATE curr_year='".$fyear."',other='".$other."',
                         Target='".$other."',semi_annual='".$quarter."',
                         indicator_id='".$indicator."',
                         lastUpdatedby='".$_SESSION['username']."',region='".$zone."'";
                                 
                         /* 	$insert2="INSERT INTO tbl_workplan(
                                         indicator_id,
                                         semi_annual,
                                         curr_year,
                                         other,
                                         Target,
                                         lastUpdatedby,region) 
 values('".$indicator."','Oct - Mar','".$fyear."','".$other2."','".$other2."','".$_SESSION['username']."','".$zone."')
 ON DUPLICATE KEY UPDATE curr_year='".$fyear."',other='".$other2."',region='".$zone."',
 Target='".$other2."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."'"; */		
                 //$obj->alert("The Type of Disaggregation of Your Indicators are unknown.Update Aborted!");
                 //return $obj;
                 }
 
 
 
 //$obj->alert($updateIndicator);
 //$obj->alert($insert);
 //$obj->alert($insert2);
                                 @mysql_query($updateIndicator)or die(http("Edit-462"));
                                 @mysql_query($insert)or die(http("Edit-463"));
                                 #@mysql_query($insert2)or die(http("Edit-464"));
 
 //}
 
 }
 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
 $obj->call("xajax_ViewAnnualTargets",'','','','','','','','','',1,20);
 return $obj;
 }
 function edit_LOPTarget($formvalues,$fyear){
 $obj=new xajaxResponse();
 
 if($fyear==NULL){
 $obj->alert("Select Project Year Editing/Entering Data For!");
 return $obj;
 }
 
 
 
 $n=1;
 $data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='800' border='0'>
 <tr>
        
         
               <th colspan='2' class='evenrow2' align='center'><center>Project Year:</center></th>
                           
                           <th colspan='8'><select name='fyear' id='fyear' class='combobox' ><option value=''>-select-</option>";
                                 $data.=QueryManager::FinancialYearFilter($fyear);
               $data.="</select></th>
              
             </tr>
          <tr>
        
         
               <th colspan='10' class='evenrow2' align='center'><center>Key Perfomance Indicator Life of Project Targets</center></th>
              
             </tr>
             <tr class=evenrow>
             <th width='25' class='dataRow'>Code</th>
               
                           <th width='' class='dataRow' colspan='3' >Indicator</th>
                           <th width='55' class='dataRow' align='right'>Unit of Measure</th>
                           <th width='55' class='dataRow' align='right'>disaggregation</th>
                           <th width='55' class='dataRow' align='right'>Male</th>
                           <th width='55' class='dataRow' align='right'>Female</th>
                           <th width='55' class='dataRow' align='right'>Other</th>
         
                           <th width='55' class='dataRow' align='right'>Total LOP Target</th>
                         
                           
              
             </tr>";
 //$obj->alert(count($formvalues['workplan_id']));
 //$obj->alert(count($formvalues['loopkey']));
 $m=1;
 if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
 $obj->alert("Your Reporting Period is Closed. Open the Reporting period and Try Again!");
 return $obj;
 }
 if(count($formvalues['indicator_idAll'])==0){
 $obj->alert("Filter out the Categories and Select Indicators For Setting/Editing LOP Targets");
 return $obj;
 }
 else
 
 for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
 
                                         $y="select w.workplan_id,i.indicator_id,i.indicator_code,i.indicator_name,i.unitofmeasure,i.typeofDisaggregation,i.disaggregation,
                                                 max(if((w.`target_year`='".$fyear."'),w.`male`,0)) as MaleYear1,
                                                 max(if((w.`target_year`='".$fyear."'),w.`female`,0)) as FemaleYear1,
                                                 max(if((w.`target_year`='".$fyear."'),w.`otherTargets`,0)) as OthersYear1,
                                                 sum(if((w.`target_year`='".$fyear."'),w.`Target`,0)) as Target
                                                 from tbl_indicator i left join  tbl_loptargets w
                                                 on(i.indicator_id=w.indicator_id) 
                                                 where i.indicator_id='".$formvalues['indicator_idAll'][$x]."'
                                                 group by i.indicator_id order by i.indicator_code asc";
   //$obj->alert($y);
                 $query2=@mysql_query($y)or die(http("ED-150"));
                 
                  
                   $inc=1;
                   $a=1;
                  while($rowTarget=@mysql_fetch_array($query2)){
 
                   $color=$inc%2==1?"evenrow3":"white1";
                   switch($rowTarget['disaggregation'])
                                 {
                                 case "Yes":
                                 
                                 
                                 $data.="<tr class=$color>
                         <td width='55' >".$rowTarget['indicator_code']."</td>
                         <td colspan='3'>
                         <input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id' />
                         <INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$rowTarget['typeofDisaggregation']."' >
                         <INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >".$rowTarget['indicator_name']."</td>
                         <td width='55' >".$rowTarget['unitofmeasure']."</td>
                         <td width='55' >".$rowTarget['typeofDisaggregation']."</td>";
                         
                 $data.="<td>
                 <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='male[]' onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,'target".$m."');return false;\"
                  type='text' value='".$rowTarget['MaleYear1']."' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
                 
                 <td><input name='female[]'  onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,'target".$m."');return false;\"
                 
                  type='text' value='".$rowTarget['FemaleYear1']."' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
                 
                 <td><input name='other[]' onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,'target".$m."');return false;\"
                 
                  class='evenrow' readonly='readonly' value='N/A' type='text'  id='other".$m."'
                  
                  onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,'target".$m."');return false;\"
                  
                   size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>";
                 
                 $data.="<td  align='right'><input name='target[]' type='text' id='target".$m."' size='20' onKeyPress=\"return numbersonly(event, false)\"   value='".$rowTarget['Target']."' readonly='readonly'
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,'target".$m."');return false;\"
                 
                 /></td>
                 "; 
         
                         $data.="</tr>";
                                 
                                 
                                 break;
                                 default:
                                 
         
                                 
                                 
                                 
                                 $data.="<tr class=$color>
                         <td width='55' >".$rowTarget['indicator_code']."</td>
                         <td colspan='3'>
                         <input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id' />
                         <INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$rowTarget['typeofDisaggregation']."' >
                         <INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >".$rowTarget['indicator_name']."											</td>
                         <td width='55' >".$rowTarget['unitofmeasure']."</td>
                         <td width='55' >".$rowTarget['typeofDisaggregation']."</td>
                         <td>
                 <input name='loopKey[]' type='hidden' value='1' id='loopKey' />
                 <input name='male[]'  type='text' class='evenrow' readonly='readonly' value='N/A' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,
                 getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td><input name='female[]'   type='text' class='evenrow' readonly='readonly' value='N/A'  id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" 
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,'target".$m."');return false;\"
                 
                 /></td>
                 
                 <td><input name='other[]'   type='text' value='".$rowTarget['OthersYear1']."' id='other".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"
                 
                 onKeyUp=\"xajax_calc_LOP(
                 getElementById('male".$m."').value,
                 getElementById('female".$m."').value,
                 getElementById('other".$m."').value,'target".$m."');return false;\"  /></td>";
                 
                 
                 
                 $data.="<td  align='right'><input name='target[]' type='text' id='target".$m."' size='20' onKeyPress=\"return numbersonly(event, false)\" onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,'target".$m."');return false;\"
                 
                   value='".$rowTarget['Target']."' readonly='readonly'/></td>
                 "; 
         
                         $data.="</tr>";
                                 
                                 
                                 
                                 
                                 
                                 break;
                                 }
                                   
                  $inc++;
                 
                 }
                  $m++; 
                   } 
         $data.="
                   <tr class='evenrow'>
   
             <td colspan='10' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_LOPTargetExtended(xajax.getFormValues('annualTarget'));\" /></td>
           </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function edit_LOPTargetBackup1($formvalues,$fyear){
 $obj=new xajaxResponse();
 
 if($fyear==NULL){
 $obj->alert("Select Project Year Editing/Entering Data For!");
 return $obj;
 }
 
 
 
 $n=1;
 $data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='800' border='0'>
 <tr>
        
         
               <th colspan='2' class='evenrow2' align='center'><center>Project Year:</center></th>
                           
                           <th colspan='8'><select name='fyear' id='fyear' class='combobox' ><option value=''>-select-</option>";
                                 $data.=QueryManager::FinancialYearFilter($fyear);
               $data.="</select></th>
              
             </tr>
          <tr>
        
         
               <th colspan='10' class='evenrow2' align='center'><center>Key Perfomance Indicator Life of Project Targets</center></th>
              
             </tr>
             <tr class=evenrow>
             <th width='25' class='dataRow'>Code</th>
               
                           <th width='' class='dataRow' colspan='3' >Indicator</th>
                           <th width='55' class='dataRow' align='right'>Unit of Measure</th>
                           <th width='55' class='dataRow' align='right'>disaggregation</th>
                           <th width='55' class='dataRow' align='right'>Male</th>
                           <th width='55' class='dataRow' align='right'>Female</th>
                           <th width='55' class='dataRow' align='right'>Other</th>
         
                           <th width='55' class='dataRow' align='right'>Total LOP Target</th>
                         
                           
              
             </tr>";
 //$obj->alert(count($formvalues['workplan_id']));
 //$obj->alert(count($formvalues['loopkey']));
 $m=1;
 if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
 $obj->alert("Your Reporting Period is Closed. Open the Reporting period and Try Again!");
 return $obj;
 }
 if(count($formvalues['indicator_idAll'])==0){
 $obj->alert("Filter out the Categories and Select Indicators For Setting/Editing LOP Targets");
 return $obj;
 }
 else
 
 for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
 
                                         $y="select w.workplan_id,w.Target,i.indicator_id,i.indicator_code,i.indicator_name,i.unitofmeasure,i.typeofDisaggregation,i.disaggregation,
                                                 max(if((w.`target_year`='".$fyear."'),w.`male`,0)) as MaleYear1,
                                                 max(if((w.`target_year`='".$fyear."'),w.`female`,0)) as FemaleYear1,
                                                 max(if((w.`target_year`='".$fyear."'),w.`otherTargets`,0)) as OthersYear1
                                                 from tbl_indicator i left join  tbl_loptargets w
                                                 on(i.indicator_id=w.indicator_id) 
                                                 where i.indicator_id='".$formvalues['indicator_idAll'][$x]."'
                                                 group by i.indicator_id order by i.indicator_code asc";
   $obj->alert($y);
                 $query2=@mysql_query($y)or die(http("ED-150"));
                 
                  
                   $inc=1;
                   $a=1;
                  while($rowTarget=@mysql_fetch_array($query2)){
 
                   $color=$inc%2==1?"evenrow3":"white1";
                   switch($rowTarget['disaggregation'])
                                 {
                                 case "Yes":
                                 
                                 
                                 $data.="<tr class=$color>
                         <td width='55' >".$rowTarget['indicator_code']."</td>
                         <td colspan='3'>
                         <input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id' />
                         <INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$rowTarget['typeofDisaggregation']."' >
                         <INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >".$rowTarget['indicator_name']."</td>
                         <td width='55' >".$rowTarget['unitofmeasure']."</td>
                         <td width='55' >".$rowTarget['typeofDisaggregation']."</td>";
                         
                 $data.="<td>
                 <input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
                 <input name='male[]' onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                  type='text' value='".$rowTarget['MaleYear1']."' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
                 
                 <td><input name='female[]'  oonKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  type='text' value='".$rowTarget['FemaleYear1']."' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
                 
                 <td><input name='other[]' oonKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  class='evenrow' readonly='readonly' value='N/A' type='text'  id='other".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>";
                 
                 $data.="<!--<td>
                 <input name='loopKey2[]' type='hidden' value='2' id='loopKey2' /> 
                 <input name='male2[]' onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  type='text' value='".$rowTarget['MaleYear2']."' id='male2".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
                 
                 <td><input name='female2[]'  onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  type='text' value='".$rowTarget['FemaleYear2']."' id='female2".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
                 
                 <td><input name='other2[]' oonKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  class='evenrow' readonly='readonly' value='N/A' type='text'  id='other2".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>";
                 
                 
                 $data.="<td>
                 <input name='loopKey3[]' type='hidden' value='3' id='loopKey3' /> 
                 <input name='male3[]' 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                 
                  type='text' value='".$rowTarget['MaleYear3']."' id='male3".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
                 
                 <td><input name='female3[]'  onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  type='text' value='".$rowTarget['FemaleYear3']."' id='female3".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
                 
                 <td><input name='other3[]' onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  class='evenrow' readonly='readonly' value='N/A' type='text'  id='other3".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>";
 
 $data.="<td>
                 <input name='loopKey4[]' type='hidden' value='4' id='loopKe4' /> 
                 <input name='male4[]' 
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                 
                  type='text' value='".$rowTarget['MaleYear4']."' id='male4".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
                 
                 <td><input name='female4[]' 
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  type='text' value='".$rowTarget['FemaleYear4']."' id='female4".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
                 
                 <td><input name='other4[]' onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  class='evenrow' readonly='readonly' value='N/A' type='text'  id='other4".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>-->";
 
                 
                 
                 
                 $data.="<td  align='right'><input name='target[]' type='text' id='target".$m."' size='20' onKeyPress=\"return numbersonly(event, false)\"   value='' readonly='readonly'
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                 /></td>
                 "; 
         
                         $data.="</tr>";
                                 
                                 
                                 break;
                                 default:
                                 
         
                                 
                                 
                                 
                                 $data.="<tr class=$color>
                         <td width='55' >".$rowTarget['indicator_code']."</td>
                         <td colspan='3'>
                         <input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id' />
                         <INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$rowTarget['typeofDisaggregation']."' >
                         <INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >".$rowTarget['indicator_name']."											</td>
                         <td width='55' >".$rowTarget['unitofmeasure']."</td>
                         <td width='55' >".$rowTarget['typeofDisaggregation']."</td>
                         <td>
                 <input name='loopKey[]' type='hidden' value='1' id='loopKey' />
                 <input name='male[]'  type='text' class='evenrow' readonly='readonly' value='N/A' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td><input name='female[]'   type='text' class='evenrow' readonly='readonly' value='N/A'  id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" 
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                 /></td>
                 
                 <td><input name='other[]'   type='text' value='".$rowTarget['OthersYear1']."' id='other".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"  /></td>";
                 
                 
                 $data.="<!--<td>
                 <input name='loopKey2[]' type='hidden' value='2' id='loopKey2' />
                 <input name='male2[]'  type='text' class='evenrow' readonly='readonly' value='N/A' id='male2".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td><input name='female2[]'   type='text' class='evenrow' readonly='readonly' value='N/A'  id='female2".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" 
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                 /></td>
                 
                 <td><input name='other2[]'   type='text' value='".$rowTarget['OthersYear2']."' id='other2".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"  /></td>";
                 
                 
                 
                 $data.="<td>
                 <input name='loopKey3[]' type='hidden' value='3' id='loopKey3' />
                 <input name='male3[]'  type='text' class='evenrow' readonly='readonly' value='N/A' id='male3".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td><input name='female3[]'   type='text' class='evenrow' readonly='readonly' value='N/A'  id='female3".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" 
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                 /></td>
                 
                 <td><input name='other3[]'   type='text' value='".$rowTarget['OthersYear3']."' id='other3".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"  /></td>";
                 
                 
                                 $data.="<td>
                 <input name='loopKey4[]' type='hidden' value='4' id='loopKey4' />
                 <input name='male4[]'  type='text' class='evenrow' readonly='readonly' value='N/A' id='male4".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                  /></td>
                 
                 <td><input name='female4[]'   type='text' class='evenrow' readonly='readonly' value='N/A'  id='female4".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" 
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                 /></td>
                 
                 <td><input name='other4[]'   type='text' value='".$rowTarget['OthersYear4']."' id='other4".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"
                 
                 onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"  /></td>-->";
                 
                 
                 
                 
                 
                 
                 $data.="<td  align='right'><input name='target[]' type='text' id='target".$m."' size='20' onKeyPress=\"return numbersonly(event, false)\" onKeyUp=\"xajax_calc_LOP(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value
                 ,getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value
                 ,getElementById('male3".$m."').value,getElementById('female3".$m."').value,getElementById('other3".$m."').value,
                 getElementById('male4".$m."').value,getElementById('female4".$m."').value,getElementById('other4".$m."').value,'target".$m."');return false;\"
                 
                   value='".$rowTarget['Target']."' readonly='readonly'/></td>
                 "; 
         
                         $data.="</tr>";
                                 
                                 
                                 
                                 
                                 
                                 break;
                                 }
                                   
                  $inc++;
                 
                 }
                  $m++; 
                   } 
         $data.="
                   <tr class='evenrow'>
   
             <td colspan='10' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_LOPTargetExtended(xajax.getFormValues('annualTarget'));\" /></td>
           </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_LOPTargetExtended($formvalues){
 $obj=new xajaxResponse();
 $fyear=$formvalues['fyear'];
 for($i=0;$i<count($formvalues['loopKey']);$i++){
 $indicator=$formvalues['indicator_id'][$i];
 
 $baseline=$formvalues['baselinevalue'][$i];
 $workplan_id=$formvalues['workplan_id'][$i];
 $typeofDisaggregation=$formvalues['typeofDisaggregation'][$i];
 $male=$formvalues['male'][$i];
 $female=$formvalues['female'][$i];
 $other=$formvalues['other'][$i];
 $total=$formvalues['target'][$i];
 
 if($total!=''){
 
                 switch($typeofDisaggregation)
                 {
                 case"None":
 $insert="INSERT INTO tbl_loptargets(indicator_id,otherTargets,Target,lastUpdatedby,target_year) 
 values('".$indicator."','".$other."','".$total."','".$_SESSION['username']."','".$fyear."')
 ON DUPLICATE KEY UPDATE period='5',otherTargets='".$other."',
 Target='".$total."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."',target_year='".$fyear."'";
                 break;
                 case "Male and Female":
                 $insert="INSERT INTO tbl_loptargets(indicator_id,male,female,otherTargets,Target,lastUpdatedby,target_year) 
 values('".$indicator."','".$male."','".$female."','".$other."','".$total."','".$_SESSION['username']."','".$fyear."')
 ON DUPLICATE KEY UPDATE period='5',male='".$male."',female='".$female."',otherTargets='".$other."',
 Target='".$total."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."',target_year='".$fyear."'";
                 
                 
                 break;
                 default:
                 
                         $insert="INSERT INTO tbl_loptargets(indicator_id,otherTargets,Target,lastUpdatedby,target_year) 
 values('".$indicator."','".$other."','".$total."','".$_SESSION['username']."','".$fyear."')
 ON DUPLICATE KEY UPDATE period='5',otherTargets='".$other."',
 Target='".$total."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."',target_year='".$fyear."'";
 
                 
                 //$obj->alert("The Type of Disaggregation of Your Indicators are unknown.Update Aborted!");
                 //return $obj;
                 }
 // WHERE workplan_id='".$workplan_id."'
 $query=@mysql_query($insert)or die(http("Edit-201"));
 
 //$obj->alert($insert);
 
 }
 
 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
 $obj->call("xajax_ViewLOPTargets",'','','','','',1,20);
 return $obj;
 }
 function edit_LOPTargetBackup($formvalues){
 $obj=new xajaxResponse();
 
 $n=1;
 $data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='0'   id='report'   width='100%' border='0'>
          <tr>
        
         
               <th colspan='11' class='evenrow2' align='center'><center>Key Perfomance Indicator Life of ASARECA Targets</center></th>
              
             </tr>
             <tr class=evenrow>
             <th width='25' class='dataRow'>indicator Code</th>
               
                           <th width='' class='dataRow' colspan='3' >Indicator</th>
                           <th width='55' class='dataRow' align='right'></th>";
                           
                                  $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
                                   for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
                         $data.="<td width='100' class='evenrow2' colspan='1' align='right'>".$n."</td>";
                 }
                           
                           $data.="</tr>";
                           //$obj->alert(count($formvalues['workplan_id']));
 //$obj->alert(count($formvalues['loopkey']));
 
 for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
 $indicator_id=$formvalues['indicator_idAll'][$x];
 $workplan_id=$formvalues['workplan_id'][$x];
 if($workplan_id<>NULL){
 $y="SELECT w.`workplan_id` , i.subcomponent_id, i.output_id, i.indicator_code, i.indicator_id, i.indicator_name, i.`unitofmeasure` , 
 w.Target AS TotalTarget, i.`display` ,  i.`indicator_type`,w.`period`, w.`baseline`, w.`target_year`, w.`Target`, w.`display`, w.`dateUpdated`, w.`lastUpdatedby`,
 
 max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."'),w.`Target`,0)) as Year1,
 max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."'),w.`Target`,0)) as Year2,
 max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."'),w.`Target`,0)) as Year3,
 max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."'),w.`Target`,0)) as Year4,
 max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."'),w.`Target`,0)) as Year5,
 sum( w.`Target` ) AS LOPTarget, w.`display`
 FROM tbl_indicator i
 LEFT JOIN `tbl_loptargets` w ON ( w.indicator_id = i.indicator_id )
 WHERE w.indicator_id='".$indicator_id."'
  GROUP BY w.indicator_id
 ORDER BY i.indicator_code ASC";
 }else {
 
 $y="SELECT w.`workplan_id` , i.subcomponent_id, i.output_id, i.indicator_code, i.indicator_id, i.indicator_name, i.`unitofmeasure` , 
 w.Target AS TotalTarget, i.`display` ,  i.`indicator_type`,w.`period`, w.`baseline`, w.`target_year`, w.`Target`, w.`display`, w.`dateUpdated`, w.`lastUpdatedby`,
 
 max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."'),w.`Target`,0)) as Year1,
 max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."'),w.`Target`,0)) as Year2,
 max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."'),w.`Target`,0)) as Year3,
 max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."'),w.`Target`,0)) as Year4,
 max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."'),w.`Target`,0)) as Year5,
 sum( w.`Target` ) AS LOPTarget, w.`display`
 FROM tbl_indicator i
 LEFT JOIN `tbl_loptargets` w ON ( w.indicator_id = i.indicator_id )
 WHERE i.indicator_id='".$indicator_id."'
  GROUP BY w.indicator_id
 ORDER BY i.indicator_id,i.indicator_code ASC";
 
 
 }
   //$obj->alert($y);
                 $query2=@mysql_query($y)or die(http("ED-150"));
                 
                  
                   $inc=1;
                   $a=1;
                  while($rowTarget=@mysql_fetch_array($query2)){
 
                   $color=$inc%2==1?"evenrow3":"white1";
   $data.="<tr class=".$color.">
  <td width='25' >".$rowTarget['indicator_code']."</td>
                         <td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >
                         <INPUT type='hidden' name='loopkey[]'  id='loopkey' value='1' >
                         <INPUT type='hidden' name='workplan_id[]'  id='workplan_id' value='".$rowTarget['workplan_id']."' >
                         ".$rowTarget['indicator_name']."</td>";
                         $data.="<td><INPUT type='text' name='qtr1[]' size='15'  id='qtr1".$a."'  onKeyPress='return numbersonly(event, false);' value='".$rowTarget['Year1']."' ></td>
                         <td><INPUT type='text' name='qtr2[]' size='15'  id='qtr2".$a."'  onKeyPress='return numbersonly(event, false);' value='".$rowTarget['Year2']."' ></td>
                         <td><INPUT type='text' name='qtr3[]' size='15' id='qtr3".$a."'  onKeyPress='return numbersonly(event, false);' value='".$rowTarget['Year3']."'></td>
                         <td><INPUT type='text' name='qtr4[]' size='15' id='qtr4".$a."' onKeyPress='return numbersonly(event, false);' value='".$rowTarget['Year4']."' ></td>
                         <td><INPUT type='text' name='qtr5[]' size='15' id='qtr5".$a."'  onKeyPress='return numbersonly(event, false);' value='".$rowTarget['Year5']."' ></td>";
                 
                 //$obj->alert($data1);
         //}
                 
                 //---------------end------------------	
                         $data.="</tr>";
             $a++;
                 }
                 
                   } 
         $data.="<tr class='evenrow'>
   
             <td colspan='11' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_LOPTargetExtended(xajax.getFormValues('annualTarget'));\" class='formButton2' /></td>
           </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_LOPTargetExtendedOLDBackup($formvalues){
 $obj=new xajaxResponse();
 /* for($i=0;$i<count($formvalues['loopKey']);$i++){
 $indicator=$formvalues['indicator_id'][$i];
 $baseline=$formvalues['baselinevalue'][$i];
 $workplan_id=$formvalues['workplan_id'][$i];
 $total=$formvalues['target'][$i];
 
 if(($total!='')){
 if($workplan_id==''){
 $insert="INSERT INTO tbl_loptargets(period,indicator_id,Target,lastUpdatedby) 
 values('5','".$indicator."','".$total."','".$_SESSION['username']."')ON DUPLICATE KEY UPDATE period='5',Target='".$total."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."'";
 // WHERE workplan_id='".$workplan_id."'
 $query=@mysql_query($insert)or die(http("Edit-201"));
 }
 else{
 $insert1="UPDATE tbl_loptargets set  period='5',Target='".$total."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."' where workplan_id='".$workplan_id."'";
 $query=@mysql_query($insert1)or die(http("Edit-201"));
 }
 #$obj->alert($insert);
 #$obj->alert($insert1);
 
 }else{} 
 
 
 } */
 
 
 
 
 for($i=0;$i<count($formvalues['loopkey']);$i++){
 $indicator=$formvalues['indicator_id'][$i];
 $workplan_id=$formvalues['workplan_id'][$i];
 $baseline=$formvalues['base'][$i];
 $qtr1=$formvalues['qtr1'][$i];
 $qtr2=$formvalues['qtr2'][$i];
 $qtr3=$formvalues['qtr3'][$i];
 $qtr4=$formvalues['qtr4'][$i];
 $qtr5=$formvalues['qtr5'][$i];
 
 $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
 
 
 
 if($workplan_id<>''){
 $sql="update tbl_loptargets set Target='".$qtr1."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."'";
 
 $query=@mysql_query($sql) or die(http("WP-42"));
 @mysql_query("update tbl_loptargets set Target='".$qtr2."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."'") or die(http("WP-42"));
 @mysql_query("update tbl_loptargets set Target='".$qtr3."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."'") or die(http("WP-42"));
 @mysql_query("update tbl_loptargets set Target='".$qtr4."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."'") or die(http("WP-42"));
 @mysql_query("update tbl_loptargets set Target='".$qtr5."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."'") or die(http("WP-42"));
 
 /* if(@mysql_num_rows($query)>0){
 
 
 $insert1="replace INTO tbl_loptargets(period,target_year,indicator_id,Target,lastUpdatedby,baseline) 
 values('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."','".$indicator."','".$qtr1."','".$_SESSION['username']."','".$baseline."'),
 ('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."','".$indicator."','".$qtr2."','".$_SESSION['username']."','".$baseline."'),
 ('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."','".$indicator."','".$qtr3."','".$_SESSION['username']."','".$baseline."'),
 ('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."','".$indicator."','".$qtr4."','".$_SESSION['username']."','".$baseline."'),
 ('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."','".$indicator."','".$qtr5."','".$_SESSION['username']."','".$baseline."')
 ";
 $query1=@mysql_query($insert1)or die(http("Save-59"));
 //$obj->alert($insert1);
  */}
 else {
 
 $insert2="INSERT INTO tbl_loptargets(period,target_year,indicator_id,Target,lastUpdatedby,baseline) 
 values('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."','".$indicator."','".$qtr1."','".$_SESSION['username']."','".$baseline."'),
 ('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."','".$indicator."','".$qtr2."','".$_SESSION['username']."','".$baseline."'),
 ('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."','".$indicator."','".$qtr3."','".$_SESSION['username']."','".$baseline."'),
 ('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."','".$indicator."','".$qtr4."','".$_SESSION['username']."','".$baseline."'),
 ('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."','".$indicator."','".$qtr5."','".$_SESSION['username']."','".$baseline."')
 ";
 $query2=@mysql_query($insert2)or die(http("Save-235"));
 
 //$obj->alert($insert2);
 }
 
 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
 $obj->call("xajax_ViewLOPTargets",'','','','','',1,20);
 return $obj;
 }
 function update_indicatorDefinition($formvalues){
 $obj=new xajaxResponse();
 
 for($i=0;$i<count($formvalues['defn_id']);$i++){
 
 $defn=mysql_real_escape_string($formvalues['definition'][$i]);
 $defn_id=trim($formvalues['defn_id'][$i]);
 $output=trim($formvalues['output'][$i]);
 $definition=trim($formvalues['definition'][$i]);
 
 
 $xx="update tbl_indicator_definition
  set DefName = '".$definition."',
  expected_output='".$output."'
  where defn_id='".$defn_id."'";
  //$obj->alert($xx);
 @mysql_query($xx)or die(http("ED-097"));
 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Data updated!"));
 $obj->call("xajax_view_indicatorDefintion",'','','','','',1,20);
 return $obj;
 }
 function edit_supergoal($formvalues){
 $obj=new xajaxResponse();
 $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='557' border='0'>
         <tr>
           <td colspan='4' class='black'><div align='center' class='green_field'>
             <div align='left'>Setup &raquo; Editing Programme</div>
          <div style='float:right;'><input type='button'  id='button' name='back' title='back' value='Back' onclick=\"xajax_view_programme('','');return false;\"></div></td>
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
                 <td><INPUT TYPE='hidden' name='prog_id[]' id='prog_id' value='".$row['prog_id']."'><input name='pname[]' type='text' id='pname' value='$row[program_name]' size='50' /></td>
               </tr>
               <tr>
                 <td>Funder:</td>
                 <td><input name='pfunder[]' type='text'  id='pfunder' value='$row[Funder]' size='50' /></td>
               </tr>
                           <tr>
                 <td>Implementing Organization:</td>
                 <td><input name='imp_org[]' type='text'  id='imp_org' value='$row[imp_org]' size='50' /></td>
               </tr>
               <tr>
                 <td>Description:</td>
                 <td><textarea name='pdescription[]' id='pdescription' cols='48' rows='3'>$row[details]</textarea></td>
               </tr>
              ";
             
 
                    }
                    }
                   
                    $data.=" <tr>
                 <td>&nbsp;</td>
                 <td align=right><input type='button'  id='button' name='button' id='button' value='Save' class='button_width' onclick=\"xajax_update_programme(xajax.getFormValues('programme'));\"></td>
               </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 
 
 }
 function update_supergoal($formvalues){
 $obj=new xajaxResponse();
 
 for($i=0;$i<count($formvalues['prog_id']);$i++){
 $prog_id=$formvalues['prog_id'][$i];
 $pname=$formvalues['pname'][$i];
 $pfunder=$formvalues['pfunder'][$i];
 $imp_org=$formvalues['imp_org'][$i];
 $pdesc=$formvalues['pdescription'][$i];
 $x1="select * from tbl_programme where prog_id='".$prog_id."'";
 
 $select=@mysql_query($x1)or die(http("ED-192"));
 #$obj->addAlert($x);
 if(mysql_num_rows($select)>0){
 $x="update tbl_programme set program_name='".$pname."',Funder='".$pfunder."',imp_org='".$imp_org."',details='".$pdesc."' where prog_id='".$prog_id."'";
 @mysql_query($x) or die(http("ED-0159"));
 
 //$xrow=mysql_fetch_array(mysql_query($x1))or die(http("ED-188"));
 //audit info----
 //$table_pk_id='id';
 $ch=mysql_fetch_array(mysql_query("SELECT concat_ws( prog_id, program_name,Funder,details ) as changed_from
 FROM `tbl_programme`
 WHERE prog_id ='".$prog_id."'")) or die(http("ED-0183"));
 $changed_from=$ch['changed_from'];
 $changed_to=$prog_id."-".$pname."-".$imp_org."-".$pdesc;
 $obj->addEvent('','onsubmit',audit_trail("prog_id",$prog_id,$$x,"tbl_programme",$changed_from,$changed_to));
 
 //---------end of audit info---
 }}
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated"));
 $obj->call("xajax_view_supergoal",'','');
 return $obj;
 }
 function edit_subcomponent($formvalues){
 $obj=new xajaxResponse();
 $data="<form method=post name='subcomponent' id='subcomponent'><table border='0'><tr >
                       <td colspan='3'><div id='status'></div></td>
                     </tr>
                                         <tr>
                                          <th>NO</th> 
                       <th>PROGRAM</th> <th>SUB-PROGRAM CODE</th> <th>SUB-PROGRAM</th>
                     </tr>";
  for($m=0;$m<count($formvalues['subcomponent_id']);$m++){
  $id=$formvalues['subcomponent_id'][$m];
  $x="select * from tbl_subcomponent where subcomponent_id='".$id."'";
  #$obj->addAlert($x);'
  $n=1;
 $q=mysql_query($x)or die(http("ED-0014"));
 while($row=mysql_fetch_array($q)){
 $color=($n%2==1)?"evenrow3":"white1";
                                         $data.=" 
                     <tr class='$color'>
                    <td>".$n."</td>
                       <td><input type='hidden' name='subcomponent_id[]' id='subcomponent_id' value='".$row['subcomponent_id']."'><select name='programme[]' id='programme'>";
                                           $query=mysql_query("select * from tbl_programme order by program_name asc")or die(http("ED-024"));
                                          while($rowp=mysql_fetch_array($query)){
                                          $selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
                                            $data.="<option value=\"".$rowp['prog_id']."\" ".$selected.">".$rowp['program_name']."</option>";
                                 
                                            }
 $data.="  </select></td>
 <td><input name='subcomponent_code[]' type='text' id='subcomponent_code' value='".$row['subcomponent_code']."' size=40></td> <td><label>
                  
                       <textarea name='subcomponent_name[]' id='subcomponent_name' cols='45' rows='3'>".$row['subcomponent']."</textarea>
                                           </td>
                     </tr>
     
     <tr>";
  $n++;
                                         }
                                   }
          $data.="<tr class='evenrow'>
 
             
                       
           
                       <td height='103' COLSPAN=4 ALIGN='right'><input name='back'  value='Cancel' class='button_width' onclick=\"xajax_view_subcomponent('','','','')\" type='button'  id='button' /> | <input type='button'  id='button' name='save_subcomponent' class='button_width' id=save_subcomponent value=Save onclick=\"xajax_update_subcomponent(xajax.getFormValues('subcomponent'))\"></td>
                     </tr>
                   </table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_subcomponent($formvalues){
 $obj=new xajaxResponse();
  for($m=0;$m<count($formvalues['subcomponent_id']);$m++){
  $subcomponent_id=$formvalues['subcomponent_id'][$m];
 
 $x="select * from tbl_subcomponent where subcomponent_id='".$subcomponent_id."'";
 $s=@mysql_query($x)or die(mysql_error());
 $programme=$formvalues['programme'][$m];
 $scname=$formvalues['subcomponent_name'][$m];
 $code=$formvalues['subcomponent_code'][$m];
 
 if(@mysql_num_rows($s)>0){
 $sql="update tbl_subcomponent 
 set prog_id='$programme',subcomponent_code='$code',subcomponent='$scname'
  where subcomponent_id='".$subcomponent_id."'";
 //$obj->addAlert($x);
 @mysql_query($sql)or die(mysql_error());
 
 
 //audit info----
 //$table_pk_id='id';
 $c=mysql_fetch_array(mysql_query("SELECT concat_ws( subcomponent_code, prog_id, subcomponent ) as changed_from
 FROM `tbl_subcomponent`
 WHERE subcomponent_id ='".$subcomponent_id."'")) or die(http("ED-080"));
 $changed_from=$c['changed_from'];
 $changed_to=$programme."-".$code."-".$scname;
 $obj->addEvent('','onsubmit',audit_trail("subcomponent_id",$subcomponent_id,$sql,"tbl_subcomponent",$changed_from,$changed_to));
 
 //---------end of audit info---
 
 
 
 }
 }
 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated"));
 $obj->call("xajax_view_subcomponent",'','','','');
 return $obj;
 }
 function edit_programmeAll($formvalues){
 $obj=new xajaxResponse();
 $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='100%' border='0'>
         <tr>
           <td colspan='4' class='black'><div align='center' class='green_field'>
             <div align='left'>Setup &raquo; Editing Programme</div>
          <div style='float:right;'><input type='button'  id='button' name='back' title='back' value='Back' onclick=\"xajax_view_programme('','');return false;\"></div></td>
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
                 <td>Program Code:</td>
                 <td><input name='pcode[]' type='text' id='pcode' value='".$row['program_code']."' size='80' /></td>
               </tr>
               <tr>
                 <td>Program Name:</td>
                 <td><INPUT TYPE='hidden' name='prog_id[]' id='prog_id' value='".$row['prog_id']."'><input name='pname[]' type='text' id='pname' value='$row[program_name]' size='80' /></td>
               </tr>
                 
                             <tr>
                 <td>Funder:</td>
                 <td><select name='pfunder[]'   id='pfunder' class='combobox'>".funct_dropDownSelected('tbl_funder', 'funder_name', 'funder_id', 'funder_id',"".$row['Funder']."")."</select></td>
               </tr>
                            <tr>
                 <td>Implementing Organization:</td>
                 <td><select name='organization[]'   id='organization' class='combobox'>".funct_dropDownSelected('tbl_organization', 'orgName', 'org_code', 'org_code',"".$row['imp_org']."")."</select></td>
               </tr>
               
               <tr>
                 <td>Description:</td>
                 <td><textarea name='pdescription[]' id='pdescription' cols='80' rows='3'>$row[details]</textarea></td>
               </tr>
              ";
             
 
                    }
                    }
                   
                    $data.=" <tr>
                 <td>&nbsp;</td>
                 <td align=right><input type='button'  id='button' name='button' id='button' value='Save' class='button_width' onclick=\"xajax_update_programme(xajax.getFormValues('programme'));\"></td>
               </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 
 
 }
 function update_programme($formvalues){
 $obj=new xajaxResponse();
 
 for($i=0;$i<count($formvalues['prog_id']);$i++){
 $prog_id=$formvalues['prog_id'][$i];
 $pcode=$formvalues['pcode'][$i];
 $pname=$formvalues['pname'][$i];
 $pfunder=$formvalues['pfunder'][$i];
 $imp_org=$formvalues['organization'][$i];
 $pdesc=$formvalues['pdescription'][$i];
 $x1="select * from tbl_programme where prog_id='".$prog_id."'";
 
 $select=@mysql_query($x1)or die(http("ED-192"));
 #$obj->addAlert($x);
 if(mysql_num_rows($select)>0){
 $x="update tbl_programme set program_name='".$pname."',program_code='".$pcode."',Funder='".$pfunder."',imp_org='".$imp_org."',details='".$pdesc."' where prog_id='".$prog_id."'";
 @mysql_query($x) or die(http("ED-0159"));
 
 //$xrow=mysql_fetch_array(mysql_query($x1))or die(http("ED-188"));
 //audit info----
 //$table_pk_id='id';
 $ch=mysql_fetch_array(mysql_query("SELECT concat_ws( prog_id, program_name,Funder,details ) as changed_from
 FROM `tbl_programme`
 WHERE prog_id ='".$prog_id."'")) or die(http("ED-0183"));
 $changed_from=$ch['changed_from'];
 $changed_to=$prog_id."-".$pname."-".$imp_org."-".$pdesc;
 $obj->addEvent('','onsubmit',audit_trail("prog_id",$prog_id,$$x,"tbl_programme",$changed_from,$changed_to));
 
 //---------end of audit info---
 }}
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated"));
 $obj->call("xajax_view_programme",'','');
 return $obj;
 }
 function edit_goal($formvalues){
 $obj=new xajaxResponse();
 $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='100%' border='0'>
         <tr>
           <td colspan='4' class='black'><div align='center' class='green_field'>
             <div align='left'>Setup &raquo; Editing Goal</div>
          <div style='float:right;'><input type='button'  id='button' name='back' title='back' value='Back' onclick=\"history.back();return false;\"></div></td>
         </tr>";
 for($m=0;$m<count($formvalues['id']);$m++){
 $goal_id=$formvalues['id'][$m];
 
 $x="select * from tbl_goal where id='".$goal_id."' order by id asc";
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
                 <td>Program:</td>
                 <td><input type='hidden' value='".$row['id']."' name='id[]' id='id' >
                                 <select name='prog_id[]'   id='prog_id' class='combobox'>".funct_dropDownSelected('tbl_programme', 'program_name', 'prog_id', 'prog_id',"".$row['prog_id']."")."</select></td>
               </tr>
                 
                             <tr>
                
               
               <tr>
                 <td>Goal:</td>
                 <td><textarea name='goal[]' id='goal' cols='80' rows='3'>$row[component]</textarea></td>
               </tr>
                            <tr>
                 <td>Description:</td>
                 <td><textarea name='description[]' id='description' cols='80' rows='3'>$row[description]</textarea></td>
               </tr>
              ";
             
 
                    }
                    }
                   
                    $data.=" <tr>
                 <td>&nbsp;</td>
                 <td align=right><input type='button'  id='button' name='button' id='button' value='Save' class='button_width' onclick=\"xajax_update_goal(xajax.getFormValues('programme'));\"></td>
               </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 
 
 }
 function update_goal($formvalues){
 $obj=new xajaxResponse();
 
 for($i=0;$i<count($formvalues['id']);$i++){
 $prog_id=$formvalues['prog_id'][$i];
 $goal=$formvalues['goal'][$i];
 $id=$formvalues['id'][$i];
 $desc=$formvalues['description'][$i];
 $x1="select * from tbl_goal where id='".$id."'";
 
 $select=@mysql_query($x1)or die(http("ED-192"));
 //$obj->alert($x1);
 if(mysql_num_rows($select)>0){
 $x="update tbl_goal set prog_id='".$prog_id."',component='".$goal."',description='".$desc."',updatedby='".$_SESSION['username']."' where id='".$id."'";
 @mysql_query($x) or die(http("ED-0159"));
 
 //$xrow=mysql_fetch_array(mysql_query($x1))or die(http("ED-188"));
 //audit info----
 //$table_pk_id='id';
 $ch=mysql_fetch_array(mysql_query("SELECT concat_ws( id,prog_id, component,updatedby,description ) as changed_from
 FROM `tbl_goal`
 WHERE id ='".$id."'")) or die(http("ED-603"));
 $changed_from=$ch['changed_from'];
 $changed_to=$id."-".$prog_id."-".$goal."-".$desc;
 $obj->addEvent('','onsubmit',audit_trail("id",$prog_id,$x,"tbl_goal",$changed_from,$changed_to));
 
 //---------end of audit info---
 }}
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated"));
 $obj->call("xajax_view_goal",'','','','','','');
 return $obj;
 }
 function edit_purpose($formvalues){
 $obj=new xajaxResponse();
 $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='100%' border='0'>
         <tr>
           <td colspan='4' class='black'><div align='center' class='green_field'>
             <div align='left'>Systems Setup &raquo; Editing Purpose</div>
          <div style='float:right;'><input type='button'  id='button' name='back' title='back' value='Back' onclick=\"history.back();return false;\"></div></td>
         </tr>";
 for($m=0;$m<count($formvalues['id']);$m++){
 $purpose_id=$formvalues['id'][$m];
 
 $x="select * from tbl_purpose where id='".$purpose_id."' order by id asc";
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
                 <td>Program:</td>
                 <td><input type='hidden' value='".$row['id']."' name='id[]' id='id' >
                                 <select name='prog_id[]'   id='prog_id' class='combobox'>".funct_dropDownSelected('tbl_programme', 'program_name', 'prog_id', 'prog_id',"".$row['prog_id']."")."</select></td>
               </tr>
                 
                             <tr>
                <tr>
                 <td>Code:</td>
                 <td><input type='text' value='".$row['component_code']."' name='component_code[]' id='component_code' size='80' ></td>
               </tr>
               
               <tr>
                 <td>Purpose:</td>
                 <td><textarea name='purpose[]' id='purpose' cols='80' rows='3'>$row[component]</textarea></td>
               </tr>
                            <tr>
                 <td>Description:</td>
                 <td><textarea name='description[]' id='description' cols='80' rows='3'>$row[description]</textarea></td>
               </tr>
              ";
             
 
                    }
                    }
                   
                    $data.=" <tr>
                 <td>&nbsp;</td>
                 <td align=right><input type='button'  id='button' name='button' id='button' value='Save' class='button_width' onclick=\"xajax_update_purpose(xajax.getFormValues('programme'));\"></td>
               </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 
 
 }
 function update_purpose($formvalues){
 $obj=new xajaxResponse();
 
 for($i=0;$i<count($formvalues['id']);$i++){
                 $prog_id=$formvalues['prog_id'][$i];
                 $code=$formvalues['component_code'][$i];
                 $purpose=$formvalues['purpose'][$i];
                 $id=$formvalues['id'][$i];
                 $desc=$formvalues['description'][$i];
                 $x1="select * from tbl_purpose where id='".$id."'";
 
 $select=@mysql_query($x1)or die(http("ED-192"));
 //$obj->alert($x1);
 if(mysql_num_rows($select)>0){
 $x="update tbl_purpose set prog_id='".$prog_id."',component='".$purpose."',description='".$desc."',updatedby='".$_SESSION['username']."',component_code='".$code."' where id='".$id."'";
 @mysql_query($x) or die(http("ED-0159"));
 
 //$xrow=mysql_fetch_array(mysql_query($x1))or die(http("ED-188"));
 //audit info----
 //$table_pk_id='id';
 $ch=@mysql_fetch_array(mysql_query("SELECT concat_ws( id,prog_id,component_code,component,updatedby,description ) as changed_from
 FROM `tbl_purpose`
 WHERE id ='".$id."'")) or die(http("ED-708"));
 $changed_from=$ch['changed_from'];
 $changed_to=$id."-".$prog_id."-".$goal."-".$desc;
 $obj->addEvent('','onsubmit',audit_trail("id",$prog_id,$x,"tbl_purpose",$changed_from,$changed_to));
 
 //---------end of audit info---
 }}
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated"));
 $obj->call("xajax_view_purpose",'','','','','','');
 return $obj;
 }
 function edit_output($formvalues){
 $obj=new xajaxResponse();
 $data="<form name='output' id='output' method=post><table border='0'>";
  for($m=0;$m<count($formvalues['output_id']);$m++){
  $output_id=$formvalues['output_id'][$m];
 
 $q=mysql_query("select * from tbl_output where output_id='".$output_id."'")or die(mysql_error());
 while($row=mysql_fetch_array($q)){
 $data.="<tr
     <td colspan='2'><hr/></td></tr>
   <tr>
    <tr>
     <td colspan='2'><hr></td></tr>
   <tr>
     <td colspan='2'><div id='status'></td></tr>
         <tr>
                 <td>Progrmme:</td>
                 <td><select name='prog_id' id='prog_id' class='combobox2'  onchange=\"xajax_add_output('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."',this.value,'','','',''); return false;\" >";
                                           $querytyp=mysql_query("select * from tbl_programme  order by prog_id asc")or die(http("VP-2012"));
                                         while($rowtyp=mysql_fetch_array($querytyp)){
                                         $seltype=($row['prog_id']==$rowtyp['prog_id'])?"SELECTED":"";
                                         $data.="<option value=\"".$rowtyp['prog_id']."\" ".$seltype." >".$rowtyp['prog_id']." ".$rowtyp['program_name']."</option>";
                                         
                                         } 
     $data.="</select></td>
               </tr>
                 <tr>
                 <td>Outcome:</td>
                 <td><select name='outcome' id='outcome' class='combobox2' ><option value=''>-select-</option>";
                                           $querytype=mysql_query("select * from tbl_subcomponent  order by 1 asc")or die(http("VP-2023"));
                                         while($rowtype=mysql_fetch_array($querytype)){
                                         $seltype=($row['subprog_id']==$rowtype['subcomponent_id'])?"SELECTED":"";
                                         $data.="<option value=\"".$rowtype['subcomponent_id']."\" ".$seltype." >".$rowtype['subcomponent']."</option>";
                                         
                                         } 
     $data.="</select></td>
               </tr>
   <tr>
     <td>Output Code</td>
     <td><input type='hidden' name='output_id[]' id='output_id' size='50' value='".$row['output_id']."' /><input type='text' name='output_code[]' id='output_code' size='50' value='".$row['output_code']."' />";
         
         $data.="</td>
   </tr>
   <tr>
     <td>Output Name </td>
     <td><label>
       <input name='oname[]' type='text' id='oname' size='50' value='".$row['output_name']."'/>
     </label></td>
   </tr>"; }
 } $data.="<tr>
     <td>&nbsp;</td>
     <td><div align='right'>
       <p>
         <input type='button'  id='button' name='output' id='output' value='Save' onclick=\"xajax_update_output(xajax.getFormValues('output'))\">
         </p>
       </div></td>
   </tr>
 </table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_output($formvalues){
 $obj=new xajaxResponse();
  for($m=0;$m<count($formvalues['output_id']);$m++){
  $output_id=$formvalues['output_id'][$m];
 
 $prog_id=$formvalues['prog_id'];
 $ocomponent=$formvalues['ocomponent'][$m];
 $subcomponent=$formvalues['outcome'][$m];
 $output_code=$formvalues['output_code'][$m];
 $oname=$formvalues['oname'][$m];
 $details=$formvalues['odesc'][$m];
 
 if($oname==""){
 $obj->assign("status","innerHTML",errorMsg("<li>Enter Output Name</li>"));
 return $obj;
 }
 $q=mysql_query("select * from tbl_output where output_id='".$output_id."'")or die(http("ED-296"));
 if(mysql_num_rows($q)>0){
 $query="update tbl_output set prog_id='".$prog_id."',
 subprog_id='".$subcomponent."',
 output_code='".mysql_real_escape_string($output_code)."',
 output_name='".mysql_real_escape_string($oname)."'
  where output_id='".$output_id."'";
 #$obj->addAlert($query);
 @mysql_query($query)or die(http("ED-0304"));
 
 
 //=========audit trail info===================
 $ch=mysql_fetch_array(mysql_query("SELECT concat_ws( output_id, output_code, output_name,prog_id) as changed_from
 FROM `tbl_output`
 WHERE output_id ='".$output_id."'")) or die(http("ED-0183"));
 $changed_from=$ch['changed_from'];
 $changed_to=$output_id."-".$output_code."-".$oname."-".$prog_id;
 $obj->addEvent('','onsubmit',audit_trail("output_id",$output_id,$$x,"tbl_output",$changed_from,$changed_to));
 
 //---------end of audit info---
 }
 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
 $obj->call("xajax_view_output",'','','','','');
 return $obj;
 }
 function edit_indicator($formvalues){
 $obj=new xajaxResponse();
  
 $data.="<form name='indicator13' id='indicator13' action='".$PHP_SELF."'><table >";
 
 for($i=0;$i<count($formvalues['indicator_id']);$i++){
 $sel="select * from tbl_indicator where indicator_id='".$formvalues['indicator_id'][$i]."'";
 //$obj->alert($sel);
 $queryedit=mysql_query($sel)or die(http("ED-0301"));
 while($rowedit=mysql_fetch_array($queryedit)){
 
 //onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_code']."','".$_SESSION['subprogram_code']."',this.value,'".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\"
                                         $data.="
                                         <tr class=''>
                       <td colspan=2><hr/></td></tr>
                                         <tr class=''>
                       <td width='200'>Programme</td>
                       <td>";
 //onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'".$_SESSION['subprogram_code']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\"
                                         $data.="<select name='prog_id[]' id='prog_id' class='combobox2'    ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
                                           $queryp=mysql_query("select * from tbl_programme  order by prog_id,program_name")or die(http("VP-1874"));
                                          if($_SESSION['program_code']==''){
                                          while($rowp=mysql_fetch_array($queryp)){
                                          $selectedp=$rowp['prog_id']==$rowedit['prog_id']?"SELECTED":""; 
                                            $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['prog_id']." ".$rowp['program_name']."</option>";
                                 
                                            }
                                               
                                                   }else 
                                                   while($rowp=mysql_fetch_array($queryp)){
                                          $selectedp=$rowp['prog_id']==$rowedit['prog_id']?"SELECTED":""; 
                                            $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['prog_id']." ".$rowp['program_name']."</option>";
                                 
                                            }
                                               //onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_code']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\"
                                           $data.="</select></td>
                     </tr>
         <tr class=''>
                       <td>Type of Indicator</td>
                       <td><select name='type_ofindicator[]'  id='type_ofindicator' class='combobox2' />
                                           <option value=''>-SELECT-</option>
                                            <OPTION VALUE='N/A'>-N/A-</OPTION>";
                                            $queryt=mysql_query("select * from tbl_lookup where classCode='11' order by codeName asc ")or die(http("VP-2284"));	
                                            while($rowt=mysql_fetch_array($queryt)){
                                                 $selected2=($rowt['codeName']==$rowedit['indicator_type'])?"SELECTED":"";
                                         $data.="<option value=\"".$rowt['codeName']."\" ".$selected2.">".$rowt['codeName']."</option>";
                                            }	
                                            
                                           $data.=" </select></td>
                     </tr >
                                         <tr class=''>
                       <td>Outcome</td>
                       <td><select name='sub_component[]' id='sub_component' class='combobox2'      ><OPTION VALUE=''>-SELECT-</OPTION>";
                                           //and prog_id='".$_SESSION['program_code']."'
         $sql="select * from tbl_subcomponent order by  subcomponent_code asc";
                 $queryst=mysql_query($sql)or die(http("VP-1887"));	
                                 while($rowst=mysql_fetch_array($queryst)){
                                            $selectedsp=$rowst['subcomponent_id']==$rowedit['subcomponent_id']?"SELECTED":"";
                                            $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".$rowst['subcomponent_code']."  ".$rowst['subcomponent']."</option>";
                                            }   
                                 $data.="</select></td>
                     </tr>
                         <tr class=''>
                       <td width='200'>Output</td>
                       <td>";
                                                 $data.="<select name='output_id[]' id='output_id' class='combobox2'    >
                                                 <OPTION VALUE=''>-SELECT-</OPTION>
                                                 <OPTION VALUE=''>-N/A-</OPTION>";
                                           $queryout=mysql_query("select * from tbl_output order by output_code")or die(http("VP-1320"));
                                          while($rowout=mysql_fetch_array($queryout)){
                                          $selectedout=$rowout['output_id']==$rowedit['output_id']?"SELECTED":"";
                                            $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".$rowout['output_code']."  ".$rowout['output_name']."</option>";
                                 
                                            }
                                               
                                           $data.="</select></td>
                     </tr>";
                                 
                                           $data.="<tr class=''>
   <td scope='col'>Indicator Code </td>
     <td> <input name='indicator_id[]' id='indicator_id' type='hidden' value='".$rowedit['indicator_id']."' /><input name='indicator_code[]' type='text' id='indicator_code' size='50' value='".$rowedit['indicator_code']."' /></td>
 </tr>
     <tr><td>Indicator Name:</td><td><textarea name='indicator[]' class='combobox2' type='text' id='indicator1' cols='45' rows='3' >".$rowedit['indicator_name']."</textarea></td></tr>";
 
         $data.="<tr><td>Gender Disaggregation:</td><td><select name='gender1[]' class='combobox2' ><option value=''>-select-</option>";
 $SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("ED-390"));
 while($rowg=mysql_fetch_array($SEL)){
 $sel=($rowg['codeName']==$rowedit['disaggregation'])?"SELECTED":"";
         $data.="<option value=\"".$rowg['codeName']."\" ".$sel."/>".$rowg['codeName']."</option>";
         }
         
         $data.="</select></td></tr>
         <tr class=''><td>Type of Disaggregation:</td><td><select name='typeofdisaggregation[]' class='combobox2' ><option value='' />-select-</option>";
         $q=mysql_query("select * from  tbl_lookup where classCode like '17' order by codeName asc")or die(http("ED-400"));
         while($row13=mysql_fetch_array($q)){
         $sel=($row13['codeName']==$rowedit['typeofDisaggregation'])?"SELECTED":"";
         $data.="<option value=\"".$row13['codeName']."\" ".$sel."/>".$row13['codeName']."</option>";
         
         }
         $data.="</select> </td></tr>
         <tr class=''>
   <td>Unit of Measure:</td><td><select name='unitofmeasure[]' id='unitofmeasure' class='combobox2' ><option value=''>-Select-</option>";
         $q=mysql_query("select * from  tbl_lookup where classCode='10' order by codeName asc")or die(http("VP-1957"));
         while($row13=mysql_fetch_array($q)){
         $sel=($row13['codeName']==$rowedit['unitofmeasure'])?"SELECTED":"";
         $data.="<option value=\"".$row13['codeName']."\" ".$sel."/>".$row13['codeName']."</option>";
         
         }
         $data.="</select> </td></tr>
  
   <tr class=''><td>Responsible</td><td><select name='reponsible[]' class='combobox2' ><option value='Managers' />Managers</option>";
         $q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("ED-400"));
         while($row13=mysql_fetch_array($q)){
         $sel=($row13['group_name']==$rowedit['responsible'])?"SELECTED":"";
         $data.="<option value=\"".$row13['group_name']."\" ".$sel."/>".$row13['group_name']."</option>";
         
         }
         $data.="</select> </td></tr>
         <tr><td>Expected Output</td><td><select name='output[]' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
         $q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("ED-400"));
         while($row13=mysql_fetch_array($q)){
         $selo=($rowo['codeName']==$rowedit['expected_output'])?"SELECTED":"";
         $data.="<option value=\"".$rowo['codeName']."\" ".$selo."/>".$row13['codeName']."</option>";
         
         }
         $data.="</select>  </td></tr>
            <tr class=''>
          <td>Frequency of Reporting</td><td><select name='frequency[]' class='combobox2' ><option value='' >-Select-</option>";
         $q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
         while($row14=mysql_fetch_array($q4)){
         $sel14=($row14['codeName']==$rowedit['frequency_of_reporting'])?"SELECTED":"";
         $data.="<option value=\"".$row14['codeName']."\" ".$sel14."/>".$row14['codeName']."</option>";
         
         }
         $data.="</select> </td></tr>";
                         
                         
                         }
         }
                          $data.="
                          
                          <tr class=''>
                       <td colspan=2><div id='status'></div></td></tr>
                          <tr class=''>
                 <td width='165'>&nbsp;</td>
                <td width='69' ALIGN='right'><button  name='save_indicator' type='button'  id='button' id='save_indicator' value='Save' class='button_width' onclick=\"xajax_update_indicator(xajax.getFormValues('indicator13'));\" />Save</button></td>
             
               </tr>
              
     </table>";$data.="</form>";		 
 //$obj->addAlert($data);
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_indicator($formvalues){
 $obj=new xajaxResponse();
 
 
 for($i=0;$i<count($formvalues['indicator_id']);$i++){
 $target=mysql_real_escape_string($formvalues['target'][$i]);
 $prog_id=$formvalues['prog_id'][$i];
 //$obj->alert($prog_id);
 $typeofdisaggregation=trim($formvalues['typeofdisaggregation'][$i]);
 $unitofmeasure=trim($formvalues['unitofmeasure'][$i]);
 $goal_id=trim($formvalues['goal'][$i]);
 $subcomponent=$formvalues['sub_component'][$i];
 $output_id=trim($formvalues['output_id'][$i]);
 $typeofindicator=trim($formvalues['type_ofindicator'][$i]);
 $Level_ofindicator=trim($formvalues['Level_ofindicator'][$i]);
 $responsible=trim($formvalues['reponsible'][$i]);
 $expected_output=trim($formvalues['output'][$i]);
 $indicator_id=$formvalues['indicator_id'][$i];
 $indicator_code=trim($formvalues['indicator_code'][$i]);
 $indicator=$formvalues['indicator'][$i];
 $gender=$formvalues['gender1'][$i];
 $frequency_of_reporting=$formvalues['frequency'][$i];
 
  /* if(mysql_num_rows(mysql_query("select * from tbl_indicator where indicator_code='".$indicator_code."' and prog_id='".$prog_id."' "))>0){
 $obj->alert("Process Halted! Indicator Code ".$indicator_code." Already Exists");
 return $obj;} */
  
  
 $xx="update tbl_indicator
  set unitofmeasure = '".mysql_real_escape_string($unitofmeasure)."',
  typeofDisaggregation='".mysql_real_escape_string($typeofdisaggregation)."',prog_id = '".$prog_id."',
  purpose_id='".$component."',
  subcomponent_id='".$subcomponent."',
  output_id='".$output_id."'
  ,indicator_name='".mysql_real_escape_string($indicator)."',
  indicator_code='".mysql_real_escape_string($indicator_code)."',
  disaggregation='".mysql_real_escape_string($gender)."',
  indicator_type='".mysql_real_escape_string($typeofindicator)."'
  ,responsible='".mysql_real_escape_string($responsible)."',
  expected_output='".mysql_real_escape_string($expected_output)."',
  level_ofindicator='".mysql_real_escape_string($Level_ofindicator)."'
  ,frequency_of_reporting='".$frequency_of_reporting."'
   where indicator_id='".$indicator_id."'";
 //$obj->alert($xx);
 @mysql_query($xx)or die(http("ED-464"));
 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
 $obj->call("xajax_view_indicator",'','','','','',1,20);
 return $obj;
 }
 function edit_TSOqualitativeReporting2($narrative_id,$semi_annual,$div,$org_code){
 $obj= new xajaxResponse();
 $n=1;
 
  if($_SESSION['username']==''){
 $obj->redirect("index.php");
         return $obj;
 
 }
 //$narrative_id=1;$project_id=1;$semi_annual='Jan - Jun';$year='2012';
 
 $data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'>
 <table width='100%' border='0'><TR><td colspan=2><hr ></td></TR>
           <TR><td colspan=2><div id='status'></div></td></TR>
           <tr>
           <td>&nbsp;</td>
           <td><div align='right'>
             <input type='button'  id='button' name='edit' id='button' style='width:100px;' value='save' onclick=\"xajax_update_QualitativeReporting(xajax.getFormValues('formUploadIndividual'));return false;\" /> | <a href='print_version.php?linkvar=Print Narrative Report&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&project_id=".$project_id."&&year=".$year."' target='_blank'><input type='button'  id='button' name='print' id='button' style='width:100px;' value='Print Version'  /></a>
        </div></td>
         </tr>";
          # $obj->addAlert(count($formvalues['loopkey']));
 //for($i=0;$i<count($narrative_id);$i++){
 #$narrative_id=$formvalues['narrative_id'][$i];
 $select="select * from tbl_tsoqualitative where narrative_id='".$narrative_id."'";
 $queryTSO=mysql_query($select)or die(http("Edit-4857"));
 #$obj->addAlert($select);
 while($row=@mysql_fetch_array($queryTSO)){
 $data.="<tr>
          ";
                   $sql="select * from tbl_organization where org_code='".$org_code."' order by orgName asc";
                   #$obj->addAlert($sql);
                   $query=@mysql_query($sql) or die(http("Edit-219"));
                   $ROW=@mysql_fetch_array($query);
                 
                   $data.="
                   <input name='narrative_id' id='narrative_id' value='".$row['narrative_id']."' type='hidden' >
                   <input name='intervention' id='intervention' value='".$ROW['org_code']."' type='hidden' ><strong>".substr($ROW['orgName'],0,500)."</strong></td>
         </tr>
        <tr>
           <td>
           <div align='left'><strong>Executive Summary (1.1	Summary of key training activities including field days and demo plots)</strong><em>[0.5 page]</em></div></td>
           <td><textarea name='plannedActivities'  cols='100' rows='5'  onKeyDown=\"limitText(this.form.plannedActivities,this.form.countdownplannedActivities,500);\" onKeyUp=\"limitText(this.form.plannedActivities,this.form.countdownplannedActivities,500);\">".$row['plannedActivities']."</textarea>&nbsp;You have <input readonly type='text' name='countdownplannedActivities' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
         </tr>
       <tr>
           <td>
           <div align='left'><strong>1.1.2	Partners/Government Staff trained.</strong><em>(0.5 page)</em></div></td>
           <td><textarea name='implementation' id='implementation' cols='100' rows='5' onKeyDown=\"limitText(this.form.implementation,this.form.countdownimplementation,500);\" onKeyUp=\"limitText(this.form.implementation,this.form.countdownimplementation,500);\">".$row['implementation']."</textarea>You have <input readonly type='text' name='countdownimplementation' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
         </tr><tr>
           <td>
           <div align='left'><strong>1.2	Summary of other main activities undertaken during the reporting period  </strong><em>(Maximum 3 pages)</em></div></td>
           <td><textarea name='achievements' id='achievements' cols='100' rows='5'  onKeyDown=\"limitText(this.form.achievements,this.form.countdownachievements,3000);\" onKeyUp=\"limitText(this.form.achievements,this.form.countdownachievements,3000);\">".$row['achievements']."</textarea>You have <input readonly type='text' name='countdownachievements' size='3'  value='3000' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
         </tr>";
          $data.="<tr>
           <td>
           <div align='left'><strong>2.1	Progress against Adoption Targets Area and Farmers </strong><em>[Max 3 pages]</em></div></td>
           <td><textarea name='deviations' id='deviations' cols='100' rows='5'  onKeyDown=\"limitText(this.form.deviations,this.form.countdowndeviations,3000);\" onKeyUp=\"limitText(this.form.deviations,this.form.countdowndeviations,3000);\">".$row['Deviation']."</textarea>You have <input readonly type='text' name='countdowndeviations' size='3'  value='3000' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
         </tr>
                 
         <tr>
           <td>
           <div align='left'><strong>2.2	Major Reasons for Adoption by Farmers</strong><em>[Max 0.5 page]</em></div></td>
           <td><textarea name='challenges' id='challenges' cols='100' rows='5'  onKeyDown=\"limitText(this.form.challenges,this.form.countdownchallenges,500);\" onKeyUp=\"limitText(this.form.challenges,this.form.countdownchallenges,500);\">".$row['next_quarter']."</textarea>You have <input readonly type='text' name='countdownchallenges' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
         </tr>
         <tr>
           <td>
           <div align='left'><strong>2.3	Major Reasons for Non-Adoption by Farmers</strong> <em>[Max 0.5 page]</em> </div></td>
           <td><textarea name='next_quarter' id='next_quarter' cols='100' rows='5' onKeyDown=\"limitText(this.form.next_quarter,this.form.countdownnext_quarter,500);\" onKeyUp=\"limitText(this.form.next_quarter,this.form.countdownnext_quarter,500);\">".$row['Challenges']."</textarea>You have <input readonly type='text' name='countdownnext_quarter' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
         </tr>
        
                 
         <tr>
           <td>
           <div align='left'><strong>8. 2.4	Specific Activities to Increase Adoption (for the next period) [Max 0.5 page]</strong></div></td><td><table cellspacing='0'      width='500' border='0'>";
                   $n=1; $is=10;$inc=1;
   $data.="<tr>
     <th>&nbsp;NO</th>
     <th>&nbsp;Activities planned for next 6 months</th>
     <th>&nbsp;Milestones</th>
     <th>&nbsp;Timeframe</th>
   </tr>";
   
  // for($x=0;$x<$is;$x++){
   //$color=$inc%2==1?"evenrow":"white1";
   
   //$SQLM="select * from tbl_projectworkplan where project_id='".$project_id."' and semi_annual='".$semi_annual."' && year='".$year."'";
   //$obj->alert($SQLM);
    /*$querym=mysql_query($SQLM)or die("0707");
   while($rowm=mysql_fetch_array($querym)){
   $color=($n%2==1)?"evenrow":"white1";
   $data.="<tr class='$color'><td>".$n."</td>
     <td>".$rowm['activity']."</td>
     <td>".$rowm['milestone']."</td>
     <td>".$rowm['semi_annual']."</td></tr>";
         //$inc++;
   $n++;								
   } */
   
   
 //".noRecordsFound($querym,11)."
   //}
 /* $data.="</table>
 <td></center></tr>
                   
                   
                   
                   
                   
                   <tr><td colspan=2><center>
                   <table><tr class='evenrow'>
     
     <td colspan=4 class='black2'><CENTER>ANNEX</CENTER></td></tr>
    <tr class='evenrow'><td colspan=5 class='black2'><center>List of all publications/knowledge products produced</center></td></tr>
         <tr>
 <tr CLASS='evenrow'>
   <td colspan='1' class='black2'>NO</td>
     <td class='black2'>Title of Publication <br/>/Knowledge Product</td>
     <td class='black2'>Author & Organization</td>
     <td class='black2'>Date</td>
   </tr>
   <tr CLASS='evenrow'>
   <td colspan='5'><div id='status'></div></td>
  ";
   
  */
   
   
   $n=1;
  /*  $queryp=mysql_query("select * from tbl_publication where status like 'Yes%' and project_id='".$project_id."' and semi_annual='".$semi_annual."' && year='".$year."'")or die(http("1844"));
   while($rowp=mysql_fetch_assoc($queryp)){
 $publication_id=$rowp['publication_id'];
   //$obj->alert($datename);
   $color=($n%2==1)?"evenrow3":"white1";
   $data.="<tr class='$color'><td align='right'>".$n."</td><td>".$rowp['title']."</td>
     <td>".$rowp['organization']."</td>
     <td>".$rowp['dateofpublication']."</td>
    
 
     
 
   </tr>";
   $n++;
   }
    
 
                   
                   
                  $data.="".noRecordsFound($queryp,11)."</table>";
                 */
                 
                 $data.="</center></TD></tr>
                 <tr><td colspan=2><center>
   
   <table> <tr CLASS='evenrow'>
   <td colspan='1' class='black2'>NO</td>
     <td class='black2'>Training course title</td>
     <td class='black2'>Provided by</td>
     <td class='black2'>Type of Participants</th>
     
         <td class='black2'>No. of Male participants</td>
         <td class='black2' >No. of Female participants</td>
 <td class='black2'>Total No. of participants</td>
 <td class='black2'>Organizing<br/>Date<br/></td>
   </tr>";
  $queryt=mysql_query("select * from tbl_training where status like 'Yes%' and project_id='".$project_id."' and semi_annual='".$semi_annual."' and year='".$year."'")or die(http("2140"));
   while($row=mysql_fetch_array($queryt)){
   $orgdate="org_date".$n;
   $color=($n%2==1)?"evenrow3":"white1";
     $data.="<tr class='$color'>
         
   <td>".$n."</td>
     <td>".$rowt['course']."</td>
     <td>".$rowt['trainer']."</td>
     <td>".$rowt['typeofparticipants']."</td>
     <td align='right'>".$rowt['male']."</td>
      <td align='right'>".$rowt['female']."</td>
      <td align='right'>".$rowt['total']."</td>
 
   <td align='right'>".$rowt['organizing_date']."</td>
   </tr>";
   $n++;
   }
   
 
 
  $data.="".noRecordsFound($queryt,11)."</table></center></td></tr>
                 
           ";
           
                   $data.="<tr>
           <td>&nbsp;</td>
           <td><div align='right'>
             <input type='button'  id='button' name='edit' id='button' style='width:100px;' value='Save' onclick=\"xajax_update_QualitativeReporting(xajax.getFormValues('formUploadIndividual'));return false;\"  /> | <a href='print_version.php?linkvar=Print Narrative Report&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&project_id=".$project_id."&&year=".$year."'  target='_blank' ><input type='button'  id='button' name='edit' id='button' style='width:100px;' value='Print Version'  /></a>
           </div></td>
         </tr>";
                 }
         $data.="</table></FORM>";
 
           
                 
                 
 
 
 
 
 $obj->assign($div,'innerHTML',$data);
 return $obj;
 }
 function update_QualitativeReporting($formvalues){ 
         $obj=new xajaxResponse();
                 //# $reportingPeriod=quarter(date(m));
                 $narrative_id=$formvalues['narrative_id'];
                 $org_code=$formvalues['intervention'];
                 $plannedActivities=$formvalues['plannedActivities'];
                 $implementation=$formvalues['implementation'];
                 $achievements=$formvalues['achievements'];
                 $deviations=$formvalues['deviations'];
                 $ContributiontoProgramPurpose=$formvalues['ContributiontoProgramPurpose'];
                 $challenges=$formvalues['challenges'];
                 $next_quarter=$formvalues['next_quarter'];
         
                 
           $year=$_SESSION['Activeyear'];
         $org_code=$_SESSION['org_code'];
 
  $x="update tbl_tsoqualitative set 
       `plannedActivities`='".mysql_real_escape_string(str_replace("-","-",$plannedActivities))."',
            `implementation`='".mysql_real_escape_string(str_replace("-","-",$implementation))."',
            `achievements`='".mysql_real_escape_string(str_replace("-","-",$achievements))."',
         `Deviation`='".mysql_real_escape_string(str_replace("-","-",$deviations))."',
         `lessons`='".mysql_real_escape_string(str_replace("-","-",$lessons))."', 
         `Challenges`='".mysql_real_escape_string(str_replace("-","-",$challenges))."', 
         next_quarter='".mysql_real_escape_string(str_replace("-","-",$next_quarter))."',
         `updatedby`='".$_SESSION['username']."' where narrative_id='".$narrative_id."'";
 
 $query=@mysql_query($x)or die(http("Save-1716"));
 
 
 
 /* for($i=0;$i<count($formvalues['loopkey']);$i++){
 $activity=$formvalues['course'][$i];
 $milestone=$formvalues['trainer'][$i];
 $quarter=$formvalues['typeofparticipants'][$i];
 
         //$obj->alert($datepublished);	
                         
 if($course<>''){
 $insert="insert into tbl_training(semi_annual,year,project_id,narrative_id,
 course,trainer,typeofparticipants,male,female,total,organizing_date,updatedby) values('".$_SESSION['sem_annual']."','".$_SESSION['Activeyear']."','".$project."','".$_SESSION['narrative_id']."','".$course."','".$trainer."','".$typeofparticipants."','".$male."','".$female."','".$total."','".$date."','".$_SESSION['username']."')";
 
 @mysql_query($insert)or die(http('0013'));
 $obj->alert($insert);
 }
 if($query){
 congMsg("Data Captured!") or die(http("0031"));
 }
  */
 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
 //$obj->call("xajax_view_FarmersProductionRecords",'',1,20);
 return $obj;
 }
 function edit_TrainingParticipants($formvalues){
 $obj=new xajaxResponse();
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 $n=1;
 $inc=1;
 $_SESSION['nhh']=1;
 $_SESSION['nhh']=$nhh;
 $_SESSION['subcountyCode']=$subcounty;
 #$obj->alert($_SESSION['subcountyCode']);
 $_SESSION['ParishName']=$parishName;
 $_SESSION['parishCode']=$parish;
 #$obj->alert($_SESSION['parishCode']);
 
 $data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
 <table width='100%' id='report'>";
  
   $data.="
   
   <tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>
   
   
           
           <tr CLASS='evenrow'>
  
     <th colspan='10' ><center> TRAINING PARTICPANTS details</center></th>
         
   </tr>
 
         <tr class='evenrow'>
     <td colspan=10><table>
         <tr>
         <th>NO</th>
         <th>district</th>
         <th>subcounty</th>
         <th>parish</th>
         <th>VILLAGE/LOCATION</th>
         <th>organization</th>
         <th>training topic</th>
         <th>trainees</th>
         <th>naME</th>
         <th>SEX</th>
         <th>NUMBER OF TIMES<br> TRAINED ON <br>THIS TOPIC</th>
         </tr>";
         $n=1;
         for($x=0;$x<count($formvalues['loopkey']);$x++){
         
         $sql="select * from tbl_training where training_id='".$formvalues['training_id'][$x]."'";
                   #$obj->addAlert($sql);
                   $query=mysql_query($sql) or die(http(219));
                   while($row=mysql_fetch_array($query)){
         
         
         
         $data.="<tr class='evenrow'>
         <td><input name='loopkey[]' six='20'  type='hidden' id='loopkey".$n."' value='".$row['training_id']."'  />".$n."</td>
         <td colspan=''><select name='district[]' id='district' ><option value=''>-select-</option>";
                    $sql="select * from tbl_district  order by districtName";
                   #$obj->addAlert($sql);
                   $query=mysql_query($sql) or die(http(219));
                   while($ROW=mysql_fetch_array($query)){
                 $selected=($row['district']==$ROW['districtCode'])?"SELECTED":"";
                   $data.="<option value=\"".$ROW['districtCode']."\" ".$selected." >".substr($ROW['districtName'],0,500)."</option>";}
                   $data.="</select></td>
         <td colspan=''><select name='subcounty[]' id='subcounty' style='width:100px;'><option value=''>-select-</option>";
         
          $sql="select * from tbl_subcounty   order by subcountyName";
                   #$obj->addAlert($sql);
                   $query=mysql_query($sql) or die(http(219));
                   while($ROW=mysql_fetch_array($query)){
                 $selected=($row['subcounty']==$ROW['subcountyCode'])?"SELECTED":"";
                   $data.="<option value=\"".$ROW['subcountyCode']."\" ".$selected." >".substr($ROW['subcountyName'],0,500)."</option>";}
         
         $data.="</select></td>
         <td colspan=''><select name='parishCode[]' id='parishCode' style='width:100px;'><option value=''>-select-</option>";
         $sql="select * from tbl_parish  order by ParishName";
                   #$obj->addAlert($sql);
                   $query=@mysql_query($sql) or die(http(219));
                   while($ROW=@mysql_fetch_array($query)){
                 $selected=($row['parish']==$ROW['parishCode'])?"SELECTED":"";
                   $data.="<option value=\"".$ROW['parishCode']."\" ".$selected." >".substr($ROW['ParishName'],0,500)."</option>";}
         
         $data.="</select></td>
         <td><input name='village[]' six='20'  type='text' id='total".$n."' value='".$row['village']."' /></td>
         <td colspan=''><select name='org_code[]' id='org_code' style='width:100px;'>".funct_dropDownSelected('tbl_organization', 'orgName', 'org_code', 'orgName','$row[org_code]')."</select></td>
         <td colspan=''><select name='trainingtopic[]' id='trainingtopic' style='width:100px;'>".funct_dropDownSelected('tbl_trainingtopic', 'topic', 'code', 'topic','$row[code]')."</select></td>
         <td colspan=''><select name='trainees[]' id='trainees' style='width:100px;'>".funct_dropDownSelected('tbl_trainees', 'Name', 'code', 'Name','$row[code]')."</select></td>
         
         <td><input name='name[]' type='text' id='name".$n."' size='30' value='".$row['name_oftrainee']."'  /></td>
         <td><select name='sex[]' id='sex'>
         <option value=''>-select-</option>
         <option value='M'>Male</option>
         <option value='F'>Female</option>
         </select></td></td>
         <td><select name='num_training[]'  style='width:100px;' ><option value=''>-select-</option>";
                   $sql="select * from tbl_lookup where classCode='12' order by code asc";
                   #$obj->addAlert($sql);
                   $query=mysql_query($sql) or die(http(219));
                   while($ROW=mysql_fetch_array($query)){
         $selected=($row['number_of_times']==$ROW['code'])?"SELECTED":"";
                   $data.="<option value=\"".$ROW['code']."\" ".$selected." >".substr($ROW['codeName'],0,500)."</option>";}
                   $data.="</select></td>
         </tr>";
         $n++;}
         }
         
 
   $data.=" </table></td>
          
     </tr>
   
  
   ";
  
  
   
 $data."
 
 
 </table>
 </td>";
    
  $data.="</tr>
 </table>
 
 
 <div align='right'>
         <button type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_TrainingParticipants(xajax.getFormValues('projects')); return false;\" />Save</button>
         </div>
 </form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_TrainingParticipants($formvalues){
 $obj=new xajaxResponse();
 $n=1;
         
         
         
         $error="<ul>";
                 $erCount=0;
 /* if($district==''){
                 $error.="<li>Select District Name</li>";
                 $erCount++;
                 } */
                 if($_SESSION['quarter']=='Closed'){
                 $error.="<li>Reporting Period Closed!</li>";
                 $erCount++;
                 }
 $error .="</ul>";
                 if($erCount > 0){
                         $obj->assign("status","innerHTML",errorMsg($error));
                         return $obj;
                 } 	
                 
 /* if($_SESSION['quarter']='Jan - Mar')$sem_annual='Jan - Jun';
                 else if($_SESSION['quarter']=='Apr - Jun')$sem_annual='Jan - Jun';
                 else if($_SESSION['quarter']=='Jul - Sep')$sem_annual='Jul - Dec';
                 else if($_SESSION['quarter']=='Oct - Dec')$sem_annual='Jul - Dec';
                 else if($_SESSION['quarter']=='Closed')$sem_annual='';
                 else $sem_annual=''; 
                 $_SESSION['sem_annual']=$sem_annual;*/
                         for($i=0;$i<count($formvalues['loopkey']);$i++){
                                         $task=$formvalues['task'][$i];	
         $district=$formvalues['district'][$i];
         $trainer=$formvalues['trainer'][$i];
                 $orgdate=$formvalues['orgdate'][$i];
                                         $subcounty=$formvalues['subcounty'][$i];
                                         $parishCode=$formvalues['parishCode'][$i];
                                         $village=$formvalues['village'][$i];
                                         $org_code=$formvalues['org_code'][$i];
                                         $trainingtopic=$formvalues['trainingtopic'][$i];
                                         $trainees=$formvalues['trainees'][$i];
                                         $name=$formvalues['name'][$i];
                                                 $sex=$formvalues['sex'][$i];
                                         $num_training=$formvalues['num_training'][$i];
                                         $village=$formvalues['village'][$i];
                                         
         //$obj->alert($datepublished);	
                         
 if($name<>''){
 $insert="update tbl_training set  `org_code`='".$org_code."',`training_topic`='".$trainingtopic."', `trainer`='".$trainer."',
  `typeofparticipants`='".$trainees."', `name_oftrainee`='".$name."', `gender`='".$sex."', `number_of_times`='".$num_training."',
   `updatedby`='".$_SESSION['username']."', `district`='".$district."', `subcounty`='".$subcounty."', `parish`='".$parishCode."', `task`='".$task."',village='".$village."' where training_id='".$formvalues['loopkey'][$i]."'";
 
 @mysql_query($insert)or die(http('0013'));
 //$obj->alert($insert);
 }
 $n++;
 }
 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
 #$obj->call('xajax_mapping_register','','','');
 $obj->call("xajax_view_TrainingParticipants",'','','');
 return $obj;
 }
 function edit_exporters_form3($formValues){
 $obj=new xajaxResponse();
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 //$_SESSION['Jovan']=1;
 $n=1;
 $inc=1;
 
 
 
 $data.="<form action=\"".$_SREVER['PHP_SELF']."\" name='form3' id='form3' method='post'>";
 

 for($i=0;$i<count($formValues['loopkey']);$i++){
  $sel=mysql_query("SELECT w . * , x.`exporterName`
         FROM `tbl_form3_exporters` w, `tbl_exporters` x
         WHERE w.`tbl_exporterId` = x.`tbl_exportersId`
         AND w.`tbl_form3_exportersId`='".$formValues['tbl_form3_exportersId'][$i]."'")or die(http(7236));
   
   while($rowz=mysql_fetch_assoc($sel)){
	   
	   $nameOfExporter=$rowz['exporterName'];
	   $reportingPeriod=$rowz['reportingPeriod'];
	   $recordId=$rowz['tbl_form3_exportersId'];
	   $year=$rowz['year'];
	   
 $data.="<table bgcolor='#FFFFCC' border='0' cellspacing='1' cellpadding='1' width='100%'>";
$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1' />
 <input name='tbl_form3_exportersId[]' type='hidden' id='tbl_form3_exportersId".$n."' size='25' value='".$rowz['tbl_form3_exportersId']."'/>";
   
   $data.="<tr><td colspan='12'>";
		$data.="<table border='0' cellspacing='1' cellpadding='1' width='100%'>
				 
				<tr class='evenrow'>
				  <td colspan='12' align='center'><h2>EXPORTER AND PROCESSOR DATA COLLECTION FORM(EDIT MODULE)</h2></td>
				</tr>
			</table>";
	$data.="</td></tr>";
   
   $data.="<tr><td colspan='12'>";
		$data.="<table border='0' cellspacing='1' cellpadding='5'>
		  <tr>
		  <td colspan='2'><strong>Name of Business/Exporter:</strong> ".$nameOfExporter."</td>
			<td>&nbsp;</td>
			<td><strong>Reporting Period:</strong></td>
			<td align='left'>".$reportingPeriod."</td>
			<td><strong>Year:</strong></td>
			<td colspan='2' align='left'>".$year."</td>
			<td colspan='3'></td>
			<td></td>
			</tr>
			</table>";
	$data.="</td></tr>";
	
	
	 $data.="<tr><td colspan='12'>";
		$data.="<table id='summations' border='0' cellspacing='1' cellpadding='1'>";
		
			 $data.="<tr>
						<th colspan='2' rowspan='2'>Performance Indicator<img src='' height='0.2' width='300px'/></th>
						<th colspan='7' >Achievements</th>
						<th rowspan='2'>Details<img src='' height='0.2' width='200px'/></th>
					  </tr>";
					  $data.="<tr>";
  
						if(($reportingPeriod)=="Apr - Sep"){
						$monthsArray=array('4','5','6','7','8','9');
						foreach ($monthsArray as $key) {
						$month= __month__coverter($key); 
						$result = substr($month, 0, 3);
						$data.="<th >".$result."</th>";	
						}
						}else if(($reportingPeriod)=="Oct - Mar"){
						$monthsArray=array('10','11','12','1','2','3');
						foreach ($monthsArray as $key) {
						$month= __month__coverter($key); 
						$result = substr($month, 0, 3);	
						$data.="<th >".$result."</th>";	
						}
						}  
  

	
					$data.="<th >Total</th>";
					$data.="</tr>";
	
						$query_string="SELECT 
						`x`.`tbl_form3_exportersId`,
						`x`.`tbl_exporterId`,
						`x`.`reportingPeriod`,
						`x`.`year`,
						`x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
						`x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
						`x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
						`x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
						`x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
						`x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
						`x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
						`x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
						`x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
						`x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
						`x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
						`x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
						`x`.`exTradersSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
						`x`.`exTradersSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
						`x`.`exTradersSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
						`x`.`exTradersSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
						`x`.`exTradersSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
						`x`.`exTradersSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
						`x`.`exTradersSupplyChainDetails`,
						`x`.`exUnionSupplyChainFifthQuarterMonth` as `exUSCFifthQM`, 
						`x`.`exUnionSupplyChainFirstQuarterMonth` as `exUSCFirstQM`, 
						`x`.`exUnionSupplyChainFourthQuarterMonth` as `exUSCFourthQM`, 
						`x`.`exUnionSupplyChainSecondQuarterMonth` as `exUSCSecondQM`, 
						`x`.`exUnionSupplyChainSixthQuarterMonth` as `exUSCSixthQM`,  
						`x`.`exUnionSupplyChainThirdQuarterMonth` as `exUSCThirdQM`,
						`x`.`exUnionsSupplyChainDetails`,
						`x`.`volMaizePurchasedDetails`,
						`x`.`volMaizeExDetails`,
						`x`.`volCoffeeExDetails`,
						`x`.`volBeansExDetails`,
						`x`.`epayRecievedDetails`,
						`x`.`epayMadeDetails`,
						`x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
						`x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
						`x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
						`x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
						`x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
						`x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
						`x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
						`x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
						`x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
						`x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
						`x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
						`x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
						`x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
						`x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
						`x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
						`x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
						`x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
						`x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
						`x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
						`x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
						`x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
						`x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
						`x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
						`x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
						`x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
						`x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
						`x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
						`x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
						`x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
						`x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
						`x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
						`x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
						`x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
						`x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
						`x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
						`x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
						`x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
						`x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
						`x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
						`x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
						`x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
						`x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
						`x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
						`x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
						`x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
						`x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
						`x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
						`x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
						`x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
						`x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
						`x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
						`x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
						`x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
						`x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
						`x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
						`x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
						`x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`
						FROM `tbl_form3_exporters` as `x`
						WHERE `x`.`tbl_form3_exportersId`='".$recordId."'
						and `x`.`reportingPeriod`='".$reportingPeriod."'";
	
							$query=mysql_query($query_string)or die(http(5827));
							$row=mysql_fetch_array($query);
								//exUSCFirstQM
								$data.="<tr class='white1'>";
								$data.="<td colspan='2'><strong>Number of Traders/DC in the supply chain</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exTSCFirstQM[]'  value='".$row['exTSCFirstQM']."' 	id='exTSCFirstQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exTSCSecondQM[]' value='".$row['exTSCSecondQM']."' id='exTSCSecondQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exTSCThirdQM[]' value='".$row['exTSCThirdQM']."' 	id='exTSCThirdQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exTSCFourthQM[]' value='".$row['exTSCFourthQM']."' id='exTSCFourthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exTSCFifthQM[]'  value='".$row['exTSCFifthQM']."'	id='exTSCFifthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exTSCSixthQM[]'  value='".$row['exTSCSixthQM']."'	id='exTSCSixthQM".$n."' class='computable' type='text' /></td>";
								$totTSC=($row['exTSCFirstQM']+$row['exTSCSecondQM']+$row['exTSCThirdQM']+$row['exTSCFourthQM']+$row['exTSCFifthQM']+$row['exTSCSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='exTradersSupplyChain[]' id='exTradersSupplyChain".$n."' class='computable-result' type='text' value='".$totTSC."'/></td>";
								$data.="<td><textarea name='exTradersSupplyChainDetails[]' id='exTradersSupplyChainDetails".$n."' cols='30' rows='3'>".$row['exTradersSupplyChainDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td colspan='2'><strong>Number of CBOs/unions/societies in the supply Chain</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exUSCFirstQM[]' value='".$row['exUSCFirstQM']."' 	id='exUSCFirstQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exUSCSecondQM[]' value='".$row['exUSCSecondQM']."' id='exUSCSecondQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exUSCThirdQM[]' value='".$row['exUSCThirdQM']."' 	id='exUSCThirdQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exUSCFourthQM[]' value='".$row['exUSCFourthQM']."' id='exUSCFourthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exUSCFifthQM[]' value='".$row['exUSCFifthQM']."' 	id='exUSCFifthQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='exUSCSixthQM[]' value='".$row['exUSCSixthQM']."' 	id='exUSCSixthQM".$n."' class='computable'  type='text' /></td>";
								$totUSC=($row['exUSCFirstQM']+$row['exUSCSecondQM']+$row['exUSCThirdQM']+$row['exUSCFourthQM']+$row['exUSCFifthQM']+$row['exUSCSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='exUnionSupplyChain[]' id='exUnionSupplyChain".$n."' class='computable-result' type='text' value='".$totUSC."'/></td>";
								$data.="<td><textarea name='exUnionsSupplyChainDetails[]' id='exUnionsSupplyChainDetails".$n."' cols='30' rows='3'>".$row['exUnionsSupplyChainDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td rowspan='3'><strong>Volume of produce purchased (Kgs)</strong></td>";
								$data.="<td><strong>Maize</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPFirstQM[]' value='".$row['volMPFirstQM']."'  	id='volMPFirstQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPSecondQM[]' value='".$row['volMPSecondQM']."'  id='volMPSecondQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPThirdQM[]' value='".$row['volMPThirdQM']."'   id='volMPThirdQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPFourthQM[]' value='".$row['volMPFourthQM']."'  id='volMPFourthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPFifthQM[]' value='".$row['volMPFifthQM']."'   id='volMPFifthQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPSixthQM[]' value='".$row['volMPSixthQM']."'  id='volMPSixthQM".$n."' class='computable'  type='text' /></td>";
								$totVolMP=($row['volMPFirstQM']+$row['volMPSecondQM']+$row['volMPThirdQM']+$row['volMPFourthQM']+$row['volMPFifthQM']+$row['volMPSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volMaizePurchased[]' id='volMaizePurchased".$n."' class='computable-result' type='text' value='".$totVolMP."'/></td>";
								$data.="<td rowspan='3'><textarea name='volMaizePurchasedDetails[]' id='volMaizePurchasedDetails".$n."' cols='30' rows='3'>".$row['volMaizePurchasedDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td><strong>Coffee</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPFirstQM[]' value='".$row['volCPFirstQM']."'   id='volCPFirstQM".$n."' class='computable' 	 type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPSecondQM[]' value='".$row['volCPSecondQM']."'   id='volCPSecondQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPThirdQM[]' value='".$row['volCPThirdQM']."'   id='volCPThirdQM".$n."' class='computable'   type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPFourthQM[]' value='".$row['volCPFourthQM']."'   id='volCPFourthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPFifthQM[]' value='".$row['volCPFifthQM']."'   id='volCPFifthQM".$n."'  class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPSixthQM[]' value='".$row['volCPSixthQM']."'   id='volCPSixthQM".$n."'  class='computable'  type='text' /></td>";
								$totvolCP=($row['volCPFirstQM']+$row['volCPSecondQM']+$row['volCPThirdQM']+$row['volCPFourthQM']+$row['volCPFifthQM']+$row['volCPSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volCoffeePurchased[]' id='volCoffeePurchased".$n."' class='computable-result' type='text' value='".$totvolCP."'/></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td><strong>Beans</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPFirstQM[]' value='".$row['volBPFirstQM']."'  id='volBPFirstQM".$n."' class='computable'    type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPSecondQM[]' value='".$row['volBPSecondQM']."'  id='volBPSecondQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPThirdQM[]' value='".$row['volBPThirdQM']."'  id='volBPThirdQM".$n."' class='computable'   type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPFourthQM[]' value='".$row['volBPFourthQM']."'  id='volBPFourthQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPFifthQM[]' value='".$row['volBPFifthQM']."'  id='volBPFifthQM".$n."' class='computable'    type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPSixthQM[]' value='".$row['volBPSixthQM']."'  id='volBPSixthQM".$n."' class='computable'   type='text' /></td>";
								$totvolBP=($row['volBPFirstQM']+$row['volBPSecondQM']+$row['volBPThirdQM']+$row['volBPFourthQM']+$row['volBPFifthQM']+$row['volBPSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volBeansPurchased[]' id='volBeansPurchased".$n."' class='computable-result' type='text' value='".$totvolBP."'/></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td rowspan='2'><strong>Maize Exports: <i>Volumes and Values</i></strong></td>";
								$data.="<td><strong><i>Volume (Kg)</i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEFirstQM[]' value='".$row['volMEFirstQM']."' id='volMEFirstQM".$n."' class='computable'   type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMESecondQM[]' value='".$row['volMESecondQM']."' id='volMESecondQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEThirdQM[]' value='".$row['volMEThirdQM']."' id='volMEThirdQM".$n."' class='computable'   type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEFourthQM[]' value='".$row['volMEFourthQM']."' id='volMEFourthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEFifthQM[]' value='".$row['volMEFifthQM']."' id='volMEFifthQM".$n."' class='computable'   type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMESixthQM[]' value='".$row['volMESixthQM']."' id='volMESixthQM".$n."' class='computable'   type='text' /></td>";
								$totvolME=($row['volMEFirstQM']+$row['volMESecondQM']+$row['volMEThirdQM']+$row['volMEFourthQM']+$row['volMEFifthQM']+$row['volMESixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='	volMaizeEx[]' id='volMaizeEx".$n."' class='computable-result' type='text' value='".$totvolME."'/></td>";
								$data.="<td rowspan='2'><textarea name='volMaizeExDetails[]' id='volMaizeExDetails".$n."' cols='30' rows='3'>".$row['volMaizeExDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td><strong><i>Value (UGX)</i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEUgxFirstQM[]' id='volMEUgxFirstQM".$n."' class='computable' type='text'  onkeypress='return numbersonly(event, false)' value='".$row['volMEUgxFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEUgxSecondQM[]' id='volMEUgxSecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volMEUgxSecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEUgxThirdQM[]' id='volMEUgxThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volMEUgxThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEUgxFourthQM[]' id='volMEUgxFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volMEUgxFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEUgxFifthQM[]' id='volMEUgxFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volMEUgxFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEUgxSixthQM[]' id='volMEUgxSixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volMEUgxSixthQM']."'/></td>";
								$totvolMEUgx=($row['volMEUgxFirstQM']+$row['volMEUgxSecondQM']+$row['volMEUgxThirdQM']+$row['volMEUgxFourthQM']+$row['volMEUgxFifthQM']+$row['volMEUgxSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volMaizeExUgx[]' id='volMaizeExUgx".$n."' class='computable-result' type='text' value='".$totvolMEUgx."'/></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td rowspan='2'><strong>Coffee Exports: <i>Volumes and Values</i><strong></td>";
								$data.="<td><strong><i>Volume (Kg)</i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEFirstQM[]' id='volCEFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCESecondQM[]' id='volCESecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCESecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEThirdQM[]' id='volCEThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEFourthQM[]' id='volCEFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEFifthQM[]' id='volCEFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCESixthQM[]' id='volCESixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCESixthQM']."'/></td>";
								$totvolCE=($row['volCEFirstQM']+$row['volCESecondQM']+$row['volCEThirdQM']+$row['volCEFourthQM']+$row['volCEFifthQM']+$row['volCESixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volCoffeeEx[]' id='volCoffeeEx".$n."' class='computable-result' type='text' value='".$totvolCE."'/></td>";
								$data.="<td rowspan='2' ><textarea name='volCoffeeExDetails[]' id='volCoffeeExDetails".$n."'  cols='30' rows='3'>".$row['volCoffeeExDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td><strong><i>Value (UGX)</i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxFirstQM[]' id='volCEUgxFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxSecondQM[]' id='volCEUgxSecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxSecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxThirdQM[]' id='volCEUgxThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxFourthQM[]' id='volCEUgxFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxFifthQM[]' id='volCEUgxFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxSixthQM[]' id='volCEUgxSixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxSixthQM']."'/></td>";
								$totvolCEUgx=($row['volCEUgxFirstQM']+$row['volCEUgxSecondQM']+$row['volCEUgxThirdQM']+$row['volCEUgxFourthQM']+$row['volCEUgxFifthQM']+$row['volCEUgxSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volCoffeeExUgx[]' id='volCoffeeExUgx".$n."' class='computable-result' type='text' value='".$totvolCEUgx."'/></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td rowspan='2'><strong>Bean Exports: <i>volumes and values</i></strong></td>";
								$data.="<td><strong><i>Volume (Kg)</i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEFirstQM[]' id='volBEFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBESecondQM[]' id='volBESecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBESecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEThirdQM[]' id='volBEThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEFourthQM[]' id='volBEFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEFifthQM[]' id='volBEFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBESixthQM[]' id='volBESixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBESixthQM']."'/></td>";
								$totvolBE=($row['volBEFirstQM']+$row['volBESecondQM']+$row['volBEThirdQM']+$row['volBEFourthQM']+$row['volBEFifthQM']+$row['volBESixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volBeansEx[]' id='volBeansEx".$n."' class='computable-result' type='text' value='".$totvolBE."'/></td>";
								$data.="<td rowspan='2' ><textarea name='volBeansExDetails[]' id='volBeansExDetails".$n."' cols='30' rows='3'>".$row['volBeansExDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td><strong><i>Value(UGX)<i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxFirstQM[]' id='volBEUgxFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxSecondQM[]' id='volBEUgxSecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxSecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxThirdQM[]' id='volBEUgxThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxFourthQM[]' id='volBEUgxFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxFifthQM[]' id='volBEUgxFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxSixthQM[]' id='volBEUgxSixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxSixthQM']."'/></td>";
								$totvolBEUgx=($row['volBEUgxFirstQM']+$row['volBEUgxSecondQM']+$row['volBEUgxThirdQM']+$row['volBEUgxFourthQM']+$row['volBEUgxFifthQM']+$row['volBEUgxSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volBeansExUgx[]' id='volBeansExUgx".$n."' class='computable-result' type='text' value='".$totvolBEUgx."'/></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td colspan='2'><strong>Number of e-payments received</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRFirstQM[]' id='epayRFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRSecondQM[]' id='epayRSecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRSecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRThirdQM[]' id='epayRThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRFourthQM[]' id='epayRFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRFifthQM[]' id='epayRFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRSixthQM[]' id='epayRSixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRSixthQM']."'/></td>";
								$totepayR=($row['epayRFirstQM']+$row['epayRSecondQM']+$row['epayRThirdQM']+$row['epayRFourthQM']+$row['epayRFifthQM']+$row['epayRSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='epayRecieved[]' id='epayRecieved".$n."' class='computable-result' type='text' value='".$totepayR."'/></td>";
								$data.="<td><textarea name='epayRecievedDetails[]' id='epayRecievedDetails".$n."' cols='30' rows='3'>".$row['epayRecievedDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td colspan='2'><strong>Number of e-payments made</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMFirstQM[]' id='epayMFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMSecondQM[]' id='epayMSecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMSecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMThirdQM[]' id='epayMThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMFourthQM[]' id='epayMFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMFifthQM[]' id='epayMFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMSixthQM[]' id='epayMSixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMSixthQM']."'/></td>";
								$totepayM=($row['epayMFirstQM']+$row['epayMSecondQM']+$row['epayMThirdQM']+$row['epayMFourthQM']+$row['epayMFifthQM']+$row['epayMSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='epayMade[]' id='epayMade".$n."' class='computable-result' type='text' value='".$totepayM."'/></td>";
								$data.="<td><textarea name='epayMadeDetails[]' id='epayMadeDetails".$n."' cols='30' rows='3'>".$row['epayMadeDetails']."</textarea></td>";
							  $data.="</tr>";
							  $n++;
						   }
						   
					   }
				   
				   $data.="</table>";
	$data.="</td></tr>";
$data.="</table>";
 
 
 $data.="
 <table width='100%'>
 <tr class='evenrow'>
     <td colspan=22>
         <div align='right'>
                 <input type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_exporters_form3(xajax.getFormValues('form3')); return false;\" />
         </div>
     </td>
 </tr>
 </table>
 
 </form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 $obj->call("sumComputable"); 
 return $obj;
 }
 function update_exporters_form3($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 for($i=0;$i<count($formValues['loopkey']);$i++){
$tbl_form3_exportersId = $formValues['tbl_form3_exportersId'][$i];
$volCoffeeP = $formValues['volCoffeePurchasedDetails'][$i];
$volCoffeePurchasedDetails = ($volCoffeeP)=="-"?"":$volCoffeeP;
$volBeansP = $formValues['volBeansPurchasedDetails'][$i];
$volBeansPurchasedDetails = ($volBeansP)=="-"?"":$volBeansP;
//Submission Details
$exTSCFirstQM = floatval($formValues['exTSCFirstQM'][$i]);
$exTSCSecondQM = floatval($formValues['exTSCSecondQM'][$i]);
$exTSCThirdQM = floatval($formValues['exTSCThirdQM'][$i]);
$exTSCFourthQM = floatval($formValues['exTSCFourthQM'][$i]);
$exTSCFifthQM = floatval($formValues['exTSCFifthQM'][$i]);
$exTSCSixthQM = floatval($formValues['exTSCSixthQM'][$i]);
$exTradersSupplyChain = floatval($formValues['exTradersSupplyChain'][$i]);
$exTraders = $formValues['exTradersSupplyChainDetails'][$i];
$exTradersSupplyChainDetails = ($exTraders)=="-"?"":$exTraders;
$exUSCFirstQM = floatval($formValues['exUSCFirstQM'][$i]);
$exUSCSecondQM = floatval($formValues['exUSCSecondQM'][$i]);
$exUSCThirdQM = floatval($formValues['exUSCThirdQM'][$i]);
$exUSCFourthQM = floatval($formValues['exUSCFourthQM'][$i]);
$exUSCFifthQM = floatval($formValues['exUSCFifthQM'][$i]);
$exUSCSixthQM = floatval($formValues['exUSCSixthQM'][$i]);
$exUnionSupplyChain = floatval($formValues['exUnionSupplyChain'][$i]);
$exUnionsSupply = $formValues['exUnionsSupplyChainDetails'][$i];
$exUnionsSupplyChainDetails  = ($exUnionsSupply)=="-"?"":$exUnionsSupply;
$volMPFirstQM = floatval($formValues['volMPFirstQM'][$i]);
$volMPSecondQM = floatval($formValues['volMPSecondQM'][$i]);
$volMPThirdQM = floatval($formValues['volMPThirdQM'][$i]);
$volMPFourthQM = floatval($formValues['volMPFourthQM'][$i]);
$volMPFifthQM = floatval($formValues['volMPFifthQM'][$i]);
$volMPSixthQM = floatval($formValues['volMPSixthQM'][$i]);
$volMaizePurchased = floatval($formValues['volMaizePurchased'][$i]);
$volMaizeP = $formValues['volMaizePurchasedDetails'][$i];
$volMaizePurchasedDetails = ($volMaizeP)=="-"?"":$volMaizeP;
$volCPFirstQM = floatval($formValues['volCPFirstQM'][$i]);
$volCPSecondQM = floatval($formValues['volCPSecondQM'][$i]);
$volCPThirdQM = floatval($formValues['volCPThirdQM'][$i]);
$volCPFourthQM = floatval($formValues['volCPFourthQM'][$i]);
$volCPFifthQM = floatval($formValues['volCPFifthQM'][$i]);
$volCPSixthQM = floatval($formValues['volCPSixthQM'][$i]);
$volCoffeePurchased = floatval($formValues['volCoffeePurchased'][$i]);
$volBPFirstQM = floatval($formValues['volBPFirstQM'][$i]);
$volBPSecondQM = floatval($formValues['volBPSecondQM'][$i]);
$volBPThirdQM = floatval($formValues['volBPThirdQM'][$i]);
$volBPFourthQM = floatval($formValues['volBPFourthQM'][$i]);
$volBPFifthQM = floatval($formValues['volBPFifthQM'][$i]);
$volBPSixthQM = floatval($formValues['volBPSixthQM'][$i]);
$volBeansPurchased = floatval($formValues['volBeansPurchased'][$i]);
$volMEFirstQM = floatval($formValues['volMEFirstQM'][$i]);
$volMESecondQM = floatval($formValues['volMESecondQM'][$i]);
$volMEThirdQM = floatval($formValues['volMEThirdQM'][$i]);
$volMEFourthQM = floatval($formValues['volMEFourthQM'][$i]);
$volMEFifthQM = floatval($formValues['volMEFifthQM'][$i]);
$volMESixthQM = floatval($formValues['volMESixthQM'][$i]);
$volMaizeEx = floatval($formValues['volMaizeEx'][$i]);
$volMa = $formValues['volMaizeExDetails'][$i];
$volMaizeExDetails = ($volMa) == "-"?"":$volMa;
$volMEUgxFirstQM = floatval($formValues['volMEUgxFirstQM'][$i]);
$volMEUgxSecondQM = floatval($formValues['volMEUgxSecondQM'][$i]);
$volMEUgxThirdQM = floatval($formValues['volMEUgxThirdQM'][$i]);
$volMEUgxFourthQM = floatval($formValues['volMEUgxFourthQM'][$i]);
$volMEUgxFifthQM = floatval($formValues['volMEUgxFifthQM'][$i]);
$volMEUgxSixthQM = floatval($formValues['volMEUgxSixthQM'][$i]);
$volMaizeExUgx = floatval($formValues['volMaizeExUgx'][$i]);
$volCEFirstQM = floatval($formValues['volCEFirstQM'][$i]);
$volCESecondQM = floatval($formValues['volCESecondQM'][$i]);
$volCEThirdQM = floatval($formValues['volCEThirdQM'][$i]);
$volCEFourthQM = floatval($formValues['volCEFourthQM'][$i]);
$volCEFifthQM = floatval($formValues['volCEFifthQM'][$i]);
$volCESixthQM = floatval($formValues['volCESixthQM'][$i]);
$volCoffeeEx = floatval($formValues['volCoffeeEx'][$i]);
$volCo = $formValues['volCoffeeExDetails'][$i];
$volCoffeeExDetails = ($volCo) == "-"?"":$volCo;
$volCEUgxFirstQM = floatval($formValues['volCEUgxFirstQM'][$i]);
$volCEUgxSecondQM = floatval($formValues['volCEUgxSecondQM'][$i]);
$volCEUgxThirdQM = floatval($formValues['volCEUgxThirdQM'][$i]);
$volCEUgxFourthQM = floatval($formValues['volCEUgxFourthQM'][$i]);
$volCEUgxFifthQM = floatval($formValues['volCEUgxFifthQM'][$i]);
$volCEUgxSixthQM = floatval($formValues['volCEUgxSixthQM'][$i]);
$volCoffeeExUgx = floatval($formValues['volCoffeeExUgx'][$i]);
$volBEFirstQM = floatval($formValues['volBEFirstQM'][$i]);
$volBESecondQM = floatval($formValues['volBESecondQM'][$i]);
$volBEThirdQM = floatval($formValues['volBEThirdQM'][$i]);
$volBEFourthQM = floatval($formValues['volBEFourthQM'][$i]);
$volBEFifthQM = floatval($formValues['volBEFifthQM'][$i]);
$volBESixthQM = floatval($formValues['volBESixthQM'][$i]);
$volBeansEx = floatval($formValues['volBeansEx'][$i]);
$volBe = $formValues['volBeansExDetails'][$i];
$volBeansExDetails = ($volBe) == "-"?"":$volBe;
$volBEUgxFirstQM = floatval($formValues['volBEUgxFirstQM'][$i]);
$volBEUgxSecondQM = floatval($formValues['volBEUgxSecondQM'][$i]);
$volBEUgxThirdQM = floatval($formValues['volBEUgxThirdQM'][$i]);
$volBEUgxFourthQM = floatval($formValues['volBEUgxFourthQM'][$i]);
$volBEUgxFifthQM = floatval($formValues['volBEUgxFifthQM'][$i]);
$volBEUgxSixthQM = floatval($formValues['volBEUgxSixthQM'][$i]);
$volBeansExUgx = floatval($formValues['volBeansExUgx'][$i]);
$epayRFirstQM = floatval($formValues['epayRFirstQM'][$i]);
$epayRSecondQM = floatval($formValues['epayRSecondQM'][$i]);
$epayRThirdQM = floatval($formValues['epayRThirdQM'][$i]);
$epayRFourthQM = floatval($formValues['epayRFourthQM'][$i]);
$epayRFifthQM = floatval($formValues['epayRFifthQM'][$i]);
$epayRSixthQM = floatval($formValues['epayRSixthQM'][$i]);
$epayRecieved = floatval($formValues['epayRecieved'][$i]);
$epayR = $formValues['epayRecievedDetails'][$i];
$epayRecievedDetails = ($epayR) == "-"?"":$epayR;
$epayMFirstQM = floatval($formValues['epayMFirstQM'][$i]);
$epayMSecondQM = floatval($formValues['epayMSecondQM'][$i]);
$epayMThirdQM = floatval($formValues['epayMThirdQM'][$i]);
$epayMFourthQM = floatval($formValues['epayMFourthQM'][$i]);
$epayMFifthQM = floatval($formValues['epayMFifthQM'][$i]);
$epayMSixthQM = floatval($formValues['epayMSixthQM'][$i]);
$epayMade = floatval($formValues['epayMade'][$i]);
$epayM = $formValues['epayMadeDetails'][$i];	
$epayMadeDetails = ($epayM) == "-"?"":$epayM;  
$storageCapNew=0.0;
$storageCapImproved=0.0;
 
$stmnt_form3="UPDATE `tbl_form3_exporters` SET 
`exTradersSupplyChain`='".$exTradersSupplyChain ."',
`exTradersSupplyChainDetails`='".$exTradersSupplyChainDetails."',
`exUnionSupplyChain`='".$exUnionSupplyChain."',
`exUnionsSupplyChainDetails`='".$exUnionsSupplyChainDetails."',
`volMaizePurchased`='".$volMaizePurchased."',
`volMaizePurchasedDetails`='".$volMaizePurchasedDetails."',
`volCoffeePurchased`='".$volCoffeePurchased."',
`volCoffeePurchasedDetails`='".$volCoffeePurchasedDetails."',
`volBeansPurchased`='".$volBeansPurchased."',
`volBeansPurchasedDetails`='".$volBeansPurchasedDetails."',
`volMaizeEx`='".$volMaizeEx."',
`volMaizeExDetails`='".$volMaizeExDetails."',
`volCoffeeEx`='".$volCoffeeEx."',
`volCoffeeExDetails`='".$volCoffeeExDetails."',
`volBeansEx`='".$volBeansEx."',
`volBeansExDetails`='".$volBeansExDetails."',
`epayRecieved`='".$epayRecieved."',
`epayRecievedDetails`='".$epayRecievedDetails."',
`epayMade`='".$epayMade."',
`epayMadeDetails`='".$epayMadeDetails."',
`storageCapNew`='".$storageCapNew."',
`storageCapNewDetails`='".$storageCapNewDetails."',
`storageCapImproved`='".$storageCapImproved."',
`storageCapImprovedDetails`='".$storageCapImprovedDetails."',
`updatedby`='".$_SESSION['username']."',
`epayMadeFifthQuarterMonth` = '".$epayMFifthQM."',
`epayMadeFirstQuarterMonth` = '".$epayMFirstQM."',
`epayMadeFourthQuarterMonth` = '".$epayMFourthQM."',
`epayMadeSecondQuarterMonth` = '".$epayMSecondQM."',
`epayMadeSixthQuarterMonth` = '".$epayMSixthQM."',
`epayMadeThirdQuarterMonth` = '".$epayMThirdQM."',
`epayRecievedFifthQuarterMonth` = '".$epayRFifthQM."',
`epayRecievedFirstQuarterMonth` = '".$epayRFirstQM."',
`epayRecievedFourthQuarterMonth` = '".$epayRFourthQM."',
`epayRecievedSecondQuarterMonth` = '".$epayRSecondQM."',
`epayRecievedSixthQuarterMonth` = '".$epayRSixthQM."',
`epayRecievedThirdQuarterMonth` = '".$epayRThirdQM."',
`exTradersSupplyChainFifthQuarterMonth` = '".$exTSCFifthQM."',
`exTradersSupplyChainFirstQuarterMonth` = '".$exTSCFirstQM."',
`exTradersSupplyChainFourthQuarterMonth` = '".$exTSCFourthQM."',
`exTradersSupplyChainSecondQuarterMonth` = '".$exTSCSecondQM."',
`exTradersSupplyChainSixthQuarterMonth` = '".$exTSCSixthQM."',
`exTradersSupplyChainThirdQuarterMonth` = '".$exTSCThirdQM."',
`exUnionSupplyChainFifthQuarterMonth` = '".$exUSCFifthQM."',
`exUnionSupplyChainFirstQuarterMonth` = '".$exUSCFirstQM."',
`exUnionSupplyChainFourthQuarterMonth` = '".$exUSCFourthQM."',
`exUnionSupplyChainSecondQuarterMonth` = '".$exUSCSecondQM."',
`exUnionSupplyChainSixthQuarterMonth` = '".$exUSCSixthQM."',
`exUnionSupplyChainThirdQuarterMonth` = '".$exUSCThirdQM."',
`volBeansExFifthQuarterMonth` = '".$volBEFifthQM."',
`volBeansExFirstQuarterMonth` = '".$volBEFirstQM."',
`volBeansExFourthQuarterMonth` = '".$volBEFourthQM."',
`volBeansExSecondQuarterMonth` = '".$volBESecondQM."',
`volBeansExSixthQuarterMonth` = '".$volBESixthQM."',
`volBeansExThirdQuarterMonth` = '".$volBEThirdQM."',
`volBeansExUgx` = '".$volBeansExUgx."',
`volBeansExUgxDetails` = '".$volBeansExUgxDetails."',
`volBeansExUgxFifthQuarterMonth` = '".$volBEUgxFifthQM."',
`volBeansExUgxFirstQuarterMonth` = '".$volBEUgxFirstQM."',
`volBeansExUgxFourthQuarterMonth` = '".$volBEUgxFourthQM."',
`volBeansExUgxSecondQuarterMonth` = '".$volBEUgxSecondQM."',
`volBeansExUgxSixthQuarterMonth` = '".$volBEUgxSixthQM."',
`volBeansExUgxThirdQuarterMonth` = '".$volBEUgxThirdQM."',
`volBeansPurchasedFifthQuarterMonth` = '".$volBPFifthQM."',
`volBeansPurchasedFirstQuarterMonth` = '".$volBPFirstQM."',
`volBeansPurchasedFourthQuarterMonth` = '".$volBPFourthQM."',
`volBeansPurchasedSecondQuarterMonth` = '".$volBPSecondQM."',
`volBeansPurchasedSixthQuarterMonth` = '".$volBPSixthQM."',
`volBeansPurchasedThirdQuarterMonth` = '".$volBPThirdQM."',
`volCoffeeExFifthQuarterMonth` = '".$volCPFifthQM."',
`volCoffeeExFirstQuarterMonth` = '".$volCPFirstQM."',
`volCoffeeExFourthQuarterMonth` = '".$volCPFourthQM."',
`volCoffeeExSecondQuarterMonth` = '".$volCPSecondQM."',
`volCoffeeExSixthQuarterMonth` = '".$volCPSixthQM."',
`volCoffeeExThirdQuarterMonth` = '".$volCPThirdQM."',
`volCoffeeExUgx` = '".$volCoffeeExUgx."',
`volCoffeeExUgxDetails` = '".$volCoffeeExUgxDetails."',
`volCoffeeExUgxFifthQuarterMonth` = '".$volCEFifthQM."',
`volCoffeeExUgxFirstQuarterMonth` = '".$volCEFirstQM."',
`volCoffeeExUgxFourthQuarterMonth` = '".$volCEFourthQM."',
`volCoffeeExUgxSecondQuarterMonth` = '".$volCESecondQM."',
`volCoffeeExUgxSixthQuarterMonth` = '".$volCESixthQM."',
`volCoffeeExUgxThirdQuarterMonth` = '".$volCEThirdQM."',
`volCoffeePurchasedFifthQuarterMonth` = '".$volCPFifthQM."',
`volCoffeePurchasedFirstQuarterMonth` = '".$volCPFirstQM."',
`volCoffeePurchasedFourthQuarterMonth` = '".$volCPFourthQM."',
`volCoffeePurchasedSecondQuarterMonth` = '".$volCPSecondQM."',
`volCoffeePurchasedSixthQuarterMonth` = '".$volCPSixthQM."',
`volCoffeePurchasedThirdQuarterMonth` = '".$volCPThirdQM."',
`volMaizeExFifthQuarterMonth` = '".$volMEFifthQM."',
`volMaizeExFirstQuarterMonth` = '".$volMEFirstQM."',
`volMaizeExFourthQuarterMonth` = '".$volMEFourthQM."',
`volMaizeExSecondQuarterMonth` = '".$volMESecondQM."',
`volMaizeExSixthQuarterMonth` = '".$volMESixthQM."',
`volMaizeExThirdQuarterMonth` = '".$volMEThirdQM."',
`volMaizeExUgx` = '".$volMaizeExUgx."',
`volMaizeExUgxDetails` = '".$volMaizeExUgxDetails."',
`volMaizeExUgxFifthQuarterMonth` = '".$volMEUgxFifthQM."',
`volMaizeExUgxFirstQuarterMonth` = '".$volMEUgxFirstQM."',
`volMaizeExUgxFourthQuarterMonth` = '".$volMEUgxFourthQM."',
`volMaizeExUgxSecondQuarterMonth` = '".$volMEUgxSecondQM."',
`volMaizeExUgxSixthQuarterMonth` = '".$volMEUgxSixthQM."',
`volMaizeExUgxThirdQuarterMonth` = '".$volMEUgxThirdQM."',
`volMaizePurchasedFifthQuarterMonth` = '".$volMPFifthQM."',
`volMaizePurchasedFirstQuarterMonth` = '".$volMPFirstQM."',
`volMaizePurchasedFourthQuarterMonth` = '".$volMPFourthQM."',
`volMaizePurchasedSecondQuarterMonth` = '".$volMPSecondQM."',
`volMaizePurchasedSixthQuarterMonth` = '".$volMPSixthQM."',
`volMaizePurchasedThirdQuarterMonth` = '".$volMPThirdQM."'
WHERE tbl_form3_exportersId='".$tbl_form3_exportersId."'";

 //$obj->alert($stmnt_form3);
 //$query=@mysql_query($stmnt_form3)or die(http(10080));
 $query=@mysql_query($stmnt_form3)or die(mysql_error());		
                 
                 }
	$obj->assign('bodyDisplay','innerHTML',congMsg("Exporter record(s) Successfully Updated!"));
	$obj->call('xajax_view_form3','','','','','',1,20);
 return $obj;
 }
 function edit_traders_form4($formValues){
 $obj=new xajaxResponse();
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 //$_SESSION['Jovan']=1;
 $n=1;
 $inc=1;
 
 
 
 $data.="<form action=\"".$PHP_SELF."\" name='form4' id='form4' method='post'>";
 

 for($i=0;$i<count($formValues['loopkey']);$i++){
	$x="SELECT w . * , x.`traderName`
         FROM `tbl_form4_traders` w, `tbl_traders` x
         WHERE w.`tbl_traderId` = x.`tbl_tradersId`
         AND w.`tbl_form4_tradersId`='".$formValues['tbl_form4_tradersId'][$i]."'";
		 //$obj->alert($x);
			$q=Execute($x)or die(http(7833));
			while($rowz=FetchRecords($q)){
				$nameOfTrader=$rowz['traderName'];
			    $reportingPeriod=$rowz['reportingPeriod'];
			    $recordId=$rowz['tbl_form4_tradersId'];
			    $year=$rowz['year'];
				
				$data.="<table bgcolor='#FFFFCC' border='0' cellspacing='1' cellpadding='1' width='100%'>";
					$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1' />
					 <input name='tbl_form4_tradersId[]' type='hidden' id='tbl_form4_tradersId".$n."' size='25' value='".$rowz['tbl_form4_tradersId']."'/>";
					   
					   $data.="<tr><td colspan='12'>";
							$data.="<table border='0' cellspacing='1' cellpadding='1' width='100%'>
									 <tr class='evenrow'>
									  <td colspan='12' align='center'><h1>USAID/UGANDA FTF COMMODITY PRODUCTION AND MARKETING ACTIVITY</h1></td>
									</tr>
									<tr class='evenrow'>
									  <td colspan='12' align='center'><h2>TRADER DATA COLLECTION FORM(EDIT MODULE)</h2></td>
									</tr>
								</table>";
						$data.="</td></tr>";
   
					   $data.="<tr><td colspan='12'>";
							$data.="<table border='0' cellspacing='1' cellpadding='5'>
							  <tr>
							  <td colspan='2'><strong>Name of Name of Business/ Trader:</strong> ".$nameOfTrader."</td>
								<td>&nbsp;</td>
								<td><strong>Reporting Period:</strong></td>
								<td align='left'>".$reportingPeriod."</td>
								<td><strong>Year:</strong></td>
								<td colspan='2' align='left'>".$year."</td>
								<td colspan='3'></td>
								<td></td>
								</tr>
								</table>";
						$data.="</td></tr>";
	
	
					 $data.="<tr><td colspan='12'>";
						$data.="<table id='summations' border='0' cellspacing='1' cellpadding='1'>";
						
							 $data.="<tr>
										<th colspan='2' rowspan='2'>Performance Indicator<img src='' height='0.2' width='300px'/></th>
										<th colspan='7' >Achievements</th>
										<th rowspan='2'>Details<img src='' height='0.2' width='200px'/></th>
									  </tr>";
									  $data.="<tr>";
				  
										if(($reportingPeriod)=="Apr - Sep"){
										$monthsArray=array('4','5','6','7','8','9');
										foreach ($monthsArray as $key) {
										$month= __month__coverter($key); 
										$result = substr($month, 0, 3);
										$data.="<th >".$result."</th>";	
										}
										}else if(($reportingPeriod)=="Oct - Mar"){
										$monthsArray=array('10','11','12','1','2','3');
										foreach ($monthsArray as $key) {
										$month= __month__coverter($key); 
										$result = substr($month, 0, 3);	
										$data.="<th >".$result."</th>";	
										}
										}  
				  

					
									$data.="<th >Total</th>";
									$data.="</tr>";
	
						$query_string="SELECT 
						`x`.`tbl_form4_tradersId`,
						`x`.`tbl_traderId`,
						`x`.`reportingPeriod`,
						`x`.`year`,
						`x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
						`x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
						`x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
						`x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
						`x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
						`x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
						`x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
						`x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
						`x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
						`x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
						`x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
						`x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
						`x`.`vaSupplyChainFifthQuarterMonth` as `trVaSCFifthQM`,
						`x`.`vaSupplyChainFirstQuarterMonth` as `trVaSCFirstQM`,
						`x`.`vaSupplyChainFourthQuarterMonth` as `trVaSCFourthQM`,
						`x`.`vaSupplyChainSecondQuarterMonth` as `trVaSCSecondQM`,
						`x`.`vaSupplyChainSixthQuarterMonth` as `trVaSCSixthQM`, 
						`x`.`vaSupplyChainThirdQuarterMonth` as `trVaSCThirdQM`,
						`x`.`vaSupplyChainDetails`,
						`x`.`numCboFifthQuarterMonth` as `vaUSCFifthQM`, 
						`x`.`numCboFirstQuarterMonth` as `vaUSCFirstQM`, 
						`x`.`numCboFourthQuarterMonth` as `vaUSCFourthQM`, 
						`x`.`numCboSecondQuarterMonth` as `vaUSCSecondQM`, 
						`x`.`numCboSixthQuarterMonth` as `vaUSCSixthQM`,  
						`x`.`numCboThirdQuarterMonth` as `vaUSCThirdQM`,
						`x`.`numCboDetails`,
						`x`.`volMaizePurchasedDetails`,
						`x`.`volMaizeExDetails`,
						`x`.`volCoffeeExDetails`,
						`x`.`volBeansExDetails`,
						`x`.`epayRecievedDetails`,
						`x`.`epayMadeDetails`,
						`x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
						`x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
						`x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
						`x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
						`x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
						`x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
						`x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
						`x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
						`x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
						`x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
						`x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
						`x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
						`x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
						`x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
						`x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
						`x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
						`x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
						`x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
						`x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
						`x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
						`x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
						`x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
						`x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
						`x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
						`x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
						`x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
						`x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
						`x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
						`x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
						`x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
						`x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
						`x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
						`x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
						`x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
						`x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
						`x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
						`x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
						`x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
						`x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
						`x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
						`x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
						`x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
						`x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
						`x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
						`x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
						`x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
						`x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
						`x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
						`x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
						`x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
						`x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
						`x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
						`x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
						`x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
						`x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
						`x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
						`x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`
						FROM `tbl_form4_traders` as `x`
						WHERE `x`.`tbl_form4_tradersId`='".$recordId."'
						and `x`.`reportingPeriod`='".$reportingPeriod."'";
	
							$query=mysql_query($query_string)or die(http(5827));
							$row=mysql_fetch_array($query);
								
								$data.="<tr class='white1'>";
								$data.="<td colspan='2'><strong>Number of VAs in the supply chain</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='trVaSCFirstQM[]' value='".$row['trVaSCFirstQM']."'	id='trVaSCFirstQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='trVaSCSecondQM[]' value='".$row['trVaSCSecondQM']."' id='trVaSCSecondQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='trVaSCThirdQM[]' value='".$row['trVaSCThirdQM']."' 	id='trVaSCThirdQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='trVaSCFourthQM[]' value='".$row['trVaSCFourthQM']."' id='trVaSCFourthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='trVaSCFifthQM[]' value='".$row['trVaSCFifthQM']."' 	id='trVaSCFifthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='trVaSCSixthQM[]' value='".$row['trVaSCSixthQM']."' 	id='trVaSCSixthQM".$n."' class='computable' type='text' /></td>";
								$totTSC=($row['trVaSCFirstQM']+$row['trVaSCSecondQM']+$row['trVaSCThirdQM']+$row['trVaSCFourthQM']+$row['trVaSCFifthQM']+$row['trVaSCSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='vaSupplyChain[]' id='vaSupplyChain".$n."' class='computable-result' type='text' value='".$totTSC."'/></td>";
								$data.="<td><textarea name='vaSupplyChainDetails[]' id='vaSupplyChainDetails".$n."' cols='30' rows='3'>".$row['vaSupplyChainDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td colspan='2'><strong>Number of CBOs/unions/societies in the supply Chain</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='vaUSCFirstQM[]' value='".$row['vaUSCFirstQM']."' 	id='vaUSCFirstQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='vaUSCSecondQM[]' value='".$row['vaUSCSecondQM']."' id='vaUSCSecondQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='vaUSCThirdQM[]' value='".$row['vaUSCThirdQM']."' 	id='vaUSCThirdQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='vaUSCFourthQM[]' value='".$row['vaUSCFourthQM']."' id='vaUSCFourthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='vaUSCFifthQM[]' value='".$row['vaUSCFifthQM']."' 	id='vaUSCFifthQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='vaUSCSixthQM[]' value='".$row['vaUSCSixthQM']."' 	id='vaUSCSixthQM".$n."' class='computable'  type='text' /></td>";
								$totUSC=($row['vaUSCFirstQM']+$row['vaUSCSecondQM']+$row['vaUSCThirdQM']+$row['vaUSCFourthQM']+$row['vaUSCFifthQM']+$row['vaUSCSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='numCbo[]' id='numCbo".$n."' class='computable-result' type='text' value='".$totUSC."'/></td>";
								$data.="<td><textarea name='numCboDetails[]' id='numCboDetails".$n."' cols='30' rows='3'>".$row['numCboDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td rowspan='3'><strong>Volume of produce purchased (Kgs)</strong></td>";
								$data.="<td><strong>Maize</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPFirstQM[]' value='".$row['volMPFirstQM']."'  	id='volMPFirstQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPSecondQM[]' value='".$row['volMPSecondQM']."'  id='volMPSecondQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPThirdQM[]' value='".$row['volMPThirdQM']."'   id='volMPThirdQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPFourthQM[]' value='".$row['volMPFourthQM']."'  id='volMPFourthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPFifthQM[]' value='".$row['volMPFifthQM']."'   id='volMPFifthQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMPSixthQM[]' value='".$row['volMPSixthQM']."'   id='volMPSixthQM".$n."' class='computable'  type='text' /></td>";
								$totVolMP=($row['volMPFirstQM']+$row['volMPSecondQM']+$row['volMPThirdQM']+$row['volMPFourthQM']+$row['volMPFifthQM']+$row['volMPSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volMaizePurchased[]' id='volMaizePurchased".$n."' class='computable-result' type='text' value='".$totVolMP."'/></td>";
								$data.="<td rowspan='3'><textarea name='volMaizePurchasedDetails[]' id='volMaizePurchasedDetails".$n."' cols='30' rows='3'>".$row['volMaizePurchasedDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td><strong>Coffee</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPFirstQM[]' value='".$row['volCPFirstQM']."'  id='volCPFirstQM".$n."' class='computable' 	 type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPSecondQM[]' value='".$row['volCPSecondQM']."'  id='volCPSecondQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPThirdQM[]' value='".$row['volCPThirdQM']."'  id='volCPThirdQM".$n."' class='computable'   type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPFourthQM[]' value='".$row['volCPFourthQM']."'  id='volCPFourthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPFifthQM[]' value='".$row['volCPFifthQM']."'  id='volCPFifthQM".$n."'  class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCPSixthQM[]' value='".$row['volCPSixthQM']."'  id='volCPSixthQM".$n."'  class='computable'  type='text' /></td>";
								$totvolCP=($row['volCPFirstQM']+$row['volCPSecondQM']+$row['volCPThirdQM']+$row['volCPFourthQM']+$row['volCPFifthQM']+$row['volCPSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volCoffeePurchased[]' id='volCoffeePurchased".$n."' class='computable-result' type='text' value='".$totvolCP."'/></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td><strong>Beans</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPFirstQM[]' value='".$row['volBPFirstQM']."'  id='volBPFirstQM".$n."' class='computable'    type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPSecondQM[]' value='".$row['volBPSecondQM']."'  id='volBPSecondQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPThirdQM[]' value='".$row['volBPThirdQM']."'  id='volBPThirdQM".$n."' class='computable'   type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPFourthQM[]' value='".$row['volBPFourthQM']."'  id='volBPFourthQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPFifthQM[]' value='".$row['volBPFifthQM']."'  id='volBPFifthQM".$n."' class='computable'    type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBPSixthQM[]' value='".$row['volBPSixthQM']."'  id='volBPSixthQM".$n."' class='computable'   type='text' /></td>";
								$totvolBP=($row['volBPFirstQM']+$row['volBPSecondQM']+$row['volBPThirdQM']+$row['volBPFourthQM']+$row['volBPFifthQM']+$row['volBPSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volBeansPurchased[]' id='volBeansPurchased".$n."' class='computable-result' type='text' value='".$totvolBP."'/></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td rowspan='2'><strong>Maize Exports: <i>Volumes and Values</i></strong></td>";
								$data.="<td><strong><i>Volume (Kg)</i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEFirstQM[]' value='".$row['volMEFirstQM']."'  id='volMEFirstQM".$n."' class='computable'   type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMESecondQM[]' value='".$row['volMESecondQM']."'  id='volMESecondQM".$n."' class='computable'  type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEThirdQM[]' value='".$row['volMEThirdQM']."'  id='volMEThirdQM".$n."' class='computable'   type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEFourthQM[]' value='".$row['volMEFourthQM']."'  id='volMEFourthQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEFifthQM[]' value='".$row['volMEFifthQM']."'  id='volMEFifthQM".$n."' class='computable'   type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMESixthQM[]' value='".$row['volMESixthQM']."'  id='volMESixthQM".$n."' class='computable'   type='text' /></td>";
								$totvolME=($row['volMEFirstQM']+$row['volMESecondQM']+$row['volMEThirdQM']+$row['volMEFourthQM']+$row['volMEFifthQM']+$row['volMESixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='	volMaizeEx[]' id='volMaizeEx".$n."' class='computable-result' type='text' value='".$totvolME."'/></td>";
								$data.="<td rowspan='2'><textarea name='volMaizeExDetails[]' id='volMaizeExDetails".$n."' cols='30' rows='3'>".$row['volMaizeExDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td><strong><i>Value (UGX)</i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" value='".$row['volMEUgxFirstQM']."' name='volMEUgxFirstQM[]' id='volMEUgxFirstQM".$n."' class='computable' type='text' /></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEUgxSecondQM[]' id='volMEUgxSecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volMEUgxSecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEUgxThirdQM[]' id='volMEUgxThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volMEUgxThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEUgxFourthQM[]' id='volMEUgxFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volMEUgxFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEUgxFifthQM[]' id='volMEUgxFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volMEUgxFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volMEUgxSixthQM[]' id='volMEUgxSixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volMEUgxSixthQM']."'/></td>";
								$totvolMEUgx=($row['volMEUgxFirstQM']+$row['volMEUgxSecondQM']+$row['volMEUgxThirdQM']+$row['volMEUgxFourthQM']+$row['volMEUgxFifthQM']+$row['volMEUgxSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volMaizeExUgx[]' id='volMaizeExUgx".$n."' class='computable-result' type='text' value='".$totvolMEUgx."'/></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td rowspan='2'><strong>Coffee Exports: <i>Volumes and Values</i><strong></td>";
								$data.="<td><strong><i>Volume (Kg)</i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEFirstQM[]' id='volCEFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCESecondQM[]' id='volCESecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCESecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEThirdQM[]' id='volCEThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEFourthQM[]' id='volCEFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEFifthQM[]' id='volCEFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCESixthQM[]' id='volCESixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCESixthQM']."'/></td>";
								$totvolCE=($row['volCEFirstQM']+$row['volCESecondQM']+$row['volCEThirdQM']+$row['volCEFourthQM']+$row['volCEFifthQM']+$row['volCESixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volCoffeeEx[]' id='volCoffeeEx".$n."' class='computable-result' type='text' value='".$totvolCE."'/></td>";
								$data.="<td rowspan='2' ><textarea name='volCoffeeExDetails[]' id='volCoffeeExDetails".$n."'  cols='30' rows='3'>".$row['volCoffeeExDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td><strong><i>Value (UGX)</i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxFirstQM[]' id='volCEUgxFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxSecondQM[]' id='volCEUgxSecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxSecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxThirdQM[]' id='volCEUgxThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxFourthQM[]' id='volCEUgxFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxFifthQM[]' id='volCEUgxFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volCEUgxSixthQM[]' id='volCEUgxSixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volCEUgxSixthQM']."'/></td>";
								$totvolCEUgx=($row['volCEUgxFirstQM']+$row['volCEUgxSecondQM']+$row['volCEUgxThirdQM']+$row['volCEUgxFourthQM']+$row['volCEUgxFifthQM']+$row['volCEUgxSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volCoffeeExUgx[]' id='volCoffeeExUgx".$n."' class='computable-result' type='text' value='".$totvolCEUgx."'/></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td rowspan='2'><strong>Bean Exports: <i>volumes and values</i></strong></td>";
								$data.="<td><strong><i>Volume (Kg)</i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEFirstQM[]' id='volBEFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBESecondQM[]' id='volBESecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBESecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEThirdQM[]' id='volBEThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEFourthQM[]' id='volBEFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEFifthQM[]' id='volBEFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBESixthQM[]' id='volBESixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBESixthQM']."'/></td>";
								$totvolBE=($row['volBEFirstQM']+$row['volBESecondQM']+$row['volBEThirdQM']+$row['volBEFourthQM']+$row['volBEFifthQM']+$row['volBESixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volBeansEx[]' id='volBeansEx".$n."' class='computable-result' type='text' value='".$totvolBE."'/></td>";
								$data.="<td rowspan='2' ><textarea name='volBeansExDetails[]' id='volBeansExDetails".$n."' cols='30' rows='3'>".$row['volBeansExDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td><strong><i>Value(UGX)<i></strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxFirstQM[]' id='volBEUgxFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxSecondQM[]' id='volBEUgxSecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxSecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxThirdQM[]' id='volBEUgxThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxFourthQM[]' id='volBEUgxFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxFifthQM[]' id='volBEUgxFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='volBEUgxSixthQM[]' id='volBEUgxSixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['volBEUgxSixthQM']."'/></td>";
								$totvolBEUgx=($row['volBEUgxFirstQM']+$row['volBEUgxSecondQM']+$row['volBEUgxThirdQM']+$row['volBEUgxFourthQM']+$row['volBEUgxFifthQM']+$row['volBEUgxSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='volBeansExUgx[]' id='volBeansExUgx".$n."' class='computable-result' type='text' value='".$totvolBEUgx."'/></td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td colspan='2'><strong>Number of e-payments received</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRFirstQM[]' id='epayRFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRSecondQM[]' id='epayRSecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRSecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRThirdQM[]' id='epayRThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRFourthQM[]' id='epayRFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRFifthQM[]' id='epayRFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayRSixthQM[]' id='epayRSixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayRSixthQM']."'/></td>";
								$totepayR=($row['epayRFirstQM']+$row['epayRSecondQM']+$row['epayRThirdQM']+$row['epayRFourthQM']+$row['epayRFifthQM']+$row['epayRSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='epayRecieved[]' id='epayRecieved".$n."' class='computable-result' type='text' value='".$totepayR."'/></td>";
								$data.="<td><textarea name='epayRecievedDetails[]' id='epayRecievedDetails".$n."' cols='30' rows='3'>".$row['epayRecievedDetails']."</textarea></td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td colspan='2'><strong>Number of e-payments made</strong></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMFirstQM[]' id='epayMFirstQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMFirstQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMSecondQM[]' id='epayMSecondQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMSecondQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMThirdQM[]' id='epayMThirdQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMThirdQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMFourthQM[]' id='epayMFourthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMFourthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMFifthQM[]' id='epayMFifthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMFifthQM']."'/></td>";
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" name='epayMSixthQM[]' id='epayMSixthQM".$n."' class='computable' type='text' onkeypress='return numbersonly(event, false)' value='".$row['epayMSixthQM']."'/></td>";
								$totepayM=($row['epayMFirstQM']+$row['epayMSecondQM']+$row['epayMThirdQM']+$row['epayMFourthQM']+$row['epayMFifthQM']+$row['epayMSixthQM']);
								$data.="<td align='right'><input onkeypress=\"return numbersonly(event, false)\" readonly=readonly name='epayMade[]' id='epayMade".$n."' class='computable-result' type='text' value='".$totepayM."'/></td>";
								$data.="<td><textarea name='epayMadeDetails[]' id='epayMadeDetails".$n."' cols='30' rows='3'>".$row['epayMadeDetails']."</textarea></td>";
							  $data.="</tr>";
							  $n++;
						   }
						   
					   }
				   
				   $data.="</table>";
	$data.="</td></tr>";
$data.="</table>";
 
 
 $data.="
 <table width='100%'>
 <tr class='evenrow'>
     <td colspan=22>
         <div align='right'>
                 <input type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_traders_form4(xajax.getFormValues('form4')); return false;\" />
         </div>
     </td>
 </tr>
 </table>
 
 </form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 $obj->call("sumComputable"); 
 return $obj;
 }
 function update_traders_form4($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 for($i=0;$i<count($formValues['loopkey']);$i++){
$tbl_form4_tradersId = $formValues['tbl_form4_tradersId'][$i];
$volCoffeeP = $formValues['volCoffeePurchasedDetails'][$i];
$volCoffeePurchasedDetails = ($volCoffeeP)=="-"?"":$volCoffeeP;
$volBeansP = $formValues['volBeansPurchasedDetails'][$i];
$volBeansPurchasedDetails = ($volBeansP)=="-"?"":$volBeansP;
//Submission Details
$trVaSCFirstQM = floatval($formValues['trVaSCFirstQM'][$i]);
$trVaSCSecondQM = floatval($formValues['trVaSCSecondQM'][$i]);
$trVaSCThirdQM = floatval($formValues['trVaSCThirdQM'][$i]);
$trVaSCFourthQM = floatval($formValues['trVaSCFourthQM'][$i]);
$trVaSCFifthQM = floatval($formValues['trVaSCFifthQM'][$i]);
$trVaSCSixthQM = floatval($formValues['trVaSCSixthQM'][$i]);
$vaSupplyChain = floatval($formValues['vaSupplyChain'][$i]);
$exTraders = $formValues['vaSupplyChainDetails'][$i];
$vaSupplyChainDetails = ($exTraders)=="-"?"":$exTraders;
$vaUSCFirstQM = floatval($formValues['vaUSCFirstQM'][$i]);
$vaUSCSecondQM = floatval($formValues['vaUSCSecondQM'][$i]);
$vaUSCThirdQM = floatval($formValues['vaUSCThirdQM'][$i]);
$vaUSCFourthQM = floatval($formValues['vaUSCFourthQM'][$i]);
$vaUSCFifthQM = floatval($formValues['vaUSCFifthQM'][$i]);
$vaUSCSixthQM = floatval($formValues['vaUSCSixthQM'][$i]);
$numCbo = floatval($formValues['numCbo'][$i]);
$exUnionsSupply = $formValues['numCboDetails'][$i];
$numCboDetails  = ($exUnionsSupply)=="-"?"":$exUnionsSupply;
$volMPFirstQM = floatval($formValues['volMPFirstQM'][$i]);
$volMPSecondQM = floatval($formValues['volMPSecondQM'][$i]);
$volMPThirdQM = floatval($formValues['volMPThirdQM'][$i]);
$volMPFourthQM = floatval($formValues['volMPFourthQM'][$i]);
$volMPFifthQM = floatval($formValues['volMPFifthQM'][$i]);
$volMPSixthQM = floatval($formValues['volMPSixthQM'][$i]);
$volMaizePurchased = $formValues['volMaizePurchased'][$i];
$volMaizeP = $formValues['volMaizePurchasedDetails'][$i];
$volMaizePurchasedDetails = ($volMaizeP)=="-"?"":$volMaizeP;
$volCPFirstQM = floatval($formValues['volCPFirstQM'][$i]);
$volCPSecondQM = floatval($formValues['volCPSecondQM'][$i]);
$volCPThirdQM = floatval($formValues['volCPThirdQM'][$i]);
$volCPFourthQM = floatval($formValues['volCPFourthQM'][$i]);
$volCPFifthQM = floatval($formValues['volCPFifthQM'][$i]);
$volCPSixthQM = floatval($formValues['volCPSixthQM'][$i]);
$volCoffeePurchased = floatval($formValues['volCoffeePurchased'][$i]);
$volBPFirstQM = floatval($formValues['volBPFirstQM'][$i]);
$volBPSecondQM = floatval($formValues['volBPSecondQM'][$i]);
$volBPThirdQM = floatval($formValues['volBPThirdQM'][$i]);
$volBPFourthQM = floatval($formValues['volBPFourthQM'][$i]);
$volBPFifthQM = floatval($formValues['volBPFifthQM'][$i]);
$volBPSixthQM = floatval($formValues['volBPSixthQM'][$i]);
$volBeansPurchased = floatval($formValues['volBeansPurchased'][$i]);
$volMEFirstQM = floatval($formValues['volMEFirstQM'][$i]);
$volMESecondQM = floatval($formValues['volMESecondQM'][$i]);
$volMEThirdQM = floatval($formValues['volMEThirdQM'][$i]);
$volMEFourthQM = floatval($formValues['volMEFourthQM'][$i]);
$volMEFifthQM = floatval($formValues['volMEFifthQM'][$i]);
$volMESixthQM = floatval($formValues['volMESixthQM'][$i]);
$volMaizeEx = floatval($formValues['volMaizeEx'][$i]);
$volMa = $formValues['volMaizeExDetails'][$i];
$volMaizeExDetails = ($volMa) == "-"?"":$volMa;
$volMEUgxFirstQM = floatval($formValues['volMEUgxFirstQM'][$i]);
$volMEUgxSecondQM = floatval($formValues['volMEUgxSecondQM'][$i]);
$volMEUgxThirdQM = floatval($formValues['volMEUgxThirdQM'][$i]);
$volMEUgxFourthQM = floatval($formValues['volMEUgxFourthQM'][$i]);
$volMEUgxFifthQM = floatval($formValues['volMEUgxFifthQM'][$i]);
$volMEUgxSixthQM = floatval($formValues['volMEUgxSixthQM'][$i]);
$volMaizeExUgx = floatval($formValues['volMaizeExUgx'][$i]);
$volCEFirstQM = floatval($formValues['volCEFirstQM'][$i]);
$volCESecondQM = floatval($formValues['volCESecondQM'][$i]);
$volCEThirdQM = floatval($formValues['volCEThirdQM'][$i]);
$volCEFourthQM = floatval($formValues['volCEFourthQM'][$i]);
$volCEFifthQM = floatval($formValues['volCEFifthQM'][$i]);
$volCESixthQM = floatval($formValues['volCESixthQM'][$i]);
$volCoffeeEx = floatval($formValues['volCoffeeEx'][$i]);
$volCo = $formValues['volCoffeeExDetails'][$i];
$volCoffeeExDetails = ($volCo) == "-"?"":$volCo;
$volCEUgxFirstQM = floatval($formValues['volCEUgxFirstQM'][$i]);
$volCEUgxSecondQM = floatval($formValues['volCEUgxSecondQM'][$i]);
$volCEUgxThirdQM = floatval($formValues['volCEUgxThirdQM'][$i]);
$volCEUgxFourthQM = floatval($formValues['volCEUgxFourthQM'][$i]);
$volCEUgxFifthQM = floatval( $formValues['volCEUgxFifthQM'][$i]);
$volCEUgxSixthQM = floatval($formValues['volCEUgxSixthQM'][$i]);
$volCoffeeExUgx = floatval($formValues['volCoffeeExUgx'][$i]);
$volBEFirstQM = floatval($formValues['volBEFirstQM'][$i]);
$volBESecondQM = floatval($formValues['volBESecondQM'][$i]);
$volBEThirdQM = floatval($formValues['volBEThirdQM'][$i]);
$volBEFourthQM = floatval($formValues['volBEFourthQM'][$i]);
$volBEFifthQM = floatval($formValues['volBEFifthQM'][$i]);
$volBESixthQM = floatval($formValues['volBESixthQM'][$i]);
$volBeansEx = floatval($formValues['volBeansEx'][$i]);
$volBe = $formValues['volBeansExDetails'][$i];
$volBeansExDetails = ($volBe) == "-"?"":$volBe;
$volBEUgxFirstQM = floatval($formValues['volBEUgxFirstQM'][$i]);
$volBEUgxSecondQM = floatval($formValues['volBEUgxSecondQM'][$i]);
$volBEUgxThirdQM = floatval($formValues['volBEUgxThirdQM'][$i]);
$volBEUgxFourthQM = floatval($formValues['volBEUgxFourthQM'][$i]);
$volBEUgxFifthQM = floatval($formValues['volBEUgxFifthQM'][$i]);
$volBEUgxSixthQM = floatval($formValues['volBEUgxSixthQM'][$i]);
$volBeansExUgx = floatval($formValues['volBeansExUgx'][$i]);
$epayRFirstQM = floatval($formValues['epayRFirstQM'][$i]);
$epayRSecondQM = floatval($formValues['epayRSecondQM'][$i]);
$epayRThirdQM = floatval($formValues['epayRThirdQM'][$i]);
$epayRFourthQM = floatval($formValues['epayRFourthQM'][$i]);
$epayRFifthQM = floatval($formValues['epayRFifthQM'][$i]);
$epayRSixthQM = floatval($formValues['epayRSixthQM'][$i]);
$epayRecieved = floatval($formValues['epayRecieved'][$i]);
$epayR = $formValues['epayRecievedDetails'][$i];
$epayRecievedDetails = ($epayR) == "-"?"":$epayR;
$epayMFirstQM = floatval($formValues['epayMFirstQM'][$i]);
$epayMSecondQM = floatval($formValues['epayMSecondQM'][$i]);
$epayMThirdQM = floatval($formValues['epayMThirdQM'][$i]);
$epayMFourthQM = floatval($formValues['epayMFourthQM'][$i]);
$epayMFifthQM = floatval($formValues['epayMFifthQM'][$i]);
$epayMSixthQM = floatval($formValues['epayMSixthQM'][$i]);
$epayMade = floatval($formValues['epayMade'][$i]);
$epayM = $formValues['epayMadeDetails'][$i];	
$epayMadeDetails = ($epayM) == "-"?"":$epayM;  
$storageCapNew=0.0;
$storageCapImproved=0.0;
 
 
$stmnt_form4="UPDATE `tbl_form4_traders` SET 
`vaSupplyChain`='".$vaSupplyChain ."',
`vaSupplyChainDetails`='".$vaSupplyChainDetails."',
`numCbo`='".$numCbo."',
`numCboDetails`='".$numCboDetails."',
`volMaizePurchased`='".$volMaizePurchased."',
`volMaizePurchasedDetails`='".$volMaizePurchasedDetails."',
`volCoffeePurchased`='".$volCoffeePurchased."',
`volCoffeePurchasedDetails`='".$volCoffeePurchasedDetails."',
`volBeansPurchased`='".$volBeansPurchased."',
`volBeansPurchasedDetails`='".$volBeansPurchasedDetails."',
`volMaizeEx`='".$volMaizeEx."',
`volMaizeExDetails`='".$volMaizeExDetails."',
`volCoffeeEx`='".$volCoffeeEx."',
`volCoffeeExDetails`='".$volCoffeeExDetails."',
`volBeansEx`='".$volBeansEx."',
`volBeansExDetails`='".$volBeansExDetails."',
`epayRecieved`='".$epayRecieved."',
`epayRecievedDetails`='".$epayRecievedDetails."',
`epayMade`='".$epayMade."',
`epayMadeDetails`='".$epayMadeDetails."',
`storageCapNew`='".$storageCapNew."',
`storageCapNewDetails`='".$storageCapNewDetails."',
`storageCapImproved`='".$storageCapImproved."',
`storageCapImprovedDetails`='".$storageCapImprovedDetails."',
`updatedby`='".$_SESSION['username']."',
`epayMadeFifthQuarterMonth` = '".$epayMFifthQM."',
`epayMadeFirstQuarterMonth` = '".$epayMFirstQM."',
`epayMadeFourthQuarterMonth` = '".$epayMFourthQM."',
`epayMadeSecondQuarterMonth` = '".$epayMSecondQM."',
`epayMadeSixthQuarterMonth` = '".$epayMSixthQM."',
`epayMadeThirdQuarterMonth` = '".$epayMThirdQM."',
`epayRecievedFifthQuarterMonth` = '".$epayRFifthQM."',
`epayRecievedFirstQuarterMonth` = '".$epayRFirstQM."',
`epayRecievedFourthQuarterMonth` = '".$epayRFourthQM."',
`epayRecievedSecondQuarterMonth` = '".$epayRSecondQM."',
`epayRecievedSixthQuarterMonth` = '".$epayRSixthQM."',
`epayRecievedThirdQuarterMonth` = '".$epayRThirdQM."',
`vaSupplyChainFifthQuarterMonth` = '".$trVaSCFifthQM."',
`vaSupplyChainFirstQuarterMonth` = '".$trVaSCFirstQM."',
`vaSupplyChainFourthQuarterMonth` = '".$trVaSCFourthQM."',
`vaSupplyChainSecondQuarterMonth` = '".$trVaSCSecondQM."',
`vaSupplyChainSixthQuarterMonth` = '".$trVaSCSixthQM."',
`vaSupplyChainThirdQuarterMonth` = '".$trVaSCThirdQM."',
`numCboFifthQuarterMonth` = '".$vaUSCFifthQM."',
`numCboFirstQuarterMonth` = '".$vaUSCFirstQM."',
`numCboFourthQuarterMonth` = '".$vaUSCFourthQM."',
`numCboSecondQuarterMonth` = '".$vaUSCSecondQM."',
`numCboSixthQuarterMonth` = '".$vaUSCSixthQM."',
`numCboThirdQuarterMonth` = '".$vaUSCThirdQM."',
`volBeansExFifthQuarterMonth` = '".$volBEFifthQM."',
`volBeansExFirstQuarterMonth` = '".$volBEFirstQM."',
`volBeansExFourthQuarterMonth` = '".$volBEFourthQM."',
`volBeansExSecondQuarterMonth` = '".$volBESecondQM."',
`volBeansExSixthQuarterMonth` = '".$volBESixthQM."',
`volBeansExThirdQuarterMonth` = '".$volBEThirdQM."',
`volBeansExUgx` = '".$volBeansExUgx."',
`volBeansExUgxDetails` = '".$volBeansExUgxDetails."',
`volBeansExUgxFifthQuarterMonth` = '".$volBEUgxFifthQM."',
`volBeansExUgxFirstQuarterMonth` = '".$volBEUgxFirstQM."',
`volBeansExUgxFourthQuarterMonth` = '".$volBEUgxFourthQM."',
`volBeansExUgxSecondQuarterMonth` = '".$volBEUgxSecondQM."',
`volBeansExUgxSixthQuarterMonth` = '".$volBEUgxSixthQM."',
`volBeansExUgxThirdQuarterMonth` = '".$volBEUgxThirdQM."',
`volBeansPurchasedFifthQuarterMonth` = '".$volBPFifthQM."',
`volBeansPurchasedFirstQuarterMonth` = '".$volBPFirstQM."',
`volBeansPurchasedFourthQuarterMonth` = '".$volBPFourthQM."',
`volBeansPurchasedSecondQuarterMonth` = '".$volBPSecondQM."',
`volBeansPurchasedSixthQuarterMonth` = '".$volBPSixthQM."',
`volBeansPurchasedThirdQuarterMonth` = '".$volBPThirdQM."',
`volCoffeeExFifthQuarterMonth` = '".$volCPFifthQM."',
`volCoffeeExFirstQuarterMonth` = '".$volCPFirstQM."',
`volCoffeeExFourthQuarterMonth` = '".$volCPFourthQM."',
`volCoffeeExSecondQuarterMonth` = '".$volCPSecondQM."',
`volCoffeeExSixthQuarterMonth` = '".$volCPSixthQM."',
`volCoffeeExThirdQuarterMonth` = '".$volCPThirdQM."',
`volCoffeeExUgx` = '".$volCoffeeExUgx."',
`volCoffeeExUgxDetails` = '".$volCoffeeExUgxDetails."',
`volCoffeeExUgxFifthQuarterMonth` = '".$volCEFifthQM."',
`volCoffeeExUgxFirstQuarterMonth` = '".$volCEFirstQM."',
`volCoffeeExUgxFourthQuarterMonth` = '".$volCEFourthQM."',
`volCoffeeExUgxSecondQuarterMonth` = '".$volCESecondQM."',
`volCoffeeExUgxSixthQuarterMonth` = '".$volCESixthQM."',
`volCoffeeExUgxThirdQuarterMonth` = '".$volCEThirdQM."',
`volCoffeePurchasedFifthQuarterMonth` = '".$volCPFifthQM."',
`volCoffeePurchasedFirstQuarterMonth` = '".$volCPFirstQM."',
`volCoffeePurchasedFourthQuarterMonth` = '".$volCPFourthQM."',
`volCoffeePurchasedSecondQuarterMonth` = '".$volCPSecondQM."',
`volCoffeePurchasedSixthQuarterMonth` = '".$volCPSixthQM."',
`volCoffeePurchasedThirdQuarterMonth` = '".$volCPThirdQM."',
`volMaizeExFifthQuarterMonth` = '".$volMEFifthQM."',
`volMaizeExFirstQuarterMonth` = '".$volMEFirstQM."',
`volMaizeExFourthQuarterMonth` = '".$volMEFourthQM."',
`volMaizeExSecondQuarterMonth` = '".$volMESecondQM."',
`volMaizeExSixthQuarterMonth` = '".$volMESixthQM."',
`volMaizeExThirdQuarterMonth` = '".$volMEThirdQM."',
`volMaizeExUgx` = '".$volMaizeExUgx."',
`volMaizeExUgxDetails` = '".$volMaizeExUgxDetails."',
`volMaizeExUgxFifthQuarterMonth` = '".$volMEUgxFifthQM."',
`volMaizeExUgxFirstQuarterMonth` = '".$volMEUgxFirstQM."',
`volMaizeExUgxFourthQuarterMonth` = '".$volMEUgxFourthQM."',
`volMaizeExUgxSecondQuarterMonth` = '".$volMEUgxSecondQM."',
`volMaizeExUgxSixthQuarterMonth` = '".$volMEUgxSixthQM."',
`volMaizeExUgxThirdQuarterMonth` = '".$volMEUgxThirdQM."',
`volMaizePurchasedFifthQuarterMonth` = '".$volMPFifthQM."',
`volMaizePurchasedFirstQuarterMonth` = '".$volMPFirstQM."',
`volMaizePurchasedFourthQuarterMonth` = '".$volMPFourthQM."',
`volMaizePurchasedSecondQuarterMonth` = '".$volMPSecondQM."',
`volMaizePurchasedSixthQuarterMonth` = '".$volMPSixthQM."',
`volMaizePurchasedThirdQuarterMonth` = '".$volMPThirdQM."'
WHERE tbl_form4_tradersId='".$tbl_form4_tradersId."'";

 //$obj->alert($stmnt_form4);
 //$query=@mysql_query($stmnt_form4)or die(http(10080));
 $query=@mysql_query($stmnt_form4)or die(mysql_error());		
                 
                 }
	$obj->assign('bodyDisplay','innerHTML',congMsg("Trader record(s) Successfully Updated!"));
	$obj->call('xajax_view_form4','','','','','',1,20);
 return $obj;
 }
 function edit_form5($villageagentId){
 $obj=new xajaxResponse();
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 
 $n=1;
 $inc=1;
 
 
 
 $data="<form action=\"".$PHP_SELF."\" name='form5' id='form5' method='post'>
 <table width='100%' cellpadding='2' border='0' cellspacing='1'>";
  
 $data.="<tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>";
   
 
 
         
 
   $data.="<tr CLASS='evenrow'><th colspan='25' ><center>UPDATE RECORD(S)</center></th></tr>";
   
 
   $sel="SELECT w. * , x.`vAgentName` , b . *
         FROM `tbl_form5_villageagent` w, `tbl_villageagents` x, `tbl_form5_details` b
         WHERE w.`tbl_villageagentsId` = x.`tbl_villageAgentId`
         AND w.`tbl_form5_villageagentId` = b.`tbl_form5_villageagentId`
         AND w.`tbl_form5_villageagentId`='".$villageagentId."'";
   //$obj->alert($sel);
   $qsel=mysql_query($sel)or die(http(10871));
   
   while($rowf=mysql_fetch_assoc($qsel)){
     
     $data.="
   <input name='loopkey[]' type='hidden' id='loopkey".$n."' size='25' value='1' />
    <input name='tbl_form5_villageagentId' type='hidden' id='tbl_form5_villageagentId".$n."' size='25' value='".$rowf['tbl_form5_villageagentId']."'/>";
 
 $data.="<tr class='evenrow3'>
 <td colspan='22'>
          <table  width='100%' border='0' cellpadding='2' cellspacing='2'>";
           
           //else display this
           $data.="<tr class='evenrow'>
             <td colspan='2'>Name of Village Agent:</td>";
             
             $stmnt_ExDetails="SELECT x . * , d.`districtName`, s.`subcountyName`,z.`zoneName`
                                     FROM `tbl_villageagents` x, `tbl_district` d, `tbl_subcounty` s, `tbl_zone` z
                                     WHERE x.`tbl_villageAgentId`='".$rowf['tbl_villageagentsId']."'
                                     AND z.`zoneCode`=x.`vAgentRegion`
                                     AND d.`districtCode` = s.`districtCode`
                                     AND x.`vAgentDistrict` = d.`districtCode`
                                     AND x.`vAgentSubcounty` = s.`subcountyCode`
                                     ORDER BY x.`tbl_villageAgentId` ASC
                                     ";
                                     
                                     //$obj->alert($stmnt_ExDetails);
                 $Qvillageagent= @mysql_query($stmnt_ExDetails);
                 $rowEx=mysql_fetch_array($Qvillageagent);
             
             $data.="<td><select name='vaName' id='vaName' style='width:100px;' onchange=\"xajax_new_form5(this.value,
                                                                                                                             '".$vaCode."',
                                                                                                                             '".$vaAge."',
                                                                                                                             '".$vaGender."',
                                                                                                                             '".$vaDistrict."',
                                                                                                                             '".$vaSubcounty."',
                                                                                                                             '".$vaVillage."'
                                                                                                                             );return false;\" />";
                                                                                             $data.="<option value=''>-select-</option>";
                                                                                             
                                                                                             $stmnt="SELECT x . * , d.`districtName`, s.`subcountyName`,z.`zoneName`
                                                                                                     FROM `tbl_villageagents` x, `tbl_district` d, `tbl_subcounty` s, `tbl_zone` z
                                                                                                     WHERE d.`districtCode` = s.`districtCode`
                                                                                                     AND z.`zoneCode`=x.`vAgentRegion`
                                                                                                     AND x.`vAgentDistrict` = d.`districtCode`
                                                                                                     AND x.`vAgentSubcounty` = s.`subcountyCode`
                                                                                                     ORDER BY x.`tbl_villageAgentId` ASC";
                                                                                                           $Q= @mysql_query($stmnt);
                                                                                                                               while($row=mysql_fetch_array($Q)){
                                                                                                                               
                                                                                                                               
                                                                                             $selected=($rowf['tbl_villageagentsId']==$row['tbl_villageAgentId'])?"selected":"";
                                                                                           $data.="<option value=\"".$row['tbl_villageAgentId']."\" ".$selected.">".$row['vAgentName']."</option>";
                                                                                                                              }
                                                                                             $data.="</select></td>";
 $data.="<td><div align='right'>Code:</div></td>
             <td><input type='text' name='codeVillageAgent' id='codeVillageAgent' value='".$rowEx['vAgentCode']."' disabled='disabled' class='disabled' style='width:80px;'></td>
             <td>Sex :</td>
             <td>";
             $data.="<input type='text' name='VillageAgentSex' id='VillageAgentSex' value='".$rowEx['vAgentSex']."' disabled='disabled' class='disabled' style='width:80px;'>";
             $data.="</td><td></td><td></td><td></td><td></td><td></td>";
           $data.="</tr>";
           
           
           
           $data.="<tr class='evenrow'>
             <td>Crops:</td>
             <td class='disabled'>";
             $beans=$rowEx['vAgentCropBeans'];
             $coffee=$rowEx['vAgentCropCoffee'];
              
             $maize=$rowEx['vAgentCropMaize'];
             //$obj->alert($maize);
             if($beans=='Yes' AND $coffee=='Yes' AND $maize=='Yes'){$data.="<ol><li>Beans</li><li>Coffee</li><li>Maize</li></ol>";}
             else if($beans=='Yes' AND $coffee=='Yes' AND $maize=='No'){$data.="<ol><li>Beans</li><li>Coffee</li></ol>";}
             else if($beans=='Yes' AND $coffee=='No' AND $maize=='No'){$data.="<ol><li>Beans</li></ol>";}
             else if($beans=='Yes' AND $coffee=='No' AND $maize=='Yes'){$data.="<ol><li>Beans</li><li>Maize</li></ol>";}
             else if($beans=='No' AND $coffee=='Yes' AND $maize=='Yes'){$data.="<ol><li>Coffee</li><li>Maize</li></ol>";}
             $data.="</td>
             <td>Date When recruited as a Village Agent : </td>
             <td>
             <input type='text' name='datedRecruited' id='datedRecruited' value='".$rowEx['vAgentDateRecruited']."' disabled='disabled' class='disabled' style='width:100px; />
             
             </td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
           </tr>
         <tr class='evenrow'>
              <td> Region:</td>
              <td><input type='text' name='agentRegion' id='agentRegion' disabled='disabled' class='disabled' value='".$rowEx['zoneName']."' style='width:100px;'/></td>
              <td><div align='right'>District:</div></td>
              <td><input type='text' name='agentDistrict' id='agentDistrict'   disabled='disabled' class='disabled' value='".$rowEx['districtName']."' style='width:100px;'/></td>
              <td><div align='right'>Sub-county:</div></td>
              <td><input type='text' name='agentSubcounty' id='agentSubcounty' disabled='disabled' class='disabled' value='".$rowEx['subcountyName']."' style='width:100px;'/></td>
              <td><div align='right'>Village/LC1:</div></td><td><input type='text' name='agentVillage' id='agentVillage' disabled='disabled' class='disabled' value='".$rowEx['vAgentVillage']."' style='width:100px;' /></td>
           </tr>
         </table>
         </td>
     </tr>";  
    
 $data.="<tr class='evenrow3'>
         <td colspan='22'>
              <table  width='100%' border='0' cellpadding='2' cellspacing='2'>     
                   <tr class='evenrow'>
                     <th colspan='6' rowspan='2'>Performance Indicator</th>
                     <th>Achievements</th>
                     <th rowspan='2'>Given details</th>
                   </tr>
                   <tr class='evenrow'>
                     <th>Total</th>
                   </tr>
                   <tr class='evenrow'>
                     <th width='24%' colspan='5' rowspan='3'>Number of farmers in the supply chain </th>
                     <th>Female</th>
                     <td><input value='".$rowf['SC_AchievementsFemale']."' type='text' name='supplyChainAchievementsFemale' id='supplyChainAchievementsFemale".$n."' onKeyUp=\"xajax_calc_youthApprentice(getElementById('supplyChainAchievementsFemale".$n."').value,
                                                                                                                         getElementById('supplyChainAchievementsMale".$n."').value,
                                                                                                                         'supplyChainAchevementsTotal".$n."');return false;\" onkeypress='return numbersonly(event, false)'></td>
                     <td>
                       <textarea name='supplyChainAchievementsFemaleDetails' id='supplyChainAchievementsFemaleDetails".$n."' cols='30' rows='3'>".$rowf['SC_AchievementsFemaleDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>Male</th>
                     <td><input value='".$rowf['SC_AchievementsMale']."' type='text' name='supplyChainAchievementsMale' id='supplyChainAchievementsMale".$n."' onKeyUp=\"xajax_calc_youthApprentice(getElementById('supplyChainAchievementsFemale".$n."').value,
                                                                                                                         getElementById('supplyChainAchievementsMale".$n."').value,
                                                                                                                         'supplyChainAchevementsTotal".$n."');return false;\" onkeypress='return numbersonly(event, false)' ></td>
                     <td><textarea name='supplyChainAchievementsMaleDetails' id='supplyChainAchievementsMaleDetails".$n."' cols='30' rows='3'>".$rowf['SC_AchievementsMaleDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>Total</th>
                     <td><input value='".$rowf['SC_AchevementsTotal']."' type='text' class='disabled'  name='supplyChainAchevementsTotal' id='supplyChainAchevementsTotal".$n."' onkeypress='return numbersonly(event, false)' ></td>
                     <td><textarea value='".$rowf['SC_AchevementsTotal']."' name='supplyChainAchevementsTotalDetails' id='supplyChainAchevementsTotalDetails".$n."' cols='30' rows='3'>".$rowf['SC_AchevementsTotalDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th colspan='6'>Number of groups in the supply chain</th>
                     <td><input value='".$rowf['numGroups_SC']."' type='text' name='numGroupsSupplyChain' id='numGroupsSupplyChain".$n."' onkeypress='return numbersonly(event, false)' ></td>
                     <td><textarea  name='numGroupsSupplyChainDetails' id='numGroupsSupplyChainDetails".$n."' cols='30' rows='3'>".$rowf['numGroups_SC_Details']."</textarea></td>
                   </tr>
                   
                   <tr class='evenrow'>
                     <th colspan='5' rowspan='3'>Number of farmers in groups</th>
                     <th>Female</th>
                     <td><input value='".$rowf['numFarmerGroupsFemale']."' type='text' name='numFarmerGroupsFemale' id='numFarmerGroupsFemale".$n."' onKeyUp=\"xajax_calc_youthApprentice(getElementById('numFarmerGroupsFemale".$n."').value,
                                                                                                                         getElementById('numFarmerGroupsMale".$n."').value,
                                                                                                                         'numFarmerGroupsTotal".$n."');return false;\" onkeypress=\"return numbersonly(event, false)\"></td>
                     <td><textarea name='numFarmerGroupsFemaleDetails' id='numFarmerGroupsFemaleDetails".$n."' cols='30' rows='3'>".$rowf['numFarmerGroupsFemaleDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>Male</th>
                     <td><input value='".$rowf['numFarmerGroupsMale']."' type='text' name='numFarmerGroupsMale' id='numFarmerGroupsMale".$n."' onKeyUp=\"xajax_calc_youthApprentice(getElementById('numFarmerGroupsFemale".$n."').value,
                                                                                                                         getElementById('numFarmerGroupsMale".$n."').value,
                                                                                                                         'numFarmerGroupsTotal".$n."');return false;\" onkeypress=\"return numbersonly(event, false)\"></td>
                     <td><textarea name='numFarmerGroupsMaleDetails' id='numFarmerGroupsMaleDetails".$n."' cols='30' rows='3'>".$rowf['numFarmerGroupsMaleDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>Total</th>
                     <td><input class='disabled' readonly=readonly value='".$rowf['numFarmerGroupsTotal']."' type='text' name='numFarmerGroupsTotal' id='numFarmerGroupsTotal".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='numFarmerGroupsTotalDetails' id='numFarmerGroupsTotalDetails".$n."' cols='30' rows='3'>".$rowf['numFarmerGroupsTotalDetails']."</textarea></td>
                   </tr>
                   
                   <tr class='evenrow'>
                     <th colspan='5' rowspan='3'>Volume of produce purchased (Kg)</th>
                     <th>Maize</th>
                     <td><input value='".$rowf['volPurchasedMaize']."' type='text' name='volPurchasedMaize' id='volPurchasedMaize".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='volPurchasedMaizeDetails' id='volPurchasedMaizeDetails".$n."' cols='30' rows='3'>".$rowf['volPurchasedMaizeDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>Beans</th>
                     <td><input value='".$rowf['volPurchasedBeans']."' type='text' name='volPurchasedBeans' id='volPurchasedBeans".$n."' onkeypress='return numbersonly(event, false)' ></td>
                     <td><textarea name='volPurchasedBeansDetails' id='volPurchasedBeansDetails".$n."' cols='30' rows='3'>".$rowf['volPurchasedBeansDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>Coffee</th>
                     <td><input value='".$rowf['volPurchasedCoffee']."' type='text' name='volPurchasedCoffee' id='volPurchasedCoffee".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='volPurchasedCoffeeDetails' id='volPurchasedCoffeeDetails".$n."' cols='30' rows='3'>".$rowf['volPurchasedCoffeeDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th colspan='5' rowspan='3'>Value of inputs sold (UGX)</th>
                     <th>Maize</th>
                     <td><input value='".$rowf['inputsMaize']."' type='text' name='inputsMaize' id='inputsMaize".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='inputsMaizeDetails' id='inputsMaizeDetails".$n."' cols='30' rows='3'>".$rowf['inputsMaizeDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>Beans</th>
                     <td><input value='".$rowf['inputsBeans']."' type='text' name='inputsBeans' id='inputsBeans".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='inputsBeansDetails' id='inputsBeansDetails".$n."' cols='30' rows='3'>".$rowf['inputsBeansDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>Coffee</th>
                     <td><input value='".$rowf['inputsCoffee']."' type='text' name='inputsCoffee' id='inputsCoffee".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='inputsCoffeeDetails' id='inputsCoffeeDetails".$n."' cols='30' rows='3'>".$rowf['inputsCoffeeDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th colspan='6'>Value of own resources invested in promoted  technologies and models (UGX)</th>
                     <td><input value='".$rowf['valueOwnResources']."' type='text' name='valueOwnResources' id='valueOwnResources".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='valueOwnResourcesDetails' id='valueOwnResourcesDetails".$n."' cols='30' rows='3'>".$rowf['valueOwnResourcesDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th colspan='5' rowspan='4'>Amount of bank loans received (UGX)</th>
                     <th>Bank</th>
                     <td><input value='".$rowf['loanRecievedBank']."' type='text' name='loanRecievedBank' id='loanRecievedBank".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='loanRecievedBankDetails' id='loanRecievedBankDetails".$n."' cols='30' rows='3'>".$rowf['loanRecievedBankDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>SACCO</th>
                     <td><input value='".$rowf['loanRecievedSACCO']."' type='text' name='loanRecievedSACCO' id='loanRecievedSACCO".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='loanRecievedSACCODetails' id='loanRecievedSACCODetails".$n."' cols='30' rows='3'>".$rowf['loanRecievedSACCODetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>MFI/MDI</th>
                     <td><input value='".$rowf['loanRecievedMDI']."' type='text' name='loanRecievedMDI' id='loanRecievedMDI".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='loanRecievedMDIDetails' id='loanRecievedMDIDetails".$n."' cols='30' rows='3'>".$rowf['loanRecievedMDIDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>VSLA</th>
                     <td><input value='".$rowf['loanRecievedVSLA']."' type='text' name='loanRecievedVSLA' id='loanRecievedVSLA".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='loanRecievedVSLADetails' id='loanRecievedVSLADetails".$n."' cols='30' rows='3'>".$rowf['loanRecievedVSLADetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th colspan='6'>Number of e-payments received</th>
                     <td><input value='".$rowf['EpayRecieved']."' type='text' name='numEpayRecieved' id='numEpayRecieved".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='numEpayRecievedDetails' id='numEpayRecievedDetails".$n."' cols='30' rows='3'>".$rowf['EpayRecievedDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th colspan='6'>Number of e-payments made</th>
                     <td><input value='".$rowf['EpayMade']."' type='text' name='numEpayMade' id='numEpayMade".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='numEpayMadeDetails' id='numEpayMadeDetails".$n."' cols='30' rows='3'>".$rowf['EpayMadeDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th colspan='5' rowspan='3'>Number of new jobs created (Capture if consistently Employed for four Months and Above)</th>
                     <th>Total</th>
                     <td><input value='".$rowf['jobsTotal']."' type='text' class='disabled' readonly=readonly name='jobsTotal' id='jobsTotal".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='jobsTotalDetails' id='jobsTotalDetails".$n."' cols='30' rows='3'>".$rowf['jobsTotalDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>Male</th>
                     <td><input value='".$rowf['jobsMale']."' type='text' name='jobsMale' id='jobsMale".$n."' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsFemale".$n."').value,
                                                                                                                         getElementById('jobsMale".$n."').value,
                                                                                                                         'jobsTotal".$n."');return false;\" onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='jobsMaleDetails' id='jobsMaleDetails".$n."' cols='30' rows='3'>".$rowf['jobsMaleDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>Female</th>
                     <td><input value='".$rowf['jobsFemale']."' type='text' name='jobsFemale' id='jobsFemale".$n."' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsFemale".$n."').value,
                                                                                                                         getElementById('jobsMale".$n."').value,
                                                                                                                         'jobsTotal".$n."');return false;\" onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='jobsFemaleDetails' id='jobsFemaleDetails".$n."' cols='30' rows='3'>".$rowf['jobsFemaleDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th colspan='5' rowspan='2'><p>Size  of Installed /improved store (M<sup>3</sup>)</p></th>
                     <th>New</th>
                     <td><input value='".$rowf['sizeStoreNew']."' type='text' name='sizeStoreNew' id='sizeStoreNew".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='sizeStoreNewDetails' id='sizeStoreNewDetails".$n."' cols='30' rows='3'>".$rowf['sizeStoreNewDetails']."</textarea></td>
                   </tr>
                   <tr class='evenrow'>
                     <th>Improved</th>
                     <td><input value='".$rowf['sizeStoreImproved']."' type='text' name='sizeStoreImproved' id='sizeStoreImproved".$n."' onkeypress='return numbersonly(event, false)'></td>
                     <td><textarea name='sizeStoreImprovedDetails' id='sizeStoreImprovedDetails".$n."' cols='30' rows='3'>".$rowf['sizeStoreImprovedDetails']."</textarea></td>
                   </tr>
         </table>
     </td>
  </tr>"; 
            
 $data.="<tr class='evenrow3'>
  <td colspan='22'>
          <table  width='100%' border='0' cellpadding='2' cellspacing='2'>             
               <tr class='evenrow'>
                 <td>Compiled by :</td>
                 <td ><input value='".$rowf['compiledBy']."' type='text' name='compiledBy' id='compiledBy".$n."'></td>
                 <td ><div align='right'>Title :</div></td>
                 <td ><input value='".$rowf['compiledByTitle']."' type='text' name='compiledByTitle' id='compiledByTitle".$n."'></td>
                 <td ><div align='right'>Telephone :</div></td>
                 <td ><input value='".$rowf['compiledBytel']."' type='text' name='compiledBytel' id='compiledBytel".$n."' maxlength='13'></td>
               </tr>
               <tr class='evenrow'>
                 <td>Reviewed  by :</td>
                 <td><input value='".$rowf['reviewedBy']."' type='text' name='reviewedBy' id='reviewedBy".$n."'></td>
                 <td><div align='right'>Title :</div></td>
                 <td><input value='".$rowf['reviewedByTitle']."' type='text' name='reviewedByTitle' id='reviewedByTitle".$n."'></td>
                 <td><div align='right'>Telephone :</div></td>
                 <td><input value='".$rowf['reviewedBytel']."' type='text' name='reviewedBytel' id='reviewedBytel".$n."' maxlength='13'></td>
               </tr>
               <tr class='evenrow'>
                 <td>Submitted by :</td>
                 <td><input value='".$rowf['submittedBy']."' type='text' name='submittedBy' id='submittedBy".$n."'></td>
                 <td><div align='right'>Title :</div></td>
                 <td><input value='".$rowf['submittedByTitle']."' type='text' name='submittedByTitle' id='submittedByTitle".$n."'></td>
                 <td><div align='right'>Telephone :</div></td>
                 <td><input value='".$rowf['submittedBytel']."' type='text' name='submittedBytel' id='submittedBytel".$n."' maxlength='13'></td>
               </tr>
               <tr class='evenrow'>
                 <td>Date of submission:</td>
                 <td colspan='5'>
                 <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.form5.dateOfSubmission".$n.");return false;\" hidefocus=''>
                 <input value='".$rowf['dateOfSubmission']."' name='dateOfSubmission' type='text' style='width:200px;'  size='50' value='' id='dateOfSubmission".$n."' readonly='readonly'/>
                 <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
                 </a>
                 </td>
               </tr>
         </table>
     </td>
 </tr>"; 
 
 $data.="</table>";
 
   $n++;
   }

 
 
 $data.="<table width='100%'>
 <tr class='evenrow'>
     <td colspan=22>
         <div align='right'>
                 <input type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_form5(xajax.getFormValues('form5')); return false;\" />
         </div>
     </td>
 </tr>
 </table>
 </form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function calc_form5($female,$male,$total){
 $obj=new xajaxResponse();
 $totalValue=0;
 $totalValue=($female+$male);
 $obj->assign($total,'value',$totalValue);
 return $obj;
 }
 function calc_vaform5($female,$male,$total){
 $obj=new xajaxResponse();
 $totalValue=0;
 $totalValue=($female+$male);
 $obj->assign($total,'value',$totalValue);
 return $obj;
 }
 function update_form5($formValues){
 $obj=new xajaxResponse();
 $n=1;
 

 $tbl_form5_villageagentId=$formValues['tbl_form5_villageagentId'];
 $vaName=$formValues['vaName'];
 $supplyChainAchievementsFemale=$formValues['supplyChainAchievementsFemale'];
 $supplyChainAchievementsFemaleDetails=$formValues['supplyChainAchievementsFemaleDetails'];
 $supplyChainAchievementsMale=$formValues['supplyChainAchievementsMale'];
 $supplyChainAchievementsMaleDetails=$formValues['supplyChainAchievementsMaleDetails'];
 $supplyChainAchevementsTotal=$formValues['supplyChainAchevementsTotal'];
 //landing for change details
 $supplyChainAchevementsTotalDetails=$formValues['supplyChainAchevementsTotalDetails'];
 $numGroupsSupplyChain=$formValues['numGroupsSupplyChain'];
 $numGroupsSupplyChainDetails=$formValues['numGroupsSupplyChainDetails'];
 $volPurchasedMaize=$formValues['volPurchasedMaize'];
 //*************new values*******************
 $numFarmerGroupsFemale=$formValues['numFarmerGroupsFemale'];
 $numFarmerGroupsFemaleDetails=$formValues['numFarmerGroupsFemaleDetails'];
 $numFarmerGroupsMale=$formValues['numFarmerGroupsMale'];
 $numFarmerGroupsMaleDetails=$formValues['numFarmerGroupsMaleDetails'];
 $numFarmerGroupsTotal=$formValues['numFarmerGroupsTotal'];
 $numFarmerGroupsTotalDetails=$formValues['numFarmerGroupsTotalDetails'];
 //***********End of new values**************
 $volPurchasedMaizeDetails=$formValues['volPurchasedMaizeDetails'];
 $volPurchasedBeans=$formValues['volPurchasedBeans'];
 $volPurchasedBeansDetails=$formValues['volPurchasedBeansDetails'];
 $volPurchasedCoffee=$formValues['volPurchasedCoffee'];
 $volPurchasedCoffeeDetails=$formValues['volPurchasedCoffeeDetails'];
 $inputsMaize=$formValues['inputsMaize'];
 $inputsMaizeDetails=$formValues['inputsMaizeDetails'];
 $inputsMaize=$formValues['inputsMaize'];
 $inputsMaizeDetails=$formValues['inputsMaizeDetails'];
 $inputsBeans=$formValues['inputsBeans'];
 $inputsBeansDetails=$formValues['inputsBeansDetails'];
 $inputsCoffee=$formValues['inputsCoffee'];
 $inputsCoffeeDetails=$formValues['inputsCoffeeDetails'];
 $valueOwnResources=$formValues['valueOwnResources'];
 $valueOwnResourcesDetails=$formValues['valueOwnResourcesDetails'];
 $loanRecievedBank=$formValues['loanRecievedBank'];
 $loanRecievedBankDetails=$formValues['loanRecievedBankDetails'];
 $loanRecievedSACCO=$formValues['loanRecievedSACCO'];
 $loanRecievedSACCODetails=$formValues['loanRecievedSACCODetails'];
 $loanRecievedMDI=$formValues['loanRecievedMDI'];
 $loanRecievedMDIDetails=$formValues['loanRecievedMDIDetails'];
 $loanRecievedVSLA=$formValues['loanRecievedVSLA'];
 $loanRecievedVSLADetails=$formValues['loanRecievedVSLADetails'];
 $epayRecieved=$formValues['numEpayRecieved'];
 $epayRecievedDetails=$formValues['numEpayRecievedDetails'];
 $epayMade=$formValues['numEpayMade'];
 $epayMadeDetails=$formValues['numEpayMadeDetails'];
 $jobsTotal=$formValues['jobsTotal'];
 $jobsTotalDetails=$formValues['jobsTotalDetails'];
 $jobsMale=$formValues['jobsMale'];
 $jobsMaleDetails=$formValues['jobsMaleDetails'];
 $jobsFemale=$formValues['jobsFemale'];
 $jobsFemaleDetails=$formValues['jobsFemaleDetails'];
 $sizeStoreNew=$formValues['sizeStoreNew'];
 $sizeStoreNewDetails=$formValues['sizeStoreNewDetails'];
 $sizeStoreImproved=$formValues['sizeStoreImproved'];
 $sizeStoreImprovedDetails=$formValues['sizeStoreImprovedDetails'];
 $compiledBy=$formValues['compiledBy'];
 $compiledByTitle=$formValues['compiledByTitle'];
 $compiledBytel=$formValues['compiledBytel'];
 $reviewedBy=$formValues['reviewedBy'];
 $reviewedByTitle=$formValues['reviewedByTitle'];
 $reviewedBytel=$formValues['reviewedBytel'];
 $submittedBy=$formValues['submittedBy'];
 $submittedByTitle=$formValues['submittedByTitle'];
 $submittedBytel=$formValues['submittedBytel'];
 $dateOfSubmission=$formValues['dateOfSubmission'];
 
 
 
 $sql="UPDATE `tbl_form5_villageagent` SET
 `tbl_villageagentsId`='".$vaName."',
 `SC_AchievementsFemale`= '".$supplyChainAchievementsFemale."',
 `SC_AchievementsMale`='".$supplyChainAchievementsMale."', 
 `SC_AchevementsTotal`='".$supplyChainAchevementsTotal."',
 `numGroups_SC`='".$numGroupsSupplyChain."',
 `numFarmerGroupsFemale`='".$numFarmerGroupsFemale."',
 `numFarmerGroupsMale`='".$numFarmerGroupsMale."',
 `numFarmerGroupsTotal`='".$numFarmerGroupsTotal."',
 `volPurchasedMaize`='".$volPurchasedMaize."', 
 `volPurchasedBeans`='".$volPurchasedBeans."', 
 `volPurchasedCoffee`='".$volPurchasedCoffee."',
 `inputsMaize`='".$inputsMaize."', 
 `inputsBeans`='".$inputsBeans."', 
 `inputsCoffee`='".$inputsCoffee."',
 `valueOwnResources`='".$valueOwnResources."', 
 `loanRecievedBank`='".$loanRecievedBank."', 
 `loanRecievedSACCO`='".$loanRecievedSACCO."',
 `loanRecievedMDI`='".$loanRecievedMDI."',
 `loanRecievedVSLA`= '".$loanRecievedVSLA."', 
 `EpayRecieved`='".$epayRecieved."',
 `EpayMade`='".$epayMade."', 
 `jobsTotal`='".$jobsTotal."', 
 `jobsMale`='".$jobsMale."',
 `jobsFemale`='".$jobsFemale."', 
 `sizeStoreNew`='".$sizeStoreNew."',
 `sizeStoreImproved`='".$sizeStoreImproved."', 
 `compiledBy`='".$compiledBy."',
 `compiledByTitle`='".$compiledByTitle."', 
 `compiledBytel`='".$compiledBytel."', 
 `reviewedBy`='".$reviewedBy."',
 `reviewedByTitle`='".$reviewedByTitle."', 
 `reviewedBytel`='".$reviewedBytel."', 
 `submittedBy`='".$submittedBy."',
 `submittedByTitle`='".$submittedByTitle."', 
 `submittedBytel`='".$submittedBytel."', 
 `dateOfSubmission`='".$dateOfSubmission."',
 `updatedby`='".$_SESSION['username']."' WHERE `tbl_form5_villageagentId`='".$tbl_form5_villageagentId."'";
 //SQL statement for inserting the details    
 $stmnt_details="UPDATE `tbl_form5_details` SET
 `tbl_villageagentsId`='".$vaName."',
 `SC_AchievementsFemaleDetails`='".$supplyChainAchievementsFemaleDetails."', 
 `SC_AchievementsMaleDetails`='".$supplyChainAchievementsMaleDetails."', 
 `SC_AchevementsTotalDetails`='".$supplyChainAchevementsTotalDetails."',
 `numGroups_SC_Details`='".$numGroupsSupplyChainDetails."',
 `numFarmerGroupsFemaleDetails`='".$numFarmerGroupsFemaleDetails."',
 `numFarmerGroupsMaleDetails`='".$numFarmerGroupsMaleDetails."',
 `numFarmerGroupsTotalDetails`='".$numFarmerGroupsTotalDetails."',
 `volPurchasedMaizeDetails`='".$volPurchasedMaizeDetails."', 
 `volPurchasedBeansDetails`='".$volPurchasedBeansDetails."',
 `volPurchasedCoffeeDetails`='".$volPurchasedCoffeeDetails."', 
 `inputsMaizeDetails`='".$inputsMaizeDetails."', 
 `inputsBeansDetails`='".$inputsBeansDetails."',
 `inputsCoffeeDetails`='".$inputsCoffeeDetails."', 
 `valueOwnResourcesDetails`='".$valueOwnResourcesDetails."', 
 `loanRecievedBankDetails`='".$loanRecievedBankDetails."',
 `loanRecievedSACCODetails`='".$loanRecievedSACCODetails."', 
 `loanRecievedMDIDetails`='".$loanRecievedMDIDetails."', 
 `loanRecievedVSLADetails`='".$loanRecievedVSLADetails."',
 `EpayRecievedDetails`='".$epayRecievedDetails."', 
 `EpayMadeDetails`='".$epayMadeDetails."', 
 `jobsTotalDetails`='".$jobsTotalDetails."',
 `jobsMaleDetails`='".$jobsMaleDetails."', 
 `jobsFemaleDetails`='".$jobsFemaleDetails."', 
 `sizeStoreNewDetails`='".$sizeStoreNewDetails."', 
 `sizeStoreImprovedDetails`='".$sizeStoreImprovedDetails."',
 `dateOfSubmission`='".$dateOfSubmission."',
 `updatedby`='".$_SESSION['username']."' WHERE `tbl_form5_villageagentId`='".$tbl_form5_villageagentId."'";
 
 /*===================================
 *=======code assisting in enforcing==
 *strictly active period of===========
 *reporting Data entry================
 ====================================*/
 
 require_once('connections/reportingPeriodValidate.php');
  
 /*============================
  *End of code for Active
 *reporting period restriction
 *==============================*/
 
 //$obj->alert($endDate);
 //$obj->alert($startDate);
  
 $dateCompared=$dateOfSubmission;
 //$obj->alert($dateCompared);
 
 if($dateOfSubmission==NULL){
 
                         $obj->alert("You cannot Continue until the Submission Date is Selected.");
                         return $obj;
 
 
 }elseif ($dateCompared<$startDate){
     
     $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
     return $obj;
                                 
 }elseif ($dateCompared>$endDate){
     
     $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
     return $obj;
                                 
 }elseif($dateCompared>$Today){
     
     $obj->alert("You cannot make a data entry for a Date in the future.");
     return $obj;
 } 
 
 
 //$obj->alert($sql);
 $query=@mysql_query($sql)or die(http(11282));
 //$query=@mysql_query($sql)or die(mysql_error().' at 11262');
 
 //$obj->alert($stmnt_details);
 @mysql_query($stmnt_details)or die(http(11287));
 //@mysql_query($stmnt_details)or die(mysql_error().' at 11266');
 
        
 $obj->assign('bodyDisplay','innerHTML',congMsg("Trader record(s) Successfully Updated!"));
 $obj->call("xajax_view_form5",'','','');
 return $obj;
 }
 function edit_training($formValues,$districtCode,$subCounty,$parish,$addField,$addTrainer){
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
 $_SESSION['addField']=$addField;
 $_SESSION['addTrainer']=$addTrainer;
 
 //$obj->alert($districtCode);
 
 
 
 if($addField=='' or $addField==0){$addField=15;}
 
 if($addTrainer=='' or $addTrainer==0){$addTrainer=3;}
 
 
 $data="<form action=\"".$PHP_SELF."\" name='training' id='training' method='post'>";
 
 $data.="<table width='100%' id='report'>";
  
 
 $data.="<tr class='evenrow'>
 <th colspan='10' ><center>Edit Training record</center></th>
         </tr>";
         
         
         
         $data.="<tr class='evenrow3'>
           <td colspan='10'>
           <table>";
           
           
 for($i=0;$i<count($formValues['loopkey']);$i++){
  $stmntTraining="SELECT t.* FROM `tbl_training` t WHERE  t.`tbl_trainingId`='".$formValues['tbl_trainingId'][$i]."'";
  //$obj->alert($stmntTraining);
   $sel=mysql_query($stmntTraining)or die(http(7856));
   while($row=mysql_fetch_assoc($sel)){
           
           //$obj->alert($row['tbl_trainingId']);
           
           $data.="<tr class='evenrow'>";
           $data.="<input type='hidden' name='tbl_trainingId[]' id='tbl_trainingId' value='".$row['tbl_trainingId']."'/>";
           $data.="<td><strong>District:</strong></td>";
           $data.="<td><select name='district[]' id='distict1'
           onchange=\"xajax_new_training(this.value,'".$subcounty."','".$parish."','".$addField."','".$addTrainer."');return false;\" style='width:100px;'>
           <option value=''>-select-</option>";
           
                   $data.=$QueryManager->DistrictFilterNoRegion($row['district']);
                   $data.="</select>";
                   $data.="</td>";
                   
         
           $data.="<td><strong>Subcounty:</strong></td>";
           $data.="<td><select name='subcounty[]' id='subcounty1'
           onchange=\"xajax_new_training('".$districtCode."',this.value,'".$parish."','".$addField."','".$addTrainer."');return false;\" style='width:100px;'>
           <option value=''>-select-</option>";
              $data.=$QueryManager->SubcountyFilterNoRegion($row['district'],$row['subcounty']);
                 $data.="</select>";
                   $data.="</td>";
         
           $data.="<td><strong>Parish:</strong></td>
           <td><select name='parish[]' id='parish1' style='width:100px;'><option value='%'>-select-</option>";
                  $data.=$QueryManager->ParishFilterNoRegion($row['district'],$row['subcounty'],$row['parish']);
                   $data.="</select></td>";
         
           $data.="<td>
           <div align='left'><strong>Training Village:</strong></div></td>
           <td style='width:100px;'><input type='text' name='trainingVillage[]' id='trainingVillage1' value='".$row['trainingVillage']."' size='50' />
           </td>
           </tr>";
           
           
         
    $data.="<tr class='evenrow'>
           <td><strong>Date of training:</strong></td>
             <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.trainingDate1);return false;\" hidefocus=''>
             <input name='trainingDate[]' type='text'  size='15px' value='".$row['trainingDate']."' id='trainingDate1' onclick=\"xajax_trainingDateValidation(getElementById('trainingDate').value);return false;\" readonly='readonly' />
             <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>
             </td>";
         
     $data.="<td><strong>Main Value Chain or <br> Technical Area addressed:</strong></td>
           <td><select name='valueChain[]' id='valueChain1' style='width:90px'>";
                  $data.=$QueryManager->valueChainFilter($row['mainValueChain']);
                   $data.="</select>
             </td>";
         
           $data.="<td><strong>Training Focus:<br>(Select ONE most relevant):</strong></div></td>
           <td><select name='trainingFocus[]' id='trainingFocus1' style='width:90px'>
           <option value=''>-select-</option>";
                  $data.=$QueryManager->trainingFocusFilter($row['trainingFocus']);
                   $data.="</select>
             </td>";
         
           $data.="<td><strong>Target Audience (Select the ONE most relevant):</strong></td>
           <td><select name='targetAudience[]' id='targetAudience1' style='width:90px'><option value=''>-select-</option>";
                  $data.=$QueryManager->targetAudienceFilter($row['targetAudience']);
                   $data.="</select>
           </td></tr>";
 
 $data.="</table>
         </td>
         </tr>";
         
         
         
 $data.="<tr class='evenrow3'>
     <td colspan=10>";
     
     $data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";
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
          
         //statement to extract training participants
         $st_training="SELECT * FROM `tbl_participants` WHERE `trainingId`='".$row['tbl_trainingId']."'";
         $qparticipants=@Execute($st_training) or die(http("Edit-11147"));
         while($rowT=mysql_fetch_array($qparticipants)){
         $data.="<tr class='evenrow'>
         <td>".$n."</td>
         <td> <input name='loopkeys[]' type='hidden' id='loopkeys' size='50' value='1' />";
         $data.="<input type='hidden' name='trainingId[]' id='trainingId".$n."' value='".$row['tbl_trainingId']."'/>";
         $data.="<input type='hidden' name='tbl_participantId[]' id='tbl_participantId".$n."' value='".$rowT['tbl_participantId']."'/>";
         $data.="<input name='pat_name[]' value='".$rowT['name']."' type='text' id='pat_name".$n."' size='53' /></td>
          <td><input name='pat_age[]' value='".$rowT['age']."' type='text' id='pat_age".$n."' maxlength='2' onkeypress=\"return numbersonly(event, false)\" style='width:60px'; /></td>
         <td><select name='pat_sex[]'  id ='pat_sex".$n."' style='width:60px;'>
         <option value=''>-select-</option>";
         $values=array('Male','Female');
                                         
                                         $q = 0; 
                                         foreach ($values as $s) {
                                             $selected=($rowT['sex']==$s)?"selected":"";
                                             $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                             $q++;
                                         }
         $data.="</select>
         </td>
         
         <td><select name='pat_status[]' id ='pat_status".$n."' style='width:60px'>
         <option value=''>-select-</option>";
         
         $values=array('New','Old');
                                         
                                         $q = 0; 
                                         foreach ($values as $s) {
                                             $selected=($rowT['status']==$s)?"selected":"";
                                             
                                             $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                             $q++;
                                         }
         
         $data.="</select>
         </td>
         
         <td><input name='pat_village[]' value='".$rowT['village']."' type='text' id='pat_village".$n."' size='20' /></td>
         <td><select name='typeofparticipants[]' id ='typeofparticipants".$n."' style='width:60px'>
         <option value=''>-select-</option>";
         $queryx=mysql_query("select * from tbl_lookup where classCode='25' order by codeName asc ") or die(http("PR-2294"));
         while($rowx=mysql_fetch_array($queryx)){
             $selected=($rowT['typeOfIndividual']==$rowx['code'])?"selected":"";
         $data.="<option value=\"".$rowx['code']."\" ".$selected.">".$rowx['codeName']."</option>";
         
         }
         $data.="</select>
         </td> 
         <td><input name='pat_tel[]' value='".$rowT['telephone']."'  type='text' id='pat_tel".$n."' size='20'/></td><td></td>
         </tr>";
         $n++;
        }
         $data.="</tbody>";
 
 $data.="</table>
 <p>
 <input  type='button' class='formButton2' name='Add Rows' TITLE='Add Participants' value='Add Participants' onclick=\"javascript:addRow2()\" />
 </p>";
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
     $v=1;
       
       //statement to extract trainers
         $st_trainers="SELECT * FROM `tbl_trainers` WHERE `trainingId`='".$row['tbl_trainingId']."'";
         $qtrainers=@Execute($st_trainers) or die(http("Edit-11268"));
         while($rowTrainer=mysql_fetch_array($qtrainers)){
             
         $data.="<tr class='evenrow'>
         <td>".$v."</td>
         <td> <input name='loop[]' type='hidden' id='loop' size='50' value='1' />";
         $data.="<input type='hidden' name='idTraining[]' id='idTraining".$v."' value='".$row['tbl_trainingId']."'/>";
         $data.="<input type='hidden' name='tbl_trainersId[]' id='tbl_trainersId".$v."' value='".$rowTrainer['tbl_trainersId']."'/>";
         $data.="<input name='trainers_name[]' value='".$rowTrainer['trainers_name']."' type='text' id='trainers_name".$v."' size='53' /></td>
          <td> <input name='trainers_title[]' value='".$rowTrainer['trainers_title']."'  type='text' id='trainers_title".$v."' size='20'  /></td>
         <td><input name='trainers_organisation[]' value='".$rowTrainer['trainers_organisation']."'  type='text' id='trainers_organisation".$v."' size='20' /></td>
         <td><input name='trainers_contact[]' six='20' value='".$rowTrainer['trainers_contact']."'   type='text' id='trainers_contact".$v."'  /></td><td></td></tr>";
         $v++;
         }
         
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
          <td colspan='10'><textarea name='pat_recommendations' id='pat_recommendations1'  cols='100' rows='10'>".$row['pat_recommendations']."</textarea></td>
         </tr>";
         
         $data.="
         </table>
     </td>
 </tr>";
   
   $data.="
         </table>
     </td>
 </tr>";
   }
   }
 
 $data.="<tr class='evenrow'>
     <td colspan=22>
         <div align='right'>
                 <input type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_training(xajax.getFormValues('training')); return false;\" />
         </div>
     </td>
 </tr>
 </table>";
 
 $data.="</form>";
 
 //New row template for adding other participants
 $data.="<table style='display:none' >";
 $data.="<tbody id=\"template-div\">";
 
 $data.="<tr class='evenrow' id='report'>
     <td>1.</td>
         <td> <input name='loopkeys[]' type='hidden' id='loopkeys' size='50' value='1'/>";
         $data.="<input type='hidden' name='trainingId[]' id='trainingId1' value='".$row['tbl_trainingId']."'/>";
         $data.="<input type='hidden' name='tbl_participantId[]' id='tbl_participantId1' value='".$rowT['tbl_participantId']."'/>";
         $data.="<input name='pat_name[]' type='text' id='pat_name1' size='53' /></td>
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
         <td><input value=\"+256\" name='pat_tel[]'  type='text' id='pat_tel1' size='20'/></td>";
 $data.="<td><input  type='button' class='formButton2'name='Remove' TITLE='Remove' value='Remove' onclick=\"removeRow2(this)\" /></td>
   </tr>";
 
 $data.="</tbody>";
 $data.="</table>";
 
 
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_training($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 for($i=0;$i<count($formValues['loopkey']);$i++){
 $tbl_trainingId=$formValues['tbl_trainingId'][$i];
 
 //$course=mysql_real_escape_string($formvalues['course'][$i]);
 //$techArea=$formValues['techArea'][$i];
 
 $district=$formValues['district'][$i];
 $subcounty=$formValues['subcounty'][$i];
 $parish=$formValues['parish'][$i];
 $trainingVillage=$formValues['trainingVillage'][$i];
 $trainingDate=$formValues['trainingDate'][$i];
 $valueChain=$formValues['valueChain'][$i];
 $trainingFocus=$formValues['trainingFocus'][$i];
 $targetAudience=$formValues['targetAudience'][$i];
 $pat_recommendations=$formValues['pat_recommendations'];
 
  if ($district<>0 OR $district<>''){
 $sql="UPDATE `tbl_training` SET
             `district`='".$district."',
             `subcounty`='".$subcounty."',
             `parish`='".$parish."',
             `trainingVillage`='".$trainingVillage."',
             `trainingDate`='".$trainingDate."',
             `mainValueChain`='".$valueChain."',
             `trainingFocus`='".$trainingFocus."',
             `targetAudience`='".$targetAudience."',
             `pat_recommendations`='".$pat_recommendations."',
             `updatedby`='".$_SESSION['username']."'
     WHERE tbl_trainingId='".$tbl_trainingId."'";
  //$obj->alert($sql);
  $query=@mysql_query($sql)or die(http(7360));
  //$query=@mysql_query($sql)or die(mysql_error().'11406');
  }
  
 }
 
 
 for($i=0;$i<count($formValues['loopkeys']);$i++){
 $trainingId=$formValues['trainingId'][$i];
 $tbl_participantId=$formValues['tbl_participantId'][$i];
 $pat_name=$formValues['pat_name'][$i];
 $pat_age=$formValues['pat_age'][$i];
 $pat_sex=$formValues['pat_sex'][$i];
 $pat_status=$formValues['pat_status'][$i];
 $pat_village=$formValues['pat_village'][$i];
 $typeofparticipants=$formValues['typeofparticipants'][$i];
 $pat_tel=$formValues['pat_tel'][$i];
 
 
     
  //check for existance of record
  $st_check="SELECT * FROM  `tbl_participants` WHERE `tbl_participantId`='".$tbl_participantId."'";
 
     $qcheck=@Execute($st_check) or die(http("Edit-111423"));
     $rowC=mysql_fetch_array($qcheck);
     //$obj->alert($trainingId);
 if($rowC<>null){    
 $st_part="UPDATE `tbl_participants` SET
     `name`='".$pat_name."',
     `age`='".$pat_age."',
     `sex`='".$pat_sex."',
     `status`='".$pat_status."',
     `village`='".$pat_village."',
     `typeOfIndividual`='".$typeofparticipants."',
     `telephone`='".$pat_tel."'
     WHERE tbl_participantId='".$tbl_participantId."'
     AND trainingId='".$trainingId."'";
  //$obj->alert($st_part);
  $query=@mysql_query($st_part)or die(http(11425));
  //$query=@mysql_query($st_part)or die(mysql_error().'11443');
 // Planted tree here!!!
  $v= $trainingId;
  }
  
  elseif($tbl_participantId=='' or $tbl_participantId==0){
   
   $trainingId=$v;
   //Statement to insert into db
  $part_insert="INSERT INTO `tbl_participants`(`trainingId`, `name`,
                                    `age`, `sex`, `status`,
                                    `village`, `typeOfIndividual`, `telephone`) VALUES
                                     ('".$trainingId."',
                                      '".$pat_name."',
                                      '".$pat_age."',
                                      '".$pat_sex."',
                                      '".$pat_status."',
                                      '".$pat_village."',
                                      '".$typeofparticipants."',
                                      '".$pat_tel."')";
     
    // $obj->alert($part_insert);
  $query=@mysql_query($part_insert)or die(http(11450));
  //$query=@mysql_query($part_insert)or die(mysql_error().'11463');
     }
 }
 
 
 //Trainers insert
 
 for($i=0;$i<count($formValues['loop']);$i++){
 $trainingId=$formValues['idTraining'][$i];
 $tbl_trainersId=$formValues['tbl_trainersId'][$i];
 $trainers_name=$formValues['trainers_name'][$i];
 $trainers_title=$formValues['trainers_title'][$i];
 $trainers_organisation=$formValues['trainers_organisation'][$i];
 $trainers_contact=$formValues['trainers_contact'][$i];
 
 //check for existance of record
  $st_checkRisk="SELECT * FROM  `tbl_trainers` WHERE `trainingId`='".$trainingId."'";
  
    $qcheckRisk=@Execute($st_checkRisk) or die(http("Edit-10013"));
    //$qcheckRisk=@Execute($st_checkRisk) or die(mysql_error()." on line 2106");
     $rowCRisk=mysql_fetch_array($qcheckRisk);
     
 if($rowCRisk<>null){
  if ($trainers_name<>0 OR $trainers_name<>''){
 $st_trainers="UPDATE `tbl_trainers` SET
     `trainers_name`='".$trainers_name."',
     `trainers_title`='".$trainers_title."',
     `trainers_organisation`='".$trainers_organisation."',
     `trainers_contact`='".$trainers_contact."'
     WHERE  `tbl_trainersId`='".$tbl_trainersId."'
     AND  trainingId='".$trainingId."'";
  //$obj->alert($st_trainers);
  $query=@mysql_query($st_trainers)or die(http(7360));
 // $query=@mysql_query($st_trainers)or die(mysql_error().'11489');
  $v=$trainingId;
  }
 }elseif($tbl_trainersId=='' or $tbl_trainersId==0){
//$obj->alert($v);
  
 if($trainers_name<>'' OR $trainers_name<>0 ){
$stmnt_trainers="INSERT INTO `tbl_trainers`(`trainingId`,
                                            `trainers_name`, `trainers_title`,
                                            `trainers_organisation`, `trainers_contact`)
                                            VALUES
                                            ('".$v."',
                                            '".$trainers_name."', '".$trainers_title."',
                                            '".$trainers_organisation."', '".$trainers_contact."')";
//$obj->alert($stmnt_trainers);
@mysql_query($stmnt_trainers)or die(http(10042));
//@mysql_query($stmnt_participants)or die(mysql_error());
}
    }
  
  
  
 }
 
 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Training has been Updated!"));
 $obj->call("xajax_view_training",'','','');
 return $obj;
 }
 function edit_publication($formvalues){
 $obj=new xajaxResponse();
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 $n=1;
 $inc=1;
 $_SESSION['nhh']=1;
 $_SESSION['nhh']=$nhh;
 $_SESSION['subcountyCode']=$subcounty;
 #$obj->alert($_SESSION['subcountyCode']);
 $_SESSION['ParishName']=$parishName;
 $_SESSION['parishCode']=$parish;
 #$obj->alert($_SESSION['parishCode']);
 
 $data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
 <table width='100%'>";
  
   $data.="
   
   <tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>
   
 
 
         <tr class='evenrow'>
           <td width='30%' colspan=2>
           <div align='left'><strong>Project</strong></div></td>
           <td colspan=8><select name='project' style='width:300px;'><option value=''>-select-</option>";
                   $sql="select * from tbl_project where id like '".$_SESSION['intervention']."%' and display like 'Yes%' order by project_code asc";
                   #$obj->addAlert($sql);
                   $query=mysql_query($sql) or die(http(219));
                   while($ROW=mysql_fetch_array($query)){
                 $selected=($_SESSION['intervention']==$ROW['id'])?"SELECTED":"";
                   $data.="<option value=\"".$ROW['id']."\" ".$selected." >".substr($ROW['title'],0,500)."</option>";}
                   $data.="</select></td>
         </tr>
 
   <tr CLASS='evenrow'>
  
     <th colspan='10' ><center>List of publications</center></th>
         
   </tr>
   <tr CLASS='evenrow'>
   <th>NO</th>
     <th>title</th>
     <th>Organization</th>
     
 <th>Organizing date<br/><img src='images/spacer3.gif'></th>
   </tr>  
   ";
  
   for($i=0;$i<count($formvalues['loopkey']);$i++){
   $s="select * from tbl_publication where publication_id='".$formvalues['publication_id'][$i]."'";
   //$obj->alert($s);
   $sel=mysql_query("select * from tbl_publication where publication_id='".$formvalues['publication_id'][$i]."'")or die(http(0063));
   while($row=mysql_fetch_assoc($sel)){
   $orgdate="org_date".$n;
     $data.="<tr class='evenrow'>
   <td>".$n."</td>
     <td> <input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1' />
         <input name='publication_id[]' type='hidden' id='publication_id' size='25' value='".$row['publication_id']."' />
         <input name='title[]' type='text' id='title' size='25'  value='".$row['title']."' /></td>
     <td><input name='organization[]' type='text' id='trainer' size='25' value='".$row['organization']."' /></td>
    
 
  <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.$orgdate);return false;\" hidefocus=''>
 <input name='$orgdate' type='text'  size='18' value='".$row['dateofpublication']."' id='$orgdate' readonly='readonly' />
 <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a></td>
   </tr>";
   $n++;
   }
   }
   
   
 $data."</table></td>";
    
  $data.="</tr>
 </table>
 
 
 <div align='right'>
         <input type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_publication(xajax.getFormValues('projects')); return false;\" />
         </div>
 </form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_publication($formvalues){
                                                                 $obj=new xajaxResponse();
                                                                 $n=1;
                                                                 
                                                                 for($i=0;$i<count($formvalues['loopkey']);$i++){
                                                                 $publication_id=$formvalues['publication_id'][$i];
                 $title=mysql_real_escape_string($formvalues['title'][$i]);
 $organization=mysql_real_escape_string($formvalues['organization'][$i]);
         
         $date=$formvalues['org_date'.$n][$i];
 $sql="update tbl_publication set `title`='".$title."',`organization`='".$organization."',updatedby='".$_SESSION['username']."' where publication_id='".$publication_id."'";
  //$obj->alert($sql);
 $query=@mysql_query($sql)or die(http(0043));
                 
                 //$n++;
                 
                 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
 $obj->call("xajax_view_publications",'','');
 
                                                                 return $obj;
                                                                 }
 function edit_project($formvalues){
                                 $obj=new xajaxResponse();
                         
                                 $_SESSION['program']='';
                                 $_SESSION['subprogram']='';
                                 $_SESSION['program']=$program;
                                 $_SESSION['subprogram']=$subprogram;
                                 for($i=0;$i<count($formvalues['id']);$i++){
                                         $query=mysql_query("select * from tbl_project where id='".$formvalues['id'][$i]."'")or die(http("216"));
                                         while($row=mysql_fetch_array($query)){
                                                 $data="<form action='".$PHP_SELF."' name='projects' ID='projects' method='post' >
                                                 <table cellspacing='0'      width='800' align='center' border='0' cellspacing='0' cellpadding='0'>
                                                 
                                                 <tr height='25'>
                                                 <td>&nbsp;Program:</td><td>
                                                                 <select name='program[]' id='program' style='width:450px;' >
                                                                 <option value=''>-select-</option>";
                                                                                                                 $ab4 = mysql_query("select * from tbl_programme order by prog_id asc")or die(mysql_error());
                                                                                                                 while($b4 = mysql_fetch_array($ab4)){
                                                                                                                 $selp=($row['programme_id']==$b4['prog_id'])?"SELECTED":"";
                                                                                                                 $data.="<option value=\"".$b4['prog_id']."\" ".$selp." >".$b4['prog_id']." ".$b4['program_name']."</option>";
                                                                                                                 }
                                                                                 
                                                                                                                 mysql_free_result($ab4);
                                                                                                 $data.="</select></td>
                                                 </tr>
                                                 
                                                 <tr height='25'>
                                                 <td>&nbsp;Sub-Program:</td><td>
                                                                 <select name='subprogram[]'  id='subprogram' style='width:450px;'><option value=''>-select-</option>";
                                 $ab1 = mysql_query("select * from tbl_subcomponent where prog_id like '".$_SESSION['program']."%' order by subcomponent_code asc")or die(mysql_error());
                                 while($ba = mysql_fetch_array($ab1)){
                                 $selsub=($row['subprogram_code']==$ba['subcomponent_id'])?"SELECTED":"";
                         $data.="<option value=\"".$ba['subcomponent_id']."\"  ".$selsub.">".$ba['subcomponent_code']."&nbsp;&nbsp;   ".$ba['subcomponent']."</option>";
                                                                                                                 }
                                                                                 
                         mysql_free_result($ab1);
 $data.="</select></td>
                                                 </tr>
                                                 <tr height='25'>
                                                 <td>&nbsp;Goal:</td>
                                                 <td><textarea name='goal[]' id='goal' cols='80' rows='5'>".$row['goal']."</textarea></td>
                                                                                 </tr>
                                                 <tr valign='top'>
                                                 <td>&nbsp;Project Purpose:</td>
                                                 <td><div align='left'>
                                                 <textarea name='program_purpose[]' id='program_purpose' cols='80' rows='5'>".$row['purpose']."</textarea>
                                                 </div></td></tr>
                                                 <tr height='25'>
                                                 <td>&nbsp;Project Title</td>
                                                 <td><textarea name='title[]' cols='80' id='title' rows='5'>".$row['title']."</textarea></td></tr>
                                                 <tr height='25'>
                                                 <td>&nbsp;Project Code:</td>
                                                 <td><input type='text' name='project_code[]' id='project_code' id='project_code' value='".$row['project_code']."' size='83'></td></tr>
                                                 <tr height='25'>
                                                 <td>&nbsp;Project Goal:</td>
                                                 <td><textarea name='proj_goal[]' id='proj_goal' cols='80' rows='5'>".$row['project_goal']."</textarea>
                                                 </td></tr>
                                                 <tr valign='top'>
                                                                                         <td>&nbsp;Project Purpose:</td>
                                                                                         <td><div align='left'>
                                                                                         <textarea name='project_purpose[]' id='project_purpose' cols='80' rows='5'>".$row['purpose']."</textarea>
                                                                                         </div></td>
                                                                                 </tr>
                                                                                 <tr height='25'>
                                                                                         <td width='200' valign='top'>&nbsp;Background/Rationale:</td>
                                                                                         <td><textarea cols='80' rows='8' name='background[]'  id ='background'>".$row['background']."</textarea></td>
                                                                                 </tr>
                                                                                 <tr height='25'>
                                                                                         <td width='200' valign='top'>&nbsp;Project Funding Type:</td>".$row['background']."
                                                                                         <td><input type='text' name='funding_type[]' id='funding_type' value='".$row['projectFundingtype']."' size='83'></td>
                                                                                 </tr>
                                                                                 <tr height='25' valign='top'>
                                                                                         <td>&nbsp;Participating  Countries and Institutions:</td>
                                                                                         <td><table cellspacing='0'     ></tr>";
                                                                                 $a = mysql_query("select * from tbl_country  where memberstatus like 'Yes%' order by countryName asc")or die(mysql_error());
                                                                                 while($b = mysql_fetch_array($a)){
                                                                                 $div="status_".$b['countryCode'];
                                                                                 $checked=(strpos($row['countries'], $b['countryName']) !==false)?"CHECKED":"";
                                                         $data.="<tr><td><input type='checkbox' ".$checked." name='country[]' id='country' value=\"".$b['countryName']."\" ><a href='#'  title='click here to view organizations in ".$b['countryName']."' onclick=\"xajax_edit_organizationPerCountry('".$row['id']."','".$b['countryCode']."','".$b['countryName']."','".$div."');return false;\" ><strong>".$b['countryName']."</strong></a></td></tr>
                                                         <tr><td colspan=2><div id='status_".$b['countryCode']."'></div></td></tr>";	}
                                                         mysql_free_result($a); 
                         $data.="</table></td></tr><tr height='25'>
                                                                                         <td width='200'>Lead Institution/Organization:</td>
                                                                                         <td><select name='leadInstitution[]' id='leadInstitution' style='width:450px;'><option value='' >-select-</option>";
                                                                                                                 $ab3 = mysql_query("select * from tbl_organization order by orgName asc")or die(http(0089));
                                                                                                                 while($b3 = mysql_fetch_array($ab3)){
                                                                                                                 $selO=($row['leadInstitution']==$b3['org_code'])?"SELECTED":"";
                                                                                                                         $data.="<option value=\"".$b3['org_code']."\" ".$selO." >".mysql_real_escape_string($b3['orgName'])."</option>";
                                                                                                                 }
                                                                                 
                                                                                                                 mysql_free_result($ab3);
                                                                                                 $data.="</select>
                                                                                         </td>
                                                                                 </tr>
                                                                                 ";
                                                                                 
                                                                                 
                                                                          $data.="<tr height='25'>
                                                                                         <td width='200'>&nbsp;Status:</td>
                                                                                         <td valign='center'><select name='status[]' id='status' style='width:450px;'><option value=''>-select-</option>
                                                                                                 ";
                                                                                                                 $ab2 = mysql_query("select * from tbl_lookup where classCode='2' order by codeName")or die(mysql_error());
                                                                                                                 while($b2 = mysql_fetch_array($ab2)){
                                                                                                                 $selstatus=($b2['codeName']==$row['status'])?"SELECTED":"";
                                                                                                                         $data.="<option value=\"".$b2['codeName']."\" ".$selstatus.">".$b2['codeName']."</option>";
                                                                                                                 }
                                                                                                                 mysql_free_result($ab2);
                                                                                                 $data.="</select></td>
                                                                                 </tr> <tr height='25'>
                                                                                         <td width='200'>Principal Investigator:</td>
                                                                                         <td>
                                                                                                 <select name='principalinvestigator[]' id='principalinvestigator' style='width:450px;'><option value='' >-select-</option>";
                                                                                                                 $ab = mysql_query("select * from tbl_organization order by contact_person asc")or die(mysql_error());
                                                                                                                 while($b = mysql_fetch_array($ab)){
                                                                                                                         $selstatus=($b['contact_person']==$row['principalinvestigator'])?"SELECTED":"";
                                                                                                                         $data.="<option value=\"".$b['contact_person']."\" ".$selstatus." >".mysql_real_escape_string($b['contact_person'])."</option>";
                                                                                                                 }
                                                                                 
                                                                                                                 mysql_free_result($ab);
                                                                                                 $data.="</select>
                                                                                         </td>
                                                                                 </tr>"; 
                                                                                 $data.="<tr height='25'>
                                                                                         <td width='200'>&nbsp;Duration:</td>
                                                                                         <td valign='center'><input type name='duration[]' id='duration' value='".$row['duration']."' size='85'>
                                                                                                 </td>
                                                                                 </tr>
                                                                                 <tr><td><strong>Start Date:</strong></td>
           <td colspan=2>From:<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.fromdatevisited);return false;\" hidefocus=''>
 <input name='fromdatevisited[]' type='text'  size='20' value='".$row['startDate']."'  id='fromdatevisited' readonly='readonly' />
 <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a> End Date:<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.todatevisited);return false;\" hidefocus=''>
 <input name='todatevisited[]' type='text'  size='27' value='".$row['EndDate']."'  id='todatevisited' readonly='readonly' />
 <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a> </td>
         </tr>
                                                                                 <tr><td><strong>New Ending Date:</strong></td>
           <td colspan=2><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.newendingdate);return false;\" hidefocus=''>
 <input name='newendingdate[]' type='text'  size='78' value='".$row['NewendingDate']."' id='newendingdate' readonly='readonly' />
 <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a>  </td>
         </tr>
                                         <tr><td><strong>Total Project Funding:</strong></td>
           <td colspan=2><input name='totalfunding[]' type='text'  size='80' value='' id='totalfunding' value='".$row['totalprojectFunding']."' onKeyPress='return numbersonly(event, false)' />(USD)</td>
         </tr>			
 
                                                                                 
                                                                                 <tr height='25'>
                                                                                         <td width='200' valign='top' colspan=2>&nbsp;
                                                                                         <center><table cellspacing='0'     ><tr><td>No</td><td>Source of Funding</td><td>Amount of Funding (USD)</td><td>Shortfall(USD)</td></tr>";
                                                                                         $n=1;$y=1;
                                                                                         for($x=0;$x<1;$x++){
                                                                                         $color=$y%2==1?"evenrow":"white1";
                                                                                         $selected=$checked==true?"evenrow3":$color;
                                                                                         $data.="<tr class='$selected'><td>".$n++."</td>
                                                                                         <td><input type='text' name='source[]' 		id='source' value='".$row['sourceof_funding']."' size='20' /></td>
                                                                                         <td><input type='text' name='amount[]' 		id='amount' value='".$row['amount_available']."' size='20' /></td>
                                                                                         <td><input type='text' name='shortfall[]' 	id='shortfall' value='".$row['shortfall']."' size='20' /></td></tr>";
                                                                                         $y++;
                                                                                         }
                                                                                 
                                                                                 $data.="</table></center></td></tr>";
                                                                         $data.="
                                                                         
                                                                         <tr><td colspan=2><div id='statusxxx'></div></td></tr>
                                                                         
                                                                         <tr height='25'>
                                                                         <td width='200'>&nbsp;</td>
                                                                                         <td width='200'>&nbsp;</td>
                                                                                         <td>
                                 <input type='hidden' value='".$row['id']."' name='project_id[]' id='project_id' class='button_width'  >
                                 <input type='button'  id='button' value='SAVE' name='project_save' onclick=\"xajax_update_project(xajax.getFormValues('projects'));return false;\" class='button_width' >
                                                                                         </td>
                                                                                 </tr>
                                                                         </table></form>";
                                                                         }
                                                                         }
                                                         $obj->assign('bodyDisplay','innerHTML',$data);
                                                         return $obj;		
                                                                         
                                                                 }
 function update_project($formvalues){
                                                                 $obj=new xajaxResponse();
                                                                 
                                                                 for($x=0;$x<count($formvalues['project_id']);$x++){
                                                                 $program=$formvalues['program'][$x];
 $subprogram=mysql_real_escape_string($formvalues['subprogram'][$x]);
 $goal=mysql_real_escape_string($formvalues['goal'][$x]);
 $project_purpose=mysql_real_escape_string($formvalues['project_purpose'][$x]);
 $project_code=mysql_real_escape_string($formvalues['project_code'][$x]);
 $project_goal=mysql_real_escape_string($formvalues['proj_goal'][$x]);
 $title=mysql_real_escape_string($formvalues['title'][$x]);
 $background=mysql_real_escape_string($formvalues['background'][$x]);
 $funding_type=mysql_real_escape_string($formvalues['funding_type'][$x]);
 $organization=mysql_real_escape_string(get_Stringorg($formvalues['organization']));
 $country=mysql_real_escape_string(get_Stringorg($formvalues['country']));
 $leadInstitution=mysql_real_escape_string($formvalues['leadInstitution'][$x]);
 $status=mysql_real_escape_string($formvalues['status'][$x]);
 $duration=mysql_real_escape_string($formvalues['duration'][$x]);
 $fromdatevisited=mysql_real_escape_string($formvalues['fromdatevisited'][$x]);
 $todatevisited=mysql_real_escape_string($formvalues['todatevisited'][$x]);
 $newending_date=mysql_real_escape_string($formvalues['newendingdate'][$x]);
 $source_of_funding=mysql_real_escape_string(get_Stringorg($formvalues['source']));
 $amount=mysql_real_escape_string(get_Stringorg($formvalues['amount']));
 $shortfall=mysql_real_escape_string(get_Stringorg($formvalues['shortfall']));
 $totalfunding=mysql_real_escape_string($formvalues['totalfunding'][$x]);
 $principalinvestigator=mysql_real_escape_string($formvalues['principalinvestigator'][$x]);
 $project_code=$formvalues['project_id'][$x];
 $erCount=0;
   $error="<ul>";
                 
                 if($goal==''){
                 $error.="<li>Please Enter a Goal!</li>";
         $erCount++;
                 }
                 if($project_code==''){
                 $error.="<li>Please Enter Project Code</li>";
         $erCount++;
                 }
                 if($project_purpose==''){
                 $error.="<li>Missing Project Purpose</li>";
                 $erCount++;
                 }
                 if($title==''){
                 $error.="<li>Missing Project Title</li>";
         $erCount++;
                 }
                 if($leadInstitution==''){
                 $error.="<li>Missing Lead Institution</li>";
         $erCount++;
                 }
                 /*  if($leadInstitution==''){
                 $error.="<li>Missing Lead Institution</li>";
 `		$erCount++;
                 } */
                 $error .="</ul>";
                 if($erCount > 0){
                         $obj->assign("statusxxx","innerHTML",errorMsg($error));
                         return $obj;
                 }	  
  //////**/
                 $sql="update tbl_project set `programme_id`='".mysql_real_escape_string($program)."', 
  `subcomponent_id`='".$subprogram."',
  `goal`='".$goal."', 
  purpose='".$project_purpose."',
  `project_code`='".$project_code."',
   `title`='".$title."',project_goal='".$project_goal."',
   `background`='".$background."',
   `projectFundingtype`='".$funding_type."',
   totalprojectFunding='".$totalfunding."',
    `countries`='".$country."',
     `institutions`='".$organization."',
          `leadInstitution`='".$leadInstitution."',
           `status`='".$status."',
           `duration`='".$duration."', 
           `startDate`='".$fromdatevisited."', 
           `EndDate`='".$todatevisited."',
            `NewendingDate`='".$newending_date."',
            `principalinvestigator`='".$principalinvestigator."',
             `sourceof_funding`='".$source_of_funding."',
    `amount_available`='".$amount."',
     `shortfall`='".$shortfall."',
         `updatedby`='".$_SESSION['username']."' where id=$project_code
                 ";
  $query=@mysql_query($sql)or die(http(0043));
                 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
 $obj->call("xajax_view_project",'','','','','',1,20);
 
                                                                 return $obj;
                                                                 }
 function edit_organizationPerCountry($id,$country_id,$countryName,$div){
         $obj=new xajaxResponse();
         //$obj->alert($county_id);
                 $data.="<table cellspacing='0'     >
                 <tr class='evenrow'><td><strong>Institutions In $countryName </strong><em>(select all that Apply)</em></td>";
                 $x=mysql_query("select * from tbl_project where id='".$id."'")or die(http(0180));
                 while($rowx=mysql_fetch_array($x)){
                 $a = mysql_query("select * from tbl_organization  where country_id ='".$country_id."' order by orgName asc")or die(mysql_error());
                         while($b = mysql_fetch_array($a)){
                         $checkedorg=(strpos($rowx['institutions'], $b['orgName']) !==false)?"CHECKED":"";
                         $data.="<tr><td><input type='checkbox' name='organization[]' ".$checkedorg." id='organization' value=\"".$b['orgName']."\">".$b['orgName']."</option></td></tr>
                                 <tr><td colspan=2><div id='status_".$b['countryCode']."'></div></td></tr>";	
                                 
                                 }
                                 }
                                                         mysql_free_result($a); 
                         $data.="</table>";
                                                                 
                 $obj->assign($div,'innerHTML',$data);
                 return $obj;	
                         }
 function edit_organization($formvalues){
 $obj=new xajaxResponse();
 
            
  for($i=0;$i<count($formvalues['org_code12']);$i++){
                           $org_code12=$formvalues['org_code12'][$i];
                           $x="select * from tbl_organization where org_code='".$org_code12."'";
                          #$obj->addAlert($x);
                           $query=mysql_query($x)or die(http("ED-2214"));
                            while($row=@mysql_fetch_array($query)){
 $data.="<div id='login'><table cellspacing='0'      width='600'><tr><td><form name='organization_reds' id='organization_reds'>
 <table cellspacing='0'      width='600' border='0' id='organizational_details'> ";
 
 $data.="<tr>
                 <td>Name of Organization</td>
                 <td colspan='2'><input name='orgcode[]' type='hidden' id='orgcode' size='80' value='".$row['org_code']."'/><input name='orgname[]' type='text' id='orgname' size='80' value='".$row['orgName']."'/></td>
               </tr>
               <tr>
                 <td>Acronym</td>
                 <td colspan='2'><input name='acronym[]' type='text' id='acronym' size='80' value='".$row['acronym']."' /></td>
               </tr>
               
             
               <tr>
                 <td>Country:</td>
                 <td colspan='2'><select name='zonename[]' id='zonename' style='width:430px;'><option value=''>-select-</option>";
         $queryzone=mysql_query("select * from tbl_country where memberstatus like 'Yes%' order by countryName  asc")or die(http(2244));
         while($rowzone=mysql_fetch_array($queryzone)){
         $selct=($row['country_id']==$rowzone['countryCode'])?"selected":"";
       $data.="<option value=\"".$rowzone['countryCode']."\" ".$selct.">".$rowzone['countryName']."</option>";
           }
           $data.="</select></td>
               </tr>
                            <tr>
     <td>District/Municipality:</td>
     <td><select name='district[]' id='district' style='width:430px;' >";
 
 
      $q=mysql_query("select * from tbl_district  order by 1 asc")or die(http(330));
           while($rowd=mysql_fetch_array($q)){
           $selc=($row['district']==$rowd['districtCode'])?"selected":"";
       $data.="<option value=\"".$rowd['districtCode']."\" ".$selc." >".$rowd['districtName']."</option>";
 
         }
         
                $data.="</select></td>
   </tr>
    <tr >
     <td>Subcounty/Division:</td>
     <td><select name='subcounty[]' id='subcounty' style='width:430px;' ><option>-select-</option>";
 
       $qsubcounty=mysql_query("select * from tbl_subcounty  where districtCode like '".$row['district']."' order by 1 asc")or die(http(321));
           while($rowsubcounty=mysql_fetch_array($qsubcounty)){
           $selsubcounty=($row['subcounty']==$rowsubcounty['subcountyCode'])?"SELECTED":"";
       $data.="<option value=\"".$rowsubcounty['subcountyCode']."\" ".$selsubcounty.">".$rowsubcounty['subcountyName']."</option>";
          }
          
     $data.="</select></td>
   </tr>
  <tr >
     <td>Parish/Ward:</td>
     <td><select name='parish[]' id='parish' style='width:430px;' ><option value='' >-select-</option>";
         //if($_SESSION['districtCode']<>''){
      
       $qparish=mysql_query("select * from tbl_parish where districtCode like '".$row['district']."%' order by 1 asc")or die(http(321));
           while($rowparish=mysql_fetch_array($qparish)){
          $selparish=($row['parish']==$rowparish['parishCode'])?"selected":"";
       $data.="<option value=\"".$rowparish['ParishCode']."\" ".$selparish.">".$rowparish['ParishName']."</option>";
         
          
         // }
          }
 
         $data.="</select></td>
   </tr>
 <tr>
                 <td>Village:</td>
                 <td colspan='2'><label>
                   <input name='village[]' id='village' value='".$row['village']."' type='text' size='80' />
                   </label></td>
               </tr>
               <tr>
                 <td>Type of Organization:</td>
                 <td colspan='2'><label>
                   <select name='orgtype[]' id='orgtype' style='width:430px;'><option value='' >-select organization-</option>";
                                    $query=mysql_query("select * from tbl_lookup where classCode=1 order by codeName Asc")or die("Sunrise Error-Code-0057 because, ".mysql_error());
                                   
                                   while($rowt=mysql_fetch_array($query)){
                                   $selovc=($row['orgtype']==$rowt['code'])?"selected":"";
                                   $data.="<option value=\"".$rowt['code']."\" ".$selovc." >".$rowt['codeName']."</option>";
                                   }
                   $data.="</select>
                   </label></td>
               </tr>
                          
                           
                             <tr>
              <td>Contact Farmer:</td>
       <td><input name='contact_person[]' type='text' id='contact_person' size='80' /></td>
     </tr>
          <tr>
              <td>Contact Farmer Gender:</td>
     <td colspan='2'><label>
                   <select name='gender[]' id='gender' style='width:430px;'><option value='' >-select-</option>";
                                  
                                  if($row['gender']=='M'){
                                   $data.="<option value='M' 'selected' >Male</option>
                                   <option value='F'  >Female</option>";
                                 }else if($row['gender']=='F'){
                                    $data.="<option value='F' 'selected'  >Female</option>
                                    <option value='M' >Male</option>
                                   ";
                                  
                                  }
                                  else
                                  
                                  $data.="
                                  <option value='' >-select-</option>
                                  <option value='M'>Male</option>
                                   <option value='F'>Female</option>";
                   $data.="</select>
                   </label></td>
               </tr></td>
     </tr>
                 
            <tr>
              <td>Telephone No.:</td>
       <td><input name='telephone[]' type='text' id='telephone' size='80' value='".$row['telephone']."' /></td>
     </tr>
   
          <tr>
        <td colspan='2' >
            <table width='30%' border='0' align='center'>
            <tr><th  colspan='4'><center>Farmer Information</center></th></tr>
   <tr>
    <th width='6%'>NO</th>
     <th width='9%'>Male Farmers</th>
     <th width='10%'>Female Farmers</th>
     <th width='75%'>Total Number of Farmers</th>
   </tr>
    <tr>
    <td>1</td>
     <td><input name='male[]' type='text' id='male' size='20' value='".$row['maleFarmers']."' /></td>
     <td><input name='female[]' type='text' id='female' size='20' value='".$row['femaleFarmers']."'onKeyPress='return numbersonly(event, false)' /></td>
     <td><input name='total[]' type='text' id='total' size='20' value='".$row['totalF']."' onKeyPress='return numbersonly(event, false)' readonly='readonly' onKeyPress='return numbersonly(event, false)' onFocus=\"xajax_calc_budget(getElementById('male').value,getElementById('female').value,'total');return false;\" onBlur=\"xajax_calc_budget(getElementById('male').value,getElementById('female').value,'total');return false;\" /></td>
    </tr
 ></table>
            
            
 </td>
     </tr>
         
          <tr>
              <td colspan='2' align='center'><table width='200' border='0'>
 
    <tr><th  colspan='4'><center>Household Information</center></th></tr>
    <tr>
    <th>NO</th>
     <th>Male Headed</th>
     <th>Female Headed</th>
     <th>Total Number of Housedolds</th>
   </tr>
     <td>1</td>
     <td><input name='maleh[]' type='text' id='maleh' size='20' value='".$row['maleheadedHH']."' onKeyPress='return numbersonly(event, false)' /></td>
     <td><input name='femaleh[]' type='text' id='femaleh' size='20' value='".$row['maleheadedHH']."' onKeyPress='return numbersonly(event, false)' /></td>
     <td><input name='totalh[]' type='text' id='totalh' size='20' 
         value='".$row['totalHH']."'
         
          readonly='readonly' onKeyPress='return numbersonly(event, false)' onFocus=\"xajax_calc_budget(getElementById('maleh').value,getElementById('femaleh').value,'totalh')\" /></td>
 </table>
 </td>
     </tr>
          <tr>
            <td COLSPAN=2>&nbsp;</td>
       <td><label>
         <div align='right'>
           <input type='button'  id='button' name='save_organization' class='button_width' id='save_organization' onclick=\"xajax_update_organization(xajax.getFormValues('organization_reds'));return false;\" value='Save' />
           </div>
       </label></td>
     </tr>
   </table></form>";
 } 
            
            
           }
 
 $obj->assign("bodyDisplay","innerHTML",$data);
 return $obj;
 }
 function update_organization($formvalues){
 $obj=new xajaxResponse();
 //$obj->alert(count($formvalues['orgcode']));
 #$obj->addAlert(count($formvalues['org_code12']));
 for($x=0;$x<count($formvalues['orgcode']);$x++){
 $org_code=$formvalues['orgcode'][$x];
 $orgName=mysql_real_escape_string($formvalues['orgname'][$x]);
 $acronym=trim($formvalues['acronym'][$x]);
 $registered=trim($formvalues['registered'][$x]);
 $village=trim($formvalues['village'][$x]);
 $country=trim($formvalues['zonename'][$x]);
 $orgtype=trim($formvalues['orgtype'][$x]);
 $district=mysql_real_escape_string($formvalues['district'][$x]);
 $subcounty=mysql_real_escape_string($formvalues['subcounty'][$x]);
 $parish=mysql_real_escape_string($formvalues['parish'][$x]);
 $objectives=mysql_real_escape_string($formvalues['objectives'][$x]);
 //$subcomponent=get_Stringorg($formvalues['subcomponent'][$x]);
 $gender=trim($formvalues['gender'][$x]);
 $password=trim($formvalues['password'][$x]);
 $subsector=$formvalues['subsector'][$x];
 #$obj->addAlert($subsector);
 $address=mysql_real_escape_string($formvalues['address'][$x]);
 $website=trim($formvalues['website'][$x]); 
 $fax=trim($formvalues['fax'][$x]); 
 $contact_person=trim($formvalues['contact_person'][$x]);
 $title=trim($formvalues['title'][$x]);
 $telephone=trim($formvalues['telephone'][$x]);
  $mobile=trim($formvalues['mobile'][$x]);
 $contact_person2=trim($formvalues['contact_person2'][$x]);
 $title2=trim($formvalues['title2'][$x]);
 $telephone2=trim($formvalues['telephone2'][$x]);
 $mobile2=trim($formvalues['mobile2'][$x]);
 $contact_person3=trim($formvalues['contact_person3'][$x]);
 $title3=trim($formvalues['title3'][$x]);
 $telephone3=trim($formvalues['telephone3'][$x]);
 $mobile3=trim($formvalues['mobile3'][$x]); /**/
 
 
 if($orgName==""){
 $obj->assign("status","innerHTML",errorMsg("Enter Organization Name"));
 return $obj;
 }
 /*if($username==""){
 $obj->assign("status","innerHTML",errorMsg("Enter userName"));
 return $obj;
 }*/
 if($contact_person==""){
 $obj->assign("status","innerHTML",errorMsg("Enter contact Person's Name"));
 return $obj;
 }
 
 $insert="UPDATE tbl_organization set orgName='".ucwords($orgName)."',
 acronym='".strtoupper($acronym)."',
 district='".ucwords($district)."',
 village='".$village."',
 country_id='".$country."',orgtype='".$orgtype."',
 subcounty='".ucwords($subcounty)."',parish='".ucwords($parish)."',
 gender='".ucwords($gender)."',
 
 brief_introduction='".ucwords($brief_introduction)."',
 address='".strtoupper($address)."',
 website='".$website."',fax='".$fax."',
 contact_person='".$contact_person."',
 title='".$title."',
 telephone='".$telephone."',
 mobile='".$mobile."',
 contact_person2='".$contact_person2."',title2='".$title2."',telephone2='".$telephone2."',
 mobile2='".$mobile2."',contact_person3='".$contact_person3."',
 title3='".$title3."',
 telephone3='".$telephone3."',
 mobile3='".$mobile3."' where org_code='".$org_code."'";
 $query=mysql_query($insert)or die(http(0617));
 //$obj->alert($insert);
 //$max
 #mysql_query("update tbl_user set name='".ucwords($orgName)."',username='".$username."',password='".md5($password)."',subcomponent='".mysql_real_escape_string($subcomponent)."',usergroup='".$orgtype."',role)(select orgName,username,password,subcomponent,usergroup,organization_type from view_organization where username='".$username."');")or die("Sunrise error code 00236 because, ".mysql_error());
 $obj->assign("bodyDisplay","innerHTML",congMsg("Organization Captured!"));
 }
 
 //$obj->call("xajax_view_organization",'','','',1,20);
 //$obj->redirect('organization.php');
 return $obj;
 }
 function edit_users($formvalues){
 $object=new xajaxResponse();
 $data="<form name='users' ID='users' method=post action='".$PHP_SELF."'>
 <table cellspacing='0'      width='100%' border='0' align='left'>
                 "; 
                                 for($i=0;$i<count($formvalues['user_id']);$i++){
                                 
  // $object->alert(count($formvalues['user_id']));
   $sql="select * from tbl_user where user_id='".$formvalues['user_id'][$i]."'";
  // $object->alert($sql);
                                 $sel=mysql_query($sql)or die(http(330));
                                 while($row=mysql_fetch_array($sel)){
                                 
                         $data.="<tr>
                 <td colspan='4' valign='top'><div id='status'></div></td>
               </tr>
                           <tr>
                 <td colspan='4' valign='top'><hr></td>
               </tr>
               <tr>
                 <td width='162'><input name='user_id[]' type='hidden'  size='40' id='user_id' value='".$row['user_id']."' /><div align=''>Name</div></td>
                 <td width='3' align='right'><label> <span style='color:#ff0000;'>* </span></td><td>
                       <input name='fname[]' type='text'  size='70' id='fname' value='".$row['name']."' />
               </td>
                                 <td></td>
               </tr>
               
                           <tr>
                 <td><div align=''>User Group:</div></td>
                 <td align='right'><label></label>
                     <span style='color:#ff0000;' >*</td><td> 
                    <select name='usergroup[]' id='usergroup' style='width:376px;' >
                                                                                                 <option value=''>-select-</option>
                                                                                                 ";
                     $select=mysql_query("select * from tbl_usergroup group by group_name order by group_name asc")or die(mysql_error());
                                         while($rowg=mysql_fetch_array($select)){
                                         $selgroup=($rowg['group_id']==$row['usergroup'])?"SELECTED":"";
                       $data.="
                                                                                                 <option value=\"".$rowg['group_id']."\" ".$selgroup." >".$rowg['group_name']."</option>
                                                                                                 ";
                                           }
                     $data.="
                                                                                 </select>
                     </span></td>
                 <td></td>
               </tr>
                            <tr>
                 <td><div align=''>Role</div></td>
                 <td align='right'><label></label>
                     <span style='color:#ff0000;'>* </td><td>
                     <select name='role[]' id='role' style='width:376px;'><option value=''>-select-</option>";
                     $select=mysql_query("select * from tbl_role  group by role_name order by role_name asc")or die(mysql_error());
                                         while($rowr=mysql_fetch_array($select)){
                                         $selr=($rowr['role_id']==$row['role'])?"SELECTED":"";
                       $data.="<option value=\"".$rowr['role_id']."\" ".$selr.">".$rowr['role_name']."</option>";
                                           }
                     $data.="</select>
                     </span></td>
                 <td></td>
               </tr>
                           <tr>
                 <td><div align=''>Organization:</div></td>
                 <td align='right'><label></label>
                     <span style='color:#ff0000;'>* </td><td>
                    <select name='organization[]' id='organization' style='width:376px;' >
                                                                                                 <option value=''>-select-</option>
                                                                                                 ";
                     $select=mysql_query("select * from tbl_organization group by orgName order by orgName asc")or die(mysql_error());
                                         while($rowo=mysql_fetch_array($select)){
                                         $selorg=($row['org_code']==$rowo['org_code'])?"SELECTED":"";
                       $data.="<option value=\"".$rowo['org_code']."\" ".$selorg.">".$rowo['orgName']."</option>";
                                           }
                     $data.="</select>
                     </span></td>
                 <td></td>
               </tr>
                           <tr>
                 <td><div align=''>Country:</div></td>
                 <td><label></label>
                     <span style='color:#ff0000;'>* </td><td>
                     <select name='country[]' id='country' style='width:376px;'><option value=''>-select-</option>";
                     $select=mysql_query("select * from tbl_country group by countryName order by countryName asc")or die(mysql_error());
                                         while($rowdc=mysql_fetch_array($select)){
                                         $seldc=($rowdc['countryCode']==$row['country'])?"SELECTED":"";
                       $data.="<option value=\"".$rowdc['countryCode']."\" ".$seldc." >".$rowdc['countryName']."</option>";
                                           }
                     $data.="</select>
                     </span></td>
                 <td></td>
               </tr>
                           <tr>
                 <td><div align=''>District/Province:</div></td>
                 <td align='right'><label></label>
                     <span style='color:#ff0000;'>* </td><td>
                     <select name='district[]' id='district' style='width:376px;' >
                                                                                                 <option value=''>-select-</option>
                                                                                                 ";
                     $select=mysql_query("select * from tbl_district group by districtName order by districtName asc")or die(mysql_error());
                                         while($rowd=mysql_fetch_array($select)){
                                         $seld=($rowd['districtCode']==$row['district'])?"SELECTED":"";
                       $data.="<option value=\"".$rowd['districtCode']."\" ".$seld.">".$rowd['districtName']."</option>";
                                           }
                     $data.="</select>
                     </span></td>
                 <td></td>
               </tr>
                           <tr>
                 <td><div align=''>Program:</div></td>
                 <td align='right'><label></label>
                     <span style='color:#ff0000;'>*</td><td>
                     <select name='program[]' id='program' style='width:376px;'><option value=''>-select-</option>
                                         <option value='N/A'>-N/A-</option>";
                     $select=mysql_query("select * from tbl_programme group by program_name order by program_name asc")or die(mysql_error());
                                         while($rowp=mysql_fetch_array($select)){
                                         $selp=($row['program_code']==$rowp['prog_id'])?"SELECTED":"";
                       $data.="<option value=\"".$rowp['prog_id']."\" ".$selp.">".$rowp['program_code']." ".substr($rowp['program_name'],0,70)."</option>";
                                           }
                     $data.="</select>
                     </span></td>
                 <td></td>
               </tr>
                            <tr>
                 <td><div align=''>Sub-Program:</div></td>
                 <td align='right'><label></label>
                     <span style='color:#ff0000;'>* </td><td>
                     <select name='subcomponent[]' id='subcomponent' style='width:376px;'><option value=''>-select-</option>
                                         ";
                     $selects=mysql_query("select * from tbl_subcomponent group by subcomponent order by subcomponent_code asc")or die(mysql_error());
                                         while($rows=mysql_fetch_array($selects)){
                                         $selw=($row['subcomponent_id']==$rows['subcomponent_id'])?"SELECTED":"";
                       $data.="<option value=\"".$rows['subcomponent_id']."\" ".$selw.">".$rows['subcomponent_code']." ".substr($rows['subcomponent'],0,70)."</option>";
                                           }
                     $data.="</select>
                     </span></td>
                 <td></td>
               </tr>
              <tr>
                 <td><div align=''>Project:</div></td>
                 <td><label></label>
                     <span style='color:#ff0000;'>* </td><td>
                     <select name='Project[]' id='Project' style='width:376px;'><option value=''>-select-</option>
                                         ";
                     $selectp=mysql_query("select * from tbl_project group by title order by title asc")or die(mysql_error());
                                         while($rowp=mysql_fetch_array($selectp)){
                                                 $selp=($row['project_id']==$rowp['id'])?"SELECTED":"";
 
                       $data.="<option value=\"".$rowp['project_id']."\" ".$selp." >".$rowp['project_code']." ".substr($rowp['title'],0,70)."</option>";
                                           }
                     $data.="</select>
                     </span></td>
                 <td></td>
               </tr>
                           <tr>
                 <td><div align=''>Username</div></td>
                 <td colspan='' width='2' align='right'><label></label>
                     <span style='color:#ff0000;'>* </span></td><td colspan=2>
                     <input type='text' size='70' name='username[]' id='username' value='".$row['username']."' />
                                         <em>[hint]</em>  <b>firstname.second Name</b></td>
               </tr>
               <tr>
                 <td><div align=''>Desired Password</div></td>
                 <td align='right'><span style='color:#ff0000;'>* </span></td><td>
                     <input name='password[]' type='password'  id='password' size='70'  value='".$row['password']."' /></td>
                                         <td></td>
               </tr>
               <tr>
                 <td width='162'>confirm password</td>
                 <td align='right'><span style='color:#ff0000;'>* </span></td><td>
                     <input type='password' size='70' name='cpass[]' id ='cpass'  value='".$row['password']."' /></td>
                                         <td></td>
               </tr>
               <tr>
         <td>Verification Code </td><td></td>
                 
             <td class='evenrow' background='images/pub.jpg'>";
                         $code = generateCode(6);
               $data.="<font color='#990000' size='4' face ='palatino linotype'><b>".$code."</b></font>
               <input type='hidden' name='code[]'  size='70' id='code' value='".$code."' /></td><td style='padding: 10px 7px 7px;' <a tabindex='6' href=\"javascript:Recaptcha.reload();\" title='Get two new words' id='recaptcha_reload_btn'><img src='http://www.google.com/recaptcha/api/img/clean/refresh.png' id='recaptcha_reload' alt='Get two new words' width='25' height='18'></a> <a tabindex='7' href=\"javascript:Recaptcha.switch_type('audio');\" title='Audio challenge' id='recaptcha_switch_audio_btn' class='recaptcha_only_if_image'><img src='http://www.google.com/recaptcha/api/img/clean/audio.png' id='recaptcha_switch_audio' alt='Audio challenge' width='25' height='15'></a><a tabindex='8' href=\"javascript:Recaptcha.switch_type('image');\" title='Visual challenge' id='recaptcha_switch_img_btn' class='recaptcha_only_if_audio'><img src='http://www.google.com/recaptcha/api/img/clean/text.png' id='recaptcha_switch_img' alt='Visual challenge' width='25' height='15'></a> <a tabindex='9' target='_blank' href='http://www.google.com/recaptcha/help?c=03AHJ_VuvT0DMV-Y9hwnvfcbjhkc1VlCFOGet8ll55LohTirWXhn_cZAqn_l6_s5ko40zc15s5G_9eVWhOqhwOL-LUqOmuXLCWHGbeDCw7AgxNKh8-FSazKLaEA1nRbdNczqJUveZj6GfxAoEPIFKdJRMG20GJZRZghA&amp;hl=en-GB' title='Help' id='recaptcha_whatsthis_btn'><img alt='Help' src='http://www.google.com/recaptcha/api/img/clean/help.png' id='recaptcha_whatsthis' width='25' height='16'></a> </td> <td style='padding: 18px 7px;'> <img src='http://www.google.com/recaptcha/api/img/clean/logo.png' id='recaptcha_logo' alt='' width='71' height='36'></td></tr>
                 
              
               <tr>
                 <td colspan =''>Enter code above </td>
                 <td align='right'><span style='color:#ff0000;'>* </span></td><td>
                     <input type='text' name='vcode[]' size='70' id ='vcode' />                </td>
                                 <td width='500' class='redhdrs' align=left>Case Sensitive!</td>
               </tr>";
                           
                 
                                 }
                                 
                                 }
                                 
                                 $data.="
                                 <tr>
                                                 <td>&nbsp;</td>
                                                 <td align='right' colspan=2>
                                                                 <input name='reg_user' type='button'  id='button' style='width:140px;'  id='reg_user' value='Save' onclick=\"xajax_update_users(xajax.getFormValues('users')); \" />
                                                 </td>
                                 </tr>
                 </table>
 </form>";
 $object->assign('bodyDisplay','innerHTML',$data);
 return $object;
 }
 function update_users($formvalues){
 $obj=new xajaxResponse();
 /* if($_SESSION['role']<>'Systems Administrator'){
 $object->alert("Access Denied!\n Only Systems Adminstrator  can edit a setup Item");
 $object->redirect("index.php");
 return $object;
 } */
 for($x=0;$x<count($formvalues['user_id']);$x++){
 $user_id=$formvalues['user_id'][$x];
 $fname=$formvalues['fname'][$x];
 $usergroup=$formvalues['usergroup'][$x];
 $role=$formvalues['role'][$x];
 $username=$formvalues['username'][$x];
 $organization=$formvalues['organization'][$x];
 $district=$formvalues['district'][$x];
 $program=$formvalues['program'][$x];
 $subcomponent=$formvalues['subcomponent'][$x];
 $project_id=$formvalues['project_id'][$x];
 $password=$formvalues['password'][$x];
 $cpass=$formvalues['cpass'][$x];
 $code=$formvalues['code'][$x];
 $vcode=$formvalues['vcode'][$x];
 $country=$formvalues['country'][$x];
 
 if($fname==''){
 $obj->assign('status',"innerHTML",errorMsg("Missing FirstName"));
 return $obj;
 }
 if($username==''){
 $obj->assign('status',"innerHTML",errorMsg("Missing LastName"));
 return $obj;
 } if ($password==''){
 $obj->assign('status',"innerHTML",errorMsg("Missing Password"));
 return $obj;
 }
  if($cpass==''){
 $obj->assign('status',"innerHTML",errorMsg("confirm Password!"));
 return $obj;
 }
 if(strlen($password)<6){
 $obj->assign('status',"innerHTML",errorMsg("Weak Password,Password should be more than 6 characters"));
 return $obj;
 } 
 if($password!=$cpass){
 $obj->assign('status',"innerHTML",errorMsg("Password Mismatch"));
 return $obj;
 }
 if($vcode==''){
 $obj->assign('status',"innerHTML",errorMsg("Enter Verification Code"));
 return $obj;
 }
 if($code!=$vcode){
 $obj->assign('status',"innerHTML",errorMsg("Invalid Verification Code"));
 return $obj;
 }
  
 $xx="update tbl_user set name='".$fname."',username='".$username."',usergroup='".$usergroup."',program_id='".$program."',subcomponent='".$subcomponent."',project_id='".$project_id."',password='".md5($password)."',role='".$role."',district='".$district."',org_code='".$organization."',country='".$country."' where user_id='".$user_id."'";
 #$object->addAlert($xx);
 mysql_query($xx)or die(mysql_error());
 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("User Changed Successfully!"));
 $obj->call("xajax_view_users",'','','','','','','','','');
 return $obj;
 
 }
 function edit_relatedLink($formvalues){
                         $obj=new xajaxResponse();
                         
                         if(count($formvalues['relatedlink_id'])==0){
                         //$obj->alert($formvalues['relatedlink_id']);
                         $obj->alert("Please select an Item to Edit and try again!");
                         return $obj;
                         }
                 $data="<form action='functions.php' method='post' NAME='comments' id='comments' enctype='multipart/form-data'>
                 <table cellspacing='0'      width='535' border='0'>
                   <tr>
                     <td width='517'>
                       <table cellspacing='0' border='0'>";
                                           
                                         for($i=0;$i<count($formvalues['relatedlink_id']);$i++){
                                         $link_id=$formvalues['relatedlink_id'][$i];
                                           $query114=Execute("select * from tbl_relatedLinks where relatedlink_id='".$link_id."'")or die(mysql_error());
                                           while($row=FetchRecords($query114)){
                                           $data.="<tr>
                           
  
  
  
                           <td colspan=2><hr></td>
                         </tr>
                         <tr>
                           <td class=''>Link Name:</td>
                           <td>
                                                    <input name='relatelink_id type='hidden' id='relatelink_id' size='1' value='".$row['relatedlink_id']."' />
                                                   
                                                   <input name='linkname' type='text' id='linkname' size='48' value='".$row['linkName']."' /></td>
                         </tr>
                         <tr>
                           <td>Url</td>
                                                  
                                                   
                                                   
                           <td><input name='url' type='text' id='url' size='48' value='".$row['url']."' /></td>
                         </tr>
                         <tr>
                           <td>Attach Logo if any:</td>
                           <td> <input type='hidden' name='MAX_FILE_SIZE' value='100000000' />
                                                    <input name='img_file' type='file' value='".$row['logo']."'  id='img_file' size='35'></td>
                         </tr>
 
                         <tr>
                           <td>&nbsp;</td>
                           <td align='right'></td>
                         </tr>
                         <tr>
                           <td>&nbsp;</td>
                           <td align='right'><input type='submit' name='save_relatedLink' id='save_relatedLink'  value='Save' /></td>
                         </tr>";
                                                         }
                                                                 }
                       $data.="</table>
                    </td>
                   </tr>
                 </table>
               </form>
            ";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 //<a href='functions.php?linkvar=Save_Related_Link&&action=Related Links'>
 }
 function edit_district($formvalues,$linkvar){
 $object=new xajaxResponse(); 
 
 $data="<form name='new_district' id='new_district' method='POST' enctype='application/x-www-form-urlencoded'  action='".$PHP_SELF."' ><table cellspacing='0'      width='100%' border='0'> ";
 switch($linkvar){
 case "edit_district":
 for($i=0;$i<count($formvalues['district_code']);$i++){
 $district_code=$formvalues['district_code'][$i];
 $check="select * from tbl_district where districtCode ='".$district_code."'";
 #$object->addAlert($check);
 $select = mysql_query($check)or die(http(3577));
 while($row = mysql_fetch_array($select)){
 
               
               $data.="
                          
             <tr>
                       <td>Entry Type:</td>
                                           <select name='entryType[]' id='entryType' size='1'>";
                                           
                                           if($row['entryType']=='District') {
                                           $data.="<option value='District' selected='selected'>District</option>
                                           <option value='Municipality'>Municipality</option>";
                                          } else if($row['entryType']=='Municipality') {
                                            $data.="<option value='Municipality' selected='selected'>Municipality</option>
                                            <option value='District' >District</option>
                                           ";
                                           }else {
                                           $data.="<option value=''>-select-</option>
                                           <option value='Municipality' >Municipality</option>
                                            <option value='District' >District</option>
                                 
                                           ";
                                           }
 
 
         $data.="</select>
                     </tr>
                     <tr>
                       <td>District Name:</td>
                                           <td>
                                         <input type='hidden' id='district_code'  name='district_code[]'  value='".$row['districtCode']."' size='25' />  
                         <input type='text' id='districtname'  name='districtname[]'  value='".$row['districtName']."' size='25' /></td>
                     </tr>
                     <tr>
                       <td>Acronym:</td>
                                           <td><input type='text' id='acronym'  name='acronym[]'  value='".$row['acronym']."' size='25' /></td>
                     </tr>
                                         <tr>
                       <td>Zone:</td>
                                           <td><select name='zone[]' size='1' id='zone'><option value=''>-Select-</option>";
           $selzone=mysql_query("select * FROM tbl_zone ORDER BY zoneCode ASC")or die(http(2427));
           while($rowzone=mysql_fetch_array($selzone)){
           $selectedzone=($row['zone']==$rowzone['zoneCode'])?"selected":"";
           $data.="<option value=\"".$rowzone['zoneCode']."\" ".$selectedzone." >".$rowzone['zoneName']."</option>";
           }
 $data.="</select></td>
                     </tr>
                                         
                                         
                                         <tr>
                       <td>No. of TSO service Providers:</td>
                                           <td><input type='text' id='serviceprovider'  name='serviceprovider[]'  value='".$rowedit['serviceprovider']."' size='25' /></td>
                     </tr>
                                         ";
                                         }
                                         }
                $data.="<tr>
                       <td colspan=2></td>
                       <td><input type='button'  id='button' id='btnsave' value='Save' name='btnsave'  onclick=\"xajax_update_district(xajax.getFormValues('new_district'),'edit_district')\" /></td>
                     </tr>
                   ";
                                   break;
                                         
                                         case "edit_subcounty":
                                         #========edit_subcounty========================
                                         
                                         for($i=0;$i<count($formvalues['subcountyCode']);$i++){
 $subcountyCode=$formvalues['subcountyCode'][$i];
 $check="select * from tbl_subcounty where subcountyCode ='".$subcountyCode."'";
 #$object->addAlert($check);
 $select = mysql_query($check)or die(http(3577));
 while($rowedit = mysql_fetch_array($select)){
 
 $data.="
                 <tr>
     <td colspan='2'><hr></td></tr>
   <tr>
     <td>District Name:</td>
     <td width='162'><select name='districtCode[]' id='districtCode' size='1'><option value=''>-select-</option>";
         $query=mysql_query("select * from tbl_district order by districtCode asc")or die(http());
         while($row=mysql_fetch_array($query)){
         $seldistrict=($rowedit['districtCode']==$row['districtCode'])?"SELECTED":"";
         $data.="<option value=\"".$row['districtCode']."\" ".$seldistrict." >".$row['districtName']."</option>";
         }
         $data.="</select></td>
   </tr>
   <tr>
     <td>Subcounty:</td>
     <td><input type='text' name='subcountyName[]' id='subcountyName' value='".$rowedit['subcountyName']."' />
         <input type='hidden' name='subcountyCode[]' id='subcountyCode' value='".$rowedit['subcountyCode']."'>
         
         </td>
   </tr>";
   
 }
 
 
 }
 
 $data.="<tr>
 <td colspan=''></td>
 <td><input type='button'  id='button' id='btnsave' value='Save' name='btnsave'  onclick=\"xajax_update_district(xajax.getFormValues('new_district'),'edit_subcounty')\" /></td>
                    
   </tr>
 ";
                                         
                                         
                                         break;
                                 case "edit_parish":	
                                 
 for($i=0;$i<count($formvalues['ParishCode']);$i++){
 $ParishCode=$formvalues['ParishCode'][$i];
 $check="select * from tbl_parish where ParishCode ='".$ParishCode."'";
 #$object->addAlert($check);
 $select = mysql_query($check)or die(http(3577));
 while($rowedit = mysql_fetch_array($select)){
                                 
                                 
                                 $data.="
                                 <tr>
     <td colspan='2'><hr></td></tr>
   <tr>
     <td>District Name:</td>
     <td width='162'>
         <input type='hidden' name='ParishCode[]' id='ParishCode' value='".$rowedit['ParishCode']."'>
         <select name='districtCode[]' id='districtCode' size='1'><option value=''>-select-</option>";
         $query=mysql_query("select * from tbl_district order by districtName asc")or die(http(2017));
         while($row=mysql_fetch_array($query)){
         $seldistrict=($rowedit['districtCode']==$row['districtCode'])?"selected":"";
         $data.="<option value=\"".$row['districtCode']."\" ".$seldistrict." >".$row['districtName']."</option>";
         }
         $data.="</select></td>
   </tr>
   <tr>
     <td>Subcounty:</td>
     <td><select name='subcountyName[]' id='subcountyName' size='1'><option value=''>-select-</option>";
 
         $querysubcounty=mysql_query("select * from tbl_subcounty order by subcountyName asc")or die(http(2026));
         while($rowsubcounty=mysql_fetch_array($querysubcounty)){
         $selsubcounty=($rowedit['subcountyCode']==$rowsubcounty['subcountyCode'])?"SELECTED":"";
         $data.="<option value=\"".$rowsubcounty['subcountyCode']."\" ".$selsubcounty.">".$rowsubcounty['subcountyName']."</option>";
         }
         $data.="</select></td>
   </tr>
   <tr>
     <td>Parish Name:</td>
     <td width='162'><input type='text' name='parishName[]' id='parishName' value='".$rowedit['ParishName']."' /></td>
   </tr>";
   }
   
   }
   $data.="<tr>
     <td>&nbsp;</td>
     <td><div align='right'>
       <input type='button'  id='button' name='button' id='button' value='Save' onclick=\"xajax_update_district(xajax.getFormValues('new_district'),'edit_parish')\" />
     </div></td>
   </tr>
 ";
 
                                 
                                 
                                 
                                 break;
                                 default:
                                 
                                 }	
                                         
                                         
                                         
                  $data.=" </table></form>";
 
 
 $object->assign('bodyDisplay','innerHTML',$data);
 return $object;
 }
 function update_district($formvalues,$linkvar){
 $object=new xajaxResponse();
 /* if($_SESSION['role']<>'Monitoring and Evaluation'){
 $object->AddAlert("Access Denied!\n Only the Monitoring and Evaluation can Change District Details");
 $object->redirect("index.php");
 return $object;
 } */
 
 switch($linkvar){
 case "edit_district":
 for($i=0;$i<count($formvalues['district_code']);$i++){
 $districtCode=$formvalues['district_code'][$i];
 $districtName=$formvalues['districtname'][$i];
 $zone=$formvalues['zone'][$i];
 $acronym=$formvalues['acronym'][$i];
 $serviceprovider=$formvalues['serviceprovider'][$i];
 
 $entryType=$formvalues['entryType'][$i];
 $sql="update tbl_district set districtName='".$districtName."',acronym='".$acronym."',zone='".$zone."',entryType = '".$entryType."',tso_service_providers='".$serviceprovider."' where  districtCode='".$districtCode."'";
 #$object->addAlert($sql);
 $check=mysql_query($sql)or die(http(4533));
 $object->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
 $object->call('xajax_view_district','',1,20);
 }
 break;
 case "edit_subcounty":
 
 for($i=0;$i<count($formvalues['subcountyCode']);$i++){
 $subcountyCode=$formvalues['subcountyCode'][$i];
 $districtCode=$formvalues['districtCode'][$i];
 $subcountyName=$formvalues['subcountyName'][$i];
 
 $sql="update tbl_subcounty set districtCode='".$districtCode."',subcountyName='".$subcountyName."' where  subcountyCode='".$subcountyCode."'";
 #$object->addAlert($sql);
 $check=mysql_query($sql)or die(http(4533));
 }
 $object->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
 $object->call('xajax_view_subcounty','','','',1,20);
 
 
 break;
 
 case "edit_parish":
 
 for($i=0;$i<count($formvalues['ParishCode']);$i++){
 $ParishCode=$formvalues['ParishCode'][$i];
 $districtCode=$formvalues['districtCode'][$i];
 $subcountyCode=$formvalues['subcountyName'][$i];
 $parishName=$formvalues['parishName'][$i];
 
 $sql="update tbl_parish set districtCode='".$districtCode."',subcountyCode='".$subcountyCode."' where  ParishCode='".$ParishCode."'";
 #$object->addAlert($sql);
 $check=mysql_query($sql)or die(http(4533));
 }
 $object->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
 $object->call('xajax_view_parish','','','','',1,20);
 break;
 
 default:
 }
 
 return $object;
 }
 function edit_document($formvalues){
 $obj=new xajaxResponse();
 $data="<table cellspacing='0'      width='400' border='0'>
 
 
           <tr>
             <td>
               <form action='functions.php' method='post' NAME='document' id='document' enctype='multipart/form-data'>
                 <table cellspacing='0'      width='535' border='0'>
                   
                                   <tr>
                     <td width='517'>
                       <table cellspacing='0'      border='0'>";
 for($i=0;$i<count($formvalues['document_id']);$i++){
 $id=$formvalues['document_id'][$i];		
 $sql="select * from tbl_documents where document_id='".$id."'";		
   #$obj->addAlert($sql);
 $QUERY=mysql_query($sql)or die("Sunrise Error code 4487 because ".mysql_error());
 while($row=mysql_fetch_array($QUERY)){
                                   $data.="
                                   
                                           
                                           <tr><td colspan=2><hr></td></tr>
                         <tr>
                           <td class=''>Document Name:</td>
                           <td>
                 <input name='document_id' type='hidden' id='document_id' size='48' VALUE='".$row['document_id']."' />
                 <input name='document_name' type='text' id='document_name' size='48' VALUE='".$row['document_name']."' /></td>
                         </tr>
                        
                         <tr>
                           <td>Upload Document:</td>
                           <td> <input type='hidden' name='MAX_FILE_SIZE' value='100000000' /> <input name='img_file' type='file'  id='img_file' size='35' value='".$row['file_name']."'></td>
                         </tr>
 
                         <tr>
                           <td>&nbsp;</td>
                           <td align='right'></td>
                         </tr>";
                                                 
                                                 #onclick=\"xajax_update_document(xajax.getFormValues('document'))\"
                                                 }
                                                 
                                                 }
                         $data.="<tr>
                           <td>&nbsp;</td>
                           <td align='right'><input type='submit' name='update_document' id='save_document'  value='Save'  /></td>
                         </tr>
                       </table>
                    </td>
                   </tr>
                 </table>
               </form></td>
           </tr>
         </table>";
           
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 
 }
 function update_document($formvalues){
 $object=new xajaxResponse();
 if($_SESSION['role']<>'Systems Administrator'){
 $object->AddAlert("Access Denied!\n Only the Systems Administrator can edit a Document");
 $object->redirect("index.php");
 return $object;
 }
 for($i=0;$i<count($formvalues['document_id']);$i++){
 $districtCode=$formvalues['districtCode'][$i];
 $districtName=$formvalues['districtName'][$i];
 $acronym=$formvalues['acronym'][$i];
 $sql="update tbl_district set districtName='".$districtName."' acronym='".$acronym."' where  districtCode='".$districtCode."'";
 //$object->addAlert($sql);
 $check=mysql_query($sql)or die(mysql_error());
 }
 $object->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
 $object->call('xajax_view_district','','',1,20);
 return $object;
 }
 function edit_home($formvalues){
  $object=new xajaxResponse();
  $data.="<form name='home2' id='home2' style=''><table cellspacing='0'      width='100%' border='0'>";
   //$object->addAlert($formvalues['home_id']);
  for($i=0;$i<count($formvalues['home_id']);$i++){
  $home_id=$formvalues['home_id'][$i];
  #$object->addAlert($home_id);
  $query=mysql_query("select * from tbl_home where home_id='".$home_id."'")or die("Sunrise error code 4565 because, ".mysql_error());
   while($row=mysql_fetch_array($query)){
   $data.="<tr>
     <td>Heading</td>
     <td><input type='hidden' name='home_id[]' id='textfield' size='113' value='".$row['home_id']."' />
         <input type='text' name='heading[]' id='textfield' size='113' value='".$row['head']."' /></td>
   </tr>
   <tr>
     <td>Body</td>
     <td><textarea name='body[]' id='body' cols='110' rows='15'>".$row['body']."</textarea></td>
   </tr>";
   
   }}
   $data.="<tr>
     <td></td>
     <td><div style='float:right;'><input name='save' type='button'  id='button' value='Save' onclick=\"xajax_update_home(xajax.getFormValues('home2'));\" /></div></td>
   </tr>
 </table></form>"; 
  $object->assign('bodyDisplay','innerHTML',$data);
 return $object;
  }
 function update_home($formvalues){
 $obj=new xajaxResponse();
 #$obj->addAlert(count($formvalues['home_id']));
 for($i=0;$i<count($formvalues['home_id']);$i++){
 $home_id=$formvalues['home_id'][$i];
 $heading=mysql_real_escape_string($formvalues['heading'][$i]);
 $body=mysql_real_escape_string($formvalues['body'][$i]);
 mysql_query("update tbl_home set head='".$heading."',body='".$body."' where home_id='".$home_id."' ")or die("Sunrise Error-code 4600 because, ".mysql_error());
 
 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Home details Edited!"));
 $obj->call("xajax_view_home",'');
 return $obj;
 }
 function edit_usergroup($formvalues){
 $object=new xajaxResponse();
 $data="<form  name='usergroup12' id='usergroup12' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0'>
 <tr>
     <td colspan=5><div id='status'></div></td>
   </tr>";
   
   for($x=0;$x<count($formvalues['group_id']);$x++){
   //$object->alert($formvalues['group_id']);
   $query=mysql_query("select * from tbl_usergroup where group_id='".$formvalues['group_id'][$x]."'")or die(http("3226"));
   while($row=mysql_fetch_array($query)){
   $data.="
   <tr>
    
     <td colspan=1><hr></td>
   </tr>
   <tr>
     <td >Group Name</td>
     <td>
         <input name='group_id[]' type='hidden' id='group_id' size='48' value='".$row['group_id']."' />
         <input name='groupname[]' type='text' id='groupname' size='48' value='".$row['group_name']."' /></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>Description</td>
     <td><textarea name='desc[]' id='desc' cols='45' rows='5'>".$row['description']."</textarea></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>";
   }
   }
   $data.="<tr>
     <td>&nbsp;</td>
     <td><div align='left'>
       <input type='button'  id='button' class='button_width' name='update_usergroup' id='update_usergroup' value='Save' onclick=\"xajax_update_usergroup(xajax.getFormValues('usergroup12'));return false;\" />
     </div></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
 </table></form>";
 
 $object->assign('bodyDisplay','innerHTML',$data);
 return $object;
 }
 function update_usergroup($formvalues){
 $object=new xajaxResponse();
 for($x=0;$x<count($formvalues['group_id']);$x++){
 $groupname=$formvalues['groupname'][$x];
 $desc=$formvalues['desc'][$x];
 
 
 $update="update tbl_usergroup set group_name='".$groupname."',description='".$desc."',updatedby='".$_SESSION['username']."' where group_id='".$formvalues['group_id'][$x]."'";
 
 //$obj->alert($update);
 @mysql_query($update)or die(http('0145'));
 }
 
 
 $object->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
 $object->call("xajax_view_usergroup",'');
 return $object;
 }
 function edit_role($formvalues){
 $object=new xajaxResponse();
 $data.="<form  name='usergroup' id='usergroup' method='post' action='".$PHP_SELF."' ><table cellspacing='0'      width='600' border='0'>
 <tr>
     <td colspan=5><div id='status'></div></td>
   </tr>";
   
   for($x=0;$x<count($formvalues['role_id']);$x++){
  // $object->alert($formvalues['role_id']);
   // $object->alert(count($formvalues['role_id']));
   $query=mysql_query("select * from tbl_role where role_id='".$formvalues['role_id'][$x]."'")or die(http("3226"));
   while($row=mysql_fetch_array($query)){
   $data.="
   <tr>
    
     <td colspan=1><hr></td>
   </tr>
   <tr>
     <td>User Group</td>
     <td><select name='group_name[]' id='group_name' style='width:270px;'><option value=''>-All-</option>";
        $queryR=mysql_query("select * from tbl_usergroup where group_name <> '' order by group_name asc")or die(mysql_error());
   while($rowR=mysql_fetch_array($queryR)){ 
   $sel=($row['usergroup']==$rowR['group_id'])?"SELECTED":"";
   $data.="<option value=\"".$rowR['group_id']."\" ".$sel.">".substr($rowR['group_name'],0,40)."</option>";
    }
       $data.="</select></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td >Role Name</td>
     <td>
         <input name='role_id[]' type='hidden' id='role_id' size='48' value='".$row['role_id']."' />
         <input name='rolename[]' type='text' id='rolename' size='48' value='".$row['role_name']."' /></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>Description</td>
     <td><textarea name='desc[]' id='desc' cols='45' rows='5'>".$row['description']."</textarea></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>";
   }
   }
   $data.="<tr>
     <td>&nbsp;</td>
     <td><div align='left'>
       <input type='button'  id='button' class='button_width' name='button' id='button' value='Save' onclick=\"xajax_update_role(xajax.getFormValues('usergroup'));return false;\" />
     </div></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
 </table></form>";
 
 $object->assign('bodyDisplay','innerHTML',$data);
 return $object;
 }
 function update_role($formvalues){
 $object=new xajaxResponse();
 for($x=0;$x<count($formvalues['role_id']);$x++){
 $role=$formvalues['rolename'][$x];
 $group_name=$formvalues['group_name'][$x];
 
 $desc=$formvalues['desc'][$x];
 
 
 $update="update tbl_role set role_name='".mysql_real_escape_string($role)."',description='".mysql_real_escape_string($desc)."',usergroup='".$group_name."',updatedby='".$_SESSION['username']."' where role_id='".$formvalues['role_id'][$x]."'";
 
 //$obj->alert($update);
 @mysql_query($update)or die(http('0145'));
 }
 
 
 $object->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
 $object->call("xajax_view_role",'','');
 return $object;
 }
 function edit_dropdownList($formvalues){
 $object=new xajaxResponse();
 $data="<form  name='dropdown' id='dropdown' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0' >
 <tr class='white1'><td colspan=5><div id='status'></div></td>
   </tr>
   
   
   
   </tr>
                                   <tr class='evenrow2'>
                     <th width='50' class=''>No.</th>
                                         <th class=''>Class Code</th>
                     <th class=''>drop-down description </th>
                                           <th class=''>DROP-DOWN name</th>
                                             <th class=''>REMARKS</th>
                   </tr>
                                   
                                   ";
                                   
                                   $inc=1;
                                  $n=1;
   for($i=0;$i<count($formvalues['code']);$i++){
   $sel=mysql_query("SELECT * FROM tbl_lookup WHERE code='".$formvalues['code'][$i]."'") or die(http(3395));
   while($row=mysql_fetch_array($sel)){
   $color=$n%2==1?"evenrow3":"white1";
   $data.="<tr class='$color'>
   <td width=''>".$n."</td>
    <td width=''><input name='code[]'  id='code' value='".$row['code']."' type='hidden' size='20'>
    <input name='classcode[]'  id='classcode' value='".$row['classCode']."' type='text' size='20'></td>
    
  <td ><input name='classDescription[]' type='text' value='".$row['classDescription']."' size='40'></td>
  <td><input name='codeName[]' type='text' value='".$row['codeName']."' size='40'></td> 
  <td><textarea name='desc[]' id='desc' cols='45' rows='5'>".$row['notes']."</textarea></td> 
   </tr>";
   $n++;
   }
   }
         
         $data.="<tr class='evenrow'>
   <td width=''></td>
    <td width=''></td>
    
  <td ></td>
  <td></td> 
  <td><input name='save_dropdown' type='button'  id='button' value='Save' class='button_width' onclick=\"xajax_update_dropdownlist(xajax.getFormValues('dropdown'));\"></td> 
   </tr>";
 $data.="</table></form>";
 
 $object->assign('bodyDisplay','innerHTML',$data);
 return $object;
 }
 function update_dropdownlist($formvalues){
 $obj=new xajaxResponse();
 
 for($i=0;$i<count($formvalues['code']);$i++){
 
 $classDescription=$formvalues['classDescription'][$i];
 $classcode=$formvalues['classcode'][$i];
 $codeName=$formvalues['codeName'][$i];
 $desc=$formvalues['desc'][$i];
 $code=$formvalues['code'][$i];
 if($codeName!==''){
 $insert="UPDATE tbl_lookup SET `classCode`='".$classcode."',`classDescription`='".$classDescription."',`codeName`='".$codeName."', `notes`='".$desc."',updatedby='".$_SESSION['username']."' WHERE CODE='".$code."'";
 @mysql_query($insert)or die(http('0013'));
 
 }}
 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
 $obj->call("xajax_view_dropdownList",'','');
 return $obj;
 }
 function edit_menu_category($formvalues){
 $object=new xajaxResponse();
 $data="<form  name='usergroup' id='usergroup' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0'>
 <tr>
     <td colspan=5><div id='status'></div></td>
   </tr>";
   
   for($x=0;$x<count($formvalues['tbl_menu_categoriesId']);$x++){
   //$object->alert($formvalues['group_id']);
   $query=mysql_query("SELECT * FROM tbl_menu_categories WHERE tbl_menu_categoriesId='".$formvalues['tbl_menu_categoriesId'][$x]."' ORDER BY Rank ASC")or die(http("3226"));
   while($row=mysql_fetch_array($query)){
   $data.="
   <tr>
    
     <td colspan=1><hr></td>
   </tr>
   
   <tr>
     <td >Menu Category</td>
     <td>
         <input name='tbl_menu_categoriesId[]' type='hidden' id='tbl_menu_categoriesId' size='48' value='".$row['tbl_menu_categoriesId']."' />
         <input name='MenuCategory[]' type='text' id='MenuCategory' size='48' value='".$row['MenuCategory']."' /></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>Rank</td>
     <td><input name='Rank[]' id='Rank' type='text' value='".$row['Rank']."' size='48' ></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>";
   }
   }
   $data.="<tr>
     <td>&nbsp;</td>
     <td><div align='left'>
       <input type='button'  id='button' class='button_width' name='button' id='button' value='Save' onclick=\"xajax_update_menu_category(xajax.getFormValues('usergroup'));return false;\" />
     </div></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
 </table></form>";
 
 $object->assign('bodyDisplay','innerHTML',$data);
 return $object;
 }
 function update_menu_category($formvalues){
 $object=new xajaxResponse();
 for($x=0;$x<count($formvalues['tbl_menu_categoriesId']);$x++){
 $MenuCategory=$formvalues['MenuCategory'][$x];
 $Rank=$formvalues['Rank'][$x];
 
 
 $update="UPDATE tbl_menu_categories SET MenuCategory='".mysql_real_escape_string($MenuCategory)."',Rank='".mysql_real_escape_string($Rank)."',updatedby='".$_SESSION['username']."' WHERE tbl_menu_categoriesId='".$formvalues['tbl_menu_categoriesId'][$x]."'";
 
 //$obj->alert($update);
 @mysql_query($update)or die(http('0145'));
 }
 
 
 $object->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
 $object->call("xajax_view_menu_category",'');
 return $object;
 }
 function edit_menu_items($formvalues){
 $object=new xajaxResponse();
 $data="<form  name='usergroup' id='usergroup' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0'>
 <tr>
     <td colspan=5><div id='status'></div></td>
   </tr>";
   
   for($x=0;$x<count($formvalues['tbl_menu_itemsId']);$x++){
   //$object->alert($formvalues['group_id']);
   $query=mysql_query("SELECT * FROM tbl_menu_items WHERE tbl_menu_itemsId='".$formvalues['tbl_menu_itemsId'][$x]."' ORDER BY Rank ASC")or die(http("3226"));
   while($row=mysql_fetch_array($query)){
   $data.="
   <tr>
    
     <td colspan=1><hr></td>
   </tr>
   
   <tr>
     <td >Menu Category</td>
     <td>
         <input name='tbl_menu_itemsId[]' type='hidden' id='tbl_menu_itemsId' size='48' value='".$row['tbl_menu_itemsId']."' />
         
         <select name='category[]' id='category' style='width:270px;'><option value=''>-select-</option>";
        $queryc=mysql_query("SELECT * FROM tbl_menu_categories  ORDER BY MenuCategory ASC")or die(mysql_error());
   while($rowc=mysql_fetch_array($queryc)){
   $selc=($row['MenuCategory']==$rowc['tbl_menu_categoriesId'])?"selected":"";
   $data.="<option value=\"".$rowc['tbl_menu_categoriesId']."\" ".$selc.">".$rowc['MenuCategory']."</option>";
    }
       $data.="</select>
         </td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>Menu Item </td>
     <td><input name='MenuItem[]' id='MenuItem' type='text' value='".$row['MenuItem']."' size='48' ></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
    <tr>
     <td>Rank</td>
     <td><input name='Rank[]' id='Rank' type='text' value='".$row['Rank']."' size='48' ></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>Action</td>
     <td><input name='action[]' type='text' id='action' size='48.5' value='".$row['action']."' /></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>Page</td>
     <td><input name='page[]' type='text' id='page' size='48.5' value='".$row['page']."' /></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>";
   }
   }
   $data.="<tr>
     <td>&nbsp;</td>
     <td><div align='left'>
       <input type='button'  id='button' class='button_width' name='button' id='button' value='Save' onclick=\"xajax_update_menu_items(xajax.getFormValues('usergroup'));return false;\" />
     </div></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
 </table></form>";
 
 $object->assign('bodyDisplay','innerHTML',$data);
 return $object;
 }
 function update_menu_items($formvalues){
 $object=new xajaxResponse();
 for($x=0;$x<count($formvalues['tbl_menu_itemsId']);$x++){
 $MenuCategory=$formvalues['category'][$x];
 $Rank=$formvalues['Rank'][$x];
 $MenuItem=$formvalues['MenuItem'][$x];
 $page=$formvalues['page'][$x];
 $action=$formvalues['action'][$x];
 
 $update="UPDATE `tbl_menu_items` SET MenuCategory='".$MenuCategory."',Rank='".$Rank."',action='".$action."',MenuItem = '".$MenuItem."',LinkvalCode='".$MenuItem."',page='".$page."',updatedby='".$_SESSION['username']."' WHERE tbl_menu_itemsId='".$formvalues['tbl_menu_itemsId'][$x]."'";
 //$object->alert($update);
 @mysql_query($update)or die(http('0145'));
 }
 
 $object->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
 $object->call("xajax_view_menu_items",'','');
 return $object;
 }
 function edit_FarmersProductionRecords($formvalues){
 $obj=new xajaxResponse();
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 $n=1;
 $inc=1;
 $_SESSION['nhh']=1;
 $_SESSION['nhh']=$nhh;
 $_SESSION['subcountyCode']=$subcounty;
 #$obj->alert($_SESSION['subcountyCode']);
 $_SESSION['ParishName']=$parishName;
 $_SESSION['parishCode']=$parish;
 #$obj->alert($_SESSION['parishCode']);
 
 $data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
 <table width='100%' id='report'>";
  
   $data.="
   
   <tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>
   
 
         <tr class='evenrow3'>
           
           
         </tr>
 
   
   <tr><td colspan=6><div id='statusxxx'></div></td></tr>
         <tr class='evenrow'>
     <td colspan=10><table>
          <tr CLASS='evenrow'>
  
     <th colspan='23' ><center>farmer production records</center></th>
         
   </tr>
    <tr CLASS='evenrow'>
   <th >NO</th>
       <th>organization</th>
     <th>NAMe</th>
     <th>Sex: Male=1,Female=2</th>
     <th>Lead Farmer No=0,Yes=1</th>
     <th>tOTAL AREA* UNDER CROP PRODUCTION</th>
         <th>AREA* UNDER CROP lEGUMES (BEANS,SOYA BEANS)</th>
         <th>AREA* UNDER HOE BASINS</th>
 <th>crop</th>
 <th>yield (KGS)</th>
 <th>SELLING PRICE</th>
         
         
         <th>AREA* UNDER adp RIPPING</th>
         <th>crop</th>
 <th>yield (KGS)</th>
 <th>SELLING PRICE</th>
         <th>AREA* UNDER MECHANIZED RIPPING</th>
         <th>crop</th>
 <th>yield (KGS)</th>
 <th>SELLING PRICE</th>
         <th>ADOPTED CF/CA No=0,Yes=1</th>
         <th>AREA* UNDER CF/CA</th>
         <th>hERBICIDE USE No=0,YES=1</th>
         <th>BURNT CROP RESIDUES,no=0,YES=1</th>
           </tr>";
         $n=1;
         //onclick=\"xajax_calc_training(getElementById('male".$n."').value,getElementById('female".$n."').value,'total".$n."');\"
         for($x=0;$x<count($formvalues['fid']);$x++){
         $query=mysql_query("SELECT `fid`, `org_code`, `FarmerName`, `sex`, `LeadFarmer`, `Totalareaundercropproduction`, `AreaundercropLegumes`,AreaunderHoebasins, `crophoebasin`, `yieldhoebasin`, `selling_pricehoebasin`, `AreaunderADPripping`, `cropadpripping`, `yieldcropadpripping`, `selling_pricecropadpripping`, `AreaunderMechanizedripping`, `cropmechanized`, `yieldmechanized`, `selling_pricemechanized`, `doptedCF/CA`, `AreaunderCF/CA`, `Herbicideuse`, `Burntcropresidues`, `display`, `updatedby`, `lastupdated` FROM `tbl_farmerproductionrecords`  WHERE fid='".$formvalues['fid'][$x]."'")or die(http("Edit-2140"));
   while($row=@mysql_fetch_array($query)){
         $data.="<tr class='evenrow'>
         <td> <input name='loopkey[]' type='hidden' id='loopkey' size='40' value='".$row['fid']."'  />".$n."</td>
         <td colspan=''><select name='org_code[]' id='org_code' style='width:100px;'><option value=''>-select-</option>";
                   $sql="SELECT * FROM tbl_organization ORDER BY orgName ASC";
                   #$obj->addAlert($sql);
                   $query=@mysql_query($sql) or die(http("PR-2496"));
                   while($ROW=mysql_fetch_array($query)){
                 $selected=($row['org_code']==$ROW['org_code'])?"SELECTED":"";
                   $data.="<option value=\"".$ROW['org_code']."\" ".$selected." >".substr($ROW['orgName'],0,500)."</option>";}
                   $data.="</select></td>
         <td> <input name='name[]' type='text' id='male".$n."' size='40' value='".$row['FarmerName']."'  /></td> 
         <td>
          <input name='sex[]' type='text' id='sex".$n."' size='5' value='".$row['sex']."'  />
         </td>
         <td> <input name='leadFarmer[]' type='text' id='leadFarmer".$n."' size='5' value='".$row['sex']."' onKeyPress='return numbersonly(event, false)' /></td>
         <td><input name='total[]' six='20' onKeyPress='return numbersonly(event, false)' value='".$row['Totalareaundercropproduction']."'  type='text' id='total".$n."'  /></td>
         <td> <input name='croplegumes[]' type='text' id='croplegumes".$n."' size='5' value='".$row['AreaundercropLegumes']."' onKeyPress='return numbersonly(event, false)' /></td>
         
         <td> <input name='hoebasin[]' type='text' id='hoebasin".$n."' size='5' value='".$row['AreaunderHoebasins']."' onKeyPress='return numbersonly(event, false)' /></td>
         <td><select name='crophoebasin[]' id='crophoebasin'><option value=''>-select-</option>";
         $s=@mysql_query("SELECT * FROM tbl_crops")or die(http("PR-2425"));
         while($row1=@mysql_fetch_array($s)){
         $data.="<option value=\"".$row1['crop_id']."\" ".checkExistance($row1['crop_id'],$row['crophoebasin'],'selected')." >".$row1['cropName']."</option>";
         }
         $data.="</select> </td>
         <td> <input name='yieldhoebasin[]' type='text' id='yieldhoebasin".$n."' value='".$row['yieldhoebasin']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
         <td> <input name='selling_pricehoebasin[]' type='text' id='selling_pricehoebasin".$n."' value='".$row['selling_pricehoebasin']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
         
         
         <td> <input name='adpripping[]' type='text' id='adpripping".$n."' value='".$row['AreaunderADPripping']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
         <td><select name='cropadpripping[]' id='cropadpripping'><option value=''>-select-</option>";
         $s1=@mysql_query("SELECT * FROM tbl_crops")or die(http("PR-2425"));
         while($row1=@mysql_fetch_array($s1)){
         $data.="<option value=\"".$row1['crop_id']."\"  ".checkExistance($row1['crop_id'],$row['cropadpripping'],'selected')." >".$row1['cropName']."</option>";
         }
         $data.="</select> </td>
         <td> <input name='yieldadpripping[]' type='text' id='yieldadpripping".$n."' value='".$row['yieldcropadpripping']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
         <td> <input name='selling_priceadpripping[]' type='text' id='selling_priceadpripping".$n."' value='".$row['selling_pricecropadpripping']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
         
         
         
         <td> <input name='mechanized[]' type='text' id='mechanized".$n."' value='".$row['AreaunderMechanizedripping']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
         <td><select name='cropmechanized[]' id='cropmechanized'><option value=''>-select-</option>";
         $s2=@mysql_query("SELECT * FROM tbl_crops")or die(http("PR-2425"));
         while($row2=@mysql_fetch_array($s2)){
         $data.="<option value=\"".$row2['crop_id']."\" ".checkExistance($row2['crop_id'],$row['cropmechanized'],'selected')." >".$row2['cropName']."</option>";
         }
         $data.="</select> </td>
         <td> <input name='yieldmechanized[]' type='text' id='yieldmechanized".$n."' value='".$row['yieldmechanized']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
         <td> <input name='selling_pricemechanized[]' type='text' id='selling_pricemechanized".$n."' value='".$row['selling_pricemechanized']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
                 
         <td> <input name='adoptedadpca[]' type='text' id='adoptedadpca".$n."' value='".$row['doptedCF/CA']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
                 <td> <input name='areaundercfca[]' type='text' id='areaundercfca".$n."' value='".$row['AreaunderCF/CA']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
                 <td> <input name='herbicideuse[]' type='text' id='herbicideuse".$n."' value='".$row['Herbicideuse']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
                 <td> <input name='burntcropresidues[]' type='text' id='burntcropresidues".$n."' value='".$row['Burntcropresidues']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
         </tr>";
         $n++;}}
         
         
 
   $data.=" </table></td>
          
     </tr>
   
   ";
  
  
   
 $data."
 
 
 </table>
 </td>";
    
  $data.="</tr>
 </table>
 
 
 <div align='right'>
         <button type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_FarmersProductionRecords(xajax.getFormValues('projects')); return false;\" />Save</button>
         </div>
 </form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_FarmersProductionRecords($formvalues){
 $obj=new xajaxResponse();
 $organization=$formvalues['project'];
 
 
 $erCount=0;
   $error="<ul>";
                 
         /* 	if($organization==''){
                 $error.="<li>Please select an Organization!</li>";
         $erCount++;
                 } */
 
                 $error .="</ul>";
                 if($erCount > 0){
                         $obj->assign("statusxxx","innerHTML",errorMsg($error));
                         return $obj;
                 }	  
  /**/
  
  for($x=0;$x<count($formvalues['loopkey']);$x++){
  $organization=mysql_real_escape_string($formvalues['org_code'][$x]);
   $name=mysql_real_escape_string($formvalues['name'][$x]);
  $sex=mysql_real_escape_string($formvalues['sex'][$x]);
 $leadFarmer=mysql_real_escape_string($formvalues['leadFarmer'][$x]);
 $total=mysql_real_escape_string($formvalues['total'][$x]);
 $croplegumes=mysql_real_escape_string($formvalues['croplegumes'][$x]);
 
 $hoebasin=mysql_real_escape_string($formvalues['hoebasin'][$x]);
 $crophoebasin=mysql_real_escape_string($formvalues['crophoebasin'][$x]);
 $yieldhoebasin=mysql_real_escape_string($formvalues['yieldhoebasin'][$x]);
 $selling_pricehoebasin=mysql_real_escape_string($formvalues['selling_pricehoebasin'][$x]);
 
 $adpripping=mysql_real_escape_string($formvalues['adpripping'][$x]);
 $cropadpripping=mysql_real_escape_string($formvalues['cropadpripping'][$x]);
 $yieldadpripping=mysql_real_escape_string($formvalues['yieldadpripping'][$x]);
 $selling_priceadpripping=mysql_real_escape_string($formvalues['selling_priceadpripping'][$x]);
 
 $mechanized=mysql_real_escape_string($formvalues['mechanized'][$x]);
 $cropmechanized=mysql_real_escape_string($formvalues['cropmechanized'][$x]);
 $yieldmechanized=mysql_real_escape_string($formvalues['yieldmechanized'][$x]);
 $selling_pricemechanized=mysql_real_escape_string($formvalues['selling_pricemechanized'][$x]);
 
 $adoptedadpca=mysql_real_escape_string($formvalues['adoptedadpca'][$x]);
 $areaundercfca=mysql_real_escape_string($formvalues['areaundercfca'][$x]);
 $herbicideuse=mysql_real_escape_string($formvalues['herbicideuse'][$x]);
 $burntcropresidues=mysql_real_escape_string($formvalues['burntcropresidues'][$x]);
 
 
                 if($name<>''){
  $query=@mysql_query("UPDATE `tbl_farmerproductionrecords` SET `org_code`='".$organization."',`FarmerName`='".$name."',`sex`='".$sex."',`LeadFarmer`='".$leadFarmer."', `Totalareaundercropproduction`='".$total."', `AreaundercropLegumes`='".$croplegumes."',
   `AreaunderHoebasins`='".$hoebasin."',crophoebasin='".$crophoebasin."',yieldhoebasin='".$yieldhoebasin."',selling_pricehoebasin='".$selling_pricehoebasin."', 
    `AreaunderADPripping`='".$adpripping."',cropadpripping='".$cropadpripping."',yieldcropadpripping='".$yieldadpripping."',selling_pricecropadpripping='".$selling_priceadpripping."',
    `AreaunderMechanizedripping`='".$mechanized."',cropmechanized='".$cropmechanized."',yieldmechanized='".$yieldmechanized."',selling_pricemechanized='".$selling_pricemechanized."', `doptedCF/CA`='".$adoptedadpca."', `AreaunderCF/CA`='".$areaundercfca."', `Herbicideuse`='".$herbicideuse."', `Burntcropresidues`='".$burntcropresidues."',`updatedby`='".$_SESSION['username']."' WHERE fid='".$formvalues['loopkey'][$x]."'")or die(http("SV-3449"));
                                 
         }
                 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
 $obj->call("xajax_view_FarmersProductionRecords",'',1,20);
 return $obj;
 } 
 function edit_crops($formvalues){
 $obj=new xajaxResponse();
 
 $n=1;
 $data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='0'  id='report'     width='100%' border='0'>";
 
          
             $data.="
             
             <tr class=''>
             <th width='25' class='evenrow2'>Crop</th>
               </tr>";
 
         for($x=0;$x<count($formvalues['crop_id']);$x++){
 $y="SELECT * FROM tbl_crops
  WHERE crop_id='".$formvalues['crop_id'][$x]."'
   ORDER BY cropName ASC";
                   $query2=@mysql_query($y)or die(http("EDIT-4008"));
 
 
 
  
                   $inc=1;
                   $a=1;
                   while($row=@mysql_fetch_array($query2)){
                   //disaggregation
                   $color=$inc%2==1?"evenrow3":"white1";
   $data.="<tr class=$color>
 
  <td align='right'><input name='crop[]' class='evenrow' type='text' id='crop".$a."' size='10' value='".$row['cropName']."' ></td></tr>  ";
                   $inc++;
                  $a++; 
                 
                   }
                   }
         $data.="
                   <tr class='evenrow'>
   
             <td colspan='9' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_crops(xajax.getFormValues('annualTarget'));return false;\" /></td>
           </tr></table></form>";
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 function update_crops($formvalues){
 $obj=new xajaxResponse();
 
 for($i=0;$i<count($formvalues['crop_id']);$i++){
 
 $crop=$formvalues['crop'][$i];
 if($crop<>''){
 
 $insert="UPDATE tbl_crops SET cropName='".$crop."' WHERE crop_id='".$formvalues['crop_id'][$i]."' ";
 //$obj->alert($insert);
 @mysql_query($insert)or die(http("SV-4123"));
 }
 
 }
 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
 return $obj;
 }


 
 
 ?>
