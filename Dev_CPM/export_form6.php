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


$sql = "select  `h`.`hsHead`  as `HouseholdHead`,
`h`.`hsHouseholdAge` as `Age Of HouseholdHead`,
`h`.`hsCode` as `HouseholdCode`,
`h`.`hsSex`  as `Gender`, `z`.`zoneName` as `Region`,
`d`.`districtName` as `District`,`s`.`subcountyName` as `Subcounty`,
`pa`.`ParishName` as `Parish`, `h`.`hsVillage`,
`h`.`hsStatus`,
`h`.`hsComposition`,
`v`.`vAgentName` as `Village Agent`,
`h`.`year` as `Year`,
`h`.`reportingPeriod`,
`h`.`hsTotMembers`, `h`.`hsTotMembersFemale`, `h`.`hsTotMembersMale`,
`h`.`hsTotMembersYouth`,

`m`.`hsNameMember`,
`m`.`hsSexMember`,
`m`.`hsAgeMember`,

`m`.`hsAreaMaizeMember`,
`m`.`hsValueInputsMaizeMember`,
`m`.`hsTotalYieldMaizeMember`,
`m`.`hsVolumeSoldMaizeMember`,
`m`.`hsVolumeLostMaizeMember`,

`m`.`hsAreaBeansMember`,
`m`.`hsValueInputsBeansMember`,
`m`.`hsTotalYieldBeansMember`,
`m`.`hsVolumeSoldBeansMember`,
`m`.`hsVolumeLostBeansMember`,


`m`.`hsAreaCoffeeMember`,
`m`.`hsValueInputsCoffeeMember`,
`m`.`hsTotalYieldCoffeeMember`,
`m`.`hsVolumeSoldCoffeeMember`,
`m`.`hsVolumeLostCoffeeMember`,
`m`.`houseHoldId`,

        `sd`.`maizeTotalFGPrice` as `MaizeTotalFarmGatePrice`, `sd`.`beansTotalFGPrice` as `BeansTotalFarmGatePrice`,
	`sd`.`coffeeTotalFGPrice` as `CoffeeTotalFarmGatePrice`,
`sd`.`improvedSeedMaterialsMaizeT`, `sd`.`improvedSeedMaterialsMaizeM`, `sd`.`improvedSeedMaterialsMaizeF`,
`sd`.`improvedSeedMaterialsMaizeY`, `sd`.`improvedSeedMaterialsBeansT`, `sd`.`improvedSeedMaterialsBeansM`,
`sd`.`improvedSeedMaterialsBeansF`, `sd`.`improvedSeedMaterialsBeansY`, `sd`.`improvedSeedMaterialsCoffeeT`,
`sd`.`improvedSeedMaterialsCoffeeM`, `sd`.`improvedSeedMaterialsCoffeeF`, `sd`.`improvedSeedMaterialsCoffeeY`,
`sd`.`acreageImprovedSeedMaize`, `sd`.`acreageImprovedSeedBeans`, `sd`.`acreageImprovedSeedCoffee`,
`sd`.`useFertilizersMaizeT` as `UseFertilizersMaizeTotal`, `sd`.`useFertilizersMaizeM` as `UseFertilizersMaizeMale`,
`sd`.`useFertilizersMaizeF` as `UseFertilizersMaizeFemale`,
`sd`.`useFertilizersMaizeY`  as `UseFertilizersMaizeYouth`,
`sd`.`useFertilizersBeansT` as `UseFertilizersBeansTotal`, `sd`.`useFertilizersBeansM` as `UseFertilizersBeansMale`,
`sd`.`useFertilizersBeansF` as `UseFertilizersBeansFemale`,
`sd`.`useFertilizersBeansY` as `UseFertilizersBeansYouth`,
`sd`.`useFertilizersCoffeeT` as `UseFertilizersCoffeeTotal`, `sd`.`useFertilizersCoffeeM` as `UseFertilizersCoffeeMale`,
`sd`.`useFertilizersCoffeeF` as `UseFertilizersCoffeeFemale`,
`sd`.`useFertilizersCoffeeY`  as `UseFertilizersCoffeeYouth`,
`sd`.`acreageFertilizersMaize`, `sd`.`acreageFertilizersBeans`, `sd`.`acreageFertilizersCoffee`,
`sd`.`useChemicalsMaizeT`, `sd`.`useChemicalsMaizeM`, `sd`.`useChemicalsMaizeF`,
`sd`.`useChemicalsMaizeY`, `sd`.`useChemicalsBeansT`, `sd`.`useChemicalsBeansM`,
`sd`.`useChemicalsBeansF`, `sd`.`useChemicalsBeansY`, `sd`.`useChemicalsCoffeeT`,
`sd`.`useChemicalsCoffeeM`, `sd`.`useChemicalsCoffeeF`, `sd`.`useChemicalsCoffeeY`,
`sd`.`acreageChemicalsMaize`, `sd`.`acreageChemicalsBeans`, `sd`.`acreageChemicalsCoffee`,
`sd`.`purchasingInputThruVARM`, `sd`.`purchasingInputThruVillageAgent`, `sd`.`purchasingInputThruStockist`,
`sd`.`purchasingInputThruOthers`, `sd`.`goodYields`, `sd`.`reducedCosts`,
`sd`.`labourSaving`, `sd`.`techNone`, `sd`.`betterQuality`,
`sd`.`diseaseResistance`, `sd`.`earlyMaturity`
from `tbl_household_members` as `m`,
`tbl_villageagents` as `v`,
`tbl_zone` as `z`,
`tbl_district` as `d`,
`tbl_subcounty` as `s`,
`tbl_parish` as `pa`,
`tbl_house_hold_details` as `h`
left join `tbl_household_summary_data` as `sd` on `sd`.`houseHoldId`=`h`.`houseHoldId`
where  `h`.`hsVillageAgent`=`v`.`tbl_villageAgentId`
and `z`.`zoneCode`= `h`.`hsRegion`
and `d`.`districtCode`=`h`.`hsDistrict`
and `s`.`subcountyCode`=`h`.`hsSubcounty`
and `pa`.`ParishCode`=`h`.`hsParish`
and  `m`.`houseHoldId`=`h`.`houseHoldId` order by `h`.`tbl_house_hold_detailsId` desc";
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
        $data.="<td>{$_column}</td>";
    }
    $data.="</tr>";
}

$data.="</table>";

echo $data;

}
?>