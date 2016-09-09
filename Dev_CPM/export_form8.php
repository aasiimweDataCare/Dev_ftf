<?php

//if(isset($_GET['linkvar']==''))
require_once('connections/lib_connect.php');
 
#echo "\n<h3>COMMUNITY MAPPING : ".substr(strtoupper($_GET['linkvar']),7,100)." </h3>\n";
 header("Cache-control: private"); 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=CPM_file.xls");
header("Content-Description: PHP Generated Data");
header("Pragma: no-cache");
header("Expires: 0"); 
		#header("Cache-control: private"); 
//echo "\n<img src='images/logo100%.gif' height=99 width='100%' />\n";


setup_form7($_GET['semi_annual'],$_GET['year'],$_GET['format']);




//setup_farmers
function setup_form7($reportingPeriod,$year,$format){

$n=1; 
$_SESSION['semi_annual']='';
$_SESSION['staffyear']=$year;
$_SESSION['reportingPeriod']=$reportingPeriod;


$sql = "select `z`.`zoneName` as `Region`,
`d`.`districtName` as `District`,`s`.`subcountyName` as `Subcounty`,
`pa`.`ParishName` as `Parish`, `dm`.`demoVillage`,

`dm`.`demoSeason`, `dm`.`demoYear`, `t`.`traderName` as `Trader Name`,
`dm`.`demoTraderSex`, `v`.`vAgentName` as `Village Agent`, `dm`.`demoVillageAgentSex`,
`f`.`farmersName`, `dm`.`numofVisits`, `dm`.`farmerGender`,
`dm`.`farmerAge`, `dm`.`farmerCrop`, `cv`.`cropVariety`,


`dr`.`sizePlotA`, `dr`.`treatmentOnePlotA`, `dr`.`treatmentTwoPlotA`,
`dr`.`treatmentThreePlotA`, `dr`.`treatmentFourPlotA`, `dr`.`treatmentFivePlotA`,
`dr`.`treatmentSixPlotA`, `dr`.`treatmentSevenPlotA`, `dr`.`plantingDatePlotA`,
`dr`.`firstWeedingDatePlotA`, `dr`.`secondWeedingDatePlotA`, `dr`.`firstFertilizerDatePlotA`,
`dr`.`secondFertilizerDatePlotA`, `dr`.`pesticideDatePlotA`, `dr`.`harvestDatePlotA`,
`dr`.`yieldPlotA`, `dr`.`reportonDemoPlotA`, `dr`.`numFemalePlotA`,
`dr`.`numMalePlotA`, `dr`.`numTotalPlotA`, `dr`.`sizePlotB`,
`dr`.`treatmentOnePlotB`, `dr`.`treatmentTwoPlotB`, `dr`.`treatmentThreePlotB`,
`dr`.`treatmentFourPlotB`, `dr`.`treatmentFivePlotB`, `dr`.`treatmentSixPlotB`,
`dr`.`treatmentSevenPlotB`, `dr`.`plantingDatePlotB`, `dr`.`firstWeedingDatePlotB`,
`dr`.`secondWeedingDatePlotB`, `dr`.`firstFertilizerDatePlotB`, `dr`.`secondFertilizerDatePlotB`,
`dr`.`pesticideDatePlotB`, `dr`.`harvestDatePlotB`, `dr`.`yieldPlotB`,
`dr`.`reportonDemoPlotB`, `dr`.`numFemalePlotB`, `dr`.`numMalePlotB`,
`dr`.`numTotalPlotB`, `dr`.`sizePlotC`, `dr`.`treatmentOnePlotC`,
`dr`.`treatmentTwoPlotC`, `dr`.`treatmentThreePlotC`, `dr`.`treatmentFourPlotC`,
`dr`.`treatmentFivePlotC`, `dr`.`treatmentSixPlotC`, `dr`.`treatmentSevenPlotC`,
`dr`.`plantingDatePlotC`, `dr`.`firstWeedingDatePlotC`, `dr`.`secondWeedingDatePlotC`,
`dr`.`firstFertilizerDatePlotC`, `dr`.`secondFertilizerDatePlotC`, `dr`.`pesticideDatePlotC`,
`dr`.`harvestDatePlotC`, `dr`.`yieldPlotC`, `dr`.`reportonDemoPlotC`,
`dr`.`numFemalePlotC`, `dr`.`numMalePlotC`, `dr`.`numTotalPlotC`,
`dr`.`sizePlotD`, `dr`.`treatmentOnePlotD`, `dr`.`treatmentTwoPlotD`,
`dr`.`treatmentThreePlotD`, `dr`.`treatmentFourPlotD`, `dr`.`treatmentFivePlotD`,
`dr`.`treatmentSixPlotD`, `dr`.`treatmentSevenPlotD`, `dr`.`plantingDatePlotD`,
`dr`.`firstWeedingDatePlotD`, `dr`.`secondWeedingDatePlotD`, `dr`.`firstFertilizerDatePlotD`,
`dr`.`secondFertilizerDatePlotD`, `dr`.`pesticideDatePlotD`, `dr`.`harvestDatePlotD`,
`dr`.`yieldPlotD`, `dr`.`reportonDemoPlotD`,
`dr`.`numFemalePlotD`, `dr`.`numMalePlotD`, `dr`.`numTotalPlotD`




from
`tbl_traders` as `t`,
`tbl_villageagents` as `v`,
`tbl_farmers` as `f`,
`tbl_cropvarieties` as `cv`,
`tbl_zone` as `z`,
`tbl_district` as `d`,
`tbl_subcounty` as `s`,
`tbl_parish` as `pa`,
`tbl_demo_records_book` as `dm`
left join `tbl_demo_book_details` as `dr` on `dr`.`demoId`=`dm`.`demoId`
where  `z`.`zoneCode`= `d`.`zone`
and `d`.`districtCode`=`dm`.`demoDistrict`
and `s`.`subcountyCode`=`dm`.`demoSubCounty`
and `pa`.`ParishCode`=`dm`.`demoParish`
and `dm`.`demoNameTrader`=`t`.`tbl_tradersId`
and `dm`.`demoNameVillageAgent`=`v`.`tbl_villageAgentId`
and `dm`.`nameHostFarmer`=`f`.`tbl_farmersId`
and `dm`.`cropVariety` = `cv`.`pk_cropVarietiesId`";
$result = mysql_query($sql) or die(http(1992));

// Print the column names as the headers of a table
$data.="<table border=1 cellspacing=2 cellpadding=2><tr>";
for($i = 0; $i < mysql_num_fields($result); $i++) {
    $field_info = mysql_fetch_field($result, $i);
    $data.="<th>{$field_info->name}</th>";
}

// Print the data
while($row = mysql_fetch_row($result)) {
    $data.="<tr>";
    foreach($row as $_column) {
        $data.="<td align='right'>{$_column}</td>";
    }
    $data.="</tr>";
}

$data.="</table>";

echo $data;

}
?>