<?php

 function edit_form8($formValues){
 $obj=new xajaxResponse();
 $QueryManager=new QueryManager('');
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 
 $n=1;
 $inc=1;
 $data="<form action=\"".$PHP_SELF."\" name='form8' id='form8' method='post'>
 <table width='100%' cellpadding='2' border='0' cellspacing='1'>";
  
 $data.="<tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>";
   
 $data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE RECORD(S)</center></th></tr>";
   
 for($k=0;$k<count($formValues['loopkey']);$k++){
   
  $sel=mysql_query("SELECT d.*
 FROM `tbl_demo_records_book` d
 WHERE d.`demoId`='".$formValues['demoId'][$k]."'")or die(http(37));
  //$obj->alert($formValues['tbl_villageagent_groupsId'][$k]);
  while($rowDemo=mysql_fetch_assoc($sel)){
     
 $data.="<td> <input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1' />";
 $data.="<td> <input name='demoId' type='hidden' id='demoId' size='25' value='".$rowDemo['demoId']."' />";
 
 //Start of the form8 to be modified
 
 $data.="
 <table width='100%' cellpadding='2' cellspacing='2'>
       <tr class='evenrow3'>
       <td colspan='22'>
       <table cellpadding='2' cellspacing='2' width='100%'>
        <tr class='evenrow'>
             <td>District :";
             $st="select d.* from `tbl_district` d where d.`districtCode`='".$rowDemo['demoDistrict']."'";
             $q=@mysql_query($st);
             $r=mysql_fetch_array($q);
             $data.="<input type='text' value='".$r['districtName']."' class='disabled' readonly='readonly' name='demoDistrict' id='demoDistrict'  style='width:100px;'>";
                 $data.="</td>";
 
             $data.="<td>Sub-County:";
             $st="select s.* from `tbl_subcounty` s where s.`subcountyCode`='".$rowDemo['demoSubCounty']."'";
             $q=@mysql_query($st);
             $r=mysql_fetch_array($q);
             $data.="<input type='text' value='".$r['subcountyName']."' class='disabled' readonly='readonly' name='demoSubCounty' id='demoSubCounty'  style='width:100px;'>";
                 $data.="</td>";
 
             $data.="<td>Parish:";
             $st="select p.* from `tbl_parish` p where p.`ParishCode`='".$rowDemo['demoParish']."'";
             $q=@mysql_query($st);
             $r=mysql_fetch_array($q);
             $data.="<input type='text' value='".$r['ParishName']."' class='disabled' readonly='readonly' name='demoParish' id='demoParish'  style='width:100px;'>";
                 $data.="</td>";    
                 
             $data.="<td colspan='2'>Village:
             <input type='text' name='demoVillage' id='demoVillage' class='disabled' readonly='readonly'  value='".$rowDemo['demoVillage']."'  style='width:100px;'>";
             $data.="</td>";
           $data.="</tr>";
 
         $data.="<tr class='evenrow'>
             <td>Season:
               <input type='text' class='disabled' readonly='readonly' value='".$rowDemo['demoSeason']."' name='demoSeason' id='demoSeason'  style='width:100px;'>";
             $data.="</td>
 
             <td>Year:
               <input type='text' class='disabled' readonly='readonly' value='".$rowDemo['demoYear']."' name='demoYear' id='demoYear' style='width:150px;'>";
                 
                 
         $data.="</td>
 
             <td>&nbsp;</td>
             <td colspan='-2'></td>
         </tr>
         <tr class='evenrow'>
 
             <td>Name of Trader:";
             $st="select t.* from `tbl_traders` t where t.`tbl_tradersId`='".$rowDemo['demoNameTrader']."'";
             $q=@mysql_query($st);
             $r=mysql_fetch_array($q);
             
               $data.="<input type='text' class='disabled' readonly='readonly' value='".$r['traderName']."' name='demoNameTrader' id='demoNameTrader'  style='width:100px;'>";
             
                 
                 $data.="</td>
 
             <td>Traders Sex:";
             $stmnt="SELECT t.* FROM `tbl_traders` t WHERE t.`tbl_tradersId`='".$rowDemo['demoNameTrader']."' ORDER BY t.`tbl_tradersId` ASC";
             $q=mysql_query($stmnt);
             $r=mysql_fetch_array($q);
 
             $data.="<input type='hidden' name='demoTraderSex' id='demoTraderSex' value='".$r['traderSex']."'/>
             <input type='text' name='demoTraderSex' id='demoTraderSex' value='".$r['traderSex']."' style='width:150px;' class='disabled' disabled='disabled'></td>
 
             <td colspan='3'>&nbsp;</td>
           </tr>
         <tr class='evenrow'>
             
 
             <td>Name of Village Agent:";
             $st="select v.* from `tbl_villageagents` v where v.`tbl_villageAgentId`='".$rowDemo['demoNameVillageAgent']."'";
             $q=@mysql_query($st);
             $r=mysql_fetch_array($q);
             
               $data.="<input type='text' class='disabled' readonly='readonly' value='".$r['vAgentName']."' name='demoNameVillageAgent' id='demoNameVillageAgent'  style='width:100px;'>";
             
                 
                 $data.="</td>
 
             <td>Sex of Village Agent:";
             $stmnt="SELECT v . * FROM `tbl_villageagents` v WHERE v.tbl_villageAgentId='".$rowDemo['demoNameVillageAgent']."' ORDER BY v.`tbl_villageAgentId` ASC";
             $q=mysql_query($stmnt);
             $r=mysql_fetch_array($q);
   
             $data.="<input type='hidden' name='demoVillageAgentSex' id='demoVillageAgentSex' value='".$r['vAgentSex']."'/>
             <input type='text' name='demoVillageAgentSex' id='demoVillageAgentSex' value='".$r['vAgentSex']."' style='width:150px;' class='disabled' disabled='disabled'></td>
 
             <td colspan='3'>&nbsp;</td>
           </tr>
     </table>
     </td></tr>";
     
     //-----------------------------Another table------------------------
 $data.="<tr class='evenrow3'>";
     $data.="<td colspan='22'>";
     $data.="<table border='0' cellspacing='2' cellpadding='2' width='100%'>";
 
     $data.="<tr class='evenrow'>
     <th>#</th>
     <th>Name of Host Farmer</th>
     <th>*Number of Visits</th>
     <th>Gender</th>
     <th>Age</th>
     <th>Crop</th>
     <th>Variety</th>
     </tr>";
 
 $num=1;
 for($i=1; $i<=$num; $i++){        
     $data.="<tr class='evenrow'>
     <td>".$i."</td>";
     $data.="<input type='hidden' name='loopkeyf[]' id='loopkeyf' value='1'/>";
     
     //$data.="<td><select name='hostFarmer[]' id='hostFarmer".$i."' style='width:100px;'>
     //<option value=''>-select-</option>";
     //$data.=$QueryManager->farmerFilter($rowDemo['demoNameTrader'],$rowDemo['demoNameVillageAgent'],$rowDemo['nameHostFarmer']);
     //$data.="</select>
     //</td>";
     
     $data.="<td><input value='".$rowDemo['nameHostFarmer']."'  type='text' name='hostFarmer[]' id='hostFarmer".$i."'  style='width:300px;'/>
    </td>";
     
  
     
    // $st_farmer="SELECT f.* FROM `tbl_farmers` f WHERE f.`tbl_farmersId`='".$rowDemo['nameHostFarmer']."'";
    // 
    //// $obj->alert($st_farmer);
    // 
    // $q=mysql_query($st_farmer);
    // $r=mysql_fetch_array($q);
     
     $data.="<td><input  name='numVisit[]' value='".$rowDemo['numofVisits']."' type='text' style='width:60px;'  size='50' value='' id='numVisit".$i."'
     onkeypress='return numbersonly(event, false)'/>
     </td>";
     
     $data.="<td>";
     //$data.="<input value='".$rowDemo['farmerGender']."' type='text'  name='hostGender[]' id='hostGender".$i."'  style='width:60px;'/>";
     $data.="<select name='hostGender' id ='hostGender' size='1'  style='width:70px'>
                <option value=''>-select-</option>";
                 $values=array('Male','Female');
                                        
                                        $q = 0; 
                                        foreach ($values as $s) {
                                            $selected=($rowDemo['farmerGender']==$s)?"selected":"";
                                            $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
                                            $q++;
                                        } 
                $data.="</select>";
     $data.="</td>";
     
     
     
     $data.="<td>
     <input value='".$rowDemo['farmerAge']."' type='text'   name='farmerAge[]' id='farmerAge".$i."' maxlength='2' onkeypress='return numbersonly(event, false)' style='width:60px;'>
     </td>
     <td >";
     
     
     $st="select c.* from `tbl_lookup` c where c.`classCode`=34
     AND c.`codeName`='".$rowDemo['farmerCrop']."'";
             $q=@mysql_query($st);
             $r=mysql_fetch_array($q);
     
     //$data.="<input type='text' value='".$r['codeName']."' class='disabled' readonly='readonly' name='farmerCrop[]' id='farmerCrop".$i."'  style='width:60px;'>";
        
        
        //in line with on demand change
        $data.="<select name='farmerCrop[]' id='farmerCrop".$i."'  style='width:60px;'>
    <option value=''>-select-</option>";
		 $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
                    $qcrop=mysql_query($stmntTwo);
                    while($rowCrop=mysql_fetch_array($qcrop)){
		     
                    $selected=($r['codeName']==$rowCrop['codeName'])?"selected":"";
                    $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
    $data.="</select>";
                  
      $data.="</td>
     <td>";
     $st="SELECT * FROM `tbl_cropvarieties` where  `pk_cropVarietiesId`='".$rowDemo['cropVariety']."'";
     //$obj->alert($st);
             $q=@mysql_query($st);
             $r=mysql_fetch_array($q);
     
     //$data.="<input type='text' value='".$r['cropVariety']."' class='disabled' readonly='readonly' name='cropVariety[]' id='cropVariety".$i."'  style='width:60px;'>";
     $data.="<select name='cropVariety[]' id='cropVariety".$i."'  style='width:60px;'>
    <option value=''>-select-</option>";             
     $query_thisUser1= "SELECT v.* FROM `tbl_cropvarieties` v
			 ORDER BY v.`cropVariety` ASC";
			$thisUser1 = @mysql_query($query_thisUser1) or die(http("QMClass--2163"));

			while ($rows_cropVariety=mysql_fetch_array($thisUser1))
				{
				
				$selected=($r['pk_cropVarietiesId']==$rows_cropVariety['pk_cropVarietiesId'])?"selected":"";
				$data.="<option value=\"".$rows_cropVariety['pk_cropVarietiesId']."\" ".$selected.">
			".$rows_cropVariety['cropVariety']."</option>";

		}		 
     $data.="</select>";
     
     $data.="</td>
     </tr>";
 }
 $data.="</table>";
 $data.="</td>";
 $data.="</tr>";
 
     
     $data.="<tr class='evenrow'><td colspan='22'>
 <table border='0' cellpadding='2' cellspacing='2' width='100%'>
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
         </tr>";
         
         $sel=mysql_query("SELECT b.*
         FROM `tbl_demo_book_details` b
         WHERE b.`demoId`='".$rowDemo['demoId']."'")or die(http(37));
         //$obj->alert($formValues['tbl_villageagent_groupsId'][$k]);
         while($rowDetails=mysql_fetch_assoc($sel)){
         
//===============================================================
//===============Values for plot A===============================
//===============================================================


$sizePlotA=$rowDetails['sizePlotA'];
if($sizePlotA==0){
$sizePlotA='';    
}
$treatmentOnePlotA=$rowDetails['treatmentOnePlotA'];
if($treatmentOnePlotA==0){
$treatmentOnePlotA='';    
}
$treatmentTwoPlotA=$rowDetails['treatmentTwoPlotA'];
if($treatmentTwoPlotA==0){
$treatmentTwoPlotA='';    
}
$treatmentThreePlotA=$rowDetails['treatmentThreePlotA'];
if($treatmentThreePlotA==0){
$treatmentThreePlotA='';    
}
$treatmentFourPlotA=$rowDetails['treatmentFourPlotA'];
if($treatmentFourPlotA==0){
$treatmentFourPlotA='';    
}
$treatmentFivePlotA=$rowDetails['treatmentFivePlotA'];
if($treatmentFivePlotA==0){
$treatmentFivePlotA='';    
}
$treatmentSixPlotA=$rowDetails['treatmentSixPlotA'];
if($treatmentSixPlotA==0){
$treatmentSixPlotA='';    
}
$treatmentSevenPlotA=$rowDetails['treatmentSevenPlotA'];
if($treatmentSevenPlotA==0){
$treatmentSevenPlotA='';    
}



$plantingDatePlotA=$rowDetails['plantingDatePlotA'];
if($plantingDatePlotA=='1930-01-01'){
$plantingDatePlotA='';    
}


$firstWeedingDatePlotA=$rowDetails['firstWeedingDatePlotA'];
if($firstWeedingDatePlotA=='1930-01-01'){
$firstWeedingDatePlotA='';    
}

$secondWeedingDatePlotA=$rowDetails['secondWeedingDatePlotA'];
if($secondWeedingDatePlotA=='1930-01-01'){
$secondWeedingDatePlotA='';    
}

$firstFertilizerDatePlotA=$rowDetails['firstFertilizerDatePlotA'];
if($firstFertilizerDatePlotA=='1930-01-01'){
$firstFertilizerDatePlotA='';    
}

$secondFertilizerDatePlotA=$rowDetails['secondFertilizerDatePlotA'];
if($secondFertilizerDatePlotA=='1930-01-01'){
$secondFertilizerDatePlotA='';    
}

$pesticideDatePlotA=$rowDetails['pesticideDatePlotA'];
if($pesticideDatePlotA=='1930-01-01'){
$pesticideDatePlotA='';    
}

$harvestDatePlotA=$rowDetails['harvestDatePlotA'];
if($harvestDatePlotA=='1930-01-01'){
$harvestDatePlotA='';    
}


$yieldPlotA=$rowDetails['yieldPlotA'];
if($yieldPlotA=='1930-01-01'){
$yieldPlotA='';    
}

$reportonDemoPlotA=$rowDetails['reportonDemoPlotA'];
$numFemalePlotA=$rowDetails['numFemalePlotA'];
if($numFemalePlotA==0){
$numFemalePlotA='';    
}

$numMalePlotA=$rowDetails['numMalePlotA'];
if($numMalePlotA==0){
$numMalePlotA='';    
}

$numTotalPlotA=$rowDetails['numTotalPlotA'];
if($numTotalPlotA==0){
$numTotalPlotA='';    
}

//===============================================================
//===============Values for plot B===============================
//===============================================================

$sizePlotB=$rowDetails['sizePlotB'];
if($sizePlotB==0){
$sizePlotB='';    
}
$treatmentOnePlotB=$rowDetails['treatmentOnePlotB'];
if($treatmentOnePlotB==0){
$treatmentOnePlotB='';    
}
$treatmentTwoPlotB=$rowDetails['treatmentTwoPlotB'];
if($treatmentTwoPlotB==0){
$treatmentTwoPlotB='';    
}
$treatmentThreePlotB=$rowDetails['treatmentThreePlotB'];
if($treatmentThreePlotB==0){
$treatmentThreePlotB='';    
}
$treatmentFourPlotB=$rowDetails['treatmentFourPlotB'];
if($treatmentFourPlotB==0){
$treatmentFourPlotB='';    
}
$treatmentFivePlotB=$rowDetails['treatmentFivePlotB'];
if($treatmentFivePlotB==0){
$treatmentFivePlotB='';    
}
$treatmentSixPlotB=$rowDetails['treatmentSixPlotB'];
if($treatmentSixPlotB==0){
$treatmentSixPlotB='';    
}
$treatmentSevenPlotB=$rowDetails['treatmentSevenPlotB'];
if($treatmentSevenPlotB==0){
$treatmentSevenPlotB='';    
}



$plantingDatePlotB=$rowDetails['plantingDatePlotB'];
if($plantingDatePlotB=='1930-01-01'){
$plantingDatePlotB='';    
}


$firstWeedingDatePlotB=$rowDetails['firstWeedingDatePlotB'];
if($firstWeedingDatePlotB=='1930-01-01'){
$firstWeedingDatePlotB='';    
}

$secondWeedingDatePlotB=$rowDetails['secondWeedingDatePlotB'];
if($secondWeedingDatePlotB=='1930-01-01'){
$secondWeedingDatePlotB='';    
}

$firstFertilizerDatePlotB=$rowDetails['firstFertilizerDatePlotB'];
if($firstFertilizerDatePlotB=='1930-01-01'){
$firstFertilizerDatePlotB='';    
}

$secondFertilizerDatePlotB=$rowDetails['secondFertilizerDatePlotB'];
if($secondFertilizerDatePlotB=='1930-01-01'){
$secondFertilizerDatePlotB='';    
}

$pesticideDatePlotB=$rowDetails['pesticideDatePlotB'];
if($pesticideDatePlotB=='1930-01-01'){
$pesticideDatePlotB='';    
}

$harvestDatePlotB=$rowDetails['harvestDatePlotB'];
if($harvestDatePlotB=='1930-01-01'){
$harvestDatePlotB='';    
}


$yieldPlotB=$rowDetails['yieldPlotB'];
if($yieldPlotB=='1930-01-01'){
$yieldPlotB='';    
}

$reportonDemoPlotB=$rowDetails['reportonDemoPlotB'];
$numFemalePlotB=$rowDetails['numFemalePlotB'];
if($numFemalePlotB==0){
$numFemalePlotB='';    
}

$numMalePlotB=$rowDetails['numMalePlotB'];
if($numMalePlotB==0){
$numMalePlotB='';    
}

$numTotalPlotB=$rowDetails['numTotalPlotB'];
if($numTotalPlotB==0){
$numTotalPlotB='';    
}


//===============================================================
//===============End of Values for plot B===============================
//===============================================================




//===============================================================
//===============Values for plot C===============================
//===============================================================

$sizePlotC=$rowDetails['sizePlotC'];
if($sizePlotC==0){
$sizePlotC='';    
}
$treatmentOnePlotC=$rowDetails['treatmentOnePlotC'];
if($treatmentOnePlotC==0){
$treatmentOnePlotC='';    
}
$treatmentTwoPlotC=$rowDetails['treatmentTwoPlotC'];
if($treatmentTwoPlotC==0){
$treatmentTwoPlotC='';    
}
$treatmentThreePlotC=$rowDetails['treatmentThreePlotC'];
if($treatmentThreePlotC==0){
$treatmentThreePlotC='';    
}
$treatmentFourPlotC=$rowDetails['treatmentFourPlotC'];
if($treatmentFourPlotC==0){
$treatmentFourPlotC='';    
}
$treatmentFivePlotC=$rowDetails['treatmentFivePlotC'];
if($treatmentFivePlotC==0){
$treatmentFivePlotC='';    
}
$treatmentSixPlotC=$rowDetails['treatmentSixPlotC'];
if($treatmentSixPlotC==0){
$treatmentSixPlotC='';    
}
$treatmentSevenPlotC=$rowDetails['treatmentSevenPlotC'];
if($treatmentSevenPlotC==0){
$treatmentSevenPlotC='';    
}



$plantingDatePlotC=$rowDetails['plantingDatePlotC'];
if($plantingDatePlotC=='1930-01-01'){
$plantingDatePlotC='';    
}


$firstWeedingDatePlotC=$rowDetails['firstWeedingDatePlotC'];
if($firstWeedingDatePlotC=='1930-01-01'){
$firstWeedingDatePlotC='';    
}

$secondWeedingDatePlotC=$rowDetails['secondWeedingDatePlotC'];
if($secondWeedingDatePlotC=='1930-01-01'){
$secondWeedingDatePlotC='';    
}

$firstFertilizerDatePlotC=$rowDetails['firstFertilizerDatePlotC'];
if($firstFertilizerDatePlotC=='1930-01-01'){
$firstFertilizerDatePlotC='';    
}

$secondFertilizerDatePlotC=$rowDetails['secondFertilizerDatePlotC'];
if($secondFertilizerDatePlotC=='1930-01-01'){
$secondFertilizerDatePlotC='';    
}

$pesticideDatePlotC=$rowDetails['pesticideDatePlotC'];
if($pesticideDatePlotC=='1930-01-01'){
$pesticideDatePlotC='';    
}

$harvestDatePlotC=$rowDetails['harvestDatePlotC'];
if($harvestDatePlotC=='1930-01-01'){
$harvestDatePlotC='';    
}


$yieldPlotC=$rowDetails['yieldPlotC'];
if($yieldPlotC=='1930-01-01'){
$yieldPlotC='';    
}

$reportonDemoPlotC=$rowDetails['reportonDemoPlotC'];
$numFemalePlotC=$rowDetails['numFemalePlotC'];
if($numFemalePlotC==0){
$numFemalePlotC='';    
}

$numMalePlotC=$rowDetails['numMalePlotC'];
if($numMalePlotC==0){
$numMalePlotC='';    
}

$numTotalPlotC=$rowDetails['numTotalPlotC'];
if($numTotalPlotC==0){
$numTotalPlotC='';    
}


//===============================================================
//===============End of Values for plot C===============================
//===============================================================


//===============================================================
//===============Values for plot D===============================
//===============================================================

$sizePlotD=$rowDetails['sizePlotD'];
if($sizePlotD==0){
$sizePlotD='';    
}
$treatmentOnePlotD=$rowDetails['treatmentOnePlotD'];
if($treatmentOnePlotD==0){
$treatmentOnePlotD='';    
}
$treatmentTwoPlotD=$rowDetails['treatmentTwoPlotD'];
if($treatmentTwoPlotD==0){
$treatmentTwoPlotD='';    
}
$treatmentThreePlotD=$rowDetails['treatmentThreePlotD'];
if($treatmentThreePlotD==0){
$treatmentThreePlotD='';    
}
$treatmentFourPlotD=$rowDetails['treatmentFourPlotD'];
if($treatmentFourPlotD==0){
$treatmentFourPlotD='';    
}
$treatmentFivePlotD=$rowDetails['treatmentFivePlotD'];
if($treatmentFivePlotD==0){
$treatmentFivePlotD='';    
}
$treatmentSixPlotD=$rowDetails['treatmentSixPlotD'];
if($treatmentSixPlotD==0){
$treatmentSixPlotD='';    
}
$treatmentSevenPlotD=$rowDetails['treatmentSevenPlotD'];
if($treatmentSevenPlotD==0){
$treatmentSevenPlotD='';    
}



$plantingDatePlotD=$rowDetails['plantingDatePlotD'];
if($plantingDatePlotD=='1930-01-01'){
$plantingDatePlotD='';    
}


$firstWeedingDatePlotD=$rowDetails['firstWeedingDatePlotD'];
if($firstWeedingDatePlotD=='1930-01-01'){
$firstWeedingDatePlotD='';    
}

$secondWeedingDatePlotD=$rowDetails['secondWeedingDatePlotD'];
if($secondWeedingDatePlotD=='1930-01-01'){
$secondWeedingDatePlotD='';    
}

$firstFertilizerDatePlotD=$rowDetails['firstFertilizerDatePlotD'];
if($firstFertilizerDatePlotD=='1930-01-01'){
$firstFertilizerDatePlotD='';    
}

$secondFertilizerDatePlotD=$rowDetails['secondFertilizerDatePlotD'];
if($secondFertilizerDatePlotD=='1930-01-01'){
$secondFertilizerDatePlotD='';    
}

$pesticideDatePlotD=$rowDetails['pesticideDatePlotD'];
if($pesticideDatePlotD=='1930-01-01'){
$pesticideDatePlotD='';    
}

$harvestDatePlotD=$rowDetails['harvestDatePlotD'];
if($harvestDatePlotD=='1930-01-01'){
$harvestDatePlotD='';    
}


$yieldPlotD=$rowDetails['yieldPlotD'];
if($yieldPlotD=='1930-01-01'){
$yieldPlotD='';    
}

$reportonDemoPlotD=$rowDetails['reportonDemoPlotD'];
$numFemalePlotD=$rowDetails['numFemalePlotD'];
if($numFemalePlotD==0){
$numFemalePlotD='';    
}

$numMalePlotD=$rowDetails['numMalePlotD'];
if($numMalePlotD==0){
$numMalePlotD='';    
}

$numTotalPlotD=$rowDetails['numTotalPlotD'];
if($numTotalPlotD==0){
$numTotalPlotD='';    
}


//===============================================================
//===============End of Values for plot D===============================
//===============================================================

         
         
         //Pick out records on the previous entry
         
           $data.="<tr class='white1'><td>A</td>
             <td><input value='".$sizePlotA."' name='sizePlotA' id='sizePlotA' style='width:50px;' type='text'></td>
             <td><input value='".$treatmentOnePlotA."' name='treatmentOnePlotA' id='treatmentOnePlotA' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentTwoPlotA."' name='treatmentTwoPlotA' id='treatmentTwoPlotA' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentThreePlotA."' name='treatmentThreePlotA' id='treatmentThreePlotA' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentFourPlotA."' name='treatmentFourPlotA' id='treatmentFourPlotA' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentFivePlotA."' name='treatmentFivePlotA' id='treatmentFivePlotA' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentSixPlotA."' name='treatmentSixPlotA' id='treatmentSixPlotA' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentSevenPlotA."' name='treatmentSevenPlotA' id='treatmentSevenPlotA' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.plantingDatePlotA);return false;\" hidefocus=''>
                     <input name='plantingDatePlotA' size='20'  id='plantingDatePlotA' value='".$plantingDatePlotA."' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'></a></td>
 
             <td>
                 <p><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstWeedingDatePlotA);return false;\" hidefocus=''>
                   1<sup>st</sup> Weeding<input name='firstWeedingDatePlotA' size='20' value='".$firstWeedingDatePlotA."' id='firstWeedingDatePlotA' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a></p>
                 <p>                    <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondWeedingDatePlotA);return false;\" hidefocus=''>
                   2<sup>nd</sup> Weeding<input name='secondWeedingDatePlotA' size='20' value='".$secondWeedingDatePlotA."' id='secondWeedingDatePlotA' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a> </p></td>
 
             <td>
                 <p><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstFertilizerDatePlotA);return false;\" hidefocus=''>
                   Fertilizer-1<input name='firstFertilizerDatePlotA' size='20' value='".$firstFertilizerDatePlotA."' id='firstFertilizerDatePlotA' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'></a></p>
                 <p>                    <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondFertilizerDatePlotA);return false;\" hidefocus=''>
                   Fertilizer-2<input name='secondFertilizerDatePlotA' size='20' value='".$secondFertilizerDatePlotA."' id='secondFertilizerDatePlotA' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a> </p></td>
 
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.pesticideDatePlotA);return false;\" hidefocus=''>
                     <input name='pesticideDatePlotA' size='20' value='".$pesticideDatePlotA."' id='pesticideDatePlotA' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a>            </td>
 
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.harvestDatePlotA);return false;\" hidefocus=''>
                     <input name='harvestDatePlotA' size='20' value='".$harvestDatePlotA."' id='harvestDatePlotA' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a>          </td>
           <td><input name='yieldPlotA' id='yieldPlotA' value='".$yieldPlotA."' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
             <td><textarea name='reportonDemoPlotA' id='reportonDemoPlotA' cols='25' rows='5'>".$reportonDemoPlotA."</textarea></td>
             <td><input name='numFemalePlotA' value='".$numFemalePlotA."' id='numFemalePlotA' onkeyup=\"xajax_calc_form8(getElementById('numFemalePlotA').value,
                                                                                                                             getElementById('numMalePlotA').value,
                                                                                                                             'numTotalPlotA');return false;\" style='width:30px;' type='text'></td>
             <td><input name='numMalePlotA' value='".$numMalePlotA."' id='numMalePlotA' onkeyup=\"xajax_calc_form8(getElementById('numFemalePlotA').value,
                                                                                                                             getElementById('numMalePlotA').value,
                                                                                                                             'numTotalPlotA');return false;\" style='width:30px;' type='text'></td>
 
             <td><input class='disabled' readonly='readonly' name='numTotalPlotA' value='".$numTotalPlotA."' id='numTotalPlotA' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
         </tr>";
         
         //Start of plot B
         
     
         
         $data.="<tr class='white1'><td>B</td>
             <td><input value='".$sizePlotB."' name='sizePlotB' id='sizePlotB' style='width:50px;' type='text'></td>
             <td><input value='".$treatmentOnePlotB."' name='treatmentOnePlotB' id='treatmentOnePlotB' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentTwoPlotB."' name='treatmentTwoPlotB' id='treatmentTwoPlotB' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentThreePlotB."' name='treatmentThreePlotB' id='treatmentThreePlotB' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentFourPlotB."' name='treatmentFourPlotB' id='treatmentFourPlotB' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentFivePlotB."' name='treatmentFivePlotB' id='treatmentFivePlotB' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentSixPlotB."' name='treatmentSixPlotB' id='treatmentSixPlotB' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentSevenPlotB."' name='treatmentSevenPlotB' id='treatmentSevenPlotB' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.plantingDatePlotB);return false;\" hidefocus=''>
                     <input name='plantingDatePlotB' size='20'  id='plantingDatePlotB' value='".$plantingDatePlotB."' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'></a></td>
 
             <td>
                 <p><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstWeedingDatePlotB);return false;\" hidefocus=''>
                   1<sup>st</sup> Weeding<input name='firstWeedingDatePlotB' size='20' value='".$firstWeedingDatePlotB."' id='firstWeedingDatePlotB' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a></p>
                 <p>                    <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondWeedingDatePlotB);return false;\" hidefocus=''>
                   2<sup>nd</sup> Weeding<input name='secondWeedingDatePlotB' size='20' value='".$secondWeedingDatePlotB."' id='secondWeedingDatePlotB' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a> </p></td>
 
             <td>
                 <p><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstFertilizerDatePlotB);return false;\" hidefocus=''>
                   Fertilizer-1<input name='firstFertilizerDatePlotB' size='20' value='".$firstFertilizerDatePlotB."' id='firstFertilizerDatePlotB' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'></a></p>
                 <p>                    <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondFertilizerDatePlotB);return false;\" hidefocus=''>
                   Fertilizer-2<input name='secondFertilizerDatePlotB' size='20' value='".$secondFertilizerDatePlotB."' id='secondFertilizerDatePlotB' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a> </p></td>
 
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.pesticideDatePlotB);return false;\" hidefocus=''>
                     <input name='pesticideDatePlotB' size='20' value='".$pesticideDatePlotB."' id='pesticideDatePlotB' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a>            </td>
 
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.harvestDatePlotB);return false;\" hidefocus=''>
                     <input name='harvestDatePlotB' size='20' value='".$harvestDatePlotB."' id='harvestDatePlotB' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a>          </td>
           <td><input name='yieldPlotB' id='yieldPlotB' value='".$yieldPlotB."' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
             <td><textarea name='reportonDemoPlotB' id='reportonDemoPlotB' cols='25' rows='5'>".$reportonDemoPlotB."</textarea></td>
             <td><input name='numFemalePlotB' value='".$numFemalePlotB."' id='numFemalePlotB' onkeyup=\"xajax_calc_form8(getElementById('numFemalePlotB').value,
                                                                                                                             getElementById('numMalePlotB').value,
                                                                                                                             'numTotalPlotB');return false;\" style='width:30px;' type='text'></td>
             <td><input name='numMalePlotB' value='".$numMalePlotB."' id='numMalePlotB' onkeyup=\"xajax_calc_form8(getElementById('numFemalePlotB').value,
                                                                                                                             getElementById('numMalePlotB').value,
                                                                                                                             'numTotalPlotB');return false;\" style='width:30px;' type='text'></td>
 
             <td><input class='disabled' readonly='readonly' name='numTotalPlotB' value='".$numTotalPlotB."' id='numTotalPlotB' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
         </tr>";
           
           //End of plot B
           //Start of plot C
           
           $data.="<tr class='white1'><td>C</td>
             <td><input value='".$sizePlotC."' name='sizePlotC' id='sizePlotC' style='width:50px;' type='text'></td>
             <td><input value='".$treatmentOnePlotC."' name='treatmentOnePlotC' id='treatmentOnePlotC' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentTwoPlotC."' name='treatmentTwoPlotC' id='treatmentTwoPlotC' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentThreePlotC."' name='treatmentThreePlotC' id='treatmentThreePlotC' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentFourPlotC."' name='treatmentFourPlotC' id='treatmentFourPlotC' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentFivePlotC."' name='treatmentFivePlotC' id='treatmentFivePlotC' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentSixPlotC."' name='treatmentSixPlotC' id='treatmentSixPlotC' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentSevenPlotC."' name='treatmentSevenPlotC' id='treatmentSevenPlotC' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.plantingDatePlotC);return false;\" hidefocus=''>
                     <input name='plantingDatePlotC' size='20'  id='plantingDatePlotC' value='".$plantingDatePlotC."' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'></a></td>
 
             <td>
                 <p><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstWeedingDatePlotC);return false;\" hidefocus=''>
                   1<sup>st</sup> Weeding<input name='firstWeedingDatePlotC' size='20' value='".$firstWeedingDatePlotC."' id='firstWeedingDatePlotC' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a></p>
                 <p>                    <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondWeedingDatePlotC);return false;\" hidefocus=''>
                   2<sup>nd</sup> Weeding<input name='secondWeedingDatePlotC' size='20' value='".$secondWeedingDatePlotC."' id='secondWeedingDatePlotC' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a> </p></td>
 
             <td>
                 <p><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstFertilizerDatePlotC);return false;\" hidefocus=''>
                   Fertilizer-1<input name='firstFertilizerDatePlotC' size='20' value='".$firstFertilizerDatePlotC."' id='firstFertilizerDatePlotC' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'></a></p>
                 <p>                    <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondFertilizerDatePlotC);return false;\" hidefocus=''>
                   Fertilizer-2<input name='secondFertilizerDatePlotC' size='20' value='".$secondFertilizerDatePlotC."' id='secondFertilizerDatePlotC' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a> </p></td>
 
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.pesticideDatePlotC);return false;\" hidefocus=''>
                     <input name='pesticideDatePlotC' size='20' value='".$pesticideDatePlotC."' id='pesticideDatePlotC' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a>            </td>
 
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.harvestDatePlotC);return false;\" hidefocus=''>
                     <input name='harvestDatePlotC' size='20' value='".$harvestDatePlotC."' id='harvestDatePlotC' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a>          </td>
           <td><input name='yieldPlotC' id='yieldPlotC' value='".$yieldPlotC."' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
             <td><textarea name='reportonDemoPlotC' id='reportonDemoPlotC' cols='25' rows='5'>".$reportonDemoPlotC."</textarea></td>
             <td><input name='numFemalePlotC' value='".$numFemalePlotC."' id='numFemalePlotC' onkeyup=\"xajax_calc_form8(getElementById('numFemalePlotC').value,
                                                                                                                             getElementById('numMalePlotC').value,
                                                                                                                             'numTotalPlotC');return false;\" style='width:30px;' type='text'></td>
             <td><input name='numMalePlotC' value='".$numMalePlotC."' id='numMalePlotC' onkeyup=\"xajax_calc_form8(getElementById('numFemalePlotC').value,
                                                                                                                             getElementById('numMalePlotC').value,
                                                                                                                             'numTotalPlotC');return false;\" style='width:30px;' type='text'></td>
 
             <td><input class='disabled' readonly='readonly' name='numTotalPlotC' value='".$numTotalPlotC."' id='numTotalPlotA' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
         </tr>";
           //End of plot C
           //Start of plot D
           
           $data.="<tr class='white1'><td>D</td>
             <td><input value='".$sizePlotD."' name='sizePlotD' id='sizePlotD' style='width:50px;' type='text'></td>
             <td><input value='".$treatmentOnePlotD."' name='treatmentOnePlotD' id='treatmentOnePlotD' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentTwoPlotD."' name='treatmentTwoPlotD' id='treatmentTwoPlotD' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentThreePlotD."' name='treatmentThreePlotD' id='treatmentThreePlotD' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentFourPlotD."' name='treatmentFourPlotD' id='treatmentFourPlotD' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentFivePlotD."' name='treatmentFivePlotD' id='treatmentFivePlotD' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentSixPlotD."' name='treatmentSixPlotD' id='treatmentSixPlotD' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td><input value='".$treatmentSevenPlotD."' name='treatmentSevenPlotD' id='treatmentSevenPlotD' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' maxlength='2' type='text'></td>
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.plantingDatePlotD);return false;\" hidefocus=''>
                     <input name='plantingDatePlotD' size='20'  id='plantingDatePlotD' value='".$plantingDatePlotD."' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'></a></td>
 
             <td>
                 <p><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstWeedingDatePlotD);return false;\" hidefocus=''>
                   1<sup>st</sup> Weeding<input name='firstWeedingDatePlotD' size='20' value='".$firstWeedingDatePlotD."' id='firstWeedingDatePlotD' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a></p>
                 <p>                    <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondWeedingDatePlotD);return false;\" hidefocus=''>
                   2<sup>nd</sup> Weeding<input name='secondWeedingDatePlotD' size='20' value='".$secondWeedingDatePlotD."' id='secondWeedingDatePlotD' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a> </p></td>
 
             <td>
                 <p><a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.firstFertilizerDatePlotD);return false;\" hidefocus=''>
                   Fertilizer-1<input name='firstFertilizerDatePlotD' size='20' value='".$firstFertilizerDatePlotD."' id='firstFertilizerDatePlotD' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'></a></p>
                 <p>                    <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.secondFertilizerDatePlotD);return false;\" hidefocus=''>
                   Fertilizer-2<input name='secondFertilizerDatePlotD' size='20' value='".$secondFertilizerDatePlotD."' id='secondFertilizerDatePlotD' readonly='readonly' style='width:60px;' type='text'>
                   <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a> </p></td>
 
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.pesticideDatePlotD);return false;\" hidefocus=''>
                     <input name='pesticideDatePlotD' size='20' value='".$pesticideDatePlotD."' id='pesticideDatePlotD' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a>            </td>
 
             <td>
                 <a href=\"javascript:void(0)\" onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form8.harvestDatePlotD);return false;\" hidefocus=''>
                     <input name='harvestDatePlotD' size='20' value='".$harvestDatePlotD."' id='harvestDatePlotD' readonly='readonly' style='width:60px;' type='text'>
                     <img name='popcal' src='WeekPicker/calbtn.gif' alt='' border='0' align='absmiddle' height='22' width='30px'>                </a>          </td>
           <td><input name='yieldPlotD' id='yieldPlotD' value='".$yieldPlotD."' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
             <td><textarea name='reportonDemoPlotD' id='reportonDemoPlotD' cols='25' rows='5'>".$reportonDemoPlotD."</textarea></td>
             <td><input name='numFemalePlotD' value='".$numFemalePlotD."' id='numFemalePlotD' onkeyup=\"xajax_calc_form8(getElementById('numFemalePlotD').value,
                                                                                                                             getElementById('numMalePlotD').value,
                                                                                                                             'numTotalPlotD');return false;\" style='width:30px;' type='text'></td>
             <td><input name='numMalePlotD' value='".$numMalePlotD."' id='numMalePlotD' onkeyup=\"xajax_calc_form8(getElementById('numFemalePlotD').value,
                                                                                                                             getElementById('numMalePlotD').value,
                                                                                                                             'numTotalPlotD');return false;\" style='width:30px;' type='text'></td>
 
             <td><input class='disabled' readonly='readonly' name='numTotalPlotD' value='".$numTotalPlotD."' id='numTotalPlotD' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
         </tr></table>
 ";
 
  }
 //End of  form to be modified
 
                           }          
                                                 
     
   $n++;
  }
  
  
  
 $data.="<tr>
 <td rowspan='4'>";
 $data.="<table width='100%'>
 <tr class='evenrow'>
     <td colspan=22>
         <div align='right'>
                 <input type='button'  id='button' name='save' id='save' value='Save' onclick=\"xajax_update_form8(xajax.getFormValues('form8')); return false;\" />
         </div>
     </td>
 </tr>
 </table>";
 
 $data.="</td>
 </tr>";
  
                                       
               $data.="</table>";
 
 
  
 $data.="</table></form>";  
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 
 function update_form8($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 
 
 $demoId= $formValues['demoId'];
 //$obj->alert($demoId);
 for($k=0;$k<count($formValues['loopkeyf']);$k++){
 
 $hostFarmer=$formValues['hostFarmer'][$k];
 $numVisit=$formValues['numVisit'][$k];
 $stmnt="UPDATE `tbl_demo_records_book` d SET
 d.`nameHostFarmer`='".$hostFarmer."',
 d.`numofVisits`='".$numVisit."',
 `updatedby`='".$_SESSION['username']."'
 WHERE d.`demoId`='".$demoId."'";
 //$obj->alert($stmnt);
 @mysql_query($stmnt) OR die(QueryManager::http("Update demo book-536"));
 //@mysql_query($stmnt) OR die(mysql_error()."Update demo book-536");
 
 }
 //
 //
 //
 //free values tbl_details
 
//===============================================================
//===============Values for plot A===============================
//===============================================================


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
//===============================================================
//===============Values for plot B===============================
//===============================================================

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

//===============================================================
//===============Values for plot C===============================
//===============================================================

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

//===============================================================
//===============Values for plot D===============================
//===============================================================

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

//===============================================================
//===============End of Values for plot D========================
//===============================================================

 
 
 
 
 
 // // validate only up to 18  treatment types
  //Plot A
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
 // 
 // //Plot B
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
 //
 // //Plot C
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
 // 
 // //Plot D
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
  
  $stm2="UPDATE `tbl_demo_book_details` SET
  `sizePlotA`='".$sizePlotA."', `treatmentOnePlotA`= '".$treatmentOnePlotA."',  `treatmentTwoPlotA`='".$treatmentTwoPlotA."',
  `treatmentThreePlotA`='".$treatmentThreePlotA."',  `treatmentFourPlotA`='".$treatmentFourPlotA."',  `treatmentFivePlotA`='".$treatmentFivePlotA."',
  `treatmentSixPlotA`='".$treatmentSixPlotA."', `treatmentSevenPlotA`= '".$treatmentSevenPlotA."',  `plantingDatePlotA`='".$plantingDatePlotA."',
  `firstWeedingDatePlotA`='".$firstWeedingDatePlotA."', `secondWeedingDatePlotA`='".$secondWeedingDatePlotA."',  `firstFertilizerDatePlotA`='".$firstFertilizerDatePlotA."',
  `secondFertilizerDatePlotA`='".$secondFertilizerDatePlotA."',  `pesticideDatePlotA`='".$pesticideDatePlotA."',  `harvestDatePlotA`='".$harvestDatePlotA."',
  `yieldPlotA`='".$yieldPlotA."',  `reportonDemoPlotA`='".$reportonDemoPlotA."',  `numFemalePlotA`='".$numFemalePlotA."',
  `numMalePlotA`='".$numMalePlotA."',  `numTotalPlotA`='".$numTotalPlotA."',
  
  `sizePlotB`='".$sizePlotB."', `treatmentOnePlotB`= '".$treatmentOnePlotB."',  `treatmentTwoPlotB`='".$treatmentTwoPlotB."',
  `treatmentThreePlotB`='".$treatmentThreePlotB."',  `treatmentFourPlotB`='".$treatmentFourPlotB."',  `treatmentFivePlotB`='".$treatmentFivePlotB."',
  `treatmentSixPlotB`='".$treatmentSixPlotB."', `treatmentSevenPlotB`= '".$treatmentSevenPlotB."',  `plantingDatePlotB`='".$plantingDatePlotB."',
  `firstWeedingDatePlotB`='".$firstWeedingDatePlotB."', `secondWeedingDatePlotB`='".$secondWeedingDatePlotB."',  `firstFertilizerDatePlotB`='".$firstFertilizerDatePlotB."',
  `secondFertilizerDatePlotB`='".$secondFertilizerDatePlotB."',  `pesticideDatePlotB`='".$pesticideDatePlotB."',  `harvestDatePlotB`='".$harvestDatePlotB."',
  `yieldPlotB`='".$yieldPlotB."',  `reportonDemoPlotB`='".$reportonDemoPlotB."',  `numFemalePlotB`='".$numFemalePlotB."',
  `numMalePlotB`='".$numMalePlotB."',  `numTotalPlotB`='".$numTotalPlotB."',
  
  `sizePlotC`='".$sizePlotC."', `treatmentOnePlotC`= '".$treatmentOnePlotC."',  `treatmentTwoPlotC`='".$treatmentTwoPlotC."',
  `treatmentThreePlotC`='".$treatmentThreePlotC."',  `treatmentFourPlotC`='".$treatmentFourPlotC."',  `treatmentFivePlotC`='".$treatmentFivePlotC."',
  `treatmentSixPlotC`='".$treatmentSixPlotC."', `treatmentSevenPlotC`= '".$treatmentSevenPlotC."',  `plantingDatePlotC`='".$plantingDatePlotC."',
  `firstWeedingDatePlotC`='".$firstWeedingDatePlotC."', `secondWeedingDatePlotC`='".$secondWeedingDatePlotC."',  `firstFertilizerDatePlotC`='".$firstFertilizerDatePlotC."',
  `secondFertilizerDatePlotC`='".$secondFertilizerDatePlotC."',  `pesticideDatePlotC`='".$pesticideDatePlotC."',  `harvestDatePlotC`='".$harvestDatePlotC."',
  `yieldPlotC`='".$yieldPlotC."',  `reportonDemoPlotC`='".$reportonDemoPlotC."',  `numFemalePlotC`='".$numFemalePlotC."',
  `numMalePlotC`='".$numMalePlotC."',  `numTotalPlotC`='".$numTotalPlotC."',
  
  `sizePlotD`='".$sizePlotD."', `treatmentOnePlotD`= '".$treatmentOnePlotD."',  `treatmentTwoPlotD`='".$treatmentTwoPlotD."',
  `treatmentThreePlotD`='".$treatmentThreePlotD."',  `treatmentFourPlotD`='".$treatmentFourPlotD."',  `treatmentFivePlotD`='".$treatmentFivePlotD."',
  `treatmentSixPlotD`='".$treatmentSixPlotD."', `treatmentSevenPlotD`= '".$treatmentSevenPlotD."',  `plantingDatePlotD`='".$plantingDatePlotD."',
  `firstWeedingDatePlotD`='".$firstWeedingDatePlotD."', `secondWeedingDatePlotD`='".$secondWeedingDatePlotD."',  `firstFertilizerDatePlotD`='".$firstFertilizerDatePlotD."',
  `secondFertilizerDatePlotD`='".$secondFertilizerDatePlotD."',  `pesticideDatePlotD`='".$pesticideDatePlotD."',  `harvestDatePlotD`='".$harvestDatePlotD."',
  `yieldPlotD`='".$yieldPlotD."',  `reportonDemoPlotD`='".$reportonDemoPlotD."',  `numFemalePlotD`='".$numFemalePlotD."',
  `numMalePlotD`='".$numMalePlotD."',  `numTotalPlotD`='".$numTotalPlotD."',`updatedby`='".$user."'
  
  WHERE `demoId`='".$demoId."'";   
     
 //$obj->alert($stm2);
 ////@mysql_query($stm2)or die("CPM Error-code 1064 because ".mysql_error());
 @mysql_query($stm2) or die(QueryManager::http("edit.php-729"));
 //@mysql_query($stm2) OR die(mysql_error()."edit.php-729");
 }
                 
                 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Demo Record  book has been Updated!"));
 $obj->call("xajax_view_form8",'','','','');
 return $obj;
 }

 function edit_form6($regionCode,$districtCode,$subcountyCode,$parishCode,$householdId){
 $obj=new xajaxResponse();
 $QueryManager=new QueryManager('');
 
 
 
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 
 //$obj->alert($regionCode);
 
 $n=1;
 $inc=1;
 $data="<form action=\"".$PHP_SELF."\" name='partnerships' id='partnerships' method='post'>";
$data.="<table width='100%' cellspacing='0' id='report'>";


$data.="<tr class='evenrow'>
            <th colspan='22'><strong><center>HOUSEHOLD DATA COLLECTION FORM</center></strong></th>
            </tr>";
            
            $data.="<tr class='evenrow'>
            <th colspan='22'><strong>1.HOUSEHOLD IDENTITY</strong></th>
            </tr>";
            
            
            $data.="<tr class='evenrow3'>
                <td colspan='22'>";
                $data.="<table cellpadding='0' cellspacing='2' border='0' width='100%'>
                        
						<tr><td>1.</td><td>Date of Interview (Dd/Mm/YYYY):</td><td> _____________________________________________</td>
						<tr><td>2.	Name of Respondent: ______________________________
						<tr>7.	Which of the following crops have you grown from October 1st 2014 – March 30th 2015:
						Maize___	
						Beans  __
						Coffee __	

                           
                        </table>";
            $data.="</td>
        </tr>";



$data.="<tr class='evenrow'><th colspan='22'><strong>2. HOUSEHOLD PRODUCTION DATA</strong></th></tr>";

$data.="<tr class='evenrow3'>
        <td colspan='22'>
                      <table border='0' cellspacing='2' cellpadding='0' align='left' width='100%'>
                        <tr class='evenrow'>
                          <th rowspan='2'><strong>#</strong></th>
                          <th rowspan='2'><strong>Name of member</strong></th>
                          <th rowspan='2'><p align='center'><strong>Sex</strong></th>
                          <th rowspan='2'><p align='center'><strong>Age</strong><strong> </strong></th>
                          <th colspan='5'><p align='center'><strong>Maize</strong></th>
                          <th colspan='5'><p align='center'><strong>Beans</strong><strong> </strong></th>
                          <th colspan='5'><p align='center'><strong>Coffee</strong></th>
                          <th rowspan='2'><p align='center'>Total Loan Accessed</th>
                        </tr>
                        <tr class='evenrow'>
                          <th><p align='center'>Area(acres)</th>
                          <th><p align='center'>Value of Inputs (UGX)</th>
                          <th><p align='center'>Total Yield (Kg)</th>
                          <th><p align='center'>Volume Sold<br>(Kg)</th>
                          <th><p align='center'>Volume lost in PH<br>(Kg)</th>
                          <th><p align='center'>Area (acres)</th>
                          <th><p align='center'>Value of Inputs (UGX)</th>
                          <th><p align='center'>Total Yield (Kg)</th>
                          <th><p align='center'>Volume Sold<br>(Kg)</th>
                          <th><p align='center'>Volume lost in PH (Kg)</th>
                          <th><p align='center'>Area (acres)</th>
                          <th><p align='center'>Value of Inputs (UGX)</th>
                          <th><p align='center'>Total Yield (Kg)</th>
                          <th><p align='center'>Volume Sold</th>
                          <th><p align='center'>Volume lost in<br>PH<br>(Kg)</th>
                        </tr>";
                    
                        $num=5;
                        for($v=1; $v<=$num; $v++){
                        $data.="<tr class='evenrow'>
                          <td>".$v."</td>";
                          $data.="<input type='hidden' name='loopkey[]' id='loopkey' value='1'/>";
                          $data.="<td valign='top'><input type='text' name='hsNameMember[]' id='hsNameMember".$v."'/></td>
                          <td valign='top'><select name='hsSexMember[]' id ='hsSexMember".$v."' size='1' style='width:75px;'>
                              <option value=''>-select-</option>";
                              $data.="<option value='M'>Male</option>";
                              $data.="<option value='F'>Female</option>";
                              $data.="</select></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsAgeMember[]' id='hsAgeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsAreaMaizeMember[]' id='hsAreaMaizeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsValueInputsMaizeMember[]' id='hsValueInputsMaizeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsTotalYieldMaizeMember[]' id='hsTotalYieldMaizeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeSoldMaizeMember[]' id='hsVolumeSoldMaizeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeLostMaizeMember[]' id='hsVolumeLostMaizeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsAreaBeansMember[]' id='hsAreaBeansMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsValueInputsBeansMember[]' id='hsValueInputsBeansMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsTotalYieldBeansMember[]' id='hsTotalYieldBeansMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeSoldBeansMember[]' id='hsVolumeSoldBeansMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeLostBeansMember[]' id='hsVolumeLostBeansMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsAreaCoffeeMember[]' id='hsAreaCoffeeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsValueInputsCoffeeMember[]' id='hsValueInputsCoffeeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsTotalYieldCoffeeMember[]' id='hsTotalYieldCoffeeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeSoldCoffeeMember[]' id='hsVolumeSoldCoffeeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeLostCoffeeMember[]' id='hsVolumeLostCoffeeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsTotLoanAccessedMember[]' id='hsTotLoanAccessedMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                        </tr>";
                        
                        }//-------------------End of loop for number of records to be displayed at data entry--------------------
                        
                $data.="</table>";
        $data.="</td>";
    $data.="</tr>";
    
    
    

//========table1 start==========
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='1' cellpadding='1'>";

$data.="

<table border='0' cellspacing='1' cellpadding='1' width='100%'>
  <tr class='evenrow'>
    <th colspan='6' rowspan='2' valign='top'><em><br clear='all' />
      </em>
        <strong>Household Summary Data on Production, Adoption,    Savings, Credit
           
          Access and&nbsp; Inputs </strong></th>
    <th  colspan='6' valign='top'><p align='center'><strong>Maize</strong></th>
    <th  colspan='8' valign='top'><p align='center'><strong>Beans </strong></th>
    <th  colspan='6' valign='top'><p align='center'><strong>Coffee</strong></th>
  </tr>
  <tr class='evenrow'>
    <th  colspan='2'><strong>Total</strong></th>
    <th ><strong>Male</strong></th>
    <th ><strong>Female</strong></th>
    <th  colspan='2'><p align='center'><strong>Youth</strong></th>
    <th  colspan='2'><p align='center'><strong>Total</strong></th>
    <th  colspan='2'><p align='center'><strong>Male</strong></th>
    <th  colspan='2'><p align='center'><strong>Female</strong></th>
    <th  colspan='2'>Youth</th>
    <th >Total</th>
    <th  colspan='3'>Male</th>
    <th >Female</th>
    <th >Youth</th>
  </tr>";
  $data.="<tr class='evenrow'>
    <th  colspan='6'>Average farm gate price    (UGX per kg)</th>
    <td  colspan='6' valign='top'>
    <input type='hidden' name='loopkeyRand' id='loopkeyRand' value=1 />
      <input type='text' value=0 name='maizeTotalFGPrice' id='maizeTotalFGPrice' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='8' valign='top'>
        <input type='text' value=0 name='beansTotalFGPrice' id='beansTotalFGPrice' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    &nbsp;</td>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='coffeeTotalFGPrice' id='coffeeTotalFGPrice' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='6'>Number of members adopting    use of improved seed / Planting materials (S)</th>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsMaizeT' id='improvedSeedMaterialsMaizeT'  onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsMaizeM' id='improvedSeedMaterialsMaizeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsMaizeM').value,
                                                                                                                            getElementById('improvedSeedMaterialsMaizeF').value,
                                                                                                                            'improvedSeedMaterialsMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsMaizeF' id='improvedSeedMaterialsMaizeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsMaizeM').value,
                                                                                                                            getElementById('improvedSeedMaterialsMaizeF').value,
                                                                                                                            'improvedSeedMaterialsMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsMaizeY' id='improvedSeedMaterialsMaizeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsBeansT' id='improvedSeedMaterialsBeansT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsBeansM' id='improvedSeedMaterialsBeansM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsBeansM').value,
                                                                                                                            getElementById('improvedSeedMaterialsBeansF').value,
                                                                                                                            'improvedSeedMaterialsBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsBeansF' id='improvedSeedMaterialsBeansF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsBeansM').value,
                                                                                                                            getElementById('improvedSeedMaterialsBeansF').value,
                                                                                                                            'improvedSeedMaterialsBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsBeansY' id='improvedSeedMaterialsBeansY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsCoffeeT' id='improvedSeedMaterialsCoffeeT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='3' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsCoffeeM' id='improvedSeedMaterialsCoffeeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsCoffeeM').value,
                                                                                                                            getElementById('improvedSeedMaterialsCoffeeF').value,
                                                                                                                            'improvedSeedMaterialsCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsCoffeeF' id='improvedSeedMaterialsCoffeeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsCoffeeM').value,
                                                                                                                            getElementById('improvedSeedMaterialsCoffeeF').value,
                                                                                                                            'improvedSeedMaterialsCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsCoffeeY' id='improvedSeedMaterialsCoffeeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='6'>Acreage under improved    seed/ Planting materials: (S).</th>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageImprovedSeedMaize' id='acreageImprovedSeedMaize' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='8' valign='top'>
      <input type='text' value=0 name='acreageImprovedSeedBeans' id='acreageImprovedSeedBeans' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageImprovedSeedCoffee' id='acreageImprovedSeedCoffee' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
  </tr>
  
  
  <tr class='evenrow'>
    <th  colspan='6'>&nbsp; Number of    members adopting use of Fertilizers (F) </th>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersMaizeT' id='useFertilizersMaizeT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useFertilizersMaizeM' id='useFertilizersMaizeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersMaizeM').value,
                                                                                                                            getElementById('useFertilizersMaizeF').value,
                                                                                                                            'useFertilizersMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useFertilizersMaizeF' id='useFertilizersMaizeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersMaizeM').value,
                                                                                                                            getElementById('useFertilizersMaizeF').value,
                                                                                                                            'useFertilizersMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersMaizeY' id='useFertilizersMaizeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersBeansT' id='useFertilizersBeansT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;'/>
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersBeansM' id='useFertilizersBeansM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersBeansM').value,
                                                                                                                            getElementById('useFertilizersBeansF').value,
                                                                                                                            'useFertilizersBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersBeansF' id='useFertilizersBeansF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersBeansM').value,
                                                                                                                            getElementById('useFertilizersBeansF').value,
                                                                                                                            'useFertilizersBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersBeansY' id='useFertilizersBeansY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useFertilizersCoffeeT' id='useFertilizersCoffeeT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='3' valign='top'>
      <input type='text' value=0 name='useFertilizersCoffeeM' id='useFertilizersCoffeeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersCoffeeM').value,
                                                                                                                            getElementById('useFertilizersCoffeeF').value,
                                                                                                                            'useFertilizersCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useFertilizersCoffeeF' id='useFertilizersCoffeeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersCoffeeM').value,
                                                                                                                            getElementById('useFertilizersCoffeeF').value,
                                                                                                                            'useFertilizersCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useFertilizersCoffeeY' id='useFertilizersCoffeeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='6'>Acreage under Fertilizers    (F)</th>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageFertilizersMaize' id='acreageFertilizersMaize' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='8' valign='top'>
      <input type='text' value=0 name='acreageFertilizersBeans' id='acreageFertilizersBeans' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageFertilizersCoffee' id='acreageFertilizersCoffee' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='6'>Number of    members adopting use of Chemicals (herbicides/ pesticides)(C)</th>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsMaizeT' id='useChemicalsMaizeT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useChemicalsMaizeM' id='useChemicalsMaizeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsMaizeM').value,
                                                                                                                            getElementById('useChemicalsMaizeF').value,
                                                                                                                            'useChemicalsMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useChemicalsMaizeF' id='useChemicalsMaizeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsMaizeM').value,
                                                                                                                            getElementById('useChemicalsMaizeF').value,
                                                                                                                            'useChemicalsMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsMaizeY' id='useChemicalsMaizeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsBeansT' id='useChemicalsBeansT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsBeansM' id='useChemicalsBeansM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsBeansM').value,
                                                                                                                            getElementById('useChemicalsBeansF').value,
                                                                                                                            'useChemicalsBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsBeansF' id='useChemicalsBeansF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsBeansM').value,
                                                                                                                            getElementById('useChemicalsBeansF').value,
                                                                                                                            'useChemicalsBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsBeansY' id='useChemicalsBeansY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useChemicalsCoffeeT' id='useChemicalsCoffeeT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='3' valign='top'>
      <input type='text' value=0 name='useChemicalsCoffeeM' id='useChemicalsCoffeeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsCoffeeM').value,
                                                                                                                            getElementById('useChemicalsCoffeeF').value,
                                                                                                                            'useChemicalsCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useChemicalsCoffeeF' id='useChemicalsCoffeeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsCoffeeM').value,
                                                                                                                            getElementById('useChemicalsCoffeeF').value,
                                                                                                                            'useChemicalsCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useChemicalsCoffeeY' id='useChemicalsCoffeeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='6'>Acreage under Chemicals    (herbicides or pesticides) (C)</th>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageChemicalsMaize' id='acreageChemicalsMaize' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='8' valign='top'>
      <input type='text' value=0 name='acreageChemicalsBeans' id='acreageChemicalsBeans' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageChemicalsCoffee' id='acreageChemicalsCoffee' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='7'>Number of members purchasing Inputs through each source    (No.) </th>
    <td  colspan='8'>Stockist through VARM:
      <input type='text' value=0 name='purchasingInputThruVARM' id='purchasingInputThruVARM' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='4'>Village Agents:
      <input type='text' value=0 name='purchasingInputThruVillageAgent' id='purchasingInputThruVillageAgent'onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='3'>Stockist:
      <input type='text' value=0 name='purchasingInputThruStockist' id='purchasingInputThruStockist' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='4'>Others:
      <input type='text' value=0 name='purchasingInputThruOthers' id='purchasingInputThruOthers' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th >Benefits from procured inputs (No)</th>
    <td  colspan='2'>
<input name='Good Yields' type='checkbox' id='Good Yields' value='Good Yields' />      
Good Yields:</td>
    <td  colspan='4'>
      <input name='Reduced Costs' type='checkbox' id='Reduced Costs' value='Reduced Costs' />
    Reduced costs:</td>
    <td  colspan='4'>
      <input name='Labour Saving' type='checkbox' id='Labour Saving' value='Labour Saving' />
    Labor-saving:</td>
    <td  colspan='2'>&nbsp;
        <input name='None' type='checkbox' id='None' value='None' />
    None:</td>
    <td  colspan='5'>
    <input name='Better Quality' type='checkbox' id='Better Quality' value='Better Quality' />
    Better quality:</td>
    <td  colspan='5'>&nbsp;
      <input name='Disease Resistance' type='checkbox' id='Disease Resistance' value='Disease Resistance' />
    Disease Resistance:</td>
    <td  colspan='3'>&nbsp;
      <input name='Early maturity' type='checkbox' id='Early maturity' value='Early maturity' /> 
    Early maturity:</td>
  </tr>";
  $data.="<tr class='evenrow'>
    <th  colspan='2' rowspan='6'>Risk reducing practices adopted to mitigate climate change</th>
    <th >#</th>
    <th >Member </th>
    <th >Sex</th>
    <th >Age</th>
    <th  colspan='20' valign='top'><p align='center'>Name risk reducing    practices adopted by each household member: </th>
  </tr>";
  for($i=1; $i<=5; $i++){
  $data.="<tr class='evenrow'>
    <td >".$i."</td>";
    $data.="<input type='hidden' name='loopkey3[]' id='loopkey3' value='1'/>";
    $data.="<td ><input type='text' name='riskReducingPracticesMember[]' id='riskReducingPracticesMember".$i."'  style='width:100px;' /></td>
    <td >
      <select name='riskReducingMitigateClimateChangeSex[]' id='riskReducingMitigateClimateChangeSex".$i."' style='width:75px;'>
        <option>-select-</option>
        <option value='M'>Male</option>
        <option value='F'>Female</option>
      </select>
    </td>
    <td >
      <input type='text' value=0 name='ageMemberRiskReducingPractice[]' id='ageMemberRiskReducingPractice".$i."' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='11'>
      <textarea name='riskReducingPractice1[]' id='ariskReducingPractice1".$i."'  rows='5' cols='50' /></textarea>
    </td>
    <td  colspan='9'><textarea name='riskReducingPractice2[]' id='riskReducingPractice2".$i."'  rows='5' cols='50' /></textarea>
    </td>
  </tr>";
  }
  $data.="</table>

";
$data.="</td>";
$data.="</tr>";
//========table1 end============         

  
  
//========table2 start==========
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='1' cellpadding='1'>";
$data.="<tr class='evenrow'>
    <td colspan='12'>Compiled by:</td><td><input type='text' name='CompiledBy' id='CompiledBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Reviewed by:</td><td><input type='text' name='ReviewedBy' id='ReviewedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Submitted by:</td><td><input type='text' name='SubmittedBy' id='SubmittedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Date of submission:</td>
        <td>
        <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.partnerships.DateSubmission);return false;\" hidefocus=''>
            <input name='DateSubmission' type='text' style='width:200px;'  size='50' value='' id='DateSubmission' readonly='readonly'/>
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
        </a>
        </td>
  </tr>
  <tr class='evenrow'>
    <td colspan='22'>
    <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"loadingIcon(xajax.getFormValues('partnerships'),'save_householdData');return false;\" />
            </div>
    </td>
  </tr>";
$data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
  
$data.="</table>";
$data.="</td>";
$data.="</tr>";
//========table2 end============
        
        
$data.="</table>";
$data.="</form>";
 
 $obj->assign('bodyDisplay','innerHTML',$data);
 return $obj;
 }
 
 function update_form6($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 
  //Submission Details
    // $reportingPeriod=$_SESSION['quarter'];
     $CompiledBy=$formValues['CompiledBy'];
     $ReviewedBy=$formValues['ReviewedBy'];
     $SubmittedBy=$formValues['SubmittedBy'];
     $DateSubmission=$formValues['DateSubmission'];
     $year=date('Y');
     $thisYear=date('Y');
     $nextYear=$thisYear+1;
     $activeQuarter=str_replace("".$thisYear."","","".$_SESSION['quarter']."");
     
     
     //=========================Household head Details==============
     $tbl_householdId=$formValues['householdId'];
     //$obj->alert($tbl_householdId);
     
     $hsHead=$formValues['hsHead'];
     $hsCode=$formValues['hsCode'];
     $hsSex=$formValues['hsSex'];
     $hsStatus=$formValues['hsStatus'];
     $hsComposition=$formValues['hsComposition'];
     $hsVillage=$formValues['hsVillage'];
     
     
     $hsRegion=$formValues['hsRegion'];
     $hsDistrict=$formValues['hsDistrict'];
     $hsSubcounty=$formValues['hsSubcounty'];
     $hsParish=$formValues['hsParish'];
     $hsVillageAgent=$formValues['hsVillageAgent'];
     
     if($hsRegion==''
        OR $hsRegion==NULL
        OR $hsDistrict==''
        OR $hsDistrict==NULL
        OR $hsSubcounty==''
        OR $hsSubcounty==NULL
        OR $hsParish==''
        OR $hsParish==NULL
        OR $hsVillageAgent==''
        OR $hsVillageAgent==NULL
        ){
      $stDefault="SELECT * FROM `tbl_house_hold_details` where `houseHoldId`='".$tbl_householdId."'";
      $query=@Execute($stDefault)or die(http("edit-1749"));
      
      if(!$query){ $obj->alert("CPM MIS could not modify this form 6 record.
                  \n Please make sure all the data to be supplied in the
                  \n 'HOUSEHOLD IDENTITY' section are correct.
                  i.e supply '0' where a number is expected but is unknown");
      return $obj;
     }
      
        $rowDefault=@mysql_fetch_assoc($query);
      
     $hsRegion=$rowDefault['hsRegion'];
     $hsDistrict=$rowDefault['hsDistrict'];
     $hsSubcounty=$rowDefault['hsSubcounty'];
     $hsParish=$rowDefault['hsParish'];
     $hsVillageAgent=$rowDefault['hsVillageAgent'];
     }
     
     $hsTotMembers=$formValues['hsTotMembers'];
     $hsTotMembersFemale=$formValues['hsTotMembersFemale'];
     $hsTotMembersMale=$formValues['hsTotMembersMale'];
     $hsTotMembersYouth=$formValues['hsTotMembersYouth'];
     $hsHouseholdAge=$formValues['hsHouseholdAge'];
     
      $stmnt="update `tbl_house_hold_details` set `hsHead`='".$hsHead."',
                 `hsCode`='".$hsCode."',
                 `hsSex`='".$hsSex."',
                 `hsRegion`='".$hsRegion."',
                 `hsStatus`='".$hsStatus."',
                 `hsDistrict`='".$hsDistrict."', 
                 `hsComposition`='".$hsComposition."',
                 `hsSubcounty`='".$hsSubcounty."',
                 `hsParish`= '".$hsParish."',
                 `hsVillage`='".$hsVillage."',
                 `hsVillageAgent`='".$hsVillageAgent."',
                 `hsTotMembers`='".$hsTotMembers."', 
                 `hsTotMembersFemale`='".$hsTotMembersFemale."',
                 `hsTotMembersMale`='".$hsTotMembersMale."',
                 `hsTotMembersYouth`='".$hsTotMembersYouth."',
                 `hsHouseholdAge`='".$hsHouseholdAge."',
                `CompiledBy`='".$CompiledBy."',
                 `ReviewedBy`='".$ReviewedBy."',
                 `SubmittedBy`='".$SubmittedBy."',
                 `DateSubmission`='".$DateSubmission."'
                where `houseHoldId`='".$tbl_householdId."'";
     
     //$obj->alert($stmnt);
     $qcheckAlpha=@Execute($stmnt) or die(http("Edit-1821"));
     //$qcheckAlpha=@Execute($stmnt)  or die(mysql_error()." on line 1822");
     if(!$qcheckAlpha){ $obj->alert("CPM MIS could not modify this form 6 record.
                  \n Please make sure all the data to be supplied in the
                  \n 'HOUSEHOLD IDENTITY' section are correct.
                  i.e supply '0' where a number is expected but is unknown");
      return $obj;
     }
     
 //========================Household members data==================
 for($x=0;$x<count($formValues['loopkeym']);$x++){
 $tbl_household_membersId=$formValues['tbl_household_membersId'][$x];    
 $hsNameMember=$formValues['hsNameMember'][$x];
 $hsSexMember=$formValues['hsSexMember'][$x];
 $hsAgeMember=$formValues['hsAgeMember'][$x];
 $hsAreaMaizeMember=$formValues['hsAreaMaizeMember'][$x];
 $hsValueInputsMaizeMember=$formValues['hsValueInputsMaizeMember'][$x];
 $hsTotalYieldMaizeMember=$formValues['hsTotalYieldMaizeMember'][$x];
 $hsVolumeSoldMaizeMember=$formValues['hsVolumeSoldMaizeMember'][$x];
 $hsVolumeLostMaizeMember=$formValues['hsVolumeLostMaizeMember'][$x];
 $hsAreaBeansMember=$formValues['hsAreaBeansMember'][$x];
 $hsValueInputsBeansMember=$formValues['hsValueInputsBeansMember'][$x];
 $hsTotalYieldBeansMember=$formValues['hsTotalYieldBeansMember'][$x];
 $hsVolumeSoldBeansMember=$formValues['hsVolumeSoldBeansMember'][$x];
 $hsVolumeLostBeansMember=$formValues['hsVolumeLostBeansMember'][$x];
 $hsAreaCoffeeMember=$formValues['hsAreaCoffeeMember'][$x];
 $hsValueInputsCoffeeMember=$formValues['hsValueInputsCoffeeMember'][$x];
 $hsTotalYieldCoffeeMember=$formValues['hsTotalYieldCoffeeMember'][$x];
 $hsVolumeSoldCoffeeMember=$formValues['hsVolumeSoldCoffeeMember'][$x];
 $hsVolumeLostCoffeeMember=$formValues['hsVolumeLostCoffeeMember'][$x];
 $hsTotLoanAccessedMember=$formValues['hsTotLoanAccessedMember'][$x];
 
 
 
 
 //check for existance of record
  $st_check="SELECT * FROM `tbl_household_members` WHERE `tbl_household_membersId`='".$tbl_household_membersId."'";
  
    $qcheck=@Execute($st_check) or die(http("Edit-1859"));
    //$qcheck=@Execute($st_check) or die(mysql_error()." on line 1860");
     if(!$qcheck){ $obj->alert("CPM MIS could not modify this form 6 record.
                  \n Please make sure all the data to be supplied in the
                  \n 'HOUSEHOLD IDENTITY' section are correct.
                  i.e supply '0' where a number is expected but is unknown");
      return $obj;
     }
     $rowC=mysql_fetch_array($qcheck);
     
 if($rowC<>null){
  //update members table
  $stmnt_two="update `tbl_household_members` set
 `hsNameMember`='".$hsNameMember."',
 `hsSexMember`='".$hsSexMember."',
 `hsAgeMember`='".$hsAgeMember."',  
 `hsAreaMaizeMember`='".$hsAreaMaizeMember."',
 `hsValueInputsMaizeMember`='".$hsValueInputsMaizeMember."',
 `hsTotalYieldMaizeMember`='".$hsTotalYieldMaizeMember."',  
 `hsVolumeSoldMaizeMember`='".$hsVolumeSoldMaizeMember."',
 `hsVolumeLostMaizeMember`='".$hsVolumeLostMaizeMember."',
 `hsAreaBeansMember`='".$hsAreaBeansMember."',  
 `hsValueInputsBeansMember`='".$hsValueInputsBeansMember."',
 `hsTotalYieldBeansMember`='".$hsTotalYieldBeansMember."',
 `hsVolumeSoldBeansMember`='".$hsVolumeSoldBeansMember."',  
 `hsVolumeLostBeansMember`='".$hsVolumeLostBeansMember."',
 `hsAreaCoffeeMember`='".$hsAreaCoffeeMember."',
 `hsValueInputsCoffeeMember`='".$hsValueInputsCoffeeMember."',  
 `hsTotalYieldCoffeeMember`='".$hsTotalYieldCoffeeMember."',
 `hsVolumeSoldCoffeeMember`='".$hsVolumeSoldCoffeeMember."',
 `hsVolumeLostCoffeeMember`='".$hsVolumeLostCoffeeMember."',  
 `hsTotLoanAccessedMember`='".$hsTotLoanAccessedMember."',
 `CompiledBy`='".$CompiledBy."',
 `ReviewedBy`='".$ReviewedBy."',
 `SubmittedBy`='".$SubmittedBy."',
 `DateSubmission`='".$DateSubmission."' where `houseHoldId`='".$tbl_householdId."' and `tbl_household_membersId`='".$tbl_household_membersId."'";
 
   //$obj->alert($stmnt_two);
  $qcheck2=@Execute($stmnt_two) or die(http("edit_forms-1897"));
  //$qcheck2=@Execute($stmnt_two) or die(mysql_error()." on line 1898");
     if(!$qcheck2){ $obj->alert("CPM MIS could not modify this form 6 record.
                  \n Please make sure all the data to be supplied in the
                  \n 'HOUSEHOLD IDENTITY' section are correct.
                  i.e supply '0' where a number is expected but is unknown");
      return $obj;
     }
     
  $v=$tbl_householdId;
  }
  
   elseif($tbl_household_membersId=='' or $tbl_household_membersId==0){
   
   $tbl_householdId=$v;
   //Statement to insert into db
  if($hsNameMember<>'' OR $hsNameMember<>0 OR $hsSexMember='' OR $hsSexMember<>0){
 
 $stmnt_three="INSERT INTO `tbl_household_members` (`houseHoldId`,`year`,
 `hsNameMember`,  `hsSexMember`,  `hsAgeMember`,  
 `hsAreaMaizeMember`,`hsValueInputsMaizeMember`,  `hsTotalYieldMaizeMember`,  
 `hsVolumeSoldMaizeMember`,`hsVolumeLostMaizeMember`,`hsAreaBeansMember`,  
 `hsValueInputsBeansMember`,`hsTotalYieldBeansMember`,`hsVolumeSoldBeansMember`,  
 `hsVolumeLostBeansMember`, `hsAreaCoffeeMember`,`hsValueInputsCoffeeMember`,  
 `hsTotalYieldCoffeeMember`,`hsVolumeSoldCoffeeMember`,`hsVolumeLostCoffeeMember`,  
 `hsTotLoanAccessedMember`,
 `reportingPeriod`,`CompiledBy`,`ReviewedBy`,`SubmittedBy`,`DateSubmission`)VALUES(
 '".$tbl_householdId."','".$year."','".$hsNameMember."','".$hsSexMember."','".$hsAgeMember."',
 '".$hsAreaMaizeMember."','".$hsValueInputsMaizeMember."','".$hsTotalYieldMaizeMember."',
 '".$hsVolumeSoldMaizeMember."','".$hsVolumeLostMaizeMember."','".$hsAreaBeansMember."',
 '".$hsValueInputsBeansMember."','".$hsTotalYieldBeansMember."','".$hsVolumeSoldBeansMember."',
 '".$hsVolumeLostBeansMember."','".$hsAreaCoffeeMember."','".$hsValueInputsCoffeeMember."',
 '".$hsTotalYieldCoffeeMember."','".$hsVolumeSoldCoffeeMember."','".$hsVolumeLostCoffeeMember."',
 '".$hsTotLoanAccessedMember."',
 '".$activeQuarter."','".$CompiledBy."','".$ReviewedBy."','".$SubmittedBy."','".$DateSubmission."')";
   //$obj->alert($stmnt_three);
  $qcheck3=@Execute($stmnt_three) or die(http("edit_forms-1933"));
  //$qcheck3=@Execute($stmnt_three)  or die(mysql_error()." on line 1934");
     if(!$qcheck3){
        $obj->alert("CPM MIS could not modify this form 6 record.
                  \n Please make sure all the data to be supplied in the
                  \n 'HOUSEHOLD IDENTITY' section are correct.
                  i.e supply '0' where a number is expected but is unknown");
      return $obj;
     }
 }
 
   }
 
 }
 
 
 //=====================================Household Summary Data on Production, Adoption, Savings, Credit Access and  Inputs =================
 $maizeTotalFGPrice=$formValues['maizeTotalFGPrice'];
 $beansTotalFGPrice=$formValues['beansTotalFGPrice'];
 $coffeeTotalFGPrice=$formValues['coffeeTotalFGPrice'];
 $improvedSeedMaterialsMaizeT=$formValues['improvedSeedMaterialsMaizeT'];
 $improvedSeedMaterialsMaizeM=$formValues['improvedSeedMaterialsMaizeM'];
 $improvedSeedMaterialsMaizeF=$formValues['improvedSeedMaterialsMaizeF'];
 $improvedSeedMaterialsMaizeY=$formValues['improvedSeedMaterialsMaizeY'];
 $improvedSeedMaterialsBeansT=$formValues['improvedSeedMaterialsBeansT'];
 $improvedSeedMaterialsBeansM=$formValues['improvedSeedMaterialsBeansM'];
 $improvedSeedMaterialsBeansF=$formValues['improvedSeedMaterialsBeansF'];
 $improvedSeedMaterialsBeansY=$formValues['improvedSeedMaterialsBeansY'];
 $improvedSeedMaterialsCoffeeT=$formValues['improvedSeedMaterialsCoffeeT'];
 $improvedSeedMaterialsCoffeeM=$formValues['improvedSeedMaterialsCoffeeM'];
 $improvedSeedMaterialsCoffeeF=$formValues['improvedSeedMaterialsCoffeeF'];
 $improvedSeedMaterialsCoffeeY=$formValues['improvedSeedMaterialsCoffeeY'];
 $acreageImprovedSeedMaize=$formValues['acreageImprovedSeedMaize'];
 $acreageImprovedSeedBeans=$formValues['acreageImprovedSeedBeans'];
 $acreageImprovedSeedCoffee=$formValues['acreageImprovedSeedCoffee'];
 $useFertilizersMaizeT=$formValues['useFertilizersMaizeT'];
 $useFertilizersMaizeM=$formValues['useFertilizersMaizeM'];
 $useFertilizersMaizeF=$formValues['useFertilizersMaizeF'];
 $useFertilizersMaizeY=$formValues['useFertilizersMaizeY'];
 $useFertilizersBeansT=$formValues['useFertilizersBeansT'];
 $useFertilizersBeansM=$formValues['useFertilizersBeansM'];
 $useFertilizersBeansF=$formValues['useFertilizersBeansF'];
 $useFertilizersBeansY=$formValues['useFertilizersBeansY'];
 $useFertilizersCoffeeT=$formValues['useFertilizersCoffeeT'];
 $useFertilizersCoffeeM=$formValues['useFertilizersCoffeeM'];
 $useFertilizersCoffeeF=$formValues['useFertilizersCoffeeF'];
 $useFertilizersCoffeeY=$formValues['useFertilizersCoffeeY'];
 $acreageFertilizersMaize=$formValues['acreageFertilizersMaize'];
 $acreageFertilizersBeans=$formValues['acreageFertilizersBeans'];
 $acreageFertilizersCoffee=$formValues['acreageFertilizersCoffee'];
 $useChemicalsMaizeT=$formValues['useChemicalsMaizeT'];
 $useChemicalsMaizeM=$formValues['useChemicalsMaizeM'];
 $useChemicalsMaizeF=$formValues['useChemicalsMaizeF'];
 $useChemicalsMaizeY=$formValues['useChemicalsMaizeY'];
 $useChemicalsBeansT=$formValues['useChemicalsBeansT'];
 $useChemicalsBeansM=$formValues['useChemicalsBeansM'];
 $useChemicalsBeansF=$formValues['useChemicalsBeansF'];
 $useChemicalsBeansY=$formValues['useChemicalsBeansY'];
 $useChemicalsCoffeeT=$formValues['useChemicalsCoffeeT'];
 $useChemicalsCoffeeM=$formValues['useChemicalsCoffeeM'];
 $useChemicalsCoffeeF=$formValues['useChemicalsCoffeeF'];
 $useChemicalsCoffeeY=$formValues['useChemicalsCoffeeY'];
 $acreageChemicalsMaize=$formValues['acreageChemicalsMaize'];
 $acreageChemicalsBeans=$formValues['acreageChemicalsBeans'];
 $acreageChemicalsCoffee=$formValues['acreageChemicalsCoffee'];
 $purchasingInputThruVARM=$formValues['purchasingInputThruVARM'];
 $purchasingInputThruVillageAgent=$formValues['purchasingInputThruVillageAgent'];
 $purchasingInputThruStockist=$formValues['purchasingInputThruStockist'];
 $purchasingInputThruOthers=$formValues['purchasingInputThruOthers'];
 $goodYields=($formValues['Good Yields']=='Good Yields')?"Yes":"No";
 $reducedCosts=($formValues['Reduced Costs']=='Reduced Costs')?"Yes":"No";
 $labourSaving=($formValues['Labour Saving']=='Labour Saving')?"Yes":"No";
 $none=($formValues['None']=='None')?"Yes":"No";
 $betterQuality=($formValues['Better Quality']=='Better Quality')?"Yes":"No";
 $diseaseResistance=($formValues['Disease Resistance']=='Disease Resistance')?"Yes":"No";
 $earlyMaturity=($formValues['Early maturity']=='Early maturity')?"Yes":"No";
 
 $stmnt_four="update `tbl_household_summary_data` set 
 `maizeTotalFGPrice`='".$maizeTotalFGPrice."',
 `beansTotalFGPrice`='".$beansTotalFGPrice."',
 `coffeeTotalFGPrice`='".$coffeeTotalFGPrice."',
 `improvedSeedMaterialsMaizeT`='".$improvedSeedMaterialsMaizeT."',
 `improvedSeedMaterialsMaizeM`='".$improvedSeedMaterialsMaizeM."',
 `improvedSeedMaterialsMaizeF`='".$improvedSeedMaterialsMaizeF."',
 `improvedSeedMaterialsMaizeY`='".$improvedSeedMaterialsMaizeY."',
 `improvedSeedMaterialsBeansT`='".$improvedSeedMaterialsBeansT."',
 `improvedSeedMaterialsBeansM`='".$improvedSeedMaterialsBeansM."',
 `improvedSeedMaterialsBeansF`='".$improvedSeedMaterialsBeansF."',
 `improvedSeedMaterialsBeansY`='".$improvedSeedMaterialsBeansY."',
 `improvedSeedMaterialsCoffeeT`='".$improvedSeedMaterialsCoffeeT."',
 `improvedSeedMaterialsCoffeeM`='".$improvedSeedMaterialsCoffeeM."',
 `improvedSeedMaterialsCoffeeF`='".$improvedSeedMaterialsCoffeeF."',
 `improvedSeedMaterialsCoffeeY`='".$improvedSeedMaterialsCoffeeY."',
 `acreageImprovedSeedMaize`='".$acreageImprovedSeedMaize."',
 `acreageImprovedSeedBeans`='".$acreageImprovedSeedBeans."',
 `acreageImprovedSeedCoffee`='".$acreageImprovedSeedCoffee."',
 `useFertilizersMaizeT`='".$useFertilizersMaizeT."',
 `useFertilizersMaizeM`='".$useFertilizersMaizeM."',
 `useFertilizersMaizeF`='".$useFertilizersMaizeF."',
 `useFertilizersMaizeY`='".$useFertilizersMaizeY."',
 `useFertilizersBeansT`='".$useFertilizersBeansT."',
 `useFertilizersBeansM`='".$useFertilizersBeansM."',
 `useFertilizersBeansF`='".$useFertilizersBeansF."',
 `useFertilizersBeansY`='".$useFertilizersBeansY."',
 `useFertilizersCoffeeT`='".$useFertilizersCoffeeT."',
 `useFertilizersCoffeeM`='".$useFertilizersCoffeeM."',
 `useFertilizersCoffeeF`='".$useFertilizersCoffeeF."',
 `useFertilizersCoffeeY`='".$useFertilizersCoffeeY."',
 `acreageFertilizersMaize`='".$acreageFertilizersMaize."',
 `acreageFertilizersBeans`='".$acreageFertilizersBeans."',
 `acreageFertilizersCoffee`='".$acreageFertilizersCoffee."',
 `useChemicalsMaizeT`='".$useChemicalsMaizeT."',
 `useChemicalsMaizeM`='".$useChemicalsMaizeM."',
 `useChemicalsMaizeF`='".$useChemicalsMaizeF."',
 `useChemicalsMaizeY`='".$useChemicalsMaizeY."',
 `useChemicalsBeansT`='".$useChemicalsBeansT."',
 `useChemicalsBeansM`='".$useChemicalsBeansM."',
 `useChemicalsBeansF`='".$useChemicalsBeansF."',
 `useChemicalsBeansY`='".$useChemicalsBeansY."',
 `useChemicalsCoffeeT`='".$useChemicalsCoffeeT."',
 `useChemicalsCoffeeM`='".$useChemicalsCoffeeM."',
 `useChemicalsCoffeeF`='".$useChemicalsCoffeeF."',
 `useChemicalsCoffeeY`='".$useChemicalsCoffeeY."',
 `acreageChemicalsMaize`='".$acreageChemicalsMaize."',
 `acreageChemicalsBeans`='".$acreageChemicalsBeans."',
 `acreageChemicalsCoffee`='".$acreageChemicalsCoffee."',
 `purchasingInputThruVARM`='".$purchasingInputThruVARM."',
 `purchasingInputThruVillageAgent`='".$purchasingInputThruVillageAgent."',
 `purchasingInputThruStockist`='".$purchasingInputThruStockist."',
 `purchasingInputThruOthers`='".$purchasingInputThruOthers."',
 `goodYields`='".$goodYields."',
 `reducedCosts`='".$reducedCosts."',
 `labourSaving`='".$labourSaving."',
 `techNone`='".$none."',
 `betterQuality`='".$betterQuality."',
 `diseaseResistance`='".$diseaseResistance."',
 `earlyMaturity`='".$earlyMaturity."',
 `CompiledBy`='".$CompiledBy."',
 `ReviewedBy`='".$ReviewedBy."',
 `SubmittedBy`='".$SubmittedBy."',
 `DateSubmission`='".$DateSubmission."' where `houseHoldId`='".$tbl_householdId."'";
 
 //$obj->alert($stmnt_four);
    $qcheck4=@Execute($stmnt_four) or die(http("edit_forms-2076"));
  //$qcheck4=@Execute($stmnt_four) or die(mysql_error()." on line 2077");
     if(!$qcheck4){
        $obj->alert("CPM MIS could not modify this form 6 record.
                  \n Please make sure all the data to be supplied in the
                  \n 'HOUSEHOLD IDENTITY' section are correct.
                  i.e supply '0' where a number is expected but is unknown");
      return $obj;
     }
 
 
 
 
 
 
 
 //========================loop3 values=============================
 for($k=0;$k<count($formValues['loopkeyr']);$k++){
  
 $tbl_household_risk_reducing_practicesId=$formValues['tbl_household_risk_reducing_practicesId'][$k]; 
 $riskReducingPracticesMember=$formValues['riskReducingPracticesMember'][$k];
 $riskReducingMitigateClimateChangeSex=$formValues['riskReducingMitigateClimateChangeSex'][$k];
 $ageMemberRiskReducingPractice=$formValues['ageMemberRiskReducingPractice'][$k];
 $riskReducingPracticeOne=$formValues['riskReducingPracticeOne'][$k];
 $riskReducingPracticeTwo=$formValues['riskReducingPracticeTwo'][$k];
 
 //check for existance of record
  $st_checkRisk="SELECT * FROM  `tbl_household_risk_reducing_practices` WHERE `tbl_household_risk_reducing_practicesId`='".$tbl_household_risk_reducing_practicesId."'";
  
    $qcheckRisk=@Execute($st_checkRisk) or die(http("Edit-2105"));
    //$qcheckRisk=@Execute($st_checkRisk) or die(mysql_error()." on line 2106");
     $rowCRisk=mysql_fetch_array($qcheckRisk);
     
 if($rowCRisk<>null){
  
  //Update
  
  $stmnt_five="update `tbl_household_risk_reducing_practices` set
 `Member`='".$riskReducingPracticesMember."',
 `Sex`='".$riskReducingMitigateClimateChangeSex."',
 `Age`='".$ageMemberRiskReducingPractice."',
 `riskReducingPractice1`='".$riskReducingPracticeOne."',
 `riskReducingPractice2`='".$riskReducingPracticeTwo."',
 `CompiledBy`='".$CompiledBy."',
 `ReviewedBy`='".$ReviewedBy."',
 `SubmittedBy`='".$SubmittedBy."',
 `DateSubmission`='".$DateSubmission."'
 where `houseHoldId`='".$tbl_householdId."' and `tbl_household_risk_reducing_practicesId`='".$tbl_household_risk_reducing_practicesId."'";
  //$obj->alert($stmnt_five);
 $query=@Execute($stmnt_five) or die(http(2025));
 //$query=@Execute($stmnt_five) or die(mysql_error()." on line 2126");

 }
  
  elseif($tbl_household_risk_reducing_practicesId=='' or $tbl_household_risk_reducing_practicesId==0){
   
  // $tbl_householdId=$lm;
   //Statement to insert into db
  
 if($riskReducingPracticesMember<>'' OR $riskReducingPracticesMember<>0){
  
 $stmnt_Six="INSERT INTO `tbl_household_risk_reducing_practices`(`houseHoldId`,`year`,
 `Member`,`Sex`,
 `Age`,`riskReducingPractice1`,
 `riskReducingPractice2`,
 `reportingPeriod`,`CompiledBy`,`ReviewedBy`,`SubmittedBy`,`DateSubmission`)VALUES(
 '".$tbl_householdId."','".$year."','".$riskReducingPracticesMember."','".$riskReducingMitigateClimateChangeSex."',
 '".$ageMemberRiskReducingPractice."','".$riskReducingPracticeOne."',
 '".$riskReducingPracticeTwo."',
 '".$activeQuarter."','".$CompiledBy."','".$ReviewedBy."','".$SubmittedBy."','".$DateSubmission."')";
 
 //$obj->alert($stmnt_Six);
    @mysql_query($stmnt_Six)or die(http(2148));
    //@mysql_query($stmnt_Six) or die(mysql_error()." on line 2149");
         }
    }
 
 }
 
 //===================End of other values===========================
                  
                 
 $obj->assign('bodyDisplay','innerHTML',congMsg("Household  record(s) has(have) been Updated!"));
 $obj->call("xajax_view_form6",'','','');
 return $obj;
 }

 function edit_form7($formValues,$District){
 $obj=new xajaxResponse();
 
 $QueryManager=new QueryManager('');
 
 
 
 if($_SESSION['user_id']==''){
 $obj->redirect('index.php');
 return $obj;
 }
 
 $myGroupDistrict=$District;
  
 
  if($formValues['tbl_villageagent_groupsId']==''){
 $obj->alert('Kindly select / check / tick a group to edit.');
 return $obj;
 }
 //$obj->alert($regionCode);
 
 $n=1;
 $inc=1;
 $data="<form action=\"".$PHP_SELF."\" name='form7' id='form7' method='post'>
 <table width='100%' cellpadding='2' border='0' cellspacing='1'>";
  
 $data.="<tr class=''>
           <td colspan=8>
           <div id='status'></div>
          </td>
         </tr>";
   
 $data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE RECORD(S)</center></th></tr>";
   
   
  
   for($k=0;$k<count($formValues['loopkey']);$k++){
   
  $sel=mysql_query("SELECT g.*
 FROM `tbl_villageagent_groups`g
 WHERE g.`tbl_villageagent_groupsId`='".$formValues['tbl_villageagent_groupsId'][$k]."'")or die(http(37));
  //$obj->alert($formValues['tbl_villageagent_groupsId'][$k]);
   while($rowGroup=mysql_fetch_assoc($sel)){
	  


     $data.="<td> <input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1' />
 
 <input name='tbl_villageagent_groupsId' type='hidden' id='tbl_villageagent_groupsId' size='25' value='".$rowGroup['tbl_villageagent_groupsId']."'/>
 <input name='tbl_tradersId' type='hidden' id='tbl_tradersId' size='25' value='".$rowGroup['tbl_tradersId']."' />
 <input name='tbl_villageAgentId' type='hidden' id='tbl_villageAgentId' size='25' value='".$rowGroup['tbl_villageAgentId']."' />
 <input name='reportingPeriod' type='hidden' id='reportingPeriod' size='25' value='".$rowGroup['reportingPeriod']."' />
 <input name='groupName' type='hidden' id='groupName' size='25' value='".$rowGroup['groupName']."' />
 <input name='groupCode' class='disabled' readonly=readonly type='hidden' id='groupCode' size='25' value='".$rowGroup['groupCode']."' />";
     
    
 
 
         
 
 $data.="<tr class='evenrow3'>
                     <td colspan='22'>";
                     $data.="<table border='0' cellspacing='1' cellpadding='1' width='100%'>";
                     $data.="<tr class='evenrow'><th colspan='22'>2.Group/ Community Based Organization Particulars</tr></th>";
                     $data.="<tr class='evenrow'>
                                <th rowspan='2'>#</th>
                                <th rowspan='2'>Name of Group/CBO</th>
								<th rowspan='2'>Type (Indicate Group,  CBO or any other type)</th>
                                <th rowspan='2'>CODE</th>
								<th rowspan='2'>Date when You started working with the group</th>
                                <th rowspan='2'>Type of Group</th>
                                <th colspan='3'>No.of members</th>
                                <th colspan='3'>Location</th>
                              </tr>
                              <tr class='evenrow'>
                                <th valign='top'>Male</th>
                                <th valign='top'><strong>Female</th>
                                <th valign='top'><strong>Total</th>
                                <th valign='top'>District</th>
                                <th valign='top'>Sub-County</th>
                                <th valign='top'>Village</th>
                              </tr>
                               <tr class='evenrow'>
                                 <td>1</td>
                                 <td>
                                   <input type='text' name='groupName' value='".$rowGroup['groupName']."' id='groupName'/>
                                 <i>Use: 'No Group' as the group name if farmers being captured are not in a group </i></td>";
								 
								 $data.="<td valign='top'>
                                  <select name='groupType'  id='groupType' />";
                                                                     
                                    $data.="<option value=''>-select-</option>";
                                    $arrStatus=array('producer orgs/groups','women&#39s groups','trade and business associations','community-based organizations');
                                        $k = 0; 
                                        foreach ($arrStatus as $var) {
											
												$selDbVar=(($rowGroup['groupType']=="women's groups")?'women&#39s groups':$rowGroup['groupType']);
											
											
                                            $selected=($selDbVar==$var)?"selected":"";
                                            $data.="<option value=\"".$var."\" ".$selected.">".$var."</option>";
                                            $k++;
                                        }
                                    
                                  $data.="</select>";
                                $data.="</td>";
								 
								 $data.="<td valign='top'><input type='text' class='disabled' readonly=readonly name='groupCode' value='".$rowGroup['groupCode']."' id='groupCode' />
                                 </td>";
								 
								 $data.="
								<td valign='top'><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form7.dateGroupStarted);return false;\" hidefocus=''>
								<input  name='dateGroupStarted' type='text' size='20' value='".$rowGroup['dateGroupStarted']."' id='dateGroupStarted'  style='width:175px;>
								<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></td>
								";
								
								 
								 $data.="<td valign='top'>
                                   <select name='groupStatus'  id='groupStatus'>";
                                                                      
                                     $data.="<option value=''>-select-</option>";
                                     
                                     $arrStatus=array('New','Old');
                                         $k = 0; 
                                         foreach ($arrStatus as $var) {
                                             $selected=($rowGroup['groupStatus']==$var)?"selected":"";
                                             $data.="<option value=\"".$var."\" ".$selected.">".$var."</option>";
                                             $k++;
                                         }
                                     
                                   $data.="</select>";
                                 $data.="</td>
                                 <td valign='top'>
                                   <input type='text' name='numMembersFemale' value='".$rowGroup['numMembersFemale']."' id='numMembersFemale'  onKeyUp=\"xajax_calc_form7(getElementById('numMembersFemale').value,
                                                                                                                             getElementById('numMembersMale').value,
                                                                                                                             'numMembersTotal');return false;\" onkeypress='return numbersonly(event, false)' style='width:50px;'/>
                                 </td>
                                 <td valign='top'>
                                   <input type='text' name='numMembersMale' value='".$rowGroup['numMembersMale']."' id='numMembersMale'  onKeyUp=\"xajax_calc_form7(getElementById('numMembersFemale').value,
                                                                                                                             getElementById('numMembersMale').value,
                                                                                                                             'numMembersTotal');return false;\" onkeypress='return numbersonly(event, false)' style='width:50px;'/>
                                 </td>
                                 <td valign='top'>
                                   <input class='disabled' readonly=readonly type='text' name='numMembersTotal' value='".$rowGroup['numMembersTotal']."' id='numMembersTotal'  style='width:50px;'/>
                                 </td>
                                 <td valign='top'>";
                                 $st="select d.* from `tbl_district` d where d.`districtCode`='".$rowGroup['groupDistrict']."'";
                                 $qst=mysql_query($st);
                                 $rowd=mysql_fetch_array($qst);
                                   $data.="<input class='disabled' readonly=readonly type='text' value='".$rowd['districtName']."' name='groupDistrict' id='groupDistrict'    />";
                                 
                                 
                                 $data.="</td>";
                                 $data.="<td valign='top'>";
                                   $data.="<select name='groupSubcounty' id='groupSubcounty' > ";
                                   
                                     $data.="<option value=''>-select-</option>";
                                     $data.=$QueryManager->SubcountyFilterNoRegion($rowGroup['groupDistrict'],$rowGroup['groupSubcounty']);
                                     
                                 $data.="</select>";
                                 $data.="</td>";
                                 $data.="<td valign='top'>
                                   <input type='text' name='groupVillage' id='groupVillage' value='".$rowGroup['groupVillage']."' >
                                 </td>
                                 
                               </tr>";
                     $data.="</table>";
 $data.="</td></tr>";

	
//Determining the number of individual farmers
$data.="<tr class='evenrow3'>
                    <td colspan='22'>";
                    $data.="<table id='tbl_household'  border='0' cellspacing='1' cellpadding='1' width='100%'>";
                    $data.="<thead><tr class='evenrow'><th colspan='22'>3.Details of Group and Individual members</th></tr>";
                    $data.="<tr evenrow>
							<th rowspan='2'>No</th>
							<th colspan='5'>Details of Household(HH) head</th>
							<th colspan='4'>Household Composition <br>(Tick only ONE option)</th>
							<th rowspan='2' >No</th>
							<th rowspan='2'>Name of HH member (s) who you are directly working with</th>
							<th rowspan='2' style='min-width:85px'>Date-started working with member </th>
							<th rowspan='2'>Date of Birth<img src='' height='0.2' width='85px'/></th>
							<th rowspan='2'>Sub County</th>
							<th rowspan='2'>Village</th>
							<th rowspan='2'>Sex</th>
							<th rowspan='2'>Telephone</th>
							<th rowspan='2'>Action</th>
						  </tr>
						  <tr>
							<th>Name of household head</th>
							<th>Date of Birth of<br>HH Head<img src='' height='0.2' width='85px'/></th>
							<th>Sex</th>
							<th>Date-started working with HH<img src='' height='0.2' width='100px'/></th>
							<th>Total Area Available for cropping(Acres)</th>
							<th>Adult Male No <br>Adult Female</th>
							<th>Adult Male<br>&amp;Female</th>
							<th>Adult Female No<br>Adult Male</th>
							<th>Children No Adults</th>
							<input type='hidden' name='numberOfHouseholds' id='numberOfHouseholds' />
						  </tr></thead>";
						 
						 //Dicern between older and new records
						 $stFarmers="SELECT  COUNT(`f`.`tbl_farmersId`) as numberFarmers, `f`.* FROM `tbl_farmers` as `f` 
						 where `f`.`tbl_villageagent_groupsId`='".$rowGroup['tbl_villageagent_groupsId']."'";
						 
						  
						  $qFarmers=mysql_query($stFarmers)or die(http(3146));
							 $rFarmers=mysql_fetch_array($qFarmers);
						  
						  // for rowspan household info =3 X resultCount
						  //farmers of the same group and household
						  
							
							
							if ($rFarmers['hhName']<> NULL or $rFarmers['hhName']<>''){
								 $stCount="select  count(`f`.`tbl_farmersId`) as `numFarmers`, (`f`.`hhName`) as `myHHname`,`f`.* 
									from `tbl_farmers` as `f` where `f`.`tbl_villageagent_groupsId`='".$rowGroup['tbl_villageagent_groupsId']."'
									group by `f`.`hhName`";
								}else{
								$stCount="select if(`f`.`hhName` IS NULL,'Not Available',`f`.`hhName`) as `myHHname`,
								count(`f`.`tbl_farmersId`) as `numFarmers`, `f`.* 
								from `tbl_farmers` as `f` where `f`.`tbl_villageagent_groupsId`='".$rowGroup['tbl_villageagent_groupsId']."'";
									
								}
							
							
							//$obj->alert($stCount);
						  
						  $h=1;
                            $qCount=mysql_query($stCount)or die(http(3146));
							 while($rCount=mysql_fetch_array($qCount)){
								
							$rowspan=((($rCount['numFarmers'])*3)+1);
						  $data.="<tbody class=\"household\"><tr class='evenrow'>";
							$data.="<td rowspan='".$rowspan."' valign='top'><span class='hsIndex'>".$h."</span>
							
							<input type='hidden' name='childStart[]' id='childStart".$h."'/>
							<input type='hidden' name='childStop[]' id='childStop".$h."'/>
							</td>";
							$data.="<td rowspan='".$rowspan."' valign='top'><input type='text' value='".$rCount['myHHname']."' name='hhName[]' id='hhName1' ></td>";
							
							$data.="<td rowspan='".$rowspan."' valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'hhDob').attr('id')));return false;\" hidefocus=''>
							<input name='hhDob[]' type='text' size='20' value='".$rCount['hhDob']."' id='hhDob".$h."'  style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							
							$data.="<td rowspan='".$rowspan."' valign='top'><select name='hhSex[]' id='hhSex".$h."'>
								<option value=''>-select-</option>";
								$arrStatus=array('M','F');
									$k = 0; 
									foreach ($arrStatus as $var) {
										switch ($var) {
											case "M":
												$display='Male';
												break;
											case "F":
												$display='Female';
												break;
											default:
												$display='';
										}
										$selected=($rCount['hhSex']==$var)?"selected":"";
										$data.="<option value='".$var."' ".$selected.">".$display."</option>";
										$k++;
									}
							  $data.="</select></td>";
							  
							$data.="<td rowspan='".$rowspan."' valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'hhHeadDStart').attr('id')));return false;\" hidefocus=''>
							<input name='hhHeadDStart[]' value='".$rCount['hhHeadDStart']."' type='text' size='20' value='' id='hhHeadDStart".$h."'  style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							
							$data.="<td rowspan='".$rowspan."' valign='top'><input type='text' value='".$rCount['hhArea']."' name='hhArea[]' id='hhArea".$h."' onkeypress='return numbersonly(event, false)'></td>";
							
							//An array of possible hscomposition.
								$arrHs=array('noMaleOrFemale','maleAndFemale','femaleNoMale','childHeaded',);
                                        $k = 0; 
                                        foreach ($arrHs as $var) {
											$checked=($var == $rCount['hsComposition'])?"CHECKED":"";
										$data.="<td rowspan='".$rowspan."' valign='top'><input type='radio' name='hsComposition".$h."[]' ".$checked." id='hsComposition".$h."' value='".$var."'></td>";
										$k++;										
										}
								$data.="</tr>";		
								//Addition of farmers loop
								if ($rCount['myHHname']=='Not Available' or $rCount['myHHname']==''){
								$st_farmers="SELECT f.* FROM `tbl_farmers` f WHERE  (f.`hhName`='".$rCount['hhName']."' or f.`hhName` IS NULL) and f.`tbl_villageagent_groupsId`='".$rowGroup['tbl_villageagent_groupsId']."'";	
								}else{
								$st_farmers="SELECT f.* FROM `tbl_farmers` f WHERE  f.`tbl_villageagent_groupsId`='".$rowGroup['tbl_villageagent_groupsId']."'
								and f.`hhName`='".$rCount['myHHname']."'";
									
								}
								
								
                                 //$obj->alert($st_farmers);
                            
                             $sel=mysql_query($st_farmers)or die(http(37));
                                  
                                  $f=1;
                                  while($rowFarmer=mysql_fetch_assoc($sel)){
							
							$data.="<tr class='evenrow member'>";
							$data.="<td valign='top'><span class='memberIndex'>".$f."</span></td>";
							
							$data.="<td valign='top'>
							<input type='hidden' name='tbl_farmersId[]' id='tbl_farmersId".$f."' value='".$rowFarmer['tbl_farmersId']."'>
							<input type='text' value='".$rowFarmer['farmersName']."' name='nameIndividual[]' id='nameIndividual".$f."' ></td>";
							
							$data.="<td valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'memberDstart').attr('id')));return false;\" hidefocus=''>
							<input value='".$rowFarmer['memberDstart']."' name='memberDstart[]' type='text' size='20' value='' id='memberDstart".$f."'  style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
						   
							$data.="<td valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'farmersDob').attr('id')));return false;\" hidefocus=''>
							<input value='".$rowFarmer['farmersDob']."' name='farmersDob[]' type='text' size='20' value='' id='farmersDob".$f."' style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							
							$data.="<td valign='top'>";
								$data.="<select name='farmerSubcounty[]' id='farmerSubcounty".$f."'  /> ";
								$data.="<option value=''>-select-</option>";
                                    $data.=$QueryManager->SubcountyFilterNoRegion($rowFarmer['farmersDistrict'],$rowFarmer['farmersSubcounty']);
									
                                $data.="</select>";
                                $data.="</td>";
								
							$data.="<td valign='top'><input type='text' value='".$rowFarmer['farmersVillage']."' name='farmerVillage[]' id='farmerVillage".$f."'></td>";
							$data.="<td valign='top'><p>
							  <select name='sexIndividual[]' id='sexIndividual".$f."'>
								<option value=''>-select-</option>";
								$arrStatus=array('Male','Female');
									$k = 0; 
									foreach ($arrStatus as $var) {
											$selected=($rowFarmer['farmersSex']==$var)?"selected":"";
                                            $data.="<option value=\"".$var."\" ".$selected.">".$var."</option>";
										
										$k++;
									}
							  $data.="</select>
							</td>";
							$data.="<td valign='top'><input maxlength='13' value='".$rowFarmer['farmersTel']."' type='text' name='telIndividual[]' id='telIndividual".$f."'></td>";
							//Action table cell
							
							$data.="<td><!--<input  type='button' class='formButton2'name='Remove Member' TITLE='Remove Member' value='Remove Member' onclick=\"removeMember(this)\" />--></td>
						</tr>";
						$f++;
               
                             }  
						
					$data.="<tr class='evenrow'><td valign='top' colspan='9'>
					<input  type='button' class='formButton2'name='Add Member' TITLE='Add Member' value='Add Member' onclick=\"addMember(this,'evenrow member')\" /></td>";
					$data.="</tr></tbody>";
							 $h++;
							 }
							 		  
				}//End of village agent Groups
   }//end of Group loopkey Count
     		  
						  
						  
						  $data.="</table>
                        <p>
                        <input  type='button' class='formButton2' name='Add Household' TITLE='Add Household' value='Add Household' onclick=\"addHousehold()\" />
                        </p>";
						  
            $data.="</td>
        </tr>";


$data.="<tr class='evenrow'>
            <td>
            <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"loadingIcon(xajax.getFormValues('form7'),'update_form7');return false;\" />
            </div>
            </td>
        </tr>
</form>";
 
 //None displaying table
						
						$data.="
						<table id='template_household' style='display:none;'>";
						
						$data.="<tbody class=\"household\">
							
							<tr class='evenrow'>";
							$data.="<td rowspan='3' valign='top'><span class='hsIndex'>1</span>
							<input type='hidden' name='childStart[]' id='childStart1' />
							<input type='hidden' name='childStop[]' id='childStop1' />
							</td>";
							$data.="<td rowspan='3' valign='top'>
							<input type='hidden' name='loopkey[]' id='loopkey1' value='1'> 
							<input type='text' name='hhName[]' id='hhName1'></td>";
							
							$data.="<td rowspan='3' valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'hhDob').attr('id')));return false;\" hidefocus=''>
							<input name='hhDob[]' type='text' size='20' value='' id='hhDob1'  style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							
							$data.="<td rowspan='3' valign='top'><select name='hhSex[]' id='hhSex1'>
								<option value=''>-select-</option>";
								$arrStatus=array('M','F');
									$k = 0; 
									foreach ($arrStatus as $var) {
										switch ($var) {
											case "M":
												$display='Male';
												break;
											case "F":
												$display='Female';
												break;
											default:
												$display='';
										}
										
										$data.="<option value=\"".$var."\">".$display."</option>";
										$k++;
									}
							  $data.="</select></td>";
							  
							$data.="<td rowspan='3' valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'hhHeadDStart').attr('id')));return false;\" hidefocus=''>
							<input name='hhHeadDStart[]' type='text' size='20' value='' id='hhHeadDStart1'  style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							
							$data.="<td rowspan='3' valign='top'><input type='text' name='hhArea[]' id='hhArea1' onkeypress='return numbersonly(event, false)'></td>";
							
							//An array of possible hscomposition.
							$arrHs=array('noMaleOrFemale','maleAndFemale','femaleNoMale','childHeaded',);
									$k = 0; 
									foreach ($arrHs as $var) {
									$data.="<td rowspan='3' valign='top'><input type='radio' name='hsComposition1[]'  id='hsComposition1' value='".$var."'></td>";
									$k++;										
									}
								$data.="</tr>";	
								
								
								
								
								
								
								
								$data.="<tr class='evenrow member'>";
							$data.="<td valign='top'><span class='memberIndex'>1</span></td>";
							$data.="<td valign='top'>
							<input type='hidden' name='tbl_farmersId[]' id='tbl_farmersId'>
							<input type='text' name='nameIndividual[]' id='nameIndividual1'></td>";
							
							$data.="<td valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'memberDstart').attr('id')));return false;\" hidefocus=''>
							<input name='memberDstart[]' type='text' size='20' value='' id='memberDstart1'  style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
						   
							$data.="<td valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'farmersDob').attr('id')));return false;\" hidefocus=''>
							<input name='farmersDob[]' type='text' size='20' value='' id='farmersDob1' style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							$data.="<input type='hidden' name='myGroupDistrict[]' id='myGroupDistrict1' value='".$myGroupDistrict."' />";
							$data.="<td valign='top'>";
								$data.="<select name='farmerSubcounty[]' id='farmerSubcounty1'  /> ";
								$data.="<option value=''>-select-</option>";
                                    $data.=$QueryManager->SubcountyFilterNoRegion($myGroupDistrict,$rowGroup['groupSubcounty']);;
									
                                $data.="</select>";
                                $data.="</td>";
								
							$data.="<td valign='top'><input type='text' name='farmerVillage[]' id='farmerVillage1'></td>";
							$data.="<td valign='top'><p>
							  <select name='sexIndividual[]' id='sexIndividual1'>
								<option value=''>-select-</option>";
								$arrStatus=array('Male','Female');
									$k = 0; 
									foreach ($arrStatus as $var) {
										$data.="<option value=\"".$var."\">".$var."</option>";
										$k++;
									}
							  $data.="</select>
							</td>";
							$data.="<td valign='top'><input maxlength='13' value=\"+256\" type='text' name='telIndividual[]' id='telIndividual1'></td>";
							//Action table cell
							
							$data.="<td><input  type='button' class='formButton2'name='Remove Member' TITLE='Remove Member' value='Remove Member' onclick=\"removeMember(this)\" /></td>
						</tr>";
					$data.="<tr class='evenrow'><td valign='top' colspan='9'>
					<input  type='button' class='formButton2'name='Remove Household' TITLE='Remove Household' value='Remove Household' onclick=\"removeHousehold(this)\" />
					<input  type='button' class='formButton2'name='Add Member' TITLE='Add Member' value='Add Member' onclick=\"addMember(this,'evenrow member')\" /></td></tr>";	
					$data.="</tbody>";
						
						$data.="</table>";
		
        $data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
              

$data.="</table>";


 
 $obj->assign('bodyDisplay','innerHTML',$data);
 $obj->call("renameHouseholdControls");
 return $obj;
 }
 
 function update_form7($formValues){
 $obj=new xajaxResponse();
 $n=1;
 
 
  
 $tbl_villageagent_groupsId=$formValues['tbl_villageagent_groupsId'];
 $tbl_tradersId=$formValues['tbl_tradersId'];
 $tbl_villageAgentId=$formValues['tbl_villageAgentId'];
 $reportingPeriod=$formValues['reportingPeriod'];
 $groupName=$formValues['groupName'];
 $groupCode=$formValues['groupCode'];
 $groupType=$formValues['groupType'];
 $dateGroupStarted=$formValues['dateGroupStarted'];
 $groupStatus=$formValues['groupStatus'];
 $numMembersFemale=$formValues['numMembersFemale'];
 $numMembersMale=$formValues['numMembersMale'];
 $numMembersTotal=$formValues['numMembersTotal'];
 $date1 = "2013-06-01";
 $year=date('Y');
 $string_District=$formValues['groupDistrict'];
 $stmnt="SELECT *FROM `tbl_district` where `districtName`='".$string_District."'";
 $q=mysql_query($stmnt);
 $r=mysql_fetch_array($q);
 $groupDistrict=$r['districtCode'];
 $groupSubcounty=$formValues['groupSubcounty'];
 $groupVillage=$formValues['groupVillage'];
 
 
 $st_grps="UPDATE `tbl_villageagent_groups`
 SET `tbl_villageagent_groupsId`='".$tbl_villageagent_groupsId."',
 `groupName`='".$groupName."',
 `groupType`='".mysql_real_escape_string($groupType)."',
 `groupCode`='".$groupCode."',
 `dateGroupStarted`='".$dateGroupStarted."',
 `groupStatus`='".$groupStatus."',
 `numMembersFemale`='".$numMembersFemale."',
 `numMembersMale`='".$numMembersMale."',
 `numMembersTotal`='".$numMembersTotal."',
 `groupDistrict`='".$groupDistrict."',
 `groupSubcounty`='".$groupSubcounty."',
 `groupVillage`='".$groupVillage."'
 WHERE `tbl_villageagent_groupsId`='".$tbl_villageagent_groupsId."'";
 

 
 
		$date2 = $dateGroupStarted;
		$dateTimestamp1 = strtotime($date1);
		$dateTimestamp2 = strtotime($date2);
		 
		if ( $dateTimestamp2 < $dateTimestamp1){
		$obj->alert("The date suplied for\n 'Date when You started working with the group' is invalid.\n It cannot be before 1st.June.2013 when CPM started.");
		$obj->call("hidemyLoaderDiv"); 
		return $obj;
		} 
		
		 /* $obj->alert($st_grps); */
		$query=@Execute($st_grps)or die(http(3476));
		
		if(!$query){ $obj->alert("CPM MIS could not make this form 7 modification. \n
				   Please make sure all the data to be supplied is correct.");
		 $obj->call("hidemyLoaderDiv"); 	   
		  return $obj;
		 }
 
 
 for($x=0;$x<$formValues['numberOfHouseholds'];$x++){
 
$hhName=$formValues['hhName'][$x];
$hhDob=$formValues['hhDob'][$x];
$hhSex=$formValues['hhSex'][$x];
$hhHeadDStart=$formValues['hhHeadDStart'][$x];

$hhArea=$formValues['hhArea'][$x];
$hsComposition=$formValues['hsComposition'.($x+1)];

$childStart=$formValues['childStart'][$x];
$childStop=$formValues['childStop'][$x];


for($y=$childStart;$y<=$childStop;$y++){ 
$tbl_farmersId=$formValues['tbl_farmersId'.$y];	
$nameIndividual=$formValues['nameIndividual'.$y];
$memberDstart=$formValues['memberDstart'.$y];
$memberStatus=$formValues['memberStatus'.$y];
$farmersDob=$formValues['farmersDob'.$y];
if($farmersDob==''){
$dirtyBd='1800-01-01';
$farmersDob=$dirtyBd;
}
$farmerSubcounty=$formValues['farmerSubcounty'.$y];
$myGroupDistrict=$formValues['myGroupDistrict'.$y];
$farmersVillage=$formValues['farmerVillage'.$y];
$sexIndividual=$formValues['sexIndividual'.$y];
$telIndividual=$formValues['telIndividual'.$y];

//check for existance of record
  $st_check="SELECT * FROM  `tbl_farmers` WHERE `tbl_farmersId`='".$tbl_farmersId."'";
  
$qcheck=@Execute($st_check) or die(http(3512));
$rowC=mysql_fetch_array($qcheck);
     
 if($rowC<>null and $tbl_farmersId<>''){ 
 //Perform an Update....

 $sql="UPDATE `tbl_farmers` SET
 `groupName`='".$groupName."',
 `farmersDistrict`='".$groupDistrict."',
 `farmersSubcounty`='".$farmerSubcounty."',
 `farmersName`='".$nameIndividual."',
 `memberDstart`='".$memberDstart."',
 `farmersDob`='".$farmersDob."',
 `farmersVillage`='".$farmersVillage."',
 `farmersSex`='".$sexIndividual."',
 `farmersTel`='".$telIndividual."',
 `hhName`='".$hhName."',
 `hhDob`='".$hhDob."',
 `hhSex`='".$hhSex."',
 `hhHeadDStart`='".$hhHeadDStart."',
 `hhArea`='".$hhArea."',
 `hsComposition`='".implode(",",$hsComposition)."',
 `submittedBy`='".$_SESSION['username']."',
 `updatedBy`='".$_SESSION['username']."'
 WHERE `tbl_farmersId`='".$tbl_farmersId."'
 AND `tbl_villageagent_groupsId`='".$tbl_villageagent_groupsId."'";
  
  

  

$date2 = $hhHeadDStart;
		$dateTimestamp1 = strtotime($date1);
		$dateTimestamp2 = strtotime($date2);
		 
		if ( $dateTimestamp2 < $dateTimestamp1){
		$obj->alert("One of the dates suplied for:\n 'Date-started working with Household'\n is invalid. It cannot be before 1st.June.2013 when CPM started.");
		$obj->call("hidemyLoaderDiv"); 
		return $obj;
		}

		$date2 = $memberDstart;
		$dateTimestamp1 = strtotime($date1);
		$dateTimestamp2 = strtotime($date2);
		 
		if ( $dateTimestamp2 < $dateTimestamp1){
		$obj->alert("One of the dates suplied for:\n 'Date-started working with Household  member'\n is invalid. It cannot be before 1st.June.2013 when CPM started.");
		$obj->call("hidemyLoaderDiv"); 
		return $obj;
		} 			
											
		/*  $obj->alert($sql); */
		 $query=@Execute($sql)or die(http(36007));

		if(!$query){ $obj->alert("CPM MIS could not make this form 7 modification. \n
						   Please make sure all the data to be supplied is correct.");
				 $obj->call("hidemyLoaderDiv"); 	   
				  return $obj;
				 }  
 
 }
 
 if($tbl_farmersId=='' or $tbl_farmersId==0){
//Perform an insert.....	 
if($nameIndividual<>''OR $nameIndividual<>0) {

$stmnt_grMembers="INSERT INTO `tbl_farmers`(`tbl_tradersId`, `tbl_villageAgentId`,`tbl_villageagent_groupsId`, 
                                            `reportingPeriod`, `groupName`,`farmersDistrict`,`farmersSubcounty`,
                                            `farmersName`,`memberDstart`,`memberStatus`,`farmersDob`,`farmersVillage`, `farmersSex`, `farmersTel`,
											`hhName`,`hhDob`,`hhSex`,`hhHeadDStart`,`hhArea`,`hsComposition`,`submittedBy`,`updatedBy`,`year`)
                                                        VALUES
                                                    ('".$tbl_tradersId."', '".$tbl_villageAgentId."','".$tbl_villageagent_groupsId."',
                                            '".$reportingPeriod."','".$groupName."','".$myGroupDistrict."','".$farmerSubcounty."',
                                            '".$nameIndividual."','".$memberDstart."','".$memberStatus."','".$farmersDob."','".$farmersVillage."','".$sexIndividual."', '".$telIndividual."',
											'".$hhName."','".$hhDob."','".$hhSex."','".$hhHeadDStart."','".$hhArea."','".implode(",",$hsComposition)."','".$_SESSION['username']."','".$_SESSION['username']."','".$year."')";




$date2 = $hhHeadDStart;
		$dateTimestamp1 = strtotime($date1);
		$dateTimestamp2 = strtotime($date2);
		 
		if ( $dateTimestamp2 < $dateTimestamp1){
		$obj->alert("One of the dates suplied for:\n 'Date-started working with Household'\n is invalid. It cannot be before 1st.June.2013 when CPM started.");
		$obj->call("hidemyLoaderDiv"); 
		return $obj;
		}

		$date2 = $memberDstart;
		$dateTimestamp1 = strtotime($date1);
		$dateTimestamp2 = strtotime($date2);
		 
		if ( $dateTimestamp2 < $dateTimestamp1){
		$obj->alert("One of the dates suplied for:\n 'Date-started working with Household  member'\n is invalid. It cannot be before 1st.June.2013 when CPM started.");
		$obj->call("hidemyLoaderDiv"); 
		return $obj;
		} 			
											
		/* $obj->alert($stmnt_grMembers); */
		$query=@Execute($stmnt_grMembers)or die(http(3655));

		if(!$query){ $obj->alert("CPM MIS could not make this form 7 modification. \n
						   Please make sure all the data to be supplied is correct.");
				 $obj->call("hidemyLoaderDiv"); 	   
				  return $obj;
				 }  

}//End of validation farmers
	 
 }




}//End of collection farmers

}//End of collection house hold data
 
					// Auto recompute the group Summations and up date
					###Start with query to reset table values...
					$sAutoM="SELECT count(*) as maleFarmers FROM `tbl_farmers` 
					WHERE `tbl_villageagent_groupsId`='".$tbl_villageagent_groupsId."'
					and `farmersSex` = 'Male'";
					$qAutoM=@Execute($sAutoM) or die(http(3578));
					$rowM=mysql_fetch_array($qAutoM);
					$numMales=$rowM['maleFarmers'];


					$sAutoF="SELECT count(*) as femaleFarmers FROM `tbl_farmers` 
					WHERE `tbl_villageagent_groupsId`='".$tbl_villageagent_groupsId."'
					and `farmersSex` = 'Female'";
					$qAutoF=@Execute($sAutoF) or die(http(3586));
					$rowF=mysql_fetch_array($qAutoF);
					$numFemales=$rowF['femaleFarmers'];

					$sAutoTot="SELECT count(*) as TotalFarmers FROM `tbl_farmers` 
					WHERE `tbl_villageagent_groupsId`='".$tbl_villageagent_groupsId."'";
					$qAutoTot=@Execute($sAutoTot) or die(http(3592));
					$rowTot=mysql_fetch_array($qAutoTot);
					$numTotal=$rowTot['TotalFarmers'];


					 $st_grps2="UPDATE `tbl_villageagent_groups`
					 SET `numMembersFemale`='".$numFemales."',
					 `numMembersMale`='".$numMales."',
					 `numMembersTotal`='".$numTotal."'
					 WHERE `tbl_villageagent_groupsId`='".$tbl_villageagent_groupsId."'";
					 
					 /* $obj->alert($st_grps2); */
					 $query=@Execute($st_grps2)or die(http(3604));
 
 
                 
                 
$obj->assign('bodyDisplay','innerHTML',congMsg("Farmer record(s) has been Updated!"));
$obj->call("xajax_view_form7",'','',1,20); 
return $obj;
 }




?>