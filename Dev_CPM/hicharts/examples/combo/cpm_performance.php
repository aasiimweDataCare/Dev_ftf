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
            },
            title: {
                text: '<?php echo $_GET['title']; ?>'
            },
            xAxis: {
                categories: ['2013', '2014', '2015', '2016', '2017','2018','2019']
            },
            tooltip: {
                formatter: function() {
                    var s;
                    if (this.point.name) { // the pie chart
                        s = ''+
                            this.point.name +': '+ this.y +' Perfomance';
                    } else {
                        s = ''+
                            this.x  +': '+ this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                    html: 'Regional Performance',
                    style: {
                        left: '40px',
                        top: '8px',
                        color: 'black'
                    }
                }]
            },
            series: [{
                type: 'column',
                name: 'Target',
                data: <?php echo $_GET['Target']; ?>
            }, {
                type: 'column',
                name: 'Actual',
                data: <?php echo $_GET['Actual']; ?>
            }, {
                type: 'spline',
                name: 'Average',
                data: <?php echo $_GET['arrAverage'] ?>,
                marker: {
                	lineWidth: 2,
                	lineColor: Highcharts.getOptions().colors[3],
                	fillColor: 'white'
                }
            }, {
                type: 'pie',
                name: 'Total consumption',
                data: [{
                    name: 'Target',
                    y: <?php echo $_GET['TotalTarget']; ?>,
					
                    color: Highcharts.getOptions().colors[0] // Jane's color
                }, {
                    name: 'Actual',
                    y: <?php  echo $_GET['TotalActual']; ?> ,
                    color: Highcharts.getOptions().colors[1] // John's color
                }],
                center: [100, 80],
                size: 100,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
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
