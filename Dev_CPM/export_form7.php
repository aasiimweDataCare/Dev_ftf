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


$sql = "select
`f`.`farmersName`, `f`.`farmersDob`, `f`.`farmersVillage`,
`f`.`farmersSex`, `f`.`reportingPeriod`, `f`.`farmersTel`, `f`.`farmers_e_pay`,
`v`.`vAgentName`,`v`.`vAgentCode`,
`v`.`vAgentCropBeans`,`v`.`vAgentCropMaize`,`v`.`vAgentCropCoffee`,
`v`.`vAgentTel`,
`vg`.`groupName`, `vg`.`groupCode`, `vg`.`groupStatus`,
`t`.`traderName`, `t`.`traderCode`,
`d`.`districtName` as `District`,`s`.`subcountyName` as `Subcounty`, `vg`.`groupVillage`
from
`tbl_district` as `d`,
`tbl_subcounty` as `s`,
`tbl_traders` as `t` 
left join `tbl_villageagents` as `v` on `v`.`tbl_tradersId`=`t`.`tbl_tradersId`
left join `tbl_villageagent_groups` as `vg` on `vg`.`tbl_villageAgentId`=`v`.`tbl_villageAgentId`
left join `tbl_farmers` as `f` on `f`.`tbl_villageagent_groupsId`=`vg`.`tbl_villageagent_groupsId`
where `d`.`districtCode`=`vg`.`groupDistrict`
and `s`.`subcountyCode`=`vg`.`groupSubcounty` order by `f`.`farmersName` asc";
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
	//check if the column deserves space
	if (ctype_digit($_column)) {
        $data.="<td align='right'>{$_column}</td>";
    } else {
        $data.="<td align='right'>&nbsp;{$_column}</td>";
    }
        //$data.="<td align='right'>&nbsp;{$_column}</td>";
	
	
	
    }
    $data.="</tr>";
}

$data.="</table>";

echo $data;
}
?>