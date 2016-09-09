<?php require_once('../connections/lib_connect.php'); ?>
<html lang="en">
<head>
<title>CPMA Data Performance Maps</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/highcharts.js"></script>
<script src="js/drilldown.js"></script>
<script src="js/modules/exporting.js"></script>



</head>

<body>

<?php 

$x = "select `indicator_name` from `tbl_indicator` where  `indicator_id` = '".$_GET['indicatorId']."'";
$q = mysql_query($x) or die(mysql_error());
$rowd = mysql_fetch_array($q);
$indicatorName = $rowd['indicator_name'];


$title = mysql_real_escape_string($indicatorName);
$unit = $_GET['unit'];
$j_LOA =$_GET['j_LOA'];
$json_data_arrayYr1 = $_GET['json_data_arrayYr1'];
$json_data_arrayYr2 = $_GET['json_data_arrayYr2'];
$json_data_arrayYr3 = $_GET['json_data_arrayYr3'];
$json_data_arrayYr4 = $_GET['json_data_arrayYr4'];
$json_data_arrayYr5 = $_GET['json_data_arrayYr5'];
$json_data_arrayYr6 = $_GET['json_data_arrayYr6'];

$obj_LOA = json_decode($j_LOA);
$obj_data_arrayYr1 = json_decode($json_data_arrayYr1);
$obj_data_arrayYr2 = json_decode($json_data_arrayYr2);
$obj_data_arrayYr3 = json_decode($json_data_arrayYr3);
$obj_data_arrayYr4 = json_decode($json_data_arrayYr4);
$obj_data_arrayYr5 = json_decode($json_data_arrayYr5);
$obj_data_arrayYr6 = json_decode($json_data_arrayYr6);

$yr1=2013;
$yr2=2014;
$yr3=2015;
$yr4=2016;
$yr5=2017;
$yr6=2018;



$regionNameNorth="North";
$regionNameWest="West";
$regionNameEast="East";
$regionNameCentral="Central";


$name_drilldownNorth="north-";
$name_drilldownWest="west-";
$name_drilldownEast="east-";
$name_drilldownCentral="central-";

$colorNorth="#9E0825";
$colorWest="#001E55";
$colorCentral="#88A848";
$colorEast="#70BAD9";




$dataNorthYr1 = (($obj_data_arrayYr1->{'NC_ActualYr1'})+($obj_data_arrayYr1->{'NM_ActualYr1'})+($obj_data_arrayYr1->{'NB_ActualYr1'}));
$dataNorthYr2 = (($obj_data_arrayYr2->{'NC_ActualYr2'})+($obj_data_arrayYr2->{'NM_ActualYr2'})+($obj_data_arrayYr2->{'NB_ActualYr2'}));
$dataNorthYr3 = (($obj_data_arrayYr3->{'NC_ActualYr3'})+($obj_data_arrayYr3->{'NM_ActualYr3'})+($obj_data_arrayYr3->{'NB_ActualYr3'}));
$dataNorthYr4 = (($obj_data_arrayYr4->{'NC_ActualYr4'})+($obj_data_arrayYr4->{'NM_ActualYr4'})+($obj_data_arrayYr4->{'NB_ActualYr4'}));
$dataNorthYr5 = (($obj_data_arrayYr5->{'NC_ActualYr5'})+($obj_data_arrayYr5->{'NM_ActualYr5'})+($obj_data_arrayYr5->{'NB_ActualYr5'}));
$dataNorthYr6 = (($obj_data_arrayYr6->{'NC_ActualYr6'})+($obj_data_arrayYr6->{'NM_ActualYr6'})+($obj_data_arrayYr6->{'NB_ActualYr6'}));

$dataWestYr1 = (($obj_data_arrayYr1->{'WC_ActualYr1'})+($obj_data_arrayYr1->{'WM_ActualYr1'})+($obj_data_arrayYr1->{'WB_ActualYr1'}));
$dataWestYr2 = (($obj_data_arrayYr2->{'WC_ActualYr2'})+($obj_data_arrayYr2->{'WM_ActualYr2'})+($obj_data_arrayYr2->{'WB_ActualYr2'}));
$dataWestYr3 = (($obj_data_arrayYr3->{'WC_ActualYr3'})+($obj_data_arrayYr3->{'WM_ActualYr3'})+($obj_data_arrayYr3->{'WB_ActualYr3'}));
$dataWestYr4 = (($obj_data_arrayYr4->{'WC_ActualYr4'})+($obj_data_arrayYr4->{'WM_ActualYr4'})+($obj_data_arrayYr4->{'WB_ActualYr4'}));
$dataWestYr5 = (($obj_data_arrayYr5->{'WC_ActualYr5'})+($obj_data_arrayYr5->{'WM_ActualYr5'})+($obj_data_arrayYr5->{'WB_ActualYr5'}));
$dataWestYr6 = (($obj_data_arrayYr6->{'WC_ActualYr6'})+($obj_data_arrayYr6->{'WM_ActualYr6'})+($obj_data_arrayYr6->{'WB_ActualYr6'}));


$dataEastYr1 = (($obj_data_arrayYr1->{'EC_ActualYr1'})+($obj_data_arrayYr1->{'EM_ActualYr1'})+($obj_data_arrayYr1->{'EB_ActualYr1'}));
$dataEastYr2 = (($obj_data_arrayYr2->{'EC_ActualYr2'})+($obj_data_arrayYr2->{'EM_ActualYr2'})+($obj_data_arrayYr2->{'EB_ActualYr2'}));
$dataEastYr3 = (($obj_data_arrayYr3->{'EC_ActualYr3'})+($obj_data_arrayYr3->{'EM_ActualYr3'})+($obj_data_arrayYr3->{'EB_ActualYr3'}));
$dataEastYr4 = (($obj_data_arrayYr4->{'EC_ActualYr4'})+($obj_data_arrayYr4->{'EM_ActualYr4'})+($obj_data_arrayYr4->{'EB_ActualYr4'}));
$dataEastYr5 = (($obj_data_arrayYr5->{'EC_ActualYr5'})+($obj_data_arrayYr5->{'EM_ActualYr5'})+($obj_data_arrayYr5->{'EB_ActualYr5'}));
$dataEastYr6 = (($obj_data_arrayYr6->{'EC_ActualYr6'})+($obj_data_arrayYr6->{'EM_ActualYr6'})+($obj_data_arrayYr6->{'EB_ActualYr6'}));


$dataCentralYr1 = (($obj_data_arrayYr1->{'CC_ActualYr1'})+($obj_data_arrayYr1->{'CM_ActualYr1'})+($obj_data_arrayYr1->{'CB_ActualYr1'}));
$dataCentralYr2 = (($obj_data_arrayYr2->{'CC_ActualYr2'})+($obj_data_arrayYr2->{'CM_ActualYr2'})+($obj_data_arrayYr2->{'CB_ActualYr2'}));
$dataCentralYr3 = (($obj_data_arrayYr3->{'CC_ActualYr3'})+($obj_data_arrayYr3->{'CM_ActualYr3'})+($obj_data_arrayYr3->{'CB_ActualYr3'}));
$dataCentralYr4 = (($obj_data_arrayYr4->{'CC_ActualYr4'})+($obj_data_arrayYr4->{'CM_ActualYr4'})+($obj_data_arrayYr4->{'CB_ActualYr4'}));
$dataCentralYr5 = (($obj_data_arrayYr5->{'CC_ActualYr5'})+($obj_data_arrayYr5->{'CM_ActualYr5'})+($obj_data_arrayYr5->{'CB_ActualYr5'}));
$dataCentralYr6 = (($obj_data_arrayYr6->{'CC_ActualYr6'})+($obj_data_arrayYr6->{'CM_ActualYr6'})+($obj_data_arrayYr6->{'CB_ActualYr6'}));


$valueChain_Coffee = "Coffee";
$valueChain_Maize = "Maize";
$valueChain_Beans = "Beans";




$coffee_drillDownNorthYr1 = ($obj_data_arrayYr1->{'NC_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'NC_ActualYr1'} : 0 ;
$maize_drillDownNorthYr1 = ($obj_data_arrayYr1->{'NM_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'NM_ActualYr1'} : 0 ;
$beans_drillDownNorthYr1 = ($obj_data_arrayYr1->{'NB_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'NB_ActualYr1'} : 0 ;
$coffee_drillDownWestYr1 = ($obj_data_arrayYr1->{'WC_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'WC_ActualYr1'} : 0 ;
$maize_drillDownWestYr1 = ($obj_data_arrayYr1->{'WM_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'WM_ActualYr1'} : 0 ;
$beans_drillDownWestYr1 = ($obj_data_arrayYr1->{'WB_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'WB_ActualYr1'} : 0 ;
$coffee_drillDownEastYr1 = ($obj_data_arrayYr1->{'EC_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'EC_ActualYr1'} : 0 ;
$maize_drillDownEastYr1 = ($obj_data_arrayYr1->{'EM_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'EM_ActualYr1'} : 0 ;
$beans_drillDownEastYr1 = ($obj_data_arrayYr1->{'EB_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'EB_ActualYr1'} : 0 ;
$coffee_drillDownCentralYr1 = ($obj_data_arrayYr1->{'CC_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'CC_ActualYr1'} : 0 ;
$maize_drillDownCentralYr1 = ($obj_data_arrayYr1->{'CM_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'CM_ActualYr1'} : 0 ;
$beans_drillDownCentralYr1 = ($obj_data_arrayYr1->{'CB_ActualYr1'}) != '' ? $obj_data_arrayYr1->{'CB_ActualYr1'} : 0 ;

$coffee_drillDownNorthYr2 = ($obj_data_arrayYr2->{'NC_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'NC_ActualYr2'} : 0 ;
$maize_drillDownNorthYr2 = ($obj_data_arrayYr2->{'NM_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'NM_ActualYr2'} : 0 ;
$beans_drillDownNorthYr2 = ($obj_data_arrayYr2->{'NB_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'NB_ActualYr2'} : 0 ;
$coffee_drillDownWestYr2 = ($obj_data_arrayYr2->{'WC_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'WC_ActualYr2'} : 0 ;
$maize_drillDownWestYr2 = ($obj_data_arrayYr2->{'WM_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'WM_ActualYr2'} : 0 ;
$beans_drillDownWestYr2 = ($obj_data_arrayYr2->{'WB_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'WB_ActualYr2'} : 0 ;
$coffee_drillDownEastYr2 = ($obj_data_arrayYr2->{'EC_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'EC_ActualYr2'} : 0 ;
$maize_drillDownEastYr2 = ($obj_data_arrayYr2->{'EM_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'EM_ActualYr2'} : 0 ;
$beans_drillDownEastYr2 = ($obj_data_arrayYr2->{'EB_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'EB_ActualYr2'} : 0 ;
$coffee_drillDownCentralYr2 = ($obj_data_arrayYr2->{'CC_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'CC_ActualYr2'} : 0 ;
$maize_drillDownCentralYr2 = ($obj_data_arrayYr2->{'CM_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'CM_ActualYr2'} : 0 ;
$beans_drillDownCentralYr2 = ($obj_data_arrayYr2->{'CB_ActualYr2'}) != '' ? $obj_data_arrayYr2->{'CB_ActualYr2'} : 0 ;

$coffee_drillDownNorthYr3 = ($obj_data_arrayYr3->{'NC_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'NC_ActualYr3'} : 0 ;
$maize_drillDownNorthYr3 = ($obj_data_arrayYr3->{'NM_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'NM_ActualYr3'} : 0 ;
$beans_drillDownNorthYr3 = ($obj_data_arrayYr3->{'NB_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'NB_ActualYr3'} : 0 ;
$coffee_drillDownWestYr3 = ($obj_data_arrayYr3->{'WC_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'WC_ActualYr3'} : 0 ;
$maize_drillDownWestYr3 = ($obj_data_arrayYr3->{'WM_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'WM_ActualYr3'} : 0 ;
$beans_drillDownWestYr3 = ($obj_data_arrayYr3->{'WB_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'WB_ActualYr3'} : 0 ;
$coffee_drillDownEastYr3 = ($obj_data_arrayYr3->{'EC_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'EC_ActualYr3'} : 0 ;
$maize_drillDownEastYr3 = ($obj_data_arrayYr3->{'EM_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'EM_ActualYr3'} : 0 ;
$beans_drillDownEastYr3 = ($obj_data_arrayYr3->{'EB_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'EB_ActualYr3'} : 0 ;
$coffee_drillDownCentralYr3 = ($obj_data_arrayYr3->{'CC_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'CC_ActualYr3'} : 0 ;
$maize_drillDownCentralYr3 = ($obj_data_arrayYr3->{'CM_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'CM_ActualYr3'} : 0 ;
$beans_drillDownCentralYr3 = ($obj_data_arrayYr3->{'CB_ActualYr3'}) != '' ? $obj_data_arrayYr3->{'CB_ActualYr3'} : 0 ;

$coffee_drillDownNorthYr4 = ($obj_data_arrayYr4->{'NC_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'NC_ActualYr4'} : 0 ;
$maize_drillDownNorthYr4 = ($obj_data_arrayYr4->{'NM_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'NM_ActualYr4'} : 0 ;
$beans_drillDownNorthYr4 = ($obj_data_arrayYr4->{'NB_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'NB_ActualYr4'} : 0 ;
$coffee_drillDownWestYr4 = ($obj_data_arrayYr4->{'WC_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'WC_ActualYr4'} : 0 ;
$maize_drillDownWestYr4 = ($obj_data_arrayYr4->{'WM_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'WM_ActualYr4'} : 0 ;
$beans_drillDownWestYr4 = ($obj_data_arrayYr4->{'WB_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'WB_ActualYr4'} : 0 ;
$coffee_drillDownEastYr4 = ($obj_data_arrayYr4->{'EC_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'EC_ActualYr4'} : 0 ;
$maize_drillDownEastYr4 = ($obj_data_arrayYr4->{'EM_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'EM_ActualYr4'} : 0 ;
$beans_drillDownEastYr4 = ($obj_data_arrayYr4->{'EB_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'EB_ActualYr4'} : 0 ;
$coffee_drillDownCentralYr4 = ($obj_data_arrayYr4->{'CC_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'CC_ActualYr4'} : 0 ;
$maize_drillDownCentralYr4 = ($obj_data_arrayYr4->{'CM_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'CM_ActualYr4'} : 0 ;
$beans_drillDownCentralYr4 = ($obj_data_arrayYr4->{'CB_ActualYr4'}) != '' ? $obj_data_arrayYr4->{'CB_ActualYr4'} : 0 ;


$coffee_drillDownNorthYr5 = ($obj_data_arrayYr5->{'NC_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'NC_ActualYr5'} : 0 ;
$maize_drillDownNorthYr5 = ($obj_data_arrayYr5->{'NM_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'NM_ActualYr5'} : 0 ;
$beans_drillDownNorthYr5 = ($obj_data_arrayYr5->{'NB_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'NB_ActualYr5'} : 0 ;
$coffee_drillDownWestYr5 = ($obj_data_arrayYr5->{'WC_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'WC_ActualYr5'} : 0 ;
$maize_drillDownWestYr5 = ($obj_data_arrayYr5->{'WM_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'WM_ActualYr5'} : 0 ;
$beans_drillDownWestYr5 = ($obj_data_arrayYr5->{'WB_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'WB_ActualYr5'} : 0 ;
$coffee_drillDownEastYr5 = ($obj_data_arrayYr5->{'EC_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'EC_ActualYr5'} : 0 ;
$maize_drillDownEastYr5 = ($obj_data_arrayYr5->{'EM_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'EM_ActualYr5'} : 0 ;
$beans_drillDownEastYr5 = ($obj_data_arrayYr5->{'EB_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'EB_ActualYr5'} : 0 ;
$coffee_drillDownCentralYr5 = ($obj_data_arrayYr5->{'CC_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'CC_ActualYr5'} : 0 ;
$maize_drillDownCentralYr5 = ($obj_data_arrayYr5->{'CM_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'CM_ActualYr5'} : 0 ;
$beans_drillDownCentralYr5 = ($obj_data_arrayYr5->{'CB_ActualYr5'}) != '' ? $obj_data_arrayYr5->{'CB_ActualYr5'} : 0 ;

$coffee_drillDownNorthYr6 = ($obj_data_arrayYr6->{'NC_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'NC_ActualYr6'} : 0 ;
$maize_drillDownNorthYr6 = ($obj_data_arrayYr6->{'NM_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'NM_ActualYr6'} : 0 ;
$beans_drillDownNorthYr6 = ($obj_data_arrayYr6->{'NB_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'NB_ActualYr6'} : 0 ;
$coffee_drillDownWestYr6 = ($obj_data_arrayYr6->{'WC_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'WC_ActualYr6'} : 0 ;
$maize_drillDownWestYr6 = ($obj_data_arrayYr6->{'WM_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'WM_ActualYr6'} : 0 ;
$beans_drillDownWestYr6 = ($obj_data_arrayYr6->{'WB_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'WB_ActualYr6'} : 0 ;
$coffee_drillDownEastYr6 = ($obj_data_arrayYr6->{'EC_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'EC_ActualYr6'} : 0 ;
$maize_drillDownEastYr6 = ($obj_data_arrayYr6->{'EM_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'EM_ActualYr6'} : 0 ;
$beans_drillDownEastYr6 = ($obj_data_arrayYr6->{'EB_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'EB_ActualYr6'} : 0 ;
$coffee_drillDownCentralYr6 = ($obj_data_arrayYr6->{'CC_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'CC_ActualYr6'} : 0 ;
$maize_drillDownCentralYr6 = ($obj_data_arrayYr6->{'CM_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'CM_ActualYr6'} : 0 ;
$beans_drillDownCentralYr6 = ($obj_data_arrayYr6->{'CB_ActualYr6'}) != '' ? $obj_data_arrayYr6->{'CB_ActualYr6'} : 0 ;

?>

<script type="text/javascript">
	$(function () {    

		// Create the chart
		
            
		$('#container').highcharts({
			chart: {
            type: 'column'
        },
        title: {
            text: '<?=$title;?>'
        },
        subtitle: {
            text: 'Click the columns to view By Value Chain.'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: '<?=$unit;?>'
            }

        },
        legend: {
            enabled: true
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}'
                }
            }
        },

			series: [{
				name: '<?=$regionNameNorth; ?>',
				//colorByPoint: true,
				color: '<?=$colorNorth; ?>',
				data: [{
					name: '<?=$yr1; ?>',
					y: <?=$dataNorthYr1; ?>,
					color: '<?=$colorNorth; ?>',
					drilldown: '<?=$name_drilldownNorth.$yr1; ?>'
				}, {
					name: '<?=$yr2; ?>',
					y: <?=$dataNorthYr2; ?>,
					
					
					drilldown: '<?=$name_drilldownNorth.$yr2; ?>'
				}, {
					name: '<?=$yr3; ?>',
					y: <?=$dataNorthYr3; ?>,
					
					drilldown: '<?=$name_drilldownNorth.$yr3; ?>'
				},{
					name: '<?=$yr4; ?>',
					y: <?=$dataNorthYr4; ?>,
					drilldown: '<?=$name_drilldownNorth.$yr4; ?>'
				},{
					name: '<?=$yr5; ?>',
					y: <?=$dataNorthYr5; ?>,
					drilldown: '<?=$name_drilldownNorth.$yr5; ?>'
				},{
					name: '<?=$yr6; ?>',
					y: <?=$dataNorthYr6; ?>,
					drilldown: '<?=$name_drilldownNorth.$yr6; ?>'
				}]
			},

			{
				name: '<?=$regionNameWest; ?>',
				//colorByPoint: true,
				color: '<?=$colorWest; ?>',
				data: [{
					name: '<?=$yr1; ?>',
					y: <?=$dataWestYr1; ?>,
					color: '<?=$colorWest; ?>',
					drilldown: '<?=$name_drilldownWest.$yr1; ?>'
				}, {
					name: '<?=$yr2; ?>',
					y: <?=$dataWestYr2; ?>,
					drilldown: '<?=$name_drilldownWest.$yr2; ?>'
				}, {
					name: '<?=$yr3; ?>',
					y: <?=$dataWestYr3; ?>,
					drilldown: '<?=$name_drilldownWest.$yr3; ?>'
				},{
					name: '<?=$yr4; ?>',
					y: <?=$dataWestYr4; ?>,
					drilldown: '<?=$name_drilldownWest.$yr4; ?>'
				},{
					name: '<?=$yr5; ?>',
					y: <?=$dataWestYr5; ?>,
					drilldown: '<?=$name_drilldownWest.$yr5; ?>'
				},{
					name: '<?=$yr6; ?>',
					y: <?=$dataWestYr6; ?>,
					drilldown: '<?=$name_drilldownWest.$yr6; ?>'
				}]
			},
			
			{
				name: '<?=$regionNameEast; ?>',
				//colorByPoint: true,
				color: '<?=$colorEast; ?>',
				data: [{
					name: '<?=$yr1; ?>',
					y: <?=$dataEastYr1; ?>,
					color: '<?=$colorEast; ?>',
					drilldown: '<?=$name_drilldownEast.$yr1; ?>'
				}, {
					name: '<?=$yr2; ?>',
					y: <?=$dataEastYr2; ?>,
					drilldown: '<?=$name_drilldownEast.$yr2; ?>'
				}, {
					name: '<?=$yr3; ?>',
					y: <?=$dataEastYr3; ?>,
					drilldown: '<?=$name_drilldownEast.$yr3; ?>'
				},{
					name: '<?=$yr4; ?>',
					y: <?=$dataEastYr4; ?>,
					drilldown: '<?=$name_drilldownEast.$yr4; ?>'
				},{
					name: '<?=$yr5; ?>',
					y: <?=$dataEastYr5; ?>,
					drilldown: '<?=$name_drilldownEast.$yr5; ?>'
				},{
					name: '<?=$yr6; ?>',
					y: <?=$dataEastYr6; ?>,
					drilldown: '<?=$name_drilldownEast.$yr6; ?>'
				}]
			},
			
			{
				name: '<?=$regionNameCentral; ?>',
				//colorByPoint: true,
				color: '<?=$colorCentral; ?>',
				data: [{
					name: '<?=$yr1; ?>',
					y: <?=$dataCentralYr1; ?>,
					color: '<?=$colorCentral; ?>',
					drilldown: '<?=$name_drilldownCentral.$yr1; ?>'
				}, {
					name: '<?=$yr2; ?>',
					y: <?=$dataCentralYr2; ?>,
					drilldown: '<?=$name_drilldownCentral.$yr2; ?>'
				}, {
					name: '<?=$yr3; ?>',
					y: <?=$dataCentralYr3; ?>,
					drilldown: '<?=$name_drilldownCentral.$yr3; ?>'
				},{
					name: '<?=$yr4; ?>',
					y: <?=$dataCentralYr4; ?>,
					drilldown: '<?=$name_drilldownCentral.$yr4; ?>'
				},{
					name: '<?=$yr5; ?>',
					y: <?=$dataCentralYr5; ?>,
					drilldown: '<?=$name_drilldownCentral.$yr5; ?>'
				},{
					name: '<?=$yr6; ?>',
					y: <?=$dataCentralYr6; ?>,
					drilldown: '<?=$name_drilldownCentral.$yr6; ?>'
				}]
			}
			
			],
			drilldown: {
				_animation: {
					duration: 2000
				},
				
				//Start of drill down
				//drill down 2013
				series: [{
					id: '<?=$name_drilldownNorth.$yr1; ?>',
					name: '<?=$name_drilldownNorth.$yr1; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownNorthYr1; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownNorthYr1; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownNorthYr1; ?>]
					]
				}, {
					id: '<?=$name_drilldownWest.$yr1; ?>',
					name: '<?=$name_drilldownWest.$yr1; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownWestYr1; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownWestYr1; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownWestYr1; ?>]
					]
				}, {
					id: '<?=$name_drilldownEast.$yr1; ?>',
					name: '<?=$name_drilldownEast.$yr1; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownEastYr1; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownEastYr1; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownEastYr1; ?>]
					]
				},{
					id: '<?=$name_drilldownCentral.$yr1; ?>',
					name: '<?=$name_drilldownCentral.$yr1; ?>',
					data: [
						
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownCentralYr1; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownCentralYr1; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownCentralYr1; ?>]
					]
				}, 
				
				
				//drill down 2014
				{
					id: '<?=$name_drilldownNorth.$yr2; ?>',
					name: '<?=$name_drilldownNorth.$yr2; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownNorthYr2; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownNorthYr2; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownNorthYr2; ?>]
					]
				},{
					id: '<?=$name_drilldownWest.$yr2; ?>',
					name: '<?=$name_drilldownWest.$yr2; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownWestYr2; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownWestYr2; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownWestYr2; ?>]
					]
				},{
					id: '<?=$name_drilldownEast.$yr2; ?>',
					name: '<?=$name_drilldownEast.$yr2; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownEastYr2; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownEastYr2; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownEastYr2; ?>]
					]
				},{
					id: '<?=$name_drilldownCentral.$yr2; ?>',
					name: '<?=$name_drilldownCentral.$yr2; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownCentralYr2; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownCentralYr2; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownCentralYr2; ?>]
					]
				}, 
				
				
				//drill down 2015
				{
					id: '<?=$name_drilldownNorth.$yr3; ?>',
					name: '<?=$name_drilldownNorth.$yr3; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownNorthYr3; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownNorthYr3; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownNorthYr3; ?>]
					]
				},{
					id: '<?=$name_drilldownWest.$yr3; ?>',
					name: '<?=$name_drilldownWest.$yr3; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownWestYr3; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownWestYr3; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownWestYr3; ?>]
					]
				},{
					id: '<?=$name_drilldownEast.$yr3; ?>',
					name: '<?=$name_drilldownEast.$yr3; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownEastYr3; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownEastYr3; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownEastYr3; ?>]
					]
				},{
					id: '<?=$name_drilldownCentral.$yr3; ?>',
					name: '<?=$name_drilldownCentral.$yr3; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownCentralYr3; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownCentralYr3; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownCentralYr3; ?>]
					]
				}, 
				
				//drill down 2016
				{
					id: '<?=$name_drilldownNorth.$yr4; ?>',
					name: '<?=$name_drilldownNorth.$yr4; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownNorthYr4; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownNorthYr4; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownNorthYr4; ?>]
					]
				},{
					id: '<?=$name_drilldownWest.$yr4; ?>',
					name: '<?=$name_drilldownWest.$yr4; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownWestYr4; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownWestYr4; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownWestYr4; ?>]
					]
				},{
					id: '<?=$name_drilldownEast.$yr4; ?>',
					name: '<?=$name_drilldownEast.$yr4; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownEastYr4; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownEastYr4; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownEastYr4; ?>]
					]
				},{
					id: '<?=$name_drilldownCentral.$yr4; ?>',
					name: '<?=$name_drilldownCentral.$yr4; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownCentralYr4; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownCentralYr4; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownCentralYr4; ?>]
					]
				},

				//drill down 2017
				{
					id: '<?=$name_drilldownNorth.$yr5; ?>',
					name: '<?=$name_drilldownNorth.$yr5; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownNorthYr5; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownNorthYr5; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownNorthYr5; ?>]
					]
				},{
					id: '<?=$name_drilldownWest.$yr5; ?>',
					name: '<?=$name_drilldownWest.$yr5; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownWestYr5; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownWestYr5; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownWestYr5; ?>]
					]
				},{
					id: '<?=$name_drilldownEast.$yr5; ?>',
					name: '<?=$name_drilldownEast.$yr5; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownEastYr5; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownEastYr5; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownEastYr5; ?>]
					]
				},{
					id: '<?=$name_drilldownCentral.$yr5; ?>',
					name: '<?=$name_drilldownCentral.$yr5; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownCentralYr5; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownCentralYr5; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownCentralYr5; ?>]
					]
				},
				
				//Drill down 2018
				{
					id: '<?=$name_drilldownNorth.$yr6; ?>',
					name: '<?=$name_drilldownNorth.$yr6; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownNorthYr6; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownNorthYr6; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownNorthYr6; ?>]
					]
				},{
					id: '<?=$name_drilldownWest.$yr6; ?>',
					name: '<?=$name_drilldownWest.$yr6; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownWestYr6; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownWestYr6; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownWestYr6; ?>]
					]
				},{
					id: '<?=$name_drilldownEast.$yr6; ?>',
					name: '<?=$name_drilldownEast.$yr6; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownEastYr6; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownEastYr6; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownEastYr6; ?>]
					]
				},{
					id: '<?=$name_drilldownCentral.$yr6; ?>',
					name: '<?=$name_drilldownCentral.$yr6; ?>',
					data: [
						['<?=$valueChain_Coffee; ?>', <?=$coffee_drillDownCentralYr6; ?>],
						['<?=$valueChain_Maize; ?>', <?=$maize_drillDownCentralYr6; ?>],
						['<?=$valueChain_Beans; ?>', <?=$beans_drillDownCentralYr6; ?>]
					]
				}]
				
				//End of Drill Downs
				
			},
			
			 exporting: {
            type: 'image/jpeg'
			}
		});
		
		// button handler
		$('#button').click(function () {
			var chart = $('#container').highcharts();
			chart.exportChart();
		});
	
	});

</script>

<div id="container" style="min-width: 100%; height: 100%; margin: 0 auto"></div>
<button id="button">Export chart</button>
</body>

</html>



