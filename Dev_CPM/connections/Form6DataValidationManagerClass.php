<?php
class Form6DataValidationManager
{
    var $query;
    var $role;


    function Form6DataValidationManager($query)
    {
        $this->query;
    }

	function formatDateString($dateString){
		$formatedDate= @date('Y-m-d', @strtotime($dateString));
		return $formatedDate;
		
	}

function validateRelationship($string){
switch(true){
	case $string==1:
	$data.="<td>Head</td>";
	break;
	
	
	case $string==2:
	$data.="<td>Spouse/Partner</td>";
	break;

	case $string==3:
	$data.="<td>Child</td>";
	break;

	case $string==4:
	$data.="<td>Grandchild</td>";
	break;

	case $string==5:
	$data.="<td>Other relative</td>";
	break;

	case $string==6:
	$data.="<td>Other Not related</td>";
	break;
	
	default:
	$data.="<td>".$string."</td>";
	break;
}
return $data;

}



function validateMarital_Status($string){
switch(true){
	case $string==1:
	$data.="<td>Single</td>";
	break;
	
	
	case $string==2:
	$data.="<td>Married</td>";
	break;

	case $string==3:
	$data.="<td>Divorced/Separated</td>";
	break;

	case $string==4:
	$data.="<td>Widowed</td>";
	break;

	case $string==5:
	$data.="<td>Never Married</td>";
	break;

	default:
	$data.="<td >".$string."</td>";
	break;
}
return $data;

}


function validateAttended_School($string){
switch(true){
	case $string==1:
	$data.="<td>Single</td>";
	break;
	
	
	case $string==2:
	$data.="<td>Married</td>";
	break;

	case $string==3:
	$data.="<td>Divorced/Separated</td>";
	break;

	case $string==4:
	$data.="<td>Widowed</td>";
	break;

	case $string==5:
	$data.="<td>Never Married</td>";
	break;

	default:
	$data.="<td >".$string."</td>";
	break;
}
return $data;

}






function validateEducation_Complete($string){
switch(true){
	case $string==1:
	$data.="<td>Pre-primary</td>";
	break;
	
	
	case $string==2:
	$data.="<td>Primary (1-7)</td>";
	break;

	case $string==3:
	$data.="<td>O-level (S1-S4)</td>";
	break;

	case $string==4:
	$data.="<td>A-level(S5-S6)</td>";
	break;

	case $string==5:
	$data.="<td>Tertiary/ University</td>";
	break;

	default:
	$data.="<td >".$string."</td>";
	break;
}
return $data;

}



function validateHH_Gender($string){
switch(true){
	case $string==1:
	$data.="<td>Male</td>";
	break;
	
	
	case $string==2:
	$data.="<td>Female</td>";
	break;
	
	default:
	$data.="<td>".$string."</td>";
	break;
}
return $data;

}








function validateDateRange($dateString,$startDate,$endDate){
switch(true){
	case $dateString>$endDate:
	$data.="<td id='red'>".$dateString."<br/>Invalid Date</td>";
	break;
	
	case $dateString<$startDate:
	$data.="<td id='red'>".$dateString."<br/>Invalid Date</td>";
	break;
	
	default:
	$data.="<td>".$dateString."</td>";
	break;
}
return $data;

}





function validateFarmerCode($string){
switch(true){
	case $string<8650:
	$data.="<td id='red'>".$string."<br/>Invalid farmer code</td>";
	break;
	
	default:
	$data.="<td>".$string."</td>";
	break;
}
return $data;

}


function validateGender($string){
switch(true){
	case $string==1:
	$data.="<td>Male</td>";
	break;
	
	
	case $string==2:
	$data.="<td>Female</td>";
	break;
	
	default:
	$data.="<td id='red'>".$string." <br/>Invalid Farmer Gender</td>";
	break;
}
return $data;

}



function validateRegion($string){
switch(true){
	case $string==1:
	$data.="<td>Central</td>";
	break;
	
	
	case $string==2:
	$data.="<td>North</td>";
	break;
	
	case $string==3:
	$data.="<td>East</td>";
	break;

	case $string==4:
	$data.="<td>West</td>";
	break;

	default:
	$data.="<td id='red'>".$string." <br/>Invalid Farmer Region</td>";
	break;
}
return $data;

}

function validateNext($string){
switch(true){
	case $string==1:
	$data.="<td>Male</td>";
	break;
	
	
	case $string==2:
	$data.="<td>Female</td>";
	break;
	
	default:
	$data.="<td id='red'>".$string." <br/>Invalid Farmer Gender</td>";
	break;
}
return $data;

}


/* start Shaffic Methods */


function ApplyDataCleanUpGen12($dateString){
switch(true){
	case $dateString == 1:
	$data.="<td> Husband </td>";
	break;
	
	case $dateString == 2:
	$data.="<td> Wife </td>";
	break;

	case $dateString == 3:
	$data.="<td> Children </td>";
	break;
	case $dateString == 4:
	$data.="<td> All family members</td>";
	break;
	
	default:
	$data.="<td>".$dateString."</td>";
	break;
}
return $data;

}

function ApplyDataCleanUpGen10($dateString){
switch(true){
	case $dateString == 1:
	$data.="<td> Husband </td>";
	break;
	
	case $dateString == 2:
	$data.="<td> Wife </td>";
	break;

	case $dateString == 3:
	$data.="<td> Children </td>";
	break;

	case $dateString == 4:
	$data.="<td> Both Husband and Wife </td>";
	break;

	case $dateString == 5:
	$data.="<td> All family members</td>";
	break;
	
	default:
	$data.="<td>".$dateString."</td>";
	break;
}
return $data;

}

function ApplyDataCleanUpGen07($dateString){
$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){


switch(true){
	case $dd[$i] == 1:
	$dstring .="Radio,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Television,";
	break;

	case $dd[$i] == 3:
	$dstring .="Newspaper,";
	break;

	case $dd[$i] == 4:
	$dstring .="Meetings or workshops,";
	break;

	case $dd[$i] == 5:
	$dstring .="From fellow farmers,";
	break;
	
	case $dd[$i] == 6:
	$dstring .="Popular written versions of Government documents,";
	break;

	case $dd[$i] == 7:
	$dstring .="SMS on Mobile phone,";
	break;

	case $dd[$i] == 8:
	$dstring .="Internet,";
	break;

	case $dd[$i] == 9:
	$dstring .="Others";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}


function ApplyDataBoolen($dateString){
switch(true){
	case $dateString == 1:
	$data.="<td> Yes </td>";
	break;
	
	case $dateString == 2:
	$data.="<td> No </td>";
	break;
	default:
	$data.="<td>".$dateString."</td>";
	break;
}
return $data;

}




function ApplyDataCleanUpGen04($dateString){
$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){


switch(true){
	case $dd[$i] == 1:
	$dstring .="Buy from a reputable dealer,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Always demand a receipt,";
	break;

	case $dd[$i] == 3:
	$dstring .="Always keep the container,";
	break;

	case $dd[$i] == 4:
	$dstring .="Only buy from sealed containers,";
	break;

	case $dd[$i] == 5:
	$dstring .="Others ,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}


function ApplyDataCleanUpAwareness($dateString){
switch(true){
	case $dateString == 1:
	$data.="<td> Completely aware </td>";
	break;
	
	case $dateString == 2:
	$data.="<td> Largely aware </td>";
	break;

	case $dateString == 3:
	$data.="<td> Partly aware </td>";
	break;

	case $dateString == 4:
	$data.="<td> Slightly aware </td>";
	break;

	case $dateString == 5:
	$data.="<td> Not aware at all</td>";
	break;
	
	default:
	$data.="<td >".$dateString."</td>";
	break;
}
return $data;

}


function ApplyDataCleanUpTrained($dateString){
$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){


switch(true){
	case $dd[$i] == 1:
	$dstring .="Government Extension workers,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Fellow farmers,";
	break;

	case $dd[$i] == 3:
	$dstring .="Produce buyers (Trader/VA),";
	break;

	case $dd[$i] == 4:
	$dstring .="USAID/FTF CPMA,";
	break;

	case $dd[$i] == 5:
	$dstring .="Other NGOs/projects Specify";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}


function ApplyDataICT($dateString){
$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){


switch(true){
	case $dd[$i] == 1:
	$dstring .="Receiving agricultural related information on inputs ,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Receiving agricultural related information on management practices,";
	break;

	case $dd[$i] == 3:
	$dstring .="Receiving agricultural related information on markets,";
	break;

	case $dd[$i] == 4:
	$dstring .="Enlightened on prices of my produce,";
	break;

	case $dd[$i] == 5:
	$dstring .="Transfer of money,";
	break;
	
	case $dd[$i] == 6:
	$dstring .="Use as a bank,";
	break;

	case $dd[$i] == 7:
	$dstring .="Knowledge sharing/ training,";
	break;

	case $dd[$i] == 8:
	$dstring .="Weather updates,";
	break;

	case $dd[$i] == 9:
	$dstring .="Others";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td class='largest-cell-header'>".$dstring."</td>";
return $data;

}



function ApplyDataICTUsed($dateString){
$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){


switch(true){
	case $dd[$i] == 0:
	$dstring .="None,";
	break;
	
	case $dd[$i] == 1:
	$dstring .="Phone SMS,";
	break;

	case $dd[$i] == 2:
	$dstring .="Mobile money,";
	break;

	case $dd[$i] == 3:
	$dstring .="Mobile banking,";
	break;

	case $dd[$i] == 4:
	$dstring .="Mobile phone calls,";
	break;
	
	case $dd[$i] == 5:
	$dstring .="Computers,";
	break;

	case $dd[$i] == 6:
	$dstring .="Others,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}



function ApplyDataIrrigation($dateString){
$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){


switch(true){
	case $dd[$i] == 1:
	$dstring .="Lack of knowledge on irrigation water sources,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Lack capacity to store water for irrigation,";
	break;

	case $dd[$i] == 3:
	$dstring .="Rely on natural water sources for crop production,";
	break;

	case $dd[$i] == 4:
	$dstring .="High cost of irrigation,";
	break;

	case $dd[$i] == 5:
	$dstring .="Unavailability of irrigation tools,";
	break;
	
	case $dd[$i] == 6:
	$dstring .="High costs of maintenance,";
	break;

	case $dd[$i] == 7:
	$dstring .="Lack of skilled labour,";
	break;

	case $dd[$i] == 8:
	$dstring .="Insecure land tenure,";
	break;

	case $dd[$i] == 9:
	$dstring .="Lack of rights to water use as it is communally owned,";
	break;

	case $dd[$i] == 10:
	$dstring .="Other,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}

function ApplyDataIrrigationUsed($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 1:
	$dstring ="Flood,";
	break;
	
	case $dd[$i] == 2:
	$dstring ="Furrow,";
	break;

	case $dd[$i] == 3:
	$dstring ="Drip,";
	break;

	case $dd[$i] == 4:
	$dstring ="Bucket,";
	break;

	case $dd[$i] == 5:
	$dstring ="Sprinkler,";
	break;

	case $dd[$i] == 6:
	$dstring ="Other";
	break;
	
	default:
	$dstring =$dateString;
	break;
  }
}

$data ="<td>".$dstring."</td>";
return $data;

}

function validateDistrict($districtID){
$query_string="SELECT `districtName`,`districtCode` FROM `tbl_district` where `districtCode` =".$districtID;

$query_=mysql_query($query_string)or die(mysql_error().__line__);
$row=mysql_fetch_array($query_);
$max_records = mysql_num_rows($query_);
switch(true){
	case (!empty($districtID) and ($row['districtCode'] === $districtID)):
	$data ="<td>".$row['districtName']."</td>";
	break;

	default:
	$data.="<td id='red'>".$districtID." <br/>Invalid Farmer District</td>";
	break;

}
return $data;

}

function validateSubCountry($SubID){
$query_string="SELECT `subcountyName`,`subcountyCode` FROM `tbl_subcounty` where `subcountyCode` =".$SubID;

$query_=mysql_query($query_string)or die(mysql_error().__line__);
$row=mysql_fetch_array($query_);
$max_records = mysql_num_rows($query_);
switch(true){
	case (!empty($SubID) and ($row['subcountyCode'] === $SubID)):
	$data ="<td>".$row['subcountyName']."</td>";
	break;

	default:
	$data.="<td id='red'>".$SubID." <br/>Invalid Farmer Subcounty</td>";
	break;

}
return $data;

}

function validateProtectCounterfeit($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){


switch(true){
	case $dd[$i] == 1:
	$dstring .="Buy from a reputable dealer,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Always demand a receipt,";
	break;

	case $dd[$i] == 3:
	$dstring .="Always keep the container,";
	break;

	case $dd[$i] == 4:
	$dstring .="Only buy from sealed containers,";
	break;

	case $dd[$i] == 5:
	$dstring .="Others,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}


function validateReasonFakeFertilizer($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){


switch(true){
	case $dd[$i] == 1:
	$dstring .="I am receiving more information about fake products so I know how to avoid them,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="I am buying in bulk with other farmers,";
	break;

	case $dd[$i] == 3:
	$dstring .="I am using more trusted sources of supply,";
	break;

	case $dd[$i] == 4:
	$dstring .="Others,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}


function validateFakeAgroInputs($dateString){

$dd = $dateString;
$dstring ="";

switch(true){
	case $dd == 1:
	$dstring ="A great deal";
	break;
	
	case $dd == 2:
	$dstring ="Some";
	break;

	case $dd == 3:
	$dstring ="A little";
	break;

	case $dd == 4:
	$dstring ="none";
	break;

	default:
	$dstring =$dateString;
	break;
}

$data ="<td>".$dstring."</td>";
return $data;

}

function validateImprovedClimate($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 1:
	$dstring .="Use of improved seed varieties,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Irrigation,";
	break;

	case $dd[$i] == 3:
	$dstring .="Planting early maturing crop varieties,";
	break;

	case $dd[$i] == 4:
	$dstring .="Planting drought resistant varieties,";
	break;

	case $dd[$i] == 5:
	$dstring .="Mulching,";
	break;

	case $dd[$i] == 6:
	$dstring .="None";
	break;


	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}



function validatePHHChallege($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 0:
	$dstring .="None,";
	break;
	
	case $dd[$i] == 1:
	$dstring .="Storage space,";
	break;

	case $dd[$i] == 2:
	$dstring .="Transporting produce from field,";
	break;

	case $dd[$i] == 3:
	$dstring .="Threshing,";
	break;

	case $dd[$i] == 4:
	$dstring .="Cost of fumigations,";
	break;

	case $dd[$i] == 5:
	$dstring .="Pests- insects and rats,";
	break;

	case $dd[$i] == 6:
	$dstring .="Theft,";
	break;

	case $dd[$i] == 7:
	$dstring .="Lack of fumigation service providers,";
	break;

	case $dd[$i] == 8:
	$dstring .="Lack of equipment,";
	break;

	case $dd[$i] == 9:
	$dstring .="Packaging materials,";
	break;

	case $dd[$i] == 10:
	$dstring .="Drying/cooling facilities,";
	break;

	case $dd[$i] == 11:
	$dstring .="Others";
	break;


	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}



function validateMainPHHChallege($dateString){

$dd = $dateString;
$dstring ="";

switch(true){
	case $dd == 0:
	$dstring ="None";
	break;
	
	case $dd == 1:
	$dstring ="Storage space";
	break;

	case $dd == 2:
	$dstring ="Transporting produce from field";
	break;

	case $dd == 3:
	$dstring ="Threshing";
	break;

	case $dd == 4:
	$dstring ="Cost of fumigations";
	break;

	case $dd == 5:
	$dstring ="Pests- insects and rats";
	break;

	case $dd == 6:
	$dstring ="Theft";
	break;

	case $dd == 7:
	$dstring ="Lack of fumigation service providers";
	break;

	case $dd == 8:
	$dstring ="Lack of equipment";
	break;

	case $dd == 9:
	$dstring ="Packaging materials";
	break;

	case $dd == 10:
	$dstring ="Drying/cooling facilities";
	break;

	case $dd == 11:
	$dstring ="Others";
	break;


	default:
	$dstring =$dateString;
	break;
}


$data ="<td>".$dstring."</td>";
return $data;

}


function validatePHHEquipment($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 1:
	$dstring .="hand/manual thresher,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="motorized Sheller/thresher,";
	break;

	case $dd[$i] == 3:
	$dstring .="Grinding machine,";
	break;

	case $dd[$i] == 4:
	$dstring .="Huller,";
	break;

	case $dd[$i] == 5:
	$dstring .="Grader/sorter,";
	break;

	case $dd[$i] == 6:
	$dstring .="Other,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;


}


function validatePHHTechonology($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 1:
	$dstring .="Threshing,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Shelling,";
	break;

	case $dd[$i] == 3:
	$dstring .="Cleaning,";
	break;

	case $dd[$i] == 4:
	$dstring .="Grading/separation/sorting,";
	break;

	case $dd[$i] == 5:
	$dstring .="Drying/dehydration,";
	break;

	case $dd[$i] == 6:
	$dstring .="Cooling,";
	break;

	case $dd[$i] == 7:
	$dstring .="Packing,";
	break;

	case $dd[$i] == 8:
	$dstring .="Fumigation,";
	break;

	case $dd[$i] == 9:
	$dstring .="Winnowing,";
	break;

	case $dd[$i] == 10:
	$dstring .="Hurling,";
	break;

	case $dd[$i] == 11:
	$dstring .="Other,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}


function validateStoreProduce($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 1:
	$dstring .="Traditional granaries/cribs,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Indoor-bags,";
	break;

	case $dd[$i] == 3:
	$dstring .="Grain pic bags,";
	break;

	case $dd[$i] == 4:
	$dstring .="Using Silos/metallic tanks,";
	break;

	case $dd[$i] == 5:
	$dstring .="Indoor-open storage,";
	break;

	case $dd[$i] == 6:
	$dstring .="Outdoor-open storage,";
	break;

	case $dd[$i] == 7:
	$dstring .="Improved cribs,";
	break;

	case $dd[$i] == 8:
	$dstring .="Certified warehouses,";
	break;

	case $dd[$i] == 9:
	$dstring .="Other warehouse/store,";
	break;

	case $dd[$i] == 10:
	$dstring .="Others,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}



function validateDryProduce($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 1:
	$dstring .="On the ground,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="On tarpaulins ,";
	break;

	case $dd[$i] == 3:
	$dstring .="On iron sheets,";
	break;

	case $dd[$i] == 4:
	$dstring .="On concrete/yards,";
	break;

	case $dd[$i] == 5:
	$dstring .="Cribs,";
	break;

	case $dd[$i] == 6:
	$dstring .="Hanging,";
	break;

	case $dd[$i] == 7:
	$dstring .="Mechanical dryer,";
	break;

	case $dd[$i] == 8:
	$dstring .="In the field,";
	break;

	case $dd[$i] == 9:
	$dstring .="Did not dry,";
	break;

	case $dd[$i] == 10:
	$dstring .="Others,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}




function validatePurchasedAgroInputs($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 1:
	$dstring .="Own seed";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Purchase from local market,";
	break;

	case $dd[$i] == 3:
	$dstring .="Purchase from agro-dealers stores/stockiest,";
	break;

	case $dd[$i] == 4:
	$dstring .="Stockist through VARM,";
	break;

	case $dd[$i] == 5:
	$dstring .="Stockist,";
	break;

	case $dd[$i] == 6:
	$dstring .="Community seed bulking /demo farmers,";
	break;

	case $dd[$i] == 7:
	$dstring .="Trader /Village Agent,";
	break;

	case $dd[$i] == 8:
	$dstring .="Fellow farmer/ Neighbor/ Relative,";
	break;

	case $dd[$i] == 9:
	$dstring .="Container Village in Kampala,";
	break;

	case $dd[$i] == 10:
	$dstring .="Others,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;

}

function validateReasonNotAgroPractices($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 1:
	$dstring .="Costly to implement,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Labor intensive,";
	break;

	case $dd[$i] == 3:
	$dstring .="Lack of knowledge about  agro inputs/technologies,";
	break;

	case $dd[$i] == 4:
	$dstring .="Frustrated by counterfeit agro inputs,";
	break;

	case $dd[$i] == 5:
	$dstring .="No access to market,";
	break;

	case $dd[$i] == 6:
	$dstring .="Don’t have access for credit and inputs (including improved seeds),";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;


}



function validateBenefitsAgroPractices($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 0:
	$dstring .="None,";
	break;
	
	case $dd[$i] == 1:
	$dstring .="Yield increment/ good yield,";
	break;

	case $dd[$i] == 2:
	$dstring .="Labor saving,";
	break;

	case $dd[$i] == 3:
	$dstring .="Pests and disease control,";
	break;

	case $dd[$i] == 4:
	$dstring .="Drought tolerant,";
	break;

	case $dd[$i] == 5:
	$dstring .="Early Maturity,";
	break;

	case $dd[$i] == 6:
	$dstring .="Affordable cost of agro inputs,";
	break;

	case $dd[$i] == 7:
	$dstring .="Value addition (better value (price) for produce),";
	break;

	case $dd[$i] == 8:
	$dstring .="Better know-how/knowledge in agricultural production,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;


}


function validateSourceMechanization($string){
switch(true){
	case $string==1:
	$data.="<td>Owned</td>";
	break;

	case $string==2:
	$data.="<td>Hired</td>";
	break;

	case $string==2:
	$data.="<td>Borrowed</td>";
	break;

	case $string==2:
	$data.="<td>Others</td>";
	break;
	
	default:
	$data ="<td>".$string."</td>";
	break;
}
return $data;

}



function validateUsedMechanization($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 1:
	$dstring .="None,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Planter,";
	break;

	case $dd[$i] == 3:
	$dstring .="Weeder,";
	break;

	case $dd[$i] == 4:
	$dstring .="Harvester,";
	break;

	case $dd[$i] == 5:
	$dstring .="Thresher,";
	break;

	case $dd[$i] == 6:
	$dstring .="Disc Plough (Tractor),";
	break;

	case $dd[$i] == 7:
	$dstring .="Ox plough,";
	break;

	case $dd[$i] == 8:
	$dstring .="Drier ,";
	break;

	case $dd[$i] == 9:
	$dstring .="Harrower,";
	break;


	case $dd[$i] == 10:
	$dstring .="Others,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td>".$dstring."</td>";
return $data;


}



function validateTypeOfSeeds($string){
switch(true){
	case $string==1:
	$data.="<td>Traditional</td>";
	break;

	case $string==2:
	$data.="<td>Improved Variety</td>";
	break;

	default:
	$data ="<td>".$string."</td>";
	break;
}
return $data;

}


function validateCroppingsystem($string){
switch(true){
	case $string==1:
	$data.="<td>Pure stand</td>";
	break;

	case $string==2:
	$data.="<td>Inter-cropped</td>";
	break;

	default:
	$data ="<td>".$string."</td>";
	break;
}
return $data;

}


function validateTypeCoffee($string){
switch(true){
	case $string==1:
	$data.="<td>Robusta</td>";
	break;

	case $string==2:
	$data.="<td>Arabic</td>";
	break;

	default:
	$data ="<td>".$string."</td>";
	break;
}
return $data;

}



function validateGoodPratcicesTrained($dateString){

$dd = explode(" ",$dateString);
$dstring ="";
for ($i=0;$i<count($dd);$i++){

switch(true){
	case $dd[$i] == 1:
	$dstring .="Improved variety,";
	break;
	
	case $dd[$i] == 2:
	$dstring .="Timely planting,";
	break;

	case $dd[$i] == 3:
	$dstring .="Proper spacing,";
	break;

	case $dd[$i] == 4:
	$dstring .="Timely weeding,";
	break;

	case $dd[$i] == 5:
	$dstring .="Water reservoirs/Water conservation,";
	break;

	case $dd[$i] == 6:
	$dstring .="Better access to inputs,";
	break;

	case $dd[$i] == 7:
	$dstring .="Proper application of fertilizer,";
	break;

	case $dd[$i] == 8:
	$dstring .="Conservation Agriculture,";
	break;

	case $dd[$i] == 9:
	$dstring .="Herbicide application,";
	break;

	case $dd[$i] == 10:
	$dstring .="Fungicide application,";
	break;

	case $dd[$i] == 11:
	$dstring .="Insecticide application,";
	break;

	case $dd[$i] == 12:
	$dstring .="Timely harvesting,";
	break;

	case $dd[$i] == 13:
	$dstring .="Grain drying using tarpaulins, creeps and raised platforms,";
	break;

	case $dd[$i] == 14:
	$dstring .="Threshers,";
	break;

	case $dd[$i] == 15:
	$dstring .="Manual Shellers,";
	break;

	case $dd[$i] == 16:
	$dstring .="Motorized Shellers,";
	break;

	case $dd[$i] == 17:
	$dstring .="Wet processing,";
	break;

	case $dd[$i] == 18:
	$dstring .="Dry processing,";
	break;

	case $dd[$i] == 19:
	$dstring .="Grain storage facility,";
	break;

	case $dd[$i] == 20:
	$dstring .="Small scale irrigation,";
	break;

	case $dd[$i] == 21:
	$dstring .="Post-harvest handling,";
	break;

	case $dd[$i] == 22:
	$dstring .="Agro processing,";
	break;

	case $dd[$i] == 23:
	$dstring .="Market information,";
	break;

	case $dd[$i] == 24:
	$dstring .="Record keeping,";
	break;

	case $dd[$i] == 25:
	$dstring .="Business planning,";
	break;

	case $dd[$i] == 26:
	$dstring .="Credit access,";
	break;

	case $dd[$i] == 27:
	$dstring .="Warehouse receipt system,";
	break;

	default:
	$dstring .=$dateString;
	break;
}
}

$data ="<td class='largest-cell-header-form6'>".$dstring."</td>";
return $data;


}



	
	/* end Shaffic Methods */
	
/* start Apollo methods */

function validateMaizeProductionVC($string){
	switch(true){
		case (!empty($string)):
		$data.=Form6DataValidationManager::ApplyDataBoolen($string);
		break;

		default:
		$data.="<td id='orange'>".$string." <br/>Warning!! Expected Maize Response</td>";
		break;

		
	}

return $data;
}


/* end Apollo methods */
	
}
/* Form6DataValidationManager(); */


?>