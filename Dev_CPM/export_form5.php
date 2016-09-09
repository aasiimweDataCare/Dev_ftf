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


setup_form5($_GET['semi_annual'],$_GET['year'],$_GET['format']);




//setup_farmers
function setup_form5($reportingPeriod,$year,$format){

$n=1; 
$_SESSION['semi_annual']='';
$_SESSION['staffyear']=$year;
$_SESSION['reportingPeriod']=$reportingPeriod;


$sql = "select `v`.`vAgentName`,`v`.`vAgentCode`,
`v`.`vAgentSex`, `v`.`vAgentCropBeans`,
`v`.`vAgentCropMaize`,`v`.`vAgentCropCoffee`,
`v`.`vAgentDateRecruited`, 
`z`.`zoneName` as `Region`,
`d`.`districtName` as `District`,`s`.`subcountyName` as `Subcounty`,
`v`.`vAgentVillage`,
`fv`.`year` as `Year`, `fv`.`reportingPeriod` as `Reporting Period`,
`fv`.`SC_AchievementsFemale` as `NoFarmersSupplyChainFemale`, `fv`.`SC_AchievementsMale` as `NoFarmersSupplyChainMale`,
`fv`.`SC_AchevementsTotal` as `NoFarmersSupplyChainTotal`,
`fv`.`numGroups_SC` as `NoGroupsSupplyChain`,
`fv`.`numFarmerGroupsFemale`, `fv`.`numFarmerGroupsMale`,
`fv`.`numFarmerGroupsTotal`, `fv`.`volPurchasedMaize`,
`fv`.`volPurchasedBeans`, `fv`.`volPurchasedCoffee`,
`fv`.`inputsMaize`, `fv`.`inputsBeans`,
`fv`.`inputsCoffee`, `fv`.`valueOwnResources`,
`fv`.`loanRecievedBank`, `fv`.`loanRecievedSACCO`,
`fv`.`loanRecievedMDI`, `fv`.`loanRecievedVSLA`,
`fv`.`EpayRecieved`, `fv`.`EpayMade`,
`fv`.`jobsTotal`, `fv`.`jobsMale`,
`fv`.`jobsFemale`, `fv`.`sizeStoreNew`,
`fv`.`sizeStoreImproved`
from
`tbl_form5_villageagent` as `fv`,
`tbl_villageagents` as `v`,
`tbl_zone` as `z`,
`tbl_district` as `d`,
`tbl_subcounty` as `s`
where `fv`.`tbl_villageagentsId`=`v`.`tbl_villageAgentId`
and `z`.`zoneCode`= `v`.`vAgentRegion`
and `d`.`districtCode`=`v`.`vAgentDistrict`
and `s`.`subcountyCode`=`v`.`vAgentSubcounty`";
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