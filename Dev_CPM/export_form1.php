<?php

//if(isset($_GET['linkvar']==''))
require_once('connections/lib_connect.php');
 
#echo "\n<h3>COMMUNITY MAPPING : ".substr(strtoupper($_GET['linkvar']),7,100)." </h3>\n"; header("Cache-control: private"); 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=CPM_file.xls");
header("Content-Description: PHP Generated Data");
header("Pragma: no-cache");
header("Expires: 0"); 
#header("Cache-control: private"); 
//echo "\n<img src='images/logo100%.gif' height=99 width='100%' />\n";


setup_form1($_GET['semi_annual'],$_GET['year'],$_GET['format']);




//setup_farmers
function setup_form1($reportingPeriod,$year,$format){

$n=1; 
$_SESSION['semi_annual']='';
$_SESSION['staffyear']=$year;
$_SESSION['reportingPeriod']=$reportingPeriod;


$sql = "SELECT `d`.`districtName` as `District`,`s`.`subcountyName` as `Subcounty`,
`pa`.`ParishName` as `Parish`,
`t`.`trainingVillage` as `Village`, `t`.`trainingDate` as `Training Date`,
`m`.`name` as `Main value chain`, `f`.`focusName`as `Training Focus`,
`a`.`audienceName` as `Target Audience`, `t`.`pat_recommendations` as `Recommendations`,
`p`.`name` as `Participant Name`,
`p`.`age` as `Participant Age`,
`p`.`sex` as `Participant Sex`,
`p`.`status` as `Participant Status`,
`p`.`village` as `Participant Village`,
`l`.`codeName` as `Type of Individual`,
`p`.`telephone` as `Participant Tel`

FROM `tbl_lookup` as `l`,
 `tbl_mainvaluechain` as `m`,
`tbl_trainingfocus` as `f`,
`tbl_targetaudience` as `a`,
`tbl_district` as `d`,
`tbl_subcounty` as `s`,
`tbl_parish` as `pa`,
`tbl_training` as `t` left join `tbl_participants` as `p` on `p`.`trainingId`=`t`.`tbl_trainingId`

where `d`.`districtCode`=`t`.`district`
and `s`.`subcountyCode`=`t`.`subcounty`
and `pa`.`ParishCode`=`t`.`parish`
and `t`.`mainValueChain`=`m`.`tbl_chainId`
and `t`.`trainingFocus`=`f`.`tbl_focusId`
and `t`.`targetAudience`=`a`.`tbl_audienceId`
and `l`.`classCode`=25
and `l`.`code`=`p`.`typeOfIndividual`";
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