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


export_to_Excel_allTraders($_GET['semi_annual'],$_GET['year'],$_GET['format']);




//setup_farmers
function export_to_Excel_allTraders($reportingPeriod,$year,$format){

$n=1; 
$_SESSION['semi_annual']='';
$_SESSION['staffyear']=$year;
$_SESSION['reportingPeriod']=$reportingPeriod;


$sql = "SELECT 
`t`.`traderName`, 
`t`.`traderDob`, 
 concat(space(4),(`t`.`traderCode`)) as `traderCode`,
`t`.`traderModel`, 
`t`.`traderRadius`, 
`t`.`traderStoreSize`,
`t`.`traderTel`,
`t`.`traderSex`,
`t`.`traderLocation`,
`t`.`traderDateRecruited`,

`z`.`zoneName`,
`d`.`districtName`,
`s`.`subcountyName`,

`t`.`traderVillage`,
`t`.`traderCropBeans`,
`t`.`traderCropCoffee`,
`t`.`traderCropMaize`, 
`t`.`contactPerson`, 
`t`.`traderType`,
`t`.`tradermouExpiryDate`,
`t`.`valueInputStock`, 
`t`.`traderRecordKeepingSystem`,
`t`.`traderfinancialServices`,
`t`.`tradersavingsComponent`,
`t`.`tradernumFarmers`,
`t`.`tradernumYouthGroups`,
`t`.`tradervolPurchasedYr1`,
`t`.`tradervolPurchasedYr2`,
`t`.`tradervolPurchasedYr3`,
`t`.`tradervolPurchasedYr4`,
`t`.`tradervolPurchasedYr5`,
`t`.`tradervolPurchasedYr6`,
`t`.`keyDecisionMaker1`,
`t`.`keyDecisionMaker2`,
`t`.`keyDecisionMaker3`,
`t`.`keyDecisionMaker4`,
`t`.`traderLoan`
from 
`tbl_traders` as `t`, 
`tbl_zone` as `z`,
`tbl_district` as `d`, 
`tbl_subcounty` as `s` 
where 
`t`.`traderRegion`  = `z`.`zoneCode`
and `t`.`display` like 'Yes%'
and `d`.`districtCode`  = `s`.`districtCode`
and `t`.`traderDistrict`  = `d`.`districtCode`
and `t`.`traderSubcounty`  = `s`.`subcountyCode`
order by `t`.`tbl_tradersId` desc";
$result = mysql_query($sql) or die(http(__line__));

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
		$traderCode=($row['traderCode']<>'')?"<td align='right'>".$row['traderCode']."</td>":"";
		
        $data.="<td>&nbsp;&nbsp;{$_column}</td>";
    }
    $data.="</tr>";
}

$data.="</table>";

echo $data;

}
?>