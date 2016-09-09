<?php
//================================update_Parishes===================================
 function edit_Parishes($formValues){
 $obj=new xajaxResponse();
 
 $QueryManager=new QueryManager('');
 
 
 
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 
 //$obj->alert($regionCode);
 
 $n=1;
 $inc=1;
 $data="<form action=\"".$PHP_SELF."\" name='Parishes' id='Parishes' method='post'>
 <table width='100%' cellpadding='2' border='0' cellspacing='1'>";
  
 $data.="<tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>";
   
 $data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE PARISH DETAILS</center></th></tr>";
   
   
  if(count($formValues['ParishCode'])>0){
 for($x=0;$x<count($formValues['ParishCode']);$x++){
         $sql="SELECT d.*, p.*, s.*
         FROM `tbl_parish` p, `tbl_subcounty` s, `tbl_district` d
         WHERE s.`subcountyCode`=p.`SubcountyCode`
         AND d.`districtCode`=s.`districtCode`
         AND p.`districtCode`='".$formValues['districtCode'][$x]."'
         AND p.`SubcountyCode`='".$formValues['SubcountyCode'][$x]."'
         AND p.`ParishCode`='".$formValues['ParishCode'][$x]."'";
   
   //$obj->alert($sql);
   
  $sel=mysql_query($sql);
  while($row=mysql_fetch_assoc($sel)){
     
 $data.="<tr><td> <input name='loopkey[]' type='hidden' id='loopkey".$n."' size='25' value='1' />";
     
      $data.="<table border='0' width='400'>";
             
                 $data.="<tr>";
                 //Find the District name
                 
                 
                 $st="select  d.*, s.* from `tbl_district` d join `tbl_subcounty`s 
                     on d.`districtCode`=s.`districtCode`
                     WHERE d.`districtCode`='".$row['districtCode']."' AND s.`subcountyCode`='".$row['SubcountyCode']."' AND d.`Display` = 'Yes'";
                         $q=@mysql_query($st);
                         $r=mysql_fetch_array($q);
                 if($r<>NULL){
                   $data.="<th colspan='22'><div align='center'>CPM MIS  Parish for ".$r['subcountyName']." Subcounty, ".$r['districtName']." District</div></th>";
                 }
                   $data.="</tr>";
                 
                 $data.="<tr>
                     <td><strong>Sub county</strong><br /></td>
                       <td><select name='SubcountyCode[]' id='SubcountyCode".$n."' />
                       <option value=''>-select-</option>";
                       $data.=$QueryManager->SubcountyFilter($row['zone'],$row['districtCode'],$row['SubcountyCode']);
                       
                       $data.="</select>
                     </td>
                 </tr>";
                     
                     
                     $data.="<tr><td><strong>Parish name:</strong><br /></td>";
                         
                     $data.="<input type='hidden' value='".$row['districtCode']."' name='districtCode[]' id='classCode".$n."'/>";
                     $data.="<input type='hidden' value='".$row['SubcountyCode']."' name='oldSubcountyCode[]' id='oldSubcountyCode".$n."'/>";
                     $data.="<input type='hidden' value='".$row['ParishCode']."' name='ParishCode[]' id='ParishCode".$n."'/>"; 
                       $data.="<td><input type='text' value='".$row['ParishName']."' name='ParishName[]' id='ParishName".$n."'/>
                     </td>
                 </tr>
                 
                 
                 <tr>
                     <td><strong>Display:</strong><br /></td>
                       <td><select name='Display[]' id='Display".$n."' />
                       <option value=''>-select-</option>";
                        $var=array('Yes','No');
                                         
                                         foreach ($var as $s) {
                                            // $default='Yes';
                                             $selected=($row['Display']==$s)?"selected":"";
                                             $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                             $q++;
                                         } 
                       
                       $data.="</select>
                     </td>
                 </tr>
                 
                 
               
                 <tr>
                   <td>&nbsp;</td>
                   <td><input value='Save' name='saveParishes' onclick=\"xajax_update_Parishes(xajax.getFormValues('Parishes'));\" type='button'></td>
                 </tr>
               </table>";
     
  
                   $n++;
  }
 }
  }
  
 $data.="</table></form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 
 
 //================================update_Parishes===================================
 
 function update_Parishes($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 for($i=0;$i<count($formValues['loopkey']);$i++){
     
 $districtCode=$formValues['districtCode'][$i];
 $SubcountyCode=$formValues['SubcountyCode'][$i];
 $oldSubcountyCode=$formValues['oldSubcountyCode'][$i];
 $ParishName=$formValues['ParishName'][$i];
 $ParishCode=$formValues['ParishCode'][$i];
 $Display=$formValues['Display'][$i];
 $user=$_SESSION['username'];
 
 
 $sql="UPDATE `tbl_parish` SET
 `SubcountyCode`='".$SubcountyCode."',
 `ParishName`='".$ParishName."',
 `Display`='".$Display."',
 `updatedby`='".$user."'
 WHERE  `districtCode`='".$districtCode."'
 AND `SubcountyCode`='".$oldSubcountyCode."'
 AND `ParishCode`='".$ParishCode."'";
         
 //$obj->alert($sql);
 $query=@mysql_query($sql)or die(http(1592));
 //$query=@mysql_query($sql)or die(QueryManager::http("Parishes edit setup Error-code 1592 because ".mysql_error()));
                 
                 
                 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Parish  record(s) has(have) been Updated!"));
 $obj->call("xajax_view_Parishes",'','','');
 return $obj;
 }
 //------------------------end of update_Parishes=--------------------------
 
 
 //================================update_Districts===================================
 //========================================edit_Districts==========================
 function edit_myDistricts($formValues){
 $obj=new xajaxResponse();
 
 $QueryManager=new QueryManager('');
 
 
 
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 
 //$obj->alert($regionCode);
 
 $n=1;
 $inc=1;
 $data="<form action=\"".$PHP_SELF."\" name='Districts' id='Districts' method='post'>
 <table width='100%' cellpadding='2' border='0' cellspacing='1'>";
  
 $data.="<tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>";
   
 $data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE DISTRICT DETAILS</center></th></tr>";
   
   
  
   for($k=0;$k<count($formValues['loopkey']);$k++){
   $sql="SELECT d . * FROM `tbl_district` d WHERE d.`districtCode`='".$formValues['districtCode'][$k]."'
                   AND d.`zone`='".$formValues['regionalCode'][$k]."'";
   //$obj->alert($sql);
  $sel=mysql_query($sql)or die(http(37));
  while($row=mysql_fetch_assoc($sel)){
     
 $data.="<tr><td> <input name='loopkey[]' type='hidden' id='loopkey".$n."' size='25' value='1' />";
     
      $data.="<table border='0' width='400'>";
             
                 $data.="<tr>";
                 //Find the District name
                 
                 $st="SELECT  d.* FROM `tbl_district` d WHERE d.`districtCode`='".$row['districtCode']."' AND d.`Display` = 'Yes'";
                         $q=@mysql_query($st);
                         $r=mysql_fetch_array($q);
                 if($r<>NULL){
                   $data.="<th colspan='2' scope='col'>UPDATE DISTRICT DETAILS for ".$r['districtName']." District</div></th>";
                 }
                   $data.="</tr>";
                 
                 
                     $data.="<tr>
                     <td><strong>Region</strong><br /></td>
                       <td><select name='zone[]' id='zone".$n."' />
                       <option value=''>-select-</option>";
                        $data.=$QueryManager->ZoneFilter($row['zone']);
                       
                       $data.="</select>
                     </td>
                 </tr>";
                     
                     
                     
                     $data.="<tr><td><strong>District name:</strong><br /></td>";
                         
                     $data.="<input type='hidden' value='".$row['districtCode']."' name='districtCode[]' id='classCode".$n."'/>";
                     $data.="<input type='hidden' value='".$row['zone']."' name='oldZone[]' id='oldZone".$n."'/>";
                     $data.="<td><input type='text' value='".$row['districtName']."' name='districtName[]' id='districtName".$n."'/>
                     </td>
                 </tr>
                 
                 
                 <tr>
                     <td><strong>Display:</strong><br /></td>
                       <td><select name='Display[]' id='Display".$n."' />
                       <option value=''>-select-</option>";
                        $var=array('Yes','No');
                                         
                                         foreach ($var as $s) {
                                            // $default='Yes';
                                             $selected=($row['Display']==$s)?"selected":"";
                                             $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                             $q++;
                                         } 
                       
                       $data.="</select>
                     </td>
                 </tr>
                 
                 
               
                 <tr>
                   <td>&nbsp;</td>
                   <td><input value='Save' name='saveDistricts' onclick=\"xajax_update_myDistricts(xajax.getFormValues('Districts'));\" type='button'></td>
                 </tr>
               </table>";
     
  
                   $n++;
  }
  
  }
  
 $data.="</table></form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 
 
 
 
 function update_myDistricts($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 for($i=0;$i<count($formValues['loopkey']);$i++){
     
 $districtCode=$formValues['districtCode'][$i];
 $oldZone=$formValues['oldZone'][$i];
 $zone=$formValues['zone'][$i];
 $districtName=$formValues['districtName'][$i];
 $acronym=strtoupper(substr($districtName, 0, 3));
 $Display=$formValues['Display'][$i];
 $user=$_SESSION['username'];
 
 
 $sql="UPDATE `tbl_district` SET
 `districtName`='".$districtName."',
 `acronym`='".$acronym."',
 `zone`='".$zone."',
 `Display`='".$Display."',
 `updatedby`='".$user."'
 WHERE  `districtCode`='".$districtCode."' AND `zone`='".$oldZone."'";
         
  //$obj->alert($sql);
 $query=@mysql_query($sql)or die(http(1592));
 //$query=@mysql_query($sql)or die(QueryManager::http("Districts edit setup Error-code 1592 because ".mysql_error()));
                 
                 
                 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("District record(s) has(have) been Updated!"));
 $obj->call("xajax_view_myDistricts",'','','');
 return $obj;
 }
 //------------------------end of update_Districts=--------------------------
 
 
 
 
 
 //================================update_Subcounties===================================
 //========================================edit_Subcounties==========================
 function edit_Subcounties($formValues){
 $obj=new xajaxResponse();
 
 $QueryManager=new QueryManager('');
 
 
 
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 
 //$obj->alert($regionCode);
 
 $n=1;
 $inc=1;
 $data="<form action=\"".$PHP_SELF."\" name='Subcounties' id='Subcounties' method='post'>
 <table width='100%' cellpadding='2' border='0' cellspacing='1'>";
  
 $data.="<tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>";
   
 $data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE SUBCOUNTY DETAILS</center></th></tr>";
   
   
  
   for($k=0;$k<count($formValues['loopkey']);$k++){
   
  $sel=mysql_query("SELECT s . *, d.* FROM `tbl_subcounty` s, `tbl_district` d
                   WHERE s.`districtCode`='".$formValues['districtCode'][$k]."'
                   AND s.`districtCode`=d.`districtCode`
                   AND s.`subcountyCode`='".$formValues['subcountyCode'][$k]."'")or die(http(37));
  while($row=mysql_fetch_assoc($sel)){
     
 $data.="<tr><td> <input name='loopkey[]' type='hidden' id='loopkey".$n."' size='25' value='1' />
 <input name='code[]' type='hidden' id='code".$n."' size='25' value='".$row['code']."' />";
     
      $data.="<table border='0' width='400'>";
             
                 $data.="<tr>";
                 //Find the District name
                 
                 $st="SELECT  d.* FROM `tbl_district` d WHERE d.`districtCode`='".$row['districtCode']."' AND d.`Display` = 'Yes'";
                         $q=@mysql_query($st);
                         $r=mysql_fetch_array($q);
                 if($r<>NULL){
                   $data.="<th colspan='2' scope='col'>UPDATE Subcounty DETAILS for ".$r['districtName']." District</div></th>";
                 }
                   $data.="</tr>";
                 
                 $data.="<tr>
                     <td><strong>District</strong><br /></td>
                       <td><select name='districtCode[]' id='districtCode".$n."' />
                       <option value=''>-select-</option>";
                        $data.=$QueryManager->DistrictFilter($row['zone'],$row['districtCode']);
                       $data.="</select>
                     </td>
                 </tr>";
                 
                 
                     $data.="<tr><td><strong>Subcounty name:</strong><br /></td>";
                         
                     $data.="<input type='hidden' value='".$row['districtCode']."' name='oldDistrictCode[]' id='oldDistrictCode".$n."'/>";
                     $data.="<input type='hidden' value='".$row['subcountyCode']."' name='subcountyCode[]' id='subcountyCode".$n."'/>"; 
                       $data.="<td><input type='text' value='".$row['subcountyName']."' name='subcountyName[]' id='subcountyName".$n."'/>
                     </td>
                 </tr>
                 
                 
                 </tr>
                     <td><strong>Display:</strong><br /></td>
                       <td><select name='Display[]' id='Display".$n."' />
                       <option value=''>-select-</option>";
                        $var=array('Yes','No');
                                         
                                         foreach ($var as $s) {
                                            // $default='Yes';
                                             $selected=($row['Display']==$s)?"selected":"";
                                             $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                             $q++;
                                         } 
                       
                       $data.="</select>
                     </td>
                 </tr>
                 
                 
               
                 <tr>
                   <td>&nbsp;</td>
                   <td><input value='Save' name='saveSubcounties' onclick=\"xajax_update_Subcounties(xajax.getFormValues('Subcounties'));\" type='button'></td>
                 </tr>
               </table>";
     
  
                   $n++;
  }
  
  }
  
 $data.="</table></form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 
 
 
 
 function update_Subcounties($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 for($i=0;$i<count($formValues['loopkey']);$i++){
     
 $oldDistrictCode=$formValues['oldDistrictCode'][$i];
 $districtCode=$formValues['districtCode'][$i];
 $subcountyCode=$formValues['subcountyCode'][$i];
 $subcountyName=$formValues['subcountyName'][$i];
 $Display=$formValues['Display'][$i];
 $user=$_SESSION['username'];
 
 
 $sql="UPDATE `tbl_subcounty` SET
 `districtCode`='".$districtCode."',
 `subcountyName`='".$subcountyName."',
 `Display`='".$Display."',
 `updatedby`='".$user."'
 WHERE  `districtCode`='".$oldDistrictCode."' AND `subcountyCode`='".$subcountyCode."'";
         
  //$obj->alert($sql);
 $query=@mysql_query($sql)or die(http(1882));
 //$query=@mysql_query($sql)or die(QueryManager::http("Subcounties edit setup Error-code 1592 because ".mysql_error()));
                 
                 
                 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Subcounty  record(s) has(have) been Updated!"));
 $obj->call("xajax_view_Subcounties",'','','');
 return $obj;
 }
 //------------------------end of update_Subcounties=--------------------------
 
 
 
 
 
 //========================================edit_cropTreatmentsLookup==========================
 function edit_cropTreatmentsLookup($formValues){
 $obj=new xajaxResponse();
 
 $QueryManager=new QueryManager('');
 
 
 
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 
 //$obj->alert($regionCode);
 
 $n=1;
 $inc=1;
 $data="<form action=\"".$PHP_SELF."\" name='cropTreatmentsLookup' id='cropTreatmentsLookup' method='post'>
 <table width='100%' cellpadding='2' border='0' cellspacing='1'>";
  
 $data.="<tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>";
   
 $data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE Crop Treatment DETAILS</center></th></tr>";
   
   
  
   for($k=0;$k<count($formValues['loopkey']);$k++){
   
  $sel=mysql_query("SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='36' AND l.`code`='".$formValues['code'][$k]."'  AND l.`status` = 'Yes'")or die(http(37));
  while($row=mysql_fetch_assoc($sel)){
     
 $data.="<tr><td> <input name='loopkey[]' type='hidden' id='loopkey".$n."' size='25' value='1' />
 <input name='code[]' type='hidden' id='code".$n."' size='25' value='".$row['code']."' />";
     
     $data.="<table border='0' width='400'>";
     $color=$n%2==1?"evenrow":"white1";
                 
                     $data.="<tr><td colspan='23'><hr></td></tr>";
                     $data.="<tr class='".$color."'><td><strong>Name of Crop Treatment:</strong><br /></td>";
                         
                     $data.="<input type='hidden' value='".$row['classCode']."' name='classCode[]' id='classCode'/>";
                     $data.="<input type='hidden' value='".$row['code']."' name='code[]' id='code'/>"; 
                       $data.="<td><input value='".$row['codeName']."' type='text' name='codeName[]' id='codeName'/>
                     </td>
                 </tr>
                 
                 <tr class='".$color."'>
                     <td><strong>Description:</strong><br /></td>
                       <td><textarea name='classDescription[]' id='classDescription' rows='5' cols='30'/>".$row['classDescription']."</textarea>
                     </td>
                 </tr>
                 <tr class='".$color."'>
                     <td><strong>Display:</strong><br /></td>
                       <td><select name='status[]' id='status' />
                       <option value=''>-select-</option>";
                        $var=array('Yes','No');
                                         
                                         foreach ($var as $s) {
                                             //$default='Yes';
                                             $selected=($row['status']==$s)?"selected":"";
                                             $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                             $q++;
                                         } 
                       
                       $data.="</select>
                     </td>
                 </tr>";
                 
 
               
                 $data.="<tr class='".$color."'>
                   <td>&nbsp;</td>
                   <td><input value='Save' name='savecropTreatmentsLookup' onclick=\"xajax_update_cropTreatmentsLookup(xajax.getFormValues('cropTreatmentsLookup'));\" type='button'></td>
                 </tr>
               </table>";
     
  
                   $n++;
  }
  
  }
  
 $data.="</table></form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 
 
 
 //================================update_cropTreatmentsLookup===================================
 
 function update_cropTreatmentsLookup($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 for($i=0;$i<count($formValues['loopkey']);$i++){
     
 $code=$formValues['code'][$i];
 
 $classCode=$formValues['classCode'][$i];
 $classDescription=$formValues['classDescription'][$i];
 $codeName=$formValues['codeName'][$i];
 $notes=$classDescription;
 $status=$formValues['status'][$i];
 $thisYear=date('Y');
 $user=$_SESSION['username'];
 
 
 
 
 
 $sql="UPDATE `tbl_lookup` SET
 `classDescription`='".$classDescription."',
 `codeName`='".$codeName."',
 `notes`='".$notes."',
 `status`='".$status."',
 `year`='".$thisYear."',
 `updatedby`='".$_SESSION['username']."'
 WHERE `classCode`='".$classCode."' AND `code`='".$code."'";
         
  //$obj->alert($sql);
 //$query=@mysql_query($sql)or die(http(1592));
 $query=@mysql_query($sql)or die(QueryManager::http("cropTreatmentsLookup edit setup Error-code 1592 because ".mysql_error()));
                 
                 
                 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Crop treatment record(s) has(have) been Updated!"));
 $obj->call("xajax_view_cropTreatmentsLookup",'','','');
 return $obj;
 }
 //------------------------end of update_cropTreatmentsLookup=--------------------------
 
 
 //========================================edit_actorsServedLookup==========================
 function edit_actorsServedLookup($formValues){
 $obj=new xajaxResponse();
 
 $QueryManager=new QueryManager('');
 
 
 
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 
 //$obj->alert($regionCode);
 
 $n=1;
 $inc=1;
 $data="<form action=\"".$PHP_SELF."\" name='actorsServedLookup' id='actorsServedLookup' method='post'>
 <table width='100%' cellpadding='2' border='0' cellspacing='1'>";
  
 $data.="<tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>";
   
 $data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE Type of actor served BDS DETAILS</center></th></tr>";
   
   
  
   for($k=0;$k<count($formValues['loopkey']);$k++){
   
  $sel=mysql_query("SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='31' AND l.`code`='".$formValues['code'][$k]."'  AND l.`status` = 'Yes'")or die(http(37));
  while($row=mysql_fetch_assoc($sel)){
     
 $data.="<tr><td> <input name='loopkey[]' type='hidden' id='loopkey".$n."' size='25' value='1' />
 <input name='code[]' type='hidden' id='code".$n."' size='25' value='".$row['code']."' />";
     
     $data.="<table border='0' width='400'>";
     $color=$n%2==1?"evenrow":"white1";
                 
                     $data.="<tr><td colspan='23'><hr></td></tr>";
                     $data.="<tr class='".$color."'><td><strong>Name of BDS actors served:</strong><br /></td>";
                         
                     $data.="<input type='hidden' value='".$row['classCode']."' name='classCode[]' id='classCode'/>";
                     $data.="<input type='hidden' value='".$row['code']."' name='code[]' id='code'/>"; 
                       $data.="<td><input value='".$row['codeName']."' type='text' name='codeName[]' id='codeName'/>
                     </td>
                 </tr>
                 
                 <tr class='".$color."'>
                     <td><strong>Description:</strong><br /></td>
                       <td><textarea name='classDescription[]' id='classDescription' rows='5' cols='30'/>".$row['classDescription']."</textarea>
                     </td>
                 </tr>
                 <tr class='".$color."'>
                     <td><strong>Display:</strong><br /></td>
                       <td><select name='status[]' id='status' />
                       <option value=''>-select-</option>";
                        $var=array('Yes','No');
                                         
                                         foreach ($var as $s) {
                                             //$default='Yes';
                                             $selected=($row['status']==$s)?"selected":"";
                                             $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                             $q++;
                                         } 
                       
                       $data.="</select>
                     </td>
                 </tr>";
                 
 
               
                 $data.="<tr class='".$color."'>
                   <td>&nbsp;</td>
                   <td><input value='Save' name='saveactorsServedLookup' onclick=\"xajax_update_actorsServedLookup(xajax.getFormValues('actorsServedLookup'));\" type='button'></td>
                 </tr>
               </table>";
     
  
                   $n++;
  }
  
  }
  
 $data.="</table></form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 
 
 
 //================================update_actorsServedLookup===================================
 
 function update_actorsServedLookup($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 for($i=0;$i<count($formValues['loopkey']);$i++){
     
 $code=$formValues['code'][$i];
 
 $classCode=$formValues['classCode'][$i];
 $classDescription=$formValues['classDescription'][$i];
 $codeName=$formValues['codeName'][$i];
 $notes=$classDescription;
 $status=$formValues['status'][$i];
 $thisYear=date('Y');
 $user=$_SESSION['username'];
 
 
 
 
 
 $sql="UPDATE `tbl_lookup` SET
 `classDescription`='".$classDescription."',
 `codeName`='".$codeName."',
 `notes`='".$notes."',
 `status`='".$status."',
 `year`='".$thisYear."',
 `updatedby`='".$_SESSION['username']."'
 WHERE `classCode`='".$classCode."' AND `code`='".$code."'";
         
  //$obj->alert($sql);
 //$query=@mysql_query($sql)or die(http(1592));
 $query=@mysql_query($sql)or die(QueryManager::http("actorsServedLookup edit setup Error-code 1592 because ".mysql_error()));
                 
                 
                 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Type of actor served BDS record(s) has(have) been Updated!"));
 $obj->call("xajax_view_actorsServedLookup",'','','');
 return $obj;
 }
 //------------------------end of update_actorsServedLookup=--------------------------
 
 
 
 
 
 
 
 
//edit_labourSavingTech
//*******************************Labour Saving Technology Edit Modification***************************
//------------------------edit_labourSavingTechLookup------------------------------------
function edit_labourSavingTechLookup($formValues){
$obj=new xajaxResponse();

$QueryManager=new QueryManager('');



if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

//$obj->alert($regionCode);

$n=1;
$inc=1;
$data="<form action=\"".$PHP_SELF."\" name='labourSavingTechLookup' id='labourSavingTechLookup' method='post'>
<table width='100%' cellpadding='2' border='0' cellspacing='1'>";

$data.="<tr class=''>
	   <td colspan=8>
	   <div id='status'></div>
	  </td>
	 </tr>";

$data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE NEW LABOUR SAVING TECHNOLOGY DETAILS</center></th></tr>";



for($k=0;$k<count($formValues['loopkey']);$k++){

$sel=mysql_query("SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='30' AND l.`code`='".$formValues['code'][$k]."'  AND l.`status` = 'Yes'")or die(http(37));
while($row=mysql_fetch_assoc($sel)){
 
$data.="<tr><td> <input name='loopkey[]' type='hidden' id='loopkey".$n."' size='25' value='1' />
<input name='code[]' type='hidden' id='code".$n."' size='25' value='".$row['code']."' />";
 
 $data.="<table border='0' width='400'>";
 $color=$n%2==1?"evenrow":"white1";
			 
				 $data.="<tr><td colspan='23'><hr></td></tr>";
				 $data.="<tr class='".$color."'><td><strong>Name of Technology:</strong><br /></td>";
					 
				 $data.="<input type='hidden' value='".$row['classCode']."' name='classCode[]' id='classCode'/>";
				 $data.="<input type='hidden' value='".$row['code']."' name='code[]' id='code'/>"; 
				   $data.="<td><input value='".$row['codeName']."' type='text' name='codeName[]' id='codeName'/>
				 </td>
			 </tr>
			 
			 <tr class='".$color."'>
				 <td><strong>Description:</strong><br /></td>
				   <td><textarea name='classDescription[]' id='classDescription' rows='5' cols='30'/>".$row['classDescription']."</textarea>
				 </td>
			 </tr>
			 <tr class='".$color."'>
				 <td><strong>Display:</strong><br /></td>
				   <td><select name='status[]' id='status' />
				   <option value=''>-select-</option>";
					$var=array('Yes','No');
									 
									 foreach ($var as $s) {
										 //$default='Yes';
										 $selected=($row['status']==$s)?"selected":"";
										 $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
										 $q++;
									 } 
				   
				   $data.="</select>
				 </td>
			 </tr>";
			 

		   
			 $data.="<tr class='".$color."'>
			   <td>&nbsp;</td>
			   <td><input value='Save' name='saveLabourSavingTech' onclick=\"xajax_update_labourSavingTechLookup(xajax.getFormValues('labourSavingTechLookup'));\" type='button'></td>
			 </tr>
		   </table>";
 

			   $n++;
}

}

$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

//--------------------------------update_labourSavingTechLookup--------------------------

function update_labourSavingTechLookup($formValues){
$obj=new xajaxResponse();
$n=1;

for($i=0;$i<count($formValues['loopkey']);$i++){
 
$code=$formValues['code'][$i];

$classCode=$formValues['classCode'][$i];
$classDescription=$formValues['classDescription'][$i];
$codeName=$formValues['codeName'][$i];
$notes=$classDescription;
$status=$formValues['status'][$i];
$thisYear=date('Y');
$user=$_SESSION['username'];





$sql="UPDATE `tbl_lookup` SET
`classDescription`='".$classDescription."',
`codeName`='".$codeName."',
`notes`='".$notes."',
`status`='".$status."',
`year`='".$thisYear."',
`updatedby`='".$_SESSION['username']."'
WHERE `classCode`='".$classCode."' AND `code`='".$code."'";
	 
//$obj->alert($sql);
//$query=@mysql_query($sql)or die(http(1592));
$query=@mysql_query($sql)or die(QueryManager::http("labourSavingTechLookup edit setup Error-code 1592 because ".mysql_error()));
			 
			 
			 }
$obj->assign('bodyDisplay','innerHTML',congMsg("Labour Saving Technology record(s) has(have) been Updated!"));
$obj->call("xajax_view_labourSavingTechLookup",'','','');
return $obj;
}
//------------------------end of update_labourSavingTechLookup=--------------------------
//*******************************End of Labour Saving Technology Edit**********************************


//edit_traderModelsLookup
//*******************************Trader Models Edit Modification***************************
//------------------------edit_traderModelsLookup------------------------------------
function edit_traderModelsLookup($formValues){
$obj=new xajaxResponse();

$QueryManager=new QueryManager('');



if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

//$obj->alert($regionCode);

$n=1;
$inc=1;
$data="<form action=\"".$PHP_SELF."\" name='traderModelsLookup' id='traderModelsLookup' method='post'>
<table width='100%' cellpadding='2' border='0' cellspacing='1'>";

$data.="<tr class=''>
	   <td colspan=8>
	   <div id='status'></div>
	  </td>
	 </tr>";

$data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE NEW Trader Models DETAILS</center></th></tr>";



for($k=0;$k<count($formValues['loopkey']);$k++){

$sel=mysql_query("SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='38' AND l.`code`='".$formValues['code'][$k]."'  AND l.`status` = 'Yes'")or die(http(37));
while($row=mysql_fetch_assoc($sel)){
 
$data.="<tr><td> <input name='loopkey[]' type='hidden' id='loopkey".$n."' size='25' value='1' />
<input name='code[]' type='hidden' id='code".$n."' size='25' value='".$row['code']."' />";
 
 $data.="<table border='0' width='400'>";
 $color=$n%2==1?"evenrow":"white1";
			 
				 $data.="<tr><td colspan='23'><hr></td></tr>";
				 $data.="<tr class='".$color."'><td><strong>Name of Model:</strong><br /></td>";
					 
				 $data.="<input type='hidden' value='".$row['classCode']."' name='classCode[]' id='classCode'/>";
				 $data.="<input type='hidden' value='".$row['code']."' name='code[]' id='code'/>"; 
				   $data.="<td><input value='".$row['codeName']."' type='text' name='codeName[]' id='codeName'/>
				 </td>
			 </tr>
			 
			 <tr class='".$color."'>
				 <td><strong>Description:</strong><br /></td>
				   <td><textarea name='classDescription[]' id='classDescription' rows='5' cols='30'/>".$row['classDescription']."</textarea>
				 </td>
			 </tr>
			 <tr class='".$color."'>
				 <td><strong>Display:</strong><br /></td>
				   <td><select name='status[]' id='status' />
				   <option value=''>-select-</option>";
					$var=array('Yes','No');
									 
									 foreach ($var as $s) {
										 //$default='Yes';
										 $selected=($row['status']==$s)?"selected":"";
										 $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
										 $q++;
									 } 
				   
				   $data.="</select>
				 </td>
			 </tr>";
			 

		   
			 $data.="<tr class='".$color."'>
			   <td>&nbsp;</td>
			   <td><input value='Save' name='savetraderModelsLookup' onclick=\"xajax_update_traderModelsLookup(xajax.getFormValues('traderModelsLookup'));\" type='button'></td>
			 </tr>
		   </table>";
 

			   $n++;
}

}

$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

//--------------------------------update_traderModelsLookup--------------------------

function update_traderModelsLookup($formValues){
$obj=new xajaxResponse();
$n=1;

for($i=0;$i<count($formValues['loopkey']);$i++){
 
$code=$formValues['code'][$i];

$classCode=$formValues['classCode'][$i];
$classDescription=$formValues['classDescription'][$i];
$codeName=$formValues['codeName'][$i];
$notes=$classDescription;
$status=$formValues['status'][$i];
$thisYear=date('Y');
$user=$_SESSION['username'];





$sql="UPDATE `tbl_lookup` SET
`classDescription`='".$classDescription."',
`codeName`='".$codeName."',
`notes`='".$notes."',
`status`='".$status."',
`year`='".$thisYear."',
`updatedby`='".$_SESSION['username']."'
WHERE `classCode`='".$classCode."' AND `code`='".$code."'";
	 
//$obj->alert($sql);
//$query=@mysql_query($sql)or die(http(1592));
$query=@mysql_query($sql)or die(QueryManager::http("traderModelsLookup edit setup Error-code 1592 because ".mysql_error()));
			 
			 
			 }
$obj->assign('bodyDisplay','innerHTML',congMsg("Trader Models record(s) has(have) been Updated!"));
$obj->call("xajax_view_traderModelsLookup",'','','');
return $obj;
}
//------------------------end of update_traderModelsLookup=--------------------------
//*******************************End of Trader Models Edit**********************************


//edit_enterpriseTechnologiesLookup
//*******************************Enterprise Technologies Edit Modification***************************
//------------------------edit_enterpriseTechnologiesLookup------------------------------------
function edit_enterpriseTechnologiesLookup($formValues){
$obj=new xajaxResponse();

$QueryManager=new QueryManager('');



if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

//$obj->alert($regionCode);

$n=1;
$inc=1;
$data="<form action=\"".$PHP_SELF."\" name='enterpriseTechnologiesLookup' id='enterpriseTechnologiesLookup' method='post'>
<table width='100%' cellpadding='2' border='0' cellspacing='1'>";

$data.="<tr class=''>
	   <td colspan=8>
	   <div id='status'></div>
	  </td>
	 </tr>";

$data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE NEW Enterprise Technologies DETAILS</center></th></tr>";



for($k=0;$k<count($formValues['loopkey']);$k++){

$sel=mysql_query("SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='37' AND l.`code`='".$formValues['code'][$k]."'  AND l.`status` = 'Yes'")or die(http(37));
while($row=mysql_fetch_assoc($sel)){
 
$data.="<tr><td> <input name='loopkey[]' type='hidden' id='loopkey".$n."' size='25' value='1' />
<input name='code[]' type='hidden' id='code".$n."' size='25' value='".$row['code']."' />";
 
 $data.="<table border='0' width='400'>";
 $color=$n%2==1?"evenrow":"white1";
			 
				 $data.="<tr><td colspan='23'><hr></td></tr>";
				 $data.="<tr class='".$color."'><td><strong>Name of Technology:</strong><br /></td>";
					 
				 $data.="<input type='hidden' value='".$row['classCode']."' name='classCode[]' id='classCode'/>";
				 $data.="<input type='hidden' value='".$row['code']."' name='code[]' id='code'/>"; 
				   $data.="<td><input value='".$row['codeName']."' type='text' name='codeName[]' id='codeName'/>
				 </td>
			 </tr>
			 
			 <tr class='".$color."'>
				 <td><strong>Description:</strong><br /></td>
				   <td><textarea name='classDescription[]' id='classDescription' rows='5' cols='30'/>".$row['classDescription']."</textarea>
				 </td>
			 </tr>
			 <tr class='".$color."'>
				 <td><strong>Display:</strong><br /></td>
				   <td><select name='status[]' id='status' />
				   <option value=''>-select-</option>";
					$var=array('Yes','No');
									 
									 foreach ($var as $s) {
										 //$default='Yes';
										 $selected=($row['status']==$s)?"selected":"";
										 $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
										 $q++;
									 } 
				   
				   $data.="</select>
				 </td>
			 </tr>";
			 

		   
			 $data.="<tr class='".$color."'>
			   <td>&nbsp;</td>
			   <td><input value='Save' name='saveenterpriseTechnologiesLookup' onclick=\"xajax_update_enterpriseTechnologiesLookup(xajax.getFormValues('enterpriseTechnologiesLookup'));\" type='button'></td>
			 </tr>
		   </table>";
 

			   $n++;
}

}

$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

//--------------------------------update_enterpriseTechnologiesLookup--------------------------

function update_enterpriseTechnologiesLookup($formValues){
$obj=new xajaxResponse();
$n=1;

for($i=0;$i<count($formValues['loopkey']);$i++){
 
$code=$formValues['code'][$i];

$classCode=$formValues['classCode'][$i];
$classDescription=$formValues['classDescription'][$i];
$codeName=$formValues['codeName'][$i];
$notes=$classDescription;
$status=$formValues['status'][$i];
$thisYear=date('Y');
$user=$_SESSION['username'];





$sql="UPDATE `tbl_lookup` SET
`classDescription`='".$classDescription."',
`codeName`='".$codeName."',
`notes`='".$notes."',
`status`='".$status."',
`year`='".$thisYear."',
`updatedby`='".$_SESSION['username']."'
WHERE `classCode`='".$classCode."' AND `code`='".$code."'";
	 
//$obj->alert($sql);
//$query=@mysql_query($sql)or die(http(1592));
$query=@mysql_query($sql)or die(QueryManager::http("enterpriseTechnologiesLookup edit setup Error-code 1592 because ".mysql_error()));
			 
			 
			 }
$obj->assign('bodyDisplay','innerHTML',congMsg("Enterprise Technologies record(s) has(have) been Updated!"));
$obj->call("xajax_view_enterpriseTechnologiesLookup",'','','');
return $obj;
}
//------------------------end of update_enterpriseTechnologiesLookup=--------------------------
//*******************************End of Enterprise Technologies Edit**********************************



//edit_cropVarieties
 //*******************************Labour Saving Technology Edit Modification***************************
 
 //========================================edit_cropVarieties==========================
 function edit_cropVarieties($formValues){
 $obj=new xajaxResponse();
 
 $QueryManager=new QueryManager('');
 
 
 
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 
 //$obj->alert($regionCode);
 
 $n=1;
 $inc=1;
 $data="<form action=\"".$PHP_SELF."\" name='cropVarieties' id='cropVarieties' method='post'>
 <table width='100%' cellpadding='2' border='0' cellspacing='1'>";
  
 $data.="<tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>";
   
 $data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE CROP VARIETY DETAILS</center></th></tr>";
   
   
  
   for($k=0;$k<count($formValues['loopkey']);$k++){
   $stmnt="select * from `tbl_cropvarieties` where pk_cropVarietiesId='".$formValues['pk_cropVarietiesId'][$k]."' ";
   //$obj->alert($stmnt);
  $sel=mysql_query($stmnt)or die(http(935));
  while($row=mysql_fetch_assoc($sel)){
     
 $data.="<tr><td> <input name='loopkey[]' type='hidden' id='loopkey".$n."' size='25' value='1' />";
     
     $data.="<table border='0' width='400'>";
     $color=$n%2==1?"evenrow":"white1";
                 
                     $data.="<tr><td colspan='23'><hr></td></tr>";
                     $data.="<tr class='".$color."'><td><strong>Crop Variety:</strong><br /></td>
                     <input type='hidden' name='pk_cropVarietiesId[]' id='pk_cropVarietiesId".$n."' size='25' value='".$row['pk_cropVarietiesId']."' />
                     ";
                         
                       $data.="<td><input value='".$row['cropVariety']."' type='text' name='cropVariety[]' id='cropVariety".$n."'/>
                     </td>
                 </tr>";
                 
                 $data.="<tr class='".$color."'>
                     <td><strong>Crop:</strong><br /></td>
                       <td><input readonly='readonly' class='disabled' type='text' value='".$row['cropCode']."' name='cropCode[]' id='cropCode'/>
                     </td>
                 </tr>";
                 
                 
                 
 
               
                 $data.="<tr class='".$color."'>
                   <td>&nbsp;</td>
                   <td><input value='Save' name='cropVarieties' onclick=\"xajax_update_cropVarieties(xajax.getFormValues('cropVarieties'));\" type='button'></td>
                 </tr>
               </table>";
     
  
                   $n++;
  }
  
  }
  
 $data.="</table></form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 
 
 
 //================================update_vAgent===================================
 
 function update_cropVarieties($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 for($i=0;$i<count($formValues['loopkey']);$i++){
     
 $pk_cropVarietiesId=$formValues['pk_cropVarietiesId'][$i];
 $cropCode=$formValues['cropCode'][$i];
 $cropVariety=$formValues['cropVariety'][$i];
 $thisYear=date('Y');
 $user=$_SESSION['username'];
 
 
 
 
 
 $sql="UPDATE `tbl_cropvarieties` SET `year`='".$thisYear."',`cropCode`='".$cropCode."',`cropVariety`='".$cropVariety."', `updatedby`='".$user."' WHERE `pk_cropVarietiesId`='".$pk_cropVarietiesId."'";
         
  //$obj->alert($sql);
 //$query=@mysql_query($sql)or die(http(1592));
 $query=@mysql_query($sql)or die(http(1030));
                 
                 
                 }
 $obj->assign('bodyDisplay','innerHTML',congMsg("Crop Variety record(s) has(have) been Updated!"));
 $obj->call("xajax_view_cropVarieties",'','','');
 return $obj;
 }
 //------------------------end of update_cropVarieties=--------------------------
 
 
 
 
 //*******************************End of Crop Varieties Edit********************

 

?>