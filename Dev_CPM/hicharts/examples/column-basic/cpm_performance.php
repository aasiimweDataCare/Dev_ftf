
<?php
$title=$_GET['title'];
$categories=$_GET['categories'];
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>CPM Charts</title>

		<script type="text/javascript" src="../../../js/hicharts.js"></script>
		<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: '<?php echo $_GET['title']; ?>'
            },
            subtitle: {
                text: 'Source: http://mis.ftfcpm.com:9000'
            },
            xAxis: {
                categories: ['2013','2014','2015','2016','2017','2018']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Unit: (<?php echo $_GET['unit']; ?>)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} <?php $unit=$_GET['unit'];
		    
		    echo $unit;
		    ?></b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
//            series: [{
//                name: 'North',
//                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0]
//    
//            }, {
//                name: 'East',
//                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5]
//    
//            }, {
//                name: 'Central',
//                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5]
//    
//            },
//	    {
//                name: 'South',
//                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3]
//    
//            }, {
//                name: 'West',
//                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5]
//    
//            }]
	    
	    
	    
	    
	   //changed by aasiimwe
	   
	   
	   
	   series: [{
                name: 'Central',
                data: <?php echo $_GET['CentralCat']; ?>
    
            }, {
                name: 'East',
                data: <?php echo $_GET['EastCat']; ?>
    
            }, {
                name: 'North',
                data: <?php echo $_GET['NorthCat']; ?>
    
            },
	     {
                name: 'West',
                data: <?php echo $_GET['WestCat']; ?>
    
            }]
	    
	    
	    
	    
	    
        });
    });
    

		</script>
	</head>
	<body>
<script src="../../js/highcharts.js"></script>
<script src="../../js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
