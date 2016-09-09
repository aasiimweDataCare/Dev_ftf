<?php 
//Coffee Percentage as part of block financial year block figure
if(!defined("targets_coffeePercentage"))
	$cPercentage=(34/100);
	define("targets_coffeePercentage","".$cPercentage."");
//Coffee Percentage by region		
if(!defined("targets_coffeePercentageNorth"))
	$cPercentageNorth=(5/100);
	define("targets_coffeePercentageNorth","".$cPercentageNorth."");
	
if(!defined("targets_coffeePercentageWest"))
	$cPercentageWest=(30/100);
	define("targets_coffeePercentageWest","".$cPercentageWest."");	
	
if(!defined("targets_coffeePercentageEast"))
	$cPercentageEast=(25/100);
	define("targets_coffeePercentageEast","".$cPercentageEast."");
	
if(!defined("targets_coffeePercentageCentral"))
	$cPercentageCentral=(40/100);
	define("targets_coffeePercentageCentral","".$cPercentageCentral."");
	
//Maize Percentage as part of block financial year block figure
if(!defined("targets_maizePercentage"))
	$mPercentage=(50/100);
	define("targets_maizePercentage","".$mPercentage."");
	
//Maize Percentage by region	
if(!defined("targets_maizePercentageNorth"))
	$mPercentageNorth=(20/100);
	define("targets_maizePercentageNorth","".$mPercentageNorth."");
	
if(!defined("targets_maizePercentageWest"))
	$mPercentageWest=(15/100);
	define("targets_maizePercentageWest","".$mPercentageWest."");	
	
if(!defined("targets_maizePercentageEast"))
	$mPercentageEast=(40/100);
	define("targets_maizePercentageEast","".$mPercentageEast."");
	
if(!defined("targets_maizePercentageCentral"))
	$mPercentageCentral=(25/100);
	define("targets_maizePercentageCentral","".$mPercentageCentral."");		

//Beans Percentage as part of block financial year block figure
if(!defined("targets_beansPercentage"))
	$bPercentage=(16/100);
	define("targets_beansPercentage","".$bPercentage."");
	
//Beans Percentage by region	
if(!defined("targets_beansPercentageNorth"))
	$bPercentageNorth=(15/100);
	define("targets_beansPercentageNorth","".$bPercentageNorth."");
	
if(!defined("targets_beansPercentageWest"))
	$bPercentageWest=(30/100);
	define("targets_beansPercentageWest","".$bPercentageWest."");	
	
if(!defined("targets_beansPercentageEast"))
	$bPercentageEast=(20/100);
	define("targets_beansPercentageEast","".$bPercentageEast."");
	
if(!defined("targets_beansPercentageCentral"))
	$bPercentageCentral=(35/100);
	define("targets_beansPercentageCentral","".$bPercentageCentral."");	
	
require_once(dirname(__FILE__).'/lib_connect.php');
//require_once(dirname(__FILE__).'/ValidationManagerClass.php');
require_once(dirname(__FILE__).'/PerfMapsDataMiningClass.php');

//Coffee targets methods	
function targetsCoffeeNorth($totalTarget){
	$tCoffeeByPercentage = targets_coffeePercentage * $totalTarget;
	$finaltargetCoffeeByPercentageNorth = (targets_coffeePercentageNorth * $tCoffeeByPercentage);
	return $finaltargetCoffeeByPercentageNorth;
	
	}

function targetsCoffeeWest($totalTarget){
	$tCoffeeByPercentage =targets_coffeePercentage * $totalTarget;
	$finaltargetCoffeeByPercentageWest = (targets_coffeePercentageWest * $tCoffeeByPercentage);
	return $finaltargetCoffeeByPercentageWest;
	
	}

function targetsCoffeeEast($totalTarget){
	$tCoffeeByPercentage=targets_coffeePercentage * $totalTarget;
	$finaltargetCoffeeByPercentageEast= (targets_coffeePercentageEast * $tCoffeeByPercentage);
	return $finaltargetCoffeeByPercentageEast;
	
	}

function targetsCoffeeCentral($totalTarget){
	$tCoffeeByPercentage=targets_coffeePercentage * $totalTarget;
	$finaltargetCoffeeByPercentageCentral= (targets_coffeePercentageCentral * $tCoffeeByPercentage);
	return $finaltargetCoffeeByPercentageCentral;
	
	}

//Maize targets methods	
function targetsMaizeNorth($totalTarget){
	$tMaizeByPercentage = targets_maizePercentage * $totalTarget;
	$finaltargetMaizeByPercentageNorth = (targets_maizePercentageNorth * $tMaizeByPercentage);
	return $finaltargetMaizeByPercentageNorth;
	
	}

function targetsMaizeWest($totalTarget){
	$tMaizeByPercentage =targets_maizePercentage * $totalTarget;
	$finaltargetMaizeByPercentageWest = (targets_maizePercentageWest * $tMaizeByPercentage);
	return $finaltargetMaizeByPercentageWest;
	
	}

function targetsMaizeEast($totalTarget){
	$tMaizeByPercentage=targets_maizePercentage * $totalTarget;
	$finaltargetMaizeByPercentageEast= (targets_maizePercentageEast * $tMaizeByPercentage);
	return $finaltargetMaizeByPercentageEast;
	
	}

function targetsMaizeCentral($totalTarget){
	$tMaizeByPercentage=targets_maizePercentage * $totalTarget;
	$finaltargetMaizeByPercentageCentral= (targets_maizePercentageCentral * $tMaizeByPercentage);
	return $finaltargetMaizeByPercentageCentral;
	
	}

//Beans targets methods	
function targetsBeansNorth($totalTarget){
	$tBeansByPercentage = targets_beansPercentage * $totalTarget;
	$finaltargetBeansByPercentageNorth = (targets_beansPercentageNorth * $tBeansByPercentage);
	return $finaltargetBeansByPercentageNorth;
	
	}

function targetsBeansWest($totalTarget){
	$tBeansByPercentage =targets_beansPercentage * $totalTarget;
	$finaltargetBeansByPercentageWest = (targets_beansPercentageWest * $tBeansByPercentage);
	return $finaltargetBeansByPercentageWest;
	
	}

function targetsBeansEast($totalTarget){
	$tBeansByPercentage=targets_beansPercentage * $totalTarget;
	$finaltargetBeansByPercentageEast= (targets_beansPercentageEast * $tBeansByPercentage);
	return $finaltargetBeansByPercentageEast;
	
	}

function targetsBeansCentral($totalTarget){
	$tBeansByPercentage=targets_beansPercentage * $totalTarget;
	$finaltargetBeansByPercentageCentral= (targets_beansPercentageCentral * $tBeansByPercentage);
	return $finaltargetBeansByPercentageCentral;
	
	}

function ColorCodingByYears($percentage,$colspan,$rowspan=1,$class){
			   if($percentage<=49){
			  $data.="<td class='".$class."' align='right' colspan='".$colspan."' rowspan='".$rowspan."'><font color='red'>".$percentage."%</font></td>";
			 }
			 elseif($percentage>=50 && $percentage<=79){
			  /* $percentage2=50;
			  //case $percentage>=50 && $percentage<=79:
			 case ($percentage2+$percentage)<=79: */
			  $data.="<td class='".$class."' align='right' colspan='".$colspan."' rowspan='".$rowspan."'><font color='#B50F2F'>".$percentage."%</font></td>";
			  }elseif($percentage>=80){
			  $data.="<td class='".$class."' align='right' colspan='".$colspan."' rowspan='".$rowspan."'><font color='green'>".$percentage."%</font></td>";
			 }
			  else{
			  $data.="<td class='".$class."' align='right' colspan='".$colspan."' rowspan='".$rowspan."'><font color='green'>".$percentage."%</font></td>";
			 
			  }
 return $data;
 
 }

function GrossMarginPerUnitOfLandRecomputed($TP,$VS,$QS,$IC,$UP,$ExFactor){
//(((TP*(VS/QS))-IC)/UP)
//Variable initialize
$TP =($TP == 0)?1:$TP;
$VS =($VS == 0)?1:$VS;
$QS =($QS == 0)?1:$QS;
$IC =($IC == 0)?1:$IC;
$UP =($UP == 0)?1:$UP;
$ExFactor =($ExFactor == 0)?1:$ExFactor;

$result=(((($TP*$ExFactor)*(($VS*$ExFactor)/($QS*$ExFactor)))-($IC*$ExFactor))/($UP*$ExFactor));
return $result;

} 

