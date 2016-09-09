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


setup_form4($_GET['semi_annual'],$_GET['year'],$_GET['format']);




//setup_farmers
function setup_form4($reportingPeriod,$year,$format){

$n=1; 
$_SESSION['semi_annual']='';
$_SESSION['staffyear']=$year;
$_SESSION['reportingPeriod']=$reportingPeriod;


$sql = "select
`w` .`tbl_form4_tradersId`,
`w` .`tbl_traderId`, 
`w` .`year`,
case
	when `w` .`reportingPeriod` = 'Oct - Mar' then 'Oct 2014 - Mar 2015'
else 'null'
end 
as  `reportingPeriod`,
`w` .`vaSupplyChain`,
`w` .`vaSupplyChainDetails`,
`w` .`numCbo`, 
`w` .`numCboDetails`,
`w` .`volMaizePurchased`, 
`w` .`volMaizePurchasedDetails`,
`w` .`volCoffeePurchased`,
`w` .`volCoffeePurchasedDetails`,
`w` .`volBeansPurchased`,
`w` .`volBeansPurchasedDetails`,
`w` .`volMaizeEx`,
`w` .`volMaizeExDetails`,
`w` .`volCoffeeEx`, 
`w` .`volCoffeeExDetails`,
`w` .`volBeansEx`, 
`w` .`volBeansExDetails`, 
`w` .`epayRecieved`,
`w` .`epayRecievedDetails`,
`w` .`epayMade`, 
`w` .`epayMadeDetails`,
`w` .`storageCapNew`,
`w` .`storageCapNewDetails`, 
`w` .`storageCapImproved`, 
`w` .`storageCapImprovedDetails`,
`w` .`CompiledBy`,
`w` .`ReviewedBy`, 
`w` .`SubmittedBy`,
`w` .`DateSubmission`,
`w` .`updatedby`,
`w` .`dateCompiled`,
`w` .`epayMadeFifthQuarterMonth`,
`w` .`epayMadeFirstQuarterMonth`,
`w` .`epayMadeFourthQuarterMonth`, 
`w` .`epayMadeSecondQuarterMonth`,
`w` .`epayMadeSixthQuarterMonth`, 
`w` .`epayMadeThirdQuarterMonth`,
`w` .`epayRecievedFifthQuarterMonth`, 
`w` .`epayRecievedFirstQuarterMonth`,
`w` .`epayRecievedFourthQuarterMonth`,
`w` .`epayRecievedSecondQuarterMonth`,
`w` .`epayRecievedSixthQuarterMonth`,
`w` .`epayRecievedThirdQuarterMonth`, 
`w` .`numCboFifthQuarterMonth`,
`w` .`numCboFirstQuarterMonth`, 
`w` .`numCboFourthQuarterMonth`, 
`w` .`numCboSecondQuarterMonth`, 
`w` .`numCboSixthQuarterMonth`,
`w` .`numCboThirdQuarterMonth`,
`w` .`personInterviewed`,
`w` .`telephoneInterviewed`, 
`w` .`titleCompiledBy`,
`w` .`titleOfPersonInterviewed`,
`w` .`vaSupplyChainFifthQuarterMonth`, 
`w` .`vaSupplyChainFirstQuarterMonth`, 
`w` .`vaSupplyChainFourthQuarterMonth`,
`w` .`vaSupplyChainSecondQuarterMonth`, 
`w` .`vaSupplyChainSixthQuarterMonth`, 
`w` .`vaSupplyChainThirdQuarterMonth`, 
`w` .`volBeansExFifthQuarterMonth`,
`w` .`volBeansExFirstQuarterMonth`,
`w` .`volBeansExFourthQuarterMonth`,
`w` .`volBeansExSecondQuarterMonth`,
`w` .`volBeansExSixthQuarterMonth`, 
`w` .`volBeansExThirdQuarterMonth`,
`w` .`volBeansExUgx`,
`w` .`volBeansExUgxDetails`,
`w` .`volBeansExUgxFifthQuarterMonth`,
`w` .`volBeansExUgxFirstQuarterMonth`,
`w` .`volBeansExUgxFourthQuarterMonth`,
`w` .`volBeansExUgxSecondQuarterMonth`,
`w` .`volBeansExUgxSixthQuarterMonth`,
`w` .`volBeansExUgxThirdQuarterMonth`,
`w` .`volBeansPurchasedFifthQuarterMonth`,
`w` .`volBeansPurchasedFirstQuarterMonth`,
`w` .`volBeansPurchasedFourthQuarterMonth`, 
`w` .`volBeansPurchasedSecondQuarterMonth`,
`w` .`volBeansPurchasedSixthQuarterMonth`, 
`w` .`volBeansPurchasedThirdQuarterMonth`,
`w` .`volCoffeeExFifthQuarterMonth`, 
`w` .`volCoffeeExFirstQuarterMonth`, 
`w` .`volCoffeeExFourthQuarterMonth`,
`w` .`volCoffeeExSecondQuarterMonth`, 
`w` .`volCoffeeExSixthQuarterMonth`, 
`w` .`volCoffeeExThirdQuarterMonth`,
`w` .`volCoffeeExUgx`,
`w` .`volCoffeeExUgxDetails`,
`w` .`volCoffeeExUgxFifthQuarterMonth`,
`w` .`volCoffeeExUgxFirstQuarterMonth`,
`w` .`volCoffeeExUgxFourthQuarterMonth`,
`w` .`volCoffeeExUgxSecondQuarterMonth`,
`w` .`volCoffeeExUgxSixthQuarterMonth`, 
`w` .`volCoffeeExUgxThirdQuarterMonth`,
`w` .`volCoffeePurchasedFifthQuarterMonth`,
`w` .`volCoffeePurchasedFirstQuarterMonth`,
`w` .`volCoffeePurchasedFourthQuarterMonth`,
`w` .`volCoffeePurchasedSecondQuarterMonth`,
`w` .`volCoffeePurchasedSixthQuarterMonth`,
`w` .`volCoffeePurchasedThirdQuarterMonth`,
`w` .`volMaizeExFifthQuarterMonth`,
`w` .`volMaizeExFirstQuarterMonth`,
`w` .`volMaizeExFourthQuarterMonth`, 
`w` .`volMaizeExSecondQuarterMonth`, 
`w` .`volMaizeExSixthQuarterMonth`, 
`w` .`volMaizeExThirdQuarterMonth`, 
`w` .`volMaizeExUgx`, 
`w` .`volMaizeExUgxDetails`, 
`w` .`volMaizeExUgxFifthQuarterMonth`, 
`w` .`volMaizeExUgxFirstQuarterMonth`, 
`w` .`volMaizeExUgxFourthQuarterMonth`,
`w` .`volMaizeExUgxSecondQuarterMonth`,
`w` .`volMaizeExUgxSixthQuarterMonth`,
`w` .`volMaizeExUgxThirdQuarterMonth`,
`w` .`volMaizePurchasedFifthQuarterMonth`,
`w` .`volMaizePurchasedFirstQuarterMonth`,
`w` .`volMaizePurchasedFourthQuarterMonth`,
`w` .`volMaizePurchasedSecondQuarterMonth`, 
`w` .`volMaizePurchasedSixthQuarterMonth`,
`w` .`volMaizePurchasedThirdQuarterMonth`,
`w` .`display`,
`x`.`traderName`, 
	TIMESTAMPDIFF(YEAR,`x`.`traderDob`,CURDATE()) AS `traderAge`,
	 concat(space(4),(`x`.`traderCode`)) as `traderCode`,
	`x`.`traderSex`, 
	`x`.`traderDistrict`,
	`x`.`traderSubcounty`,
	`x`.`traderVillage`,
	`d`.`districtName`,
	`s`.`districtCode`,
	`s`.`subcountyCode`,
	`s`.`subcountyName`
	from 
	`tbl_form4_traders` as `w`,
	`tbl_traders` as `x`,
	`tbl_district` as `d`,
	`tbl_subcounty` as `s`
	where `w`.`tbl_traderId` = `x`.`tbl_tradersId`
	and `w`.`reportingPeriod` like 'Oct - Mar%'
	and `w`.`year` = '2015'
	and `d`.`districtCode`=`x`.`traderDistrict`
	and `d`.`Display`='Yes' 
	and `d`.`districtCode`=`s`.`districtCode`
	and `s`.`subcountyCode`=`x`.`traderSubcounty`
	and `s`.`Display`='Yes'";
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
        $data.="<td align='right'>{$_column}</td>";
    }
    $data.="</tr>";
}

$data.="</table>";

echo $data;

}
?>