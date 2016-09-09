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


$sql = "select 
`p`.*,
`q`.*,
`b`.*,
`c`.*,
`m`.* 
from `tbl_frm6particulars` as `p`
join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
order by `p`.`pk_patid` desc
";

 $sqlTemp="select
`y`.`nameofBusiness`,
substring(`y`.`valueChain`, 3) as `ValueChain`,
`y`.`year`,
`y`.`reportingPeriod`,
`y`.`sexBusinessOwner`,
`y`.`num_youthAttachedFemaleNew`,
`y`.`num_youthAttachedFemaleOld`,
`y`.`num_youthAttachedMaleNew`,
`y`.`num_youthAttachedMaleOld`,
`y`.`num_youthAttachedTotalNew`,
`y`.`num_youthAttachedTotalOld`,
`y`.`fromDate`,
`y`.`toDate`,
`y`.`anticipatedOutcome`,
`y`.`CompiledBy`,
`y`.`ReviewedBy`,
`y`.`SubmittedBy`,
`y`.`DateSubmission`,
`y`.`updatedby`,
`y`.`apprenticeShip`,
`y`.`reportingMonth`,
REPLACE((DATEDIFF( `y`.`fromDate`,`y`.`toDate`)), '-', '') as DurationInDays,
`Yj`.`dateOfEngagement` as `dateOfEngagement_Yj`,
`Yj`.`nameOfJobHolder` as `nameOfJobHolder_Yj`,
`Yj`.`sexOfJobHolder` as `sexOfJobHolder_Yj`,
`Yj`.`timeSpentOnJob` as `timeSpentOnJob_Yj`
from `tbl_youthapprentice` as `y` join 	tbl_apprenticeship_jobHolder as `Yj`
on (`y`.`tbl_youthapprenticeId` = `Yj`.`apprenticeship_id`)
order BY `y`.`tbl_youthapprenticeId` desc";



$result = mysql_query($sqlTemp) or die(http(38));

// Print the column names as the headers of a table
$data.="<table border=1 cellspacing=2 cellpadding=2>";
$data.="<tr>";
for($i = 0; $i < mysql_num_fields($result); $i++) {
    $field_info = mysql_fetch_field($result, $i);
    $data.="<th>{$field_info->name}</th>";
}
$data.="</tr>";

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